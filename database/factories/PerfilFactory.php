<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'imagen' => $faker->randomElement([
            '/images/chef1.png',
            '/images/chef2.jpg'
        ]),
        'biografia' => $faker->paragraph(50),
    ];
});
