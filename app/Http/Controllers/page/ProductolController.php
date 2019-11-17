<?php

namespace App\Http\Controllers\page;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoLuminaria;
use App\CategoriaLuminaria;

class ProductolController extends Controller
{
	public function index($id)
  {
    $productoI = ProductoLuminaria::where('id',$id)->first();
  	$producto = ProductoLuminaria::where('id',$id)->first();

    $productos = ProductoLuminaria::where('id_categorias_luminarias',$producto->id_categorias_luminarias)->orderBy('orden','asc')->get();
    $category  = CategoriaLuminaria::find($producto->id_categorias_luminarias);
    $categorias = CategoriaLuminaria::orderBy('orden', 'asc')->get();

    $active='luminaria4';
    return view('page.productoluminaria', [
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