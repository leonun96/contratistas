@extends('layout')
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
							<h1 class="h4 text-gray-900 mb-4">Crea un Nuevo Trabajador del sistema</h1>
						</div>
						<form class="user" action="{{ route('trabajadores.store') }}" method="post">
							@csrf
							<div class="form-group {{-- row --}}">
								{{-- <div class="col-sm-6 mb-3 mb-sm-0"> --}}
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" name="nombre" id="exampleInputPassword" placeholder="Ingrese Nombre">
									</div>
									<div class="col-sm-6">
										<input type="text" name="rut" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ingrese Rut">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="email" class="form-control form-control-user" name="correo" id="exampleInputEmail" placeholder="Direccion de correo">
									</div>
									<div class="col-sm-6">
										<input type="date" class="form-control form-control-user" name="nacimiento" id="exampleInputPassword" placeholder="Ingrese Fecha">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<select name="empresas_id" class="custom-select" required>
										@foreach($empresas as $empresa)
										<option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-6" >
									<select class="custom-select" name="afp" required>
										<option>Seleccione AFP</option>
										<option value="Modelo">Modelo</option>
										<option value="Capital">Capital</option>
									</select>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">Registrar Trabajador</button>
							<hr>
							{{-- <a href="index.html" class="btn btn-google btn-user btn-block">
								<i class="fab fa-google fa-fw"></i> Register with Google
							</a>
							<a href="index.html" class="btn btn-facebook btn-user btn-block">
								<i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
							</a> --}}
						</form>
						{{-- <hr>
						<div class="text-center">
							<a class="small" href="forgot-password.html">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="login.html">Already have an account? Login!</a>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection