<?php

namespace App\Http\Controllers\page;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoCompresor;
use App\CategoriaCompresor;

class ProductocController extends Controller
{
	public function index($id)
  {
    $productoI = ProductoCompresor::where('id',$id)->first();
  	$producto = ProductoCompresor::where('id',$id)->first();

    $productos = ProductoCompresor::where('id_categorias_compresors',$producto->id_categorias_compresors)->orderBy('orden','asc')->get();
    $category  = CategoriaCompresor::find($producto->id_categorias_compresors);
    $categorias = CategoriaCompresor::orderBy('orden', 'asc')->get();

    $active='compresor1';
    return view('page.productocompresor', [
      'producto' => $producto,
      'productos' => $productos,
      'category' => $category,
      'productoI' => $productoI,
      'categorias' => $categorias,
      /*'metadato' => $metadato,*/
      'active' => $active
    ]);
  }
}
/*
@foreach($galeriaIs as $gal_princ)
            @if ($gal_princ == reset($galeriaIs )) First Item: @endif
@endforeach
*/