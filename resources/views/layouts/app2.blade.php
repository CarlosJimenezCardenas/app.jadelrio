<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <script src="js/simple-mobile-menu.js"></script>    
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/simple-mobile-menu.css">
    <link rel="stylesheet" href="css/simple-mobile-menu-responsive.css">
    <script>
      $(document).ready( function () {
          $('#general').on("mouseover", function () {
            $('#botones').show();
          });

          $('#general').on("mouseout", function () {
            $('#botones').hide();
          });

          $('#cerrarSesion').click(function(){
            $("#form").prop("method","POST");
            $("#form").prop("action","/cerrarSession");
            $('#form').submit();
          });          

          $('#cerrarSesion').click(function(){
              $("#form").prop("method","POST");
              $("#form").prop("action","/cerrarSession");
              $('#form').submit();
              
              $("#forma").prop("method","POST");
              $("#forma").prop("action","/cerrarSession");
              $('#forma').submit();
          });

          $('#inicio').click(function(){
            $("#form").prop("method","POST");
            $("#form").prop("action","/indexPOST");
            $('#form').submit();
            
            $("#forma").prop("method","POST");
            $("#forma").prop("action","/indexPOST");
            $('#forma').submit();
          });   

          $('#pdf').click(function(){
            //alert(document.location.href);
          });             

          $('#menu').click(function(){
            /*$("#forms").prop("method","POST");
            $("#forms").prop("action","http://127.0.0.1:8009/respuestaLoginBotonMenu");
            $('#forms').submit();
            return;*/
            /*$("#forma").prop("method","POST");
            $("#forma").prop("action","http://127.0.0.1:8009/respuestaLoginBotonMenu");
            $('#forma').submit();

            $("#form").prop("method","GET");
            $("#form").prop("action","http://127.0.0.1:8009");
            $('#form').submit();*/
            
          });
      });
    </script>
    <style>
      #general{
        position:absolute; /*El div será ubicado con relación a la pantalla*/
        left:0px; /*A la derecha deje un espacio de 0px*/
        right:0px; /*A la izquierda deje un espacio de 0px*/
        bottom:0px; /*Abajo deje un espacio de 0px*/
        height:50px; /*alto del div*/
        z-index:0;
      }
    </style>
<body>
      <form name='forms' id='forms' method="POST" action="">
      @csrf;
			<input type='hidden' name='str' id='str' value='<?PHP echo session('str');?>'>
    <header style="position:absolute;top:-1%;left:-1%;z-index:99999;">
    <div class="smm">
        <div class="row">
          <div class="col-lg-9 col-md-7 col-sm-5 col-10 smm__container js-smm-container">
            <h1 class="smm__logo-wrapper"><a href="#"><img src="images/logoBlanco.png" alt="Logo" width="110" height="50"></a></h1>

            <nav class="smm__collapse">
              <ul class="smm__primary-menu">
                <li><a href="{{route('inicial')}}"><i class="fa fa-home"></i>Inicio</a></li>
                <li><a href="{{route('seleccionInicial')}}"><i class="fa fa-group"></i>Agenda Oficinas</a></li>
                <li><a href="{{route('misApartados')}}"><i class="fa fa-gears"></i>Mis apartados</a></li>
              </ul>
              <!--<ul class="smm__secondary-menu">
                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>-->
            </nav>
          </div>
          <div class="d-none d-sm-block col-lg-3 col-md-4 col-sm-5" style="padding:20px">
            <?PHP echo "<font color='white'>".session('nombreUsuario')."</font>";?>
          </div>          
          <div class="d-block d-lg-none col-md-1 col-sm-2 col-2" style="padding:20px">
            <button class="btn btn-default smm__toggle js-smm-toggle visible-xs-block visible-sm-block">
              <img src='/images/menu.png' width="20px">
            </button>
          </div>
        </div>
      </div>
    </header>
    <div id="general" class="row">
      <div id="botones" class="offset-lg-10 col-lg-2" style="display:none;text-align:right">      
        <!--<img id="menu" src='./images/menu2.png' style='cursor:pointer' width="40px" alt="Menú">-->        
        <img id="pdf" src='./images/pdfRedondo.png' style='cursor:pointer' width="40px" alt="PDF">
        <img id="inicio" src='./images/inicio.png' style='cursor:pointer' width="40px" alt="Inicio">
        <img id="cerrarSesion" src='./images/logout.png' style='cursor:pointer' width="40px" alt="Cerrar Sessión">
      </div>
    </div>
    </form>