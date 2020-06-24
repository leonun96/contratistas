<?php

namespace App\Exports;

use App\Asistencia;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsistenciaExport implements FromCollection,WithHeadings
{
	/**
	* @return \Illuminate\Support\Collection
	*/
	public function headings(): array
	{
		return [
			'nombre',
			'hora',
			'fecha',
		];
	}
	public function collection()
	{
		return Asistencia::select('trabajadores.nombre','hora','fecha',)->get();
	}
}