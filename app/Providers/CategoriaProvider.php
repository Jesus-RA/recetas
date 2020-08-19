<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Categoria;

class CategoriaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $categorias = Categoria::all();
            $view->with('categorias', $categorias);
        });
    }
}
