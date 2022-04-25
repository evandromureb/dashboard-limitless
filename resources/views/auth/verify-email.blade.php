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


{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
--}}
