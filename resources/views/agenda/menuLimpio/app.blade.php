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
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>    

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap4/dist/css/bootstrap.min.css">    

    <style type="text/css">
        #menu {
        z-index:10001;
        width: 500px;
        margin: 0 auto
        }
        #menu>ul>li {
            z-index:10001;
        float: left
        }
        #menu>ul>li a {
            z-index:10001;
        display: block;
        width: 100px;
        height: 50px;
        background: green;
        text-align: center;
        line-height: 50px
        }
        #menu>ul>li>ul {
            z-index:10001;
        display: none
        }
        #menu>ul>li>ul>li {
            z-index:10001;
        position: relative
        }
        #menu>ul>li>ul>li>a {
            z-index:10001;
        background: red
        }
        #menu>ul>li>ul>li>ul {
            z-index:10001;
        position: absolute;
        left: 100px;
        top: 0;
        display: none
        }
        #menu>ul>li>ul>li>ul a {
            z-index:10001;
        background: #ff0
        }
        #menu ul {
            z-index:10001;
        list-style: none;
        margin: 0;
        padding: 0
        }

        .noshow{
            z-index:10001;
        position:absolute;
        left:80px;
        }
    </style>

    <script type="text/javascript">
			$(document).ready(function() {
                $('.noshow').hide();
                
				$("#menuDiv").mouseover(function(){
                    $( "#logoDinamico" ).removeClass( "logoChico" );
                    $( "#logoDinamico" ).addClass( "logoNormal" );
                    $( "#nombreUsuario" ).addClass( "datosSession" );
                    $('#noshow').show();
                });                 
                
				$("#menuDiv").mouseout(function(){             
                    $( "#logoDinamico" ).removeClass( "logoNormal" );
                    $( "#logoDinamico" ).addClass( "logoChico" );
                    $( "#nombreUsuario" ).removeClass( "datosSession" );
                    $('#noshow').hide();
				}); 

                $menu = $('#menuDiv').find('ul').find('li');

                $menu.hover(function() {
                    $(this).children('ul').stop();
                    $(this).children('ul').slideDown();
                }, function() {
                    $(this).children('ul').stop();
                    $(this).children('ul').slideUp();
                });
			});
		</script>
</head>
<body id='principal' name='principal'>
    <div id='area' class="area"></div>        
        <nav id='menuDiv' class="main-menu">        
            <ul>
                <li>
                    </br>
                    <div id='logoDinamico' class="logoChico"></div>        
		            <center><span id='nombreUsuario'class=''>
                        <?PHP echo session('nombre');?></span>
                    </center>
                </li>
            </ul>
            <ul>
                <li class="has-subnav">
                    <a href="http://justinfarrow.com">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="{{route('nuevaCotizacion')}}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            Cotización
                        </span>
                    </a>                    
                </li>
                
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            Administraci&oacute;n
                        </span>
                    </a>
                    <ul id='noShow' class='noShow'>
                        <li class="has-subnav">
                            <a href="{{route('administracionSistemas')}}">
                                    Sistemas
                            </a>
                        </li>
                        <li class="has-subnav">
                            <a href="#">Actividades/Tiempo</a>
                        </li>
                    </ul>                   
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
</body>
</html>
