<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Trabajadores;

class TrabajadoresController extends Controller
{
	public function index()
	{
		$trabajadores = Trabajadores::all();
		return view('trabajadores')
		->with('trabajadores',$trabajadores);
	}
}
