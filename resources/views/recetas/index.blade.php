@extends('layouts.app')

@section('buttons')

    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear Receta</a>

@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($recetas as $receta)
                    <tr>
                        <td>
                            <a href="{{ route('recetas.show', $receta) }}">
                                {{$receta->titulo}}
                            </a>
                        </td>
                        <td>Pizza</td>
                        <td>
                            <button class="btn btn-warning">Eliminar</button>
                            <button class="btn btn-danger">Editar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection