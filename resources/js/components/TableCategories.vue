<template>

  <v-data-table
    :headers="headers"
    :items="Categories"
    class="elevation-1"
    prev-icon="mdi-menu-left"
    next-icon="mdi-menu-right"
    sort-icon="mdi-menu-down"
  >
    <template slot="items" slot-scope="props">
      <td>{{ props.item.id_categorie }}</td>
       <td class="text-xs">{{ props.item.name_categorie }}</td>
      <td class="text-xs">{{ props.item.confirmed }}</td>
      <td class="text-xs"><v-btn class="ma-1" @click="editCat(props.item.id_categorie)" ><v-icon>edit</v-icon></v-btn><v-btn class="ma-1" @click="beginToDelete(props.item.id_categorie)"><v-icon>delete</v-icon></v-btn></td>
      
  <v-layout row justify-center >
   <v-dialog
      v-model="dialog"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Irreversible action</v-card-title>

        <v-card-text>
        Are you sure you want to delete {{ props.item.name_categorie }}
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

<!-- Update dialog -->

 <v-layout row justify-center >
   <v-dialog
      v-model="dialog2"
      max-width="290"
     
    >
     
      <v-card>
        <v-card-title class="headline">Update </v-card-title>

        <v-card-text>
        Are you sure you want to update {{ props.item.name_categorie }}
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
              <v-list-tile-sub-title><v-text-field v-model="name"  /></v-list-tile-sub-title>
              
             
           
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>Confirmed</v-list-tile-title>
              <v-list-tile-sub-title><v-text-field v-model="confirmed"  /></v-list-tile-sub-title>
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
        idToUpdate : 0,
        idToDelete:0,
        id:0,
        name:'',
       confirmed:0,
        headers: [
         
          { text: 'Id', value: 'id_categorie' },
          { text: 'Categorie', value: 'name_categorie' },
          { text: 'Confirmed', value: 'confirmed' },
          { text: 'Options'}
        ],
        Categories: [] , 
        Categorie : {
            id_categorie :'' , 
            name_categorie : '' ,
            confirmed : '' 
            
        }
        
      }
    },
    mounted(){
       this.intervalid1 = setInterval(function(){
        axios.post('/getCat',{

        })
        .then(response => this.Categories= response.data)
        .catch(function(error){
            console.log(error);
        });
        console.log(response.data);
          }.bind(this), 2000);
    },methods:{
      editCat(k){
        this.dialog1 = true;
       this.idToUpdate = k;
      },
      beginToDelete(k){
this.idToDelete = k;
this.dialog = true;
      },
      deleteCat(j){
         axios.post('/delCat',{
id:j
        })
        .then(function(response){

        })
        .catch(function(error){
            console.log(error);
        });
      this.dialog = false;

      },updateCat(k){
           axios.post('/upCat',{
        id:k,
        name:this.name,
        confirmed:this.confirmed,
       

        })
        .then(function(response){

        })
        .catch(function(error){
            console.log(error);
        });
       
        this.dialog2 = false;
      }
    }
  }
</script>
