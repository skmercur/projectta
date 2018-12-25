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
         <checkout></checkout>
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
       <v-card class="pa-3 mt-2">
         <v-container v-for="n in 5" :key="n">
           
  <v-toolbar elevation-5>
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn flat>Link One</v-btn>
      <v-btn flat>Link Two</v-btn>
      <v-btn flat>Link Three</v-btn>
    </v-toolbar-items>
  </v-toolbar>


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
         <checkout></checkout>
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


          

  </v-container>
   </v-card>
  </v-container>

</template>

<script>
import checkout from './CheckOut';
  export default {
    
    data () {
      return {
         dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
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