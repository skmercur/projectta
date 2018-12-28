<template>
  <v-carousel hide-controls>
    <v-carousel-item
      v-for="item in images"
      :key="item"
      :src="item" v-if="item !== ''"
    ></v-carousel-item>
  </v-carousel>
</template>



<script>
  export default {
    data () {
      return {
        images: ['https://images.sftcdn.net/images/t_app-cover-l,f_auto/p/ce2ece60-9b32-11e6-95ab-00163ed833e7/260663710/the-test-fun-for-friends-screenshot.jpg']
      }
    },beforeMount(){
axios.post('/getPubs',{

}).then(response => this.images = response.data ).catch(function (error) {
                  alert(error.response.data.message);
                 
                });
    }
  }
</script>