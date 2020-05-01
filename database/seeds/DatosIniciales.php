<?php

use Illuminate\Database\Seeder;
use App\Usuarios;
use App\Trabajadores;

class DatosIniciales extends Seeder
{
	public function run()
	{
		Usuarios::create([
			'nombre' => 'soporte',
			'correo' => 'leandro161996@gmail.com',
			'password' => bcrypt('1q2w3e4r'),
		]);
		Usuarios::create([
			'nombre' => 'soporte2',
			'correo' => 'bas14.masias@gmail.com',
			'password' => bcrypt('1q2w3e4r'),
		]);
		Trabajadores::create([
			'nombre' => 'Nombre',
			'rut' => '19.592.944-0',
			'correo' => 'prueba@gmail.com',
			'afp' => 'Planvital',
			'nacimiento' => date('Y-m-d'),
		]);
	}
}
