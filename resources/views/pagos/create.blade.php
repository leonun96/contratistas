@extends('layout', ['titulo' => 'Ingreso de pagos'])
@section('content')
@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

<div class="container-fluid">
	<div class="card">
		<h5 class="card-header">Ingreso de Pago/Producción</h5>
		<div class="card-body">
			<form method="post" action="#" target="new" class="container-fluid">
				@csrf
				<div class="row">
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Seleccione empresa</span>
						</div>
						<select name="empresas_id" class="custom-select" id="empresas">
							<option>Seleccione la empresa</option>
							@foreach($empresas as $empresa)
							<option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text">Labor</span>
						</div>
						<select name="labor_id" class="custom-select" id="labores">
							<option>Seleccione la labor</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text">Costo Diario</span>
						</div>
						<select name="costo_diario" class="custom-select" id="costo_diario">
							<option>Seleccione el costo diario</option>
						</select>
					</div>
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text">Cantidad</span>
						</div>
						<input type="number" class="form-control" name="cantidad" min="1">
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Buscador de trabajadores</span>
					</div>
					<input list="trabajadores" class="form-control" id="lista_tbjdores" placeholder="Ingrese nombre">
					<datalist id="trabajadores"></datalist>
				</div>
			</form>
		</div>
	</div>
</div>

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
{{-- $('#dataTable').DataTable(); en el JS listo --}}
<script type="text/javascript">
	$("#empresas").change(function(event) {
		let id = $(this).val();
		// console.log(id);
		$.ajax({
			url: `/pagos/data/${id}/load`,
			type: 'GET',
		})
		.done(function(response) {
			console.log(response);
			$("#labores").empty();
			$("#labores").append(`<option>Seleccione labor</option>`);
			$.each(response.labores, function(index, val) {
				/* iterate through array or object */
				$("#labores").append(`
					<option value="${val.id}">${val.labor}</option>
				`);
			});
			$("#trabajadores").empty();
			$.each(response.trabajadores, function(index, val) {
				$("#trabajadores").append(`
					<option value="${val.nombre}" data-id="${val.id}"></option>
				`);
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			// console.log("complete");
		});
	});
	$("#labores").change(function(event) {
		let labor = $(this).val();
		$.ajax({
			url: `/carga/${labor}/costos`,
			type: 'GET',
		})
		.done(function(response) {
			$("#costo_diario").empty();
			$.each(response, function(index, val) {
				$("#costo_diario").append(`
					<option value="${val.id}">${val.valor}</option>
				`);
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			// console.log("complete");
		});
	});
	/* LISTA DE TRABAJADORES */
	/* /LISTA DE TRABAJADORES */
</script>
@endsection
@endsection
