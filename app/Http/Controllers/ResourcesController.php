<?php

namespace App\Http\Controllers;

use App\Models\Resources;
use App\Http\Requests\StoreResourcesRequest;
use App\Http\Requests\UpdateResourcesRequest;
use App\Models\ResourceList;
use App\Models\TagResource;
use DragonCode\Support\Facades\Filesystem\File;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Resources::all();
        return view('pages.resources.index', compact('staff') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $etiquetasall = ResourceList::all();
        return view('pages.resources.create', compact('etiquetasall'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png',
            'archive' => 'nullable|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $data = $request->all();

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(Driver::class);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            $ruta = 'storage/images/resources/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); 
            }

            $img->save($ruta . $nombreImagen);
            $data['imagen'] = $ruta.$nombreImagen;
         
        }

        if ($request->hasFile("archive")) {
            $archivo = $request->file("archive");
            $nombreArchivo = Str::random(10) . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = 'storage/files/resources/';
    
            if (!file_exists($rutaArchivo)) {
                mkdir($rutaArchivo, 0777, true);
            }
    
            $archivo->move($rutaArchivo, $nombreArchivo);
    
            $data['archive'] = $rutaArchivo . $nombreArchivo;
        }
        
        $newresource = Resources::create($data);

        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
               
                $tagResource = ResourceList::firstOrCreate(['name' => $tag]);
                
                TagResource::create([
                    'id_resource' => $newresource->id,
                    'etiqueta' => $tagResource->id,
                ]);

            }
        }

        return redirect()->route('resources.index')->with('success', 'Publicación creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resources $resources)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Resources::find($id);
        $etiquetas = TagResource::where('id_resource', $id)->pluck('etiqueta')->toArray();
        $etiquetasall = ResourceList::all();
        
        return view('pages.resources.edit', compact('staff','etiquetas','etiquetasall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $resource = Resources::find($id);

        if ($request->hasFile("imagen")) {

            if ($resource && File::exists(public_path($resource->imagen))) {
                File::delete(public_path($resource->imagen));
            }
            
            $manager = new ImageManager(Driver::class);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img =  $manager->read($request->file('imagen'));
            $ruta = 'storage/images/resources/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            $img->save($ruta . $nombreImagen);
            $data['imagen'] = $ruta.$nombreImagen;
            
        }

        if ($request->hasFile("archive")) {

            if ($resource && File::exists(public_path($resource->archive))) {
                File::delete(public_path($resource->archive));
            }
            
            $archivo = $request->file("archive");
            $nombreArchivo = Str::random(10) . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = 'storage/files/resources/';
    
            if (!file_exists($rutaArchivo)) {
                mkdir($rutaArchivo, 0777, true);
            }
    
            $archivo->move($rutaArchivo, $nombreArchivo);
    
            $data['archive'] = $rutaArchivo . $nombreArchivo;
        }
        
        
        Resources::updateOrCreate(
            ['id' => $id],
            $data 
        );

        if ($request->has('tags')) {
            
            $tagresource= TagResource::where('id_resource', $id)->delete();
            

            foreach ($request->tags as $tag) {
                $tagf = ResourceList::firstOrCreate(['name' => $tag]);
                TagResource::create([
                    'id_resource' => $id,
                    'etiqueta' => $tagf->id
                ]);
            }
        }

        return redirect()->route('resources.index')->with('success', 'Publicación Actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resources $resources)
    {
        //
    }

    public function updateVisible(Request $request){
        $id = $request->id; 
        $stauts = $request->status; 
        $staff = Resources::find($id);
        $staff->status = $stauts; 

        $staff->save();
        return response()->json(['message'=> 'Recurso actualizado']);
    }

    public function borrar(Request $request)
	{
		$resources = Resources::find($request->id);

		if ($resources->archive && file_exists($resources->archive)) {
			unlink($resources->archive);
		}
		if ($resources->imagen && file_exists($resources->imagen)) {
			unlink($resources->imagen);
		}

		$resources->delete();
		return response()->json(['message'=>'Recurso eliminado']);
	}
}
