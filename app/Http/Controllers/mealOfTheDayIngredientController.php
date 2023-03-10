<?php

namespace App\Http\Controllers;

use App\Models\MealOfTheDayIngredient;
use Illuminate\Http\Request;

class mealOfTheDayIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $unitsId;
     public $quantityNum;


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    //     foreach($request->meal_ingredient_id as $key => $mealIngId){
    //     foreach($request->unit_id as $key => $unitId){
    //         MealOfTheDayIngredient::create([
    //             'meal_of_the_day_id' => $request->meal_of_the_day_id,
    //             'meal_ingredient_id' => $mealIngId,
    //             'unit_id' => $unitId
    //     ]);
    // }
    //     }


if($request->quantity == 0){
            foreach($request->meal_ingredient_id as $key => $mealIngId){
                // foreach($request->unit_id as $key => $unitId){
                    $this->unitIds = $request->unit_id[$key];
                
            
            MealOfTheDayIngredient::create([
                'meal_of_the_day_id' => $request->meal_of_the_day_id,
                'meal_ingredient_id' => $mealIngId,
                'unit_id' => $this->unitIds
        ]);
    
    }
    
    

    //  foreach($request->unit_id as $key => $unitId){}
    //     MealOfTheDayIngredient::update([
    //         'unit_id' => $unitId
    //     ]);

        return response()->json('Success');
    }
        if($request->quantity != 0){

            foreach($request->meal_ingredient_id as $key => $mealIngId){
            
                $this->quantityNum = $request->quantity[$key];

            MealOfTheDayIngredient::where('meal_ingredient_id', $mealIngId)->update([
                'quantity' => $this->quantityNum
        ]);
    
    }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealOfTheDayIngredient  $mealOfTheDayIngredient
     * @return \Illuminate\Http\Response
     */
    public function show($mealOfTheDayIngredient)
    {
        //

        return response()->json(MealOfTheDayIngredient::with(['units', 'mealIngredients'])->where([['meal_of_the_day_id', $mealOfTheDayIngredient], ['quantity', 0]])->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealOfTheDayIngredient  $mealOfTheDayIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(MealOfTheDayIngredient $mealOfTheDayIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MealOfTheDayIngredient  $mealOfTheDayIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealOfTheDayIngredient $mealOfTheDayIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealOfTheDayIngredient  $mealOfTheDayIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealOfTheDayIngredient $mealOfTheDayIngredient)
    {
        //
    }
}
