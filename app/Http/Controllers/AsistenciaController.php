<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;

class AsistenciaController extends Controller
{
	public function index ()
	{
		$asistencia = Asistencia::all();
		return view('asistencias.index')
		->with('asistencia', $asistencia);
	}
}
