@extends('layouts.auth')

@section('auth')

	<form
		class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
		novalidate="novalidate"
		action="{{ route('password.email') }}"
		method="POST"
	>
	@csrf

		<div class="text-center mb-10">

			<h1 class="text-dark mb-3">
				Esqueceu a senha?
			</h1>

			<div class="text-gray-400 fw-bold fs-4">
				Insira seu e-mail para receber um link para redefinir sua senha.
			</div>

			<div class="alert bg-light-primary d-flex align-content-end">
				<span class="fw-bold ">
					Foi enviado um link para redefinir sua senha.
				</span>
			</div>

		</div>

		<div class="fv-row mb-10 fv-plugins-icon-container">

			<label class="form-label fw-bolder text-gray-900 fs-6">
				E-mail
			</label>

			<input
				class="form-control form-control-solid"
				type="text"
				placeholder=""
				name="email"
				autocomplete="off"
			>

			<div class="fv-plugins-message-container invalid-feedback">
				Error
			</div>
		</div>

		<div class="d-flex flex-wrap justify-content-center pb-lg-0">
			<button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
				Enviar
			</button>

			<a href="{{ route('login') }}"
			   class="btn btn-lg btn-light-primary fw-bolder"
			>
				Cancelar
			</a>

		</div>

	</form>

@endsection
