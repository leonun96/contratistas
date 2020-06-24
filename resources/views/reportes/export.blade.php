<table>
	<thead>
	<tr>
		<th>Nombre</th>
		<th>Hora</th>
		<th>Fecha</th>
	</tr>
	</thead>
	<tbody>
	@foreach($asistencias as $asist)
		<tr>
			<td>{{ $asist->trabajadores->nombre }}</td>
			<td>{{ $asist->hora }}</td>
			<td>{{ $asist->fecha }}</td>
		</tr>
	@endforeach
	</tbody>
</table>