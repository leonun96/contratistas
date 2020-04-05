<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Labores;

class LaboresController extends Controller
{
	public function index()
	{
		$labores = Labores::all();
		return view('labores')
		->with('labores',$labores);
	}
}
