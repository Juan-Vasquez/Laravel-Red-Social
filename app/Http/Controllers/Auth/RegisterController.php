<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }
    
    public function register(){
        $this->validate(request(), [
            'name'=>'required|string',
            'username'=>'required|string|unique:users',
            'email'=>'required|string|unique:users',
            'password'=>'required|string|confirmed'
        ]);

        $register = User::create([
            'role'=>'usuario',
            'name'=>request('name'),
            'username'=>request('username'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password'))
        ]);

        if($register){
            return back()->with('message', 'Te has registrado exitosamente');
        }
    }
}
