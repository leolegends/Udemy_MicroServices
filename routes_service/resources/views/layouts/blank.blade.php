
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/material_css/animate.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <link href="{{ asset('/material_css/jquery-toast.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin=""/>
     <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet' />
        <link href="{{ asset('/material_css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/material_css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <style>
            .pointer {
                cursor: pointer;
            }

            .pointer:hover{
                background-color: #2980b9;
                color: #fff;
            }

            #mapa {
               height: 360px;
            }

        </style>
        <script type="text/javascript" src="{{asset('material_js/jquery-3.2.1.js')}}"></script>

        <!-- tour personalizado -->

        <link rel="stylesheet" href="{{ asset('material_css/enjoyhint.css') }}">
    
        
        @yield('pageStyleSheets')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uello') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
<div id="content">

        <header class="navbar navbar-dark bg-dark">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand mb-0 text-black" href="{{ url('/') }}">
                            <img src="{{asset('img/logo-uello-branco.png')}}" alt="" width="100" height="20">      
                        </a>
                    </div>  
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Registrar</a></li>
                        @else
                        <li class="btn btn-danger btn-sm">
                            
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style="color: white;">
                                        Sair
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </header>
                
@yield('content')

</div>
    <!-- Scripts -->
@yield('pageScripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('material_js/jquery.toast.js')}}"></script>
    <script type="text/javascript" src="{{asset('material_js/modal.js')}}"></script>
    <script type="text/javascript" src="{{asset('material_js/tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('material_js/util.js')}}"></script>
    <script type="text/javascript" src="{{asset('material_js/collapse.js')}}"></script>
    <script type="text/javascript" src="{{asset('material_js/popover.js')}}"></script>
    <script type="text/javascript" src="{{ asset('material_js/bootstrap.min.js') }}"></script>
    
</body>
</html>
