$(document).ready( function () {
    $.ajax({
        url:"/trae_rel_sucursal_pisos",					
        data: {
            "idSucursal":$('#sucursalSeleccionada').val(),
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        type:"POST",
        dataType:'json',
        method:"POST",
        success: function(response){
            $('#pisosDIV').empty();
            $('#pisosDIV').show();
            $.each(response, function(index, value){ 
                $('#pisosDIV').append('<div class="col-lg-6 col-md col-sm-12 col-xs-12 letraJA"><center>'+this.nombrePiso+'</center></br><center><img onclick="cargaPiso('+this.idPiso+',\''+this.ruta+'\',\''+this.imagen+'\',\''+this.nombrePiso+'\')" src="'+this.imagen+'" style="cursor:pointer" width="200px"></center></div>');
            });
        }
    });
});

function cargaPiso(idPiso, ruta, imagen, nombrePiso){
    $('#nombrePiso').val(nombrePiso);
    $('#imagen').val(imagen);
    $('#idPisoSeleccionado').val(idPiso);
    $('#rutaSeleccionada').val(ruta);
    $("#forma").prop("action",'/cargaImagenPiso');
    $("#forma").submit();
}