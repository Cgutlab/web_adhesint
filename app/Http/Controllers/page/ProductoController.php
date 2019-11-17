<?php

namespace App\Http\Controllers\page;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoAlambrado;

class ProductoController extends Controller
{
    public function index($id)
    {    	
    	$productoIs = ProductoAlambrado::where('id',$id)->orderBy('orden', 'asc')->first();
    	$productos = ProductoAlambrado::orderBy('orden', 'asc')->get();

    	$active='productos/'.$productoIs->seccion;

    	$contador = 0;
 
        return view('page.producto', compact('productoIs','productos','active','contador'));
    }
}