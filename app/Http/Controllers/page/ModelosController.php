<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModeloContenido;
use App\ModeloGaleria;

class ModelosController extends Controller
{
    public function index($id){
	    $modeloscontenidos = ModeloContenido::where('id', $id)->first();
	    $modelosgalerias = ModeloGaleria::where('seccion', $id)->orderBy('orden', 'asc')->get();
	    $active='modelos/'.$id;
	    return view('page.modelos', compact('modeloscontenidos','modelosgalerias','active'));
	}
}
