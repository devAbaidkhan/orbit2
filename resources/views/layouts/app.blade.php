<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" sizes="16x16">


    <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>
    @include('layouts.css')
    <link rel="stylesheet" href="{{ asset('css/front-end/style.css') }}" type="text/css" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    <style>
        .error{
            color: red;
            font-weight: 100;
            font-size: 12px;
        }
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini layout-fixed">
@yield('content')

<!-- REQUIRED SCRIPTS -->

@include('layouts.js')
@yield('js')
</body>

</html>
