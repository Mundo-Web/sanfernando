<?php

namespace App\Http\Controllers;

use App\Models\QuestionExam;
use App\Http\Requests\StoreQuestionExamRequest;
use App\Http\Requests\UpdateQuestionExamRequest;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class QuestionExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $question = QuestionExam::where("status", "=", true)->get();
        return view('pages.question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $major = Major::where('status', true)->get();
        $question = new QuestionExam();
        return view('pages.question.save', compact('question','major'));
    }

    public function edit($id)
    {
        $question = QuestionExam::findOrfail($id);
        $major = Major::where('status', true)->get();
        return view('pages.question.save', compact('question','major'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'question' => 'required|string|max:255',
        ], [
            'question.required' => 'La pregunta es obligatoria.',
            'question.string' => 'La pregunta debe ser un texto válido.',
            'question.max' => 'La pregunta no debe superar los 255 caracteres.',
        ]);
        
        $body = $request->all();

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(Driver::class);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            $ruta = 'storage/images/question/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); 
            }

            $img->save($ruta . $nombreImagen);

            $body['imagen'] = $ruta . $nombreImagen;
           
        }

        $jpa = QuestionExam::find($request->id);
        
        if (!$jpa) {
            $body['status'] = true;
            QuestionExam::create($body);
        } else {
            $jpa->update($body);
        }

        return redirect()->route('question.index')->with('success', 'Pregunta creada');
    }


    /**
     * Display the specified resource.
     */
    public function show(QuestionExam $questionExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionExamRequest $request, QuestionExam $questionExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionExam $questionExam)
    {
        //
    }

    public function deleteQuestion(Request $request)
    {
        $id = $request->id;
        $category = QuestionExam::findOrfail($id);
        $category->status = false;
        $category->save();

        return response()->json(['message' => 'Pregunta eliminada']);
    }

    public function updateVisible(Request $request)
    {

        $id = $request->id;
        $field = $request->field;
        $status = $request->status;

       
        $category = QuestionExam::findOrFail($id);
        $category->$field = $status;
        $category->save();


        return response()->json(['message' => 'Pregunta modificada']);
    }
}
