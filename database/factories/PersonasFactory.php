<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\persona;
use Faker\Generator as Faker;

$factory->define(persona::class, function (Faker $faker) {
    return [
        'usuario_id'=>$faker->numberBetween(1,2),
        'Nombre'=>$faker->firstName(),
        'Apellido_paterno'=>$faker->lastname(),
        'Apellido_materno'=>$faker->lastname(),
    ];
});
