<table>
	<thead>
	<tr>
		<th>Trabajador</th>
		<th>Fecha</th>
		<th>Hora</th>
		<th>Empresa</th>
		<th>Labor</th>
		<th>Costo</th>
		<th>Cantidad</th>
		<th>Total pago</th>
		<th>Anticipos</th>
		<th>Total final</th>
	</tr>
	</thead>
	<tbody>
	@foreach($pagos as $pago)
	@if(!is_null($pago->trabajadores))
		<tr>
			<td>{{ $pago->trabajadores->nombre }}</td>
			<td>{{ date('d-m-Y', strtotime($pago->fecha)) }}</td>
			<td>{{ $pago->hora }}</td>
			<td>{{ $pago->empresas->nombre }}</td>
			<td>{{ $pago->costos->labores->labor }}</td>
			<td>{{ $pago->costos->valor }}</td>
			<td>{{ $pago->cantidad }}</td>
			<td>{{ $pago->total }}</td>
			<td>
				@php
				$ants = $anticipos->where('trabajadores_id', $pago->trabajadores->id);
				// $ants->sum('monto');
				@endphp
				{{ $ants->sum('monto') ?? 0 }}
			</td>
			<td>{{ $pago->total - $ants->sum('monto') }}</td>
		</tr>
	@endif
	@endforeach
	</tbody>
</table>