<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealOfTheDayIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_of_the_day_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meal_of_the_day_id');
            $table->foreign('meal_of_the_day_id')->references('id')->on('meal_of_the_days')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('meal_ingredient_id');
            $table->foreign('meal_ingredient_id')->references('id')->on('meal_ingredients')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_of_the_day_ingredients');
    }
}
