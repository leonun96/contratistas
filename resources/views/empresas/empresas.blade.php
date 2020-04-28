@extends('layout')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="{{ route('empresas.create') }}" class="btn btn-dark"><i class="fas fa-archway"></i> Nueva Empresa</a>
	<br>
	<br>
	<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Empresa</th>
							<th>Correo</th>
							<th style="text-align: center;">Editar</th>
							<th style="text-align: center;">Eliminar</th>


						</tr>
					</thead>
					<tbody>
						@foreach($empresas as $emp)
						<tr>
							<td>{{ $emp->id }}</td>
							<td>{{ $emp->nombre }}</td>
							<td>{{ $emp->correo }}</td>
							<td style="text-align: center;">
								<a href="#" class="editar" data-toggle="modal" data-target="#modal" id=""><i class="fas fa-edit"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{ route('empresas.eliminar', $emp->id) }}"><i class="fas fa-trash-alt"></i></a>
							</td>

							
						</tr>
						@endforeach
					</tbody>
				</table>
</div>
<!-- /.container-fluid -->
@endsection