<template>

  <v-toolbar  fixed clipped color="#263238"  dark>
    
    <v-toolbar-title>Taher Boutique</v-toolbar-title>

   <v-spacer></v-spacer>
    <v-toolbar-items >
     
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

