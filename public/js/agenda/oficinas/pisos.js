$(document).ready( function () {
    $( "#uno" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "."});

    $( "#dos" ).easyTooltip({
        xOffset: 100,
        yOffset: 100,
        tooltipDir: "right",
        content: "Sala C"
    });    

    $( "#tres" ).easyTooltip({
        xOffset: 100,
        yOffset: 100,
        tooltipDir: "right",
        content: "Pedro Rosales"
    });   

    $( "#cuatro" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Dolores"});
    $( "#cinco" ).easyTooltip({xOffset: 100, yOffset: 100, tooltipDir: "right", content: "Sala D"});
    $( "#seis" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 1" });
    $( "#siete" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 2" });
    $( "#ocho" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 3" });
    $( "#nueve" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 4" });
    $( "#diez" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 5" });
    $( "#once" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 6" });
    $( "#doce" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 7" });
    $( "#trece" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 8" });
    $( "#catorce" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 9" });
    $( "#quince" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 10" });
    $( "#dieciseis" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 11" });
    $( "#diecisiete" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 12" });
    $( "#dieciocho" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 13" });
    $( "#diecinueve" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 14" });
    $( "#veinte" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 15" });
    $( "#veintiuno" ).easyTooltip({ xOffset: 100, yOffset: 100, tooltipDir: "right",  content: "Espacio 16" });

   //Se cargan los datos en base a la selección inicial del país
   $.ajax({
        url:"/traePaises",					
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
                url:"/trae_rel_pais_ciudad",					
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
                        url:"/trae_rel_ciudad_sucursal",					
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
        $("#forma").prop("action","/seleccionInicial");
        $("#forma").submit();
    });
});

function eligeOficina(idPiso, idOficina, idSucursal){
    $('#idPiso').val(idPiso);
    $('#idOficina').val(idOficina);
    $('#idSucursal').val(idSucursal);
    $("#forma").prop("action","/muestraAgendaPorPiso");
    $("#forma").submit();
}