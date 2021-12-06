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
		<link rel="stylesheet" type="text/css" href="/css/agenda/oficinas/pisos.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="/js/agenda/oficinas/Mexico/Guadalajara/JAGuadalajara/piso1/piso1.js"></script>
		<script type="text/javascript" src="/js/agenda/easyTooltip.min.js"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
	</head>	
	<body>
		<form id="forma" name="forma" method="POST">
			@CSRF
			<?PHP
				$datosSeparados = explode("/",$_POST['ruta']);
			?>			
			<div class="row">
				<div class="col-lg-12 col-12" style="position:absolute;top:13%;width:100%;z-index:0">
					<div class="row">
						
						<div class="col-lg-12 col-12 d-block d-sm-none">
							</br></br>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-3 col-3"><p class="letraJA">País</p></div>					
						<div class="col-lg-2 col-md-2 col-sm-3 col-3"><select class="form-control  form-control-sm" id="pais" name="pais"></select></div>
		
						<div class="col-lg-1 col-md-1 col-sm-3 col-3"><p class="letraJA">Ciudad</p></div>					
						<div class="col-lg-2 col-md-2 col-sm-3 col-3"><select class="form-control  form-control-sm" id="ciudad" name="ciudad"></select></div>
						
						<div class="col-lg-2 col-md-2 col-sm-3 col-3"><p class="letraJA">Sucursal</p></div>					
						<div class="col-lg-2 col-md-2 col-sm-3 col-3"><select class="form-control form-control-sm" id="sucursal" name="sucursal"></select></div>
						
						<div class="col-lg-2 col-md-2 col-sm-3 col-6 ">
							<center>
								<input type="button" class="btn btn-sm btn-success" name="EditarSeleccion" id="EditarSeleccion" value="Editar">
								<input type="button" class="btn btn-sm btn-info" name="regresar" id="regresar" value="Regresar">
							</center>
						</div>

						<div class="col-lg-12 col-md-12 col-sm=12 col-12 d-none d-md-block">
							<?PHP echo "<center><h2>".ucfirst($datosSeparados[2])." ".$datosSeparados[3]." ".$datosSeparados[4]." ".$_POST['nombrePiso']."</h2></center>";?>
						</div>			

						<div style="position:relative; text-align:center;" class="col-lg-12 col-md-12 col-sm-12 col-12">
							<img src="<?PHP echo $_POST['imagen'];?>" usemap="#mapa">
							<map name="mapa">
								<!--PEDRO ROSALES-->				
								<area id="uno" shape="rect" coords="395,467,543,568">
								
								<!--SALA C-->				
								<area id="dos" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,2,<?PHP echo $_POST['sucursal'];?>,'SALA C');" shape="rect" coords="395,361,543,466">

								<!--JAVIER CORONA-->				
								<area id="tres" shape="rect" coords="472,266,543,363">
								
								<!--DOLORES-->				
								<area id="cuatro" shape="rect" coords="479,34,543,134">
								
								<!--SALA D-->				
								<area id="cinco" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,5,<?PHP echo $_POST['sucursal'];?>,'SALA B');" shape="rect" coords="189,385,298,479">
								
								<!--ESPACIO1-->				
								<area id="seis" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,6,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 1');" shape="rect" coords="483,176,512,193">

								<!--ESPACIO2-->				
								<area id="siete" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,7,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 2');" shape="rect" coords="446,167,474,190">

								<!--ESPACIO3-->				
								<area id="ocho" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,8,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 3');" shape="rect" coords="407,167,440,190">

								<!--ESPACIO4-->				
								<area id="nueve" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,9,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 4');" shape="rect" coords="480,228,509,254">

								<!--ESPACIO5-->				
								<area id="diez" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,10,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 5');" shape="rect" coords="446,230,475,251">

								<!--ESPACIO6-->				
								<area id="once" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,11,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 6');" shape="rect" coords="412,228,441,253">

								<!--ESPACIO7-->				
								<area id="doce" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,12,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 7');" shape="rect" coords="335,73,364,103">

								<!--ESPACIO8-->				
								<area id="trece" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,13,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 8');" shape="rect" coords="334,122,360,153">

								<!--ESPACIO9-->				
								<area id="catorce" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,14,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 9');" shape="rect" coords="335,171,361,202">

								<!--ESPACIO10-->				
								<area id="quince" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,15,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 10');" shape="rect" coords="334,221,358,250">

								<!--ESPACIO11-->				
								<area id="dieciseis" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,16,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 11');" shape="rect" coords="334,259,360,287">

								<!--ESPACIO12-->				
								<area id="diecisiete" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,17,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 12');" shape="rect" coords="234,71,266,104">

								<!--ESPACIO13-->				
								<area id="dieciocho" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,18,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 13');" shape="rect" coords="237,120,266,152">

								<!--ESPACIO14-->				
								<area id="diecinueve" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,19,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 14');" shape="rect" coords="234,171,266,201">

								<!--ESPACIO15-->				
								<area id="veinte" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,20,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 15');" shape="rect" coords="234,217,266,246">

								<!--ESPACIO16-->				
								<area id="veintiuno" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,21,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 16');" shape="rect" coords="235,258,266,285">

								<!--SALA D-->				
								<area id="veintidos" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,22,<?PHP echo $_POST['sucursal'];?>,'SALA D');" shape="rect" coords="394,264,469,360">								
							</map>
						</div>
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