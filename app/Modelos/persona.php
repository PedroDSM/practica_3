<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
         /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personas';
    public $timestamps = false;
}
