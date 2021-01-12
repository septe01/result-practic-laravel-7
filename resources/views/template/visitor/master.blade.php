<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <title>@yield('title')</title>
</head>

<body>

    @include('template.visitor.nav')

    <div class="container">
        @yield('content')
    </div>

    @include('template.visitor.footer')