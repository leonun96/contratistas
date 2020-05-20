<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Trabajadores;
use App\Pagos;
use App\Empresas;
use App\Labores;
use App\Costos;
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
		dd($request);
	}
	public function load ($id)
	{
		$empresa = Empresas::find($id);
		$trabajadores = Trabajadores::where('empresas_id', $id)->get();
		$labores =  Labores::where('empresas_id', $id)->get();
		return response()->json(['trabajadores' => $trabajadores, 'labores' => $labores]);
	}
}
