<?php
namespace App\Http\Controllers;
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

Route::get('/asistencia', [EstablishmentController::class, 'index'])->name('establishment.index');

Route::get('get-establishments', [EstablishmentController::class,'getEstablishments'])->name('establishment.getEstablishment');;
Route::post('get-locations', [EstablishmentController::class,'getLocations'])->name('establishment.getLocations');
Route::post('asistencia',[IdentifierController::class,'index'])->name('identifier.index');
Route::get('get-qr',[IdentifierController::class,'getIdentifier'])->name('identifier.getIdentifier');