<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\RetiroController;
use App\Http\Controllers\SaldoPendienteController;
use App\Models\User;
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
    return view('auth.login');
});



Route::group(['middleware' => ['auth']], function() {
    Route::resource('dashboard',DashboardController::class)->names('dashboard');  
    Route::resource('retirar',RetiroController::class)->names('retiro');  
    Route::resource('deposito',DepositoController::class)->names('deposito');  
    Route::resource('movimientos',MovimientosController::class)->names('movimientos');  
    Route::resource('profile/show',Controller::class)->names('profile');
    Route::resource('pendiente',SaldoPendienteController::class)->names('saldo_pendiente');
});
