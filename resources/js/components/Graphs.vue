<template>
<v-container>
    <v-layout  align-center  wrap>

    
     
       
   
<v-flex d-flex shrink xs6 md5>
<la-cartesian :data="values"  :height="50" autoresize  >
     
    <la-area  animated prop="value"></la-area>
    <la-tooltip></la-tooltip>
    <la-y-axis></la-y-axis>
</la-cartesian>
</v-flex>

    </v-layout>
</v-container>
</template>
<script>
import {Cartesian,Area,Tooltip} from 'laue';
export default {
    components:{
        LaCartesian:Cartesian,
        LaArea:Area,
        LaTooltip:Tooltip
    },
     props: {
         Url:String,
         
     },
    data(){
        
        return{
            titles:[{
                title:'View',
 
            },{
                title :'Sells'
            }],
            values:[0,],
            i : 0
           
        }
    }, methods:{
    
         sendToServer(){
             
              let k ;
             var z = this.i;
       
       
              this.intervalid1 = setInterval(function(){
                  
         axios.post(this.Url, {
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
         
           
         }.bind(this), 1000);
         
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
