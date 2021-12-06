$(document).ready( function () {
    $( "#1" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 1"});
    $( "#2" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 2"});
    $( "#3" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 3"});
    $( "#4" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 4"});
    $( "#5" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 5"});
    $( "#6" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 6"});
    $( "#7" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 7"});
    $( "#8" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 8"});
    $( "#9" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 9"});
    $( "#10" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 10"});
    $( "#11" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 11"});
    $( "#12" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 12"});
    $( "#13" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 13"});
    $( "#14" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 14"});
    $( "#15" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 15"});
    $( "#16" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 16"});
    $( "#17" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 17"});
    $( "#18" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 18"});
    $( "#19" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 19"});
    $( "#20" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 20"});
    $( "#21" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 21"});
    $( "#22" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 22"});
    $( "#23" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 23"});
    $( "#24" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 24"});
    $( "#25" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 25"});
    $( "#26" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 26"});
    $( "#27" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Rodrigo Miranda"});
    $( "#28" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Sala Directores"});
    $( "#29" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Aleli"});
    $( "#30" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Sala rapida"});
    $( "#31" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Sala de juntas"});

   //Se cargan los datos en base a la selección inicial del país
   $.ajax({
        url:"/traePaisesAgenda",					
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        type:"POST",
        dataType:'json',
        method:"POST",
        success: function(response){
            $('#pais').append("<option value=0>SELECCIONA UN PAÍS</option>");
            $.each(response, function(index, value){ 
                if(this.idPais==$('#idPais').val())
                    $('#pais').append("<option selected value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
                else
                    $('#pais').append("<option value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
            });
            //Se cargan los datos de la ciudad en base a la selección inicial del país
            $('#ciudad').empty();
            $.ajax({
                url:"/trae_rel_pais_ciudad_Agenda",					
                data: {                
                    "idPais":$('#pais').val(),
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                type:"POST",
                dataType:'json',
                method:"POST",
                success: function(response){
                    $('#ciudad').append("<option value=0>SELECCIONA UNA CIUDAD</option>");
                    $.each(response, function(index, value){
                        if(this.idCiudad==$('#idCiudad').val())
                            $('#ciudad').append("<option selected value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
                        else
                            $('#ciudad').append("<option value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
                    });
                    //Se carga la sucursal en base a la seleccion de la página principal
                    $('#sucursal').empty();
                    $.ajax({
                        url:"/trae_rel_ciudad_sucursal_Agenda",					
                        data: {                
                            "idCiudad":$('#ciudad').val(),
                            "_token": $("meta[name='csrf-token']").attr("content")
                        },
                        type:"POST",
                        dataType:'json',
                        method:"POST",
                        success: function(response){
                            $('#sucursal').append("<option value=0>SELECCIONA UNA SUCURSAL</option>");
                            $.each(response, function(index, value){
                                if(this.idSucursal==$('#idSucursal').val())
                                    $('#sucursal').append("<option selected value="+this.idSucursal+">"+this.nombreSucursal.toUpperCase()+"</option>");
                                else
                                    $('#sucursal').append("<option value="+this.idSucursal+">"+this.nombreSucursal.toUpperCase()+"</option>");
                            });
                        }
                    });
                }
            });
        }
    });

    $('#EditarSeleccion').click(function(){        
        $("#forma").prop("method","GET");
        $("#forma").prop("action","/seleccionInicialAgenda");
        $("#forma").submit();
    });    

    $('#regresar').click(function(){        
        $('#pais').prop('disabled', false);  
        $('#ciudad').prop('disabled', false);  
        $('#sucursal').prop('disabled', false);
        $("#forma").prop("method","POST");
        $("#forma").prop("action","/seleccionInicialPOSTAgenda");
        $("#forma").submit();
    });
});

function eligeOficina(idPiso, idOficina, idSucursal, nombreOficina){
    $('#nombreOficina').val(nombreOficina);
    $('#idPiso').val(idPiso);
    $('#idOficina').val(idOficina);
    $('#idSucursal').val(idSucursal);
    $("#forma").prop("action","/muestraAgendaPorPiso_Agenda");
    $("#forma").submit();
}