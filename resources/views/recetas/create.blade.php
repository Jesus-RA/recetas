@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
@endsection

@section('buttons')

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Recetas</a>

@endsection

@section('content')
    <h2 class="text-center mb-5">Crear nueva receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form 
                action=" {{route('recetas.store')}} "
                method="POST"
                novalidate
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        placeholder="Titulo Receta"
                        class="form-control @error ('titulo') is-invalid @enderror"
                        value="{{ old('titulo') }}"
                        required
                    >
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{$message}} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select 
                        name="categoria_id"
                        id="categoria_id"
                        class="form-control @error('categoria_id') is-invalid @enderror"
                    >
                        <option value="">-- Seleccionar --</option>
                        @foreach ($categorias as $categoria)
                            <option 
                                value="{{ $categoria->id }}"
                                {{ old('categoria_id') == $categoria->id ? 'selected' : ''}}
                            >
                                {{$categoria->nombre}}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{ old('ingredientes') }}">
                    <trix-editor
                        input="ingredientes"
                        class="form-control @error('ingredientes') is-invalid @enderror"
                    ></trix-editor>

                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{ old('preparacion') }}">
                    <trix-editor
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror"
                    ></trix-editor>

                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input
                        type="FILE"
                        name="imagen"
                        id="imagen"
                        class="form-control @error('imagen') is-invalid @enderror"
                    >
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous"></script>
@endsection