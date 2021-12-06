<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MenuAgendaController extends Controller
{   
    public function traeColaboradores(Request $request){
        if(session('nombreUsuario')==null){
          return view('NoAutorizado');
        }
        
        $datosColaboradores = [];
        $datosColaboradores = DB::table('laravel_api.users')
        ->select('*')
        ->where('directorSocio','1')
        ->orderBy('name')
        ->get();
        return response()->json($datosColaboradores);
    }

    public function checaHorariosReservadosDesdeHoraInicial(Request $request){
        if($request->hora<10){
            $horaInicial = $request->dia." 0".$request->horaInicial.":00";
        }else{
            $horaInicial = $request->dia." ".$request->horaInicial.":00";
        }
		$resultado =DB::table('agendaOficinas.events')
        ->select('id', 'idOficina', 'title', 'start', 'end', 'idSucursal', 'idPiso')
		->where('idOficina',$request->idOficina)
		->where('idSucursal',$request->idSucursal)
		->where('idPiso',$request->idPiso)
		->where('start','>=',$horaInicial)
        ->orderBy('start')
		->get();
        return response()->json($resultado);
    }
    public function checaHorariosReservados2(Request $request){
        $fechaFinal = $request->dia." 23:59:59";
		$resultado =DB::table('agendaOficinas.events')
        ->select('id', 'idOficina', 'title', 'start', 'end', 'idSucursal', 'idPiso')
		->where('idOficina',$request->idOficina)
		->where('idSucursal',$request->idSucursal)
		->where('idPiso',$request->idPiso)
		->where('start','>=',$request->dia)
		->where('start','<=', $fechaFinal)
		->get();
        return response()->json($resultado);
    }

    public function checaHorariosReservados(Request $request){
        $inicial = strtotime ('+1 minute' , strtotime ($request->dia));
		$start = date ( 'Y-m-d H:i:s' , $inicial);
        
        $final = strtotime ('-1 minute' , strtotime ($request->dia));
		$end = date ( 'Y-m-d H:i:s' , $final);
        /*echo $start;
        die();*/
		DB::beginTransaction();
		$resultado =DB::table('agendaOficinas.events')
		->where('idOficina',$request->idOficina)
		->where('idSucursal',$request->idSucursal)
		->where('idPiso',$request->idPiso)
		->where('start','<=',$start)
		->where('end','>=', $end)
		->get();
		DB::commit();
        if(count($resultado)!=0){
            $ok[0]['ok'] = 0;
			return response()->json($ok);
        }else{
            $ok[0]['ok'] = 1;
			return response()->json($ok);
        }
    }

	public function altaAgenda(Request $request){
        if($request->nombreUsuario!=''){
            $nombreUsuario =DB::table('laravel_api.users')            
            ->select('name')
            ->where('id',$request->idUsuario)
            ->get();
            $nombreTemporal = $nombreUsuario[0]->name;
        }else{
            $nombreTemporal = session('nombreUsuario');
        }
		$inicial = strtotime ('+1 minute' , strtotime ($request->inicio));
		$start = date ( 'Y-m-d H:i:s' , $inicial); 
		$final = strtotime ('-1 minute' , strtotime ($request->fin));
		$end = date ( 'Y-m-d H:i:s' , $final);
		DB::beginTransaction();
		$resultado =DB::table('agendaOficinas.events')
		->where('idOficina',$request->idOficina)
		->where('idSucursal',$request->idSucursal)
		->where('idPiso',$request->idPiso)
		->where('start','<=',$start)
		->where('end','>=', $start)
		->orWhere('start','<=',$end)				
		->where('end','>=', $end)
		->where('idOficina',$request->idOficina)
		->where('idSucursal',$request->idSucursal)
		->where('idPiso',$request->idPiso)
		->get();
		DB::commit();
		if(count($resultado)==0){
			$event = DB::table('agendaOficinas.events')->insert([
			'title'		=>	$nombreTemporal,
			'start'		=>	$request->inicio,
			'end'		=>	$request->fin,
			'idOficina' => $request->idOficina,
			'idSucursal' => $request->idSucursal,
			'idPiso' => $request->idPiso,
			'idUsuario' => $request->idUsuario,
			'nombre' => $nombreTemporal,
            'created_at' => date('Y-m-d H:i:s')
			]);
			$ok[0]['ok'] = 1;
			return response()->json($ok);
		}else{
			$ok[0]['ok'] = 0;
			return response()->json($ok);
		}
	}
	
    public function indexPOSTAgenda(Request $request){
		return view('IndexAgenda');
	}

    public function action_Calendario(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add'){
                $inicial = strtotime ('+1 minute' , strtotime ($request->start));
                $start = date ( 'Y-m-d H:i:s' , $inicial); 
                $final = strtotime ('-1 minute' , strtotime ($request->end));
                $end = date ( 'Y-m-d H:i:s' , $final);
                DB::beginTransaction();
                $resultado =DB::table('agendaOficinas.events')
                ->where('idOficina',$request->idOficina)
                ->where('idSucursal',$request->idSucursal)
                ->where('idPiso',$request->idPiso)
                ->where('start','<=',$start)
                ->where('end','>=', $start)
                ->orWhere('start','<=',$end)				
                ->where('end','>=', $end)
                ->where('idOficina',$request->idOficina)
                ->where('idSucursal',$request->idSucursal)
                ->where('idPiso',$request->idPiso)
                ->get();
                DB::commit();
                if(count($resultado)==0){
                    $event = DB::table('agendaOficinas.events')->insert([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end,
                    'idOficina' => $request->idOficina,
                    'idSucursal' => $request->idSucursal,
                    'idPiso' => $request->idPiso,
                    'idUsuario' => session('idUsuarioTemp'),
                    'nombre' => session('nombreUsuario')
                    ]);
                    $ok[0]['ok'] = 1;
                    return response()->json($ok);
                }else{
                    $ok[0]['ok'] = 0;
                    return response()->json($ok);
                }
            }

            if($request->type == 'update'){
                $inicial = strtotime ('+1 minute' , strtotime ($request->start));
                $start = date ( 'Y-m-d H:i:s' , $inicial); 
                $final = strtotime ('-1 minute' , strtotime ($request->end));
                $end = date ( 'Y-m-d H:i:s' , $final);
                /******** SE VALIDA QUE NO ESTE OCUPADO EL ESPACIO ********/
                $resultado =DB::table('agendaOficinas.events')				
                ->where('idOficina',$request->idOficina)
                ->where('start','<',$start)
                ->where('end','>', $start)
                ->where('id','<>', $request->id)
                ->orWhere('start','<',$end)			
                ->where('end','>', $end)
                ->where('idOficina',$request->idOficina)
                ->where('id','<>', $request->id)
                ->get();
                if(count($resultado)==0){
                    $apartadoMultiple = $request->apartadoMultiple;
                    //Si se tiene acceso a las agendas de los demás entra aqui
                    if($apartadoMultiple==1){
                        $controlAccion = DB::table('agendaOficinas.events')
                            ->where('id', $request->id)
                            ->update([
                                'start'		=>	$request->start,
                                'end'		=>	$request->end,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
                            $ok[0]['ok'] = 1;
                    }else{
                        /******** SE VALIDA QUE EL USUARIO SEA AL QUE PERTENECE EL EVENTO ********/
                        $resultado2 =DB::table('agendaOficinas.events')
                        ->where('id',$request->id)
                        ->where('idUsuario',session('idUsuarioTemp'))
                        ->get();
                        
                        if(count($resultado2)==1){
                            $controlAccion = DB::table('agendaOficinas.events')
                            ->where('id', $request->id)
                            ->update([
                                'start'		=>	$request->start,
                                'end'		=>	$request->end,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
                            $ok[0]['ok'] = 1;
                        }else{
                            $ok[0]['ok'] = 2;
                        }
                    }
                    return response()->json($ok);
                }else{
                    $ok[0]['ok'] = 0;
                    return response()->json($ok);
                }
            }

            if($request->type == 'delete'){
                $apartadoMultiple = $request->apartadoMultiple;
                //Si se tiene acceso a las agendas de los demás entra aqui
                if($apartadoMultiple==1){
                    DB::table('agendaOficinas.events')
                    ->where('id', $request->id)
                    ->delete();
                    $mal[0]['ok'] = 1;
                    return response()->json($mal);
                }else{
                    $contador = DB::table('agendaOficinas.events')
                    ->where('id', $request->id)
                    ->where('idUsuario',$request->idUsuario)
                    ->get();
                    if(count($contador)==1){
                        DB::table('agendaOficinas.events')
                        ->where('id', $request->id)
                        ->where('idUsuario', session('idUsuarioTemp'))
                        ->delete();
                        $mal[0]['ok'] = 1;
                        return response()->json($mal);
                    }else{
                        $mal[0]['ok'] = 0;
                        return response()->json($mal);
                    }
                }
            }
    	}
    }

    public function abcd(Request $request)
    {
        if($request->ajax()){
            $data = [];
            $data = DB::table('agendaOficinas.events')
            ->select('id', 'title', 'start', 'end','nombre')
            ->whereDate('start', '>=', $request->start)
            ->whereDate('end',   '<=', $request->end)
            ->where('idOficina', $request->idOficina)
            ->get(['id', 'title', 'start', 'end','nombre']);
            return response()->json($data);
        }
    	return view('/full-calender');
    }

    public function mostrarCitas(Request $request)
    {
    	if($request->ajax())
    	{
            $data = [];
            $data = DB::table('agendaOficinas.events')
            ->select('id', 'title', 'start', 'end','nombre')
            ->where('idusuario', '=', session('idUsuarioTemp'))
            ->get(['id', 'title', 'start', 'end','nombre']);
            return response()->json($data);
    	}
    	return view('/full-calender');
    }

    public function traePaises_Agenda(Request $request){
        if(session('nombreUsuario')==null){
          return view('NoAutorizado');
        }
        
        $datosPaises = [];
        $datosPaises = DB::table('agendaOficinas.cat_paises')
        ->select('cat_paises.*')
        ->get();
        return response()->json($datosPaises);
    }

    public function trae_rel_pais_ciudad_Agenda(Request $request){
        if(session('nombreUsuario')==null){
          return view('NoAutorizado');
        }
        $datosCiudades = [];
        DB::beginTransaction();
        $datosCiudades = DB::table('agendaOficinas.cat_ciudades')
        ->select('cat_ciudades.*')
        ->where('idPais', $request->idPais)
        ->get();
        return response()->json($datosCiudades);
    }
    
    public function trae_rel_ciudad_sucursal_Agenda(Request $request){
        if(session('nombreUsuario')==null){
          return view('NoAutorizado');
        }
  
        $datosSucursales = [];
        DB::beginTransaction();
        $datosSucursales = DB::table('agendaOficinas.cat_sucursales')
        ->select('cat_sucursales.*')
        ->where('idCiudad', $request->idCiudad)
        ->get();
        return response()->json($datosSucursales);
    }
    
    public function trae_rel_sucursal_pisos_Agenda(Request $request){
        //Validacion de session  
        if(session('nombreUsuario')==null){
            return view('NoAutorizado');
        }

        $datosPisos = [];
        $datosPisos = DB::table('agendaOficinas.cat_pisos')
        ->select('cat_pisos.*')
        ->where('idSucursal', $request->idSucursal)
            ->orderBy('nombrePiso')
        ->get();
        return response()->json($datosPisos);
    }

    public function cargaImagenPiso_Agenda(Request $request){
        if(session('nombreUsuario')==null){
          return view('NoAutorizado');
        }
            
        return view($request->ruta,[            
            'idPais' => $request->pais,         
            'idCiudad' => $request->ciudad,         
            'idSucursal' => $request->sucursal, 
            'nombrePiso' => $request->nombrePiso,
            'imagen' => $request->imagen,
            'piso' => $request->idPiso,
            'ruta' => $request->ruta,
            'token'=>$request->_token,
        ]);
    }

    public function inicialAgenda(){   
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}     
        return view('/indexAgenda');
    }

    public function seleccionInicialAgenda(){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/seleccion/seleccion');
    }    

    public function apartadoMultiple(){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/seleccion/apartadoGeneral');
    } 
    
    public function seleccionInicialPOSTAgenda(Request $request){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/seleccion/seleccion',[            
        'idPais' => $request->pais,         
        'idCiudad' => $request->ciudad,         
        'idSucursal' => $request->sucursal,
        ]);
    }

    public function misApartadosAgenda(){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/Reportes/misApartados');
    }    

    public function cerrarSession_Agenda(Request $request){        
        $request->session()->put('email', null);
        $request->session()->put('token', null);
        $request->session()->put('nombreUsuario', null);
        $request->session()->put('idUsuario', null);        
        return view('/agenda/NoAutorizado');
    }

    public function graficas_Agenda(){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/Reportes/graficas');
    }

    public function mapaDeCalor_Agenda(){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/Reportes/mapaDeCalor');
    }

    public function seleccionInicialPOST_Agenda(Request $request){
		if(session('nombreUsuario')==null){
			return view('NoAutorizado');
		}
        return view('/agenda/seleccion/seleccion',[            
        'idPais' => $request->pais,         
        'idCiudad' => $request->ciudad,         
        'idSucursal' => $request->sucursal,
        ]);
    }

    public function muestraAgendaPorPiso_Agenda(Request $request){
        if(session('nombreUsuario')==null){
          return view('NoAutorizado');
        }
        /********************TRAEMOS LA RUTA **************************/
        $ruta = DB::table('agendaOficinas.cat_pisos')
        ->select('cat_pisos.ruta')
        ->where('idPiso', $request->idPiso)
        ->where('idSucursal', $request->idSucursal)
        ->where('nombrePiso', $request->ruta)
        ->get();

        return view('agenda/agenda/full-calender',[
            'ruta' => $ruta[0]->ruta,
            'idOficina'=>$request->idOficina,
            'token'=>$request->_token,
        ]);
    }
}
