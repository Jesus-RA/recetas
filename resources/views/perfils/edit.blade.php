@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
@endsection

@section('buttons')

<a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-circle-left w-6 h-6 icono"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
    Volver
</a>

@endsection

@section('content')
    <h1 class="text-center">Editar mi perfil</h1>
    
    <div class="row justify-content-center mt 5">
        <div class="col-md-10 bg-white p-3">
            <form
                action="{{ route('perfils.update', $perfil) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input 
                        type="text"
                        name="name"
                        id="name"
                        placeholder="name"
                        value="{{ old('name') ?? $perfil->user->name }}"
                        class="form-control"
                    >
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url">Pagina Web</label>
                    <input 
                        type="text"
                        name="url"
                        id="url"
                        placeholder="URL"
                        value="{{ old('url') ?? $perfil->user->url }}"
                        class="form-control"
                    >
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia" id="biografia" value="{{ old('biografia') ?? $perfil->biografia }}">
                    <trix-editor
                        input="biografia"
                        class="form-control @error('biografia') is-invalid @enderror"
                    ></trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @if ( $perfil->imagen )
                    <div class="mt-4">
                        <p class="text-primary">Imagen actual:</p>
                        <img src="{{ Storage::url($perfil->imagen) }}" alt="" width="300">
                    </div>
                @endif

                <div class="form-group mt-4">
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
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous" defer></script>
@endsection