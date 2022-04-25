@extends('layouts.auth')

@section('auth')

	<form 
        class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
        novalidate="novalidate"
        method="POST"
        action="{{ route('password.email') }}"    
    >
    @csrf

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
            
        </div>
        
        <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
        
            <div class="mb-1">
            
                <label class="form-label fw-bolder text-dark fs-6">
                    Senha
                </label>

                <div class="position-relative mb-3">

					<input
						class="form-control form-control-lg form-control-solid"
						type="password"
						placeholder=""
						name="password"
						autocomplete="off"
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
            
            <div class="fv-plugins-message-container invalid-feedback">
                Erro
            </div>
            
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
            >
            <div class="fv-plugins-message-container invalid-feedback">
                Erro
            </div>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary fw-bolder">
                Cadastrar
            </button>
        </div>
        
    </form>

@endsection

{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
