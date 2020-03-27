<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function like($id_image) {
        //Datos de usuario
        $user = Auth::user();

        $isset_like = Like::where('fk_users', $user->id)->where('fk_images', $id_image)->count();

        if ($isset_like == 0) {
            $like = new Like();
            $like->fk_users = $user->id;
            $like->fk_images = $id_image;

            $like->save();

            return response()->json([
                'mensaje'=>$like,
            ]);
        }
        


    }

    public function disLike($id_image) {
        $user = Auth::user();

        $like = Like::where('fk_users', $user->id)->where('fk_images', $id_image)->first();

        if($like) {
            $like->delete();

            return response()->json([
                'mensaje' => $like
            ]);
        }     
    }

}
