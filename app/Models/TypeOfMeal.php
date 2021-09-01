<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfMeal extends Model
{
    use HasFactory;

    protected $fillable = ['type'];
}
