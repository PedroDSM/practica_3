<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class comentarios_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,2) as $index){
            DB::table('comentarios')->insert([
                'usuario_id'=>$faker->numberBetween(1,2),
                'persona_id'=>$faker->numberBetween(1,2),
                'contenido'=>$faker->paragraph(1),
            ]);
        }
    }
}