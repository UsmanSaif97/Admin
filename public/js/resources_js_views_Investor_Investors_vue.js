"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_Investor_Investor_vue"], {

  /***/ "./resources/js/views/Investor/Investors.vue":
  /*!****************************************************!*\
    !*** ./resources/js/views/Investor/Investors.vue ***!
    \****************************************************/
  /***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

    __webpack_require__.r(__webpack_exports__);
    /* harmony export */ __webpack_require__.d(__webpack_exports__, {
      /* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
      /* harmony export */ });
    /* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
    
    var render = function () {
      var _vm = this
      var _h = _vm.$createElement
      var _c = _vm._self._c || _h
      return _c("div", [
        _c("h1", [_vm._v("Investors")]),
        _c("h3", { staticClass: "font-extrabold mb-0" }, [
          _vm._v(_vm._s(_vm.record.investor_count || 0))
        ])
        // Add more UI elements as needed
      ])
    }
    var staticRenderFns = []
    
    var script = {
      data() {
        return {
          record: {
            investor_count: 0 // Initialize to prevent undefined
          }
        };
      },
      methods: {
        getRecord() {
          axios.get('this.$apiUrl/investor')
            .then(response => {
              console.log(response.data); // Log the response to check the structure
              this.record = response.data;
            })
            .catch(error => {
              console.error('Error fetching data:', error);
            });
        }
      },
      mounted() {
        this.getRecord(); // Fetch data when the component is mounted
      }
    }

    /* normalize component */
    ;
    var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__["default"])(
      script,
      render,
      staticRenderFns,
      false,
      null,
      null,
      null
    )

    component.options.__file = "resources/js/views/Investor/Investors.vue"
    /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

    /***/ })

}]);
