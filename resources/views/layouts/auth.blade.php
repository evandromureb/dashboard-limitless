<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>
		{{ config('app.name') }}
	</title>
    <meta charset="utf-8" />
    <meta name="description" content="{{ url('') }}" />
    <meta name="keywords" content="{{ url('') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="/metronic8/demo1/assets/media/logos/favicon.ico" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('auth/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('auth/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />


</head>

<body id="kt_body" class="bg-body">

<div class="d-flex flex-column flex-root">

    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('images/illustrations/sketchy-1/14.png') }}">

        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

            <a href="{{ url('') }}" class="mb-12">
                <img alt="Logo" src="{{ asset('images/logo.png') }}" class="" />
            </a>

            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                @yield('auth')
            </div>

        </div>

        {{--<div class="d-flex flex-center flex-column-auto p-10">

            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>

        </div>--}}

    </div>

</div>


<script src="{{ asset('auth/js/plugins.bundle.js') }}"></script>
<script src="{{ asset('auth/js/scripts.bundle.js') }}"></script>

</body>

</html>
