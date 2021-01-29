(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var select2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! select2 */ "./node_modules/select2/dist/js/select2.js");
/* harmony import */ var select2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(select2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! select2/dist/css/select2.css */ "./node_modules/select2/dist/css/select2.css");
/* harmony import */ var select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(select2_dist_css_select2_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(bootstrap__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! bootstrap-datepicker */ "./node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js");
/* harmony import */ var bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var bootstrap_datepicker_dist_locales_bootstrap_datepicker_uk_min__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! bootstrap-datepicker/dist/locales/bootstrap-datepicker.uk.min */ "./node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.uk.min.js");
/* harmony import */ var bootstrap_datepicker_dist_locales_bootstrap_datepicker_uk_min__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker_dist_locales_bootstrap_datepicker_uk_min__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_css__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! bootstrap-datepicker/dist/css/bootstrap-datepicker3.css */ "./node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css");
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_css__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker_dist_css_bootstrap_datepicker3_css__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_standalone_css__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css */ "./node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css");
/* harmony import */ var bootstrap_datepicker_dist_css_bootstrap_datepicker3_standalone_css__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(bootstrap_datepicker_dist_css_bootstrap_datepicker3_standalone_css__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _fix_bootstrap_file_loader__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./fix_bootstrap_file_loader */ "./assets/js/fix_bootstrap_file_loader.js");
/* harmony import */ var _fix_bootstrap_file_loader__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_fix_bootstrap_file_loader__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _updateLessonForm__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./updateLessonForm */ "./assets/js/updateLessonForm.js");
/* harmony import */ var _updateLessonForm__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_updateLessonForm__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _js_collection__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./js-collection */ "./assets/js/js-collection.js");
/* harmony import */ var _js_collection__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_js_collection__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _rating__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./rating */ "./assets/js/rating.js");
/* harmony import */ var _rating__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_rating__WEBPACK_IMPORTED_MODULE_12__);


/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
__webpack_require__(/*! ../scss/app.scss */ "./assets/scss/app.scss"); // require('progressbar');
// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.














jquery__WEBPACK_IMPORTED_MODULE_1___default()(function () {
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-select2').select2();
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-api-select2').select2({
    ajax: {
      url: 'https://api.rozklad.org.ua/v2/teachers/',
      dataType: 'json',
      data: function data(params) {
        return {
          search: "{'query':'" + params.term + "'}",
          ss: "{'query':'".concat(params.term, "'}") // search: {
          //     'query': params.term
          // }

        };
      },
      processResults: function processResults(data) {
        console.log(data.data);
        var result = [];
        jquery__WEBPACK_IMPORTED_MODULE_1___default.a.each(data.data, function (index, value) {
          result.push({
            'id': value.teacher_id,
            'text': "".concat(value.teacher_name, " (").concat(value.teacher_id, ")")
          });
        }); // Transforms the top-level key of the response object from 'items' to 'results'

        return {
          results: result
        };
      } // Additional AJAX parameters go here; see the end of this chapter for the full code of this example

    },
    minimumInputLength: 3
  });
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-datepicker').datepicker({
    format: "MM yyyy",
    viewMode: "months",
    minViewMode: "months",
    autoclose: true // language: 'uk'

  });
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-datepicker-full').datepicker({
    // language: 'uk',
    format: "dd MM yyyy",
    autoclose: true
  });
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-submit-form').on('click', function (e) {
    e.preventDefault();
    var answer = confirm('Are you sure you want to delete this item?');
    if (answer) this.closest('form').submit();
  });

  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.fix-bootstrap-file')._fix_boostrap_file_loader();

  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-update-lesson-form').__update_lesson_form();

  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-dynamic-collection')._init_dynamic_collection();

  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-dynamic-collection2')._init_dynamic_collection();

  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-rating')._init_rating();
});

/***/ }),

/***/ "./assets/js/fix_bootstrap_file_loader.js":
/*!************************************************!*\
  !*** ./assets/js/fix_bootstrap_file_loader.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.split.js */ "./node_modules/core-js/modules/es.string.split.js");

(function ($) {
  $.fn._fix_boostrap_file_loader = function () {
    var $that = this;
    this.on('change', function () {
      var $filename = $that.val().split('\\').pop();
      $that.parent().find('.custom-file-label').text($filename);
      $that.parent().parent().parent().find('input[name*="realFilename"]').val($filename);
    });
  };
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./assets/js/js-collection.js":
/*!************************************!*\
  !*** ./assets/js/js-collection.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");

(function ($) {
  $.fn._init_dynamic_collection = function () {
    var $this = $(this); // Get the prototype

    var prototype = $this.data('prototype'); // Set the initial index of this container

    $this.data('index', $this.find('li').length); // When the delete link of any existing items is clicked, delete its prototype

    $this.find('.dynamic-collection-item-delete')._init_dynamic_collection_delete();

    $this.find('.dynamic-collection-item-add').on('click', function (e) {
      e.preventDefault(true); // Grab the index

      var index = $this.data('index'); // Clone the prototype

      var newForm = prototype.replace(/__name__/g, index); // Increment the index

      $this.data('index', index + 1); // Insert the prototype before the add button

      newForm = $(newForm).insertBefore($(this)); // When the delete link is clicked, delete this prototype

      newForm.find('.dynamic-collection-item-delete')._init_dynamic_collection_delete(); // Avoid following a link to the top of the page


      return false;
    });
  };

  $.fn._init_dynamic_collection_delete = function () {
    this.click(function (e) {
      e.preventDefault(true); // Remove closest prototype

      $(this).closest('.dynamic-collection-item').remove(); // Avoid following a link to the top of the page

      return false;
    });
  };
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./assets/js/rating.js":
/*!*****************************!*\
  !*** ./assets/js/rating.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");

(function ($) {
  var elements = ['mark_avg_exactingness', 'mark_avg_knowledge_subject', 'mark_avg_relation_to_the_student', 'mark_avg_sense_of_humor'];

  $.fn._init_rating = function () {
    var $that = this;

    if (window.ro_ajax_api_rozklad_id) {
      $.ajax({
        url: 'https://api.rozklad.org.ua/v2/teachers/' + window.ro_ajax_api_rozklad_id + '/rating'
      }).done(function (data) {
        $.each(elements, function (index, value) {
          var $div = $that.find('.' + value);
          $div.append(data.data[value]);
        });
      });
    }
  };
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./assets/js/updateLessonForm.js":
/*!***************************************!*\
  !*** ./assets/js/updateLessonForm.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");

__webpack_require__(/*! core-js/modules/es.parse-int.js */ "./node_modules/core-js/modules/es.parse-int.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");

(function ($) {
  $.fn.__update_lesson_form = function () {
    var $that = this,
        fieldHoursWrap = $that.find('#lesson_hours').closest('.form-group'),
        fieldEvaluationWrap = $that.find('#lesson_evaluationType').closest('.form-group'),
        fieldHours = $that.find('#lesson_hours'),
        fieldEvaluation = $that.find('#lesson_evaluationType');
    $.ajax({
      method: 'GET',
      url: window.ro_ajax_list_lesson_type
    }).done(function (data) {
      var oldId = parseInt($that.find('#lesson_type').val());
      var oldLesson = null;
      data.forEach(function (item) {
        oldLesson = item.id === oldId ? item : oldLesson;
      });

      if (oldLesson) {
        if (oldLesson.defaultHours === null) {
          fieldHoursWrap.show();
          fieldHours.prop('readonly', false);
        } else {
          fieldHoursWrap.show();
          fieldHours.prop('readonly', 'readonly'); // fieldHours.val(oldLesson.defaultHours);
        }

        if (oldLesson.isEvaluated === true) {
          fieldEvaluationWrap.show(); // fieldEvaluation.prop('required', true);
        } else {
          fieldEvaluationWrap.hide(); // fieldEvaluation.prop('required', false);
        }
      }

      $that.find('#lesson_type').on('change', function () {
        var id = parseInt(this.value);
        var lesson = null;
        fieldHours.val(null);
        fieldEvaluation.val(null);
        data.forEach(function (item) {
          lesson = item.id === id ? item : lesson;
        });

        if (lesson) {
          if (lesson.defaultHours === null) {
            fieldHoursWrap.show();
            fieldHours.prop('readonly', false);
          } else {
            fieldHoursWrap.show();
            fieldHours.prop('readonly', 'readonly');
            fieldHours.val(lesson.defaultHours);
          }

          if (lesson.isEvaluated === true) {
            fieldEvaluationWrap.show(); // fieldEvaluation.prop('required', true);
          } else {
            fieldEvaluationWrap.hide(); // fieldEvaluation.prop('required', false);
          }
        }
      });
    });
  };
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9maXhfYm9vdHN0cmFwX2ZpbGVfbG9hZGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9qcy1jb2xsZWN0aW9uLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9yYXRpbmcuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3VwZGF0ZUxlc3NvbkZvcm0uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3Njc3MvYXBwLnNjc3MiXSwibmFtZXMiOlsicmVxdWlyZSIsIiQiLCJzZWxlY3QyIiwiYWpheCIsInVybCIsImRhdGFUeXBlIiwiZGF0YSIsInBhcmFtcyIsInNlYXJjaCIsInRlcm0iLCJzcyIsInByb2Nlc3NSZXN1bHRzIiwiY29uc29sZSIsImxvZyIsInJlc3VsdCIsImVhY2giLCJpbmRleCIsInZhbHVlIiwicHVzaCIsInRlYWNoZXJfaWQiLCJ0ZWFjaGVyX25hbWUiLCJyZXN1bHRzIiwibWluaW11bUlucHV0TGVuZ3RoIiwiZGF0ZXBpY2tlciIsImZvcm1hdCIsInZpZXdNb2RlIiwibWluVmlld01vZGUiLCJhdXRvY2xvc2UiLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImFuc3dlciIsImNvbmZpcm0iLCJjbG9zZXN0Iiwic3VibWl0IiwiX2ZpeF9ib29zdHJhcF9maWxlX2xvYWRlciIsIl9fdXBkYXRlX2xlc3Nvbl9mb3JtIiwiX2luaXRfZHluYW1pY19jb2xsZWN0aW9uIiwiX2luaXRfcmF0aW5nIiwiZm4iLCIkdGhhdCIsIiRmaWxlbmFtZSIsInZhbCIsInNwbGl0IiwicG9wIiwicGFyZW50IiwiZmluZCIsInRleHQiLCJqUXVlcnkiLCIkdGhpcyIsInByb3RvdHlwZSIsImxlbmd0aCIsIl9pbml0X2R5bmFtaWNfY29sbGVjdGlvbl9kZWxldGUiLCJuZXdGb3JtIiwicmVwbGFjZSIsImluc2VydEJlZm9yZSIsImNsaWNrIiwicmVtb3ZlIiwiZWxlbWVudHMiLCJ3aW5kb3ciLCJyb19hamF4X2FwaV9yb3prbGFkX2lkIiwiZG9uZSIsIiRkaXYiLCJhcHBlbmQiLCJmaWVsZEhvdXJzV3JhcCIsImZpZWxkRXZhbHVhdGlvbldyYXAiLCJmaWVsZEhvdXJzIiwiZmllbGRFdmFsdWF0aW9uIiwibWV0aG9kIiwicm9fYWpheF9saXN0X2xlc3Nvbl90eXBlIiwib2xkSWQiLCJwYXJzZUludCIsIm9sZExlc3NvbiIsImZvckVhY2giLCJpdGVtIiwiaWQiLCJkZWZhdWx0SG91cnMiLCJzaG93IiwicHJvcCIsImlzRXZhbHVhdGVkIiwiaGlkZSIsImxlc3NvbiJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0FBLG1CQUFPLENBQUMsZ0RBQUQsQ0FBUCxDLENBQ0E7QUFFQTs7O0FBQ0E7QUFFQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBRUFDLDZDQUFDLENBQUMsWUFBTTtBQUNKQSwrQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsT0FBakI7QUFDQUQsK0NBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCQyxPQUFyQixDQUE2QjtBQUN6QkMsUUFBSSxFQUFFO0FBQ0ZDLFNBQUcsRUFBRSx5Q0FESDtBQUVGQyxjQUFRLEVBQUUsTUFGUjtBQUdGQyxVQUFJLEVBQUUsY0FBVUMsTUFBVixFQUFrQjtBQUNwQixlQUFPO0FBQ0hDLGdCQUFNLEVBQUUsZUFBZUQsTUFBTSxDQUFDRSxJQUF0QixHQUE2QixJQURsQztBQUVIQyxZQUFFLHNCQUFlSCxNQUFNLENBQUNFLElBQXRCLE9BRkMsQ0FHSDtBQUNBO0FBQ0E7O0FBTEcsU0FBUDtBQU9ILE9BWEM7QUFZRkUsb0JBQWMsRUFBRSx3QkFBVUwsSUFBVixFQUFnQjtBQUM1Qk0sZUFBTyxDQUFDQyxHQUFSLENBQVlQLElBQUksQ0FBQ0EsSUFBakI7QUFFQSxZ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RUFBd0MsWUFBWTtBQUNoRCxZQUFJK0MsRUFBRSxHQUFHSixRQUFRLENBQUMsS0FBS3RELEtBQU4sQ0FBakI7QUFDQSxZQUFJZ0UsTUFBTSxHQUFHLElBQWI7QUFDQWYsa0JBQVUsQ0FBQ3hCLEdBQVgsQ0FBZSxJQUFmO0FBQ0F5Qix1QkFBZSxDQUFDekIsR0FBaEIsQ0FBb0IsSUFBcEI7QUFFQXBDLFlBQUksQ0FBQ21FLE9BQUwsQ0FBYSxVQUFTQyxJQUFULEVBQWU7QUFDeEJPLGdCQUFNLEdBQUdQLElBQUksQ0FBQ0MsRUFBTCxLQUFZQSxFQUFaLEdBQWlCRCxJQUFqQixHQUF3Qk8sTUFBakM7QUFDSCxTQUZEOztBQUlBLFlBQUlBLE1BQUosRUFBWTtBQUNSLGNBQUlBLE1BQU0sQ0FBQ0wsWUFBUCxLQUF3QixJQUE1QixFQUFrQztBQUM5QlosMEJBQWMsQ0FBQ2EsSUFBZjtBQUNBWCxzQkFBVSxDQUFDWSxJQUFYLENBQWdCLFVBQWhCLEVBQTRCLEtBQTVCO0FBQ0gsV0FIRCxNQUdPO0FBQ0hkLDBCQUFjLENBQUNhLElBQWY7QUFDQVgsc0JBQVUsQ0FBQ1ksSUFBWCxDQUFnQixVQUFoQixFQUE0QixVQUE1QjtBQUNBWixzQkFBVSxDQUFDeEIsR0FBWCxDQUFldUMsTUFBTSxDQUFDTCxZQUF0QjtBQUNIOztBQUVELGNBQUlLLE1BQU0sQ0FBQ0YsV0FBUCxLQUF1QixJQUEzQixFQUFpQztBQUM3QmQsK0JBQW1CLENBQUNZLElBQXBCLEdBRDZCLENBRTdCO0FBQ0gsV0FIRCxNQUdPO0FBQ0haLCtCQUFtQixDQUFDZSxJQUFwQixHQURHLENBRUg7QUFDSDtBQUNKO0FBQ0osT0E1QkQ7QUE2QkgsS0EzREQ7QUE0REgsR0FuRUQ7QUFvRUgsQ0FyRUQsRUFxRUdoQyxNQXJFSCxFOzs7Ozs7Ozs7Ozs7QUNBQSx1QyIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cbnJlcXVpcmUoJy4uL3Njc3MvYXBwLnNjc3MnKTtcbi8vIHJlcXVpcmUoJ3Byb2dyZXNzYmFyJyk7XG5cbi8vIE5lZWQgalF1ZXJ5PyBJbnN0YWxsIGl0IHdpdGggXCJ5YXJuIGFkZCBqcXVlcnlcIiwgdGhlbiB1bmNvbW1lbnQgdG8gaW1wb3J0IGl0LlxuaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcblxuaW1wb3J0ICdzZWxlY3QyJztcbmltcG9ydCAnc2VsZWN0Mi9kaXN0L2Nzcy9zZWxlY3QyLmNzcyc7XG5cbmltcG9ydCAnYm9vdHN0cmFwJztcbmltcG9ydCAnYm9vdHN0cmFwLWRhdGVwaWNrZXInO1xuaW1wb3J0ICdib290c3RyYXAtZGF0ZXBpY2tlci9kaXN0L2xvY2FsZXMvYm9vdHN0cmFwLWRhdGVwaWNrZXIudWsubWluJztcbmltcG9ydCAnYm9vdHN0cmFwLWRhdGVwaWNrZXIvZGlzdC9jc3MvYm9vdHN0cmFwLWRhdGVwaWNrZXIzLmNzcyc7XG5pbXBvcnQgJ2Jvb3RzdHJhcC1kYXRlcGlja2VyL2Rpc3QvY3NzL2Jvb3RzdHJhcC1kYXRlcGlja2VyMy5zdGFuZGFsb25lLmNzcyc7XG5cbmltcG9ydCAnLi9maXhfYm9vdHN0cmFwX2ZpbGVfbG9hZGVyJztcbmltcG9ydCAnLi91cGRhdGVMZXNzb25Gb3JtJztcbmltcG9ydCAnLi9qcy1jb2xsZWN0aW9uJztcbmltcG9ydCAnLi9yYXRpbmcnO1xuXG4kKCgpID0+IHtcbiAgICAkKCcuanMtc2VsZWN0MicpLnNlbGVjdDIoKTtcbiAgICAkKCcuanMtYXBpLXNlbGVjdDInKS5zZWxlY3QyKHtcbiAgICAgICAgYWpheDoge1xuICAgICAgICAgICAgdXJsOiAnaHR0cHM6Ly9hcGkucm96a2xhZC5vcmcudWEvdjIvdGVhY2hlcnMvJyxcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnanNvbicsXG4gICAgICAgICAgICBkYXRhOiBmdW5jdGlvbiAocGFyYW1zKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgICAgICAgICAgc2VhcmNoOiBcInsncXVlcnknOidcIiArIHBhcmFtcy50ZXJtICsgXCInfVwiLFxuICAgICAgICAgICAgICAgICAgICBzczogYHsncXVlcnknOicke3BhcmFtcy50ZXJtfSd9YFxuICAgICAgICAgICAgICAgICAgICAvLyBzZWFyY2g6IHtcbiAgICAgICAgICAgICAgICAgICAgLy8gICAgICdxdWVyeSc6IHBhcmFtcy50ZXJtXG4gICAgICAgICAgICAgICAgICAgIC8vIH1cbiAgICAgICAgICAgICAgICB9O1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHByb2Nlc3NSZXN1bHRzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEuZGF0YSk7XG5cbiAgICAgICAgICAgICAgICBsZXQgcmVzdWx0ID0gW107XG5cbiAgICAgICAgICAgICAgICAkLmVhY2goZGF0YS5kYXRhLCBmdW5jdGlvbiggaW5kZXgsIHZhbHVlICkge1xuICAgICAgICAgICAgICAgICAgICByZXN1bHQucHVzaCh7XG4gICAgICAgICAgICAgICAgICAgICAgICAnaWQnOiB2YWx1ZS50ZWFjaGVyX2lkLFxuICAgICAgICAgICAgICAgICAgICAgICAgJ3RleHQnOiBgJHt2YWx1ZS50ZWFjaGVyX25hbWV9ICgke3ZhbHVlLnRlYWNoZXJfaWR9KWBcbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAvLyBUcmFuc2Zvcm1zIHRoZSB0b3AtbGV2ZWwga2V5IG9mIHRoZSByZXNwb25zZSBvYmplY3QgZnJvbSAnaXRlbXMnIHRvICdyZXN1bHRzJ1xuICAgICAgICAgICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICAgICAgICAgIHJlc3VsdHM6IHJlc3VsdFxuICAgICAgICAgICAgICAgIH07XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICAvLyBBZGRpdGlvbmFsIEFKQVggcGFyYW1ldGVycyBnbyBoZXJlOyBzZWUgdGhlIGVuZCBvZiB0aGlzIGNoYXB0ZXIgZm9yIHRoZSBmdWxsIGNvZGUgb2YgdGhpcyBleGFtcGxlXG4gICAgICAgIH0sXG4gICAgICAgIG1pbmltdW1JbnB1dExlbmd0aDogMyxcbiAgICB9KTtcblxuICAgICQoJy5qcy1kYXRlcGlja2VyJykuZGF0ZXBpY2tlcih7XG4gICAgICAgIGZvcm1hdDogXCJNTSB5eXl5XCIsXG4gICAgICAgIHZpZXdNb2RlOiBcIm1vbnRoc1wiLFxuICAgICAgICBtaW5WaWV3TW9kZTogXCJtb250aHNcIixcbiAgICAgICAgYXV0b2Nsb3NlOiB0cnVlLFxuICAgICAgICAvLyBsYW5ndWFnZTogJ3VrJ1xuICAgIH0pO1xuICAgICQoJy5qcy1kYXRlcGlja2VyLWZ1bGwnKS5kYXRlcGlja2VyKHtcbiAgICAgICAgLy8gbGFuZ3VhZ2U6ICd1aycsXG4gICAgICAgIGZvcm1hdDogXCJkZCBNTSB5eXl5XCIsXG4gICAgICAgIGF1dG9jbG9zZTogdHJ1ZVxuICAgIH0pO1xuXG4gICAgJCgnLmpzLXN1Ym1pdC1mb3JtJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBsZXQgYW5zd2VyPWNvbmZpcm0oJ0FyZSB5b3Ugc3VyZSB5b3Ugd2FudCB0byBkZWxldGUgdGhpcyBpdGVtPycpO1xuXG4gICAgICAgIGlmIChhbnN3ZXIpXG4gICAgICAgICAgICB0aGlzLmNsb3Nlc3QoJ2Zvcm0nKS5zdWJtaXQoKTtcbiAgICB9KTtcblxuICAgICQoJy5maXgtYm9vdHN0cmFwLWZpbGUnKS5fZml4X2Jvb3N0cmFwX2ZpbGVfbG9hZGVyKCk7XG4gICAgJCgnLmpzLXVwZGF0ZS1sZXNzb24tZm9ybScpLl9fdXBkYXRlX2xlc3Nvbl9mb3JtKCk7XG4gICAgJCgnLmpzLWR5bmFtaWMtY29sbGVjdGlvbicpLl9pbml0X2R5bmFtaWNfY29sbGVjdGlvbigpO1xuICAgICQoJy5qcy1keW5hbWljLWNvbGxlY3Rpb24yJykuX2luaXRfZHluYW1pY19jb2xsZWN0aW9uKCk7XG4gICAgJCgnLmpzLXJhdGluZycpLl9pbml0X3JhdGluZygpO1xufSk7XG4iLCIoZnVuY3Rpb24gKCQpIHtcbiAgICAkLmZuLl9maXhfYm9vc3RyYXBfZmlsZV9sb2FkZXIgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCAkdGhhdCA9IHRoaXM7XG5cbiAgICAgICAgdGhpcy5vbignY2hhbmdlJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgbGV0ICRmaWxlbmFtZSA9ICR0aGF0LnZhbCgpLnNwbGl0KCdcXFxcJykucG9wKCk7XG4gICAgICAgICAgICAkdGhhdC5wYXJlbnQoKS5maW5kKCcuY3VzdG9tLWZpbGUtbGFiZWwnKS50ZXh0KCRmaWxlbmFtZSk7XG4gICAgICAgICAgICAkdGhhdC5wYXJlbnQoKS5wYXJlbnQoKS5wYXJlbnQoKS5maW5kKCdpbnB1dFtuYW1lKj1cInJlYWxGaWxlbmFtZVwiXScpLnZhbCgkZmlsZW5hbWUpO1xuICAgICAgICB9KVxuICAgIH1cbn0pKGpRdWVyeSk7XG4iLCIoZnVuY3Rpb24gKCQpIHtcbiAgICAkLmZuLl9pbml0X2R5bmFtaWNfY29sbGVjdGlvbiA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0ICR0aGlzID0gJCh0aGlzKTtcblxuICAgICAgICAvLyBHZXQgdGhlIHByb3RvdHlwZVxuICAgICAgICBsZXQgcHJvdG90eXBlID0gJHRoaXMuZGF0YSgncHJvdG90eXBlJyk7XG5cbiAgICAgICAgLy8gU2V0IHRoZSBpbml0aWFsIGluZGV4IG9mIHRoaXMgY29udGFpbmVyXG4gICAgICAgICR0aGlzLmRhdGEoJ2luZGV4JywgJHRoaXMuZmluZCgnbGknKS5sZW5ndGgpO1xuXG4gICAgICAgIC8vIFdoZW4gdGhlIGRlbGV0ZSBsaW5rIG9mIGFueSBleGlzdGluZyBpdGVtcyBpcyBjbGlja2VkLCBkZWxldGUgaXRzIHByb3RvdHlwZVxuICAgICAgICAkdGhpcy5maW5kKCcuZHluYW1pYy1jb2xsZWN0aW9uLWl0ZW0tZGVsZXRlJykuX2luaXRfZHluYW1pY19jb2xsZWN0aW9uX2RlbGV0ZSgpO1xuXG4gICAgICAgICR0aGlzLmZpbmQoJy5keW5hbWljLWNvbGxlY3Rpb24taXRlbS1hZGQnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCh0cnVlKTtcblxuICAgICAgICAgICAgLy8gR3JhYiB0aGUgaW5kZXhcbiAgICAgICAgICAgIGxldCBpbmRleCA9ICR0aGlzLmRhdGEoJ2luZGV4Jyk7XG5cbiAgICAgICAgICAgIC8vIENsb25lIHRoZSBwcm90b3R5cGVcbiAgICAgICAgICAgIGxldCBuZXdGb3JtID0gcHJvdG90eXBlLnJlcGxhY2UoL19fbmFtZV9fL2csIGluZGV4KTtcblxuICAgICAgICAgICAgLy8gSW5jcmVtZW50IHRoZSBpbmRleFxuICAgICAgICAgICAgJHRoaXMuZGF0YSgnaW5kZXgnLCBpbmRleCArIDEpO1xuXG4gICAgICAgICAgICAvLyBJbnNlcnQgdGhlIHByb3RvdHlwZSBiZWZvcmUgdGhlIGFkZCBidXR0b25cbiAgICAgICAgICAgIG5ld0Zvcm0gPSAkKG5ld0Zvcm0pLmluc2VydEJlZm9yZSgkKHRoaXMpKTtcblxuICAgICAgICAgICAgLy8gV2hlbiB0aGUgZGVsZXRlIGxpbmsgaXMgY2xpY2tlZCwgZGVsZXRlIHRoaXMgcHJvdG90eXBlXG4gICAgICAgICAgICBuZXdGb3JtLmZpbmQoJy5keW5hbWljLWNvbGxlY3Rpb24taXRlbS1kZWxldGUnKS5faW5pdF9keW5hbWljX2NvbGxlY3Rpb25fZGVsZXRlKCk7XG5cbiAgICAgICAgICAgIC8vIEF2b2lkIGZvbGxvd2luZyBhIGxpbmsgdG8gdGhlIHRvcCBvZiB0aGUgcGFnZVxuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9KVxuICAgIH07XG5cbiAgICAkLmZuLl9pbml0X2R5bmFtaWNfY29sbGVjdGlvbl9kZWxldGUgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdGhpcy5jbGljayhmdW5jdGlvbihlKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KHRydWUpO1xuICAgICAgICAgICAgLy8gUmVtb3ZlIGNsb3Nlc3QgcHJvdG90eXBlXG4gICAgICAgICAgICAkKHRoaXMpLmNsb3Nlc3QoJy5keW5hbWljLWNvbGxlY3Rpb24taXRlbScpLnJlbW92ZSgpO1xuXG4gICAgICAgICAgICAvLyBBdm9pZCBmb2xsb3dpbmcgYSBsaW5rIHRvIHRoZSB0b3Agb2YgdGhlIHBhZ2VcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfSk7XG4gICAgfTtcbn0pKGpRdWVyeSk7XG4iLCIoZnVuY3Rpb24gKCQpIHtcbiAgICBsZXQgZWxlbWVudHMgPSBbXG4gICAgICAgICdtYXJrX2F2Z19leGFjdGluZ25lc3MnLFxuICAgICAgICAnbWFya19hdmdfa25vd2xlZGdlX3N1YmplY3QnLFxuICAgICAgICAnbWFya19hdmdfcmVsYXRpb25fdG9fdGhlX3N0dWRlbnQnLFxuICAgICAgICAnbWFya19hdmdfc2Vuc2Vfb2ZfaHVtb3InXG4gICAgXTtcblxuICAgICQuZm4uX2luaXRfcmF0aW5nID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBsZXQgJHRoYXQgPSB0aGlzO1xuXG4gICAgICAgIGlmICh3aW5kb3cucm9fYWpheF9hcGlfcm96a2xhZF9pZCkge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6ICdodHRwczovL2FwaS5yb3prbGFkLm9yZy51YS92Mi90ZWFjaGVycy8nICsgd2luZG93LnJvX2FqYXhfYXBpX3JvemtsYWRfaWQgKyAnL3JhdGluZycsXG4gICAgICAgICAgICB9KS5kb25lKGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAgICAgJC5lYWNoKGVsZW1lbnRzLCBmdW5jdGlvbiAoaW5kZXgsIHZhbHVlKSB7XG4gICAgICAgICAgICAgICAgICAgIGxldCAkZGl2ID0gJHRoYXQuZmluZCgnLicgKyB2YWx1ZSk7XG4gICAgICAgICAgICAgICAgICAgICRkaXYuYXBwZW5kKGRhdGEuZGF0YVt2YWx1ZV0pO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9XG59KShqUXVlcnkpO1xuIiwiKGZ1bmN0aW9uICgkKSB7XG4gICAgJC5mbi5fX3VwZGF0ZV9sZXNzb25fZm9ybSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0ICR0aGF0ID0gdGhpcyxcbiAgICAgICAgICAgIGZpZWxkSG91cnNXcmFwID0gJHRoYXQuZmluZCgnI2xlc3Nvbl9ob3VycycpLmNsb3Nlc3QoJy5mb3JtLWdyb3VwJyksXG4gICAgICAgICAgICBmaWVsZEV2YWx1YXRpb25XcmFwID0gJHRoYXQuZmluZCgnI2xlc3Nvbl9ldmFsdWF0aW9uVHlwZScpLmNsb3Nlc3QoJy5mb3JtLWdyb3VwJyksXG4gICAgICAgICAgICBmaWVsZEhvdXJzID0gJHRoYXQuZmluZCgnI2xlc3Nvbl9ob3VycycpLFxuICAgICAgICAgICAgZmllbGRFdmFsdWF0aW9uID0gJHRoYXQuZmluZCgnI2xlc3Nvbl9ldmFsdWF0aW9uVHlwZScpO1xuXG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICBtZXRob2Q6ICdHRVQnLFxuICAgICAgICAgICAgdXJsOiB3aW5kb3cucm9fYWpheF9saXN0X2xlc3Nvbl90eXBlLFxuICAgICAgICB9KS5kb25lKGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgICAgICAgIGxldCBvbGRJZCA9IHBhcnNlSW50KCR0aGF0LmZpbmQoJyNsZXNzb25fdHlwZScpLnZhbCgpKTtcbiAgICAgICAgICAgIGxldCBvbGRMZXNzb24gPSBudWxsO1xuXG4gICAgICAgICAgICBkYXRhLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgICAgICAgICAgICAgIG9sZExlc3NvbiA9IGl0ZW0uaWQgPT09IG9sZElkID8gaXRlbSA6IG9sZExlc3NvbjtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICBpZiAob2xkTGVzc29uKSB7XG4gICAgICAgICAgICAgICAgaWYgKG9sZExlc3Nvbi5kZWZhdWx0SG91cnMgPT09IG51bGwpIHtcbiAgICAgICAgICAgICAgICAgICAgZmllbGRIb3Vyc1dyYXAuc2hvdygpO1xuICAgICAgICAgICAgICAgICAgICBmaWVsZEhvdXJzLnByb3AoJ3JlYWRvbmx5JywgZmFsc2UpO1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnNXcmFwLnNob3coKTtcbiAgICAgICAgICAgICAgICAgICAgZmllbGRIb3Vycy5wcm9wKCdyZWFkb25seScsICdyZWFkb25seScpO1xuICAgICAgICAgICAgICAgICAgICAvLyBmaWVsZEhvdXJzLnZhbChvbGRMZXNzb24uZGVmYXVsdEhvdXJzKTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICBpZiAob2xkTGVzc29uLmlzRXZhbHVhdGVkID09PSB0cnVlKSB7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkRXZhbHVhdGlvbldyYXAuc2hvdygpO1xuICAgICAgICAgICAgICAgICAgICAvLyBmaWVsZEV2YWx1YXRpb24ucHJvcCgncmVxdWlyZWQnLCB0cnVlKTtcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICBmaWVsZEV2YWx1YXRpb25XcmFwLmhpZGUoKTtcbiAgICAgICAgICAgICAgICAgICAgLy8gZmllbGRFdmFsdWF0aW9uLnByb3AoJ3JlcXVpcmVkJywgZmFsc2UpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgJHRoYXQuZmluZCgnI2xlc3Nvbl90eXBlJykub24oJ2NoYW5nZScsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBsZXQgaWQgPSBwYXJzZUludCh0aGlzLnZhbHVlKTtcbiAgICAgICAgICAgICAgICBsZXQgbGVzc29uID0gbnVsbDtcbiAgICAgICAgICAgICAgICBmaWVsZEhvdXJzLnZhbChudWxsKTtcbiAgICAgICAgICAgICAgICBmaWVsZEV2YWx1YXRpb24udmFsKG51bGwpO1xuXG4gICAgICAgICAgICAgICAgZGF0YS5mb3JFYWNoKGZ1bmN0aW9uKGl0ZW0pIHtcbiAgICAgICAgICAgICAgICAgICAgbGVzc29uID0gaXRlbS5pZCA9PT0gaWQgPyBpdGVtIDogbGVzc29uO1xuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgaWYgKGxlc3Nvbikge1xuICAgICAgICAgICAgICAgICAgICBpZiAobGVzc29uLmRlZmF1bHRIb3VycyA9PT0gbnVsbCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgZmllbGRIb3Vyc1dyYXAuc2hvdygpO1xuICAgICAgICAgICAgICAgICAgICAgICAgZmllbGRIb3Vycy5wcm9wKCdyZWFkb25seScsIGZhbHNlKTtcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnNXcmFwLnNob3coKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnMucHJvcCgncmVhZG9ubHknLCAncmVhZG9ubHknKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnMudmFsKGxlc3Nvbi5kZWZhdWx0SG91cnMpO1xuICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgaWYgKGxlc3Nvbi5pc0V2YWx1YXRlZCA9PT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgZmllbGRFdmFsdWF0aW9uV3JhcC5zaG93KCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBmaWVsZEV2YWx1YXRpb24ucHJvcCgncmVxdWlyZWQnLCB0cnVlKTtcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkRXZhbHVhdGlvbldyYXAuaGlkZSgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gZmllbGRFdmFsdWF0aW9uLnByb3AoJ3JlcXVpcmVkJywgZmFsc2UpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSlcbiAgICAgICAgfSk7XG4gICAgfVxufSkoalF1ZXJ5KTtcbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=