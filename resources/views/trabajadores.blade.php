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
					<a href="#" class="editar" data-id="{{ $tra->id }}" data-toggle="modal" data-target="#ModalEditar" id=""><i class="fas fa-edit"></i></a>
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

<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="post" action="#" id="form_">
				@csrf
				@method('PUT')
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar trabajador</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
					<button class="btn btn-primary" type="submit">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>





@endsection

@section('js')

<script>
	$(".editar").click(function(event) {
		let id = $(this).attr('data-id');
		let url = `/trabajadores/${id}/editar`;
		$("#form_").attr('action', url);
	});
</script>

@endsection









