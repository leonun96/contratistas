<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class InicioController extends Controller
{
	public function index ()
	{
		return view('index');
	}

	public function login ()
	{
		return view('login');
	}
}
