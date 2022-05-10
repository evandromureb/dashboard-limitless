@extends('layouts.messages')

@section('messages')
	<div class="pt-lg-10 mb-10">

		<h1 class="fw-bolder fs-2qx text-gray-800 mb-7">
			Sua conta foi desativada
		</h1>

		<div class="w-lg-600px fw-bold fs-3 text-muted mb-15">
			Para saber mais informações entre em contato com o administrador do sistema
		</div>

		<div class="text-center">
			<a href="{{ url('') }}" class="btn btn-lg btn-primary fw-bolder">
				Voltar para o site
			</a>
		</div>

	</div>
@endsection
