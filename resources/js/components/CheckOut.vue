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
          color="grey lighten-1"
          height="200px"
         
        >
<v-container align-center justify-center>
        <v-layout  row  align-center class="ma-2">
            <v-flex d-flex class="ma-1">
                <h3 >Veuillez vous connecter avec facebook</h3>
               
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
            <v-layout xs12>

<v-flex class="ma-3 pa-2">
<v-img transition max-height="100" max-width="100" :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`" :src="`http://graph.facebook.com/${fbUserData.id}/picture?type=normal`" > </v-img>
        <v-text-field :value="'Bienvenu ' +fbUserData.name" readonly></v-text-field>
</v-flex>
<v-divider></v-divider>
            </v-layout>
            <v-layout xs12>
              <v-flex d-flex>
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
  
         
      <v-text-field
       label="Methode de livraison"
      v-model="methodeChoosen"
  readonly
      required
    ></v-text-field>
     <v-switch
     color="green"
          @click="toggleMethod()"
      
    ></v-switch>


  </v-form>
              </v-flex>
           
              
            
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
        >

<!-- Dialog Reservation -->
<div class="text-xs-center">
    <v-dialog
      v-model="dialog1"
      width="500"
    >
     

      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
         Reglement de la reservation des produits
        </v-card-title>

        <v-card-text>
            Tout les produit que vous reserver vous seron resérvé pour une durée de 72H si vous n'effectuez pas de payment dans cette durée la réservation sera automatiquement annulé
          </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            flat
            @click="dialog1 = false; dialog2 = true"
          >
            J'accepte
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>

<!-- end dialog-->

<!-- Dialog information -->
<div class="text-xs-center">
    <v-dialog
      v-model="dialog2"
      width="500"
    >
     

      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
        Information 
        </v-card-title>

        <v-card-text>
           Vous pouvez a tout moment continuer votre achat en cliquent sur <b>se connecté</b> dans la page d'acceuille 
               </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            flat
            @click="bookProducts()"
          >
            Ok
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>

<!-- -->

        <v-layout wrap row>
          <h1>CCP number </h1>
<v-flex xs12>
 <v-btn class="ma-2" @click="dialog1 = true">je reserve le produit</v-btn>
</v-flex>

<h5>Total a payer avec livraison  {{userPayTotal}} </h5>
        </v-layout>
        </v-card>

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
     props:{
achat:Array,
prix:Number,
     },
    data () {
      return {
           dialog: false,
            dialog1: false,
            dialog2:false,
            userDistance:0,
            userPayTotal:0,

             delivryMehods: ['EMS', 'taxi'],
        e1: 0,
        methodeChoosen:'EMS',
      
         fbSignInParams: {
        scope: 'email,public_profile',
        return_scopes: true,
        
        
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
     console.log(this.prix);
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
                .then(response => this.userDistance = response.data)
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });
              this.e1++;
if(this.e1 == 3){
  axios.post('/getDistance', {  

         id:this.fbUserData.id,

        
       })
               .then(response => this.userDistance = response.data)
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });

if(this.userDistance < 30000){
this.userPayTotal = this.prix + 800;
  }


}


        }else{
//TODO dont forget to remove this one


        }
    
    },
    bookProducts(){
      axios.post('/book', {  

         data:this.achat,
         id:this.fbUserData.id,
         delivery:this.methodeChoosen,
         prix:this.userPayTotal,       
       })
                .then(function (response) {
              console.log(response);
              
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });
                this.dialog2 = false;
             window.location = "/login";
    },toggleMethod(){
      if(this.methodeChoosen == 'EMS'){
        this.methodeChoosen = 'taxi';
      }else{
         this.methodeChoosen = 'EMS';
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


</style>