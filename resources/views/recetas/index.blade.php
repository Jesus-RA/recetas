@extends('layouts.app')

@section('buttons')

    @include('ui.navegacion')

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

        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>

        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white">
            <ul class="list-group">
                @empty(Auth::user()->recetas)
                    <p class="text-center">
                        Aún no tienes recetas guardas
                        <small class="d-block">Dale me gusta a las recetas y apareceran aquí</small> 
                    </p>
                @else
                    @foreach (Auth::user()->recipesLiked as $receta)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p>
                                {{ $receta->titulo }}
                            </p>
                            <a href="{{ route('recetas.show', $receta) }}" class="btn btn-outline-success text-uppercase">Ver</a>
                        </li>
                    @endforeach
                @endempty
            </ul>
        </div>

    </div>
@endsection