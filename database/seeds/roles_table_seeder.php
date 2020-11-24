<?php

use Illuminate\Database\Seeder;
use App\Modelos\rol;

class roles_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(rol::class,2)->create();
    }
}
