<?php

namespace App\Exports;

use App\Trabajadores;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
	/**
	* @return \Illuminate\Support\Collection
	*/
	public function headings(): array
	{
		return [
			'nombre',
			'rut',
			'correo',
			'nacimiento',
			'afp',
		];
	}
	public function collection()
	{
		return Trabajadores::select('nombre','rut','correo','nacimiento','afp',)->get();
		// $users = DB::table('Users')->select('id','name', 'email')->get();
		// return $users;
		
	}
}