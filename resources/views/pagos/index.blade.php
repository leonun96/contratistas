@extends('layout', ['titulo' => 'Pagos'])
@section('content')
@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

{{-- @dd(date('H:i:s')) --}}

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Pagos</h1>
	<p class="mb-4">Registro de la producción de los trabajadore sy sus respectivos pagos. {{-- <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Registros de Pagos</h6>
			<h6 class="card-subtitle mb-2 mt-2 text-muted"><a href="{{ route('pagos.create') }}" class="btn btn-primary">Registrar nuevos</a></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Trabajador</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Empresa</th>
							<th>Labor</th>
							<th>Costo</th>
							<th>Cantidad</th>
							<th>Total</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Trabajador</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Empresa</th>
							<th>Labor</th>
							<th>Costo</th>
							<th>Cantidad</th>
							<th>Total</th>
							<th>Eliminar</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($pagos as $pago)
						<tr>
							<td>{{ $pago->trabajadores->nombre }}</td>
							<td>{{ date('d-m-Y', strtotime($pago->fecha)) }}</td>
							<td>{{ $pago->hora }}</td>
							<td>{{ $pago->empresas->nombre }}</td>
							<td>{{ $pago->costos->labores->labor }}</td>
							<td>{{ $pago->costos->valor }}</td>
							<td>{{ $pago->cantidad }}</td>
							<td>{{ $pago->total }}</td>
							<td>
								<a href="{{ route('pagos.delete',$pago->id) }}" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
{{-- $('#dataTable').DataTable(); en el JS listo --}}
@endsection
@endsection
