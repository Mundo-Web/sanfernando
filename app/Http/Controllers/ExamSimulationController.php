<?php

namespace App\Http\Controllers;

use App\Models\ExamSimulation;
use App\Http\Requests\StoreExamSimulationRequest;
use App\Http\Requests\UpdateExamSimulationRequest;
use App\Models\Major;
use App\Models\QuestionExam;
use Illuminate\Http\Request;

class ExamSimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exam = ExamSimulation::where("status", "=", true)->get();
        return view('pages.exam.index', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $preguntas = QuestionExam::where('status', true)->get();
        $especialidades = Major::where('status', true)->get();
        $exam = new ExamSimulation();
        return view('pages.exam.save', compact('preguntas','exam','especialidades'));
    }


    public function edit($id)
    {
        $exam = ExamSimulation::with('questions.majors')->findOrfail($id);
        $especialidades = Major::where('status', true)->get();
        $preguntas = QuestionExam::where('status', true)->get();
        
        return view('pages.exam.save', compact('preguntas','exam','especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:20',
        ]);

        $body = $request->all();
        
        $jpa = ExamSimulation::find($request->id);
        
        if (!$jpa) {
            $body['status'] = true;
            $exam = ExamSimulation::create($body);

            if (!empty($request->questions)) {
                foreach ($request->questions as $question) {
                    $exam->questions()->attach($question['pregunta_id'], [
                        'score' => $question['puntaje']
                    ]);
                }
            }

        } else {
            $jpa->update($body);

            $questions = [];

            if (!empty($request->questions)) {
                foreach ($request->questions as $question) {
                    $questions[$question['pregunta_id']] = ['score' => $question['puntaje']];
                }
            }
            
            $jpa->questions()->sync($questions);
        }
        
    
        return redirect()->route('exam.index')->with('success', 'Simulacro creado');   
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSimulation $examSimulation)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamSimulationRequest $request, ExamSimulation $examSimulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamSimulation $examSimulation)
    {
        //
    }


    public function obtenerEspecialidades(){
        $especialidades = Major::where('status', true)->get();
        return response()->json(['especialidades' => $especialidades]);
    }


    public function obtenerPreguntas($especialidad){
        // $preguntas = QuestionExam::where('major_id', $especialidad)->where('status', true)->get();
        $preguntas = QuestionExam::where('major_id', $especialidad)->get();
        return response()->json(['preguntas' => $preguntas]);
    }


    public function deleteExam(Request $request)
    {
        $id = $request->id;
        $category = ExamSimulation::findOrfail($id);
        $category->status = false;
        $category->save();

        return response()->json(['message' => 'Examen eliminado']);
    }

    public function updateVisible(Request $request)
    {

        $id = $request->id;
        $field = $request->field;
        $status = $request->status;

       
        $category = ExamSimulation::findOrFail($id);
        $category->$field = $status;
        $category->save();


        return response()->json(['message' => 'Examen modificado']);
    }
}
