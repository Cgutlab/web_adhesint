<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
  protected $table = "marcas";
  protected $fillable = [
    'imagen','titulo','orden', 'visible_home'
  ];

  public function productos()
  {
      return $this->belongsToMany('App\Producto', 'product_productos_marcas', 'id_marca', 'id_producto');
  }
}
