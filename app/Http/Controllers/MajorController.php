<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = Major::where("status", "=", true)->get();
        return view('pages.major.index', compact('major'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major = new Major();
        return view('pages.major.save', compact('major'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no debe superar los 255 caracteres.',
        ]);

        $body = $request->all();

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(Driver::class);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            $ruta = 'storage/images/major/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); 
            }

            $img->save($ruta . $nombreImagen);

            $body['imagen'] = $ruta . $nombreImagen;
           
        }

        $jpa = Major::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            Major::create($body);
        } else {
            $jpa->update($body);
        }

        return redirect()->route('major.index')->with('success', 'Especialidad creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $major = Major::findOrfail($id);
        return view('pages.major.save', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        //
    }

    public function deleteMajor(Request $request)
    {
        $id = $request->id;
        $category = Major::findOrfail($id);
        $category->status = false;
        $category->save();

        return response()->json(['message' => 'Especialidad eliminada']);
    }

    public function updateVisible(Request $request)
    {

        $id = $request->id;
        $field = $request->field;
        $status = $request->status;

        // Actualizar el estado de la categoría
        $category = Major::findOrFail($id);
        $category->$field = $status;
        $category->save();


        return response()->json(['message' => 'Especialidad modificada']);
    }
}
