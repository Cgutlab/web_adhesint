<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriaCompresor;

/* CategoriaCompresorsController */
class CompresorsController extends Controller
{
    public function index()
    {
      $categoriacompresors = CategoriaCompresor::orderBy('id','asc')->get();
      $active='compresor1';
         return view('page.categoriacompresor', compact('categoriacompresors','active'));
    }

    public function cates()
    {
      $categoriacompresor = CategoriaCompresor::all();    
      $active='compresor1';
         return view('page.categoriacompresor', compact('categoriacompresor','active'));
    }

    public function filter($id)
    {        
      $kategorias = CategoriaCompresor::orderBy('orden','asc')->get();
      $kategorys = CategoriaCompresor::orderBy('orden','asc')->where('id', $id)->get();
      $categoriacompresor = CategoriaCompresor::orderBy('orden','asc')->get();     
      $active='compresor1';
        return view('page.categoriacompresor', compact('categoriacompresor','kategorias','kategorys','active'));
    }    



    public function buscar(Request $request)
    {
      $active='compresor1';
        $buscar = $request->buscar;

        $kategorias = CategoriaCompresor::orderBy('orden','asc')->get();
        $kategorys = CategoriaCompresor::orderBy('orden','asc')->get();

        $categoriacompresor = CategoriaCompresor::where('titulo',$buscar)->orWhere('titulo','like','%'.$buscar.'%')->get();   

        if(count($categoriacompresor)== 0){
          $categoriacompresor = CategoriaCompresor::where('breve',$buscar)->orWhere('breve','like','%'.$buscar.'%')->get();  
        }

        return view('page.categoriacompresor', compact('categoriacompresor','kategorias','kategorys','active'));
    }
    
}