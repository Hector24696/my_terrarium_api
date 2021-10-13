<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;

class ConfigurationController extends Controller
{
    public function getConfig(){
        return response()->json(Configuration::all(),200);
    }
    public function countConfig(){
        return Configuration::count();
    }
    
    public function addConfig(Request $request){
        if($this->countConfig()<=4){
            return response()->json(Configuration::create($request->all()),201);
        }else{
            return response()->json("Has alcanzado el máximo de configuraciones, elimine o modifique una existente",500);
        }
    }
    public function deleteConfig(Request $request){
        $result=array();
        parse_str($request->getQueryString(),$result);
        return response()->json(Configuration::where('name', $result['name'])->delete(),200);
        
    }
  
}