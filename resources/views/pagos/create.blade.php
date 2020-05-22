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
			<form method="post" action="">
				@csrf
				<div class="input-group mb-3">
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
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Labor</span>
					</div>
					<select name="labor_id" class="custom-select" id="labores">
						<option>Seleccione la labor</option>
					</select>
				</div>
				<div class="col-xs-12 cont-info">
					<div class="col-xs-12">
						<div class="col-xs-12 datos" style="margin-top: 15px">
							<p class="titulo">BUSCADOR DE TRABAJADORES <i class="fa fa-pencil"></i></p>
							<div class="col-xs-12 col-md-6 form">
								<p class="col-xs-3 col-md-4 col-lg-4">Nombre trabajador: </p>
								<div class="col-xs-9 col-md-8 col-lg-8">
									<input list="trabajadores" class="input" id="lista_tbjdores">
									<datalist id="trabajadores">
										@foreach($clientes as $cliente)
										<option value="{{ $cliente->nombre }}" data-id="{{ $cliente->id }}"></option>
										@endforeach
									</datalist>
								</div>
							</div>
						</div>
					</div>
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
			console.log(response);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			// console.log("complete");
		});
	});
	/* LISTA DE TRABAJADORES */
	$('#lista_clientes').on('input', function() {
		let value = $(this).val();
		let id = $(`#clientes [value ="${value}"]`).data('id');
		let id2 = $(`#clientes [value ="${value}"]`).attr('data-id');
		// console.log(id, value, id2);FUNCIONAN LOS TRES!3
		if (typeof id === 'undefined') {
			console.log('valor no valido');
		} else {
			$.ajax({
				url: `/ventas/${id}/cliente`,
				type: 'GET',
			})
			.done(function(response) {
				$("#rut").val(response.rut);
				let rut = response.rut;
				// document.getElementById('resultado').innerHTML = response;
				$.ajax({
					url: `/${rut}/buscacliente`,
					type: 'GET',
				})
				.done(function(response) {
					document.getElementById('resultado').innerHTML = response;
				})
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});
			
		}
	});
	/* /LISTA DE CLIENTES */
</script>
@endsection
@endsection
