<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "banners";
    protected $fillable = [
      'imagen','titulo1','titulo2','caption1','caption2','item1','item2','item3','seccion','orden','texto'
    ];
}
