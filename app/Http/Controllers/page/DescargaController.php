<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Descarga;

class DescargaController extends Controller
{
	public function index(){
    $descargas = Descarga::all();
    return view('page.descargas', compact('descargas','active'));
	}
}
