<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProducto extends Model
{
  protected $table = "product_productos";
  protected $fillable = [
    'imagen','titulo','texto','caption','ficha','orden','id_categoria', 'keywords'
  ];

  public function categorias()
  {
      return $this->belongsTo('App\ProductCategoria', 'id_categoria');
  }

  public function marcas()
  {
      return $this->belongsToMany('App\Marca', 'product_productos_marcas', 'id_producto', 'id_marca');
  }

  public function presentaciones()
  {
      return $this->belongsToMany('App\Presentacion', 'product_productos_present', 'id_producto', 'id_presentacion');
  }

  public function relacionados()
  {
      return $this->belongsToMany('App\Producto', 'product_productos_present', 'id_product_producto', 'id_aplicacion_producto');
  }
}
