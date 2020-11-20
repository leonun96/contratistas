<?php

namespace App\Exports;

use App\Pagos;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FacturacionExport implements FromView
{
	public function __construct(string $ini, string $fin)
	{
		$this->ini = $ini;
		$this->fin = $fin;
	}
	public function view(): View
	{
		$pagos = Pagos::whereMonth('fecha', $this->mes)->with(['empresas','trabajadores','trabajadores.anticipos','costos','costos.labores'])->get();
		dd($pagos)
		return view('reportes.facturacion', [
			'pagos' => $pagos,
		]);
	}
}