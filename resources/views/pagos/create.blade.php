@extends('layout')
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
					<select name="empresas_id" class="custom-select" id="basic-addon1">
						@foreach($empresas as $empresa)
						<option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
						@endforeach
					</select>
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
@endsection
@endsection
