<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Costos;
use Laracasts\Flash\Flash; 

class CostosController extends Controller
{
	public function index()
	{
		$costos = Costos::all();
		return view('costos')
		->with('costos',$costos);
	}
}
