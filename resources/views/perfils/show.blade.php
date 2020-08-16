@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="" alt="">
            </div>

            <div class="col-md-7">
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
@endsection