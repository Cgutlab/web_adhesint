<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadato extends Model
{
    protected $table = "metadatos";
    protected $fillable = [
		'keyword','tipo', 'texto', 'orden'
    ];
}
