@extends('layout', ['titulo' => ' Ultimos anticipos registrados'])
@section('content')
@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

{{-- @dd(date('H:i:s')) --}}

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Anticipos</h1>
	<p class="mb-4">Aqui se puede obserbar los registros de anticipos de los trabajadores registrados. {{-- <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Registros de anticipos</h6>
			<h6 class="card-subtitle mb-2 mt-2 text-muted"><a href="{{ route('anticipos.registrar') }}" class="btn btn-primary">Registrar nuevas</a></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Trabajador</th>
							<th>Monto</th>
							<th>Fecha</th>
							<th>Empresa</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Trabajador</th>
							<th>Monto</th>
							<th>Fecha</th>
							<th>Empresa</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($anticipos as $anti)
						@if(!is_null($anti->trabajadores))
						<tr>
							<td>{{ $anti->trabajadores->nombre }}</td>
							<td>{{ $anti->monto }}</td>
							<td>{{ date('d-m-Y', strtotime($anti->fecha)) }}</td>
							<td>{{ $anti->trabajadores->empresas->nombre }}</td>
						</tr>
						@endif
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
