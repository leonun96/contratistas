<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Trabajadores;
use App\Empresas;

class AsistenciaController extends Controller
{
	public function index ()
	{
		$asistencia = Asistencia::all()->load(['trabajadores']);
		return view('asistencias.index')
		->with('asistencia', $asistencia);
	}
	
	public function registrar ()
	{
		$trabajadores = Trabajadores::all();
		return view('asistencias.registrar')
		->with('trabajadores', $trabajadores);
	}
	
	public function guardar (Request $request)
	{
		// 
	}
}
