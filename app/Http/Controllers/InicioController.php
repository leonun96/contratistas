<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
// use Flash;
use Laracasts\Flash\Flash;

class InicioController extends Controller
{
	public function index ()
	{
		return view('index');
	}

	public function login ()
	{
		// Flash::success('Bienvenido!');
		return view('login');
	}

	public function logout ()
	{
		Auth::logout();
		return redirect()->route('login');
	}

	public function logueo (Request $request)
	{
		$val = $request->validate([
			'correo' => 'required',
			'password' => 'required',
		],[
			'correo.required' => 'Debe ingresar su correo',
			'password.required' => 'Debe ingresar su contraseña',
		]);
		if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password])) {
			Flash::success('Bienvenido '.auth()->user()->nombre);
			return redirect()->route('index');
		} else {
			Flash::error('Usuario o contraseña incorrectos');
			return redirect()->back();
		}
	}
}
