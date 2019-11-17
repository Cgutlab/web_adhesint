<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AplicacionCategoria extends Model
{
  protected $table = "aplicacion_categorias";
  protected $fillable = [
    'imagen','titulo','orden'
  ];

  public function productos()
  {
      return $this->hasMany('App\AplicacionProducto', 'id_categoria');
  }
}
