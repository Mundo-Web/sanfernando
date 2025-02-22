<?php

namespace App\Http\Controllers;

use App\Models\ResponseExam;
use App\Http\Requests\StoreResponseExamRequest;
use App\Http\Requests\UpdateResponseExamRequest;
use App\Models\QuestionExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class ResponseExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ResponseExam::where("status", "=", true)->get();
        return view('pages.response.index', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $question = QuestionExam::where('status', true)->get();
        $response = new ResponseExam();
        return view('pages.response.save', compact('question','response'));
    }


    public function edit($id)
    {
        $response = ResponseExam::findOrfail($id);
        $question = QuestionExam::where('status', true)->get();
        return view('pages.response.save', compact('question','response'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'response' => 'required|string|max:255',
        ], [
            'response.required' => 'La respuesta es obligatoria.',
            'response.string' => 'La respuesta debe ser un texto válido.',
            'response.max' => 'La respuesta no debe superar los 255 caracteres.',
        ]);

        $body = $request->all();

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(Driver::class);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            $ruta = 'storage/images/responses/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); 
            }

            $img->save($ruta . $nombreImagen);

            $body['imagen'] = $ruta . $nombreImagen;
           
        }

        
        

        $jpa = ResponseExam::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            if (array_key_exists('is_correct', $body)) {
                $body['is_correct'] = strtolower($body['is_correct']) === 'on' ? 1 : 0;
            }
            ResponseExam::create($body);
        } else {

            if (array_key_exists('is_correct', $body)) {
                $body['is_correct'] = strtolower($body['is_correct']) === 'on' ? 1 : 0;
            }
            $jpa->update($body);
           
        }

        return redirect()->route('response.index')->with('success', 'Respuesta creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResponseExam $responseExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponseExamRequest $request, ResponseExam $responseExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResponseExam $responseExam)
    {
        //
    }

    public function deleteResponse(Request $request)
    {
        $id = $request->id;
        $category = ResponseExam::findOrfail($id);
        $category->status = false;
        $category->save();

        return response()->json(['message' => 'Respuesta eliminada']);
    }

    public function updateVisible(Request $request)
    {

        $id = $request->id;
        $field = $request->field;
        $status = $request->status;

       
        $category = ResponseExam::findOrFail($id);
        $category->$field = $status;
        $category->save();


        return response()->json(['message' => 'Respuesta modificada']);
    }
}
