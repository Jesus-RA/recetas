@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
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

    @foreach ($recetas as $key => $grupo)
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
                {{ str_replace('-', ' ', $key)}}
            </h2>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($grupo as $recipes)
                            @foreach ($recipes as $recipe)
                                <div class=" mt-4">

                                    <div class="card shadow">
                                        <img src="{{ Storage::url($recipe->imagen) }}" alt="receta{{$recipe->titulo}}" class="card-img-top">
        
                                        <div class="card-body">
                                            <h3 class="">{{ Str::title($recipe->titulo) }}</h3>
        
                                            <div class="meta-receta d-flex justify-content-between">
                                                <p class="text-primary fecha font-weight-bold">
                                                    <fecha-receta
                                                        fecha="{{$recipe->created_at}}"
                                                    ></fecha-receta>
                                                </p>

                                                <p>
                                                    {{ count($recipe->likes)}} Les gustó
                                                </p>
                                            </div>

                                            <p class="card-text">
                                                {!! Str::words( strip_tags($recipe->preparacion), 20) !!}
                                            </p>
        
                                            <a
                                                href="{{ route('recetas.show', $recipe) }}" class="btn btn-primary btn-block font-weigth-bold text-uppercase"
                                            >Ver receta</a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

@endsection