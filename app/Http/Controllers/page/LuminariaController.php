<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoLuminaria;
use App\CategoriaLuminaria;
use App\Metadato;

class LuminariaController extends Controller
{
    public function index($id)
    {        
        $productos = ProductoLuminaria::where('id_categorias_luminarias',$id)->orderBy('orden')->get();
        $category = CategoriaLuminaria::find($id);
        $categorias = CategoriaLuminaria::orderBy('orden', 'asc')->get();
        /*$metadato= Metadato::where('seccion','productos')->first();*/
        //$galeria = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='luminaria4';
        return view('page.productosluminarias', [
            'productos' => $productos,
            'category' => $category,
            'categorias' => $categorias,
            /*'metadato' => $metadato,*/
            'active' => $active
        ]);
    }

    public function producto($id)
    {
        $producto = ProductoLuminaria::where('id',$id)->first();

        $productos = ProductoLuminaria::where('id_categorias_luminarias',$producto->id_categorias_luminarias)->orderBy('orden')->get();
        $familia = CategoriaLuminaria::find($producto->id_categorias_luminarias);
        $familias = CategoriaLuminaria::orderBy('orden')->get();
        /*$metadato= Metadato::where('seccion','productos')->first();*/
        $galerias = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='productos';

        $items= Relacionado::where('producto',$id)->get();
        $todos= ProductoLuminaria::all();
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
        $categoriasX = CategoriaLuminaria::where('id',$id)->orderBy('orden','ASC')->get();
    	$novedades = Novedad::orderBy('orden','asc')->get();  	
    	$categorias = CategoriaLuminaria::orderBy('orden','asc')->get();
    	    	
        $categoriax2 = CategoriaLuminaria::orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','ASC')->get();

        return view('page.filter_novedades', [
            'categorias' => $categorias,
            'categoriax2' => $categoriax2,
            'novedades' => $novedades
        ]);
    }
*/

    
