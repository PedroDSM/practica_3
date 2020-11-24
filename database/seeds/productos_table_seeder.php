<?php

use Illuminate\Database\Seeder;
use App\Modelos\producto;

class productos_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(producto::class,2)->create();
    }
}
