<?php

namespace App\Http\Controllers;

use App\Models\MealIngredient;
use Illuminate\Http\Request;

class mealIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealIngredient  $mealIngredient
     * @return \Illuminate\Http\Response
     */
    public function show($mealIngredient)
    {
        //

        return response()->json(MealIngredient::with('ingredients')->where('meal_id', $mealIngredient)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealIngredient  $mealIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(MealIngredient $mealIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MealIngredient  $mealIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealIngredient $mealIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealIngredient  $mealIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealIngredient $mealIngredient)
    {
        //
    }
}
