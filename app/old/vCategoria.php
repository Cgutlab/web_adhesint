<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vCategoria extends Model
{
    protected $table = "vcategorias";
    protected $fillable = [
  		'titulo','orden'
  	];

    public function vgalerias() {
        return $this->hasMany('App\vGaleria', 'id_categoria');
    }
}
