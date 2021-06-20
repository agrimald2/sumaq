<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SumaQ') }}</title>

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
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

    <style type="text/css">
        .title_span{
            font-size: 23px;
        }

        @media (max-width:769px){
            .title_span{
                font-size: 18px;
                margin: 53px;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
            <header id="tg-dashboardheader" class="tg-dashboardheader tg-haslayout">
                <span class="title_span"><b>{{$name_view}}</b></span>
                <div style="float: right;">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: rgb(0 0 0) !important;">
                        <i class="icon-exit"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div id="tg-sidebarwrapper" class="tg-sidebarwrapper">
                    <span id="tg-btnmenutoggle" class="tg-btnmenutoggle">
                        <i class="fa fa-bars"></i>
                    </span>
                    <div id="tg-verticalscrollbar" class="tg-verticalscrollbar" style="background-image: url(bg/bg-3.jpg);">
                        <strong class="tg-logo">
                            <a href="{{ url('/') }}">
                                <img src="logo/negativo2.png">
                            </a>
                        </strong>
                        <div class="tg-user">                           
                            <div class="tg-usercontent">
                                <h3>Bienvenido(a) {{ Auth::user()->name }}</h3>
                            </div>
                        </div>
                        <nav id="tg-navdashboard" class="tg-navdashboard">
                            <ul>
                                <li>
                                    <a href="{{url('/')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span> Dashboard</span>
                                    </a>
                                </li>  

                                <li>
                                    <a href="{{url('/category')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span> Categorias</span>
                                    </a>
                                </li>      

                                <li>
                                    <a href="{{url('/collection')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span> Colección</span>
                                    </a>
                                </li>  

                                <li>
                                    <a href="{{url('/material')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span> Material</span>
                                    </a>
                                </li>  

                                <li>
                                    <a href="{{url('/sucursal')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span> Sucursal</span>
                                    </a>
                                </li>  

                                <li>
                                    <a href="{{url('/discount')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Descuentos</span>
                                    </a>
                                </li>  

                                <li>
                                     <a href="{{url('/provider')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Provedores</span>
                                    </a>                                    
                                </li>

                                <li>
                                     <a href="{{url('/products')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Productos</span>
                                    </a>                                    
                                </li>

                                <li>
                                     <a href="{{url('/sales/pedidos')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Ventas</span>
                                    </a>                                    
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            
                @yield('content')
            

            <footer id="tg-footer" class="tg-footer tg-haslayout">
                <span class="tg-copyright">Todos los Derechos Reservados</span>
            </footer>

        </div>
    </div>

    <!-- Scripts -->    
    <script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
    <script src="{{ asset('js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv') }}2lv6sogci"></script>
    <script src="{{ asset('js/jquery.flagstrap.min.js') }}"></script>
    <script src="{{ asset('js/backgroundstretch.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('js/jquery.collapse.js') }}"></script>
    <script src="{{ asset('js/scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/countTo.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/gmap3.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
