<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Laracasts\Flash\Flash; // SOLO ASI FUNCIONA EL FLASH, NO HAY ALIAS

class UsuariosController extends Controller
{
	public function index ()
	{

		$usuarios = Usuarios::whereNotIn('id',[ auth()->user()->id])->get();
		return view('usuarios.index')
		->with('usuarios',$usuarios);
	}
	
	public function create ()
	{
		return view('usuarios.nuevo');
	}

	public function store (Request $request)
	{
		$val = $request->validate([
			'nombre' => 'required',
			'correo' => 'required|email',
			'password' => 'required|confirmed|min:6',
		],[
			'nombre.required' => 'Debe ingresar el nombre del usuario',
			'correo.required' => 'Debe ingresar el correo del usuario',
			'correo.email' => 'Debe ingresar un correo valido para el usuario',
			'password.required' => 'Debe ingresar la contraseña del usuario',
			'password.confirmed' => 'Debe repetir la contraseña del usuario',
			'password.min' => 'La contraseña debe tener al menos 6 caracteres',
		]);
		$val['password'] = bcrypt($val['password']);
		Usuarios::create($val);
		Flash::success('Nuevo usuario creado exitosamente');
		return redirect()->back();
	}
	public function delete ($id)
	{
		Usuarios::find($id)->delete();
		Flash::error('Usuario eliminado del sistema');
		return redirect()->back();
	}
}
