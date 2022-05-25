<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {!! SEO::generate() !!}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('custom.images.shortcut-icon')) }}" />
    <!-- Boostrap 5. và JS-->
    <link href="{{ asset('public/lib/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/lib/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/lib/Parsley.js-2.9.2/parsley.min.js') }}"></script>

    <script src="{{ asset('public/lib/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js') }}">
    </script>

    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <!-- End Boostrap 5. -->

    <!-- List CSS Link-->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/header.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/footer.css') }}" rel="stylesheet" type="text/css">
    @stack('css')
    <!-- End list CSS Link-->

    <!-- List JS Link-->
    

    <!-- End list JS Link-->
</head>
<body>