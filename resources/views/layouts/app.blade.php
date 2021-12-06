<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <script src="../js/agenda/simple-mobile-menu.js"></script>    
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/simple-mobile-menu.css">
    <link rel="stylesheet" href="../css/simple-mobile-menu-responsive.css">
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
              
          $("#forma").prop("method","POST");
          $("#forma").prop("action","/cerrarSession");
          $('#forma').submit();
        });        

        $('#inicio').click(function(){
          $("#form").prop("method","POST");
          $("#form").prop("action","/indexPOSTAgenda");
          $('#form').submit();
          
          $("#forma").prop("method","POST");
          $("#forma").prop("action","/indexPOSTAgenda");
          $('#forma').submit();
        });      

        $('#pdf').click(function(){
          //alert(document.location.href);
        });            

        /*$('#menu').click(function(){
          $("#form").prop("method","POST");
          $("#form").prop("action","https://127.0.0.1:8009/respuestaLogin");
          $('#form').submit();
          
          $("#forma").prop("method","POST");
          $("#forma").prop("action","https://127.0.0.1:8009/respuestaLogin");
          $('#forma').submit();
        });*/
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

    <header style="position:absolute;top:-1%;left:-1%;z-index:99999;">
    <div class="smm">
        <div class="row">
          <div class="col-lg-9 col-md-7 col-sm-5 col-10 smm__container js-smm-container">
            <div style="position:relative;top:-10px; left:10px;" class="smm__logo-wrapper">&nbsp;&nbsp;&nbsp;<a href="#"><img id="inicio" src="images/logoBlanco.png" alt="Logo" width="95" height="45"></a></div>

            <nav class="smm__collapse">
              <ul class="smm__primary-menu">
                <li><a href="{{route('seleccionInicialAgenda')}}"><i class="fa fa-group"></i>Agenda Oficinas</a></li>
                <li><a href="{{route('misApartadosAgenda')}}"><i class="fa fa-gears"></i>Mis apartados</a></li>
              </ul>
              <!--<ul class="smm__secondary-menu">
                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>-->
            </nav>
          </div>
          <div class="d-none d-sm-block col-lg-3 col-md-4 col-sm-5 text-right" style="padding:20px">
                <?PHP echo "<font color='white'>".session('nombreUsuario')."</font>";?></br>
                <div class="text-right"><a id="cerrarSesion" href="#">Cerrar Sesión</a></div>
          </div>          
          <div class="d-block d-lg-none col-md-1 col-sm-2 col-2" style="padding:10px">
              <img src='./images/menu.png' width="30px" height="40px" class="smm__toggle js-smm-toggle visible-xs-block visible-sm-block">
          </div>
        </div>
      </div>
    </header>