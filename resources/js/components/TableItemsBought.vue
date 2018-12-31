<template>
    
  <v-data-table
    :headers="headers"
    :items="ItemsBought"
    class="elevation-1"
    prev-icon="mdi-menu-left"
    next-icon="mdi-menu-right"
    sort-icon="mdi-menu-down"
  >
    <template slot="items" slot-scope="props">
      <td>{{ props.item.id}}</td>
       <td class="text-xs">{{ props.item.id_buyer }}</td>
      <td class="text-xs">{{ props.item.code_product }}</td>
       <td class="text-xs"><v-btn @click="showImage('https://www.taherboutique.com/'+props.item.image_ccp)"> ccp</v-btn></td>
        <td class="text-xs">{{ props.item.status }}</td>
      <td class="text-xs"><v-btn class="ma-1" @click="editCat(props.item.id)" ><v-icon>edit</v-icon></v-btn><v-btn class="ma-1" @click="beginToDelete(props.item.id)"><v-icon>delete</v-icon></v-btn></td>
      
  <v-layout row justify-center >
   <v-dialog
      v-model="dialog"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Irreversible action</v-card-title>

        <v-card-text>
        Are you sure you want to delete {{ props.item.id }}
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
            @click="deleteCat(idToDelete)"
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</v-layout>




<!-- Dialog image -->


 <v-layout row justify-center >
   <v-dialog
      v-model="dialog3"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Image </v-card-title>

        <img :src="imgToShow" />

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
           
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</v-layout>

<!-- end Dialog Image -->

<!-- Update dialog -->

 <v-layout row justify-center >
   <v-dialog
      v-model="dialog2"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Update </v-card-title>

        <v-card-text>
        Are you sure you want to update {{ props.item.id}}
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
            @click="updateCat(idToUpdate)"
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
          <v-toolbar-title>Edit Requests</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="(dialog2 = true) && (dialog1=false)">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-list three-line subheader>
          <v-subheader>Edit </v-subheader>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>Id</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="id" readonly /></v-list-tile-sub-title>
              
             
           
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>Status</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="status" type="numeric"  /></v-list-tile-sub-title>
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
        dialog3:false,
        imgToShow:'',
        idToUpdate : 0,
        idToDelete:0,
        id:0,
        id_buyer:0,
        code_product:'',
        image_ccp:'',
       status:0,
        headers: [
         
          { text: 'Id', value: 'id' },
          { text: 'User', value: 'id_buyer' },
          { text: 'Product', value: 'code_product' },
          { text: 'image', value: 'image_ccp' },
          { text: 'status', value: 'status' },
          { text: 'Options'}
        ],
        ItemsBought: [] , 
        ItemBought : {
            id:0,
            id_buyer :0, 
            code_product : '' ,
            image_ccp:'',
            status : 0 
            
        }
        
      }
    },
    mounted(){
       this.intervalid1 = setInterval(function(){
        axios.post('/getItems',{

        })
        .then(response => this.ItemsBought= response.data)
        .catch(function(error){
            console.log(error);
        });
        console.log(response.data);
          }.bind(this), 2000);
    },methods:{
      editCat(k){
        this.dialog1 = true;
       this.idToUpdate = k;
       this.id = k;
       
      },
      beginToDelete(k){
this.idToDelete = k;
this.dialog = true;
      },
      deleteCat(j){
         axios.post('/delItems',{
id:j
        })
        .then(function(response){

        })
        .catch(function(error){
            console.log(error);
        });
      this.dialog = false;

      },updateCat(k){
           axios.post('/upItems',{
        id:k,
        status:this.status
       
       

        })
        .then(function(response){

        })
        .catch(function(error){
            console.log(error);
        });
       
        this.dialog2 = false;
      },showImage(v){
          this.imgToShow = v;
          this.dialog3 = true;
      }
    }
  }
</script>

