<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Блог для иванов</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    </head>
    <body class="font-sans antialiased  dark:text-black">
        @include('layout.includes.header')
        <main id="" class="container mx-auto main">
            @yield('content')
        </main>
        @include('layout.includes.footer')
        
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/js/skel.min.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
    
</html>