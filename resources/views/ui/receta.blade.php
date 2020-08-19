<div class="mt-4">

    <div class="card shadow">
        <img src="{{ Storage::url($receta->imagen) }}" alt="receta{{$receta->titulo}}" class="card-img-top">

        <div class="card-body">
            <h3 class="">{{ Str::title($receta->titulo) }}</h3>

            <div class="meta-receta d-flex justify-content-between">
                <p class="text-primary fecha font-weight-bold">
                    <fecha-receta
                        fecha="{{$receta->created_at}}"
                    ></fecha-receta>
                </p>

                <p>
                    {{ count($receta->likes)}} Les gustó
                </p>
            </div>

            <p class="card-text">
                {!! Str::words( strip_tags($receta->preparacion), 20) !!}
            </p>

            <a
                href="{{ route('recetas.show', $receta) }}" class="btn btn-primary btn-block font-weigth-bold text-uppercase"
            >Ver receta</a>
        </div>
    </div>
</div>