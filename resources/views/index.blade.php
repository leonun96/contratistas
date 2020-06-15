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
</div>
<!-- /.container-fluid -->
@endsection
@section('js')
<script type="text/javascript">
	$("#search").keyup(function(event) {
		let val = $("#search").val();
		console.log(val);
		$.ajax({
			url: `/buscador/${val}`,
			type: 'GET',
		})
		.done(function(response) {
			console.log(response);
		})
		.fail(function() {
			// console.log("error");
		})
		.always(function() {
			// console.log("complete");
		});
		
	});
</script>
@endsection