<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ApiguzzleController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
    
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    
    // # RUTAS PROTEGIDAS PARA EL ADMIN
    Route::post('order_fuell', [ApiguzzleController::class, 'order_fuell'])->name('order_fuell'); 
    Route::post('store', [AgencyController::class, 'store'])->name('store'); 
    Route::delete('destroy{id}', [AgencyController::class, 'destroy'])->name('destroy'); 
    Route::get('edit/{id}', [AgencyController::class, 'edit'])->name('edit'); 
    Route::put('update/{id}', [AgencyController::class, 'update'])->name('update'); 
 

}); 

// # RUTAS PUBLICAS 
Route::post('findAgency', [AgencyController::class, 'findAgency'])->name('findAgency');
Route::get('getAllAgencies', [AgencyController::class, 'getAllAgencies'])->name('getAllAgencies');


// # === Estas son solo rutas de ensayo  con API de precio de U$D y de combustibles ===
Route::post('guzz', [ApiguzzleController::class, 'guzzEndpoints'])->name('guzz'); 
Route::post('guzzSearch', [ApiguzzleController::class, 'guzzSearch'])->name('guzzSearch'); 
Route::post('acceso', [RegisterController::class, 'acceso']);




 


