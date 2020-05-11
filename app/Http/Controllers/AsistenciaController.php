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
			return redirect()->route('asistencia.index');
		} else {
			dd($request, count($request->trabajador));
		}
	}
}
