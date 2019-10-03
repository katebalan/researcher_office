(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var select2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! select2 */ "./node_modules/select2/dist/js/select2.js");
/* harmony import */ var select2__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(select2__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! select2/dist/css/select2.css */ "./node_modules/select2/dist/css/select2.css");
/* harmony import */ var select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! bootstrap-datepicker */ "./node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js");
/* harmony import */ var bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var bootstrap_datepicker_dist_locales_bootstrap_datepicker_uk_min__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! bootstrap-datepicker/dist/locales/bootstrap-datepicker.uk.min */ "./node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.uk.min.js");
/* harmony import */ var bootstrap_datepicker_dist_locales_bootstrap_datepicker_uk_min__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker_dist_locales_bootstrap_datepicker_uk_min__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! bootstrap-datepicker/dist/css/bootstrap-datepicker3.css */ "./node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css");
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker_dist_css_bootstrap_datepicker3_css__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_standalone_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css */ "./node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css");
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_standalone_css__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker_dist_css_bootstrap_datepicker3_standalone_css__WEBPACK_IMPORTED_MODULE_5__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
__webpack_require__(/*! ../scss/app.scss */ "./assets/scss/app.scss");

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");







$(function () {
  $('.js-select2').select2();
  $('.js-datepicker').datepicker({
    format: "MM yyyy",
    viewMode: "months",
    minViewMode: "months",
    autoclose: true // language: 'uk'

  });
  $('.js-datepicker-full').datepicker({
    // language: 'uk',
    format: "dd MM yyyy",
    autoclose: true
  });
});

/***/ }),

/***/ "./assets/scss/app.scss":
/*!******************************!*\
  !*** ./assets/scss/app.scss ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zY3NzL2FwcC5zY3NzIl0sIm5hbWVzIjpbInJlcXVpcmUiLCIkIiwic2VsZWN0MiIsImRhdGVwaWNrZXIiLCJmb3JtYXQiLCJ2aWV3TW9kZSIsIm1pblZpZXdNb2RlIiwiYXV0b2Nsb3NlIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTs7Ozs7O0FBTUFBLG1CQUFPLENBQUMsZ0RBQUQsQ0FBUDs7QUFFQSxJQUFNQyxDQUFDLEdBQUdELG1CQUFPLENBQUMsb0RBQUQsQ0FBakI7O0FBRUE7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBRUFDLENBQUMsQ0FBQyxZQUFNO0FBQ0pBLEdBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJDLE9BQWpCO0FBRUFELEdBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CRSxVQUFwQixDQUErQjtBQUMzQkMsVUFBTSxFQUFFLFNBRG1CO0FBRTNCQyxZQUFRLEVBQUUsUUFGaUI7QUFHM0JDLGVBQVcsRUFBRSxRQUhjO0FBSTNCQyxhQUFTLEVBQUUsSUFKZ0IsQ0FLM0I7O0FBTDJCLEdBQS9CO0FBT0FOLEdBQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCRSxVQUF6QixDQUFvQztBQUNoQztBQUNBQyxVQUFNLEVBQUUsWUFGd0I7QUFHaENHLGFBQVMsRUFBRTtBQUhxQixHQUFwQztBQUtILENBZkEsQ0FBRCxDOzs7Ozs7Ozs7OztBQ2xCQSx1QyIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cbnJlcXVpcmUoJy4uL3Njc3MvYXBwLnNjc3MnKTtcblxuY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xuXG5pbXBvcnQgJ3NlbGVjdDInO1xuaW1wb3J0ICdzZWxlY3QyL2Rpc3QvY3NzL3NlbGVjdDIuY3NzJztcblxuaW1wb3J0ICdib290c3RyYXAtZGF0ZXBpY2tlcic7XG5pbXBvcnQgJ2Jvb3RzdHJhcC1kYXRlcGlja2VyL2Rpc3QvbG9jYWxlcy9ib290c3RyYXAtZGF0ZXBpY2tlci51ay5taW4nO1xuaW1wb3J0ICdib290c3RyYXAtZGF0ZXBpY2tlci9kaXN0L2Nzcy9ib290c3RyYXAtZGF0ZXBpY2tlcjMuY3NzJztcbmltcG9ydCAnYm9vdHN0cmFwLWRhdGVwaWNrZXIvZGlzdC9jc3MvYm9vdHN0cmFwLWRhdGVwaWNrZXIzLnN0YW5kYWxvbmUuY3NzJztcblxuJCgoKSA9PiB7XG4gICAgJCgnLmpzLXNlbGVjdDInKS5zZWxlY3QyKCk7XG5cbiAgICAkKCcuanMtZGF0ZXBpY2tlcicpLmRhdGVwaWNrZXIoe1xuICAgICAgICBmb3JtYXQ6IFwiTU0geXl5eVwiLFxuICAgICAgICB2aWV3TW9kZTogXCJtb250aHNcIixcbiAgICAgICAgbWluVmlld01vZGU6IFwibW9udGhzXCIsXG4gICAgICAgIGF1dG9jbG9zZTogdHJ1ZSxcbiAgICAgICAgLy8gbGFuZ3VhZ2U6ICd1aydcbiAgICB9KTtcbiAgICAkKCcuanMtZGF0ZXBpY2tlci1mdWxsJykuZGF0ZXBpY2tlcih7XG4gICAgICAgIC8vIGxhbmd1YWdlOiAndWsnLFxuICAgICAgICBmb3JtYXQ6IFwiZGQgTU0geXl5eVwiLFxuICAgICAgICBhdXRvY2xvc2U6IHRydWVcbiAgICB9KTtcbn0pO1xuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==