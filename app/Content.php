<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  protected $table = "contents";
  protected $fillable = [
    	'imagen','titulo1','titulo2','caption1','caption2','text1','text2','seccion','orden'
  ];
}
