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

    if ($request->hasFile("imagen")) {

      $manager = new ImageManager(new Driver());

      $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();

      // Cambia 'read' por 'make' para manejar la imagen correctamente
      $img = $manager->make($request->file('imagen'));

      //seteamos el tamaño que deben tener las imágenes que se suban
      $qwidth = 808;
      $qheight = 445;

      // Obtener las dimensiones de la imagen que se está subiendo
      $width = $img->width();
      $height = $img->height();

      if ($width > $height) {
        // Si la imagen es horizontal, igualamos el alto y croppeamos
        $img->resize(null, 445, function ($constraint) {
          $constraint->aspectRatio();
        })->crop(808, 445);
      } else {
        // Si la imagen es vertical, igualamos el ancho y croppeamos
        $img->resize(808, null, function ($constraint) {
          $constraint->aspectRatio();
        })->crop(808, 445);
      }

      $ruta = 'storage/images/logos/';
      if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true); // Crea la ruta si no existe
      }

      $img->save($ruta . $nombreImagen);

      $post->url_image = $ruta . $nombreImagen;
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
