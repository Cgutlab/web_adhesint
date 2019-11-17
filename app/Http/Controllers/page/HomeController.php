<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destacado;
use App\Contenido;
use App\Slider;
use App\Red;
use App\Metadato;

class HomeController extends Controller
{
    public function __construct(){
      $active = 'home';
    }

    public function index(){
      $active = $this->active;
      $metadato    = Metadato::where('seccion', $active)->first();
    	$sliders     = Slider::where('seccion', $active)->orderBy('orden','asc')->get();
      $destacados  = Destacado::where('seccion', $active)->orderBy('orden','asc')->get();

      $marcas      = Marca::orderBy('orden','asc')->get();

      return view('page.home', compact('active', 'metadato', 'sliders', 'destacados', 'marcas'));
    }
}
