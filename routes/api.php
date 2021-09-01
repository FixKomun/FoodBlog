<?php

use App\Http\Controllers\Api\RecipeDataController;
use App\Http\Controllers\Api\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/recipes/countries', [RecipeDataController::class, 'countries']);
Route::get('/recipes/difficulties', [RecipeDataController::class, 'difficulties']);
Route::get('/recipes/types_of_meal', [RecipeDataController::class, 'types_of_meal']);
Route::get('/recipes/ingredients', [RecipeDataController::class, 'ingredients']);

Route::get('/recipes', [RecipeController::class, 'index']);
Route::post('/recipes', [RecipeController::class, 'store']);
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);

//ApiResource???
Route::apiResource('recipes', RecipeController::class);
