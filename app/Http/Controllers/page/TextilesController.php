<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

/* CategoriasController */
class TextilesController extends Controller
{
    public function index()
    {
      $categorias = Categoria::orderBy('id','asc')->get();
      $active='textiles';
         return view('page.categorias', compact('categorias','active'));
    }

    public function cates()
    {
      $categorias = Categoria::all();    
      $active='textiles';
         return view('page.categorias', compact('categorias','active'));
    }

    public function filter($id)
    {        
      $kategorias = Categoria::orderBy('orden','asc')->get();
      $kategorys = Categoria::orderBy('orden','asc')->where('id', $id)->get();
      $categorias = Categoria::orderBy('orden','asc')->get();     
      $active='textiles';
        return view('page.categorias', compact('categorias','kategorias','kategorys','active'));
    }    



    public function buscar(Request $request)
    {
      $active='textiles';
        $buscar = $request->buscar;

        $kategorias = Categoria::orderBy('orden','asc')->get();
        $kategorys = Categoria::orderBy('orden','asc')->get();

        $categorias = Categoria::where('titulo',$buscar)->orWhere('titulo','like','%'.$buscar.'%')->get();   

        if(count($categorias)== 0){
          $categorias = Categoria::where('breve',$buscar)->orWhere('breve','like','%'.$buscar.'%')->get();  
        }

        return view('page.categorias', compact('categorias','kategorias','kategorys','active'));
    }
    
}