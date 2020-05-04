<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Trabajadores;

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
		// 
	}
	
	public function guardar (Request $request)
	{
		// 
	}
}
