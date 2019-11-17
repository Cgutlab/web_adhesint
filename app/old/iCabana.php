<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iCabana extends Model
{
    protected $table = "icabanas";
    protected $fillable = [
		  'titulo','subtitulo','texto','orden'
	  ];

    public function igalerias() {
        return $this->hasMany('App\iGaleria', 'id_cabana');
    }
}
