@extends('layouts.agenda')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="shortcut icon" href="../images/logoBlanco.png">		
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="../css/agenda/seleccion/seleccion.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/agenda/seleccion/seleccion.js"></script>

        <title>JA DEL RIO - Agenda Oficinas</title>

        <!-- CSS -->
		<link rel="stylesheet" href="../css/loginIndex.css" type="text/css" media="all" />
	</head>
	<body>
		<form id='form' name='form' action='' method=''>
			@csrf
			<div class="container"></div>
			<input type='hidden' name='str' id='str' value='<?PHP echo session('str');?>'>
		</form>
	</body>
</html>