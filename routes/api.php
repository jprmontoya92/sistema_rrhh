<?php
namespace App\Http\Controllers;
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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', [PassportAuthController::class,'login']);
    Route::post('signup', [PassportAuthController::class,'signup']);
    
    // Las siguientes rutas además del prefijo requieren que el usuario tenga un token válido
   Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', '');
    // Aquí agrega tus rutas de la API. En mi caso (EN MI CASO, EL TUYO PUEDE VARIAR) he agregado una de productos
    Route::post('eventos/{$user}','EventController@show');
    //Route::post('eventos/crear', 'EventController@create');
}); 


});