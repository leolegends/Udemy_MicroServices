
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/material_css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('/material_css/bootstrap.min.css') }}" rel="stylesheet">

        <title>{{env('APP_NAME', 'DEV')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #2c3e50;
                font-family: 'Raleway', sans-serif;
                color: #fff;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color: #fff;">Home</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md animated fadeInUp text-center">
                <img src="{{asset('img/logo-uello-branco.png')}}" alt="">  
                </div>
            <div class="row">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-sm-10 col-form-label text-md-left">{{ __('Email:') }}</label>
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-10 col-form-label text-md-left">{{ __('Senha:') }}</label>
                        <div class="col-md-12">

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div><br>
                    <div class="form-group row mb-0 animated fadeInUp">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                <b>Entrar já!</b>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            </div>
        </div>
    </body>
</html>
