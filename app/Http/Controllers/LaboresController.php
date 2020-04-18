<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Labores;
use Laracasts\Flash\Flash; 

class LaboresController extends Controller
{
	public function index()
	{
		$labores = Labores::all();
		return view('labores')
		->with('labores',$labores);
	}

		public function create ()
	{
		return view('labores.nuevo');
	}

	public function store (Request $request)
	{
		$val = $request->validate([
			'labor' => 'required',
			
		],[
			'labor.required' => 'Debe ingresar el nombre de la labor',
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
