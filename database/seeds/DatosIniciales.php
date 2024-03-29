<?php

use Illuminate\Database\Seeder;
use App\Usuarios;
use App\Trabajadores;
use App\Empresas;

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
		Empresas::create([
			'nombre' => 'Empresa',
			'correo' => 'empresa@empresa.cl',
		]);
		Trabajadores::create([
			'nombre' => 'Nombre',
			'rut' => '19.592.944-0',
			'correo' => 'prueba@gmail.com',
			'afp' => 'Planvital',
			'empresas_id' => 1,
			'nacimiento' => date('Y-m-d'),
		]);
	}
}
