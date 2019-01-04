<template>
  
   <v-carousel hide-controls class="mt-3">
    <v-carousel-item
      v-for="item in images"  :key="item"
      class="back"
  >
  <div class="blabla" :style="'background-image:url('+item+');'">
     </div>
    <v-img 
     class="image" 
      :src="item" contain :aspect-ratio="2"></v-img>
 
    </v-carousel-item>
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
                console.log(this.images);
    }
  }
</script>
<style scoped>
#back{
background-repeat: repeat-x; 
-webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
  z-index: -1;
}
.blabla{
 
  position: absolute;
  top:0;left:0;right:0;bottom:0;
  width: 100%;
  height: 100%;
   background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center; 
filter: blur(7px);z-index:-1;
}
.image{
position: relative;
 left:0; right:0;
        top:0; bottom:0;
        margin:auto;
width: 90%;
height: 100%;
}
</style>
