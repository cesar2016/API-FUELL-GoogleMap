<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use GuzzleHttp\Client;

class ApiguzzleController extends Controller
{
   
    // # Function solo para probar la URL de la API
    public function getGasolina(Request $request)
    {
         
        $client = new Client();         
        $url = "https://api.datos.gob.mx/v1/precio.gasolina.publico";
        $token = '1|WJrHW5Eyv3vcrhHvP4BxSf9gmbQyBQtZk73uHQZs';

        $request = $client->get($url, [

            'headers'=> [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
                ]             
        
        ]);
        return json_decode($request->getBody());  
        
    }

    // # Function ordenar los resultados como se solicita
    public function order_fuell()
    {
         
        $client = new Client();         
        $url = "https://api.datos.gob.mx/v1/precio.gasolina.publico";
        $token = '1|WJrHW5Eyv3vcrhHvP4BxSf9gmbQyBQtZk73uHQZs';

        $req = $client->get($url, [

            'headers'=> [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
                ]             
        
        ]);
        
        $query = json_decode($req->getBody()); 

        foreach ($query->results as $result) {

            $order = [

                'codigopostal' => $result->codigopostal,
                'calle' => $result->calle,
                'razonsocial' => $result->razonsocial,
                'premium' => $result->premium,
                'regular' => $result->regular,
                'longitude' => $result->longitude,
                'latitude' => $result->latitude
            ];

            header('Content-type:application/json;charset=utf-8');
            echo json_encode($order, JSON_PRETTY_PRINT);
             

        }



        
    }



}
