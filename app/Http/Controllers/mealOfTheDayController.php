<?php

namespace App\Http\Controllers;

use App\Models\MealOfTheDay;
use Illuminate\Http\Request;

class mealOfTheDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(MealOfTheDay::get());
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
        $meal = MealOfTheDay::create($request->all());
        return response()->json($meal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealOfTheDay  $meal_of_the_day
     * @return \Illuminate\Http\Response
     */
    public function show(MealOfTheDay $MealOfTheDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealOfTheDay  $meal_of_the_day
     * @return \Illuminate\Http\Response
     */
    public function edit(MealOfTheDay $MealOfTheDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MealOfTheDay  $meal_of_the_day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealOfTheDay $MealOfTheDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealOfTheDay  $meal_of_the_day
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return response()->json(MealOfTheDay::where('id',$id)->delete(), 200);
    }
}
