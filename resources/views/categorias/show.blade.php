@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mb-4"> Categoría: {{ $categoria->nombre }}</h2>

        <div class="row">
            @foreach ($recetas as $receta)
                <div class="col-md-4">
                    @include('ui.receta')
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $recetas->links() }}
        </div>

    </div>
@endsection