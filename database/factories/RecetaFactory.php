<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Receta;
use Faker\Generator as Faker;

$factory->define(Receta::class, function (Faker $faker) {
    return [
        'titulo' => $faker->safeColorName,
        'ingredientes' => $faker->paragraph(5),
        'preparacion' => $faker->paragraph(5),
        'imagen' => $faker->randomElement([
            'receta1',
            'receta2',
        ]),
        'user_id' => $faker->randomDigit,
        'categoria_id' => $faker->randomDigit,
    ];
});
