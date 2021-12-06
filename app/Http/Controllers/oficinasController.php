<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class oficinasController extends Controller
{  
    public function enviodecorreo(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }
      /*
      idOficina : $('#idOficina').val(),
      idSucursal : $('#idSucursal').val(),
      idPiso : $('#idPiso').val(),
      idUsuario : $('#idUsuario').val(),
      nombre : $('#nombre').val(),
      */
      // Varios destinatarios
      $para  = 'carlos.jimenez@jadelrio.com';
      // . ', '; // atención a la coma
      //$para .= 'wez@example.com';
      
      // título
      $titulo = 'Recordatorio de cumpleaños para Agosto';
      
      // mensaje
      $mensaje = '
      <html>
      <head>
        <title>Recordatorio de cumpleaños para Agosto</title>
      </head>
      <body>
        <p>¡Estos son los cumpleaños para Agosto!</p>
        <table>
          <tr>
            <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
          </tr>
          <tr>
            <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
          </tr>
          <tr>
            <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
          </tr>
        </table>
      </body>
      </html>
      ';
      
      // Para enviar un correo HTML, debe establecerse la cabecera Content-type
      $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
      $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      
      // Cabeceras adicionales
      $cabeceras .= 'To: Agenda JA del Rio <agenda@jadelrio.com>' . "\r\n";
      $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
      $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
      $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
      
      // Enviarlo
      $resultado = mail($para, $titulo, $mensaje, $cabeceras);
      if($resultado){
        return 1;
      }else{
        return 0;
      }
    }

    public function traePaises_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }

      $datosPaises = [];
      $datosPaises = DB::table('cat_paises')
      ->select('cat_paises.*')
      ->get();
      return response()->json($datosPaises);
    } 

    public function muestraAgendaPorPiso_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }
        /********************TRAEMOS LA RUTA **************************/
        $ruta = DB::table('cat_pisos')
        ->select('cat_pisos.ruta')
        ->where('idPiso', $request->idPiso)
        ->where('idSucursal', $request->idSucursal)
        ->where('nombrePiso', $request->ruta)
        ->get();
        
        return view('agenda/full-calender',[
            'ruta' => $ruta[0]->ruta,
            'idOficina'=>$request->idOficina,
		      	'token'=>$request->_token,
		    ]);
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
    
    public function ciudades_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }
        return view('/seleccion/ciudades',[			
          'idPais' => $request->paisSeleccionado,
          'token'=>$request->_token,
        ]);
    }    
    
    public function pisos_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }
        return view('/seleccion/pisos',[			
			    'sucursal' => $request->sucursalSeleccionada,
			    'token'=>$request->_token,
		    ]);
    }    
    
    public function trae_rel_pais_ciudad_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }
      $datosCiudades = [];
      DB::beginTransaction();
      $datosCiudades = DB::table('cat_ciudades')
      ->select('cat_ciudades.*')
      ->where('idPais', $request->idPais)
      ->get();
      return response()->json($datosCiudades);
    }    
    
    public function trae_rel_pais_ciudadGrafica_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }
      $datosCiudades = [];
      DB::beginTransaction();
      $datosCiudades = DB::select("SELECT b.nombreCiudad, substring(e.start,1,7) as mes,count(*) as total
      FROM cat_paises a
      INNER JOIN cat_ciudades b ON a.idPais=b.idPais
      INNER JOIN cat_sucursales c ON b.idCiudad=c.idCiudad
      INNER JOIN cat_pisos d ON c.idSucursal=d.idSucursal
      INNER JOIN events e ON d.idPiso=e.idPiso
      WHERE a.idPais=$request->pais
      group by b.nombreCiudad, mes");
      $fechas="";
      foreach ($datosCiudades as $student) {        
          $dataPoints[] = array(
              "name" => $student->nombreCiudad,
              "data" => [
                  intval($student->total),
              ]
          );
          $fechas.=$student->mes.",";
      }
      return view("Reportes/dashboard", [
          "data" => json_encode($dataPoints),
          "terms" => json_encode(array($fechas)),
          "pais" => $request->pais,
      ]);
    }   
    
    public function trae_rel_ciudad_sucursal_Agenda(Request $request){
      if(session('nombreUsuario')==null){
        return view('NoAutorizado');
      }

      $datosSucursales = [];
      DB::beginTransaction();
      $datosSucursales = DB::table('cat_sucursales')
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
      $datosPisos = DB::table('cat_pisos')
      ->select('cat_pisos.*')
      ->where('idSucursal', $request->idSucursal)
          ->orderBy('nombrePiso')
      ->get();
      return response()->json($datosPisos);
    }
}
