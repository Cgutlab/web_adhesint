<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
  protected $table = "metadata";
  protected $fillable = [
    'seccion','keyword','orden','text'
  ];
}
