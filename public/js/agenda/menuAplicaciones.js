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
                                    /*temp = eval(totalRegistro/5);
                                    temp = Math.floor(temp);*/
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
                    //HTML +="<td style='width:"+controlAncho+"%'><center>"+this.nombreAplicacion.toUpperCase()+"</center></td>";
                    HTML +="<td class='fondoTransparente' style='width:"+controlAncho+"%'><center>";
                        HTML+='<img src="http://127.0.0.1:8000/'+this.imagen+'" width="100px" height="100px"></br>';
                        HTML+='<span class="textoMenuaplicaciones">'+this.nombreAplicacion+'</span>';
                    HTML +="</center></td>";
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
});