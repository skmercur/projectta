

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
              <v-list-tile-content class="align-end  text-truncate black--text font-weight-thin caption">{{ props.item.summery }}</v-list-tile-content>
            </v-list-tile>
            
          </v-list>
        </v-card>
      </v-flex>
    </v-data-iterator>
  </v-container>
         <checkout v-if="step == 2" :achat="itemsInCart" :prix="prixTotal"></checkout>
          </v-flex>
          
           <v-footer v-if="step == 1">
             <v-card-text>
        <h4 class="text-xs-right">Total a payé : {{prixTotal}} DA</h4>
             </v-card-text>
      </v-footer>
      </v-card>

     
    </v-dialog>
            


 <v-dialog v-model="dialog3" fullscreen hide-overlay transition="dialog-bottom-transition">
      
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="dialog3 = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>{{name}}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="dialog3 = false">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
      
         <v-carousel>
    <v-carousel-item
      v-for="(item,i) in images.split(',')"
      :key="i"
      :src="'http://localhost/'+item" v-if="item !== ''"
    ></v-carousel-item>
  </v-carousel>
  
  <v-layout xs12>
<v-flex >
<h3>{{name}}</h3>
<v-divider></v-divider>
<h4>{{summery}}</h4>
<v-divider></v-divider>
<h4>Prix {{prix - ((prix*remise)/100)}} DA</h4>
</v-flex>
  </v-layout>
      </v-card>
    </v-dialog>

<!-- end dialog -->

<v-layout row wrap>
<v-flex   xs12 sm12 lg12>
<v-card >
  
 <div class="text-xs-center" v-for="item in Cats" :key="item">
  
          <v-chip @click="getMeThisOneItems(item)">{{item}}</v-chip>
   
        </div>
        
</v-card>
</v-flex>
  </v-layout>
    <v-layout row wrap>


<v-flex xs11  lg4 >
       <!-- <v-card dark color="primary" >
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
          
          right
          top
        >
          <v-icon>mdi-cart</v-icon>
        </v-btn>




        <div class=" font-weight-light grey--text caption mb-2  text-truncate"><v-chip color="orange" text-color="white">
      Le produit le plus vendu 
      <v-icon right>star</v-icon>
    </v-chip></div>
        <h3 class="title font-weight-light orange--text mb-2  text-truncate">{{dataSiteObj[0].most_selled.name_product}}</h3>
        <div class="mb-2 text-truncate black--text font-weight-thin subheading  text-truncate">
          {{dataSiteObj[0].most_selled.summery}} 
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>

        -->
<v-card elevation-20>
     <v-img
      :aspect-ratio="16/9"
        :src="'http://localhost/' +dataSiteObj[0].most_selled.images.substring(0,dataSiteObj[0].most_selled.images.indexOf(','))" ></v-img>
      <div class="card-body">
        <h4 class="card-title text-truncate" @click="showMeThisOne(dataSiteObj[0].most_selled)">{{dataSiteObj[0].most_selled.name_product}}</h4>
        <div class="card-text">  {{dataSiteObj[0].most_selled.prix}} DA</div>
       <div class=" font-weight-light grey--text caption mb-2  text-truncate"><v-chip color="orange" text-color="white">
      Le produit le plus vendu 
      <v-icon right>star</v-icon>
    </v-chip></div>
    
        <div class="row justify-content-end">
          <div class="col-md-4 col-lg-4 col-xs-4">
          <button class="btn btn-primary btn-block"  @click="addToCart(dataSiteObj[0].most_selled)"><i class="material-icons">
add_shopping_cart
</i></button>
          </div>
        </div>
      </div>
    </v-card>

      </v-flex>


<v-flex  xs11  lg4 >

<v-card elevation-20>
     <v-img
      :aspect-ratio="16/9"
        :src="'http://localhost/' +dataSiteObj[0].most_viewed.images.substring(0,dataSiteObj[0].most_viewed.images.indexOf(','))" ></v-img>
      <div class="card-body">
        <h4 class="card-title text-truncate" @click="showMeThisOne(dataSiteObj[0].most_viewed)">{{dataSiteObj[0].most_viewed.name_product}}</h4>
        <div class="card-text">  {{dataSiteObj[0].most_viewed.prix}} DA</div>
        <div class="font-weight-light grey--text caption mb-2 text-truncate"><v-chip color="green" text-color="white">
      Le produit le plus vu
      <v-icon right>remove_red_eye</v-icon>
    </v-chip></div>
    
        <div class="row justify-content-end">
          <div class="col-md-4 col-lg-4 col-xs-4">
          <button class="btn btn-primary btn-block"  @click="addToCart(dataSiteObj[0].most_viewed)"><i class="material-icons">
add_shopping_cart
</i></button>
          </div>
        </div>
      </div>
    </v-card>



      <!--  <v-card dark color="primary" >
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
        
          right
          top
        >
          <v-icon>mdi-cart</v-icon>
        </v-btn>




        <div class="font-weight-light grey--text caption mb-2 text-truncate"><v-chip color="green" text-color="white">
      Le produit le plus vu
      <v-icon right>remove_red_eye</v-icon>
    </v-chip></div>
        <h3 class="title font-weight-light orange--text mb-2 text-truncate">{{dataSiteObj[0].most_viewed.name_product}}</h3>
        <div class="mb-2 text-truncate black--text font-weight-thin subheading">
          {{dataSiteObj[0].most_viewed.summery}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card> -->
      </v-flex>
<v-flex xs11  lg4 >



    <v-card elevation-20>
     <v-img
      :aspect-ratio="16/9"
        :src="'http://localhost/' +dataSiteObj[0].most_recent.images.substring(0,dataSiteObj[0].most_recent.images.indexOf(','))" ></v-img>
      <div class="card-body">
        <h4 class="card-title text-truncate" @click="showMeThisOne(dataSiteObj[0].most_recent)">{{dataSiteObj[0].most_recent.name_product}}</h4>
        <div class="card-text">  {{dataSiteObj[0].most_recent.prix}} DA</div>
        <div class="font-weight-light grey--text caption mb-2  text-truncate"><v-chip color="red" text-color="white">
      Le produit le plus recent
      <v-icon right>access_time</v-icon>
    </v-chip></div>
    
        <div class="row justify-content-end">
          <div class="col-md-4 col-lg-4 col-xs-4">
          <button class="btn btn-primary btn-block"  @click="addToCart(dataSiteObj[0].most_recent)"><i class="material-icons">
add_shopping_cart
</i></button>
          </div>
        </div>
      </div>
    </v-card>




  <!--
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
        
          right
          top
        >
          <v-icon>mdi-cart</v-icon>
        </v-btn>




        <div class="font-weight-light grey--text caption mb-2  text-truncate"><v-chip color="red" text-color="white">
      Le produit le plus recent
      <v-icon right>access_time</v-icon>
    </v-chip></div>
        <h3 class="title font-weight-light orange--text mb-2 text-truncate">{{dataSiteObj[0].most_recent.name_product}}</h3>
        <div class="mb-2 text-truncate black--text font-weight-thin subheading  text-truncate">
          {{dataSiteObj[0].most_recent.summery}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>
        -->
      </v-flex>
       </v-layout>
       
       <v-card class="pa-3 mt-2">
         <v-container >
           
  <v-toolbar dark elevation-10 v-if="selectedCat != ''">
  
    <v-toolbar-title>{{selectedCat}}</v-toolbar-title>
    

    <v-spacer></v-spacer>

  
  </v-toolbar>


<v-container grid-list-md text-xs-center>
    <v-layout row wrap>


<v-flex v-for="produit in Items" :key="produit" xs11  lg4 >


<!--
 Dialog detailles 

-->

    <v-card elevation-20>
     <v-img
        :aspect-ratio="16/9"  :src="'http://localhost/' +produit.images.substring(0,produit.images.indexOf(','))" ></v-img>
      <div class="card-body">
        <h4 class="card-title text-truncate" @click="showMeThisOne(produit)">{{produit.name_product}}</h4>
        <div class="card-text"> {{produit.prix}} DA</div>
          <div class="font-weight-light grey--text caption mb-2 " v-if="produit.remise > 0"><v-chip color="green" text-color="white">
      - {{produit.remise}} %
     
    </v-chip></div>
    <v-divider v-if="produit.remise == 0"></v-divider>
        <div class="row justify-content-end">
          <div class="col-md-4 col-lg-4 col-xs-4">
          <button class="btn btn-primary btn-block" @click="addToCart(produit)"><i class="material-icons">
add_shopping_cart
</i></button>
          </div>
        </div>
      </div>
    </v-card>

<!--


      <v-card dark color="primary"  >
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
          
          right
          top
        >
          <v-icon>mdi-cart</v-icon>
        </v-btn>





        <div class="font-weight-light grey--text caption mb-2 " v-if="produit.product.remise > 0"><v-chip color="green" text-color="white">
      - {{produit.product.remise}} %
     
    </v-chip></div>
        <v-divider v-elseif="produit.product.remise == 0"></v-divider>
    
        <h3 class="title font-weight-light orange--text mb-2 text-truncate" @click="showMeThisOne(produit)">{{produit.product.name_product}}</h3>
        <div class="mb-2 text-truncate black--text font-weight-thin subheading"   @click="showMeThisOne(produit)">

         {{produit.product.summery}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
          </v-card-text>
        </v-card>
      -->
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
        dialog3:false,
        name:'',
        summery:'',
        prix:0,
        remise:0,
        images:'',
        Cats:[],
        Items:[],
        selectedCat:'',
        
      }
    },
    mounted(){
    axios.post('/getCatsConfirmed',{}).then(response => this.Cats = response.data).catch(function (error) {
                  alert(error.response.data.message);
                 
                });
      
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

    },showMeThisOne(v){
      this.images = v.product.images;
      this.name =  v.product.name_product;
      this.prix =  v.product.prix;
      this.summery =  v.product.summery;
      this.remise =  v.product.remise;
      this.dialog3 = true; 

 axios.post('/addViews', {  

         name:this.name,
        
       })
                .then(function (response) {
              console.log(response);
                
                  
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });



    },getMeThisOneItems(v){
      console.log(v);
      this.selectedCat = v;
      axios.post('/getItemsForCat',{
        cat:v
      }).then(response => this.Items = response.data).catch(function (error) {
                  alert(error.response.data.message);
                 
                });
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