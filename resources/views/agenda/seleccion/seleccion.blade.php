@extends('layouts.agenda')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="shortcut icon" href="../images/logoBlanco.png">		
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>JA DEL RIO - Agenda de oficinas</title>

		<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
		<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../css/agenda/seleccion/seleccion.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

		<script src="../js/agenda/seleccion/seleccion.js"></script>
	</head>	
	<body style="z-index:0">
		<input type="hidden" name="idPais" id="idPais" value="<?PHP if(isset($_POST['idPais'])){ echo $_POST['idPais'];}?>">
		<input type="hidden" name="idCiudad" id="idCiudad" value="<?PHP if(isset($_POST['idCiudad'])){ echo $_POST['idCiudad'];}?>">
		<input type="hidden" name="idSucursal" id="idSucursal" value="<?PHP if(isset($_POST['idSucursal'])){ echo $_POST['idSucursal'];}?>">
		<form style="z-index:0" id="forma" name="forma" action="" method="POST">
			@csrf
			<div class="col-lg-12" style="position:absolute;top:13%;width:100%;z-index:0">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-6"><p class="letraJA">País</p></div>					
					<div class="col-lg-2 col-md-2 col-sm-2 col-6"><select class="form-control  form-control-sm" id="pais" name="pais"></select></div>
	
					<div class="col-lg-2 col-md-2 col-sm-2 col-6"><p class="letraJA">Ciudad</p></div>					
					<div class="col-lg-2 col-md-2 col-sm-2 col-6"><select class="form-control  form-control-sm" id="ciudad" name="ciudad"></select></div>
					
					<div class="col-lg-2 col-md-2 col-sm-2 col-6"><p class="letraJA">Sucursal</p></div>					
					<div class="col-lg-2 col-md-2 col-sm-2 col-6"><select class="form-control form-control-sm" id="sucursal" name="sucursal"></select></div>
				</div>
			</div>
			<input type="hidden" name="idPiso" id="idPiso" <?PHP if(isset($_POST['idPiso'])){ echo $_POST['idPiso'];}?>>
			<input type="hidden" name="ruta" id="ruta">
			<input type="hidden" name="imagen" id="imagen">
			<input type="hidden" name="nombrePiso" id="nombrePiso">
		</form>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="z-index:0; position:absolute;left:0%; top:30%;">
			</br>
			<div id="central" class="row"></div>				
		</div>
	</body>
</html>