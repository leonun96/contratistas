@extends('layout', ['titulo' => ' Registrar asistencias'])
@section('content')

<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Trabajadores</h1>
	<p class="mb-4">Seleccione los trabajadores presentes y luego, haga click en "GUARDAR". {{-- <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Lista de trabajadores</h6>
			{{-- <h6 class="card-subtitle mb-2 mt-2 text-muted"><a href="{{ route('asistencia.registrar') }}" class="btn btn-primary">Registrar nuevas</a></h6> --}}
		</div>
		<form action="{{ route('asistencia.guardar') }}" method="post">
			@csrf
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Rut</th>
								<th>Correo</th>
								<th>AFP</th>
								<th>Empresa</th>
								<th>Seleccionar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Rut</th>
								<th>Correo</th>
								<th>AFP</th>
								<th>Empresa</th>
								<th>Seleccionar</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($trabajadores as $k => $trabajador)
							<tr>
								<td>{{ $k+1 }}</td>
								<td>{{ $trabajador->nombre }}</td>
								<td>{{ $trabajador->rut }}</td>
								<td>{{ $trabajador->correo }}</td>
								<td>{{ $trabajador->afp }}</td>
								<td>{{ $trabajador->empresas->nombre }}</td>
								<td>
									<input type="checkbox" class="form-control" name="trabajador[]" value="{{ $trabajador->id }}">
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group text-right mr-4">
				<button type="submit" class="btn btn-primary">GUARDAR</button>
			</div>
		</form>
	</div>
</div>

@endsection