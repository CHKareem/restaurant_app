<template>
  <!-- Button trigger modal -->
<button type="button" class="btn mr-2" data-toggle="modal" data-target="#infoModal">
<i class="fas fa-info-circle text-primary" style="font-size: 1.3rem;"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">Info Of The Meal Of The Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
                    
                <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
                <li class="nav-item" role="presentation" wire:ignore>
                    <a class="nav-link active" id="ex-with-icons-tab-1" data-toggle="tab" href="#ex-with-icons-tabs-1" role="tab"
                    aria-controls="ex-with-icons-tabs-1" aria-selected="true">Step 1</a>
                </li>
                <li class="nav-item" role="presentation" wire:ignore>
                    <a class="nav-link" id="ex-with-icons-tab-2" data-toggle="tab" href="#ex-with-icons-tabs-2" role="tab"
                    aria-controls="ex-with-icons-tabs-2" aria-selected="false">Step 2</a>
                </li>
                </ul>

                <div class="tab-content" id="ex-with-icons-content">

                  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">

                    <label>Meal Name : {{mealName}}</label><br>
<label>Meal Date : {{mealDate}}</label>

                            <div class="form-group col-md-12">
            <label for="meal_id">Choose Meal: </label>
                        <select class="custom-select rounded-0" v-model="selectMeal" id="meal_id">
                                <option v-for="(meal, index) in meals" :key="index" :value="meal.id">{{ meal.mealName }}</option>
                        </select>

                    </div>

                    <div class="form-group col-md-12" v-if="ingredients != '' ">

                      <label>Ingredients Of The Meal</label>

                       <div class="table-responsive" >
  <table class="table table-hover" width="100%">
  <thead>
    <tr>
      <th scope="col">Ingredients</th>
      <th scope="col">units</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(ingredient, index) in ingredients" :key="index">
      <td>{{ ingredient.ingredients.ingredientName}}</td>
      <td>
      <select class="custom-select rounded-0" v-model="unitId[index]">
      <option v-for="(unit, index) in units" :key="index" :value="unit.id">{{ unit.unitName }}</option>
      </select>
    </td>
    </tr>
  </tbody>
</table>
                        </div>


                    </div>
                <div class="card-footer d-flex justify-content-centerId">
                       <button type="button" class="btn btn-primary" @click="saveMealOfDayIngredient">Save And Continue</button>
                    </div>
  <div class="alert alert-success" role="alert" v-if="msg"></div>
                  </div>

                  <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">

                   <div class="form-group col-md-12" v-if="mealOfTheDayIngredients != '' ">

                       <div class="table-responsive" >
  <table class="table table-hover" width="100%">
  <thead>
    <tr>
      <th scope="col">Ingredients</th>
      <th scope="col">units</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(mealOfTheDayIngredient, index) in mealOfTheDayIngredients" :key="index">
<td>{{ mealOfTheDayIngredient.meal_ingredient_id}}</td>
      <td>{{ mealOfTheDayIngredient.units.unitName}}</td>
      <td><input type="text" v-model="mealOfTheDayQuentity[index]"></td>
    </tr>
  </tbody>
</table>
                        </div>


                  </div>

                                  <div class="card-footer d-flex justify-content-centerId">
                       <button type="button" class="btn btn-primary" @click="saveMealOfDayIngredientQuantity">Save And Continue</button>
                    </div>

                 </div>
                                
                

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>

  </div>
</div>
</template>

<script>
export default {
  props:{id: Number, mealName: String, mealDate:Date},
    data() {
      return {
        mealOfTheDayQuentity:[],
        msg:'',
        selectMeal:'',
        mealOfTheDayId:this.id,
        mealName:this.mealName,
        mealDate: this.mealDate,
        mealOfTheDayIngredients:[],
        unitId: [],
        meals:[],
        mealIngredientId:[],
        ingredients:[],
        units:[],
        api:'http://127.0.0.1:8000/api/meal',
        apiUnit:'http://127.0.0.1:8000/api/unit',
        apiMealOfDay:'http://127.0.0.1:8000/api/mealOfDay',
        apiMealIngredient:'http://127.0.0.1:8000/api/mealIngredient',
        apiMealOfTheDayIngredient:'http://127.0.0.1:8000/api/mealOfTheDayIngredient',
      }
    },
    methods:{
            async getMeals(){
           await this.axios.get(this.api).then(res =>{
           this.meals = res.data;
                });
              },
          async getmealOfDayIngredients(){
           await this.axios.get(this.apiMealOfTheDayIngredient+'/'+this.mealOfTheDayId).then(res =>{
           this.mealOfTheDayIngredients = res.data;
                });
              },
              async getUnits(){
           await this.axios.get(this.apiUnit).then(res =>{
           this.units = res.data;
                });
              },
              async saveMealOfDayIngredient(){
            let data = {'meal_of_the_day_id':this.mealOfTheDayId, 'meal_ingredient_id':this.mealIngredientId, 'unit_id':this.unitId};
            await this.axios.post(this.apiMealOfTheDayIngredient, data).then(res =>{
          this.getmealOfDayIngredients();
             });
              },
              async getIngredientsFromMeal(){
           await this.axios.get(this.apiMealIngredient+'/'+this.selectMeal).then(res =>{
           this.ingredients = res.data;
           this.mealIngredientId = res.data.map(mealId => mealId.id)
                });
              },
              async saveMealOfDayIngredientQuantity(){
          let data = {'meal_ingredient_id':this.mealIngredientId, 'quantity':this.mealOfTheDayQuentity};
            await this.axios.post(this.apiMealOfTheDayIngredient, data).then(res =>{
          // this.getmealOfDayIngredients();
             });
              }
          },
          async mounted(){
            await this.getMeals();
            await this.getUnits();
            // await this.getmealOfDayIngredients();
          },
          async updated(){
            if(this.mealIngredientId == ''){
            await this.getIngredientsFromMeal();
            }
          }
      }
</script>

<style>

</style>