<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Coment;

class ComentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        //Validacion de formulario
        $this->validate($request, [
            'imagen'=>'int|required',
            'content'=>'string|required'
        ]);

        //Recibir datos del formulario
        $user = Auth::user();
        $id_image = $request->input('imagen');
        $coment = $request->input('content');

        //Instancia de un nuevo objeto del modelo Coment
        $comentario = new Coment();

        //Asignando valores a los campos de la tabla BD
        $comentario->content = $coment;
        $comentario->fk_users = $user->id;
        $comentario->fk_images = $id_image;

        //Guardar datos en la BD
        $comentario->save();
        return redirect()->route('imagen.detalle', ['id'=>$id_image]);

    }


}
