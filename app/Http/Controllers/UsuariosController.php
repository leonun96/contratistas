<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Flash;

class UsuariosController extends Controller
{
	public function index ()
	{
		return view('usuarios.index');
	}
	public function test ()
	{
		return view('usuarios.nuevo');
	}
	public function store (Request $request)
	{
		// 
	}
}
