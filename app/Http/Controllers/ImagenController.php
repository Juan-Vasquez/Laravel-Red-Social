<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Coment;
use App\Like;


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

    public function delete($id) {
        $user = Auth::user();
        $imagen = Image::find($id);
        $coments = Coment::where('fk_images', $id)->get();
        $likes = Like::where('fk_images', $id)->get();

        if($user && $imagen->fk_users == $user->id) {
            if($coments && count($coments) >= 1) {
                foreach($coments as $coment){
                    $coment->delete();
                }
            }

            if($likes && count($likes) >= 1) {
                foreach($likes as $like) {
                    $like->delete();
                }
            }

            Storage::disk('images')->delete($imagen->image_path);
            $imagen->delete();
        }
        
        return redirect()->route('dashboard.index');
    }

    public function update(Request $request){
        $user = Auth::user();

        //Validando formulario
        $this->validate($request, [
            'descripcion'=>'string'
        ]);

        //Capturando datos de formulario de actualizacion
        $descripcion = $request->input('descripcion');
        $image_id = $request->input('image_id');
        $image = Image::find($image_id);

        if(isset($image)) {
            $image->descripcion = $descripcion;

            $image->update();
            return redirect()->route('imagen.detalle', $image_id)->with('message', 'Actualizacion exitosa');
            
        }



    }
    
}
