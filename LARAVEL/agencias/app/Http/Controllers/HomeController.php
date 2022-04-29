<?php

namespace App\Http\Controllers; 
 
use Illuminate\Support\Facades\Http; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth:sanctum');
    }

     
    public function index()
    {
       $USD = Http::get('https://api-dolar-argentina.herokuapp.com/api/dolarblue')
        ->json();    
        return view('dashboard', compact('USD'));
        
    }
    
}
