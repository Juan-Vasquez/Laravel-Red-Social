<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('user.config');
    }

    public function update(Request $request){
        $user = Auth::user();
        $id = $user->id;

        //Validando Formulario
        $datos = $this->validate($request, [
            'name'=>'string|max:255|',
            'username'=>'string|max:255|unique:users,username,'.$id,
            'email'=>'email|string|max:255|unique:users,email,'.$id,
            'phone' => 'string|max:11'
        ]);

        //Capturando datos del formulario
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $phone = $request->input('phone');

        //Subida de imagen
        $image = $request->file('file');
        if($image){
            $image_name = time().$image->getClientOriginalName();
            Storage::disk('users')->put($image_name, File::get($image));
            $user->image = $image_name;
        }

        //Asignando los valores a los objetas de BD
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->phone = $phone;

        //Actualizando la informacion en BD
        $user->update();

        return redirect()->route('config')->with(['flash'=>'Los cambios han sido guardados']);


    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
}
