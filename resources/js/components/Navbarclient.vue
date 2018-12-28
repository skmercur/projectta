<template>

  <v-toolbar  fixed clipped color="#263238"  dark>
    
    <v-toolbar-title>Taher Boutique</v-toolbar-title>

   
    <v-toolbar-items >
      <v-btn flat>Accueil</v-btn>
      
      <v-btn flat @click="login()"> 
        Continuer Votre Achat       
       </v-btn>
    </v-toolbar-items>
  </v-toolbar>   
  
</template>

<script >

export default {
   props:{
 
  },
  data(){
    return{
  password: 'Password',
      show: false,
      message: '',
      marker: true,
      iconIndex: 0,
    }
  },
   
 mounted(){
   
    
   
  },methods:{
    login(){
      window.location = "/login";
    },
   
       toggleMarker () {
        this.marker = !this.marker
      },
      sendMessage () {
        this.resetIcon()
        this.clearMessage()
      },
      clearMessage () {
        this.message = ''
      },
      resetIcon () {
        this.iconIndex = 0
      },
      changeIcon () {
        this.iconIndex === this.icons.length - 1
          ? this.iconIndex = 0
          : this.iconIndex++
      }
 
  }
}
</script>

