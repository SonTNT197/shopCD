<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="shortcut icon" href="{{ asset('adminkit/src/img/icons/icon-48x48.png') }}" />
	<link href="{{ asset('adminkit/static/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminkit/static/css/app.css.map') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminkit/fontawesome/css/all.css') }}">
    <link href="{{ asset('adminkit/static/css/bootstrap.css') }}" rel="stylesheet">
    @yield('title')
</head>

<body>
	<div class="wrapper">
		@include('patials.sidebar')

		<div class="main">
            @include('patials.header')
            @yield('content')
		    @include('patials.footer')
		</div>

	</div>
	<script src="{{ asset('adminkit/src/js/app.js') }}"></script>
    <script src="{{ asset('adminkit/src/js/bootstrap.js') }}"></script>
</body>

</html>
