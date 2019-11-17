<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModalRealizado;
use App\Cuenta;

class ModalRealizadosController extends Controller
{
	// URL SERVICIOS //
	public function index()
	{
    $trabajosrealizados = ModalRealizado::orderBy('orden','asc')->get();
		$active='trabajosrealizados';
		return view('page.trabajosrealizados', compact('trabajosrealizados','active'));
	}
}