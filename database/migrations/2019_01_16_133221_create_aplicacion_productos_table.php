<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicacionProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacion_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('imagen');
            $table->text('titulo');
            $table->text('texto');
            $table->text('orden');
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_categoria')->references('id')->on('aplicacion_categorias')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('aplicacion_productos_pivo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product_producto')->unsigned()->nullable();
            $table->foreign('id_product_producto')->references('id')->on('aplicacion_productos')->onDelete('cascade');
            $table->integer('id_aplicacion_producto')->unsigned()->nullable();
            $table->foreign('id_aplicacion_producto')->references('id')->on('aplicacion_productos')->onDelete('cascade');
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
        Schema::dropIfExists('aplicacion_productos');
    }
}
