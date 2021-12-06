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
		<script src="../js/agenda/oficinas/Mexico/Monterrey/Monterrey/Monterrey/monterrey.js"></script>
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

					<div class="col-lg-12 col-md-12 col-sm=12 col-12 d-none d-md-block">
						<?PHP echo "<center><h2>".ucfirst($datosSeparados[2])." ".$datosSeparados[3]." ".$datosSeparados[4]." ".$_POST['nombrePiso']."</h2></center>";?>
					</div>			

					<div style="position:relative; text-align:center;" class="col-lg-12 col-md-12 col-sm-12 col-12">
						</br>
						<img src="<?PHP echo $_POST['imagen'];?>" usemap="#mapa">
						<map name="mapa">
							<!--SALA DE JUNTAS 1-->				
							<area id="uno" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,1,<?PHP echo $_POST['sucursal'];?>,'Sala de juntas 1');" shape="rect" coords="38,400,110,469">
							<!--SALA DE JUNTAS 2-->				
							<area id="dos" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,2,<?PHP echo $_POST['sucursal'];?>,'Sala de juntas 2');" shape="rect" coords="5,268,110,364">
							<!--SALA DE JUNTAS 3-->				
							<area id="tres" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,3,<?PHP echo $_POST['sucursal'];?>,'Sala de juntas 3');" shape="rect" coords="152,94,223,154">								
							<!--ELEVADOR 1-->				
							<area id="cuatro" shape="rect" coords="180,404,213,436">
							<!--ELEVADOR 2-->				
							<area id="cinco" shape="rect" coords="180,435,213,469">
							<!--ELEVADOR 3-->				
							<area id="seis" shape="rect" coords="180,470,213,503">
							<!--ELEVADOR 4-->				
							<area id="siete" shape="rect" coords="180,503,213,535">
							<!--ELEVADOR 5-->				
							<area id="ocho" shape="rect" coords="251,502,284,535">
							<!--OFICINA 1-->				
							<area id="nueve" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,9,<?PHP echo $_POST['sucursal'];?>,'Oficina 1');" shape="rect" coords="286,84,334,155">
							<!--OFICINA 2-->				
							<area id="diez" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,10,<?PHP echo $_POST['sucursal'];?>,'Oficina 2');" shape="rect" coords="103,84,150,155">																
							<!--OFICINA 3-->				
							<area id="once" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,11,<?PHP echo $_POST['sucursal'];?>,'Oficina 3');" shape="rect" coords="52,84,103,155">																
							<!--OFICINA 4-->				
							<area id="doce" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,12,<?PHP echo $_POST['sucursal'];?>,'Oficina 4');" shape="rect" coords="5,84,54,155">																
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