@extends('layouts.auth')

@section('auth')

	<div class="pt-lg-10 mb-10">

		<h1 class="fw-bolder fs-2qx text-gray-800 mb-7">
			Verifique seu e-mail
		</h1>
		@if (session('status') == 'verification-link-sent')
			<div class="alert bg-light-primary d-flex align-content-end">
				<span class="fw-bold ">
					Mensagem reenviada para o seu e-mail cadastrado.
				</span>
			</div>
		@endif

		<div class="fs-3 fw-bold text-muted mb-10">
			Foi enviado uma mensagem com um link de verificação de sua conta.
			<br>
			Verifique seu e-mail para confirmar sua conta.
		</div>

		<div class="text-center mb-10">
			<a href="{{ route('login') }}" class="btn btn-lg btn-primary fw-bolder">
				Efetuar login
			</a>
		</div>


		<form method="POST" action="{{ route('verification.send') }}">
			@csrf

			<div class="fs-5">
				<span class="fw-bold text-gray-700">
					Não recebeu a mensagem?</span>
				<button type="submit" class="link-primary fw-bolder">
					Reenviar e-mail
				</button>
			</div>

		</form>

	</div>

@endsection
