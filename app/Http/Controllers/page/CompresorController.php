<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoCompresor;
use App\CategoriaCompresor;
use App\Metadato;

class CompresorController extends Controller
{
    public function index($id)
    {        
        $productos = ProductoCompresor::where('id_categorias_compresors',$id)->orderBy('orden')->get();
        $category = CategoriaCompresor::find($id);
        $categorias = CategoriaCompresor::orderBy('orden', 'asc')->get();
        /*$metadato= Metadato::where('seccion','productos')->first();*/
        //$galeria = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='compresor1';
        return view('page.productoscompresors', [
            'productos' => $productos,
            'category' => $category,
            'categorias' => $categorias,
            /*'metadato' => $metadato,*/
            'active' => $active
        ]);
    }

    public function producto($id)
    {
        $producto = ProductoCompresor::where('id',$id)->first();

        $productos = ProductoCompresor::where('id_categorias_compresors',$producto->id_categorias_compresors)->orderBy('orden')->get();
        $familia = CategoriaCompresor::find($producto->id_categorias_compresors);
        $familias = CategoriaCompresor::orderBy('orden')->get();
        /*$metadato= Metadato::where('seccion','productos')->first();*/
        $galerias = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='productos';

        $items= Relacionado::where('producto',$id)->get();
        $todos= ProductoCompresor::all();
        $relacionados=[];
        $cont=0;
        foreach ($items as $key) {
            foreach ($todos as $todo) {
                if ($key->relacion==$todo->id) {
                    $relacionados[$cont]=$todo;
                    $cont++;
                }
            }
        }

        return view('page.producto', [
            'productos' => $productos,
            'producto' => $producto,
            'galerias' => $galerias,
            'familia' => $familia,
            'familias' => $familias,
            'relacionados' => $relacionados,
            'metadato' => $metadato,
            'active' => $active
        ]);
    }
}

/*
    public function show($id)
    { 	
        $categoriasX = CategoriaCompresor::where('id',$id)->orderBy('orden','ASC')->get();
    	$novedades = Novedad::orderBy('orden','asc')->get();  	
    	$categorias = CategoriaCompresor::orderBy('orden','asc')->get();
    	    	
        $categoriax2 = CategoriaCompresor::orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','ASC')->get();

        return view('page.filter_novedades', [
            'categorias' => $categorias,
            'categoriax2' => $categoriax2,
            'novedades' => $novedades
        ]);
    }
*/

    
