<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iGaleria extends Model
{
    protected $table = "igalerias";
    protected $fillable = [
		  'imagen','orden','id_cabana'
	  ];

    public function igalerias() {
        return $this->belongsTo('App\iCabana', 'id_cabana');
    }
}
