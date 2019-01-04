<template>
  <v-footer
    dark
    class="mt-2 sticky-bottom"
  >
    <v-card
      class="flex"
      flat
      tile
    >
      <v-card-title class="teal">
        <strong class="subheading">On est a votre service sur les réseaux sociaux n'hésitez pas à nous contacter</strong>

        <v-spacer></v-spacer>

        <v-btn
          
          class="mx-3"
          dark
          icon
          @click="goToFacebook()"
        >
          <v-icon size="24px">fab fa-facebook</v-icon>
        </v-btn>
        <v-btn
          
          class="mx-3"
          dark
          icon
        >
          <v-icon size="24px">fab fa-instagram</v-icon>
        </v-btn>
      </v-card-title>

      <v-card-actions class="grey darken-3 justify-center">
        &copy;2019 — <strong @click="goToPowerDz()">Powerdz</strong>
      </v-card-actions>
    </v-card>
  </v-footer>
</template>

<script>
  export default {
    data: () => ({
      icons: [
        'fab fa-facebook',
        'fab fa-instagram'
      ]
    }),
    methods:{
goToFacebook(){
 window.location = "https://www.facebook.com/taherboutique/";
},goToPowerDz(){
  window.location = "https://www.facebook.com/Powerdz-784898105178463/";
}
    }
  }
</script>