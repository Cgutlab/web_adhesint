<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tiempo;

class TiempoController extends Controller
{
    public function index(){
    $tiempos = Tiempo::orderBy('orden', 'asc')->get();
    $active='tiempo';
    return view('page.tiempo', compact('tiempos','active'));
	}
}
