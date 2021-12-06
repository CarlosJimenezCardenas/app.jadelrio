@extends('layouts.agenda');
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../images/logoBlanco.png">		
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>JA DEL RIO - Agenda de oficinas</title>

		<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="../css/agenda/actividades/actividades.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="../js/agenda/administracion/actividades/actividades.js"></script>
	</head>	
	<body>
		<div style='position:absolute; top:10%;left:20%'>
			<img src="./images/plano_oficina1.jpg" border="0" usemap="#mapa">
			<map name="mapa">
				<area href="{{route('oficina1')}}" shape="rect" coords="158,115,252,224">
				<area href="oficina2.html" shape="rect" coords="252,115,354,224">
				<area href="oficina3.html" shape="rect" coords="354,115,456,224">
				<area href="oficina4.html" shape="rect" coords="456,115,558,224">
				<area href="oficina5.html" shape="rect" coords="558,115,660,224">
				<area href="gerencia.html" shape="rect" coords="660,115,806,311">
				<area href="cafeteria.html" shape="rect" coords="519,313,806,504">
			</map>
		</div>
	</body>
</html>