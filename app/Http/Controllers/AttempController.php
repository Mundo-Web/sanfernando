<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Http\Requests\StoreAttempRequest;
use App\Http\Requests\UpdateAttempRequest;
use App\Models\AttempDetail;
use App\Models\Module;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class AttempController extends BasicController
{
    public $model = Attemp::class;

    public function beforeSave(Request $request)
    {
        $body = $request->all();

        $evaluation = Module::find($request->evaluation_id);
        $attemps = Attemp::select()
            ->where('user_id', Auth::user()->id)
            ->where('evaluation_id', $request->evaluation_id)
            ->where('finished', true)
            ->count();

        if ($attemps >= $evaluation->attemps) throw new Exception("No tienes intentos disponibles");

        $attempJpa = Attemp::where('user_id', Auth::user()->id)
            ->where('evaluation_id', $request->evaluation_id)
            ->where('finished', false)
            ->first();

        if ($attempJpa) {
            $body['id'] = $attempJpa->id;
        }

        $body['user_id'] = Auth::user()->id;

        return $body;
    }

    public function delete(Request $request, string $id)
    {
        $response = Response::simpleTryCatch(function (Response $response) use ($id) {
            $attempJpa = Attemp::find($id);
            $corrects = AttempDetail::select([
                'attemp_details.*',
            ])
                ->join('answers', 'answers.id', 'attemp_details.answer_id')
                ->where('answers.correct', true)
                ->where('attemp_id', $attempJpa->id)
                ->count();

            $attempJpa->finished = true;
            $attempJpa->questions = Module::find($attempJpa->evaluation_id)->questions()->count();
            $attempJpa->score = $corrects;
            $attempJpa->save();
        });
        return response($response->toArray(), $response->status);
    }

    public function certificate(Request $request, string $attempId)
    {
        try {
            $attemp = Attemp::with(['evaluation', 'course'])->find($attempId);
            $pdf = Pdf::loadView('pdf.certificate', compact('attemp'))
                ->setOption('isRemoteEnabled', true)
                ->setOption('isHtml5ParserEnabled', true)
                ->setPaper('letter', 'landscape');
            return $pdf->download('Certificado de finalización - ' . $attemp->course->producto . '.pdf');
        } catch (\Throwable $th) {
            // \dump($th->getMessage());
        }
    }

    public function certificateBlade(Request $request, string $attempId)
    {
        try {
            $attemp = Attemp::with(['evaluation', 'course'])->find($attempId);
            return view('pdf.certificate')->with('attemp', $attemp);
        } catch (\Throwable $th) {
            // \dump($th->getMessage());
        }
    }
}
