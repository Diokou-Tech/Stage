<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gestion Stage Admin ') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.css"/>
    <!-- Styles -->
    <!--LINK DE BOOTRAPS 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
    <script src="{{ asset('css/app.css') }}" defer></script>
</head>
<body>
<div class="container text-white">
    <div class="d-flex align-items-center flex-column justify-content-center pt-5 my-5">
        <img src="{{ asset('img/logo.gif') }} " alt="logo" width="300px" width="300px" class="img pt-5">
        
         <h4 class="text-white mt-4">Authentification</h4>   
        <form action="{{ route('login') }}" method="POST" class="col-5">  
        @csrf  
                <div class="form-group m-2 p-2 rounded-lg">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre e-mail..." value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        @error('email')
                            <span class="invalid-feedback alert-danger " role="alert">
                                <strong>{{ $message }}</strong>
                            </span> 
                        @enderror
                </div>
                        <div class="form-group m-2 p-2" >
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="current-password" placeholder="Mot de passe" />
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group m-2 p-2 text-center">
                             <button class="btn btn-primary btn-lg border-white" type="submit"> <i class="fa fa-sign-out-alt"></i> Se connecter </button>
                        </div>
        </form> 
        {{-- <a href="/register" class="btn btn-outline-info text-white">Inscription</a> --}}
        </div>
</div>
<style>
    body{
        background: linear-gradient(90deg, rgba(0,62,92,1) 0%, rgba(7,163,213,1) 100%, rgba(0,0,0,1) 100%);
    }
</style>
{{-- --}}
</body>
</html>