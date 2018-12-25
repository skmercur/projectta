<template>
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap>


<v-flex v-for="i in 3" :key="`4${i}`" xs4 >
        <v-card dark color="primary" >
          <v-card-text class="px-0 elevation-9" >
              <v-hover>
    <v-card
      slot-scope="{ hover }"
      class="mx-auto"
      color="grey lighten-4"
      max-width="600"
    >
      <v-img
        :aspect-ratio="16/9"
        src="https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/48063013_2218436498482930_5721445747409289216_n.jpg?_nc_cat=102&_nc_ht=scontent-cdt1-1.xx&oh=df60a4dfb8c5d6322b85aa56df416bfc&oe=5C90C4D3"
      >
        <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal display-3 white--text"
            style="height: 100%;"
          >
            $14.99
          </div>
        </v-expand-transition>
      </v-img>
      <v-card-text
        class="pt-4"
        style="position: relative;"
      >







<v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">

        <v-btn
        slot="activator"
          absolute
          color="orange"
          class="white--text"
          fab
          large
          right
          top
        >
          <v-icon>mdi-cart</v-icon>
        </v-btn>





        <v-card>
          <v-toolbar dark color="primary">
          <v-btn icon dark @click="dialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Settings</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="dialog = false">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
          <v-flex xs12>
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

        

        <v-btn color="red" flat>Cancel</v-btn>
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
    :rules="phoneRule"
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
          @click="checkBeforeSubmit"
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
          </v-flex>
      </v-card>
    </v-dialog>
  










        <div class="font-weight-light grey--text title mb-2">For the perfect meal</div>
        <h3 class="display-1 font-weight-light orange--text mb-2">QW cooking utensils</h3>
        <div class="font-weight-light title mb-2">
          Our Vintage kitchen utensils delight any chef.<br>
          Made of bamboo by hand
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>
      </v-flex>

       </v-layout>
  </v-container>
</template>

<script>

  export default {
    
    data () {
      return {
         dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
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
      ],
      phoneRule:[
          v => !!v || 'Numero de telephone est requie',
           v => ((parseInt(v,10) <= 799999999) && (parseInt(v,10) >= 21000000)) || 'Numero de telephone invalide'
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
    },checkBeforeSubmit(){
        if((this.fbUserData.name !== '') &&(this.fbUserData.email !== '') &&(this.fbUserData.adresse!== '') && (this.fbUserData.phone !== '')) {
 axios.post('/nc', {  

         data:this.fbUserData,
        
       })
                .then(function (response) {
              console.log(response);
                
                  
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });
              this.e1++;
        }else{

        }
    
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
.v-card--reveal {
  align-items: center;
  bottom: 0;
  justify-content: center;
  opacity: .5;
  position: absolute;
  width: 100%;
}
</style>