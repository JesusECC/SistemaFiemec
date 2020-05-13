<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"  href="{{asset('img/favicon.ico')}}"/>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Albalex Electric</title>
   
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">


</head>
<body>
    <div class="limiter">
        
        <div class="container-login100" style="background-image: url('img/Modificacion4.png')!important;background-repeat: no-repeat;background-position: center;">
            <div class="wrap" style="margin-top: -100px !important">

                    @yield('content')
               
            </div>
        </div>
    </div>

 
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>

    <script src="{{asset('vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
