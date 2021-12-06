@extends('layouts.app');
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>JA DEL RIO - Cotizador</title>

		<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="./css/actividades/actividades.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="/js/administracion/actividades/actividades.js"></script>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    	<link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
		<style>
			body{
			font-family: 'Exo', sans-serif;
			}
			.header-col{
			background: #E3E9E5;
			color:#536170;
			text-align: center;
			font-size: 20px;
			font-weight: bold;
			}
			.header-calendar{
			background: #EE192D;color:white;
			}
			.box-day{
			border:1px solid #E3E9E5;
			height:150px;
			}
			.box-dayoff{
			border:1px solid #E3E9E5;
			height:150px;
			background-color: #ccd1ce;
			}
		</style>
	</head>	
	<body>
		<div class="container">
		<div style="height:50px"></div>
		<h1></h1>
		<p class="lead">
		<h3>Evento</h3>
		<p>Formulario de evento</p>
		<a class="btn btn-default"  href="{{ asset('/index') }}">Atras</a>
		<hr>

		@if (count($errors) > 0)
			<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
			</ul>
			</div>
		@endif
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
		</div>
		@endif


		<div class="col-md-6">
			<form action="{{ asset('create/') }}" method="post">
			@csrf
			<div class="fomr-group">
				<label>Titulo</label>
				<input type="text" class="form-control" name="titulo">
			</div>
			<div class="fomr-group">
				<label>Descripcion del Evento</label>
				<input type="text" class="form-control" name="descripcion">
			</div>
			<div class="fomr-group">
				<label>Fecha</label>
				<input type="date" class="form-control" name="fecha">
			</div>
			<br>
			<input type="submit" class="btn btn-info" value="Guardar">
			</form>
		</div>


		<!-- inicio de semana -->


		</div> <!-- /container -->

		<!-- Footer -->
		<footer class="page-footer font-small blue pt-4">

		</footer>
		<!-- Footer -->
	</body>
</html>