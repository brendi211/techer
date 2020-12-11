<head>
    <title>@yield('title') </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="#" />
    <meta property="og:title" content="{{ config('app.name', 'Techer') }}" />
	<meta property="og:description" content="@yield('description')" />
	<!-- Is optimized. -->
	<meta name="description" content="@yield('description')" />
	<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
	<meta property="og:locale" content="ru_RU" />
	<meta property="og:type" content="article" />
	@php
	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	@endphp
	<meta property="og:url" content="{{ $url }}" />
	<meta property="og:site_name" content="" />



    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-reboot.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

</head>