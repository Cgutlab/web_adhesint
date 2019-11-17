<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AplicacionProducto extends Model
{
  protected $table = "aplicacion_productos";
  protected $fillable = [
    	'imagen','titulo','texto','orden','id_categoria'
  ];

  public function categorias()
  {
      return $this->belongsTo('App\AplicacionCategoria', 'id_categoria');
  }

  public function relacionados()
  {
      return $this->belongsToMany('App\ProductProducto', 'aplicacion_productos_pivo', 'id_aplicacion_producto', 'id_product_producto');
  }
}
