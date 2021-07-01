<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
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