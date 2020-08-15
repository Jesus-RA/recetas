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
                        <th>
                            <a href="{{ route('recetas.show', $receta) }}">
                                {{$receta->titulo}}
                            </a>
                        </th>
                        <td>{{ $receta->categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('recetas.edit', $receta) }}" class="btn btn-warning">Editar</a>

                            {{-- Deleting with axios and Vue js --}}
                            <eliminar-receta
                                receta-id="{{$receta->id}}"
                            ></eliminar-receta>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection