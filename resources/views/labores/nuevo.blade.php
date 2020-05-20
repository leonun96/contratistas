@extends('layout', ['titulo' => 'Nueva labor'])
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
							<h1 class="h4 text-gray-900 mb-4">Crea una nueva labor</h1>
						</div>
						<form class="user" action="{{ route('labores.store') }}" method="post">
							@csrf
							<div class="form-group {{-- row --}}">
								{{-- <div class="col-sm-6 mb-3 mb-sm-0"> --}}
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" name="labor" id="exampleInputPassword" placeholder="Ingrese Nombre Labor">
									</div>
								</div>
								<div class="form-group row">
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
								</div>
								<hr>&nbsp
							<button type="submit" class="btn btn-primary btn-user btn-block">Registrar Labor</button>
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