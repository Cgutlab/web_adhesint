<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoNovedad;
use App\CategoriaNovedad;
use App\GaleriaNovedad;

class NovedadController extends Controller
{
    public function index($id)
    {
        $novedadI = ProductoNovedad::where('id',$id)->first();
        $categorI = CategoriaNovedad::where('id',$id)->first();
        $galerias = GaleriaNovedad::where('id_productos_novedads',$id)->get();

    	$categorias = CategoriaNovedad::orderBy('orden','id')->get();
    
        $active='novedades';

        return view('page.novedad', compact('novedadI','categorI', 'categorias', 'active', 'galerias'));
    }

}

/*
    public function show($id)
    { 	
        $categoriasX = CategoriaNovedad::where('id',$id)->orderBy('orden','ASC')->get();
    	$novedades = ProductoNovedad::orderBy('orden','asc')->get();  	
    	$categorias = CategoriaNovedad::orderBy('orden','asc')->get();
    	    	
        $categoriax2 = CategoriaNovedad::orderBy('orden','ASC')->get();
        $novedades = ProductoNovedad::orderBy('orden','ASC')->get();

        return view('page.filter_novedades', [
            'categorias' => $categorias,
            'categoriax2' => $categoriax2,
            'novedades' => $novedades
        ]);
    }
*/

    
