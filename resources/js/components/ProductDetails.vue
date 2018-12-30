<template>
<v-container  grid-list-md text-xs-center>
    <v-card>
        
      
         <v-carousel>
    <v-carousel-item
      v-for="(item,i) in productObj.images.split(',')"
      :key="i"
      :src="'http://localhost/'+item" v-if="item !== ''"
    ></v-carousel-item>
  </v-carousel>
  
  <v-layout xs12>
<v-flex >
<h3>{{ productObj.name_product}}</h3>
<v-divider></v-divider>
<h4>{{ productObj.summery}}</h4>
<v-divider></v-divider>
<h4>Prix {{ productObj.prix - (( productObj.prix* productObj.remise)/100)}} DA</h4>
</v-flex>
  </v-layout>
      </v-card>
</v-container>
</template>
<script>
export default {
    props:{
        product:String,
    },data(){
return{
   productObj:JSON.parse(this.product)
}
    },mounted(){
        console.log(this.productObj);
    }

}
</script>
