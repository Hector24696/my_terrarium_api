<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add-new-parameter', [ 'uses'=>'ParametersController@addParameter']
);
Route::get('/get-parameter', ['uses'=>'ParametersController@getParameter']
);
Route::get('/get-historic', ['uses'=>'ParametersController@getHistoric']
);
Route::delete('/delete-historic', ['uses'=>'ParametersController@deleteHistoric']
);
Route::post('/add-to-historic', ['uses'=>'ParametersController@addToHistoric']
);
Route::get('/get-actuators', ['uses'=>'ActuatorController@getActuators']
);
Route::post('/update-actuators', ['uses'=>'ActuatorController@updateActuators']
);
