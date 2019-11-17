<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoAlambrado;

class ProductosController extends Controller
{
    public function index($id)
    {
        $productos = ProductoAlambrado::where('seccion', $id)->orderBy('orden', 'asc')->get();

        $active='productos/'.$id;

    	$contador = 0;
 
        return view('page.productos', compact('productos','galerias', 'galeriaI','active'));
    }
}