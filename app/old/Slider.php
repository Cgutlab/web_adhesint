<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "sliders";	
    protected $fillable = [
		'imagen','titulo','subtitulo','orden','seccion'
	];
}
