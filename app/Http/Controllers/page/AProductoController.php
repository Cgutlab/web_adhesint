<?php

namespace App\Http\Controllers\page;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AProducto;
use App\ACategoria;

class AProductoController extends Controller
{
	public function index($id)
  {
    $aproductoI = AProducto::where('id',$id)->first();
  	$aproducto = AProducto::where('id',$id)->first();

    $aproductos = AProducto::where('id_categoria',$aproducto->id_categoria)->orderBy('orden','asc')->get();
    $acategory  = ACategoria::find($aproducto->id_categoria);
    $acategorias = ACategoria::orderBy('orden', 'asc')->get();

    $active='adhesivos';
    return view('page.aproducto', [
      'aproducto' => $aproducto,
      'aproductos' => $aproductos,
      'acategory' => $acategory,
      'aproductoI' => $aproductoI,
      'acategorias' => $acategorias,
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