<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\AsistenciaExport;
use App\Exports\PagosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Asistencia;
use App\Trabajadores;
use App\Pagos;
use App\Empresas;
use App\Labores;
use App\Costos;
use Laracasts\Flash\Flash;
use Validator;

class ExportController extends Controller
{
	public function __construct ()
	{
		/**/
	}
	public function index ()
	{
		return view('reportes.index');
	}
	public function pagos ($mes)
	{
		return Excel::download(new PagosExport($mes), 'pagos.xlsx');
	}
	public function trabajadores ()
	{
		return Excel::download(new UsersExport, 'trabajadores.xlsx');
	}
	public function asistencias ()
	{
		return Excel::download(new AsistenciaExport, 'trabajadores.xlsx');
	}
}
