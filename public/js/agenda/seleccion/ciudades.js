$(document).ready( function () {
    $.ajax({
        url:"/trae_rel_pais_ciudad",					
        data: {
            "idPais":$('#paisSeleccionado').val(),
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

    $('#ciudad').change(function(){
        $('#sucursalesDIV').empty();
        $('#sucursalesDIV').show();
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
                $.each(response, function(index, value){
                    $('#sucursalesDIV').append('<div class="col-lg-6 col-md col-sm-12 col-xs-12 letraJA"><center>'+this.nombreSucursal+'</center></br><center><img onclick="cargaCalendarioSucursal('+this.idSucursal+')" src="'+this.imagen+'" style="cursor:pointer" width="200px"></center></div>');
                });
            }
        });
    });
});

function cargaCalendarioSucursal(idSucursal){
    $('#sucursalSeleccionada').val(idSucursal);
    $("#forma").prop("action","/seleccion/pisos");
    $("#forma").submit();
}