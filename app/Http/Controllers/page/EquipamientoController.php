<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Equipamiento;

class EquipamientoController extends Controller
{
	public function index(){
    $equipamientos = Equipamiento::all();
    $active='cliente';
    return view('page.equipamiento', compact('equipamientos','active'));
	}
}
