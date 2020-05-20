<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Labores;
use App\Empresas;
use Laracasts\Flash\Flash; 

class LaboresController extends Controller
{
	public function index()
	{
		$labores = Labores::all()->load(['empresas']);
		return view('labores')
		->with('labores',$labores);
	}

	public function create ()
	{
		$empresas = Empresas::all();
		return view('labores.nuevo')
		->with('empresas', $empresas);
	}

	public function store (Request $request)
	{
		$val = $request->validate([
			'labor' => 'required',
			'empresas_id' => 'required',
			
		],[
			'labor.required' => 'Debe ingresar el nombre de la labor',
			'empresas_id.required' => 'Debe selleccionar la empresa',
		]);
		Labores::create($val);
		Flash::success('Nueva labor creada exitosamente');
		return redirect()->back();
	}

	    public function eliminar($id)
    {

	        $labor = Labores::find($id);
	        $labor->delete();
            Flash::success('Labor eliminado');
            return redirect()->back();

    }
}
