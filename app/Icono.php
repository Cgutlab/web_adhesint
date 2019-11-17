<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icono extends Model
{
  protected $table = "iconos";
  protected $fillable = [
    'imagen','titulo','orden','seccion'
  ];
}
