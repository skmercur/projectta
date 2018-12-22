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
      <td>{{ props.item.name }}</td>
      <td class="text-xs-right">{{ props.item.id_product }}</td>
      <td class="text-xs-right">{{ props.item.name_product }}</td>
      <td class="text-xs-right">{{ props.item.prix }}</td>
      <td class="text-xs-right">{{ props.item.disponible }}</td>
      <td class="text-xs-right">{{ props.item.quantity }}</td>
    </template>
  </v-data-table>
</template>

<script>
  export default {
    data () {
      return {
        headers: [
          {
            text: 'Product ',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Id', value: 'id_product' },
          { text: 'Name', value: 'name_product' },
          { text: 'Prix', value: 'prix' },
          { text: 'Disponible', value: 'disponible' },
          { text: 'Quantity', value: 'quantity' }
        ],
        products: [] , 
        product : {
            id_product :'' , 
            name_product : '' ,
            prix : '' ,
            disponible : '' , 
            quantity : ''
        }
        
      }
    },
    mounted(){
        axios.post('/getProduct',{

        })
        .then(response => this.products= response.data)
        .catch(function(error){
            console.log(error);
        });
        console.log(response.data);
    }
  }
</script>