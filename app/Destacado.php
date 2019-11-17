<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
  protected $table = "destacados";
  protected $fillable = [
    'imagen','titulo','caption','route','seccion','orden'
   ];
}
