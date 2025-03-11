<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NutritionixController extends Controller
{
    public function getNutritionData(Request $request)
    {
        $foodName = $request->input('food', 'apple'); // Default to 'apple' if not provided
        
        // Get API credentials from .env
        $appId = env('NUTRITIONIX_APP_ID');
        $appKey = env('NUTRITIONIX_APP_KEY');

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.nutritionix.com/v1_1/search/' . $foodName, [
                'query' => [
                    'results' => '0:20',
                    'fields' => 'item_name,item_id,brand_name,nf_calories,nf_total_fat',
                ],
                'headers' => [
                    'x-app-id' => $appId,
                    'x-app-key' => $appKey,
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            
            // Pass the results to the view
            return view('nutritionix', ['foods' => $data['hits']]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch data from Nutritionix API'], 500);
        }
    }
}
