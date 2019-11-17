<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Metadato;

class TextilController extends Controller
{
    public function index($id)
    {
        
        $productos = Producto::where('id_categoria',$id)->orderBy('orden')->get();
        $category = Categoria::find($id);
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        /*$metadato= Metadato::where('seccion','productos')->first();*/
        //$galeria = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='textiles';
        return view('page.productos', [
            'productos' => $productos,
            'category' => $category,
            'categorias' => $categorias,
            /*'metadato' => $metadato,*/
            'active' => $active
        ]);
    }

    public function producto($id)
    {
        $producto = Producto::where('id',$id)->first();

        $productos = Producto::where('id_categoria',$producto->id_categoria)->orderBy('orden')->get();
        $familia = Categoria::find($producto->id_categoria);
        $familias = Categoria::orderBy('orden')->get();
        /*$metadato= Metadato::where('seccion','productos')->first();*/
        $galerias = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='productos';

        $items= Relacionado::where('producto',$id)->get();
        $todos= Producto::all();
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
        $categoriasX = Categoria::where('id',$id)->orderBy('orden','ASC')->get();
    	$novedades = Novedad::orderBy('orden','asc')->get();  	
    	$categorias = Categoria::orderBy('orden','asc')->get();
    	    	
        $categoriax2 = Categoria::orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','ASC')->get();

        return view('page.filter_novedades', [
            'categorias' => $categorias,
            'categoriax2' => $categoriax2,
            'novedades' => $novedades
        ]);
    }
*/

    
