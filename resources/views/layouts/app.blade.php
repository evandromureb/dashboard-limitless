<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
		  type="text/css">

	<link rel="stylesheet" href="{{ asset('css/fonts/icomoon/styles.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

	<livewire:styles/>

	@yield('localCSS')

</head>
<body>

@component('dashboard.navbar.base')@endcomponent


<div class="page-content">

	@component('dashboard.sidebar.base')@endcomponent

	<div class="content-wrapper">

		<div class="content-inner">

			@component('dashboard.header.base')@endcomponent

				<div class="content">
					@if(isset($slot))
						{{ $slot }}
					@else
						@yield('content')
					@endif
				</div>

				@component('dashboard.footer.base')@endcomponent

		</div>

	</div>


</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<livewire:scripts/>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

@yield('localScripts')

</body>
</html>
