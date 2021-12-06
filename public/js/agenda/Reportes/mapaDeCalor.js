$(document).ready( function () {
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
                if($('#idPais').val()==this.idPais){
                    $('#pais').append("<option selected value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
                }else{                    
                    $('#pais').append("<option value="+this.idPais+">"+this.nombre.toUpperCase()+"</option>");
                }
            });
        }
    });

    $('#pais').change(function(){
        $("#forma").prop("action",'/trae_rel_pais_ciudadGrafica');
        $("#forma").submit();
    });

    $('#ciudad').change(function(){
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
                    $('#sucursal').append("<option value="+this.idSucursal+">"+this.nombreSucursal.toUpperCase()+"</option>");
                });
            }
        });
    });

    $('#sucursal').change(function(){
        $('#piso').empty();
        $.ajax({
            url:"/trae_rel_sucursal_pisos",					
            data: {                
                "idSucursal":$('#sucursal').val(),
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            type:"POST",
            dataType:'json',
            method:"POST",
            success: function(response){
                $('#piso').append("<option value=0>SELECCIONA UN PISO</option>");
                $.each(response, function(index, value){ 
                    $('#piso').append("<option value="+this.idPiso+">"+this.nombrePiso.toUpperCase()+"</option>");
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
    $("#forma").prop("action",'/cargaImagenPiso');
    $("#forma").submit();
}