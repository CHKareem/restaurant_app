<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealOfTheDay extends Model
{
    use HasFactory;

    protected $fillable=['id', 'mealName', 'dayDate'];

    public function mealOfTheDayIngredientRelation(){
        return $this->hasMany(MealOfTheDayIngredient::class, 'meal_of_the_day_id'); 
        
    }
}
