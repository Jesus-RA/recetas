<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Categoria;

class RecetaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    // If we only have one method so we have to call that method __invoke by that way
    // in the route we only have to write the controller name
    // public function __invoke(){
    //     return view('nosotros');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::all();
        return view('recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('recetas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required',
            'categoria_id' => 'required',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'imagen' => 'required|image',
        ]);
        
        $request->imagen = $request['imagen']->store('upload-recetas', 'public');

        $user = $request->user();
        $receta = $user->recetas()->make($request->all());
        $receta->imagen = $request->imagen;
        $receta->save();

        return redirect()->route('recetas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = Receta::findOrFail($id);
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
