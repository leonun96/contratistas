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
			<form method="post" action="{{ route('pagos.store') }}" {{-- target="new" --}} id="_form" class="container-fluid">
				@csrf
				<div class="row">
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Seleccione empresa</span>
						</div>
						<select name="empresas_id" class="custom-select" id="empresas" required>
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
						<select name="labor_id" class="custom-select" id="labores" required>
							<option>Seleccione la labor</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text">Costo Diario</span>
						</div>
						<select name="costo_diario" class="custom-select" id="costo_diario" required>
							<option>Seleccione el costo diario</option>
						</select>
					</div>
					<div class="input-group mb-3 col-6">
						<div class="input-group-prepend">
							<span class="input-group-text">Cantidad</span>
						</div>
						<input type="number" class="form-control" name="cantidad" min="1" required>
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Buscador de trabajadores</span>
					</div>
					<input list="trabajadores" class="form-control" id="lista_tbjdores" placeholder="Ingrese nombre">
					<datalist id="trabajadores"></datalist>
					<input type="hidden" name="trabajadores_id" id="trabajadores_id">
				</div>
				<div class="input-group mb-3 mt-5">
					<button type="button" class="btn btn-success btn-icon-split" id="enviar_form">
						<span class="icon text-white-50">
							<i class="fas fa-check"></i>
						</span>
						<span class="text">Guardar</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	<div id="alerta">
		<ul id="lista_de_errores">
		</ul>
	</div>
	<hr>
	<div class="card" id="seccion_registros" style="display: none;">
		<h5 class="card-header">Registros realizados</h5>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Trabajador</th>
							<th>Empresa</th>
							<th>Labor</th>
						</tr>
					</thead>
					<tbody id="tbody"></tbody>
				</table>
			</div>
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
			// console.log(response);
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
	$('#lista_tbjdores').on('input', function() {
		let value = $(this).val();
		let idt = $(`#trabajadores [value ="${value}"]`).data('id');
		let id2 = $(`#trabajadores [value ="${value}"]`).attr('data-id');
		// console.log(id, value, id2);FUNCIONAN LOS TRES!3
		if (typeof idt === 'undefined') {
			console.log('valor no valido');
		} else {
			// ASIGNAR ID A INPUT ESCONDIDO
			$("#trabajadores_id").val(idt);
		}
	});
	/* /LISTA DE TRABAJADORES */
	$("#enviar_form").click(function(event) {
		let form = $("#_form").serialize();
		$("#enviar_form").attr('disabled', 'disabled');
		$.ajax({
			url: '{{ route('pagos.store') }}',
			type: 'POST',
			data: form,
		})
		.done(function(response) {
			console.log(response);
			if (response.hasOwnProperty("error")) {
				// console.log("incluye error");
				alerta("danger");
				$.each(response.error, function(index, val) {
					$("#lista_de_errores").append(`<li>${val}</li>`);
				});
			} else {
				// console.log("no incluye error");
				alerta("success");
				$("#lista_de_errores").append(`${response.exito}`);
				$("#seccion_registros").show();
				$("#tbody").append(`<tr>
					<td>${response.pago.trabajadores.nombre}</td>
					<td>${response.pago.empresas.nombre}</td>
					<td>${response.pago.costos.labores.labor}</td>
				</tr>`);
			}
		})
		.fail(function() {
			// console.log("error");
		})
		.always(function() {
			// console.log("complete");
			$('#alerta').not('.alert-important').delay(4000).fadeOut(350);
			$("#enviar_form").removeAttr('disabled');
		});
	});
	function alerta (tipo) {
		$("#alerta").removeClass();
		$("#alerta").addClass(`alert alert-${tipo}`);
		$("#alerta").show();
		$("#lista_de_errores").empty();
	}
</script>
@endsection
@endsection
