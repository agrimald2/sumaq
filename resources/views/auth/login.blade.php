<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta name="description" content="Sómos un nuevo canal de comercio electronico nacidos en Perú para ser el nuevo  canal entre los comercios y los clientes, plataforma web para comercios, ventas online, posicionados en piura, ecommerce, perú, emprendimientos.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="/logo/loading.jpg" type="image/gif" />

    <title> {{ config('app.name', 'Laravel') }} </title>

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
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="tg-homebanner" class="tg-homebanner tg-haslayout" style="margin-top: 140px;">
                <figure style="background-image: url(bg/bg-3.jpg);width: 100%;height: 86%;margin-top: -36px;">
                    <div style="position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden; background-size: cover; background-color: transparent; background-repeat: no-repeat; background-position: 50% 50%;">
                    </div>
                            <figcaption>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="tg-bannercontent">
                                                <div class="container">                                                    
                                                    <div class="tg-logingarea" style="border-radius: 23px;width: 42%;">
                                                        <h2 style="color: black;padding: 22px;">
                                                            <div>
                                                                <img src="#" class="img-responsive">
                                                            </div>
                                                            {{ __('Ingresar') }}
                                                        </h2>
                                                        <div>
                                                            <span style="color: #bbb2b2;">Ingrese su datos para ingresar a la plataforma</span>
                                                        </div>
                                                        <form method="POST" class="tg-formtheme tg-formloging" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                                            @csrf

                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="input-user" style="background:#efefef;padding: 14px;">
                                                                            <i class="fa fa-user"></i>
                                                                        </span>
                                                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>           
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="input-user" style="background:#efefef;padding: 14px;">
                                                                            <i class="fa fa-user"></i>
                                                                        </span>
                                                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                                                        @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <button class="tg-btn" type="submit">
                                                                    INGRESAR
                                                                </button>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                </figure>
            </div>
        </div>
    </div>

    <!-- Scripts -->    
    <script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB5bTMMQr0xyw58_8cYbc9LNYlerGz8ats&amp;language=en"></script>
    <script src="{{ asset('js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci') }}"></script>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
</body>
</html>

