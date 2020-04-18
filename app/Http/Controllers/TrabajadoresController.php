<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Trabajadores;

class TrabajadoresController extends Controller
{
	public function index()
	{
		$trabajadores = Trabajadores::all();
		return view('trabajadores')
		->with('trabajadores',$trabajadores);
	}
		public function create ()
	{
		return view('trabajadores.nuevo');
	}

	public function store (Request $request)
	{
		$val = $request->validate([
			'nombre' => 'required',
			'apellido' => 'required',
			'correo' => 'required|email',
			'fecha-nacimiento' => 'required',
			'afp' => 'required',
		],[
			'nombre.required' => 'Debe ingresar el nombre del trabajador',
			'apellido.required' => 'Debe ingresar el apellido del trabajador',
			'correo.required' => 'Debe ingresar el correo del trabajador',
			'correo.email' => 'Debe ingresar un correo valido para el trabajador',
			'fecha-nacimiento.required' => 'Debe ingresar la fecha de nacimiento del trabajador',
			'afp.required' => 'Debe ingresar AFP del trabajador'

		]);
		Usuarios::create($val);
		Flash::success('Nuevo trabajador creado exitosamente');
		return redirect()->back();
	}
}
