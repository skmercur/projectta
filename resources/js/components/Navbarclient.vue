<template>
 <v-layout row wrap>
    <v-flex
     
      xs12
      sm12
    xl12
    >
  <v-toolbar>
    
    <v-toolbar-title>Taher Boutique</v-toolbar-title>

    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn flat>Accueil</v-btn>
      <v-btn flat>Produits</v-btn>
      <v-btn flat> 
     
          <v-icon
            large
            color="dark"
          >shopping_cart</v-icon> 
          
       </v-btn>
    </v-toolbar-items>
  </v-toolbar>   
    </v-flex>
 </v-layout> 
</template>

<script >

export default {
   props:{
 
  },
  data(){
    return{

    }
  },
   
 mounted(){
   
    
   
  }
}
</script>

