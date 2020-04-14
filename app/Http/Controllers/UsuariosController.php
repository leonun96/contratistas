<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Flash;

class UsuariosController extends Controller
{
	public function index ()
	{

		$usuarios = Usuarios::all();
		return view('usuarios.index')
		->with('usuarios',$usuarios);
	}
	
	public function store (Request $request)
	{
		// 
	}
}
