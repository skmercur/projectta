<template>
<div class="container">
  <div class="row">
<div class="col">
        <h4 class="centerTitle">Data</h4>
        <br>
<la-cartesian :data="values"  :height="150" >
     
    <la-area  animated prop="value"></la-area>
    <la-tooltip></la-tooltip>
    <la-y-axis></la-y-axis>
</la-cartesian>
    
</div>

  </div>
    <div class="row">
<div class="col">
         <h4 class="centerTitle">Data</h4>
        <br>
<la-cartesian :data="values"  :height="150" >
     
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
            values:[{
                value : 10
            },{
                value : 30
            },{
                value : 50
            },
            {value : 200},
            {
                value : 10
            },{
                value : 30
            },{
                value : 50
            },
            {value : 200},
            {
                value : 10
            },{
                value : 30
            },{
                value : 50
            },
            {value : 200}]
        }
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
