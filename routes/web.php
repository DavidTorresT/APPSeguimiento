<?php

use App\Http\Controllers\aprendicesController;
use App\Http\Controllers\centrosdeformacionController;
use App\Http\Controllers\entecoformadorController;
use App\Http\Controllers\epsController;
use App\Http\Controllers\fichasdecaracterizacionController;
use App\Http\Controllers\instructoresController;
use App\Http\Controllers\programasdeformacionController;
use App\Http\Controllers\regionalesController;
use App\Http\Controllers\rolesadministrativosController;
use App\Http\Controllers\tiposdocumentosController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/programas', function () {
    return view('Programas.index');
});*/

Route::resource('/aprendices', aprendicesController::class);

Route::get('/centrosdeformacion', [centrosdeformacionController::class, 'index'])->name('CentrosdeFormacion.index');

Route::get('/entecoformador', [entecoformadorController::class, 'index'])->name('Entecoformador.index');

Route::resource('/eps', epsController::class);

Route::get('/fichasdecaracterizacion', [fichasdecaracterizacionController::class, 'index'])->name('FichasdeCaracterizacion.index');
Route::resource('/instructores', instructoresController::class);
Route::resource('/programas', programasdeformacionController::class);
Route::resource('regionales', regionalesController::class);

Route::get('/rolesadministrativos', [rolesadministrativosController::class, 'index'])->name('RolesAdministrativos.index');

Route::resource('/tiposdocumentos', tiposdocumentosController::class);

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    //return view('');
});
