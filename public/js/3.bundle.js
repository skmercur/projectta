(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Footerclient.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Footerclient.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      icons: ['fab fa-facebook', 'fab fa-instagram']
    };
  },
  methods: {
    goToFacebook: function goToFacebook() {
      window.location = "https://www.facebook.com/taherboutique/";
    },
    goToPowerDz: function goToPowerDz() {
      window.location = "https://www.facebook.com/Powerdz-784898105178463/";
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Footerclient.vue?vue&type=template&id=478b8bde&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Footerclient.vue?vue&type=template&id=478b8bde& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-footer",
    { staticClass: "mt-2 sticky-bottom", attrs: { dark: "" } },
    [
      _c(
        "v-card",
        { staticClass: "flex", attrs: { flat: "", tile: "" } },
        [
          _c(
            "v-card-title",
            { staticClass: "teal" },
            [
              _c("strong", { staticClass: "subheading" }, [
                _vm._v(
                  "On est a votre service sur les réseaux sociaux n'hésitez pas à nous contacter"
                )
              ]),
              _vm._v(" "),
              _c("v-spacer"),
              _vm._v(" "),
              _c(
                "v-btn",
                {
                  staticClass: "mx-3",
                  attrs: { dark: "", icon: "" },
                  on: {
                    click: function($event) {
                      _vm.goToFacebook()
                    }
                  }
                },
                [
                  _c("v-icon", { attrs: { size: "24px" } }, [
                    _vm._v("fab fa-facebook")
                  ])
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-btn",
                { staticClass: "mx-3", attrs: { dark: "", icon: "" } },
                [
                  _c("v-icon", { attrs: { size: "24px" } }, [
                    _vm._v("fab fa-instagram")
                  ])
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-card-actions",
            { staticClass: "grey darken-3 justify-center" },
            [
              _vm._v("\n      ©2019 — "),
              _c(
                "strong",
                {
                  on: {
                    click: function($event) {
                      _vm.goToPowerDz()
                    }
                  }
                },
                [_vm._v("Powerdz")]
              )
            ]
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Footerclient.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/Footerclient.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Footerclient_vue_vue_type_template_id_478b8bde___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Footerclient.vue?vue&type=template&id=478b8bde& */ "./resources/js/components/Footerclient.vue?vue&type=template&id=478b8bde&");
/* harmony import */ var _Footerclient_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Footerclient.vue?vue&type=script&lang=js& */ "./resources/js/components/Footerclient.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Footerclient_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Footerclient_vue_vue_type_template_id_478b8bde___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Footerclient_vue_vue_type_template_id_478b8bde___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Footerclient.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Footerclient.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/Footerclient.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Footerclient_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Footerclient.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Footerclient.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Footerclient_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Footerclient.vue?vue&type=template&id=478b8bde&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/Footerclient.vue?vue&type=template&id=478b8bde& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footerclient_vue_vue_type_template_id_478b8bde___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Footerclient.vue?vue&type=template&id=478b8bde& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Footerclient.vue?vue&type=template&id=478b8bde&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footerclient_vue_vue_type_template_id_478b8bde___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footerclient_vue_vue_type_template_id_478b8bde___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);