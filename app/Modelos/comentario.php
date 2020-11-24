<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
         /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comentarios';
    public $timestamps = false;
}
