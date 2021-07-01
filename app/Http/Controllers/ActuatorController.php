<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Actuators;


class ActuatorController extends Controller
{
    public function getActuators(){
        return response()->json(Actuators::all(),200);
    }
    public function updateActuators(Request $request){
        Log::info($request->all());
        foreach($request->all() as $record){
            Actuators::where('val', $record["val"])->update(array('st'=>$record["st"]));
        }
        return response()->json("ok",200);
    }
}
