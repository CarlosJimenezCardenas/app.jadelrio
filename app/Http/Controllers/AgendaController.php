<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Models\Event;

class AgendaController extends Controller
{
    public function agenda(Request $request){
      return view('indexAgenda');
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

    public function indexMisApartados_Calendario(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::where('idusuario', $request->idUsuario)
                       ->get(['id', 'title', 'start', 'end','nombre']);
            return response()->json($data);
    	}
    	return view('/agenda/agenda/full-calender');
    }
}
