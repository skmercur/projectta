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
        v-model="cat" >
        <option v-for="item in items" :key="item">
          {{item}}
        </option>
        </select>
        <div v-else>
        <v-text-field
    
      v-model="inputText"
      :counter="25"
      label="type de name of the category"
      data-vv-name="inputText"
      required
    ></v-text-field>
     <v-btn color="Green" @click="addCat"><v-icon>done</v-icon></v-btn>
     </div>
         <v-btn color="Green" @click="toggleAddCat"><v-icon>playlist_add</v-icon></v-btn>
          
      </v-flex>
        
          <br>
      </v-card>
      <v-btn color="blue" @click="e6 = 2">Continue</v-btn>
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
          ></v-text-field>
          <v-text-field
          v-model="reduction"
          class="ml-5"
            type="number"
            placeholder="reduction"
         
          ></v-text-field>
         
</v-flex>
<br>
 <v-flex xs12 sm6 d-flex>
   <v-text-field
            type="number"
            v-model="quantity"
            placeholder="Quantity"
         append-icon="store_mall_directory"
          ></v-text-field>
         
         
</v-flex>
<v-flex>
<v-switch
color="green"
      :label="`View first `"
      v-model="viewFirstProduct"
    ></v-switch>
</v-flex>
      </v-card>
      <v-btn color="blue" @click="e6 = 3">Continue</v-btn>
      <v-btn flat  @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 3" step="3">Picturs of the product</v-stepper-step>

    <v-stepper-content step="3">
      <v-card color=" lighten-1" class="mb-5" >
        <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center">
				 <div class="img-wrapper">
           <v-btn color="gray" @click="uploadImage"><v-icon>cloud_upload</v-icon></v-btn>
            <div class="img-container" v-for="(file, index) in files" :key="index">
             
              <img :src="file.url" @click="uploadImage" />
             
            </div>
          </div>
            <input type="file" multiple accpet="" ref="uploadFileReference" @change="uploadFileReference" />
				</v-flex>
      </v-card>
      <v-btn color="blue" @click="e6 = 4">Continue</v-btn>
      <v-btn flat  @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step step="4">View setup instructions</v-stepper-step>
    <v-stepper-content step="4">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="green" @click="addProduct">Continue</v-btn>
      <v-btn flat  @click="toggleForm">Cancel</v-btn>
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
        reduction : 0,
        summery:'',
        showAddCat : true,
         viewFirstProduct: false,
        price:0,
        quantity :0,
        inputText : "",
        e6: 0,
        cat:'',
          e1: 'Florida',
         name: '',
      email: '',
      isEditing: false,
        model: null,
       items: [],
      checkbox: null,
      files: [
        {
          id: 1,
          url:
            "https://utmsi.utexas.edu/components/com_easyblog/themes/wireframe/images/placeholder-image.png"
        }
      ],
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
      }, uploadImage() {
      this.$refs.uploadFileReference.click();
    },
    uploadFileReference(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.length = files.length;

      this.showImage(files);
    },
    showImage(files) {
      // if (files.length > 1) {
      this.files = [];
      /** Solution provided by Chem **/
      const test = Array.from(files).forEach((file, idx) => {
        const fileReader = new FileReader();
        const getResult = new Promise(resolve => {
          fileReader.onload = e => {
            this.files.push({
              id: idx,
              url: e.target.result
            });
          };
        });

        fileReader.readAsDataURL(file);
        return getResult.then(file => {
        
          return file;
        });
      });
      
    },
    addProduct(){
      axios.post('/addProduct', {
                   files:this.files,
                   reduction:this.reduction,
                   name:this.name,
                   cat:this.cat,
                   price:this.price,
                   summery:this.summery,
                   showFirst:this.viewFirstProduct,
                   quantity:this.quantity,


                 
                })
                .then(function (response) {
              console.dir(response)
                 
                  
                })
                .catch(function (error) {
                  alert(error.response.data.message);
                });
    }
    }, mounted(){
      this.getCat();
    }
  }
  
</script>

<style scoped>
input[type="file"] {
  display: none;
}
.img-wrapper {
  display: flex;
  flex: 1 0 100%;
  flex-direction: row;
  align-items: center;
}
.img-container {
  width: 10rem;
  height: 15rem;
}
img {
  max-width: 100%;
}
</style>