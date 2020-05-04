<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Trabajadores;
use App\Empresas;
use Laracasts\Flash\Flash; 

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
		$empresas = Empresas::all();
		return view('trabajadores.nuevo')
		->with('empresas', $empresas);
	}

	public function store (Request $request)
	{
		// VALIDAR EMPRESAS_ID
		$val = $request->validate([
			'nombre' => 'required',
			'rut' => 'required',
			'correo' => 'required|email',
			'nacimiento' => 'required',
			'afp' => 'required',
			'empresas_id' => 'required',
		],[
			'nombre.required' => 'Debe ingresar el nombre del trabajador',
			'rut.required' => 'Debe ingresar el rut de trabajador',
			'correo.required' => 'Debe ingresar el correo del trabajador',
			'correo.email' => 'Debe ingresar un correo valido para el trabajador',
			'nacimiento.required' => 'Debe ingresar la fecha de nacimiento del trabajador',
			'afp.required' => 'Debe seleccionar AFP del trabajador',
			'empresas_id.required' => 'Debe ingresar seleccionar la empresa',

		]);
		Trabajadores::create($val);
		Flash::success('Nuevo trabajador creado exitosamente');
		return redirect()->back();
	}
	public function data ($id)
	{
		$trabajador = Trabajadores::find($id);
		return response()->json($trabajador);
	}
	public function editar (Request $request, $id)
	{
		$val = $request->validate([
			'nombre' => 'required',
			'rut' => 'required',
			'correo' => 'required|email',
			'nacimiento' => 'required',
			'afp' => 'required',
		],[
			'nombre.required' => 'Debe ingresar el nombre del trabajador',
			'rut.required' => 'Debe ingresar el rut de trabajador',
			'correo.required' => 'Debe ingresar el correo del trabajador',
			'correo.email' => 'Debe ingresar un correo valido para el trabajador',
			'nacimiento.required' => 'Debe ingresar la fecha de nacimiento del trabajador',
			'afp.required' => 'Debe ingresar AFP del trabajador',

		]);
		Trabajadores::find($id)->update($val);
		Flash::success('Datos actualizados correctamente');
		return redirect()->back();
	}

	public function eliminar($id)
	{
		$trabajador = Trabajadores::find($id);
		$trabajador->delete();
		Flash::success('Trabajador eliminado');
		return redirect()->back();
	}
}










