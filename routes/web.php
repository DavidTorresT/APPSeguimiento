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
use App\Http\Controllers\loginController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [loginController::class, 'showLogin'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/usuarios/create', [loginController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [loginController::class, 'store'])->name('usuarios.store');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');


Route::middleware('auth')->group(function () {

    Route::resource('/aprendices', aprendicesController::class);
    Route::resource('/centrosdeformacion', centrosdeformacionController::class);
    Route::resource('/entecoformador', entecoformadorController::class);
    Route::resource('/eps', epsController::class);
    Route::resource('/fichasdecaracterizacion', fichasdecaracterizacionController::class);
    Route::resource('/instructores', instructoresController::class);
    Route::resource('/programas', programasdeformacionController::class);
    Route::resource('/regionales', regionalesController::class);
    Route::resource('/rolesadministrativos', rolesadministrativosController::class);
    Route::resource('/tiposdocumentos', tiposdocumentosController::class);
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    //return view('');
});
