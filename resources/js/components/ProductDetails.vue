<template>
<v-container  grid-list-md text-xs-center class="mt-5">
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
     left
     fixed
     @click="copyThis()"
      >
       <v-icon>share</v-icon>
      </v-btn>
    
  
      
           <v-carousel>
    <v-carousel-item
      v-for="(item,i) in productObj.images.split(',')"
      :key="i"
      
    >
    <div class="blabla" :style="'background-image:url('+item+');'"></div>
     <v-img 
     class="image" 
      :src="item" contain :aspect-ratio="2"></v-img>
 
    </v-carousel-item>
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
         <div id="fb-root"></div>
<div class="fb-customerchat"
  attribution=install_email
  page_id="1852067245119859"
  logged_in_greeting="Pour continuer votre achat cliquer ici"
  logged_out_greeting="Pour continuer votre achat cliquer ici">
</div>
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
<style scoped>
#back{
background-repeat: repeat-x; 
-webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
  z-index: -1;
}
.blabla{
 
  position: absolute;
  top:0;left:0;right:0;bottom:0;
  width: 100%;
  height: 100%;
   background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center; 
filter: blur(7px);z-index:-1;
}
.image{
position: relative;
 left:0; right:0;
        top:0; bottom:0;
        margin:auto;
width: 90%;
height: 100%;
}
</style>