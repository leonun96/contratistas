@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
	<br>
	<br>
	<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombres</th>
							<th>Correo</th>
							<th></th>
							<th></th>

						</tr>
					</thead>
					<tbody>
						@foreach($usuarios as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->nombre }}</td>
							<td>{{ $user->correo }}</td>
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