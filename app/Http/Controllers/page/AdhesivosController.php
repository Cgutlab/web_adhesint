<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ACategoria;

/* ACategoriasController */
class AdhesivosController extends Controller
{
    public function index()
    {
      $acategorias = ACategoria::all();    
      $active='adhesivos';
         return view('page.acategorias', compact('acategorias','active'));
    }

    public function cates()
    {
      $acategorias = ACategoria::all();    
      $active='adhesivos';
         return view('page.acategorias', compact('acategorias','active'));
    }

    public function filter($id)
    {        
      $kategorias = ACategoria::orderBy('orden','asc')->get();
      $kategorys = ACategoria::orderBy('orden','asc')->where('id', $id)->get();
      $acategorias = ACategoria::orderBy('orden','asc')->get();     
      $active='adhesivos';
        return view('page.acategorias', compact('acategorias','kategorias','kategorys','active'));
    }    



    public function buscar(Request $request)
    {
      $active='adhesivos';
        $buscar = $request->buscar;

        $kategorias = ACategoria::orderBy('orden','asc')->get();
        $kategorys = ACategoria::orderBy('orden','asc')->get();

        $acategorias = ACategoria::where('titulo',$buscar)->orWhere('titulo','like','%'.$buscar.'%')->get();   

        if(count($acategorias)== 0){
          $acategorias = ACategoria::where('breve',$buscar)->orWhere('breve','like','%'.$buscar.'%')->get();  
        }

        return view('page.acategorias', compact('acategorias','kategorias','kategorys','active'));
    }
    
}