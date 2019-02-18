<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'empresa' => 'required',
            'nome' => 'required',
            'telefone' => 'required',
            'celular' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'cep' => 'required',
            'mensagem' => 'required',
        ]);
        /*
          Add mail functionality here.
        */
        return response()->json(null, 200);
    }
}
