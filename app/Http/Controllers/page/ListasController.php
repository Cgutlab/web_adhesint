<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lista;

class ListasController extends Controller
{
    public function index(){
    	$listas = Lista::orderBy('orden','asc')->get();  	
      $active='listas';

        return view('page.listas', compact('listas','active'));
    }
}