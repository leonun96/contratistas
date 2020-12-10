@extends('layout', ['titulo' => 'Costos'])
@section('content')
<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="{{ route('costos.create') }}" class="btn btn-dark"><i class="fas fa-briefcase"></i> Nuevo Costo</a>
	<br>
	<br>
	<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Valor</th>
							<th>Labor</th>
							<th style="text-align: center;">Editar</th>
							<th style="text-align: center;">Eliminar</th>


						</tr>
					</thead>
					<tbody>
						@foreach($costos as $costo)
						@if(!is_null($costo->labores))
						<tr>
							<td>{{ $costo->id }}</td>
							<td>{{ $costo->valor }}</td>
							<td>{{ $costo->labores->labor }}</td>
							<td style="text-align: center;">
								<a href="#" class="editar" data-toggle="modal" data-target="#modal" id=""><i class="fas fa-edit"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{ route('costos.eliminar', $costo->id) }}"><i class="fas fa-trash-alt"></i></a>
							</td>

							
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
</div>
<!-- /.container-fluid -->
@endsection
