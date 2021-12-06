$(document).ready( function () {
    var control = 0, totalRegistro=0, controlpasadasPorFila=0, controlAncho=0, controlInterno=0, cantidadFilas=1;
    var Modulo=0;
    $.ajax({
        url:"/traeAplicaciones",					
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        type:"POST",
        dataType: 'json',
        method:"POST",
        success: function(response){
            totalRegistro = Object.keys(response).length;
            //Se podrán poner 5 aplicaciones por fila
            if(totalRegistro>5){
                if(totalRegistro%5==0){
                    controlpasadasPorFila=5;
                    controlAncho=eval(100/5);
                }else{
                    if(totalRegistro%4==0){
                        controlpasadasPorFila=4;
                        controlAncho=eval(100/4);
                    }else{
                        if(totalRegistro%3==0){
                            controlpasadasPorFila=3;
                            controlAncho=eval(100/3);
                        }else{                        
                            if(totalRegistro%2==0){
                                if(eval(totalRegistro/2)>5){
                                    //temp = eval(totalRegistro/5);
                                    //temp = Math.floor(temp);
                                    controlpasadasPorFila=5;
                                }else{
                                    controlpasadasPorFila=2;
                                    controlAncho=eval(100/2);
                                }
                            }else{
                                temp = eval(totalRegistro/5);
                                temp = Math.floor(temp);
                                controlpasadasPorFila=5;
                            }
                        }
                    }
                }               
            }else{
                Modulo = eval(5%totalRegistro);
                if(Modulo==0){
                    controlpasadasPorFila=5;
                    controlAncho=eval(100/5);
                }else{
                    Modulo = eval(4%totalRegistro);
                    if(Modulo==0){
                        controlpasadasPorFila=4;
                        controlAncho=eval(100/4);
                    }else{
                        Modulo = eval(3%totalRegistro);
                        if(Modulo==0){
                            controlpasadasPorFila=3;
                            controlAncho=eval(100/3);
                        }else{
                            Modulo = eval(2%totalRegistro);
                            if(Modulo==0){
                                controlpasadasPorFila=2;
                                controlAncho=eval(100/2);
                            }else{
                                Modulo = eval(1%totalRegistro);
                                if(Modulo==0){
                                    controlpasadasPorFila=1;
                                    controlAncho=100;
                                }else{
                                    
                                }
                            }
                        }
                    }
                }
            }                    
            HTML="";
            controlpasadasPorFilaTemp=controlpasadasPorFila;
            $.each(response, function(index, value){
                if(controlInterno==0){     
                    HTML += "<tr id='filter_global'  data-some-id='"+this.idActividad+"' class='compact'>";
                    controlInterno++;
                }
                if(this.imagen==null){
                    HTML +="<td style='width:"+controlAncho+"%'><center>";
                    HTML+='<div class="foo" style="width:60%">';
                    //HTML+='<span class="" style="position:relative; top:0%;left:0%; z-index:2"><a onclick="cargaAplicacion('+this.nombreAplicacion+')"><img style="cursor:pointer" class="" src="http://127.0.0.1:8000/images/default.png" width="80px" height="80px"></a></br>';
                    HTML+='<span class="" style="position:relative; top:0%;left:0%; z-index:2"><a onclick="cargaAplicacion('+this.nombreAplicacion+')"><img style="cursor:pointer" class="" src="../images/default.png" width="80px" height="80px"></a></br>';
                    HTML+='<span class="textoMenuaplicaciones">'+this.nombreAplicacion+'</span>';
                    HTML +="</center></div></td>";
                }else{
                    //HTML +="<td style='width:"+controlAncho+"%'><center>"+this.nombreAplicacion+"</center></td>";
                    HTML +="<td style='width:"+controlAncho+"%'><center>";
                        HTML+='<div class="foo" style="width:60%">';
                        //HTML+='<span style="position:relative; top:0%;left:0%; z-index:2"><a onclick="cargaAplicacion('+this.id+','+'/'+this.ruta+'/)"><img style="cursor:pointer" class="" src="http://127.0.0.1:8000/'+this.imagen+'" width="80px" height="80px"></a></br>';
                        HTML+='<span style="position:relative; top:0%;left:0%; z-index:2"><a onclick="cargaAplicacion('+this.id+','+'/'+this.ruta+'/)"><img style="cursor:pointer" class="" src="../images/'+this.imagen+'" width="80px" height="80px"></a></br>';
                        HTML+='<span class="textoMenuaplicaciones">'+this.nombreAplicacion+'</span>';
                    HTML +="</center></div></td>";
                }
                controlpasadasPorFilaTemp--;

                if(controlpasadasPorFilaTemp==0){
                    HTML +="</tr>";
                    controlInterno=0;                    
                    cantidadFilas++;
                    controlpasadasPorFilaTemp=controlpasadasPorFila;
                }                
                control++;
            });
            $('#tablaSistemas').append(HTML);

            switch(cantidadFilas){
                case 1:
                    $('#tablaSistemas').addClass("tabla200");
                    break;
                case 2:
                    $('#tablaSistemas').addClass("tabla400");
                    break;
                case 3:
                    $('#tablaSistemas').addClass("tabla600");
                    break;
                case 4:
                    $('#tablaSistemas').addClass("tabla800");
                    break;
                default:
                    $('#tablaSistemas').addClass("tabla800");
                    break;
            }
        }
    });    

    $('#general').on("mouseover", function () { 
        $('#botones').show();
    });

    $('#general').on("mouseout", function () {
        $('#botones').hide();
    });

    $('#cerrarSesion').click(function(){
        $("#form").prop("method","POST");
        $("#form").prop("action","/cerrarSession");
        $('#form').submit();
    });
});

function cargaAplicacion(idAplicacion, rutaAplicacion){
    switch(idAplicacion){
        case 1:
            window.open('http://'+rutaAplicacion+'indexCotizador?idAplicacion='+idAplicacion+'&str='+$('#idUsuario').val(), '_blank');
            break;
        case 3:
            //window.open('http://'+rutaAplicacion+'index?idAplicacion='+idAplicacion+'&str='+$('#idUsuario').val(), '_blank');
            $("#form").prop("method","POST");
            $("#form").prop("action","/agendaOficinas");
            $('#form').submit();
            break;
        default:
            break;
        /*case 2:
            window.open('http://'+rutaAplicacion+'index?token='+$('#token_').val()+'&idAplicacion='+idAplicacion, '_self');
            break;
        case 3:
            window.open('http://'+rutaAplicacion+'index?token='+$('#token_').val()+'&idAplicacion='+idAplicacion, '_self');
            break;*/
    }
}