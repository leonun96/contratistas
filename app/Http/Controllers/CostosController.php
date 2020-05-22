<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Costos;
use App\Empresas;
use App\Labores;
use Laracasts\Flash\Flash; 

class CostosController extends Controller
{
	public function index()
	{
		$costos = Costos::all()->load(['labores']);
		return view('costos.costos')
		->with('costos',$costos);
	}

	public function create ()
	{
		$labores = Labores::all();
		$empresas = Empresas::all();
		return view('costos.nuevo')
		->with('labores',$labores)
		->with('empresas',$empresas);
	}

	public function store (Request $request)
	{
		$val = $request->validate([
			'valor' => 'required',
			'fecha' => 'required',
			'labor_id' => 'required',
			'empresas_id' => 'required',
			
		],[
			'valor.required' => 'Debe ingresar un valor',
			'fecha.required' => 'Debe ingresar una fecha',
			'labor_id.required' => 'Debe seleccionar una labor',
			'empresas_id.required' => 'Debe seleccionar una labor',
		]);
		Costos::create($val);
		Flash::success('Nuevo Costo agregado exitosamente');
		return redirect()->back();
	}

	public function eliminar ($id)
	{

		$costo = Costos::find($id);
		$costo->delete();
		Flash::success('Costo eliminado');
		return redirect()->back();

	}
	public function carga ($id)
	{
		// CARGA COSTOS DIARIOS BASADOS EN LABOR, POR AJAX
		$costos = Costos::where('labor_id', $id)->get();
		return response()->json($costos);
	}
}
