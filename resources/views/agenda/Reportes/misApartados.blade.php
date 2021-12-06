@extends('layouts.app')
<!DOCTYPE html>
<html>
    <head>
        <title>Agenda de Oficinas JA DEL RIO</title>
        
        <link rel="shortcut icon" href="../images/logoBlanco.png">		
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../css/agenda/oficinas/pisos.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="../js/agenda/agenda/fullcalendarMisApartados.js"></script>
    </head>
    <body>
        <form name="forma" id="forma" style="z-index:0">
            @csrf
            <?PHP
                //$datosSeparados = explode("/",$ruta);
            ?>
            <div class="col-lg-12" style="position:absolute;top:13%;z-index:0;height:20%">            
                <div class="col-lg-12 col-md-12 col-sm=12 col-xs-12">
                    <?PHP echo "<center><h4>".session('nombreUsuario')."</h4></center>";?>
                    <div id="calendar" class="offset-2 col-lg-8"></div>
                </div>
            </div>
            <input type='hidden' name='idUsuario' id="idUsuario" value='<?PHP echo session('idUsuario');?>'>
            <input type='hidden' name='nombre' id="nombre" value='<?PHP echo session('nombreUsuario');?>'>
        </form>
        <div id="alert-container"></div>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendar = $('#calendar').fullCalendar({
                    locale: 'es',
                    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
                    buttonText:{
                        today: 'Hoy',
                        month: 'mes',
                        week: 'semana',
                        day: 'día',
                        list: 'Lista de eventos'
                    },
                    editable:true,
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    events:{
                        url:'/mostrarCitas',
                        data : {
                            idUsuario : $('#idUsuario').val()
                        },
                        color: '#000',
                        textColor: '#fff',
                        extendedProps: {
                            department: 'BioChemistry'
                        },
                        description: 'Lecture'
                    },
                    selectable:true,
                    selectHelper: true,
                });

            });  
        </script>    
    </body>
</html>