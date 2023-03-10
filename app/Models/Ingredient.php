<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable=['ingredientName'];

    public function mealIngredient(){
        return $this->hasMany(MealIngredient::class, 'ingredient_id'); 
        
    }
}
