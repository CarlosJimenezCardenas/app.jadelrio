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
		<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js"></script>
		<script src="../js/agenda/oficinas/Mexico/Guadalajara/JAGuadalajara/piso2/piso2.js"></script>
		<script type="text/javascript" src="/js/agenda/easyTooltip.min.js"></script>
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

					<div style="position:relative; text-align:center;" class="col-lg-12 col-md-12 col-sm-6 col-6">
						</br>
						<img src="<?PHP echo $_POST['imagen'];?>" usemap="#mapa">
						<map name="mapa">
							<!--Erik-->				
							<area id="1" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,1,<?PHP echo $_POST['sucursal'];?>,'Oficina para directores');" shape="rect" coords="106,459,197,570">
							<!--Bernardo-->				
							
							<!--SALA A-->				
							<area id="3" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,3,<?PHP echo $_POST['sucursal'];?>,'SALA A');" shape="rect" coords="287,457,401,570">
							<!--RECURSOS HUMANOS-->				
							<area id="4" shape="rect" coords="300,31,369,77">
							<!--TI-->				
							<area id="5" shape="rect" coords="300,77,370,122">
							<!--Alvaro-->				
							<area id="6" shape="rect" coords="244,31,301,123">
							<!--Alfredo-->				
							<area id="7" shape="rect" coords="186,32,245,124">
							<!--Jose Avila-->				
							<area id="8" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,8,<?PHP echo $_POST['sucursal'];?>,'Oficina para directores');" shape="rect" coords="129,31,186,125">

							<!--Se eliminaron las posiciones centrales por instruccion de Pedro, se tiene un respaldo en la misma ruta en piso1Resp-->							
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