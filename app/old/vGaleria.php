<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vGaleria extends Model
{
    protected $table = "vgalerias";
    protected $fillable = [
  		'imagen','orden','id_categoria'
  	];

    // categorias
    public function vgalerias() {
        return $this->belongsTo('App\vCategoria', 'id_categoria');
    }
}
