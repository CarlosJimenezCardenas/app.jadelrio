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
      <h1>< tutofox /> <small>Oh my code!</small></h1>
      <p class="lead">
      <h3>Evento</h3>
      <p>Detalles de evento</p>
      <a class="btn btn-default"  href="{{ asset('/index') }}">Atras</a>
      <hr>



      <div class="col-md-6">
        <form action="{{ asset('/create/') }}" method="post">
          <div class="fomr-group">
            <h4>Titulo</h4>
            {{ $event->titulo }}
          </div>
          <div class="fomr-group">
            <h4>Descripcion del Evento</h4>
            {{ $event->descripcion }}
          </div>
          <div class="fomr-group">
            <h4>Fecha</h4>
            {{ $event->fecha }}
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
      </div>


      <!-- inicio de semana -->


    </div> <!-- /container -->

    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">
  <!-- Copyright -->
</footer>
<!-- Footer -->
	</body>
</html>