<template>
  <v-carousel hide-controls>
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
    ></v-carousel-item>
  </v-carousel>
</template>



<script>
  export default {
    data () {
      return {
        items: [
          {
            src: 'https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/43388252_2177355059257741_6818611025961549824_o.jpg?_nc_cat=101&_nc_ht=scontent-cdt1-1.xx&oh=d257ebd210b252fb9370932d40a4d1af&oe=5C8C2ADD'
          },
          {
            src: 'https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/48368702_2222209098105670_3662928099223273472_o.jpg?_nc_cat=104&_nc_ht=scontent-cdt1-1.xx&oh=916cb19df65922e7d28b04c73575dc0b&oe=5C9C059B'
          },
     
          {
            src: 'https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/48277712_2222209744772272_8705682534698057728_o.jpg?_nc_cat=109&_nc_ht=scontent-cdt1-1.xx&oh=043498b2708407e0dc2fea4ca361bc66&oe=5C970086'
          }
        ]
      }
    }
  }
</script>