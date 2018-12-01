<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/material_css/animate.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/material_css/font-awesome.min.css')}}">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/material_css/jquery-toast.css') }}" rel="stylesheet">

        <link href="{{ asset('/material_css/animate.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/material_css/font-awesome.min.css')}}">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/material_css/bootstrap.min.css') }}" rel="stylesheet">

       <!-- tour personalizado -->

    <link rel="stylesheet" href="{{ asset('material_css/enjoyhint.css') }}">


        <link rel="stylesheet" href="{{ asset('material_css/style4.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uello') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="content">
  @yield('content')
</div>
    <!-- Scripts -->
@yield('pageScripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.toast.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/util.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/collapse.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popover.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/material_js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{asset('js/enjoyhint.min.js')}}"></script>

</body>
</html>
