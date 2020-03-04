<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Image;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        return view('dashboard', [
            'images' => Image::orderBy('id', 'desc')->paginate(3)
        ]); 
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
}
