<template>
       <!-- TO DO List -->
         <v-layout row>
    <v-flex xs12 sm-8 align-self: center >
      <v-card>
        <v-toolbar color="black" dark>
       

          <v-toolbar-title>Comments</v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn icon>
            <v-icon>search</v-icon>
          </v-btn>
        </v-toolbar>

        <v-list three-line>
          <template v-for="(item) in items" >
           

            <v-list-tile
            
              :key="item.name"
             
            
            >
              <v-list-tile-avatar >
                <img :src="item.image">
              </v-list-tile-avatar>

              <v-list-tile-content>
                <v-list-tile-title v-html="item.name"  ></v-list-tile-title>
                <v-list-tile-sub-title v-html="item.comment" ></v-list-tile-sub-title>
                 <div class="text-xs-center">
    <v-rating v-model="item.rating" readonly></v-rating>
  </div>
              </v-list-tile-content>
            </v-list-tile>
            
          </template>
        </v-list>
      </v-card>
      
    </v-flex>
  
  </v-layout>
          <!-- /.box -->

</template>
<script>
  export default {
    data () {
      return {
        
        items: [ 
        
         
        ]
      }
    },methods :{
      
    
   
    },mounted(){
  axios.post('/getComments', {
                   
                 
                })
                .then(response =>(this.items= response.data))
                .catch(function (error) {
                 console.log(error);
                });

               
    },
  }
</script>