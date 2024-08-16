<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class IconController extends Controller
{
    public function index()
    {
        $icons = Icon::all();
        return view('pages.icons.index', compact('icons'));
    }

    public function create()
    {
        return view('pages.icons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|image|mimes:png,svg|max:2048',
        ]);

        // storage/images/icons/ 
        $path = $this->saveImg($request, 'icon');
        // $path = $request->file('icon')->store('images/icons', 'public');

        dump($path);    
        Icon::create([
            'name' => $request->name,
            'path' => $path,
        ]);

        return redirect()->route('icons.index');
    }
    private function saveImg(Request $request, string $field)
  {
    try {
      //code...
      if (isset($request->id)) {
        $producto = Icon::find($request->id);
        $ruta = $producto->$field;

        // dump($ruta);
        //borrar imagen
        if (!empty($ruta) && file_exists($ruta)) {
          // Borrar imagen
          unlink($ruta);
        }
      }
      if ($request->hasFile($field)) {
        $file = $request->file($field);
        $route = "storage/images/icons/";
        // $route = "storage/images/productos/$request->categoria_id/";
        $nombreImagen = Str::random(10) . '_' . $field . '.' . $file->getClientOriginalExtension();
        // $nombreImagen = $request->sku.'.png';
        $manager = new ImageManager(new Driver());
        $img =  $manager->read($file);
        // $img->coverDown(340, 340, 'center');

        if (!file_exists($route)) {
          mkdir($route, 0777, true);
        }

        // $img->save($route . $nombreImagen);
        $img->save($route . $nombreImagen);
        return $route . $nombreImagen;
      }
      return null;
    } catch (\Throwable $th) {
      //throw $th;
      
    }
  }

    public function show(Icon $icon)
    {
        return view('icons.show', compact('icon'));
    }

    public function edit(Icon $icon)
    {
        return view('pages.icons.edit', compact('icon'));
    }

    public function update(Request $request, Icon $icon)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'image|mimes:png,svg|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $icon->update(['path' => $path]);
        }

        $icon->update(['name' => $request->name]);

        return redirect()->route('icons.index');
    }

    public function destroy(Icon $icon)
    {
        $icon->delete();
        return redirect()->route('icons.index');
    }
}
