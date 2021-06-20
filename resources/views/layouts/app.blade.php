<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta name="description" content="SumaQ">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'Laravel')  }} </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body class="tg-home tg-homeone">
    <div id="app">
        <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
            <header id="tg-header" class="tg-header tg-haslayout">
                <div class="tg-navigationarea">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <strong class="tg-logo">
                                    <a href="{{ url('/') }}">
                                       <img src="#" style="width: 184px; height: 39px;">
                                    </a>
                                </strong>
                                @guest
                               

                                @else

                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            
                @yield('content')
            
        </div>
    </div>

    <!-- Scripts -->    
    <script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/tinymce.min4bb5.js?piKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci') }}"></script>
    <!-- <script src="{{ asset('js/responsivethumbnailgallery.html') }}"></script> -->
    <script src="{{ asset('js/jquery.flagstrap.min.js') }}"></script>
    <script src="{{ asset('js/backgroundstretch.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('js/jquery.collapse.js') }}"></script>
    <script src="{{ asset('js/scrollbar.min.js') }}"></script>
    <!-- <script src="{{ asset('js/chartist.min.html') }}"></script> -->
    <script src="{{ asset('js/prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/countTo.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/gmap3.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://checkout.culqi.com/js/v3"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
</body>
</html>
