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
		Flash::success('Bienvenido!');
		return view('login');
	}

	public function logueo (Request $request)
	{
		$val = $request->validate([
			'correo' => 'required',
			'password' => 'required',
		]);
		dd($request);
	}
}
