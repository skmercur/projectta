<template>
  <v-carousel hide-controls>
    <v-carousel-item
      v-for="item in images"
      :key="item"
      :src="item"
    ></v-carousel-item>
  </v-carousel>
</template>



<script>
  export default {
    data () {
      return {
        images: ['https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/26239766_1980207352305847_259052501415261259_n.jpg?_nc_cat=106&_nc_eui2=AeExNJhURL36XLHx1CDtn_SN6Aj8FvMzvpBmzX8ncWlRv-yXxepDdu4hSUhgBlTI7w84z0kocbFQShhSd4AQAZgWQ8Fdlfm8DJpzp6l8gknMjw&_nc_ht=scontent-cdt1-1.xx&oh=f22ec2e7ed4c0f47b88655ff40d31c53&oe=5CD6AB33']
      }
    },created(){
axios.post('/getPubs',{

}).then(response => this.images = response.data ).catch(function (error) {
                  alert(error.response.data.message);
                 
                });
    }
  }
</script>