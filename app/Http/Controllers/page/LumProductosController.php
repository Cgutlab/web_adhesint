<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\Galeria;

class ProductosController extends Controller
{
    public function index()
    {
    	$id = Producto::all();

    	$productos = Producto::orderBy('orden','asc')->get();

    	$galerias  = Galeria::where('id_producto',$id)->get();
      $galeriaI   =  Galeria::where('id_producto', $id)->first();

      $active='productos';

/*
    	foreach($galerias as $galeria){
    	$sql=print_r($galeria->id);
		}
		dd("Hola: ".$sql);
*/
    	$contador = 0;
 
        return view('page.productos', compact('productos','galerias', 'id', 'galeriaI','active'));
    }
}