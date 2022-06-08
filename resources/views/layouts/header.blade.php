<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>The Case Of Shows</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/imageFlex.css') }}" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
		<noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}" /></noscript>
	</head>
	<body class="left-sidebar is-preload">
		<div id="page-wrapper">
            <div id="header">

                <!-- Inner -->
                    <div class="inner">
                        <header>
                            <h1><a href="index.html" id="logo">{{ $resource ?? ''}}</a></h1>
                        </header>
                    </div>

                <!-- Nav -->
                @include('layouts.navigation')
                

            </div>