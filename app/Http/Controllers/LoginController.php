<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function cerrarSession(Request $request){        
        $request->session()->put('email', null);
        $request->session()->put('token', null);
        $request->session()->put('nombreUsuario', null);
        $request->session()->put('idUsuario', null);        
        return view('login');
    }

    public function loginJADELRIO(){
    	return view('loginJADELRIO');
    }

    public function loginJADELRIOPost(Request $request){
		return view('catalogoAplicaciones');
	}

    function respuestaLoginBotonMenu(Request $request){
        $result = '';
		$key="1d132add1d0ecb0d39ae6eddf243a53f";
		$string = base64_decode($request['str']);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		$request->session()->put('idUsuario', $result);

		DB::beginTransaction();
        $arrayDatosUsuario = [];
        $arrayDatosUsuario = DB::select("SELECT name, email, directorSocio, apartadoMultiple FROM laravel_api.users a
        WHERE a.activo=1 AND a.id=$result");
		$request->session()->put('nombreUsuario', $arrayDatosUsuario[0]->name);
		$request->session()->put('email', $arrayDatosUsuario[0]->email);
		$request->session()->put('directorSocio', $arrayDatosUsuario[0]->directorSocio);
		$request->session()->put('apartadoMultiple', $arrayDatosUsuario[0]->apartadoMultiple);        
		DB::commit();        

		//return view('index');
    }

    function respuestaLogin(Request $request){
        // -------------- CHANGE VARIABLES TO SUIT YOUR ENVIRONMENT  --------------
        //LDAP server address
        $server = "10.10.245.26/JARIO";
        $ldapport = 389; 
        //domain user to connect to LDAP
        $user = $request->email;
        $psw = $request->password;
        //FQDN path where search will be performed. OU - organizational unit / DC - domain component
        $dn = "DC=JARIO,DC=local";
        //Search query. CN - common name (CN=* will return all objects)
        // connecting to LDAP server
        $ds=ldap_connect($server, $ldapport);
        if ($ds == false){
            /*$er = "err_ldap";
            require("login.php");	*/
        }
        else
        {
            try 
            {
                $validarUsuario = ldap_bind($ds, $user , $psw);
                if ($validarUsuario==1) {
                    //Se llenan las variables de session
                    $request->session()->put('email', $request->email);
                    $hora = date('H:i:s');
                    $session_id = session_id();
                    $token = hash('sha256', $hora.$session_id);
                    $request->session()->put('token', $token);
                    $_POST['password']='';
                    /************SE TRAEN LOS DATOS DEL USUARIO **************/
                    $datosEmpleado = [];
                    $datosEmpleado = DB::select("SELECT * FROM laravel_api.users a
                    WHERE a.activo=1 AND a.email='".$request->email."'");
                    $request->session()->put('nombreUsuario', $datosEmpleado[0]->name); 
                    $result = '';
                    $key="1d132add1d0ecb0d39ae6eddf243a53f";
                    $string=$datosEmpleado[0]->id;
                    for($i=0; $i<strlen($string); $i++) {
                        $char = substr($string, $i, 1);
                        $keychar = substr($key, ($i % strlen($key))-1, 1);
                        $char = chr(ord($char)+ord($keychar));
                        $result.=$char;
                    }
                    $request->session()->put('idUsuario', base64_encode($result));                    
                    $request->session()->put('idUsuarioTemp', $datosEmpleado[0]->id);
		            $request->session()->put('directorSocio', $datosEmpleado[0]->directorSocio);         
		            $request->session()->put('apartadoMultiple', $datosEmpleado[0]->apartadoMultiple);
                    //Si esta en mantenimiento la página se descomentan la siguiente línea
                    //return view('mantenimiento');              
                    return view('catalogoAplicaciones',[
                        '_token' => $request->_token,
                    ]);
                } else {
                    return view('loginErroneo');
                }
            }
            catch (Exception $exc) 
            {
                $validarUsuario = 0;
            }
        }
    }

    public function traeAplicaciones(){
		//Se traen las aplicaciones a las que tiene acceso el usuario ya logueado
        $email = session('email');
        DB::beginTransaction();
        $arrayAplicaciones = [];
        $arrayAplicaciones = DB::select("SELECT c.* FROM laravel_api.users a
        INNER JOIN laravel_api.rel_usuarioaplicacion b ON a.id=b.idUsuario
        INNER JOIN laravel_api.cat_aplicaciones c ON b.idAplicacion=c.id
        WHERE a.activo=1 AND c.activo=1 AND a.email='".$email."'
        UNION
        SELECT * FROM laravel_api.cat_aplicaciones a
        WHERE a.activo=1 AND a.activo=1 AND a.id=3");
        if(count($arrayAplicaciones)>0){
            DB::commit();
		    return json_encode($arrayAplicaciones);
        }else{
            DB::rollback();
            return response()->json(['respuesta' => 0]);
        }
	}
}
