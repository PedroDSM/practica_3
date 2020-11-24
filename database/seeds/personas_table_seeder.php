<?php

use Illuminate\Database\Seeder;
use App\Modelos\persona;

class personas_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(persona::class,2)->create();
    }
}
