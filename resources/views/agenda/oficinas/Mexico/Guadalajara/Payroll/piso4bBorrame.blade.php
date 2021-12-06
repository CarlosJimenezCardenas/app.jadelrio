@extends('layouts.agendaHeaderCorto')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../images/logoBlanco.png">		
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>JA DEL RIO - Agenda de oficinas</title>

		<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="../css/agenda/oficinas/pisos.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>	
		<script src="../js/agenda/oficinas/Mexico/Guadalajara/PayrollGDL/piso4b/piso4b.js"></script>
		<script type="text/javascript" src="../js/agenda/easyTooltip.min.js"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
	</head>	
	<body>
		<form id="forma" name="forma" method="POST">
			@CSRF
			<?PHP
				$datosSeparados = explode("/",$_POST['ruta']);
			?>			
			<div class="col-lg-12" style="position:absolute;top:13%;z-index:0;height:20%">
				<div class="row">
					<div class="col-lg-12 col-12 d-block d-sm-none">
						
					</div>
					<div class="col-lg-1 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">País</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control  form-control-sm" id="pais" name="pais"></select></div>
									
					<div class="col-lg-1 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">Ciudad</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control  form-control-sm" id="ciudad" name="ciudad"></select></div>
									
					<div class="col-lg-2 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">Sucursal</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control form-control-sm" id="sucursal" name="sucursal"></select></div>
					
					<div class="col-lg-2">
						</br>
						<center>
							<input type="button" class="btn btn-sm btn-success" name="EditarSeleccion" id="EditarSeleccion" value="Limpiar">
							<input type="button" class="btn btn-sm btn-info" name="regresar" id="regresar" value="Regresar">
						</center>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm=12 col-xs-12">
						<?PHP echo "<center><h2>".ucfirst($datosSeparados[2])." ".$datosSeparados[3]." ".$datosSeparados[4]." ".$_POST['nombrePiso']."</h2></center>";?>
					</div>

					<div style="position:relative; text-align:center;" class="col-lg-12 col-md-12 col-sm-12 col-12">
						</br>
						<img src="<?PHP echo $_POST['imagen'];?>" usemap="#mapa">
						<map name="mapa">
							<!--RODRIGO-->				
							<area id="27" shape="rect" coords="249,36,346,139">
							<!--DIRECTORES-->				
							<area id="28" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,28,<?PHP echo $_POST['sucursal'];?>,'SALA DIRECTORES');" shape="rect" coords="351,39,451,141">							
							<!--ALELI-->				
							<area id="29" shape="rect" coords="453,40,561,142">
							<!--Sala rapida-->				
							<area id="30" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,30,<?PHP echo $_POST['sucursal'];?>,'SALA RAPIDA');" shape="rect" coords="558,475,682,549">
							<!--Sala de juntas-->				
							<area id="31" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,31,<?PHP echo $_POST['sucursal'];?>,'SALA DE JUNTAS');" shape="rect" coords="412,471,561,549">
						</map>
					</div>
				</div>			
			</div>
			<input type="hidden" name="idPiso" id="idPiso" value="<?PHP echo $_POST['idPiso'];?>">
			<input type="hidden" name="nombreOficina" id="nombreOficina">
			<input type="hidden" name="idOficina" id="idOficina">
			<input type="hidden" name="idSucursal" id="idSucursal" value="<?PHP echo $_POST['sucursal'];?>">			
			<input type="hidden" name="idPais" id="idPais" value="<?PHP echo $_POST['pais'];?>">			
			<input type="hidden" name="idCiudad" id="idCiudad" value="<?PHP echo $_POST['ciudad'];?>">		
			<input type="hidden" name="ruta" id="ruta" value="<?PHP echo $_POST['ruta'];?>">	
			<input type="hidden" name="ruta" id="nombrePiso" value="<?PHP echo $_POST['nombrePiso'];?>">
		</form>
	</body>
</html>