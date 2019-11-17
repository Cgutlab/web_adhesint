<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AProducto;
use App\ACategoria;
use App\Metadato;

class AdhesivoController extends Controller
{
    public function index($id)
    {
        
        $aproductos = AProducto::where('id_categoria',$id)->orderBy('orden')->get();
        $acategory = ACategoria::find($id);
        $acategorias = ACategoria::orderBy('orden', 'asc')->get();
        /*$metadato= Metadato::where('seccion','aproductos')->first();*/
        //$galeria = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='adhesivos';
        return view('page.aproductos', [
            'aproductos' => $aproductos,
            'acategory' => $acategory,
            'acategorias' => $acategorias,
            /*'metadato' => $metadato,*/
            'active' => $active
        ]);
    }

    public function producto($id)
    {
        $producto = AProducto::where('id',$id)->first();

        $aproductos = AProducto::where('id_categoria',$producto->id_categoria)->orderBy('orden')->get();
        $familia = ACategoria::find($producto->id_categoria);
        $familias = ACategoria::orderBy('orden')->get();
        /*$metadato= Metadato::where('seccion','aproductos')->first();*/
        $galerias = galeria::where('id_producto',$id)->orderby('orden','ASC')->get();
        $active='adhesivos';

        $items= Relacionado::where('producto',$id)->get();
        $todos= AProducto::all();
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
            'aproductos' => $aproductos,
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
        $acategoriasX = ACategoria::where('id',$id)->orderBy('orden','ASC')->get();
    	$novedades = Novedad::orderBy('orden','asc')->get();  	
    	$acategorias = ACategoria::orderBy('orden','asc')->get();
    	    	
        $categoriax2 = ACategoria::orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','ASC')->get();

        return view('page.filter_novedades', [
            'acategorias' => $acategorias,
            'categoriax2' => $categoriax2,
            'novedades' => $novedades
        ]);
    }
*/

    
