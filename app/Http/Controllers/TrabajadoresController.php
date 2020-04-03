<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajadoresController extends Controller
{
	public function index()
	{
		return view('trabajadores');
	}
}
