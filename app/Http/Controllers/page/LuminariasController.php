<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriaLuminaria;

/* CategoriaLuminariasController */
class LuminariasController extends Controller
{
    public function index()
    {
      $categorialuminarias = CategoriaLuminaria::orderBy('id','asc')->get();
      $active='luminaria4';
         return view('page.categorialuminaria', compact('categorialuminarias','active'));
    }

    public function cates()
    {
      $categorialuminaria = CategoriaLuminaria::all();    
      $active='luminaria4';
         return view('page.categorialuminaria', compact('categorialuminaria','active'));
    }

    public function filter($id)
    {        
      $kategorias = CategoriaLuminaria::orderBy('orden','asc')->get();
      $kategorys = CategoriaLuminaria::orderBy('orden','asc')->where('id', $id)->get();
      $categorialuminaria = CategoriaLuminaria::orderBy('orden','asc')->get();     
      $active='luminaria4';
        return view('page.categorialuminaria', compact('categorialuminaria','kategorias','kategorys','active'));
    }    



    public function buscar(Request $request)
    {
      $active='luminaria4';
        $buscar = $request->buscar;

        $kategorias = CategoriaLuminaria::orderBy('orden','asc')->get();
        $kategorys = CategoriaLuminaria::orderBy('orden','asc')->get();

        $categorialuminaria = CategoriaLuminaria::where('titulo',$buscar)->orWhere('titulo','like','%'.$buscar.'%')->get();   

        if(count($categorialuminaria)== 0){
          $categorialuminaria = CategoriaLuminaria::where('breve',$buscar)->orWhere('breve','like','%'.$buscar.'%')->get();  
        }

        return view('page.categorialuminaria', compact('categorialuminaria','kategorias','kategorys','active'));
    }
    
}