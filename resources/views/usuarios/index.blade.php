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

			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $key => $user)
			<tr>
				<td>{{ ($key + 1) }}</td>
				<td>{{ $user->nombre }}</td>
				<td>{{ $user->correo }}</td>
				<td style="text-align: center;">
					<a href="{{ route('usuarios.delete', $user->id) }}"><i class="fas fa-trash-alt"></i></a>
				</td>

				
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<!-- /.container-fluid -->
@endsection