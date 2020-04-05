@extends('layout')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="" class="btn btn-dark"><i class="fas fa-briefcase"></i> Nueva Labor</a>
	<br>
	<br>
	<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Labor</th>
							<th style="text-align: center;">Editar</th>
							<th style="text-align: center;">Eliminar</th>


						</tr>
					</thead>
					<tbody>
						@foreach($labores as $labor)
						<tr>
							<td>{{ $labor->id }}</td>
							<td>{{ $labor->labor }}</td>
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