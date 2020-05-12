<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Trabajadores;
use App\Empresas;
use Laracasts\Flash\Flash;

class AsistenciaController extends Controller
{
	public static function ausentar_todos ()
	{
		// 
	}
	public function index ()
	{
		$asistencia = Asistencia::all()->load(['trabajadores']);
		return view('asistencias.index')
		->with('asistencia', $asistencia);
	}
	
	public function registrar ()
	{
		$trabajadores = Trabajadores::all()->load(['empresas']);
		return view('asistencias.registrar')
		->with('trabajadores', $trabajadores);
	}
	
	public function guardar (Request $request)
	{
		if (!isset($request->trabajador)) {
			Flash::warning('Todos los trabajadores quedarán ausentes');
			self::ausentar_todos();
			return redirect()->route('asistencia.index');
		}
		foreach ($request->trabajador as $key => $value) {
			$trabajador = Trabajadores::findOrFail($value);
			Asistencia::create([
				'trabajadores_id' => $trabajador->id,
				'empresas_id' => $trabajador->empresas_id,
				'fecha' => date('Y-m-d'),
				'hora' => date('H:i:s'),
			]);
		}
		Flash::success('Asistencias registradas');
		return redirect()->route('asistencia.index');
	}
}
