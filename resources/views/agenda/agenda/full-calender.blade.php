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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		
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
            <input type='hidden' name='apartadoMultiple' id="apartadoMultiple" value='<?PHP echo session('apartadoMultiple');?>'>
        </form>
        <div id="alert-container"></div>
			
		<div id="modalHorarios" class="modal" role="dialog">
			<div class="modal-lg modal-dialog" style="width:100%;position:relative;top:10%;height:50%">			
				<div class="tamanioModal modal-content">
					<div class="modal-header btn-info">
						<span class='' id="dia"></span> Hora Inicial <span id="fechaInicialSpan"></span> - Hora Final <span id="fechaFinalSpan"></span>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>					
					<div style="width:100%;" class="modal-body">
						<table width="100%" height="100%">
							<tr>
								<td align="center" width="50%">
									<select name="horaInicial" id="horaInicial" class="form-control selectFont">
                                        <option selected value='-1'>Seleccione un horario Inicial</option>
									</select>
								</td>
								<td id="hrFinal" align="center" style="display:none" width="50%">
									<select name="horaFinal" id="horaFinal" class="form-control selectFont">
									</select>
								</td>
							</tr>
                            <?PHP
                            if(session('apartadoMultiple')){
                                ?>
                                <tr>
                                    <td align='center' colspan='2'>
                                        <select name="colaborador" id="colaborador" class="form-control selectFont">
                                            <option selected value='0'>Seleccione el colaborador</option>
                                        </select>
                                    </td>
                                </tr>
                                <?PHP
                            }
                            ?>
							<tr>
								<td colspan=2 align="center">
									<input type="button" name="guardar" id="guardar" class="btn btn-success" value="Guardar">
								</td>
							</tr>
						</table>
					</div>
					<div class="modal-footer btn-info"></div>
				</div>			
			</div>
		</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.css">
        <script>
			var diaGlobal = "";
            var diaGeneral = "";
            var respuestaGlobal = "";
            var control=0;
            $(document).ready(function () {                
                var apartadoMultiple = $('#apartadoMultiple').val();
				$('#guardar').on("click", function(){
                    if($('#horaInicial').val()==-1 || $('#horaFinal').val()==-1){
                        swal("!Ambos horarios se deben de llenar!", "", "error");
                        return;
                    }

                    //Se valida si es reserva general que venga definido el colaborador
                    if(apartadoMultiple==1){
                        if($('#colaborador').val()==-1){
                            swal("!Debe de ingresar algún colaborador!", "", "error");
                            return;
                        }
                    }
					//SE TRAEN LAS HORAS PREVIAMENTE APARTADAS DE LA FECHA SELECCIONADA PARA EL LUGAR SELECCIONADO//
					fechaDividida = diaGlobal.split("/");
					Fecha = fechaDividida[2];

					switch(fechaDividida[0]){
						case "Jan":	Fecha=Fecha+"-01"; break;
						case "Feb":	Fecha=Fecha+"-02"; break;
						case "Mar":	Fecha=Fecha+"-03"; break;
						case "Apr":	Fecha=Fecha+"-04"; break;
						case "May":	Fecha=Fecha+"-05"; break;
						case "Jun":	Fecha=Fecha+"-06"; break;
						case "Jul":	Fecha=Fecha+"-07"; break;
						case "Agu":	Fecha=Fecha+"-08"; break;
						case "Sep":	Fecha=Fecha+"-09"; break;
						case "Oct":	Fecha=Fecha+"-10"; break;
						case "Nov":	Fecha=Fecha+"-11"; break;
						case "Dec":	Fecha=Fecha+"-12"; break;
					}
                    Fecha =Fecha+"-"+fechaDividida[1];
                    //Se le agrega un cero al horario inicial en caso de ser menor a 10
                    validacionHoraArray = $('#horaInicial').val().split(":");
                    if(validacionHoraArray[0]<10){
                        inicial = Fecha+" 0"+$('#horaInicial').val()+":00";
                    }else{
					    inicial = Fecha+" "+$('#horaInicial').val()+":00";
                    }

                    //Se le agrega un cero al horario final en caso de ser menor a 10
                    validacionHoraArray = $('#horaFinal').val().split(":");
                    if(validacionHoraArray[0]<10){
                        final = Fecha+" 0"+$('#horaFinal').val()+":00";
                    }else{
					    final = Fecha+" "+$('#horaFinal').val()+":00";
                    }
                    //Si trae Colaborador ingresa aqui
                    if($('#colaborador').val()==0 || apartadoMultiple==0){
                        idUsuarioTemporal     = $('#idUsuario').val();
                        nombreUsuarioTemporal = "";
                    }else{
                        colaboradorPartes     = $('#colaborador').val().split("|"); 
                        idUsuarioTemporal     = colaboradorPartes[0];
                        nombreUsuarioTemporal = colaboradorPartes[1];
                    }
					$.ajax({
						url:"/altaAgenda",					
						data: {
							"_token": $("meta[name='csrf-token']").attr("content"),
							"dia": diaGlobal.toString(),
							"inicio": inicial,
							"fin": final,
							"idOficina": $('#idOficina').val(),
							"idSucursal" : $('#idSucursal').val(),
							"idPiso" : $('#idPiso').val(),                                
							"idUsuario" : idUsuarioTemporal,
                            "nombreUsuario" : nombreUsuarioTemporal
						},
						type:"POST",
						dataType: 'json',
						method:"POST",
						success: function(data){
                            if(data[0]['ok']==0){
                                swal("!Espacio previamente reservado, favor de verificar!", "", "error");
                            }else{
                                swal("!El espacio se agendó de manera correcta!","","success");
                            }
                            $('#modalHorarios').modal('hide');
                            calendar.fullCalendar('refetchEvents');
						}
					}); 
				});
				
				$('#horaInicial').on( "change", function() {
                    control=0;
					$('#fechaInicialSpan').empty();
					temp = $('#horaInicial').val().toString();
					temp2 = temp.substr(-2);
					temp3 = temp.split(temp2);
					if(temp3[0]==1 || temp3[0]==2){
						$('#fechaInicialSpan').html(temp3[0]+"0"+temp2);
					}else{
						$('#fechaInicialSpan').html(temp3[0]+temp2);
					}
					$('#hrFinal').show();                  
                    cargaHorariosDisponiblesFinal();
				});
								
				$('#horaFinal').on( "change", function() {
					$('#fechaFinalSpan').empty();
					temp = $('#horaFinal').val().toString();
					temp2 = temp.substr(-2);
					temp3 = temp.split(temp2);
					if(temp3[0]==1 || temp3[0]==2){
						$('#fechaFinalSpan').html(temp3[0]+"0"+temp2);
					}else{
						$('#fechaFinalSpan').html(temp3[0]+temp2);
					}
				});
				
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
                        $('#horaInicial').empty();
                        $('#horaFinal').empty();
                        $('#hrFinal').hide();
                        $("#colaborador").prop('selectedIndex',0);
                        // leemos las fechas de inicio de evento y hoy
                        var check = moment(start).format('YYYY-MM-DD');
                        var today = moment(new Date()).format('YYYY-MM-DD');
                        diaGeneral = check;
                        // si el inicio de evento ocurre hoy o en el futuro mostramos el modal
                        if (check < today) {
                            swal("!No se pueden crear eventos en el pasado, favor de verificar!", "", "error");
                            return;
                        }
						$('#fechaInicialSpan').empty();
						$('#fechaFinalSpan').empty();
						$('#dia').empty();
						$("#modalHorarios").modal("show");
						foo = start.toString();
						foo2 = foo.split(" ");
						$('#dia').html(foo2[1]+"/"+foo2[2]+"/"+foo2[3]);
						diaGlobal = foo2[1]+"/"+foo2[2]+"/"+foo2[3];
                        cargaHorariosDisponibles();
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
                                apartadoMultiple : $('#apartadoMultiple').val()
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
                                apartadoMultiple : $('#apartadoMultiple').val()
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
                                        idUsuario:$('#idUsuario').val(),
                                        apartadoMultiple : $('#apartadoMultiple').val()
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

            function cargaHorariosDisponibles(){
                $('#horaInicial').empty();
                $('#horaInicial').append("<option selected value='-1'>Seleccione un horario</option>"); 
                $.ajax({
                    url:"/checaHorariosReservados2",					
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        "dia": diaGeneral,
                        "idOficina": $('#idOficina').val(),
                        "idSucursal" : $('#idSucursal').val(),
                        "idPiso" : $('#idPiso').val(),
                        "idUsuario" : $('#idUsuario').val()
                    },
                    type:"POST",
                    dataType: 'json',
                    method:"POST",
                    success: function(response){
                        if(response.length==0){
                            for(i=7; i<=23;i++){
                                if(i<10){
                                    horaCiclo = diaGeneral+" 0"+i+":00:00";
                                    horaCicloMedio = diaGeneral+" 0"+i+":30:00";
                                }else{                                    
                                    horaCiclo = diaGeneral+" "+i+":00:00";
                                    horaCicloMedio = diaGeneral+" "+i+":30:00";
                                }
                                $('#horaInicial').append("<option value='"+i+":00'>"+i+":00"+"</option>");                         
                                $('#horaInicial').append("<option value='"+i+":30'>"+i+":30"+"</option>");
                            }
                        }else{                             
                            controlRecorrido = 0;
                            controlIngresos  = 0;
                            for(i=7; i<=23;i++){     
                                if(i<10){
                                    horaCiclo = diaGeneral+" 0"+i+":00:00";
                                    horaCicloMedio = diaGeneral+" 0"+i+":30:00";
                                }else{                                    
                                    horaCiclo = diaGeneral+" "+i+":00:00";
                                    horaCicloMedio = diaGeneral+" "+i+":30:00";
                                }
                                //HORA EXACTA
                                horaRecorrido = parseInt((new Date(horaCiclo).getTime() / 1000).toFixed(0));
                                //MEDIA HORA
                                horaRecorridoMedio = parseInt((new Date(horaCicloMedio).getTime() / 1000).toFixed(0));
                                $.each(response, function(index, value){
                                    horaInicial = parseInt((new Date(this.start).getTime() / 1000).toFixed(0));
                                    horaFinal = parseInt((new Date(this.end).getTime() / 1000).toFixed(0));
                                    if(controlRecorrido==0){
                                        propiedadCompletaDisabled = 0;
                                        propiedadMediaDisabled    = 0;
                                        horarioTemp = i;
                                        //HORA EXACTA
                                        if(horaRecorrido<horaInicial || horaRecorrido>=horaFinal){

                                        }else{
                                            propiedadCompletaDisabled = "disabled class='apartado'";
                                        }

                                        //MEDIA HORA
                                        if(horaRecorridoMedio<horaInicial || horaRecorridoMedio>=horaFinal){                            
                                            
                                        }else{
                                            propiedadMediaDisabled = "disabled class='apartado'";
                                        }                                        
                                        controlRecorrido++;
                                    }else{
                                        //Si sigue siendo el mismo horario entra aqui
                                        if(horarioTemp==i){
                                            //HORA EXACTA
                                            if(horaRecorrido<horaInicial || horaRecorrido>=horaFinal){

                                            }else{
                                                propiedadCompletaDisabled = "disabled class='apartado'";
                                            }
                                            
                                            //MEDIA HORA
                                            if(horaRecorridoMedio<horaInicial || horaRecorridoMedio>=horaFinal){                            
                                                
                                            }else{
                                                propiedadMediaDisabled = "disabled class='apartado'";
                                            }
                                        }else{
                                            //Se cambia el color hasta en 10 ocasiones
                                            switch(controlIngresos){
                                                case 0 : classe="uno";  break;
                                                case 1 : classe="dos";  break;
                                                case 2 : classe="tres";  break;
                                                case 3 : classe="cuatro";  break;
                                                case 4 : classe="cinco";  break;
                                                case 5 : classe="seis";  break;
                                                case 6 : classe="siete";  break;
                                                case 7 : classe="ocho";  break;
                                                case 8 : classe="nueve";  break;
                                                case 9 : classe="diez";  break;
                                            }
                                            controlIngresos++;
                                            if(controlIngresos>=10){
                                                controlIngresos=0;
                                            }
                                            //Si ya cambio el horario entra aqui
                                            if(propiedadCompletaDisabled!=''){
                                                $('#horaInicial').append("<option class='"+classe+"' "+propiedadCompletaDisabled+" value='"+horarioTemp+":00'>"+horarioTemp+":00"+" "+this.title+"</option>");
                                            }else{
                                                $('#horaInicial').append("<option class='sinAsignar' value='"+horarioTemp+":00'>"+horarioTemp+":00"+"</option>");
                                            }
                                            if(propiedadMediaDisabled!=''){
                                                $('#horaInicial').append("<option class='"+classe+"' "+propiedadMediaDisabled+" value='"+horarioTemp+":30'>"+horarioTemp+":30"+" "+this.title+"</option>");
                                            }else{
                                                $('#horaInicial').append("<option class='sinAsignar' value='"+horarioTemp+":30'>"+horarioTemp+":30"+"</option>");
                                            }
                                            propiedadCompletaDisabled = "";
                                            propiedadMediaDisabled    = "";
                                            horarioTemp = i;//Se reinicia la variable temporal
                                            //HORA EXACTA
                                            if(horaRecorrido<horaInicial || horaRecorrido>=horaFinal){

                                            }else{
                                                propiedadCompletaDisabled = "disabled class='apartado'";
                                            }

                                            //MEDIA HORA
                                            if(horaRecorridoMedio<horaInicial || horaRecorridoMedio>=horaFinal){                            
                                                
                                            }else{
                                                propiedadMediaDisabled = "disabled class='apartado'";
                                            }
                                        }
                                    }
                                   
                                });
                            }
                        }
                    }
                });
            }

            function cargaHorariosDisponiblesFinal(){
                horaInicialCargada = $('#horaInicial').val();
                horaInicialPartes = horaInicialCargada.split(":");                
                control = 0;
                control2=0;
                $.ajax({
                    url:"/checaHorariosReservadosDesdeHoraInicial",					
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        "dia": diaGeneral,
                        "idOficina": $('#idOficina').val(),
                        "idSucursal" : $('#idSucursal').val(),
                        "idPiso" : $('#idPiso').val(),
                        "idUsuario" : $('#idUsuario').val(),
                        "horaInicial" : $('#horaInicial').val(),
                        "hora" : horaInicialPartes[0]
                    },
                    type:"POST",
                    dataType: 'json',
                    method:"POST",
                    success: function(response){
                        $('#horaFinal').empty();                        
                        $('#horaFinal').append("<option selected value='-1'>Seleccione un horario</option>");
                        //Si no se traen horarios apartados, se cargan todos los horarios posteriores a la hora de inicio seleccionadaa
                        if(response.length==0){
                            for(i=7; i<=23;i++){
                                if(i<10){
                                    horaCiclo = diaGeneral+" 0"+i+":00:00";
                                    horaCicloMedio = diaGeneral+" 0"+i+":30:00";
                                }else{
                                    horaCiclo = diaGeneral+" "+i+":00:00";
                                    horaCicloMedio = diaGeneral+" "+i+":30:00";
                                } 
                                //Si el horario inicial seleccionado termina en 30, se muestra la hora siguiente
                                if(horaInicialPartes[1]==30){
                                    if(i>horaInicialPartes[0]){
                                        $('#horaFinal').append("<option class='sinAsignar' value='"+i+":00'>"+i+":00"+"</option>");                         
                                        $('#horaFinal').append("<option class='sinAsignar' value='"+i+":30'>"+i+":30"+"</option>");
                                    }
                                }else{//Se muestra la media hora superior a la hora inicial seleccionada
                                    if(i>=horaInicialPartes[0]){                      
                                        if(control==0){
                                            $('#horaFinal').append("<option class='sinAsignar' value='"+i+":30'>"+i+":30"+"</option>");
                                        }else{
                                            $('#horaFinal').append("<option class='sinAsignar' value='"+i+":00'>"+i+":00"+"</option>");                         
                                            $('#horaFinal').append("<option class='sinAsignar' value='"+i+":30'>"+i+":30"+"</option>");
                                        }
                                        control++;
                                    }
                                }
                            }
                        }else{
                            $.each(response, function(index, value){
                                horaInicial = parseInt((new Date(this.start).getTime() / 1000).toFixed(0));
                                horaFinal   = parseInt((new Date(this.end).getTime() / 1000).toFixed(0));

                                if(control2==0){
                                    for(i=7; i<=23;i++){
                                        if(control2==0){
                                            if(i<10){
                                                horaCiclo = diaGeneral+" 0"+i+":00:00";
                                                horaCicloMedio = diaGeneral+" 0"+i+":30:00";
                                            }else{
                                                horaCiclo = diaGeneral+" "+i+":00:00";
                                                horaCicloMedio = diaGeneral+" "+i+":30:00";
                                            } 
                                            horaRecorrido      = parseInt((new Date(horaCiclo).getTime() / 1000).toFixed(0));
                                            horaRecorridoMedio = parseInt((new Date(horaCicloMedio).getTime() / 1000).toFixed(0));
                                            //Si el horario inicial seleccionado termina en 30, se muestra la hora siguiente
                                            if(horaInicialPartes[1]==30){
                                                if(i>horaInicialPartes[0]){
                                                    if(horaRecorrido<=horaInicial)
                                                        $('#horaFinal').append("<option  class='sinAsignar' value='"+i+":00'>"+i+":00"+"</option>");                         
                                                    if(horaRecorridoMedio<=horaInicial)
                                                        $('#horaFinal').append("<option  class='sinAsignar' value='"+i+":30'>"+i+":30"+"</option>");
                                                }
                                            }else{//Se muestra la media hora superior a la hora inicial seleccionada
                                                if(i>=horaInicialPartes[0]){                      
                                                    if(control==0){
                                                        if(horaRecorrido<=horaInicial)
                                                            $('#horaFinal').append("<option class='sinAsignar' value='"+i+":30'>"+i+":30"+"</option>");
                                                    }else{
                                                        if(horaRecorrido<=horaInicial)
                                                            $('#horaFinal').append("<option class='sinAsignar' value='"+i+":00'>"+i+":00"+"</option>");                         
                                                        if(horaRecorridoMedio<=horaInicial)
                                                            $('#horaFinal').append("<option class='sinAsignar' value='"+i+":30'>"+i+":30"+"</option>");
                                                    }
                                                    control++;
                                                }
                                            }

                                            if(horaRecorrido==horaInicial || horaRecorridoMedio==horaInicial){
                                                control2=1;
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            }
        </script>    
    </body>
</html>