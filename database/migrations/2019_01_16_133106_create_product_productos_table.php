<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('imagen');
            $table->text('titulo');
            $table->text('texto');
            $table->text('caption');
            $table->text('ficha');
            $table->text('orden');
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_categoria')->references('id')->on('product_categorias')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_productos_marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->unsigned()->nullable();
            $table->foreign('id_producto')->references('id')->on('product_productos')->onDelete('cascade');
            $table->integer('id_marca')->unsigned()->nullable();
            $table->foreign('id_marca')->references('id')->on('marcas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_productos_present', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->unsigned()->nullable();
            $table->foreign('id_producto')->references('id')->on('product_productos')->onDelete('cascade');
            $table->integer('id_presentacion')->unsigned()->nullable();
            $table->foreign('id_presentacion')->references('id')->on('presentaciones')->onDelete('cascade');
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
        Schema::dropIfExists('product_productos');
    }
}
