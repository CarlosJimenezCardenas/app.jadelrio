$(document).ready( function () {
    $.ajax({
        url:"/traePaisesAgenda",					
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        type:"POST",
        dataType:'',
        method:"POST",
        success: function(response){
            $('#pais').append("<option value=0>SELECCIONA UN PAÍS</option>");
            $.each(response, function(index, value){ 
                if($('#idPais').val()==this.idPais){
                    $('#pais').append("<option selected value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
                    /******SE CARGA LA CIUDAD **********/
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
                                if($('#idCiudad').val()==this.idCiudad){
                                    $('#ciudad').append("<option selected value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
                                    /**********SE CARGA LA SUCURSAL *************/
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
                                                if($('#idSucursal').val()==this.idSucursal){
                                                    $('#sucursal').append("<option selected value="+this.idSucursal+">"+this.nombreSucursal.toUpperCase()+"</option>");
                                                    /***************SE CARGAN LOS MAPAS ****************/
                                                    $('#piso').empty();
                                                    $.ajax({
                                                        url:"/trae_rel_sucursal_pisos_Agenda",					
                                                        data: {                
                                                            "idSucursal":$('#sucursal').val(),
                                                            "_token": $("meta[name='csrf-token']").attr("content")
                                                        },
                                                        type:"POST",
                                                        dataType:'json',
                                                        method:"POST",
                                                        success: function(response){
                                                            $('#central').empty();
                                                            $('#central').show();
                                                            $.each(response, function(index, value){
                                                                $('#central').append('<div class="col-lg-6 col-md col-sm-12 col-xs-12 letraJA2"><center>'+this.nombrePiso+'</center></br><center><img onclick="cargaPiso('+this.idPiso+',\''+this.ruta+'\',\''+this.imagen+'\',\''+this.nombrePiso+'\')" src="'+this.imagen+'" style="cursor:pointer" width="200px"></center></div>');
                                                            });
                                                        }
                                                    });
                                                }else{
                                                    $('#sucursal').append("<option value="+this.idSucursal+">"+this.nombreSucursal.toUpperCase()+"</option>");
                                                }
                                            });
                                        }
                                    });
                                }else{
                                    $('#ciudad').append("<option value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
                                }
                            });
                        }
                    });
                }else{                    
                    $('#pais').append("<option value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
                }
            });
        }
    });

    $('#pais').change(function(){
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
                    $('#ciudad').append("<option value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
                });
            }
        });
    });

    $('#ciudad').change(function(){
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
                    $('#sucursal').append("<option value="+this.idSucursal+">"+this.nombreSucursal.toUpperCase()+"</option>");
                });
            }
        });
    });

    $('#sucursal').change(function(){
        $('#piso').empty();
        $.ajax({
            url:"/trae_rel_sucursal_pisos_Agenda",					
            data: {                
                "idSucursal":$('#sucursal').val(),
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            type:"POST",
            dataType:'json',
            method:"POST",
            success: function(response){
                $('#central').empty();
                $('#central').show();
                $.each(response, function(index, value){
                    $('#central').append('<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 letraJA2"><center>'+this.nombrePiso+'</center></br><center><img onclick="cargaPiso('+this.idPiso+',\''+this.ruta+'\',\''+this.imagen+'\',\''+this.nombrePiso+'\')" src="'+this.imagen+'" style="cursor:pointer" width="200px"></center></div>');
                });
            }
        });
    });
});

function cargaPiso(idPiso, ruta, imagen, nombrePiso){
    $('#nombrePiso').val(nombrePiso);
    $('#imagen').val(imagen);
    $('#idPiso').val(idPiso);
    $('#ruta').val(ruta);
    $("#forma").prop("action",'/cargaImagenPiso_Agenda');
    $("#forma").submit();
}