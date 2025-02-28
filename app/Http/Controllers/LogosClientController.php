<?php

namespace App\Http\Controllers;

use App\Models\ClientLogos;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LogosClientController extends Controller
{
  public function index()
  {
    $logos = ClientLogos::where("status", "=", true)->get();
    return view('pages.logos.index', compact('logos'));
  }

  public function create()
  {
    return view('pages.logos.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
    ]);

    $post = new ClientLogos();

    if ($request->hasFile("url_image")) {

      $manager = new ImageManager(Driver::class);

      $nombreImagen = Str::random(10) . '_' . $request->file('url_image')->getClientOriginalName();

      $img =  $manager->read($request->file('url_image'));

      // Obtener las dimensiones de la imagen que se esta subiendo
      // $img->coverDown(640, 640, 'center');

      $ruta = 'storage/images/logos/';

      if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
      }

      $img->save($ruta . $nombreImagen);

      $post->url_image = $ruta.$nombreImagen;
    }

    $post->title = $request->title;
    $post->description = $request->description;
    $post->status = 1;

    $post->save();
    return redirect()->route('logos.index')->with('success', 'Publicación creada exitosamente.');
  }


  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id) {}

  function deleteLogo(Request $request)
  {

    $logo = ClientLogos::findOrfail($request->id);



    // Eliminar la imagen si existe
    if ($logo->url_image && file_exists($logo->url_image)) {
      unlink($logo->url_image);
    }

    // Eliminar el logo de la base de datos
    $logo->delete();
    return response()->json(['message' => 'Logo eliminado']);
  }
}
