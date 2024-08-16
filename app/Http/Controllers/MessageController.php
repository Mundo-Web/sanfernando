<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends BasicController
{
    public $model = Message::class;
    public function index()
    {
        $mensajes = Message::where('status' , '=', 1 )->orderBy('created_at', 'DESC')->get();
        return view('pages.message.index', compact('mensajes'));
    }

    function storePublic(Request $request)
    {
        $mensaje = new Message();

        $mensaje->full_name = $request-> nombre; 
        $mensaje->email = $request-> email; 
        $mensaje->phone = $request-> telefono; 
        $mensaje->source = $request-> textoSeleccionado; 
        $mensaje->service_product = $request-> textoMeet; 

        $mensaje->save();

        return response()->json(['message' => 'Solicitud enviada Correctamente']);
    }

    public function show($id)
    {
        //
        $message = Message::findOrFail($id);

        $message->is_read = 1; 
        $message->save();

        return view('pages.message.show', compact('message'));
    }

    public function borrar(Request $request)
    {

        $mensaje = Message::find($request->id);
        $mensaje->status = 0; 
        $mensaje->save();

        return response()->json(['success' => true]);

    }
}
