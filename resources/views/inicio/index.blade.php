@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form action="{{ route('search.show') }}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra una receta para tu próxima comida</p>
                    <input type="search" name="search" class="form-control" placeholder="Buscar receta">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Últimas recetas</h2>
    
        <div class="owl-carousel owl-theme">
            @foreach ($recetasRecientes as $receta)
                    <div class="card">
                        <img src="{{ Storage::url($receta->imagen) }}" alt="receta{{$receta->titulo}}" class="card-img-top">
    
                        <div class="card-body">
                            <h3>{{ Str::title($receta->titulo) }}</h3>

                            <p>
                                {!! Str::words( strip_tags( $receta->preparacion ), 15 ) !!}
                            </p>

                            <a
                                href="{{ route('recetas.show', $receta) }}"
                                class="btn btn-primary btn-block font-weight-bold text-uppercase"
                            >
                                Ver receta
                            </a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    
    @if ( sizeof( $mostValuatedRecipes ) > 0 )
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
                Recetas más votadas
            </h2>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($mostValuatedRecipes as $receta)
                        @include('ui.receta')
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @foreach ($recetas as $key => $grupo)
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
                {{ str_replace('-', ' ', $key)}}
            </h2>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($grupo as $recipes)
                            @foreach ($recipes as $receta)
                                @include('ui.receta')
                            @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    
@endsection