<?php

use Illuminate\Database\Seeder;
use App\Usuarios;

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
			'correo' => 'bastian@correo.cl',
			'password' => bcrypt('1q2w3e4r'),
		]);
	}
}
