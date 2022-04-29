<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
     

     // # Datos que se le pasan a la tabla Listado de Agencias
    public function index()
    {   
        $agencies = Agency::all();
        return view('table-agencies', ['agencies' => $agencies]);
    } 

     
    // # Consulta a la API y selecciona los datos para guardr en la DB
    public function store(Request $request)
    {    

        if( count(collect($request)) <= 2){

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
                  $datesInsert = Agency::create([
                        
                        'nameAgency' => $result->razonsocial,
                        'cp' => $result->codigopostal,                        
                        'address' => $result->calle,
                        'premium' => $result->premium,
                        'regular' => $result->regular,
                        'longitude' => $result->longitude,
                        'latitude' => $result->latitude,
                        'status' => true
                    ]);

                     
                     
                }  

    // # Avisos de error y exito en el front

                    if($datesInsert == true){ 
                        return redirect()->back()->with('success', 'Bien! La DB se cargo con exito!');

                    }else{
                        return redirect()->back()->with('error', 'Error! No se pudo cargar la DB'); 
                    }
          

        }else{
             
            $insert = Agency::create($request->all());

            if($insert == true){ 
                return redirect()->back()->with('success', 'Bien! Registro creado con exito!');

            }else{
                return redirect()->back()->with('error', 'Error! No se guardaron los datos'); 
            }


        }
        
 
    }

    
    // # Funcio que le sirve al mapa todos los datos de 
    public function findAgency(Request $request)
    {
        $agency = Agency::where('cp',$request->cp)
        ->get();

        return $agency;
    }

    // # Busqueda de Agencia para pasarle al form de UPDATE
    public function edit($id)
    { 

        $agency = Agency::findOrFail($id);
        return view('update', ['agency' => $agency]);
        
    }

    // # Aca llegan los datos del Form de UPDATE
    public function update(Request $request, $id) // # $id representa al ID de la Agency
    {
        
        $update = Agency::where('id', $id)
        ->update([
            'nameAgency' => $request->nameAgency,
            'cp' => $request->cp,                        
            'address' => $request->address,
            'premium' => $request->premium,
            'regular' => $request->regular,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'status' => $request->status
        ]); 

        if($update == true){ 
            return redirect()->back()->with('success', 'Bien! Registro ACTUALIZADO con exito!');

        }else{
            return redirect()->back()->with('error', 'Error! No se ACTUALIZARON los datos'); 
        }
    }

    // # Eliminacion de registros
    public function destroy($id)
    {
        $delete = Agency::findOrFail($id)->delete();

        if($delete == true){ 
            return redirect()->back()->with('success', 'Registro! Eliminado con exito!');

        }else{
            return redirect()->back()->with('error', 'Error! no se elimino el restro'); 
        }
    }
 
    public function getAllAgencies() 
    {
        return Agency::all();
    }

     

    // # Function que trae y selecciona los datos del endpoint de Combustible
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

        $allDates = [];
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

            array_push($allDates, $order);

        }

        return $allDates;

    }

}
