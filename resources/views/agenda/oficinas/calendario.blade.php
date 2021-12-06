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
      <h3>Calendario - evento</h3>
      <a class="btn btn-default"  href="{{ asset('/oficina1') }}">Crear un evento</a>


      <hr>

      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
          </a>
        </div>

      </div>
      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
      </div>
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)

          @if  ($dayweek['mes']==$mes)
            <div class="col box-day">
              {{ $dayweek['dia']  }}
              <!-- evento -->
              @foreach  ($dayweek['evento'] as $event) 
                  <a class="badge badge-primary" href="{{ asset('/details/') }}/{{ $event->id }}">
                    {{ $event->titulo }}
                  </a>
              @endforeach
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach

    </div> <!-- /container -->

    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">
  <!-- Copyright -->

</footer>
<!-- Footer -->
	</body>
</html>