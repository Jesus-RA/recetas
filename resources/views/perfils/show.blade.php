@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagen)
                <img src="{{ Storage::url($perfil->imagen) }}" alt="perfil{{$perfil->user->name}}" width="100%" class="rounded-circle">
                @endif
            </div>

            <div class="col-md-7 mt-5 m5-md-0">
                <h2 class="text-center mb-2 text-primary">
                    {{$perfil->user->name}}
                </h2>

                <a href="{{$perfil->user->url}}" target="_blank">Visitar sitio web</a>

                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>

            </div>
        </div>
    </div>

    <h2 class="text-center my-5">Recetas creadas por {{ $perfil->user->name }}</h2>

    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @empty($recetas)
                <p class="text-center w-100 text-primary">No hay recetas aún...</p>
            @else
                @foreach ($recetas as $receta)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ Storage::url($receta->imagen) }}" alt="receta{{ $receta->titulo }}" class="card-img-top">

                            <div class="card-body">
                                <h3 class="text-center text-primary">{{ $receta->titulo }}</h3>
                                <a href="{{ route('recetas.show', $receta) }}" class="btn btn-primary btn-block mt-4 text-uppercase font-weight-bold">Ver receta</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endempty

        </div>

        <div class="d-flex justify-content-center">
            {{ $recetas->links() }}
        </div>

    </div>
@endsection