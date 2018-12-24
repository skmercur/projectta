<template>
<div class="container">
  <div class="row">
<div class="col">
        <h4 class="centerTitle">Data</h4>
        <br>
<la-cartesian :data="values"  :height="50" :width="250"  >
     
    <la-area  animated prop="value"></la-area>
    <la-tooltip></la-tooltip>
    <la-y-axis></la-y-axis>
</la-cartesian>
 
</div>

  </div>
   


</div>
</template>
<script>
import {Cartesian,Area,Tooltip} from 'laue';
export default {
    components:{
        LaCartesian:Cartesian,
        LaArea:Area,
        LaTooltip:Tooltip
    },
    data(){
        
        return{
            titles:[{
                title:'View',
 
            },{
                title :'Sells'
            }],
            values:[],
            i : 0
           
        }
    }, methods:{
    
         sendToServer(){
             
              let k ;
             var z = this.i;
       
       
              this.intervalid1 = setInterval(function(){
                  
         axios.post('/test', {
                    functionToDo:"getCharts",
                 
                })
                .then(function (response) {
               if(response.data != null){
                   k = response.data;
               }
                 
                  
                })
                .catch(function (error) {
                   console.dir(error);
                });
         this.title = k.value;
         this.i++;
         if(k !== null){
this.values.push(k);

         }
         
           
         }.bind(this), 10000);
         
    }
    },
    mounted(){
        this.sendToServer();
    }
}
</script>
<style scoped>
.centerTitle{
     margin: auto;
  width: 50%;
  padding: 10px;
}
</style>
