
$(document).ready(function() {
    /**************SE TRAE LOS DATOS A GRAFICAR ***************/
    /*var options={
        chart:{
            renderTo:'chart',
            type:'cylinder',
            labels:true,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            },
            tooltip: {
				enabled: true,
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
						this.x +': '+ this.y +' '+this.series.name;
				}
			},
        },
        xAxis: {
            categories: ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE',
            'OCTUBRE','NOVIEMRBE','DICIEMBRE'],
            // Pongo el título para el eje de las 'X'
            title: {
                text: 'Meses'
            }
        },
        series:[{}]
    };
    $.ajax({
        url: '/traeDatosAGraficar',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content"),
            'pais':$('#idPais').val(),
        },
        type: 'POST',
        dataType: "JSON",
        method:"POST",
        success: function (data) {
            options.series[0].data = data;
            var chart = new Highcharts.Chart(options);
        }
    });*/

    $(function() {
        $( "#fechaInicial" ).datepicker();
        $( "#fechaFinal" ).datepicker();
    });
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
                    /******SE CARGA LA CIUDAD **********/
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
                                if($('#idCiudad').val()==this.idCiudad){
                                    $('#ciudad').append("<option selected value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
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
                    $('#ciudad').append("<option value="+this.idCiudad+">"+this.nombreCiudad.toUpperCase()+"</option>");
                });
            }
        });
    });

    $('#ciudad').change(function(){
        $('#chart').empty();
        $('#sucursal').empty();
        $.ajax({
            url:"/trae_rel_ciudad_sucursalGrafica",					
            data: {                
                "idCiudad":$('#ciudad').val(),
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            type:"POST",
            dataType:'json',
            method:"POST",
            success: function(response){
                visitorData(response);
            }
        });

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
        $('#chart').empty();
        $('#piso').empty();
        $.ajax({
            url:"/trae_rel_sucursal_pisosGrafica",					
            data: {                
                "idSucursal":$('#sucursal').val(),
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            type:"POST",
            dataType:'json',
            method:"POST",
            success: function(response){
                visitorData(response);
            }
        });

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
                $('#central').empty();
                $('#central').show();
                $.each(response, function(index, value){
                    $('#central').append('<div class="col-lg-6 col-md col-sm-12 col-xs-12 letraJA2"><center>'+this.nombrePiso+'</center></br><center><img onclick="cargaPiso('+this.idPiso+',\''+this.ruta+'\',\''+this.imagen+'\',\''+this.nombrePiso+'\')" src="'+this.imagen+'" style="cursor:pointer" width="200px"></center></div>');
                });
            }
        });
    });  
});