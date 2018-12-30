<template>

  <v-data-table
    :headers="headers"
    :items="products"
    class="elevation-1"
    prev-icon="mdi-menu-left"
    next-icon="mdi-menu-right"
    sort-icon="mdi-menu-down"
  >
    <template slot="items" slot-scope="props">
      <td>{{ props.item.name_categorie }}</td>
      <td class="text-xs-right"   >{{ props.item.id_product }}</td>
      <td class="text-xs-right">{{ props.item.name_product }}</td>
      <td class="text-xs-right">{{ props.item.prix }} DZD</td>
      <td class="text-xs-right">{{ props.item.quantity }}</td>
       <td class="text-xs-right">{{ props.item.remise }} %</td>
        <td class="text-xs-right" v-if="props.item.summery.length >10">{{  props.item.summery.substr(0,10)}}...</td>
        <td class="text-xs-right  " v-else>{{  props.item.summery}}</td>
         <td class="text-xs-right">{{ props.item.active }}</td>
      <td class="text-xs-right"><v-btn class="ma-1" @click="editProduct(props.item.id_product,props.item)" ><v-icon>edit</v-icon></v-btn><v-btn class="ma-1" @click="beginDelete(props.item.id_product)"><v-icon>delete</v-icon></v-btn></td>
      
  <v-layout row justify-center >
   <v-dialog
      v-model="dialog"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Irreversible action</v-card-title>

        <v-card-text>
        Are you sure you want to delete {{ props.item.name_product }}
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog = false"
          >
            Disagree
          </v-btn>

          <v-btn
            color="red darken-1"
            flat="flat"
            @click="deleteProduct(idToDelete)"
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</v-layout>

<!-- Update dialog -->

 <v-layout row justify-center >
   <v-dialog
      v-model="dialog2"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Update </v-card-title>

        <v-card-text>
        Are you sure you want to update {{ props.item.name_product }}
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="dialog2 = false"
          >
            Disagree
          </v-btn>

          <v-btn
            color="red darken-1"
            flat="flat"
            @click="updateProduct(idToUpdate)"
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</v-layout>
<!-- the seconde part dialog edit -->

<v-layout row justify-center>
    <v-dialog v-model="dialog1" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="dialog1 = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Settings</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="(dialog2 = true) && (dialog1=false)">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-list three-line subheader>
          <v-subheader>Edit </v-subheader>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>name</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="name" :label="props.item.name_product"  /></v-list-tile-sub-title>
              
             
           
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>price</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="price"  type="numeric" /></v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
            
            <v-list-tile avatar>
            <v-list-tile-content>
                  <v-list-tile-title>Quantity</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="quan"  type="numeric" /></v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
<v-list-tile avatar>
            <v-list-tile-content>
               <v-list-tile-title>Remise</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="remise"   type="numeric" /></v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
           <v-list-tile avatar>
            <v-list-tile-content>
               <v-list-tile-title>Active</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="active"   type="numeric" /></v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
           <v-divider></v-divider>
          <v-list-tile avatar>
            <v-list-tile-content>
              
              <v-list-tile-sub-title><v-textarea v-model="summery"   name="input-7-4"
          label="Click here to type your product details"   solo  ></v-textarea></v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
         
    <v-divider></v-divider>
  <v-list-tile avatar>
            <v-list-tile-content>
                  <v-list-tile-title>Categories</v-list-tile-title>
             <v-list-tile-sub-title><v-select
          :items="cats"
          label="Choose a category"
          solo
          v-model="cat"
        ></v-select>
        </v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
    
       
      </v-card>
    </v-dialog>
  </v-layout>


    </template>
    
  </v-data-table>
  
</template>

<script>
  export default {
    data () {
      return {
        dialog:false,
        dialog1:false,
        dialog2:false,
        id:0,
        name:'',
        price:0,
        disp:0,
        quan:0,
        remise:0,
        summery:'',
        active:0,
        cat:'',
        cats:[],
        idToUpdate : 0,
        idToDelete :0,
        headers: [
          {
            text: 'Categorie ',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Id', value: 'id_product' },
          { text: 'Name of the product', value: 'name_product' },
          { text: 'Prix', value: 'prix' },
          { text: 'Quantity', value: 'quantity' },
          { text: 'Remise', value: 'remise' },
           { text: 'Summery', value: 'summery' },
            { text: 'Active', value: 'active' },
          { text: 'Options'}
        ],
        products: [] , 
        product : {
            id_product :0, 
            name_product : '' ,
            prix : 0 ,
            quantity : 0,
            remise:0,
            summery:'',
            active:0,
        },
         EditedProduct : {
           id_product :0, 
            name_product : '' ,
            prix : 0 ,
            quantity : 0,
            remise:0,
            summery:'',
            active:0,
        }
        
      }
    },
    mounted(){
        this.intervalid1 = setInterval(function(){
        axios.post('/getProduct',{

        })
        .then(response => this.products= response.data)
        .catch(function(error){
            console.log(error);
        });
        console.log(response.data);
        }.bind(this), 2000);
    },methods:{
      beginDelete(k){
this.idToDelete = k;
this.dialog = true;
      },
      editProduct(k,v){
      
        this.dialog1 = true;
        this.getCat();
        this.idToUpdate = k;
          console.log(this.idToUpdate);
         this.name = v.name_product;
         this.price = v.prix;
         this.disp = v.disponible;
         this.active = v.active;
         this.summery  = v.summery;
         this.quan  = v.quantity;
         this.remise = v.remise;
        
        
      },
      deleteProduct(j){

         axios.post('/delProduct',{
id:j
        })
        .then(function(response){
this.dialog = false;
        })
        .catch(function(error){
            console.log(error);
        });
        console.log(response.data);

      },getCat(){
          var k = [];
        axios.post('/getCat', {
                  
                 
                })
                .then(function (response) {
                  response.data.forEach(element => {
                  k.push(element.name_categorie);
                  });
            
              
                 
                })
                .catch(function (error) {
                 console.log(error);
                });
                 this.cats = k;
                 
      },updateProduct(va){
       console.log(va);
        console.log("Update");
           axios.post('/upProduct',{
        id:this.idToUpdate,
        name:this.name,
        price:this.price,
        quan:this.quan,
        cat:this.cat,
        remise:this.remise,
        summery:this.summery,
        active:this.active,

        })
        .then(function(response){
console.log(response);
        })
        .catch(function(error){
            console.log(error);
        });
          console.log("name" +this.name);
           console.log("name" +this.price);
        console.log(this.EditedProduct);
        this.dialog2 = false;
        console.log(this.idToUpdate);
      },
    }
  }
</script>