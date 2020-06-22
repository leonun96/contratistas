<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
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
	public function reporte ()
	{
		return Excel::download(new InvoicesExport, 'invoices.xlsx');
	}
	public function trabajadores ()
	{
		return Excel::download(new UsersExport, 'trabajadores.xlsx');
	}
}
