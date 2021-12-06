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
		<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js"></script>
		<script src="/js/agenda/oficinas/Mexico/Guadalajara/JAGuadalajara/piso2/piso2.js"></script>
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
				<div class="row col-lg-12">
					<div class="col-lg-1 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">País</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control  form-control-sm" id="pais" name="pais"></select></div>
									
					<div class="col-lg-1 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">Ciudad</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control  form-control-sm" id="ciudad" name="ciudad"></select></div>
									
					<div class="col-lg-2 col-md-4 col-sm-12 col-xs-6"><p class="letraJA">Sucursal</p></div>					
					<div class="col-lg-2 col-md-5 col-sm-12 col-xs-1"><select disabled class="form-control form-control-sm" id="sucursal" name="sucursal"></select></div>
					
					<div class="col-lg-2">
						<center>
							<input type="button" class="btn btn-sm btn-success" name="EditarSeleccion" id="EditarSeleccion" value="Editar">
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
							<!--Erik-->				
							<area id="1" shape="rect" coords="106,459,197,570">
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
							<area id="8" shape="rect" coords="129,31,186,125">

							<!--Espacio 1-->			
							<area id="9" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,9,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 1');" shape="rect" coords="494,56,519,75">
							<!--Espacio 2-->				
							<area id="10" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,10,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 2');" shape="rect" coords="459,55,485,76">
							<!--Espacio 3-->				
							<area id="11" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,11,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 3');" shape="rect" coords="426,56,452,76">
							<!--Espacio 4-->				
							<area id="12" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,12,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 4');" shape="rect" coords="493,124,516,144">
							<!--Espacio 5-->				
							<area id="13" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,13,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 5');" shape="rect" coords="459,127,488,144">
							<!--Espacio 6-->				
							<area id="14" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,14,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 6');" shape="rect" coords="429,126,455,141">

							<!--Espacio 7-->				
							<area id="15" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,15,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 7');" shape="rect" coords="491,158,519,176">
							<!--Espacio 8-->				
							<area id="16" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,16,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 8');" shape="rect" coords="458,159,485,175">
							<!--Espacio 9-->				
							<area id="17" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,17,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 9');" shape="rect" coords="426,160,452,178">
							<!--Espacio 10-->				
							<area id="18" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,18,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 10');" shape="rect" coords="390,159,417,178">
							<!--Espacio 11-->				
							<area id="19" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,19,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 11');" shape="rect" coords="495,226,519,242">
							<!--Espacio 12-->				
							<area id="20" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,20,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 12');" shape="rect" coords="458,224,486,246">
							<!--Espacio 13-->				
							<area id="21" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,21,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 13');" shape="rect" coords="426,226,452,247">
							<!--Espacio 14-->				
							<area id="22" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,22,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 14');" shape="rect" coords="387,224,418,246">

							<!--Espacio 15-->				
							<area id="23" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,23,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 15');" shape="rect" coords="283,163,305,177">
							<!--Espacio 16-->				
							<area id="24" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,24,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 16');" shape="rect" coords="253,163,277,177">
							<!--Espacio 17-->				
							<area id="25" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,25,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 17');" shape="rect" coords="214,162,244,180">
							<!--Espacio 18-->				
							<area id="26" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,26,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 18');" shape="rect" coords="124,160,153,178">
							<!--Espacio 19-->				
							<area id="27" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,27,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 19');" shape="rect" coords="87,159,118,178">
							<!--Espacio 20-->				
							<area id="28" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,28,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 20');" shape="rect" coords="284,228,307,243">
							<!--Espacio 21-->				
							<area id="29" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,29,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 21');" shape="rect" coords="252,225,277,243">
							<!--Espacio 22-->				
							<area id="30" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,30,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 22');" shape="rect" coords="217,226,241,244">
							<!--Espacio 23-->	
							<area id="31" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,31,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 23');" shape="rect" coords="126,228,148,246">
							<!--Espacio 24-->				
							<area id="32" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,32,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 24');" shape="rect" coords="88,226,116,247">

							<!--Espacio 25-->				
							<area id="33" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,33,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 25');" shape="rect" coords="495,347,521,366">
							<!--Espacio 26-->				
							<area id="34" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,34,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 26');" shape="rect" coords="461,349,488,368">
							<!--Espacio 27-->				
							<area id="35" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,35,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 27');" shape="rect" coords="423,349,448,367">
							<!--Espacio 28-->				
							<area id="36" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,36,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 28');" shape="rect" coords="390,347,416,367">
							<!--Espacio 29-->				
							<area id="37" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,37,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 29');" shape="rect" coords="496,417,519,433">
							<!--Espacio 30-->				
							<area id="38" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,38,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 30');" shape="rect" coords="459,417,485,430">
							<!--Espacio 31-->				
							<area id="39" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,39,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 31');" shape="rect" coords="427,417,451,433">
							<!--Espacio 32-->				
							<area id="40" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,40,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 32');" shape="rect" coords="391,419,419,435">

							<!--Espacio 33-->	
							<area id="41" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,41,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 33');" shape="rect" coords="508,464,527,487">							
							<!--Espacio 34-->	
							<area id="42" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,42,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 34');" shape="rect" coords="506,502,529,525">	
							<!--Espacio 35-->	
							<area id="43" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,43,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 35');" shape="rect" coords="448,468,464,487">	
							<!--Espacio 36-->	
							<area id="44" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,44,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 36');" shape="rect" coords="449,502,463,522">	
							<!--Espacio 37-->	
							<area id="45" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,45,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 37');" shape="rect" coords="428,467,446,490">	
							<!--Espacio 38-->	
							<area id="46" href="javascript:eligeOficina(<?PHP echo $_POST['idPiso'];?>,46,<?PHP echo $_POST['sucursal'];?>,'ESPACIO 38');" shape="rect" coords="428,500,446,523">	
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