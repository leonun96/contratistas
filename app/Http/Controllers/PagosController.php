<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Trabajadores;
use App\Pagos;
use App\Empresas;
use Laracasts\Flash\Flash;

class PagosController extends Controller
{
	public function index ()
	{
		$pagos = Pagos::all();
		return view('pagos.index')
		->with('pagos', $pagos);
	}
	public function create ()
	{
		$empresas = Empresas::all();
		return view('pagos.create')
		->with(['empresas' => $empresas, ]);
	}
	public function store (Request $request)
	{
		// 
	}
}
