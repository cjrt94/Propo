<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>@yield('title','Inicio')</title>

    <link rel="stylesheet" href="">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	 <!-- Vendor CSS -->
    <link href="{{ asset('vendors/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bower_components/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootgrid/jquery.bootgrid.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/farbtastic/farbtastic.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bower_components/chosen/chosen.css') }}" rel="stylesheet">


    <link href="{{ asset('vendors/summernote/dist/summernote.css') }}" rel="stylesheet">

	<!-- CSS -->
    <link href="{{ asset('css/inc/app_1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inc/app_2.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{mix('css/app.css') }}">


</head>
<body>

<div id="app">

	<header id="header" class="clearfix" data-ma-theme="blue">
            <ul class="h-inner">
                <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="hi-logo hidden-xs">
                    <a href="index.html">Propo</a>
                </li>

                <li class="pull-right">
                    <ul class="hi-menu">

                        <li class="dropdown">
                            <a data-toggle="dropdown" href="">
                                <i class="him-icon zmdi zmdi-notifications"></i>
                                <i class="him-counts"> 0 </i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg pull-right">
                                <div class="list-group him-notification">
                                    <div class="lg-header">
                                        Notification

                                        <ul class="actions">
                                            <li class="dropdown">
                                                <a href="" data-ma-action="clear-notification">
                                                    <i class="zmdi zmdi-check-all"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="lg-body">


                                    </div>

                                    <a class="view-more" href="">View Previous</a>
                                </div>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a data-toggle="dropdown" href=""><i class="him-icon zmdi zmdi-more-vert"></i></a>

                            <ul class="dropdown-menu dm-icon pull-right">

                                <li class="divider hidden-xs"></li>
                                <li class="hidden-xs">
                                    <a data-ma-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                                </li>
                                <li>
                                    <a data-ma-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                                </li>

                                <li>
                                    <a href="{{--{{ route('logout') }}--}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="zmdi zmdi-arrow-left"></i> Cerrar sesión</a>

                                     <form id="logout-form" action="{{--{{ route('logout') }}--}}" method="POST" style="display: none;">
                                            @csrf
                                    </form>

                                </li>
                            </ul>

                        </li>

                    </ul>
                </li>
            </ul>

            <!-- Top Search Content -->
            <div class="h-search-wrap">
                <div class="hsw-inner">
                    <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                    <input type="text">
                </div>
            </div>
    </header>


	<section id="main">

	 	<aside id="sidebar" class="sidebar c-overflow">

                <ul class="main-menu">

                    <li >
                        <a href="/admin"><i class="zmdi zmdi-home"></i> Home</a>
                    </li>

                     <li >
                        <a href="{{route('indexClient')}}"><i class="zmdi zmdi-accounts"></i> Clientes</a>
                    </li>

                    <li >
                        <a href="{{route('indexProduct')}}"><i class="zmdi zmdi-devices"></i> Productos</a>
                    </li>

                    <li >
                        <a href="{{url('admin/cotizaciones')}}"><i class="zmdi zmdi-folder-outline"></i> Cotizaciones</a>
                    </li>

                </ul>
            </aside>

		@yield('content')

	</section>


     <!-- Page Loader -->
    <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

</div>


	    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>
	    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{ asset('vendors/bower_components/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/flot.curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('vendors/sparklines/jquery.sparkline.min.js') }}"></script>

        <script src="{{ asset('vendors/bower_components/Waves/dist/waves.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
        <script src="{{ asset('vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script src="{{ asset('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{ asset('vendors/summernote/dist/summernote-updated.min.js')}}"></script>

        <script src="{{ asset('vendors/bower_components/moment/min/moment.min.js')}}"></script>

        <script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>


        <script src="{{ asset('vendors/bower_components/chosen/chosen.jquery.js')}}"></script>
        <script src="{{ asset('vendors/fileinput/fileinput.min.js')}}"></script>
        <script src="{{ asset('vendors/input-mask/input-mask.min.js')}}"></script>
        <script src="{{ asset('vendors/farbtastic/farbtastic.min.js')}}"></script>

        <script src="{{mix('js/app.js')}}"></script>


</body>
</html>
