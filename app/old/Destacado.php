<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
    protected $fillable = [
		'imagen','titulo','ruta','orden'
	];
}
