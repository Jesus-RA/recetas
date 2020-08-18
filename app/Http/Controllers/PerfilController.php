<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Receta;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        $recetas = Receta::where('user_id', $perfil->user_id)->paginate(10);
        return view('perfils.show', compact('perfil', 'recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);

        return view('perfils.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->authorize('update', $perfil);

        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'biografia' => 'required',
            'imagen' => 'image',
        ]);

        $perfil->user->fill($request->all());
        $perfil->user-> save();

        $perfil->fill($request->all());

        if( $request->hasFile('imagen') ){
            $perfil->imagen = $request->File('imagen')->store('upload-perfiles', 'public');

            $img = Image::make( public_path("storage/{$perfil->imagen}") )->fit(600, 600);
            $img->save();
        }

        $perfil->save();

        return redirect()->route('perfils.show', $perfil);
    }

}
