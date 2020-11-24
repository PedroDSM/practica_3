<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("usuario_id");
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->unsignedBigInteger("persona_id");
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedBigInteger("comentario_id");
            $table->foreign('comentario_id')->references('id')->on('comentarios');
            $table->string("Nombre_Producto", 50);
            $table->string("Descripcion", 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
