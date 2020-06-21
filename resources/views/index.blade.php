@extends('layout', ['titulo' => 'Inicio'])
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Buscador de trabajadores y pagos</h1>
	<hr>
	<!-- Search form -->
	<form class="form-inline active-cyan-4">
		@csrf
		<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Buscar" id="search" aria-label="Search">
		<i class="fas fa-search" aria-hidden="true"></i>
	</form>
	<hr>
	<div class="container-fluid">
		<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%; display: none;">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Labor</td>
					<td>Pago</td>
					<td>Fecha</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody id="tbody">
			</tbody>
		</table>
	</div>
</div>
<!-- /.container-fluid -->
@endsection
@section('js')
<script type="text/javascript">
	$("#search").keyup(function(event) {
		let val = $("#search").val();
		if (val == null || val.length == 0) {
			return false;
		} else {
			$.ajax({
				url: `/buscador/${val}`,
				type: 'GET',
			})
			.done(function(response) {
				console.log(response);
				if ($.isEmptyObject(response)) {
					$("#table_id").show();
					$("#tbody").empty();
					$("#tbody").append(`<tr><td colspan="5" align="center">Trabajador no encontrado o no tiene pagos durante los últimos siete días</td></tr>`);
				} else {
					$("#table_id").show();
					$("#tbody").empty();
					$("#tbody").append(`<tr>
						<td id="_data">${response.nombre}</td>
					</tr>`);
					// $.each(response.pagos, function(index, val) {
					// 	("#_data").append(`
					// 		<td>${val.}</td>
					// 	`);
					// });
				}
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});
		}
	});
</script>
@endsection