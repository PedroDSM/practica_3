<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\rol;
use Faker\Generator as Faker;

$factory->define(rol::class, function (Faker $faker) {
    return [
        'rol'=>$faker->randomElement(['Administrador','Usuario'])
    ];
});

