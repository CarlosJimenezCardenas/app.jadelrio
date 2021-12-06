$(document).ready( function () {
    $( "#1" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Erik"});
    //$( "#2" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Bernardo"});
    $( "#3" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Sala A"});
    $( "#4" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Recursos Humanos"});
    $( "#5" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "TI"});
    $( "#6" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Alvaro"});
    $( "#7" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Alfredo"});
    $( "#8" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "José Ávila"});

    $( "#9" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 1"});
    $( "#10" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 2"});
    $( "#11" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 3"});
    $( "#12" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 4"});
    $( "#13" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 5"});
    $( "#14" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 6"});

    $( "#15" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 7"});
    $( "#16" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 8"});
    $( "#17" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 9"});
    $( "#18" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 10"});
    $( "#19" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 11"});
    $( "#20" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 12"});
    $( "#21" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 13"});
    $( "#22" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 14"});

    $( "#23" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 15"});
    $( "#24" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 16"});
    $( "#25" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 17"});
    $( "#26" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 18"});
    $( "#27" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 19"});
    $( "#28" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 20"});
    $( "#29" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 21"});
    $( "#30" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 22"});
    $( "#31" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 23"});
    $( "#32" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 24"});

    $( "#33" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 25"});
    $( "#34" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 26"});
    $( "#35" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 27"});
    $( "#36" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 28"});
    $( "#37" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 29"});
    $( "#38" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 30"});
    $( "#39" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 31"});
    $( "#40" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 32"});

    $( "#41" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 33"});
    $( "#42" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 34"});
    $( "#43" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 35"});
    $( "#44" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 36"});
    $( "#45" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 37"});
    $( "#46" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Espacio 38"});

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