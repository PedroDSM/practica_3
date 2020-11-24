<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
         /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'productos';
    public $timestamps = false;
}
