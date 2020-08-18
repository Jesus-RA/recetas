<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;

class LikesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function update(Request $request, Receta $receta)
    {
        // Store recipes user's likes
        return auth()->user()->recipesLiked()->toggle($receta);
    }

}
