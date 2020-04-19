@extends('layout')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="{{ route('trabajadores.create') }}" class="btn btn-dark"><i class="fas fa-users"></i> Nuevo Trabajador</a>
	<br>
	<br>
	<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombres</th>
							<th>Rut</th>
							<th>Correo</th>
							<th>Nacimiento</th>
							<th>Afp</th>
							<th>Editar</th>
							<th>Eliminar</th>

						</tr>
					</thead>
					<tbody>
						@foreach($trabajadores as $key => $tra)
						<tr>
							<td>{{ ($key + 1) }}</td>
							<td>{{ $tra->nombre }}</td>
							<td>{{ $tra->rut }}</td>
							<td>{{ $tra->correo }}</td>
							<td>{{ $tra->nacimiento }}</td>
							<td>{{ $tra->afp }}</td>
							<td style="text-align: center;">
								<a href="#" class="editar" data-toggle="modal" data-target="#modal" id=""><i class="fas fa-edit"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{ route('trabajadores.eliminar', $tra->id) }}"><i class="fas fa-trash-alt"></i></a>
							</td>

							
						</tr>
						@endforeach
					</tbody>
				</table>
</div>
<!-- /.container-fluid -->
@endsection