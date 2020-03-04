<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.login');
    }

    public function login(){
        $credentials = $this->validate(request(), [
            'email'=>'email|required|string',
            'password'=>'required|string'
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->route('dashboard.index');
        } else {
            return back()->with('message', 'El email o la contrasena no son validos');
        }
    }
}
