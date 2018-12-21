<template>
    
</template>
<script>
export default {
      data() {
    return {
      products: [],
      product: {
        id: '',
        name_products: '',
        prix: ''
      },
      product_id: '',
      pagination: {},
      edit: false
    };
},
      created() {
    this.fetchProducts();
 
  },
  methods: {
    fetchProducts(page_url) {
      let vm = this;
      page_url = page_url || '/api/products';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.articles = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
}
}


</script>
