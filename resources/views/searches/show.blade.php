@extends('layouts.app')

@section('content')
    <div class="container">

        @if( sizeof($recetas) <= 0 )
            <div class="text-center mx-auto">
                <h2 class="text-primary mt-5">Lo sentimos, al parecer aún no hay recetas que coincidan con tu búsqueda</h2>
                <a href="{{ route('register') }}" class="h4 mt-5">!Se el primero en agregar una¡</a>
            </div>
        @else
            <h2 class="titulo-categoria text-uppercase mb-4">
                Resultados búsqueda: {{$search}}
            </h2>
            <div class="row">
                @foreach ($recetas as $receta)
                    <div class="col-md-4">
                        @include('ui.receta')
                    </div>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-center mt-5">
            {{ $recetas->links() }}
        </div>

    </div>
@endsection