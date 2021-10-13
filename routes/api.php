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
Route::get('/get-sensor-value', ['uses'=>'ParametersController@getSensorValue']
);
Route::get('/get-graphs', ['uses'=>'ParametersController@getGraphs']
);
Route::get('/get-config', ['uses'=>'ConfigurationController@getConfig']
);
Route::post('/add-config', ['uses'=>'ConfigurationController@addConfig']
);
Route::delete('/delete-config', ['uses'=>'ConfigurationController@deleteConfig']
);
Route::get('/get-count', ['uses'=>'ConfigurationController@countConfig']
);