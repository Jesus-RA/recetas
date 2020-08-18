<?php

namespace App\Http\Controllers;

use App\Receta;
use App\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        // Getting the latest recipes
        $recetasRecientes = Receta::latest()->take(6)->get();

        $categorias = Categoria::all();
        $recetas = [];

        foreach ($categorias as $categoria){
            $recetas[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->get();
        }

        return view('inicio.index', compact('recetasRecientes', 'recetas'));
    }
}
