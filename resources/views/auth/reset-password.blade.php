@extends('layouts.auth')

@section('auth')

	<form
        class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
        novalidate="novalidate"
        method="POST"
        action="{{ route('password.update') }}"
    >
    @csrf
		<input type="hidden" name="token" value="{{ $request->route('token') }}">
		<input type="hidden" name="email" value="{{ $request->email }}">

        <div class="text-center mb-10">

            <h1 class="text-dark mb-3">
                Cadastrar nova senha
            </h1>

            <div class="text-gray-400 fw-bold fs-4">
                Já cadastrou uma nova senha?
                <a href="{{  route('login') }}" class="link-primary fw-bolder">
                    Efetuar login
                </a>
            </div>

			@if(session('status'))
				<br>
				<div class="alert bg-light-primary d-flex align-content-end">
					<span class="fw-bold ">
						{{ session('status') }}
					</span>
				</div>
			@endif

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

        <div class="fv-row mb-10 fv-plugins-icon-container">

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

        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary fw-bolder">
                Cadastrar nova senha
            </button>
        </div>

    </form>

@endsection
