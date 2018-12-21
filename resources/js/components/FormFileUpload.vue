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
          name="input-7-4"
          label="Solo textarea"
          value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through."
        ></v-textarea>
         </v-flex>
         
        <v-flex xs12 sm6 d-flex>
        <select v-if="showAddCat"
        >
        <option v-for="item in items" :key="item">
          {{item}}
        </option>
        </select>
        <v-text-field
    v-else
      v-model="name"
      :counter="25"
      label="Name"
      data-vv-name="name"
      required
    ></v-text-field>
         <v-btn color="Green" @click="toggleAddCat"><v-icon>playlist_add</v-icon></v-btn>
      </v-flex>
        
          <br>
      </v-card>
      <v-btn color="blue" @click="e6 = 2">Continue</v-btn>
      <v-btn flat @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 2" step="2">Configure analytics for this app</v-stepper-step>

    <v-stepper-content step="2">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="e6 = 3">Continue</v-btn>
      <v-btn flat  @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 3" step="3">Select an ad format and name ad unit</v-stepper-step>

    <v-stepper-content step="3">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
      <v-btn flat  @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step step="4">View setup instructions</v-stepper-step>
    <v-stepper-content step="4">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="e6 = 1">Continue</v-btn>
      <v-btn flat  @click="toggleForm">Cancel</v-btn>
    </v-stepper-content>
  
  </v-stepper>
</template>
<script>
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)
  export default {
     
    data () {
      return {
        show:true,
        showAddCat : true,
        e6: 0,
          e1: 'Florida',
         name: '',
      email: '',
      isEditing: false,
        model: null,
       items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
      checkbox: null,
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
        
      }
    }
  }
  
</script>

