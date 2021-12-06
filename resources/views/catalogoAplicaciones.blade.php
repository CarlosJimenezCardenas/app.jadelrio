<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="shortcut icon" href="../images/logoBlanco.png">		
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>JA DEL RIO</title>

        <!-- CSS -->
		<link rel="stylesheet" href="../css/loginIndex.css" type="text/css" media="all" />
		<link rel="stylesheet" href="../css/menuAplicaciones.css" type="text/css" media="all" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="../js/menuAplicaciones.js"></script>
	</head>
	
	<body>
		<form name='form' id='form' method='' action=''>
			@csrf
			</br>
			<div id="" class="row">
				<div class="center">					
					<img src='../images/logo4.png' width="100px">
				</div>
			</div>
			<div style='width:90%;position:absolute;top:3%;left:5%;opacity:.8;'>
				<table id='tablaSistemas'></table>
			</div>
			<input type='hidden' name='email' id='email' value='<?php echo session('email');?>'>
			<input type='hidden' name='token' id='token' value='<?php echo session('token');?>'>
			<input type='hidden' name='nombreUsuario' id='nombreUsuario' value='<?php echo session('nombreUsuario');?>'>
			<input type='hidden' name='idUsuario' id='idUsuario' value='<?php echo session('idUsuario');?>'>
			
			<div id="general" class="row">
				<div id="botones" class="offset-lg-11 col-lg-1" style="display:none; text-align:right">
					<!--<img id="inicio" src='./images/inicio.png' style='cursor:pointer' width="40px">-->
					<img id="cerrarSesion" src='./images/logout.png' style='cursor:pointer' width="40px" alt="Cerrar Sessión">
				</div>
			</div>
		</form>
	</body>
</html>