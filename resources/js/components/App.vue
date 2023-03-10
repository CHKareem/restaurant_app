<template>
    
    <div class="content">
        <div class="container-fluid">
        <div class="row">
                      <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <!-- Button create  -->
                            <!-- <button class="btn btn-primary mr-2">
                                <i class="fa fa-plus-circle mr-2"></i> Create
                            </button> -->
                            <createMealModal />
                    </div>
                    <div class="card-body">
                    <div class="table-responsive" >
  <table class="table table-hover" width="100%">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(mealOfTheDay, index) in mealsOfTheDay" :key="index">
      <!-- <tr> -->
      <td>{{ mealOfTheDay.mealName}}</td>
      <td>{{ mealOfTheDay.dayDate }}</td>
      <td>
        <EditMealModal />
       <InfoMealModal :id="mealOfTheDay.id" :mealName="mealOfTheDay.mealName" :mealDate="mealOfTheDay.dayDate" />
       <button class="btn mr-2" @click="deleteMealOfTheDay(mealOfTheDay.id, index)"><i class="fa fa-trash text-danger mr-2" style="font-size: 1.3rem;"></i></button>
      </td>
    </tr>
  </tbody>
</table>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-centerId">
                       
                    </div>

                        </div>
                    </div>
                                            </div>
                    </div>
                                            </div>
                    

</template>

<script>
  import createMealModal from "./createMealModal.vue";
  import EditMealModal from "./EditMealModal.vue";
  import InfoMealModal from "./InfoMealModal.vue";

export default {
  components:{
    createMealModal,
    EditMealModal,
    InfoMealModal
    },
    data() {
      return {
        mealsOfTheDay:[],
        api:'http://127.0.0.1:8000/api/mealOfDay',
      }
    },
        methods:{
      async deleteMealOfTheDay(mealOfDayID, index){
      await this.axios.delete(this.api+'/'+mealOfDayID).then(res =>{
          //  this.mealsOfTheDay.splice(index, 1);
           this.getMealOfTheDays();
      });
      },
      async getMealOfTheDays(){
           await this.axios.get(this.api).then(res =>{
           this.mealsOfTheDay = res.data;
      });
      }
    },
    async mounted(){
     await this.getMealOfTheDays();
    },

}
</script>

<style>

</style>