<template>
   
 <v-btn  dark fab fixed bottom right color="green" v-if="show" @click="toggleForm">
    
    <v-icon>cloud_upload</v-icon>
  
  </v-btn>
  
  <v-stepper v-model="e6" vertical v-else>

    <v-stepper-step :complete="e6 > 1" step="1">
      Description of the product
      <small>Name and desciption</small>
    </v-stepper-step>

    <v-stepper-content step="1">
      <v-card color="lighten-1" class="mb-5">
<v-text-field
    
      v-model="name"
      :counter="25"
      label="Name"
      data-vv-name="name"
      required
    ></v-text-field>
       <v-flex xs6>
    <v-textarea
          solo
          v-model="summery"
          name="input-7-4"
          label="Solo textarea"
          value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through."
        ></v-textarea>
         </v-flex>
         
        <v-flex xs12 sm6 d-flex>
        <select v-if="showAddCat"
        v-model="cat"  >
         <option value="">Select the categories</option>
        <option v-for="item in items" :key="item">
          {{item}}
        </option>
        </select>
        <div v-else>
        <v-text-field
    
      v-model="inputText"
      :counter="25"
      label="type de name of the category"
      
      required
    ></v-text-field>
     <v-btn color="Green" @click="addCat"><v-icon>done</v-icon></v-btn>
     </div>
         <v-btn color="Green" @click="toggleAddCat"><v-icon>playlist_add</v-icon></v-btn>
          
      </v-flex>
        
          <br>
      </v-card>
      <v-btn color="blue" @click="nextStep">Continue</v-btn>
      <v-btn flat @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 2" step="2">Details about the prices and the stock quantity</v-stepper-step>

    <v-stepper-content step="2">
      <v-card color=" lighten-1" class="mb-5">
  <v-flex xs12 sm6 d-flex>
   <v-text-field
            type="number"
            v-model="price"
            placeholder="the price"
         append-icon="euro_symbol"
         required
          ></v-text-field>
          <v-text-field
          v-model="reduction"
          class="ml-5"
            type="number"
            placeholder="reduction"
         required
          ></v-text-field>
         
</v-flex>
<br>
 <v-flex xs12 sm6 d-flex>
   <v-text-field
            type="number"
            v-model="quantity"
            placeholder="Quantity"
         append-icon="store_mall_directory"
         required
          ></v-text-field>
         
         
</v-flex>
<v-flex>
<v-switch
color="green"
      :label="`View first `"
      v-model="viewFirstProduct"
      required
    ></v-switch>
</v-flex>
      </v-card>
      <v-btn color="blue" @click="nextStep">Continue</v-btn>
      <v-btn flat  @click.native="goBackStep">Back</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 3" step="3">Picturs of the product</v-stepper-step>

    <v-stepper-content step="3">
      <v-card color=" lighten-1" class="mb-5" >
        <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center">
				
      
              
           
             <label>Preview of the last seleted image</label>
           
          <img :src="image" class="img-responsive">
              
           
				</v-flex>
         <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center" v-for="index in showLotOfInputs" :key="index">
				
      
                <img :src="images[index-1]" class="img-responsive">
           
                <input type="file" name="image" v-on:change="onFileChange" class="form-control">
           
          
                <v-btn color="blue" @click="addProduct">Upload</v-btn>
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
      {{ text }}
      <v-btn
        color="pink"
        flat
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </v-snackbar>
				</v-flex>
      </v-card>
      <v-btn color="blue" @click="nextStep">Continue</v-btn>
      <v-btn flat  @click="goBackStep">Back</v-btn>
    </v-stepper-content>

    <v-stepper-step step="4">Preview before publishing</v-stepper-step>
    <v-stepper-content step="4">
      <v-card color=" lighten-1" class="mb-5" >
    
      <v-layout>
    <v-flex xs12 sm6 offset-sm3>
      <v-card>
        <v-container grid-list-sm fluid>
          <v-layout row wrap>
            <v-flex
              v-for="n in lengthImageArray"
              :key="n"
              xs4
              d-flex
            >
              <v-card flat tile class="d-flex">
                <v-img
                  :src="images[n]"
                  :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                  aspect-ratio="1"
                  class="grey lighten-2"
                >
                  <v-layout
                    slot="placeholder"
                    fill-height
                    align-center
                    justify-center
                    ma-0
                  >
                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                  </v-layout>
                </v-img>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
    </v-flex>
  </v-layout>
 <v-container fluid grid-list-md>
    <v-data-iterator
      :items="items"
      
      content-tag="v-layout"
      row
      wrap
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
          <v-card-title><h4>preview</h4></v-card-title>
          <v-divider></v-divider>
          <v-list dense>
            <v-list-tile>
              <v-list-tile-content>Name:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{name}}</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Summery:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{summery}}</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Category:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{cat}}</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Price:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{price}} DZD</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Reduction:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{reduction}} %</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Quantity:</v-list-tile-content>
              <v-list-tile-content class="align-end">{{quantity}}</v-list-tile-content>
            </v-list-tile>
            <v-list-tile>
              <v-list-tile-content>Promote:</v-list-tile-content>
              <v-list-tile-content class="align-end" v-if="viewFirstProduct">Yes</v-list-tile-content>
              <v-list-tile-content class="align-end" v-else>No</v-list-tile-content>
            </v-list-tile>
          </v-list>
        </v-card>
      </v-flex>
    </v-data-iterator>
  </v-container>
 
      </v-card>
      <v-btn color="green" @click="confirmUpload">

Confirme
      </v-btn>
      <v-btn flat  @click="goBackStep">Back</v-btn>
    </v-stepper-content>
  
  </v-stepper>
</template>
<script>
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import colors from 'vuetify/es5/util/colors'
Vue.use(Vuetify,{
   theme: {
    primary: colors.red.darken1, // #E53935
    secondary: colors.red.lighten4, // #FFCDD2
    accent: colors.indigo.base // #3F51B5
  }
});
  export default {
     
    data () {
      return {
        show:true,
        showBtnStep1 : false,
        reduction : 0,
        summery:'',
        showAddCat : true,
         viewFirstProduct: false,
        price:0,
        showLotOfInputs : 5,
        image:'',
        images:[],
        quantity :0,
        inputText : "",
          snackbar: false,
        y: 'top',
        x: null,
        mode: '',
        timeout: 6000,
        text: 'Uploading image',
        e6: 0,
        cat:'',
          e1: 'Florida',
         name: '',
      email: '',
      isEditing: false,
        model: null,
       items: [],
       code : null,
      checkbox: null,
     lengthImageArray : 0,
      dictionary: {
        attributes: {
          email: 'E-mail Address'
          // custom attributes
        },
        custom: {
          name: {
            required: () => 'Name can not be empty',
            max: 'The name field may not be greater than 10 characters'
            // custom messages
          },
          select: {
            required: 'Select field is required'
          }
        }
      }
      
  }
    },methods:{
      toggleForm : function() {
        this.show = !this.show;
     
      },
       toggleAddCat : function() {
        this.showAddCat = !this.showAddCat;
        
      },
      addCat(){
      
  axios.post('/addCat', {
                   name:this.inputText,
                 
                })
                .then(function (response) {
              console.dir(response)
                 
                  
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                });
      },getCat(){
          var k = [];
        axios.post('/getCat', {
                   name:this.inputText,
                 
                })
                .then(function (response) {
                  response.data.categories.forEach(element => {
                  k.push(element.name_categorie);
                  });
            
              
                 
                })
                .catch(function (error) {
                 console.log(error);
                });
                 this.items = k;
      }, onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                    this.images.push(this.image);

                };
                reader.readAsDataURL(file);
                console.log(this.images);
                this.lengthImageArray = this.images.length;
            },
    addProduct(){
       
       
var k = false;
            this.snackbar = true;
        var j = null;
      axios.post('/addProduct', {

                   length:length,
                   image:this.image,
                   reduction:this.reduction,
                   name:this.name,
                   cat:this.cat,
                   price:this.price,
                   summery:this.summery,
                   showFirst:this.viewFirstProduct,
                   quantity:this.quantity,


                 
                })
                .then(function (response) {
              console.log(response);
                 k = true;
                  j = response.code;
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                  k = false;
                });
              this.code = j;
    }, confirmUpload(){
       axios.post('/ConfirmProduct', {  

         name:this.name,
        
       })
                .then(function (response) {
              console.log(response);
                
                  
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                 
                });
    },
    nextStep(){
      if((this.name.length > 0) &&(this.summery.length>0) ){
this.e6++;
      }
      
    },
    goBackStep(){
      this.e6--;
    }
    }, mounted(){
      this.getCat();
    }
  }
  
</script>

<style scoped>
 img{
        max-height: 36px;
    }
</style>