<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Http\Requests\StoreAttempRequest;
use App\Http\Requests\UpdateAttempRequest;
use App\Models\AttempDetail;
use App\Models\ClientLogos;
use App\Models\Module;
use App\Models\Sign;
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
            ->orderBy('created_at', 'DESC')
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
                ->setPaper('a4', 'landscape');
            return $pdf->download('Certificado de finalización - ' . $attemp->course->producto . '.pdf');
        } catch (\Throwable $th) {
            // \dump($th->getMessage());
        }
    }

    public function certificateBlade(Request $request, string $attempId)
    {
        try {
            $signs = Sign::where('name' , '!=', null)->where('occupation', '!=', null )->get();
            $convenios = ClientLogos::where("status", "=", true)->get();
            $attemp = Attemp::with(['evaluation', 'course'])->find($attempId);
            return view('pdf.certificate_verify')->with(['attemp'=>  $attemp, 'convenios' => $convenios, 'signs'=> $signs]);
        } catch (\Throwable $th) {
            // \dump($th->getMessage());
        }
    }
}
