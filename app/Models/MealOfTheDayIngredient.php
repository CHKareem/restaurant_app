<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealOfTheDayIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['meal_of_the_day_id', 'meal_ingredient_id', 'unit_id', 'quantity'];

    public function mealOfTheDays(){
        return $this->belongsTo(MealOfTheDay::class, 'meal_of_the_day_id'); 
        
    }

    public function mealIngredients(){
        return $this->belongsTo(MealIngredient::class, 'meal_ingredient_id'); 
        
    }

    public function units(){
        return $this->belongsTo(Unit::class, 'unit_id'); 
        
    }
}
