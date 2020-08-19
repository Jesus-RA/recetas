@extends('layouts.app')

@section('buttons')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary">Recetas</a>
@endsection

@section('content')
    <article class="contenido-receta bg-white p-5 shadow-lg">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>

        <div class="image-receta">
            <img src="{{Storage::url($receta->imagen)}}" alt="" class="w-100">
        </div>
        
        <div class="receta-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                <a href="{{ route('categorias.show', $receta->categoria) }}" class="text-dark">
                    {{$receta->categoria->nombre}}
                </a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                <a href="{{ route('perfils.show', $receta->user) }}" class="text-dark">
                    {{$receta->user->name}}
                </a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>
                <fecha-receta fecha="{{ $receta->created_at }}"></fecha-receta>
            </p>

            <div class="ingredientes">
                <h2 class="my-4 text-primary">Ingredientes</h2>
                {!! $receta->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-4 text-primary">Preparación</h2>
                {!! $receta->preparacion !!}
            </div>

            <div class="justify-content-center row text-center">
                <like-button
                    receta="{{ $receta->id }}"
                    liked="{{ $liked }}"
                    likes="{{$likes}}"
                ></like-button>
            </div>

        </div>
    </article>
@endsection