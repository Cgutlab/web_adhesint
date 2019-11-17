<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoNovedad;
use App\CategoriaNovedad;

class NovedadesController extends Controller
{
    public function index()
    {
    	$novedades = ProductoNovedad::all();  	
    	$categorys = CategoriaNovedad::orderBy('orden','asc')->get();
    	$categorias = CategoriaNovedad::orderBy('orden','asc')->get();
      $active='novedades';
         return view('page.novedades', compact('novedades','categorys', 'categorias', 'active'));
    }

    public function filter($id)
    {        
    	$categorias = CategoriaNovedad::orderBy('orden','asc')->get();
    	$categorys = CategoriaNovedad::orderBy('orden','asc')->where('id', $id)->get();
 		$novedades = ProductoNovedad::orderBy('orden','asc')->get();     
    $active='novedades';
        return view('page.novedades', compact('novedades','categorias','categorys','active'));
    }    

    public function buscar(Request $request)
    {
      $active='novedades';
        $buscar = $request->buscar;

        $categorias = CategoriaNovedad::orderBy('orden','asc')->get();
        $categorys = CategoriaNovedad::orderBy('orden','asc')->get();

        $novedades = ProductoNovedad::where('titulo',$buscar)->orWhere('titulo','like','%'.$buscar.'%')->get();   

        if(count($novedades)== 0){
          $novedades = ProductoNovedad::where('texto',$buscar)->orWhere('texto','like','%'.$buscar.'%')->get();  
        }

        return view('page.novedades', compact('novedades','categorias','categorys','active'));
    }
    
}