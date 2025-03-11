<?php

use App\Http\Controllers\NutritionixController;
use Illuminate\Support\Facades\Route;

Route::get('/nutritionix', [NutritionixController::class, 'getNutritionData']);
Route::get('/', function () {
    return view('welcome');
});
