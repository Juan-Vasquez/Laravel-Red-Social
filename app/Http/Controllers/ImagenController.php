<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('imagen.create');
    }

    public function save(Request $request){

        $user = Auth::user();

        //Capturando los datos del formulario
        $imagen_path = $request->file('imagen_path');
        $descripcion = $request->input('descripcion');

        //Creando un objeto de Image y asignacion de datos a BD
        $image = new Image();
        $image->fk_users  = $user->id;
        $image->descripcion = $descripcion;

        if ($imagen_path) {
            $image_name = time().$imagen_path->getClientOriginalName();
            Storage::disk('images')->put($image_name, FILE::get($imagen_path));
            $image->image_path = $image_name;
        }

        //Guardar los datos
        $image->save();

        return redirect()->route('dashboard.index')->with('message', 'Tu foto fue subido exitosamente');

        
    }

    public function obtenerImagen($imagen){
        $img = Storage::disk('images')->get($imagen);
        return new Response($img, 200);
    }

    public function detalle($id) {
        $image = Image::find($id);
        return view('imagen.detalle', [
            'image'=>$image
        ]);
    }

}
