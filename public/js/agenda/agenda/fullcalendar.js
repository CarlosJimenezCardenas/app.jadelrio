$(document).ready( function () {
    var apartadoMultiple = $('#apartadoMultiple').val();
    //Se cargan los colaboradores
    if(apartadoMultiple==1){
        $.ajax({
            url:"/traeColaboradores",					
            data: {
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            type:"POST",
            dataType:'',
            method:"POST",
            success: function(response){
                $.each(response, function(index, value){
                    $('#colaborador').append("<option value="+this.id+"|"+this.name+">"+this.name.toUpperCase()+"</option>");
                });
            }
        });
    }

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
                $('#pais').append("<option value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
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
                    $('#central').append('<div class="col-lg-6 col-md col-sm-12 col-xs-12 letraJA"><center>'+this.nombrePiso+'</center></br><center><img onclick="cargaPiso('+this.idPiso+',\''+this.ruta+'\',\''+this.imagen+'\',\''+this.nombrePiso+'\')" src="'+this.imagen+'" style="cursor:pointer" width="200px"></center></div>');
                });
            }
        });
    });    

    $('#EditarSeleccion').click(function(){        
        $("#forma").prop("method","GET");
        $("#forma").prop("action","/seleccionInicialAgenda");
        $("#forma").submit();
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