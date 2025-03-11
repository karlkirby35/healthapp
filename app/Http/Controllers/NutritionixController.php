<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NutritionixController extends Controller
{
    public function getNutrition()
    { 
        
        $apiKey = '5033eff289ba63af644933b5a6229ccd';
        
      
        $client = new Client();

   
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=London&units=metric&appid={$apiKey}";

        try {
           
            $response = $client->get($apiUrl);

      
            $data = json_decode($response->getBody(), true);

     
            return view('weather', ['weatherData' => $data]);
        } catch (\Exception $e) {
 
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}