<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Empresas;
use Laracasts\Flash\Flash; 

class EmpresasController extends Controller
{
	public function index()
	{
		$empresas = Empresas::all();
		return view('empresas.empresas')
		->with('empresas',$empresas);
	}

		public function create ()
	{
		return view('empresas.nuevo');
	}

	public function store (Request $request)
	{
		$val = $request->validate([
			'nombre' => 'required',
			'correo' => 'required|email',
			
		],[
			'nombre.required' => 'Debe ingresar el nombre de la empresa',
			'correo.required' => 'Debe ingresar el correo de la empresa',
			'correo.email' => 'Debe ingresar un correo valido para la empresa'
		]);
		Empresas::create($val);
		Flash::success('Nueva empresa creada exitosamente');
		return redirect()->back();
	}

	    public function eliminar($id)
    {

	        $empresa = Empresas::find($id);
	        $empresa->delete();
            Flash::success('empresa eliminada');
            return redirect()->back();

    }
}
