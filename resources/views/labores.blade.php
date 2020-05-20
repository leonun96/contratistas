@extends('layout', ['titulo'=>'Labores'])
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="{{ route('labores.create') }}" class="btn btn-dark"><i class="fas fa-briefcase"></i> Nueva Labor</a>
	<br>
	<br>
	<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Labor</th>
							<th>Empresa</th>
							<th style="text-align: center;">Editar</th>
							<th style="text-align: center;">Eliminar</th>


						</tr>
					</thead>
					<tbody>
						@foreach($labores as $labor)
						<tr>
							<td>{{ $labor->id }}</td>
							<td>{{ $labor->labor }}</td>
							<td>{{ $labor->empresas->nombre }}</td>
							<td style="text-align: center;">
								<a href="#" class="editar" data-toggle="modal" data-target="#modal" id=""><i class="fas fa-edit"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{ route('labores.eliminar', $labor->id) }}"><i class="fas fa-trash-alt"></i></a>
							</td>

							
						</tr>
						@endforeach
					</tbody>
				</table>
</div>
<!-- /.container-fluid -->
@endsection