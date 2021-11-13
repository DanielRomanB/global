<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/archivos/imagenes/servicios/')}}/@yield('3', auth()->user()->id)" rel="shortcut icon" />
    <title>@yield('title', 'Inicio')/@yield('3', auth()->user()->id)</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    {{-- <script src="@yield('vue_js', '#')" defer></script> --}}
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/footable/footable.core.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet">
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main.css') }}" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/icono.svg') }}" sizes="any">

</head>

<body class="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header" style="background: repeating-linear-gradient(146deg, black, transparent 100px);">
                        <div class="dropdown profile-element" style="left: 10% ">
                            <img alt="image" class="rounded-circle" src="https://cdn.shopify.com/s/files/1/0248/4692/5912/articles/1519305023-0-0_4deff7f8-587a-4500-9aef-ca5063e27da1_1024x1024.jpg?v=1567518338" style="width: 150px;height: 150px" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold spans">@yield('nombre',auth()->user()->email)</span>
                                {{-- <span class="block m-t-xs  spans ">@yield('area',auth()->user()->id) </span> --}}
                            </a>
                        </div>
                        <div class="logo-element">

                        </div>
                    </li>
                    <!-- MENU DESPELEGABLE -->
                    <li><a  href="{{route('home')}}"><img src="" class="iconos"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Inicio</span></a></li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Sistemas</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                           <li><a  href="{{route('sis_facturacion.index')}}"><img src="" class="iconos"> <span class="nav-label">Facturacion</span></a></li>
                            <li><a  href="{{route('sis_facturacion.index')}}"><img src="" class="iconos"> <span class="nav-label">Ticket</span></a></li>
                       </ul>
                   </li>

                   <!-- MENU DESPELEGABLE -->
               </ul>
           </div>
       </nav>
       {{-- Menu Superior --}}
       <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        {{-- <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                        <input type="text" placeholder="Buscar..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form> --}}
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Bienvenido :@yield('nombres',auth()->user()->id)</span>
                    </li>
                    <li>
                        {{-- <a href="{{route('home')}}">
                        <i class="fa fa-barsign-out"></i> Cerrar Secciónes
                    </a> --}}
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Cerrar Seccion
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>@yield('title', 'Inicio')</h2>
                        <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a>@yield('breadcrumb', '')</a>
                        </li>
                        <li class="breadcrumb-item active">
                        <strong>@yield('breadcrumb2', '')</strong>
                        </li>
                    </ol> -->
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a style="visibility:@yield('visibility', 'hidden')" {{-- data-toggle="@yield('a', '')" --}}  href="@yield('ruta', '')" class="btn btn-primary">@yield('name', '')</a>

                        <a data-toggle="@yield('data-toggle', '')"  href="@yield('href_accion', '#')" class="btn btn-primary">@yield('value_accion', '#')</a>

                        <a id="actualizar" data-toggle="@yield('data-config', '')" onclick="@yield('onclick', '')"   href="@yield('config', '')"  class="@yield('class', 'btn btn-primary')" @yield('atributo_actu', '') >@yield('button2', 'Actualizar')</a>
                        </div><!--
                            @yield('div', '') -->



                        </div>

                    </div>

                    @yield('content')




                    <div class="footer">
                        <div class="float-right">
                            Visitanos: &nbsp;&nbsp; <a href="https://www.facebook.com/JYPPERIFERICOSSAC" target="_blank" ><i class="fa fa-facebook-square" aria-hidden="true"></i></a>&nbsp;
                            <a href="https://api.whatsapp.com/send?phone=51946201443&text=Hola!%20Necesito%20Ayuda%20con%20el%20sistema%20de%20Facturación,%20Gracias!%20" target="_blank" ><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                        <div>
                            <strong>Copyright </strong> &nbsp;<a href="http://www.jypsac.com" target="_blank" > JyP Perifericos</a>&nbsp;  &copy; 2019-2020
                        </div>

                    </div>
                </div>
            </div>


        </body>
        </html>
