(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{seir:function(o,n,t){"use strict";t.r(n);var e={props:{},data:function(){return{password:"Password",show:!1,message:"",marker:!0,iconIndex:0}},mounted:function(){},methods:{login:function(){window.location="/login"},goToAbout:function(){window.location="/about"},goToHome:function(){window.location="/"},toggleMarker:function(){this.marker=!this.marker},sendMessage:function(){this.resetIcon(),this.clearMessage()},clearMessage:function(){this.message=""},resetIcon:function(){this.iconIndex=0},changeIcon:function(){this.iconIndex===this.icons.length-1?this.iconIndex=0:this.iconIndex++}}},i=t("KHd+"),s=Object(i.a)(e,function(){var o=this,n=o.$createElement,t=o._self._c||n;return t("v-toolbar",{attrs:{fixed:"",clipped:"",color:"#42A5F5",dark:""}},[t("v-toolbar-title",{staticClass:"title",on:{click:function(n){o.goToHome()}}},[o._v("Taher Boutique")]),o._v(" "),t("v-spacer"),o._v(" "),t("v-toolbar-items",[t("v-btn",{attrs:{flat:""},on:{click:function(n){o.goToAbout()}}},[o._v("A propos")])],1)],1)},[],!1,null,null,null);s.options.__file="Navbarclient.vue";n.default=s.exports}}]);