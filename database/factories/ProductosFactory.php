<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\producto;
use Faker\Generator as Faker;

$factory->define(producto::class, function (Faker $faker) {
    return [
        'usuario_id'=>$faker->numberBetween(1,2),
        'persona_id'=>$faker->numberBetween(1,2),
        'comentario_id'=>$faker->numberBetween(1,2),
        'Nombre_Producto'=>$faker->word(),
        'Descripcion'=>$faker->paragraph(1),
    ];
});
