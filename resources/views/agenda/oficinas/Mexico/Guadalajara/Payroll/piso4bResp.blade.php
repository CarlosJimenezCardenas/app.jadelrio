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
		<link rel="stylesheet" type="text/css" href="/css/agenda/oficinas/pisos.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>	
		<script src="/js/agenda/oficinas/Mexico/Guadalajara/PayrollGDL/piso4b/piso4b.js"></script>
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
						</br>
					</div>
					<div class="col-lg-1 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">País</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control  form-control-sm" id="pais" name="pais"></select></div>
									
					<div class="col-lg-1 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">Ciudad</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control  form-control-sm" id="ciudad" name="ciudad"></select></div>
									
					<div class="col-lg-2 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">Sucursal</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control form-control-sm" id="sucursal" name="sucursal"></select></div>
					
					<div class="col-lg-2">
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

					<div class="offset-lg-3 col-lg-8 col-md-12 col-sm=12 col-xs-12">
						<img src="<?PHP echo $_POST['imagen'];?>" usemap="#mapa">
						<map name="mapa">
							<!--Espacio 1-->				
							<area id="1" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,1,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 1');" shape="rect" coords="256,414,281,438">
							<!--Espacio 2-->				
							<area id="2" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,2,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 2');" shape="rect" coords="307,415,332,438">
							<!--Espacio 3-->				
							<area id="3" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,3,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 3');" shape="rect" coords="348,417,375,441">
							<!--Espacio 4-->				
							<area id="4" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,4,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 4');" shape="rect" coords="399,416,430,439">
							<!--Espacio 5-->			
							<area id="5" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,5,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 5');" shape="rect" coords="438,416,467,436">
							<!--Espacio 6-->				
							<area id="6" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,6,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 6');" shape="rect" coords="495,416,520,438">
							<!--Espacio 7-->				
							<area id="7" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,7,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 7');" shape="rect" coords="532,415,565,438">

							<!--Espacio 8-->				
							<area id="8" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,8,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 8');" shape="rect" coords="263,337,284,357">
							<!--Espacio 9-->				
							<area id="9" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,9,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 9');" shape="rect" coords="310,334,333,358">
							<!--Espacio 10-->				
							<area id="10" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,10,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 10');" shape="rect" coords="348,336,375,359">
							<!--Espacio 11-->				
							<area id="11" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,11,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 11');" shape="rect" coords="399,336,426,358">
							<!--Espacio 12-->				
							<area id="12" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,12,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 12');" shape="rect" coords="436,337,469,360">
							<!--Espacio 13-->				
							<area id="13" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,13,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 13');" shape="rect" coords="491,338,518,360">
							<!--Espacio 14-->				
							<area id="14" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,14,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 14');" shape="rect" coords="527,338,560,362">

							<!--Espacio 15-->				
							<area id="15" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,15,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 1');" shape="rect" coords="525,258,555,284">
							<!--Espacio 16-->				
							<area id="16" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,16,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 16');" shape="rect" coords="491,255,515,278">
							<!--Espacio 17-->				
							<area id="17" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,17,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 17');" shape="rect" coords="436,257,466,282">
							<!--Espacio 18-->				
							<area id="18" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,18,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 18');" shape="rect" coords="400,257,428,278">
							<!--Espacio 19-->				
							<area id="19" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,19,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 19');" shape="rect" coords="345,256,373,279">
							<!--Espacio 20-->				
							<area id="20" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,20,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 20');" shape="rect" coords="307,254,334,279">
							<!--Espacio 21-->				
							<area id="21" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,21,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 21');" shape="rect" coords="522,184,551,208">
							<!--Espacio 22-->				
							<area id="22" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,22,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 22');" shape="rect" coords="488,185,516,208">
							<!--Espacio 23-->				
							<area id="23" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,23,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 23');" shape="rect" coords="433,184,463,209">
							<!--Espacio 24-->				
							<area id="24" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,24,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 24');" shape="rect" coords="396,182,423,205">
							<!--Espacio 25-->				
							<area id="25" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,25,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 25');" shape="rect" coords="345,182,374,206">
							<!--Espacio 26-->				
							<area id="26" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,26,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 26');" shape="rect" coords="308,182,337,205">
							
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