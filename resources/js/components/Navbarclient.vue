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
      
      <v-btn flat @click="login()"> 
        
     se connecter
        
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
   
    
   
  },methods:{
    login(){
      window.location = "/login";
    }
  }
}
</script>

