<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealIngredient extends Model
{
    use HasFactory;

    protected $fillabla = ['meal_id', 'ingredient_id'];

    public function mealOfTheDayIngredients(){
        return $this->hasMany(MealOfTheDayIngredient::class, 'meal_ingredient_id'); 
        
    }

    public function ingredients(){
        return $this->belongsTo(Ingredient::class, 'ingredient_id'); 
        
    }

    public function meals(){
        return $this->belongsTo(Meal::class, 'meal_id'); 
        
    }

}
