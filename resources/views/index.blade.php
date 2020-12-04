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
	<div class="container-fluid" id="tabla_result">
		<table id="table_id" class="table table-striped table-bordered display table-hover" style="width:100%; display: none;">
			<thead>
				<tr>
					<td>Labor</td>
					<td>Pago</td>
					<td>Cantidad</td>
					<td>Fecha</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody id="tbody">
			</tbody>
		</table>
	</div>
	{{-- <hr> --}}
	<div class="container-fluid" class="btn-group">
			<button type="button" class="btn btn-primary text-right" onclick="printDiv('tabla_result','Pagos')">Imprimir</button>
			{{-- <button type="button" class="btn btn-primary text-right" onclick="saveDiv('tabla_result','Pagos')">Guardar</button> --}}
	</div>
</div>
<!-- /.container-fluid -->
@endsection
@section('js')
{{-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script> --}}
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
					$("#tbody").append(`
					<tr><td>Nombre: </td></tr>
					<tr>
						<td colspan="3" align="center">Trabajador no encontrado o no tiene pagos durante los últimos siete días</td>
					</tr>`);
				} else {
					$("#table_id").show();
					$("#tbody").empty();
					$("#tbody").append(`<tr>
						<td colspan="5" align="left">${response.nombre}</td>
					</tr>`);
					$.each(response.pagos, function(index, val) {
						$("#tbody").append(`
							<tr>
								<td>${val.costos.labores.labor}</td>
								<td>${val.costos.valor}</td>
								<td>${val.cantidad}</td>
								<td>${val.fecha}</td>
								<td>${val.total}</td>
							</tr>
						`);
					});
					$.each(response.anticipos, function(index, val) {
						$("#tbody").append(`
							<td colspan="4" align="left">Anticipo</td>
							<td>${val.monto}</td>
						`);
					});
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
	// function saveDiv(divId, title) {
	// 	var doc = new jsPDF();
	// 	doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
	// 	doc.save('div.pdf');
	// }

	function printDiv(divId, title) {
		let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
		mywindow.document.write(`<html><head><title>${title}</title>`);
		mywindow.document.write('</head><body >');
		mywindow.document.write(document.getElementById(divId).innerHTML);
		mywindow.document.write('</body></html>');

		mywindow.document.close(); // necessary for IE >= 10
		mywindow.focus(); // necessary for IE >= 10*/

		mywindow.print();
		mywindow.close();

		return true;
	}
</script>
@endsection