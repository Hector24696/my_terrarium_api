<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInputParameters;
use App\HistoricsTemperatures;
use App\HistoricsHumidities;

class ParametersController extends Controller
{
    public function getParameter(Request $request){
        $result=array();
        parse_str($request->getQueryString(),$result);
        if(array_key_exists('name', $result)){
            return response()-> json(UserInputParameters::where('name',$result['name'])->get(['name','value']),200);
        }else{
            return response()->json(UserInputParameters::all(['name','value']),200);
        }
    }
    public function addParameter(Request $request){
        if(UserInputParameters::where('name',$request->name)->exists()){
            return response()->json(UserInputParameters::where('name',$request->name)->update(array('value'=>$request->value)),200);
        }else{
            return response()->json(UserInputParameters::create($request->all()),201);
        }    
    }
    public function getHistoric(Request $request){
        $result=array();
        parse_str($request->getQueryString(),$result);
        if($result['parametro']=='temperatura'){
            return response()->json(HistoricsTemperatures::orderBy('updated_at','DESC')->get(),200);
        }else if($result['parametro']=='humedad'){
            return response()->json(HistoricsHumidities::orderBy('updated_at','DESC')->get(),200);
        }else{
            return response()->json([],200);
        }
    }
    public function deleteHistoric(Request $request){
        $result=array();
        parse_str($request->getQueryString(),$result);
        if($result['parametro']=='temperatura'){
            return response()->json(HistoricsTemperatures::truncate(),200);
        }else if($result['parametro']=='humedad'){
            return response()->json(HistoricsHumidities::truncate(),200);
        }else{
            return response()->json($request->parametro,200);
        }
    }
    public function addToHistoric(Request $request){
            response()->json(HistoricsTemperatures::create(array('value'=>$request->temperature)),201);
            response()->json(HistoricsHumidities::create(array('value'=>$request->humidity)),201);
            return response()->json("ok",200);
    }
    
    public function getSensorValue(Request $request){
        $result=array();
        parse_str($request->getQueryString(),$result);
        if($result['name']=='temperature'){
            return response()->json(HistoricsTemperatures::orderBy('updated_at','DESC')->first(['value']),200);
        }else if($result['name']=='humidity'){
            return response()->json(HistoricsHumidities::orderBy('updated_at','DESC')->first(['value']),200);
        }else{
            return response()->json([],200);
        }
    }
    public function getGraphs(Request $request){
        $result=array();
        parse_str($request->getQueryString(),$result);
        if($result['name']=='temperature'){
            return response()->json(HistoricsTemperatures::orderBy('updated_at','DESC')->take(15)->get(),200);
        }else if($result['name']=='humidity'){
            return response()->json(HistoricsHumidities::orderBy('updated_at','DESC')->take(15)->get(),200);
        }else{
            return response()->json([],200);
        }
    }
}
