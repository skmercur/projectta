
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

// app.js
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader


Vue.use(Vuetify)


Vue.use(Vuetify)
Vue.component('graphs',  require("./components/Graphs.vue" ).default);
Vue.component('navbar', require("./components/Navbar.vue").default);
Vue.component('formup', require("./components/FormFileUpload.vue").default);
Vue.component('todo', require("./components/Todo.vue").default);
Vue.component('tabproduct', require("./components/TableProducts.vue").default);
Vue.component('dashboard', require("./components/Dashboard.vue").default);
Vue.component('tabcat', require("./components/TableCategories.vue").default);
Vue.component('admin', require("./components/AdminDash.vue").default);
Vue.component('navbar-client', require("./components/Navbarclient.vue").default);
Vue.component('slide', require("./components/Slide.vue").default);
Vue.component('footer-c', require("./components/Footerclient.vue").default);
Vue.component('produit-c', require("./components/Produitclient.vue").default);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});
