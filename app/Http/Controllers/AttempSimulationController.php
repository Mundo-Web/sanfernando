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

            $puntajeObtenido = AttempSimulationDetail::select([
                'attemp_simulation_details.*',
            ])
                ->join('response_exams', 'response_exams.id', 'attemp_simulation_details.answer_id')
                ->join('question_exams', 'question_exams.id', 'attemp_simulation_details.question_id')
                ->join('attemp_simulations', 'attemp_simulations.id', 'attemp_simulation_details.attemp_id')
                
                ->join('exam_question', function ($join) {
                    $join->on('exam_question.exam_simulation_id', '=', 'attemp_simulations.evaluation_id')
                         ->on('exam_question.question_exam_id', '=', 'question_exams.id');
                })

                ->where('response_exams.is_correct', true)
                ->where('attemp_id', $attempJpa->id)
                ->sum('exam_question.score');  


            $preguntasCorrectas = AttempSimulationDetail::select([
                'attemp_simulation_details.*',
            ])
                ->join('response_exams', 'response_exams.id', 'attemp_simulation_details.answer_id')
                ->where('response_exams.is_correct', true)
                ->where('attemp_id', $attempJpa->id)
                ->count();    

                

            $attempJpa->finished = true;
            
            $attempJpa->questions = ExamSimulation::find($attempJpa->evaluation_id)->questions()->count();
            $attempJpa->corrects = $preguntasCorrectas;
            $attempJpa->score = $puntajeObtenido;
            
            $attempJpa->save();
        });
        return response($response->toArray(), $response->status);
    }
}
