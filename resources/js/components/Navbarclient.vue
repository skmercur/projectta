<template>

  <v-toolbar  fixed clipped color="#42A5F5"  dark>
  
    <v-toolbar-title class="title"  @click="goToHome()">Taher Boutique</v-toolbar-title>

   <v-spacer></v-spacer>
    <v-toolbar-items >
     <v-btn flat @click="goToAbout()">A propos</v-btn>
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
    },goToAbout(){
       window.location = "/about"
    },
    goToHome(){
       window.location = "/"
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

