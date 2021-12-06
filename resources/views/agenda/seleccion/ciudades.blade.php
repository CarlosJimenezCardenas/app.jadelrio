@extends('layouts.app');
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>JA DEL RIO - Agenda de oficinas</title>

		<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="../css/seleccion/ciudades.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/seleccion/ciudades.js"></script>
	</head>	
	<body>
		</br></br>			
		<div class='col-lg-offset-10 col-md-offset-10 col-lg-2 col-md-12 col-sm-12 col-xs-12'>
			<center>
				<img src='/images/logo2.png' width="150px">
			</center>
		</div>
		<form id="forma" action="" method="POST">
			@csrf
			</br></br>
			<div class="container2">
				<div class="panel-group">
					<div class="panel">
						<div class="panel-heading colorJA">
							<center>SELECCIONA LA CIUDAD EN DONDE DESEES APARTAR LA OFICINA</center>
						</div>
						<div class="panel-body">
							<label class='col-lg-2 col-md-2 col-sm-12 col-xs-12'>Ciudad </label>
							<select class='form-control col-lg-10 col-md-10 col-sm-12 col-xs-12' name='ciudad' id='ciudad'></select>
						</div>
					</div>
				</div>
		
				<div id='sucursalesDIV' class="col col-lg-12" style="display:none"></div>
			</div>
			<input type='hidden' name='paisSeleccionado' id='paisSeleccionado' value='<?PHP echo $_POST['paisSeleccionado'];?>'>
			<input type='hidden' name='_token' id='_token' value='<?PHP echo $_POST['_token'];?>'>
			<input type='hidden' name='sucursalSeleccionada' id='sucursalSeleccionada'>	
		</form>
	</body>
</html>