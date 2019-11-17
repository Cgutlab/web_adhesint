<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Solucion;

class SolucionController extends Controller
{
    public function index(){
    $solucion = Solucion::find(1);
    $active='soluciones';
    return view('page.soluciones', compact('solucion','active'));
  }
}
