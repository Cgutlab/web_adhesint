<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calidad;
use App\Descarga;

class CalidadController extends Controller
{
    public function index(){
    $calidad = Calidad::find(1);
    $descargas = Descarga::all();
    $active='calidad';
    return view('page.calidad', compact('calidad','active','descargas'));
  }
}
