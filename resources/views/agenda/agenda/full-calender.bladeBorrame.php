@extends('layouts.agenda')
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
        <script src="../js/agenda/agenda/fullcalendar.js"></script>
    </head>
    <body>
        <form name="forma" id="forma" style="z-index:0">
            @csrf
            <?PHP
                $datosSeparados = explode("/",$ruta);
            ?>
            <div class="col-lg-12" style="position:absolute;top:13%;z-index:0;height:20%">
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
                </div>    

                <div class="col-lg-12 col-md-12 col-sm=12 col-12">
                    <?PHP echo "<center>".ucfirst($datosSeparados[2])." ".$datosSeparados[3]." ".$datosSeparados[4]." ".$datosSeparados[5]." ".$_POST['nombreOficina']."</center>";?>
                </div>

                <div id="calendar" class="offset-lg-2 col-lg-8"></div>
            </div>
            <input type='hidden' name='idPais' id="idPais" value='<?PHP echo $_POST['idPais'];?>'>
            <input type='hidden' name='idPais' id="idCiudad" value='<?PHP echo $_POST['idCiudad'];?>'>
            <input type='hidden' name='idPiso' id="idPiso" value='<?PHP echo $_POST['idPiso'];?>'>
            <input type='hidden' name='idOficina' id="idOficina" value='<?PHP echo $_POST['idOficina'];?>'>
            <input type='hidden' name='idSucursal' id="idSucursal" value='<?PHP echo $_POST['idSucursal'];?>'>
            <input type='hidden' name='idUsuario' id="idUsuario" value='<?PHP echo session('idUsuarioTemp');?>'>
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
                    forceEventDuration: true,
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
                        url:'/abc',
                        data : {
                            idOficina : $('#idOficina').val()
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
                    select:function(start, end, allDay)
                    {
                        var title = prompt('Titulo del evento:');

                        if(title)
                        {
                            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                            $.ajax({
                                url:"/action",
                                type:"POST",
                                data:{
                                    title: title,
                                    start: start,
                                    end: end,
                                    idOficina : $('#idOficina').val(),
                                    idSucursal : $('#idSucursal').val(),
                                    idPiso : $('#idPiso').val(),
                                    idUsuario : $('#idUsuario').val(),
                                    nombre : $('#nombre').val(),
                                    type: 'add'
                                },
                                success:function(data)
                                {
                                    if(data[0]['ok']==0){
                                        swal("!Espacio previamente reservado, favor de verificar!", "", "error");
                                    }else{
                                        swal("!El espacio se agendó de manera correcta!","","success");
                                    }
                                    calendar.fullCalendar('refetchEvents');
                                    /******************* PRUEBA DE ENVÍO DE CORREO  **********************/
                                    /*$.ajax({
                                        url:"/enviodecorreo",					
                                        data: {                                            
                                            "_token": $("meta[name='csrf-token']").attr("content")
                                        },
                                        type:"POST",
                                        dataType:'',
                                        method:"POST",
                                        success: function(response){
                                            alert(response);
                                        }
                                    });*/
                                    /****************************************************/
                                }
                            });
                        }
                    },
                    editable:true,
                    eventResize: function(event, delta)
                    {
                        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update',
                                idOficina: $('#idOficina').val(),
                                idSucursal : $('#idSucursal').val(),
                                idPiso : $('#idPiso').val(),                                
                                idUsuario : $('#idUsuario').val(),
                            },
                            success:function(response)
                            {
                                if(response[0]['ok']==0){
                                    swal("!Espacio previamente reservado, favor de verificar!", "", "error");
                                }else{
                                    if(response[0]['ok']==2){
                                        swal("!El evento le pertenece a otro usuario, favor de verificar!","","error");
                                    }else{
                                        swal("!La agenda se actualizó de manera correcta!","","success");
                                    }
                                }
                                calendar.fullCalendar('refetchEvents');
                            }
                        })
                    },
                    eventDrop: function(event, delta)
                    {
                        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                id: id,
                                type: 'update',
                                idOficina: $('#idOficina').val(),
                                idSucursal : $('#idSucursal').val(),
                                idPiso : $('#idPiso').val(),                                
                                idUsuario : $('#idUsuario').val(),
                            },
                            success:function(response)
                            {
                                if(response[0]['ok']==0){
                                    swal("!Espacio previamente reservado, favor de verificar!", "", "error");
                                }else{
                                    if(response[0]['ok']==2){
                                        swal("!El evento le pertenece a otro usuario, favor de verificar!","","error");
                                    }else{
                                        swal("!La agenda se actualizó de manera correcta!","","success");
                                    }
                                }
                                calendar.fullCalendar('refetchEvents');
                            }
                        })
                    },

                    eventClick:function(event)
                    {
                        swal({
                            title: "¿Estás seguro?",
                            text: "!Una vez eliminada, liberarás esta oficina y podrá ser tomada por alguien más!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {                                
                                var id = event.id;
                                $.ajax({
                                    url:"/action",
                                    type:"POST",
                                    data:{
                                        id:id,
                                        type:"delete",
                                        idUsuario:$('#idUsuario').val()
                                    },
                                    success:function(response)
                                    {
                                        if(response[0]['ok']==1){
                                            swal("Listo !El apartado se eliminó de manera correcta!", "", "success");
                                        }else{
                                            swal("!El espacio a eliminar pertenece a otro usuario!", "", "error");
                                        }
                                        calendar.fullCalendar('refetchEvents');
                                    }
                                })
                            }
                        });
                        /**************************************************** */
                    }
                });
            });  
        </script>    
    </body>
</html>