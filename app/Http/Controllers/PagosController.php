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
use Validator;

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
		$validator = Validator::make($request->all(),[
			'trabajadores_id' => 'required|numeric',
			'empresas_id' => 'required|numeric',
			'costo_diario' => 'required|numeric',
			'cantidad' => 'required|numeric',
		],[
			'trabajadores_id.required' => 'Debe seleccionar un trabajador',
			'empresas_id.required' => 'Debe seleccionar la empresa',
			'empresas_id.numeric' => 'Debe seleccionar la empresa',
			'costo_diario.required' => 'Debe seleccionar un costo diario',
			'costo_diario.numeric' => 'Debe seleccionar un costo diario',
			'cantidad.required' => 'Debe seleccionar la cantidad',
		]);
		if ($validator->passes()) {
			return response()->json(['exito'=>'Nuevo registro añadido.']);
		}
		return response()->json(['error'=>$validator->errors()->all()]);
	}
	public function load ($id)
	{
		$empresa = Empresas::find($id);
		$trabajadores = Trabajadores::where('empresas_id', $id)->get();
		$labores =  Labores::where('empresas_id', $id)->get();
		return response()->json(['trabajadores' => $trabajadores, 'labores' => $labores]);
	}
}
