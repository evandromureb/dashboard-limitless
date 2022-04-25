@extends('layouts.auth')

@section('auth')

	<form
		class="form w-100"
		novalidate="novalidate"
		action="{{ route('login') }}"
		method="POST"
	>
	@csrf
		<div class="text-center mb-10">
			<h1 class="text-dark mb-3">
				Efetuar login
			</h1>

			<div class="text-gray-400 fw-bold fs-4">
				Novo por aqui?
				<a href="{{ route('register') }}" class="link-primary fw-bolder">
					Crie sua conta
				</a>
			</div>
		</div>

		<div class="fv-row mb-10">

			<label class="form-label fs-6 fw-bolder text-dark">
				E-mail
			</label>

			<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />

		</div>

		<div class="fv-row mb-10">

			<div class="d-flex flex-stack mb-2">

				<label class="form-label fw-bolder text-dark fs-6 mb-0">
					Senha
				</label>

				<a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">
					Recuperar senha
				</a>

			</div>

			<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />

		</div>

		<div class="text-center">

			<button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
				Entrar
			</button>

			{{--<div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>

			<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
				<img alt="Logo" src="/metronic8/demo1/assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />
				Continue with Google
			</a>

			<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
				<img alt="Logo" src="/metronic8/demo1/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />
				Continue with Facebook
			</a>

			<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
				<img alt="Logo" src="/metronic8/demo1/assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />
				Continue with Apple
			</a>--}}

		</div>

	</form>

@endsection
