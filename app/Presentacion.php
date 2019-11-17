<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
  protected $table = "presentaciones";
  protected $fillable = [
    'ico','imagen','titulo','peso','orden'
  ];

  public function productos()
  {
      return $this->belongsToMany('App\Producto', 'product_productos_present', 'id_presentacion', 'id_producto');
  }
}
