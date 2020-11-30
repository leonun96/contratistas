<?php

namespace App\Exports;

use App\Pagos;
use App\Anticipos;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PagosExport implements FromView
{
	public function __construct(int $mes)
	{
		$this->mes = $mes;
	}
	public function view(): View
	{
		$pagos = Pagos::whereMonth('fecha', $this->mes)->with(['empresas','trabajadores','trabajadores.anticipos','costos','costos.labores'])->get();
		$pasada = date_create()->modify('-5 days');
		$anticipos = Anticipos::whereDate('fecha', '>=', $pasada->format('Y-m-d'))->get();
		return view('reportes.pagos', [
			'pagos' => $pagos,
			'pasada' => $pasada,
			'anticipos' => $anticipos,
		]);
	}
}