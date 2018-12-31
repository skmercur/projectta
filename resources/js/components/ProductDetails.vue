<template>
<v-container  grid-list-md text-xs-center>
      <v-snackbar
      v-model="snackbar"
      :bottom="y === 'bottom'"
      :left="x === 'left'"
      :multi-line="mode === 'multi-line'"
      :right="x === 'right'"
      :timeout="timeout"
      :top="y === 'top'"
      :vertical="mode === 'vertical'"
    >
     Copied 
      <v-btn
        color="pink"
        flat
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </v-snackbar>
    <v-card>
       
      <v-btn
   
       
       
        dark
     fab
     bottom
     right
     fixed
     @click="copyThis()"
      >
       <v-icon>share</v-icon>
      </v-btn>
    
  
      
         <v-carousel>
    <v-carousel-item
      v-for="(item,i) in productObj.images.split(',')"
      :key="i"
      :src="'https://www.taherboutique.com/'+item" v-if="item !== ''"
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
   productObj:JSON.parse(this.product),
   value:'',
   snackbar:false,
    y: 'top',
        x: null,
        mode: '',
        timeout: 6000,
}
    },mounted(){
        console.log(this.productObj);
    },methods:{
        copyThis(){
            this.value = 'https://www.taherboutique.com/'+this.productObj.code;
           this.$clipboard(this.value);
           this.snackbar = true;
        }
    }

}
</script>
