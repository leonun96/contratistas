<?php

namespace App\Exports;

use App\Asistencia;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AsistenciaExport implements FromView
{
	// public function collection()
	// {
	// 	return Asistencia::select('trabajadores.nombre','hora','fecha',)->get();
	// }
	public function view(): View
	{
		return view('reportes.export', [
			'asistencias' => Asistencia::with(['trabajadores',])->get(),
		]);
	}
}