<template>
     <v-stepper v-model="e1" dark>
    <v-stepper-header>
      <v-stepper-step :complete="e1 > 1" step="1">Se connecter avec facebook</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 2" step="2">Verification de vos données personelles</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step step="3">Reservation ou le Paiement</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card
          class="mb-5"
          color="white darken-1"
         
        >
<v-container align-center justify-center>
        <v-layout  row  align-center class="ma-2">
            <v-flex d-flex class="ma-1">
                <h3 style="color:#000">Veuillez vous connecter avec facebook</h3>
               
            </v-flex>
            </v-layout>
             
        <v-layout wrap row justify-center align-center class="ma-3">
            
<v-flex d-flex class="ma-1">
<!--<img id="profileImage"/> -->
 <fb-signin-button
    :params="fbSignInParams"
    @success="onSignInSuccess"
    @error="onSignInError" >
    <v-btn round class="ma-1 pa-2"  color="#4267b2">
  <v-icon class="mr-1 ml-2">fab fa-facebook-square</v-icon> Login with facebook
    </v-btn>
    
  </fb-signin-button>
</v-flex>
        </v-layout>

        <v-layout  row  align-center class="ma-2">
            <v-flex d-flex class="ma-1">
             <h6 style="color:#808080">On utilise facebook pour confirmé votre identité et pour vous contacté</h6>
            </v-flex>
             </v-layout>
</v-container>
</v-card>

        <v-btn
          color="primary"
          @click="e1 = 2"
        >
          Continue
        </v-btn>

        <v-btn flat>Cancel</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card
        
         class="mb-5"
          color="grey lighten-1"
        >
        <v-container align-content-center align-center justify-center>
            <v-layout wrap  row>

<v-flex d-row class="ma-3 pa-2">
<v-img transition max-height="100" max-width="100" :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`" :src="`http://graph.facebook.com/${fbUserData.id}/picture?type=normal`" > </v-img>
        <h5 style="color:#000">Bienvenu {{fbUserData.name}}</h5>
</v-flex>
<v-divider></v-divider>
            </v-layout>
            <v-layout wrap  row>
  <v-form v-model="valid">
    <v-text-field
      v-model="fbUserData.name"
      :rules="nameRules"
      :counter="30"
      label="Nom et prenom"
      required
    ></v-text-field>
    <v-text-field
      v-model="fbUserData.email"
      :rules="emailRules"
      label="E-mail"
      required
    ></v-text-field>
      <v-text-field
      v-model="fbUserData.phone"
    type="numeric"
      label="Numero de telephone"
      required
    ></v-text-field>
     <v-text-field
      v-model="fbUserData.adresse"
      label="Adresse"
      required
    ></v-text-field>
    <v-text-field
      v-model="fbUserData.location"
      label="Ville"
      required
    ></v-text-field>
  </v-form>
            </v-layout>
        </v-container>
        </v-card>

        <v-btn
          color="primary"
          @click="e1 = 3"
        >
          Continue
        </v-btn>

        <v-btn flat>Cancel</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card
          class="mb-5"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 1"
        >
          Continue
        </v-btn>

        <v-btn flat>Cancel</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>
<script>

  export default {
      
    data () {
      return {
        e1: 0,
         fbSignInParams: {
        scope: 'email,public_profile',
        return_scopes: true
      },
      fbUserData:{
          id:0,
          name:'',
          email:'',
          adresse:'',
          location:'',
          phone:'',
      }, 
      valid: false,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 30 || 'Name must be less than 30 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ]
      }
    },
    mounted(){
      
    }
    , methods: {
    onSignInSuccess (response) {
      FB.api('/me?fields=id,name,email,hometown,location', dude => {
          this.fbUserData.id = dude.id;
          this.fbUserData.name = dude.name;
       this.fbUserData.email = dude.email;
       this.fbUserData.location = dude.location.name;
        if(this.fbUserData.id != 0){
            this.e1++;
        }else{
            console.log("Empty");
        }
    
      })
    },
    onSignInError (error) {
      console.log('OH NOES', error)
    }
  }
        
  }
</script>
<!--
<script>

    
function statusChangeCallback(response) {
if(response.status === 'connected'){
 console.log(response);
 
 testAPI();
}else{
  console.log(response);
}
}
function checkLoginState() {
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
}
function testAPI() {
console.log('Welcome!  Fetching your information.... ');

FB.api('/me', function(response) {
console.log(response.id);

//var im = document.getElementById("profileImage").setAttribute("src", "http://graph.facebook.com/" + response.id.toString() + "/picture?type=normal")
});
}


</script>
-->

<style>


</style>