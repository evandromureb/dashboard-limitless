@extends('layouts.auth')

@section('auth')

<form
	class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
	novalidate="novalidate"
	action="{{ route('register') }}"
	method="POST"
>
@csrf

	<div class="mb-10 text-center">

		<h1 class="text-dark mb-3">
			Criar nova conta
		</h1>

		<div class="text-gray-400 fw-bold fs-4">
			Já possui uma conta?
			<a href="{{ route('login') }}"
			   class="link-primary fw-bolder">
				fazer login
			</a>
		</div>

	</div>

	<div class="row fv-row mb-7 fv-plugins-icon-container">

		<div class="fv-row mb-7 fv-plugins-icon-container">

			<label class="form-label fw-bolder text-dark fs-6">
				Nome
			</label>

			<input
				class="form-control form-control-lg form-control-solid @error('name') is-invalid bg-light-danger @enderror"
				type="text"
				placeholder=""
				name="name"
				autocomplete="off"
				value="{{ old('name') }}"
			>
			@error('name')
				<div class="fv-plugins-message-container invalid-feedback">
					{{ $message }}
				</div>
			@enderror

		</div>

		<div class="fv-row mb-7 fv-plugins-icon-container">

			<label class="form-label fw-bolder text-dark fs-6">
				E-mail
			</label>

			<input
				class="form-control form-control-lg form-control-solid @error('email') is-invalid bg-light-danger @enderror"
				type="text"
				placeholder=""
				name="email"
				autocomplete="off"
				value="{{ old('email') }}"
			>
			@error('email')
				<div class="fv-plugins-message-container invalid-feedback">
					{{ $message }}
				</div>
			@enderror

		</div>

		<div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">

			<div class="mb-1">

				<label class="form-label fw-bolder text-dark fs-6">
					Senha
				</label>

				<div class="position-relative mb-3">

					<input
						class="form-control form-control-lg form-control-solid @error('password') bg-light-danger @enderror"
						type="password"
						placeholder=""
						name="password"
						autocomplete="off"
						maxlength="16"
					>
					<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
						  data-kt-password-meter-control="visibility"
					>
						<i class="bi bi-eye-slash fs-2"></i>
						<i class="bi bi-eye fs-2 d-none"></i>
					</span>

				</div>

				<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
				</div>

			</div>
			@error('password')
				<div class="fv-plugins-message-container invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="fv-row mb-5 fv-plugins-icon-container">

			<label class="form-label fw-bolder text-dark fs-6">
				Confirmar senha
			</label>

			<input
				class="form-control form-control-lg form-control-solid"
				type="password"
				placeholder=""
				name="password_confirmation"
				autocomplete="off"
				maxlength="16"
			>

		</div>

		<div class="fv-row mb-10 fv-plugins-icon-container">
			<label class="form-check form-check-custom form-check-solid form-check-inline">

				<input
					class="form-check-input"
					type="checkbox"
					name="accepted"
					value="@if(old('accepted')) {{ old('accepted') }} @else 1 @endif"
					@if(old('accepted')) checked @endif
				>

				<span class="form-check-label fw-bold text-gray-700 fs-6">
					Eu concordo com os
					<a href="javascript:" class="ms-1 link-primary">
						Termos e condições de uso
					</a>.
				</span>
			</label>

			@error('accepted')
				<div class="fv-plugins-message-container invalid-feedback">
					{{ $message }}
				</div>
			@enderror

		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-lg btn-primary">
				Cadastrar
			</button>
		</div>
	</div>

</form>

@endsection
