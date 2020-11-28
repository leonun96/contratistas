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
		<th>Total</th>
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
		</tr>
	@endif
	@endforeach
	</tbody>
</table>