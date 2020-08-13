<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement([
            'Comida Mexicana',
            'Comida Italiana',
            'Comida Argentina',
            'Postres',
            'Cortes',
            'Ensaladas',
            'Desayunos',
        ]),
    ];
});
