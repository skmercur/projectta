<template>

  <v-app id="inspire" dark>
    <v-navigation-drawer
      v-model="drawer"
      clipped
      fixed
      app
    >
    
      <v-list dense>
        <v-list-tile  @click="pageSwitcher(1)">
          <v-list-tile-action>
            <v-icon>dashboard</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Dashboard</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile @click="pageSwitcher(2)">
          <v-list-tile-action>
            <v-icon>shopping_cart</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Products</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
         <v-list-tile  @click="pageSwitcher(3)">
          <v-list-tile-action>
            <v-icon>playlist_add_check</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Categories</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile  @click="pageSwitcher(4)">
          <v-list-tile-action>
            <v-icon>move_to_inbox</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Requests</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
         <v-list-tile  @click="pageSwitcher(5)">
          <v-list-tile-action>
            <v-icon>euro_symbol</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Sells</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
         <v-list-tile  @click="pageSwitcher(6)">
          <v-list-tile-action>
            <v-icon>add_to_home_screen</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Pubs</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
         <v-list-tile  @click="Logout">
          <v-list-tile-action>
            <v-icon>exit_to_app</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Logout</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar app fixed clipped-left>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Welcome {{adminData.name}}</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <v-container fluid grid-list-sm v-if="showSectionOne" >
        
        <v-layout row wrap  justify-left>
          <v-flex d-flex >
              <v-flex d-flex  >
             
                  <v-card color="white"  class="ma-3" >
                         <v-card-title><h4 style="color:#000;">Number of product views </h4></v-card-title>
          <v-divider></v-divider>
            <graphs Url="/getNumberOfViews"></graphs>
                  </v-card>
              
              </v-flex>
               <v-flex d-flex  >
                  <v-card color="white"  class="ma-3" >
                         <v-card-title><h4 style="color:#000;">Number of the Clients </h4></v-card-title>
          <v-divider></v-divider>
            <graphs Url="/GetNbrClients"></graphs>
                  </v-card>
              </v-flex>
              
              
              
               
              
          </v-flex>
        </v-layout>
        <v-layout row wrap>
         <v-flex d-flex >
                  <v-card color="white"  class="ma-3" >
                         <v-card-title><h4 style="color:#000;">Requests</h4></v-card-title>
          <v-divider></v-divider>
             <v-layout column>
           <v-icon color="black" large>trending_up</v-icon>
           </v-layout>
            <h3 style="color:#000;" class="text-xs-center pa-3" >{{RequestsNP}}</h3>
                  </v-card>
              </v-flex>
               <v-flex d-flex >
                  <v-card color="white"  class="ma-3" >
                         <v-card-title><h4 style="color:#000;">preview</h4></v-card-title>
          <v-divider></v-divider>
             <v-layout column>
           <v-icon color="black" large>trending_up</v-icon>
           </v-layout>

            <h3 style="color:#000;" class="text-xs-center pa-3" >{{sells}} sells</h3>
                  </v-card>
              </v-flex>
 <v-flex d-flex >
                  <v-card color="white"  class="ma-3" >
                         <v-card-title><h4 style="color:#000;">preview</h4></v-card-title>
          <v-divider></v-divider>
             <v-layout column>
           <v-icon color="black" large>attach_money</v-icon>
           </v-layout>

            <h3 style="color:#000;" class="text-xs-center pa-3" >{{sellsDzd}} DZD</h3>
                  </v-card>
              </v-flex>

        </v-layout>



         <v-layout row wrap>
         <v-flex d-flex >
                  <v-card color="white"  class="ma-3" >
                   
           <todo></todo>
                  </v-card>
              </v-flex>
        </v-layout>
      </v-container>


      <v-container fluid grid-list-sm v-else-if="showSectionTwo">
<v-layout row wrap >
          <v-flex d-flex xs12 order-xs5>
            
              <br>
                  <v-card color="white"  class="ma-3" >
                         <v-card-title><h2 style="color:#000;">Products</h2></v-card-title>
                          <v-flex d-flex xs12 order-xs5>
              <tabproduct></tabproduct>
                          </v-flex>
                             <v-divider></v-divider>
                           <v-card-title><h2 style="color:#000;">Add a product</h2></v-card-title>
                           <v-flex d-flex xs12 order-xs5>
                             
               
<formup></formup>
                           </v-flex>
                  </v-card>
          </v-flex>
</v-layout>
      </v-container>
      <v-container fluid grid-list-sm v-else-if="showSectionThree">
<v-layout row wrap >
          <v-flex d-flex xs12 order-xs5>
<v-card color="white"  class="ma-3" >
                         <v-card-title><h2 style="color:#000;">Categories</h2></v-card-title>
                          <v-flex d-flex xs12 order-xs5>
              <tabcat></tabcat>
                          </v-flex>
                             <v-divider></v-divider>
                          
                  </v-card>
          </v-flex>
</v-layout>
      </v-container>

  <v-container fluid grid-list-sm v-else-if="showSectionFour">
<v-layout row wrap >
          <v-flex d-flex xs12 order-xs5>
<v-card color="white"  class="ma-3" >
                         <v-card-title><h2 style="color:#000;">Requests</h2></v-card-title>
                          <v-flex d-flex xs12 order-xs5>
              <tabrequest></tabrequest>
                          </v-flex>
                             <v-divider></v-divider>
                          
                  </v-card>
          </v-flex>
</v-layout>
      </v-container>


       <v-container fluid grid-list-sm v-else-if="showSectionFive">
<v-layout row wrap >
          <v-flex d-flex xs12 order-xs5>
<v-card color="white"  class="ma-3" >
                         <v-card-title><h2 style="color:#000;">Sells</h2></v-card-title>
                          <v-flex d-flex xs12 order-xs5>
              <tabboughts></tabboughts>
                          </v-flex>
                             <v-divider></v-divider>
                          
                  </v-card>
          </v-flex>
</v-layout>
      </v-container>
           <v-container fluid grid-list-sm v-else-if="showSectionSix">
<v-layout row wrap >
          <v-flex d-flex xs12 order-xs5>
<v-card color="white"  class="ma-3" >
                         <v-card-title><h2 style="color:#000;">Pubs</h2></v-card-title>
                          <v-flex d-flex xs12 order-xs5>
             <tabpubs></tabpubs>
                          </v-flex>
                             <v-divider></v-divider>
                          
                  </v-card>
          </v-flex>
</v-layout>
      </v-container>


    </v-content>
    <v-footer app fixed>
      <span>PowerDz &copy; {{YearNow}}</span>
    </v-footer>
  </v-app>
</template>

<script>
import formup from './FormFileUpload';
import graphs from './Graphs';
import tabproduct from './TableProducts';
import tabcat from './TableCategories';
import todo from './Todo';
import tabpubs from './TablePubs';
 var dt = new Date();
  export default {
    data: () => ({
      drawer: null,
      showSectionOne:true,
      showSectionTwo:false,
      showSectionThree:false,
      showSectionFour:false,
      showSectionFive:false,
      showSectionSix:false,
      YearNow: dt.getFullYear(),
      sells:0,
      sellsDzd:0,
      RequestsNP:0,
      adminData:{}
    }),
    props: {
        srcImage:String,
      source: String,
      admin:String
      
    },
    methods:{
pageSwitcher(i){
switch(i){
    case 1: {
 this.showSectionOne=true;
      this.showSectionTwo=false;
      this.showSectionThree=false;
        this.showSectionFour=false;
      this.showSectionFive=false;
       this.showSectionSix=false;
     
      break;
    }
    case 2: {
 this.showSectionOne=false;
      this.showSectionTwo=true;
      this.showSectionThree=false;
        this.showSectionFour=false;
      this.showSectionFive=false;
       this.showSectionSix=false;
     
      break;
    }
    case 3: {
 this.showSectionOne=false;
      this.showSectionTwo=false;
      this.showSectionThree=true;
      this.showSectionFour=false;
      this.showSectionFive=false;
       this.showSectionSix=false;
     
      break;
    }case 4:{
this.showSectionOne=false;
      this.showSectionTwo=false;
      this.showSectionThree=false;
      this.showSectionFour=true;
      this.showSectionFive=false;
       this.showSectionSix=false;
      break;
    }case 5:{
      this.showSectionOne=false;
      this.showSectionTwo=false;
      this.showSectionThree=false;
      this.showSectionFour=false;
      this.showSectionFive=true;
       this.showSectionSix=false;
       break;
    }
    case 6:{
       this.showSectionOne=false;
      this.showSectionTwo=false;
      this.showSectionThree=false;
      this.showSectionFour=false;
      this.showSectionFive=false;
       this.showSectionSix=true;
       break;
    }
}
},Logout(){
                
         axios.post('/LogoutA', {
                  
                 
                })
                .then(function (response) {
                  window.location = "/login";
                })
                .catch(function (error) {
                   
                });
}
    },mounted(){
       this.adminData = JSON.parse(this.admin);
        this.intervalid1 = setInterval(function(){
         axios.post('/GetSells', {
                  
            
                })
                .then(response => this.sells= response.data)
                .catch(function (error) {
                 
                 
                });
                 axios.post('/GetSellsDzd', {
                  
            
                })
                .then(response => this.sellsDzd= response.data)
                .catch(function (error) {
                 
                });

                 axios.post('/GetRequestsAdmin', {
                  
            
                })
                .then(response => this.RequestsNP= response.data)
                .catch(function (error) {
                 
                });




      }.bind(this), 5000);
    }
  }
</script>
