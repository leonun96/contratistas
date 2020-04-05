@extends('layout')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="" class="btn btn-dark"><i class="fas fa-users"></i> Nuevo Trabajador</a>
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
						@foreach($trabajadores as $tra)
						<tr>
							<td>{{ $tra->id }}</td>
							<td>{{ $tra->nombre }}</td>
							<td>{{ $tra->rut }}</td>
							<td>{{ $tra->correo }}</td>
							<td>{{ $tra->nacimiento }}</td>
							<td>{{ $tra->afp_id }}</td>
							<td style="text-align: center;">
								<a href="#" class="editar" data-toggle="modal" data-target="#modal" id=""><i class="fas fa-edit"></i></a>
							</td>
							<td style="text-align: center;">
								<a href=""><i class="fas fa-trash-alt"></i></a>
							</td>

							
						</tr>
						@endforeach
					</tbody>
				</table>
</div>
<!-- /.container-fluid -->
@endsection