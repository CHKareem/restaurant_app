<template>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
    <i class="fa fa-plus-circle mr-2"></i> Create Meal
</button>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Create Meal Of The Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-row">
        <div class="form-group col-md-12">
            <label for="meal_id">Choose Meal: </label>
                        <select class="custom-select rounded-0" v-model="selectData" id="meal_id">
                                <option v-for="(meal, index) in meals" :key="index">{{ meal.mealName }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="date" class="form-control" placeholder="Enter Meal Date" v-model="mealDate">
                    </div>

                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="addMeal">ADD Meal</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import $ from 'jquery';
export default {
    data() {
      return {
        meals:[],
        selectData:'',
        mealDate:'',
        api:'http://127.0.0.1:8000/api/meal',
        apiMealOfDay:'http://127.0.0.1:8000/api/mealOfDay',
      }
    },
    methods:{
        async addMeal(){
            let data = {'mealName':this.selectData, 'dayDate':this.mealDate};
            await this.axios.post(this.apiMealOfDay, data).then(res =>{
           $('#createModal').modal('hide');
      });
        },
      async getMeals(){
           await this.axios.get(this.api).then(res =>{
           this.meals = res.data;
      });
      }
    },
    async mounted(){
     await this.getMeals();
    },

}
</script>

<style>

</style>