<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Trabajadores;
use App\Pagos;
use App\Empresas;
use App\Labores;
use App\Costos;
use Laracasts\Flash\Flash;
use Validator;

class PagosController extends Controller
{
	public function index ()
	{
		$pagos = Pagos::all()->load(['empresas','trabajadores','costos','costos.labores',]);
		return view('pagos.index')
		->with('pagos', $pagos);
	}
	public function create ()
	{
		$empresas = Empresas::all();
		return view('pagos.create')
		->with(['empresas' => $empresas, ]);
	}
	public function delete ($id)
	{
		$pago = Pagos::findOrFail($id);
		$pago->delete();
		Flash::error('Registro eliminado exitosamente');
		return redirect()->back();
	}
	public function store (Request $request)
	{
		$validator = Validator::make($request->all(),[
			'trabajadores_id' => 'required|numeric',
			'empresas_id' => 'required|numeric',
			'costo_diario' => 'required|numeric',
			'cantidad' => 'required|numeric',
			'fecha' => 'required|date',
		],[
			'trabajadores_id.required' => 'Debe seleccionar un trabajador',
			'empresas_id.required' => 'Debe seleccionar la empresa',
			'empresas_id.numeric' => 'Debe seleccionar la empresa',
			'costo_diario.required' => 'Debe seleccionar un costo diario',
			'costo_diario.numeric' => 'Debe seleccionar un costo diario',
			'cantidad.required' => 'Debe seleccionar la cantidad',
		]);
		$costo = Costos::find($request->costo_diario);
		if ($validator->passes() AND (!is_null($costo))) {
			$pago = Pagos::create([
				'trabajadores_id' => $request->trabajadores_id,
				'empresas_id' => $request->empresas_id,
				'costo_diario' => $request->costo_diario,
				'cantidad' => $request->cantidad,
				'total' => ($costo->valor * $request->cantidad),
				'fecha' => $request->fecha,
				'hora' => date('H:i:s'),
			])->load(['empresas','trabajadores','costos','costos.labores',]);
			return response()->json(['exito'=>'Nuevo registro añadido.','pago' => $pago]);
		}
		return response()->json(['error'=>$validator->errors()->all()]);
	}
	public function load ($id)
	{
		$empresa = Empresas::find($id);
		$trabajadores = Trabajadores::all();
		$labores =  Labores::where('empresas_id', $id)->get();
		return response()->json(['trabajadores' => $trabajadores, 'labores' => $labores]);
	}
	public function buscador ($string, $inicio = null, $fin = null)
	{
		$siete = date_create()->modify('- 7 days')->format('Y-m-d');
		// dd($inicio, $fin);
		if (is_null($inicio) and is_null($fin)) {
			$trabajadores = Trabajadores::whereHas('pagos', function ($query) use ($siete) {
					$query->where('fecha', '>=', $siete);
				})->where('nombre', 'like', '%'.$string.'%')
				->with(['pagos' => function ($query) use ($siete) {
					$query->where('fecha', '>=', $siete);
				}, 'anticipos' => function ($query) use ($siete) {
					$query->where('fecha', '>=',$siete);
				}, 'pagos.costos', 'pagos.costos.labores',])->first();
		} else {
			$trabajadores = Trabajadores::whereHas('pagos', function ($query) use ($inicio, $fin, $string) {
				$query->whereDate('fecha', '>=', $inicio)
					->whereDate('fecha', '<=', $fin);
			})->where('nombre', 'like', '%'.$string.'%')
			->with(['pagos' => function ($query) use ($inicio, $fin) {
				$query->whereDate('fecha', '>=', $inicio)
					->whereDate('fecha', '<=', $fin);
			}, 'anticipos' => function ($query) use ($inicio, $fin) {
				$query->whereDate('fecha', '>=',$inicio)
					->whereDate('fecha', '<=', $fin);
			}, 'pagos.costos', 'pagos.costos.labores',])->first();
		}
		return response()->json($trabajadores);
	}
}















