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
	
	public function registrar ()
	{
		$trabajadores = Trabajadores::all()->load(['empresas']);
		return view('anticipos.registrar')
		->with('trabajadores', $trabajadores);
	}
	
	public function guardar (Request $request)
	{
		dd($request);
	}
}
