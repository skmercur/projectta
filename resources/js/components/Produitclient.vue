

<template>
<v-container>
  
  <v-container grid-list-md text-xs-center>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
   <v-btn
     slot="activator"
              color="green"
              dark
              fixed
              bottom
              right
              fab
            >

          <v-icon v-if="nbrItems == 0">shopping_cart</v-icon> 
          <b v-else>{{nbrItems}}</b>
            </v-btn>

        <v-card>
          
          <v-toolbar dark color="primary">
          <v-btn icon dark @click="dialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Votre pannier</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="step = 2">Continuer</v-btn>
          </v-toolbar-items>
        </v-toolbar>
          <v-flex xs12>
            <v-container fluid grid-list-md>
    <v-data-iterator
      :items="itemsInCart"
      :rows-per-page-items="rowsPerPageItems"
      :pagination.sync="pagination"
      content-tag="v-layout"
      row
      wrap
      v-if="step == 1"
    >
      <v-flex
        slot="item"
        slot-scope="props"
        xs12
        sm6
        md4
        lg3
      >
        <v-card>
          <v-card-title><h4>{{ props.item.name_product}}</h4></v-card-title>
          <v-divider></v-divider>
          <v-list dense>
            <v-list-tile>
              <v-list-tile-content>Prix:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{ props.item.prix - (props.item.prix * props.item.remise)/100 }} DA</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Details:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{ props.item.summery }}</v-list-tile-content>
            </v-list-tile>
            
          </v-list>
        </v-card>
      </v-flex>
    </v-data-iterator>
  </v-container>
         <checkout v-if="step == 2" :achat="itemsInCart"></checkout>
          </v-flex>
          
           <v-footer v-if="step == 1">
             <v-card-text>
        <h4 class="text-xs-right">Total a payé : {{prixTotal}} DA</h4>
             </v-card-text>
      </v-footer>
      </v-card>

     
    </v-dialog>
            
    <v-layout row wrap>


<v-flex  xs4 >
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
        :src="'http://localhost/' +dataSiteObj[0].most_selled.images.substring(0,dataSiteObj[0].most_selled.images.indexOf(','))"
        >
        <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal display-3 white--text"
            style="height: 100%;"
          >
            {{dataSiteObj[0].most_selled.prix}}
          </div>
        </v-expand-transition>
      </v-img>
      <v-card-text
        class="pt-4"
        style="position: relative;"
      >

        <v-btn
      
       
          @click="addToCart(dataSiteObj[0].most_selled)"
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




        <div class="font-weight-light grey--text title mb-2"><v-chip color="orange" text-color="white">
      Le produit le plus vendu
      <v-icon right>star</v-icon>
    </v-chip></div>
        <h3 class="display-1 font-weight-light orange--text mb-2">{{dataSiteObj[0].most_selled.name_product}}</h3>
        <div class="font-weight-light title mb-2">
          {{dataSiteObj[0].most_selled.summery}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>
      </v-flex>


<v-flex  xs4 >
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
        :src="'http://localhost/' +dataSiteObj[0].most_viewed.images.substring(0,dataSiteObj[0].most_viewed.images.indexOf(','))"
        >
        <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal display-3 white--text"
            style="height: 100%;"
          >
            {{dataSiteObj[0].most_viewed.prix}}
          </div>
        </v-expand-transition>
      </v-img>
      <v-card-text
        class="pt-4"
        style="position: relative;"
      >

        <v-btn
      
       
          @click="addToCart(dataSiteObj[0].most_viewed)"
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




        <div class="font-weight-light grey--text title mb-2"><v-chip color="green" text-color="white">
      Le produit le plus vu
      <v-icon right>remove_red_eye</v-icon>
    </v-chip></div>
        <h3 class="display-1 font-weight-light orange--text mb-2">{{dataSiteObj[0].most_viewed.name_product}}</h3>
        <div class="font-weight-light title mb-2">
          {{dataSiteObj[0].most_viewed.summery}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>
      </v-flex>
<v-flex  xs4 >
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
        :src="'http://localhost/' +dataSiteObj[0].most_recent.images.substring(0,dataSiteObj[0].most_recent.images.indexOf(','))"
        >
        <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex transition-fast-in-fast-out orange darken-2 v-card--reveal display-3 white--text"
            style="height: 100%;"
          >
            {{dataSiteObj[0].most_recent.prix}}
          </div>
        </v-expand-transition>
      </v-img>
      <v-card-text
        class="pt-4"
        style="position: relative;"
      >

        <v-btn
      
       
          @click="addToCart(dataSiteObj[0].most_recent)"
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




        <div class="font-weight-light grey--text title mb-2"><v-chip color="red" text-color="white">
      Le produit le plus recent
      <v-icon right>access_time</v-icon>
    </v-chip></div>
        <h3 class="display-1 font-weight-light orange--text mb-2">{{dataSiteObj[0].most_recent.name_product}}</h3>
        <div class="font-weight-light title mb-2">
          {{dataSiteObj[0].most_recent.summery}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>
      </v-flex>
       </v-layout>
       <v-card class="pa-3 mt-2">
         <v-container v-for="n in dataSiteObj" :key="n">
           
  <v-toolbar dark elevation-10 v-if="n.produit">
  
    <v-toolbar-title>{{n.produit.length}} {{n.name}} </v-toolbar-title>
    

    <v-spacer></v-spacer>

  
  </v-toolbar>


<v-container grid-list-md text-xs-center>
    <v-layout row wrap>


<v-flex v-for="produit in n.produit" :key="produit" xs4 >
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
        
        :src="'http://localhost/' +produit.product.images.substring(0,produit.product.images.indexOf(','))"
      >
        <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex transition-fast-in-fast-out green darken-2 v-card--reveal display-3 white--text"
            style="height: 100%;"
          >
            {{produit.product.prix}}
          </div>
        </v-expand-transition>
      </v-img>
      <v-card-text
        class="pt-4"
        style="position: relative;"
      >









        <v-btn
       @click="addToCart(produit.product)"
      
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





        <div class="font-weight-light grey--text title " v-if="produit.product.remise > 0"><v-chip color="green" text-color="white">
      - {{produit.product.remise}} %
     
    </v-chip></div>
        <v-divider v-elseif="produit.product.remise == 0"></v-divider>
    
        <h3 class="display-1 font-weight-light orange--text mb-2">{{produit.product.name_product}}</h3>
        <div class="font-weight-light title mb-2" style="color:#000">
         {{produit.product.summery}}
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
</v-container>

</template>

<script>
import checkout from './CheckOut';
import navbarc from './Navbarclient';

  export default {
    props:{
datasite:String,
    },
    data () {
      return {
         dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
        dataSiteObj:JSON.parse(this.datasite),
        imageProduct:[],
        nbrItems:0,
        itemsInCart:[],
        step:1,
        quantityUser:[],
        prixTotal:0,
        
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
    
    },getImageLink(v){
      var key = v.indexOf(",");
      var halflink = v.substring(0,key);
      console.log(halflink);
      this.imageProduct.push("http://localhost/"+halflink);

    },addToCart(v){
      this.itemsInCart.push(v);
      this.nbrItems++;
       
      console.log(this.itemsInCart);
     this.TotalPrix();
    },
    TotalPrix(){
      var temp = 0;
this.itemsInCart.forEach(function(element){
  
temp += element.prix;
  

});
console.log(temp);
this.prixTotal = temp;

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