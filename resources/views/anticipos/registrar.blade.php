@extends('layout', ['titulo' => ' Registrar anticipo'])
@section('content')
<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
				<div class="col-lg-7">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Registrar anticipo</h1>
						</div>
						<form class="user" action="{{ route('anticipos.guardar') }}" method="post">
							@csrf
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="number" class="form-control form-control-user" name="monto" id="exampleFirstName" placeholder="Ingrese Monto">
								</div>
								<div class="col-sm-6">
									<input type="date" class="form-control form-control-user" name="fecha" id="exampleInputPassword" value="{{ date('Y-m-d') }}">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<select class="form-control" name="empresas_id">
										<option selected="">Seleccione Empresa</option>
										@foreach($empresas as $emp)
										<option value="{{ $emp->id }}">{{ $emp->nombre }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-6">
									<select class="form-control" id="trabajadores_id" name="trabajadores_id">
										<option selected="">Seleccione Trabajador</option>
										@foreach($trabajadores as $trab)
										<option value="{{ $trab->id }}">{{ $trab->nombre }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">Registrar Costo</button>
							<hr>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection