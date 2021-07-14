<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!--SCRIPTS DE CHART-->
    <script src="{{ asset('_gs_public/js/loader.js') }}" defer></script>
    <script src="{{ asset('_gs_public/js/bootstrap.min.js') }}" defer></script>
    
    
   <!-- <script src="{{ asset('js/jquery.min.js') }}" defer></script>-->
   <!-- <script src="{{ asset('js/dropdown.js') }}"></script>-->

    <!-- Fonts -->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--Ultimo link adicionada-->
    <!--
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
-->
    <!--LINK DE BOOTRAPS 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container text-white">
    <div class="d-flex align-items-center flex-column justify-content-center pt-5 my-5">
        <img src="{{ asset('_gs_public/img/logo.gif') }} " alt="logo" width="300px" width="300px" class="img pt-5">
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
                        
                        <div class="form-group">

                             <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            
                        </div>

                        <div class="form-group m-2 p-2 text-center">
                             <button class="btn btn-primary btn-lg " type="submit">Se connecter </button>
                        </div>
                          
        </form> 
       

        
        <!-- <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis excepturi tenetur iusto omnis amet eveniet natus doloribus? Facilis, quis tenetur quidem sequi illo odit praesentium in consequatur voluptate ab architecto.
            Sapiente, nihil unde. Earum, a voluptates vero doloremque, autem odit doloribus debitis facilis blanditiis tempore nobis ex quam corporis? Possimus nostrum voluptas adipisci sequi reiciendis, maiores similique eveniet dicta libero.
        </p> -->
        </div>
</div>
<style>
    body{
        background: linear-gradient(90deg, rgba(0,62,92,1) 0%, rgba(7,163,213,1) 100%, rgba(0,0,0,1) 100%);
    }
</style>
    
    <!--<script src="{{ asset('C:/wamp64/www/_gestionStage/public/_gs_public/js/bootstrap.min.js') }}" ></script>-->
    <script src="{{ asset('_gs_public/js/script.js') }}" ></script>
    <script src="{{ asset('_gs_public/js/jquery-3.5.1.min.js') }} "></script>
    <script src="{{ asset('_gs_public/js/bootstrap.min.js') }}" ></script>
  
</body>
</html>