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
							<h1 class="h4 text-gray-900 mb-4">Crea una Nueva Empresa del sistema</h1>
						</div>
						<form class="user" action="{{ route('empresas.store') }}" method="post">
							@csrf
							<div class="form-group {{-- row --}}">
								{{-- <div class="col-sm-6 mb-3 mb-sm-0"> --}}
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" name="nombre" id="exampleInputPassword" placeholder="Ingrese Nombre Empresa">
									</div>
									<br>
									<br>
									<br>
									<div class="col-sm-12 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" name="correo" id="exampleInputPassword" placeholder="Ingrese correo empresa">
									</div>
								</div>
								
								<br>
								<br>

							<button type="submit" class="btn btn-primary btn-user btn-block">Registrar Empresa</button>
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