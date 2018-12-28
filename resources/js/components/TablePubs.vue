<template>
 <v-card color=" lighten-1" class="mb-5" >
    <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center">
				
      
              
           
             <label>Preview of the last seleted image</label>
           
          <img :src="image"  height="50" width="50" class="img-responsive">
              
           
				</v-flex>
         <v-flex xs12 class="text-xs-center text-sm-center text-md-center text-lg-center" v-for="index in 5" :key="index">
				
      
                <img height="50" width="50" :src="images[index-1]" class="img-responsive">
           
                <input type="file" name="image" v-on:change="onFileChange" class="form-control">
           
          
              
          
     
				</v-flex>
  <v-btn color="blue"  @click="addProduct(index)">Upload</v-btn>
 </v-card>
</template>
<script>
export default {
    data(){
        return{
image:'',
        images:[],
         lengthImageArray : 0,
        }
    },

    methods:{
        onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                    this.images.push(this.image);

                };
                reader.readAsDataURL(file);
                console.log(this.images);
                this.lengthImageArray = this.images.length;
            },addProduct(v){
                axios.post('/addPub',{
        photo1:this.images[0],
       photo2:this.images[1],
       photo3:this.images[2],
       photo4:this.images[3],
       photo5:this.images[4],
       

        })
        .then(function(response){

        })
        .catch(function(error){
            console.log(error);
        });
            }
    }
}
</script>
