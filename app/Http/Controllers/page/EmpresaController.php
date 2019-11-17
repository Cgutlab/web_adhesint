<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contenido;
use App\Metadato;
use App\Slider;

class EmpresaController extends Controller
{
    public function index(){
      $active = 'empresa';
    	$sliders   = Slider::where('seccion', $active)->orderBy('orden','asc')->get();
    	$contenido = Contenido::where('seccion', $active)->first();
    	$metadatos = Metadato::where('seccion', $active)->orderBy('orden','asc')->get();
      $active='empresa';
    	 return view('page.empresa', compact('empresa','active','sliders','tiempos','metadatos','contenido'));
    }
}
