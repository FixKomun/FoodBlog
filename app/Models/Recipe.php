<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'number_of_people', 'prep_time', 'cook_time', 'difficulty_id', 'type_of_meal_id', 'country_id'];

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }
    public function type_of_meal()
    {
        return $this->belongsTo(TypeOfMeal::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
