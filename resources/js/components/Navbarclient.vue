<template>
 <v-layout row wrap>
    <v-flex
     
      xs12
      sm12
    xl12
    >
  <v-toolbar color="#263238" dark>
    
    <v-toolbar-title>Taher Boutique</v-toolbar-title>

    <v-spacer>
      <v-flex xs12 sm5 md5 offset-xs0 offset-lg2>
        <v-text-field
            v-model="message"
            
            :append-outer-icon="message ? 'search' : 'mdi-microphone'"
            :prepend-icon="icon"
            box
            clear-icon="mdi-close-circle"
            clearable
            label="Search"
            type="text"
            @click:append="toggleMarker"
            @click:append-outer="sendMessage"
            @click:prepend="changeIcon"
            @click:clear="clearMessage"
          ></v-text-field>
      </v-flex>
    </v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn flat>Accueil</v-btn>
      
      <v-btn flat @click="login()"> 
        Continuer Votre Achat       
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

