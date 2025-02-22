<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\Response;
use App\Models\Attemp;
use App\Models\AttempDetail;
use App\Models\AttempSimulation;
use App\Models\AttempSimulationDetail;
use App\Models\ExamSimulation;

class AttempSimulationController extends BasicController
{
    public $model = AttempSimulation::class;

    public function beforeSave(Request $request)
    {
        $body = $request->all();

        $attempJpa = AttempSimulation::where('user_id', Auth::user()->id)
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
            $attempJpa = AttempSimulation::find($id);
            
            $corrects = AttempSimulationDetail::select([
                'attemp_simulation_details.*',
            ])
                ->join('response_exams', 'response_exams.id', 'attemp_simulation_details.answer_id')
                ->where('response_exams.is_correct', true)
                ->where('attemp_id', $attempJpa->id)
                ->count();

            $attempJpa->finished = true;
            $attempJpa->questions = ExamSimulation::find($attempJpa->evaluation_id)->questions()->count();
            $attempJpa->score = $corrects;
            
            $attempJpa->save();
        });
        return response($response->toArray(), $response->status);
    }
}
