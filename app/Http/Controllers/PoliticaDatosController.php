<?php

namespace App\Http\Controllers;

use App\Models\PoliticaDatos;
use Illuminate\Http\Request;

class PoliticaDatosController extends Controller
{
    //
    public function edit()
    {
        //resources\views\pages\politicaDatos\edit.blade.php
        $politicas = PoliticaDatos::first();
        return view('pages.politicaDatos.edit', compact('politicas'));
    }
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = PoliticaDatos::findOrfail($id); 
        $body = $request->all();
        $body['text_content'] = $request->content_raw;
        $terms->update($body);
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }
}
