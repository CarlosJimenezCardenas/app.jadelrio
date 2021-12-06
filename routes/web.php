<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MenuAgendaController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

/*****************************************************************************/
/*********************************[LOGIN]*************************************/
/*****************************************************************************/
Route::get('/loginJADELRIO',[LoginController::class, 'loginJADELRIO']);
Route::post('/cerrarSession',[LoginController::class, 'cerrarSession']);
Route::post('/loginJADELRIO',[LoginController::class, 'loginJADELRIOPost']);
Route::post('/traeAplicaciones', [LoginController::class, 'traeAplicaciones']);
Route::post('/respuestaLogin', [LoginController::class, 'respuestaLogin'])->name('respuestaLogin');
Route::post('/respuestaLoginBotonMenu', [LoginController::class, 'respuestaLoginBotonMenu'])->name('respuestaLoginBotonMenu');

/*****************************************************************************/
/****************************[AGENDA OFICINAS]********************************/
/*****************************************************************************/
Route::post('/agendaOficinas',[MenuAgendaController::class, 'indexPOSTAgenda']);
Route::get('/inicialAgenda', [MenuAgendaController::class, 'inicialAgenda'])->name('inicialAgenda');
Route::get('/seleccionInicialAgenda', [MenuAgendaController::class, 'seleccionInicialAgenda'])->name('seleccionInicialAgenda');
Route::post('/seleccionInicialPOSTAgenda', [MenuAgendaController::class, 'seleccionInicialPOSTAgenda']);
Route::get('/misApartadosAgenda', [MenuAgendaController::class, 'misApartadosAgenda'])->name('misApartadosAgenda');
Route::post('/traeColaboradores', [MenuAgendaController::class, 'traeColaboradores'])->name('traeColaboradores');
Route::post('/traePaisesAgenda', [MenuAgendaController::class, 'traePaises_Agenda'])->name('traePaises_Agenda');
Route::post('/trae_rel_pais_ciudad_Agenda', [MenuAgendaController::class, 'trae_rel_pais_ciudad_Agenda'])->name('trae_rel_pais_ciudad_Agenda');
Route::post('/trae_rel_ciudad_sucursal_Agenda', [MenuAgendaController::class, 'trae_rel_ciudad_sucursal_Agenda'])->name('trae_rel_ciudad_sucursal_Agenda');
Route::post('/trae_rel_sucursal_pisos_Agenda', [MenuAgendaController::class, 'trae_rel_sucursal_pisos_Agenda'])->name('trae_rel_sucursal_pisos_Agenda');
Route::post('/cargaImagenPiso_Agenda', [MenuAgendaController::class, 'cargaImagenPiso_Agenda'])->name('cargaImagenPiso_Agenda');
Route::post('/muestraAgendaPorPiso_Agenda', [MenuAgendaController::class, 'muestraAgendaPorPiso_Agenda'])->name('muestraAgendaPorPiso_Agenda');
Route::post('/indexPOSTAgenda', [MenuAgendaController::class, 'indexPOSTAgenda']);
Route::post('/altaAgenda', [MenuAgendaController::class, 'altaAgenda']);
//Route::post('/checaHorariosReservados', [MenuAgendaController::class, 'checaHorariosReservados']);
Route::post('/checaHorariosReservados2', [MenuAgendaController::class, 'checaHorariosReservados2']);
Route::post('/checaHorariosReservadosDesdeHoraInicial', [MenuAgendaController::class, 'checaHorariosReservadosDesdeHoraInicial']);


//CALENDARIO
Route::get('abc', [MenuAgendaController::class, 'abcd']);
Route::post('action', [MenuAgendaController::class, 'action_Calendario']);
Route::get('mostrarCitas', [MenuAgendaController::class, 'mostrarCitas']);
