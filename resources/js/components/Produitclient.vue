

<template>
<v-container class="mb-3">

       <v-layout row wrap class="mb-2">
<v-flex   xs12 sm12 lg12>
<v-card >
  

<v-spacer></v-spacer>
<v-tabs
      v-model="active"
     color="#42A5F5"
      dark
      slider-color="yellow"
    >
      <v-tab
        v-for="item in Cats" :key="item" @click="getMeThisOneItems(item)"
        ripple
 v-scroll-to="'.element'"
      >
     {{item}}

      </v-tab>
</v-tabs>

        
</v-card>
</v-flex>
  </v-layout>
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
          
          <v-toolbar  color="#42A5F5"  dark>
          <v-btn icon dark @click="dialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Votre pannier</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
          
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
          <div id="fb-root"></div>
<div class="fb-customerchat"
  attribution=install_email
  page_id="1852067245119859"
  logged_in_greeting="Pour continuer votre achat cliquer ici"
  logged_out_greeting="Pour continuer votre achat cliquer ici">
</div>
           <v-footer v-if="step == 1">
             <v-card-text>
        <h4 class="text-xs-right">Total a payé : {{prixTotal}} DA <small> Sans les frais de livraison</small></h4>
             </v-card-text>
      </v-footer>
      </v-card>

     
    </v-dialog>
            


 <v-dialog v-model="dialog3" fullscreen hide-overlay transition="dialog-bottom-transition">
      
      <v-card>
          <v-snackbar
      v-model="snackbar"
      :bottom="y === 'bottom'"
      :left="x === 'left'"
      :multi-line="mode === 'multi-line'"
      :right="x === 'right'"
      :timeout="timeout"
      :top="y === 'top'"
      :vertical="mode === 'vertical'"
    >
     Copied 
      <v-btn
        color="pink"
        flat
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </v-snackbar>
 
       
      <v-btn
   
       
       
        dark
     fab
     bottom
     right
     fixed
     @click="copyThis()"
      >
       <v-icon>share</v-icon>
      </v-btn>
        <v-toolbar dark color="#42A5F5">
          <v-btn icon dark @click="dialog3 = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>{{name}}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
         
          </v-toolbar-items>
        </v-toolbar>
      
         <v-carousel>
    <v-carousel-item
      v-for="(item,i) in images.split(',').filter(function(e){ return e === 0 || e })"
      :key="i"
      
    >
    <div class="blabla" :style="'background-image:url('+item+');'"></div>
     <v-img 
     class="image" 
      :src="item" contain :aspect-ratio="2"></v-img>
 
    </v-carousel-item>
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
<v-card class="elevation-20">
     <v-img
      :aspect-ratio="16/9"
        @click="showMeThisOne(dataSiteObj[0].most_selled)"  :src="'https://www.taherboutique.com/' +dataSiteObj[0].most_selled.images.substring(0,dataSiteObj[0].most_selled.images.indexOf(',')).substring(0,dataSiteObj[0].most_selled.images.substring(0,dataSiteObj[0].most_selled.images.indexOf(',')).length-4)+'_r.jpg'" ></v-img>
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

<v-card class="elevation-20">
     <v-img
      :aspect-ratio="16/9"
     @click="showMeThisOne(dataSiteObj[0].most_viewed)"   :src="'https://www.taherboutique.com/' +dataSiteObj[0].most_viewed.images.substring(0,dataSiteObj[0].most_viewed.images.indexOf(',')).substring(0,dataSiteObj[0].most_viewed.images.substring(0,dataSiteObj[0].most_viewed.images.indexOf(',')).length-4)+'_r.jpg'"  ></v-img>
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



    <v-card class="elevation-20">
     <v-img
      :aspect-ratio="16/9"
        @click="showMeThisOne(dataSiteObj[0].most_recent)" :src="'https://www.taherboutique.com/' +dataSiteObj[0].most_recent.images.substring(0,dataSiteObj[0].most_recent.images.indexOf(',')).substring(0,dataSiteObj[0].most_recent.images.substring(0,dataSiteObj[0].most_recent.images.indexOf(',')).length-4)+'_r.jpg'" ></v-img>
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



      
       <v-card class="pa-3 mt-2" v-if="selectedCat != ''">
         <v-container >
           
  <v-toolbar dark color="#42A5F5" elevation-10 >
  
    <v-toolbar-title>{{selectedCat}}</v-toolbar-title>
    

    <v-spacer></v-spacer>

  
  </v-toolbar>


<v-container grid-list-md text-xs-center  class="element">
    <v-layout row wrap>


<v-flex v-for="produit in Items" :key="produit" xs11  lg4 >


<!--
 Dialog detailles 

-->

    <v-card class="elevation-20">
     <v-img
       @click="showMeThisOne(produit)"  :aspect-ratio="16/9"  :src="'https://www.taherboutique.com/' +produit.images.substring(0,produit.images.indexOf(',')).substring(0,produit.images.substring(0,produit.images.indexOf(',')).length-4)+'_r.jpg'" ></v-img>
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



  export default {
    components:{
      checkout:()=>import('./CheckOut')
    },
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
        code:'',
        Cats:[],
        Items:[],
        selectedCat:'',
         snackbar:false,
    y: 'top',
        x: null,
        mode: '',
        timeout: 6000,
         value:'',
        
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
         
         
        }
    
      })
    },
    onSignInError (error) {
    
    },checkBeforeSubmit(){
        if((this.fbUserData.name !== '') &&(this.fbUserData.email !== '') &&(this.fbUserData.adresse!== '') && (this.fbUserData.phone !== '')) {
 axios.post('/nc', {  

         data:this.fbUserData,
        
       })
                .then(function (response) {
             
             
                
                  
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
    
    
      this.imageProduct.push("https://www.taherboutique.com/"+halflink);

    },addToCart(v){
      this.itemsInCart.push(v);
      this.nbrItems++;
       
    
    
     this.TotalPrix();
    },
    TotalPrix(){
      var temp = 0;
this.itemsInCart.forEach(function(element){
  
temp += element.prix;
  

});


this.prixTotal = temp;

    },showMeThisOne(v){
      this.images = v.images;
      this.name =  v.name_product;
      this.prix =  v.prix;
      this.summery =  v.summery;
      this.remise =  v.remise;
      this.dialog3 = true; 
      this.code = v.code;

 axios.post('/addViews', {  

         name:this.name,
        
       })
                .then(function (response) {
            
            
                
                  
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });



    },getMeThisOneItems(v){
    
    
      this.selectedCat = v;
      axios.post('/getItemsForCat',{
        cat:v
      }).then(response => this.Items = response.data).catch(function (error) {
                  alert(error.response.data.message);
                 
                });
    }, copyThis(){
            this.value = 'https://www.taherboutique.com/'+this.code;
           this.$clipboard(this.value);
           this.snackbar = true;
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
<style scoped>
#back{
background-repeat: repeat-x; 
-webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
  z-index: -1;
}
.blabla{
 
  position: absolute;
  top:0;left:0;right:0;bottom:0;
  width: 100%;
  height: 100%;
   background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center; 
filter: blur(7px);z-index:-1;
}
.image{
position: relative;
 left:0; right:0;
        top:0; bottom:0;
        margin:auto;
width: 90%;
height: 100%;
}
</style>
