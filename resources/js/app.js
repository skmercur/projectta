
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


import FBSignInButton from 'vue-facebook-signin-button'

import Clipboard from 'v-clipboard'
 
Vue.use(Clipboard)
Vue.config.productionTip = false
Vue.use(Vuetify)
Vue.use(FBSignInButton)
Vue.component('graphs',  require("./components/Graphs.vue" ).default);
Vue.component('navbar', require("./components/Navbar.vue").default);
Vue.component('formup', require("./components/FormFileUpload.vue").default);
Vue.component('todo', require("./components/Todo.vue").default);
Vue.component('tabproduct', require("./components/TableProducts.vue").default);
Vue.component('dashboard', require("./components/Dashboard.vue").default);
Vue.component('tabcat', require("./components/TableCategories.vue").default);
Vue.component('admin', require("./components/AdminDash.vue").default);
Vue.component('navbarc', require("./components/Navbarclient.vue").default);
Vue.component('slide', require("./components/Slide.vue").default);
Vue.component('footer-c', require("./components/Footerclient.vue").default);
Vue.component('produit-c', require("./components/Produitclient.vue").default);
Vue.component('checkout', require("./components/CheckOut.vue").default);
Vue.component('tabrequest', require("./components/TableRequests.vue").default);
Vue.component('tabboughts', require("./components/TableItemsBought.vue").default);
Vue.component('tabpubs', require("./components/TablePubs.vue").default);
Vue.component('productdetails', require("./components/ProductDetails.vue").default);
Vue.component('about', require("./components/AboutUs.vue").default);
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
  
    data(){
        return{
            testFromRoot : 'wassup',
            
        }
    },
    created:function(){
        window.fbAsyncInit = function() {
            FB.init({
            appId      : '2020996934662748',
            xfbml      : true,
            version    : 'v3.2'
            });
            FB.AppEvents.logPageView();
            };
            
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=2020996934662748&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
    }
   

    
});
