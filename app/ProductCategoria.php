<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategoria extends Model
{
  protected $table = "product_categorias";
  protected $fillable = [
    'imagen','titulo','orden','visible_home'
  ];

  public function categorias()
  {
      return $this->hasMany('App\ProductProducto', 'id_categoria');
  }
}
