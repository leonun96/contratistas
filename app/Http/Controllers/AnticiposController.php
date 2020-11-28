<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Trabajadores;
use App\Empresas;
use App\Anticipos;
use Laracasts\Flash\Flash; 

class AnticiposController extends Controller
{
	public function __construct ()
	{
		//
	}
	public static function ausentar_todos ()
	{
		// 
	}
	public function index ()
	{
		$anticipos = Anticipos::all()->load(['trabajadores','trabajadores.empresas',]);
		return view('anticipos.index')
		->with('anticipos', $anticipos);
	}
	public function eliminar ($id)
	{
		$anticipos = Anticipos::find($id);
		$anticipos->delete();
		Flash::success('Anticipo eliminado');
		return redirect()->route('anticipos.index');
	}
	
	public function registrar ()
	{
		$empresas = Empresas::all();
		$trabajadores = Trabajadores::all()->load(['empresas']);
		return view('anticipos.registrar')
		->with('empresas', $empresas)
		->with('trabajadores', $trabajadores);
	}
	
	public function guardar (Request $request)
	{
		$val = $request->validate([
			'monto' => 'required',
			'fecha' => 'required',
			'trabajadores_id' => 'required',
		],[
			'monto.required' => 'Debe ingresar monto',
			'fecha.required' => 'Debe ingresar fecha',
			'trabajadores_id.required' => 'Debe ingresar trabajador',
		]);
		Anticipos::create($val);
		Flash::success('Anticipo registrado');
		return redirect()->back();
	}
}
