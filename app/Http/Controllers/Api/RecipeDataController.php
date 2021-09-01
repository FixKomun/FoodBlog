<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Difficulty;
use App\Models\Ingredient;
use App\Models\TypeOfMeal;

class RecipeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function difficulties()
    {
        $difficulties = Difficulty::all();
        return response()->json($difficulties);
    }
    public function types_of_meal()
    {
        $types_of_meal = TypeOfMeal::all();
        return response()->json($types_of_meal);
    }
    public function ingredients()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }
}
