(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_concat__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.concat */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat__WEBPACK_IMPORTED_MODULE_0__);
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

  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.js-rating')._init_rating();
});

/***/ }),

/***/ "./assets/js/fix_bootstrap_file_loader.js":
/*!************************************************!*\
  !*** ./assets/js/fix_bootstrap_file_loader.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.split */ "./node_modules/core-js/modules/es.string.split.js");

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

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace */ "./node_modules/core-js/modules/es.string.replace.js");

(function ($) {
  $.fn._init_dynamic_collection = function () {
    var $this = $(this); // Get the prototype

    var prototype = $this.data('prototype'); // Set the initial index of this container

    $this.data('index', $this.find('li').length); // When the delete link of any existing items is clicked, delete its prototype

    $this.find('.dynamic-collection-item-delete')._init_dynamic_collection_delete();

    $this.find('.dynamic-collection-item-add').on('click', function (e) {
      e.preventDefault(true);
      console.log('ffff'); // Grab the index

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

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");

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

/* WEBPACK VAR INJECTION */(function(jQuery) {__webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.array.for-each */ "./node_modules/core-js/modules/es.array.for-each.js");

__webpack_require__(/*! core-js/modules/es.parse-int */ "./node_modules/core-js/modules/es.parse-int.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.for-each */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9maXhfYm9vdHN0cmFwX2ZpbGVfbG9hZGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9qcy1jb2xsZWN0aW9uLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9yYXRpbmcuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3VwZGF0ZUxlc3NvbkZvcm0uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3Njc3MvYXBwLnNjc3MiXSwibmFtZXMiOlsicmVxdWlyZSIsIiQiLCJzZWxlY3QyIiwiYWpheCIsInVybCIsImRhdGFUeXBlIiwiZGF0YSIsInBhcmFtcyIsInNlYXJjaCIsInRlcm0iLCJzcyIsInByb2Nlc3NSZXN1bHRzIiwiY29uc29sZSIsImxvZyIsInJlc3VsdCIsImVhY2giLCJpbmRleCIsInZhbHVlIiwicHVzaCIsInRlYWNoZXJfaWQiLCJ0ZWFjaGVyX25hbWUiLCJyZXN1bHRzIiwibWluaW11bUlucHV0TGVuZ3RoIiwiZGF0ZXBpY2tlciIsImZvcm1hdCIsInZpZXdNb2RlIiwibWluVmlld01vZGUiLCJhdXRvY2xvc2UiLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImFuc3dlciIsImNvbmZpcm0iLCJjbG9zZXN0Iiwic3VibWl0IiwiX2ZpeF9ib29zdHJhcF9maWxlX2xvYWRlciIsIl9fdXBkYXRlX2xlc3Nvbl9mb3JtIiwiX2luaXRfZHluYW1pY19jb2xsZWN0aW9uIiwiX2luaXRfcmF0aW5nIiwiZm4iLCIkdGhhdCIsIiRmaWxlbmFtZSIsInZhbCIsInNwbGl0IiwicG9wIiwicGFyZW50IiwiZmluZCIsInRleHQiLCJqUXVlcnkiLCIkdGhpcyIsInByb3RvdHlwZSIsImxlbmd0aCIsIl9pbml0X2R5bmFtaWNfY29sbGVjdGlvbl9kZWxldGUiLCJuZXdGb3JtIiwicmVwbGFjZSIsImluc2VydEJlZm9yZSIsImNsaWNrIiwicmVtb3ZlIiwiZWxlbWVudHMiLCJ3aW5kb3ciLCJyb19hamF4X2FwaV9yb3prbGFkX2lkIiwiZG9uZSIsIiRkaXYiLCJhcHBlbmQiLCJmaWVsZEhvdXJzV3JhcCIsImZpZWxkRXZhbHVhdGlvbldyYXAiLCJmaWVsZEhvdXJzIiwiZmllbGRFdmFsdWF0aW9uIiwibWV0aG9kIiwicm9fYWpheF9saXN0X2xlc3Nvbl90eXBlIiwib2xkSWQiLCJwYXJzZUludCIsIm9sZExlc3NvbiIsImZvckVhY2giLCJpdGVtIiwiaWQiLCJkZWZhdWx0SG91cnMiLCJzaG93IiwicHJvcCIsImlzRXZhbHVhdGVkIiwiaGlkZSIsImxlc3NvbiJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7Ozs7OztBQU1BQSxtQkFBTyxDQUFDLGdEQUFELENBQVAsQyxDQUNBO0FBRUE7OztBQUNBO0FBRUE7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUVBQyw2Q0FBQyxDQUFDLFlBQU07QUFDSkEsK0NBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJDLE9BQWpCO0FBQ0FELCtDQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQkMsT0FBckIsQ0FBNkI7QUFDekJDLFFBQUksRUFBRTtBQUNGQyxTQUFHLEVBQUUseUNBREg7QUFFRkMsY0FBUSxFQUFFLE1BRlI7QUFHRkMsVUFBSSxFQUFFLGNBQVVDLE1BQVYsRUFBa0I7QUFDcEIsZUFBTztBQUNIQyxnQkFBTSxFQUFFLGVBQWVELE1BQU0sQ0FBQ0UsSUFBdEIsR0FBNkIsSUFEbEM7QUFFSEMsWUFBRSxzQkFBZUgsTUFBTSxDQUFDRSxJQUF0QixPQUZDLENBR0g7QUFDQTtBQUNBOztBQUxHLFNBQVA7QUFPSCxPQVhDO0FBWUZFLG9CQUFjLEVBQUUsd0JBQVVMLElBQVYsRUFBZ0I7QUFDNUJNLGVBQU8sQ0FBQ0MsR0FBUixDQUFZUCxJQUFJLENBQUNBLElBQWpCO0FBRUEsWUFBSVEsTUFBTSxHQUFHLEVBQWI7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R0osUUFBUSxDQUFDLEtBQUt0RCxLQUFOLENBQWpCO0FBQ0EsWUFBSWdFLE1BQU0sR0FBRyxJQUFiO0FBQ0FmLGtCQUFVLENBQUN4QixHQUFYLENBQWUsSUFBZjtBQUNBeUIsdUJBQWUsQ0FBQ3pCLEdBQWhCLENBQW9CLElBQXBCO0FBRUFwQyxZQUFJLENBQUNtRSxPQUFMLENBQWEsVUFBU0MsSUFBVCxFQUFlO0FBQ3hCTyxnQkFBTSxHQUFHUCxJQUFJLENBQUNDLEVBQUwsS0FBWUEsRUFBWixHQUFpQkQsSUFBakIsR0FBd0JPLE1BQWpDO0FBQ0gsU0FGRDs7QUFJQSxZQUFJQSxNQUFKLEVBQVk7QUFDUixjQUFJQSxNQUFNLENBQUNMLFlBQVAsS0FBd0IsSUFBNUIsRUFBa0M7QUFDOUJaLDBCQUFjLENBQUNhLElBQWY7QUFDQVgsc0JBQVUsQ0FBQ1ksSUFBWCxDQUFnQixVQUFoQixFQUE0QixLQUE1QjtBQUNILFdBSEQsTUFHTztBQUNIZCwwQkFBYyxDQUFDYSxJQUFmO0FBQ0FYLHNCQUFVLENBQUNZLElBQVgsQ0FBZ0IsVUFBaEIsRUFBNEIsVUFBNUI7QUFDQVosc0JBQVUsQ0FBQ3hCLEdBQVgsQ0FBZXVDLE1BQU0sQ0FBQ0wsWUFBdEI7QUFDSDs7QUFFRCxjQUFJSyxNQUFNLENBQUNGLFdBQVAsS0FBdUIsSUFBM0IsRUFBaUM7QUFDN0JkLCtCQUFtQixDQUFDWSxJQUFwQixHQUQ2QixDQUU3QjtBQUNILFdBSEQsTUFHTztBQUNIWiwrQkFBbUIsQ0FBQ2UsSUFBcEIsR0FERyxDQUVIO0FBQ0g7QUFDSjtBQUNKLE9BNUJEO0FBNkJILEtBM0REO0FBNERILEdBbkVEO0FBb0VILENBckVELEVBcUVHaEMsTUFyRUgsRTs7Ozs7Ozs7Ozs7O0FDQUEsdUMiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5yZXF1aXJlKCcuLi9zY3NzL2FwcC5zY3NzJyk7XG4vLyByZXF1aXJlKCdwcm9ncmVzc2JhcicpO1xuXG4vLyBOZWVkIGpRdWVyeT8gSW5zdGFsbCBpdCB3aXRoIFwieWFybiBhZGQganF1ZXJ5XCIsIHRoZW4gdW5jb21tZW50IHRvIGltcG9ydCBpdC5cbmltcG9ydCAkIGZyb20gJ2pxdWVyeSc7XG5cbmltcG9ydCAnc2VsZWN0Mic7XG5pbXBvcnQgJ3NlbGVjdDIvZGlzdC9jc3Mvc2VsZWN0Mi5jc3MnO1xuXG5pbXBvcnQgJ2Jvb3RzdHJhcCc7XG5pbXBvcnQgJ2Jvb3RzdHJhcC1kYXRlcGlja2VyJztcbmltcG9ydCAnYm9vdHN0cmFwLWRhdGVwaWNrZXIvZGlzdC9sb2NhbGVzL2Jvb3RzdHJhcC1kYXRlcGlja2VyLnVrLm1pbic7XG5pbXBvcnQgJ2Jvb3RzdHJhcC1kYXRlcGlja2VyL2Rpc3QvY3NzL2Jvb3RzdHJhcC1kYXRlcGlja2VyMy5jc3MnO1xuaW1wb3J0ICdib290c3RyYXAtZGF0ZXBpY2tlci9kaXN0L2Nzcy9ib290c3RyYXAtZGF0ZXBpY2tlcjMuc3RhbmRhbG9uZS5jc3MnO1xuXG5pbXBvcnQgJy4vZml4X2Jvb3RzdHJhcF9maWxlX2xvYWRlcic7XG5pbXBvcnQgJy4vdXBkYXRlTGVzc29uRm9ybSc7XG5pbXBvcnQgJy4vanMtY29sbGVjdGlvbic7XG5pbXBvcnQgJy4vcmF0aW5nJztcblxuJCgoKSA9PiB7XG4gICAgJCgnLmpzLXNlbGVjdDInKS5zZWxlY3QyKCk7XG4gICAgJCgnLmpzLWFwaS1zZWxlY3QyJykuc2VsZWN0Mih7XG4gICAgICAgIGFqYXg6IHtcbiAgICAgICAgICAgIHVybDogJ2h0dHBzOi8vYXBpLnJvemtsYWQub3JnLnVhL3YyL3RlYWNoZXJzLycsXG4gICAgICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxuICAgICAgICAgICAgZGF0YTogZnVuY3Rpb24gKHBhcmFtcykge1xuICAgICAgICAgICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICAgICAgICAgIHNlYXJjaDogXCJ7J3F1ZXJ5JzonXCIgKyBwYXJhbXMudGVybSArIFwiJ31cIixcbiAgICAgICAgICAgICAgICAgICAgc3M6IGB7J3F1ZXJ5JzonJHtwYXJhbXMudGVybX0nfWBcbiAgICAgICAgICAgICAgICAgICAgLy8gc2VhcmNoOiB7XG4gICAgICAgICAgICAgICAgICAgIC8vICAgICAncXVlcnknOiBwYXJhbXMudGVybVxuICAgICAgICAgICAgICAgICAgICAvLyB9XG4gICAgICAgICAgICAgICAgfTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBwcm9jZXNzUmVzdWx0czogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhLmRhdGEpO1xuXG4gICAgICAgICAgICAgICAgbGV0IHJlc3VsdCA9IFtdO1xuXG4gICAgICAgICAgICAgICAgJC5lYWNoKGRhdGEuZGF0YSwgZnVuY3Rpb24oIGluZGV4LCB2YWx1ZSApIHtcbiAgICAgICAgICAgICAgICAgICAgcmVzdWx0LnB1c2goe1xuICAgICAgICAgICAgICAgICAgICAgICAgJ2lkJzogdmFsdWUudGVhY2hlcl9pZCxcbiAgICAgICAgICAgICAgICAgICAgICAgICd0ZXh0JzogYCR7dmFsdWUudGVhY2hlcl9uYW1lfSAoJHt2YWx1ZS50ZWFjaGVyX2lkfSlgXG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgLy8gVHJhbnNmb3JtcyB0aGUgdG9wLWxldmVsIGtleSBvZiB0aGUgcmVzcG9uc2Ugb2JqZWN0IGZyb20gJ2l0ZW1zJyB0byAncmVzdWx0cydcbiAgICAgICAgICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgICAgICAgICByZXN1bHRzOiByZXN1bHRcbiAgICAgICAgICAgICAgICB9O1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgLy8gQWRkaXRpb25hbCBBSkFYIHBhcmFtZXRlcnMgZ28gaGVyZTsgc2VlIHRoZSBlbmQgb2YgdGhpcyBjaGFwdGVyIGZvciB0aGUgZnVsbCBjb2RlIG9mIHRoaXMgZXhhbXBsZVxuICAgICAgICB9LFxuICAgICAgICBtaW5pbXVtSW5wdXRMZW5ndGg6IDMsXG4gICAgfSk7XG5cbiAgICAkKCcuanMtZGF0ZXBpY2tlcicpLmRhdGVwaWNrZXIoe1xuICAgICAgICBmb3JtYXQ6IFwiTU0geXl5eVwiLFxuICAgICAgICB2aWV3TW9kZTogXCJtb250aHNcIixcbiAgICAgICAgbWluVmlld01vZGU6IFwibW9udGhzXCIsXG4gICAgICAgIGF1dG9jbG9zZTogdHJ1ZSxcbiAgICAgICAgLy8gbGFuZ3VhZ2U6ICd1aydcbiAgICB9KTtcbiAgICAkKCcuanMtZGF0ZXBpY2tlci1mdWxsJykuZGF0ZXBpY2tlcih7XG4gICAgICAgIC8vIGxhbmd1YWdlOiAndWsnLFxuICAgICAgICBmb3JtYXQ6IFwiZGQgTU0geXl5eVwiLFxuICAgICAgICBhdXRvY2xvc2U6IHRydWVcbiAgICB9KTtcblxuICAgICQoJy5qcy1zdWJtaXQtZm9ybScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgbGV0IGFuc3dlcj1jb25maXJtKCdBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gZGVsZXRlIHRoaXMgaXRlbT8nKTtcblxuICAgICAgICBpZiAoYW5zd2VyKVxuICAgICAgICAgICAgdGhpcy5jbG9zZXN0KCdmb3JtJykuc3VibWl0KCk7XG4gICAgfSk7XG5cbiAgICAkKCcuZml4LWJvb3RzdHJhcC1maWxlJykuX2ZpeF9ib29zdHJhcF9maWxlX2xvYWRlcigpO1xuICAgICQoJy5qcy11cGRhdGUtbGVzc29uLWZvcm0nKS5fX3VwZGF0ZV9sZXNzb25fZm9ybSgpO1xuICAgICQoJy5qcy1keW5hbWljLWNvbGxlY3Rpb24nKS5faW5pdF9keW5hbWljX2NvbGxlY3Rpb24oKTtcbiAgICAkKCcuanMtcmF0aW5nJykuX2luaXRfcmF0aW5nKCk7XG59KTtcbiIsIihmdW5jdGlvbiAoJCkge1xuICAgICQuZm4uX2ZpeF9ib29zdHJhcF9maWxlX2xvYWRlciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0ICR0aGF0ID0gdGhpcztcblxuICAgICAgICB0aGlzLm9uKCdjaGFuZ2UnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBsZXQgJGZpbGVuYW1lID0gJHRoYXQudmFsKCkuc3BsaXQoJ1xcXFwnKS5wb3AoKTtcbiAgICAgICAgICAgICR0aGF0LnBhcmVudCgpLmZpbmQoJy5jdXN0b20tZmlsZS1sYWJlbCcpLnRleHQoJGZpbGVuYW1lKTtcbiAgICAgICAgICAgICR0aGF0LnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpLmZpbmQoJ2lucHV0W25hbWUqPVwicmVhbEZpbGVuYW1lXCJdJykudmFsKCRmaWxlbmFtZSk7XG4gICAgICAgIH0pXG4gICAgfVxufSkoalF1ZXJ5KTtcbiIsIihmdW5jdGlvbiAoJCkge1xuICAgICQuZm4uX2luaXRfZHluYW1pY19jb2xsZWN0aW9uID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBsZXQgJHRoaXMgPSAkKHRoaXMpO1xuXG4gICAgICAgIC8vIEdldCB0aGUgcHJvdG90eXBlXG4gICAgICAgIGxldCBwcm90b3R5cGUgPSAkdGhpcy5kYXRhKCdwcm90b3R5cGUnKTtcblxuICAgICAgICAvLyBTZXQgdGhlIGluaXRpYWwgaW5kZXggb2YgdGhpcyBjb250YWluZXJcbiAgICAgICAgJHRoaXMuZGF0YSgnaW5kZXgnLCAkdGhpcy5maW5kKCdsaScpLmxlbmd0aCk7XG5cbiAgICAgICAgLy8gV2hlbiB0aGUgZGVsZXRlIGxpbmsgb2YgYW55IGV4aXN0aW5nIGl0ZW1zIGlzIGNsaWNrZWQsIGRlbGV0ZSBpdHMgcHJvdG90eXBlXG4gICAgICAgICR0aGlzLmZpbmQoJy5keW5hbWljLWNvbGxlY3Rpb24taXRlbS1kZWxldGUnKS5faW5pdF9keW5hbWljX2NvbGxlY3Rpb25fZGVsZXRlKCk7XG5cbiAgICAgICAgJHRoaXMuZmluZCgnLmR5bmFtaWMtY29sbGVjdGlvbi1pdGVtLWFkZCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KHRydWUpO1xuICAgICAgICAgICAgY29uc29sZS5sb2coJ2ZmZmYnKTtcbiAgICAgICAgICAgIC8vIEdyYWIgdGhlIGluZGV4XG4gICAgICAgICAgICBsZXQgaW5kZXggPSAkdGhpcy5kYXRhKCdpbmRleCcpO1xuXG4gICAgICAgICAgICAvLyBDbG9uZSB0aGUgcHJvdG90eXBlXG4gICAgICAgICAgICBsZXQgbmV3Rm9ybSA9IHByb3RvdHlwZS5yZXBsYWNlKC9fX25hbWVfXy9nLCBpbmRleCk7XG5cbiAgICAgICAgICAgIC8vIEluY3JlbWVudCB0aGUgaW5kZXhcbiAgICAgICAgICAgICR0aGlzLmRhdGEoJ2luZGV4JywgaW5kZXggKyAxKTtcblxuICAgICAgICAgICAgLy8gSW5zZXJ0IHRoZSBwcm90b3R5cGUgYmVmb3JlIHRoZSBhZGQgYnV0dG9uXG4gICAgICAgICAgICBuZXdGb3JtID0gJChuZXdGb3JtKS5pbnNlcnRCZWZvcmUoJCh0aGlzKSk7XG5cbiAgICAgICAgICAgIC8vIFdoZW4gdGhlIGRlbGV0ZSBsaW5rIGlzIGNsaWNrZWQsIGRlbGV0ZSB0aGlzIHByb3RvdHlwZVxuICAgICAgICAgICAgbmV3Rm9ybS5maW5kKCcuZHluYW1pYy1jb2xsZWN0aW9uLWl0ZW0tZGVsZXRlJykuX2luaXRfZHluYW1pY19jb2xsZWN0aW9uX2RlbGV0ZSgpO1xuXG4gICAgICAgICAgICAvLyBBdm9pZCBmb2xsb3dpbmcgYSBsaW5rIHRvIHRoZSB0b3Agb2YgdGhlIHBhZ2VcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfSlcbiAgICB9O1xuXG4gICAgJC5mbi5faW5pdF9keW5hbWljX2NvbGxlY3Rpb25fZGVsZXRlID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIHRoaXMuY2xpY2soZnVuY3Rpb24oZSkge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCh0cnVlKTtcbiAgICAgICAgICAgIC8vIFJlbW92ZSBjbG9zZXN0IHByb3RvdHlwZVxuICAgICAgICAgICAgJCh0aGlzKS5jbG9zZXN0KCcuZHluYW1pYy1jb2xsZWN0aW9uLWl0ZW0nKS5yZW1vdmUoKTtcblxuICAgICAgICAgICAgLy8gQXZvaWQgZm9sbG93aW5nIGEgbGluayB0byB0aGUgdG9wIG9mIHRoZSBwYWdlXG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH0pO1xuICAgIH07XG59KShqUXVlcnkpO1xuIiwiKGZ1bmN0aW9uICgkKSB7XG4gICAgbGV0IGVsZW1lbnRzID0gW1xuICAgICAgICAnbWFya19hdmdfZXhhY3RpbmduZXNzJyxcbiAgICAgICAgJ21hcmtfYXZnX2tub3dsZWRnZV9zdWJqZWN0JyxcbiAgICAgICAgJ21hcmtfYXZnX3JlbGF0aW9uX3RvX3RoZV9zdHVkZW50JyxcbiAgICAgICAgJ21hcmtfYXZnX3NlbnNlX29mX2h1bW9yJ1xuICAgIF07XG5cbiAgICAkLmZuLl9pbml0X3JhdGluZyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0ICR0aGF0ID0gdGhpcztcblxuICAgICAgICBpZiAod2luZG93LnJvX2FqYXhfYXBpX3JvemtsYWRfaWQpIHtcbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgdXJsOiAnaHR0cHM6Ly9hcGkucm96a2xhZC5vcmcudWEvdjIvdGVhY2hlcnMvJyArIHdpbmRvdy5yb19hamF4X2FwaV9yb3prbGFkX2lkICsgJy9yYXRpbmcnLFxuICAgICAgICAgICAgfSkuZG9uZShmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICQuZWFjaChlbGVtZW50cywgZnVuY3Rpb24gKGluZGV4LCB2YWx1ZSkge1xuICAgICAgICAgICAgICAgICAgICBsZXQgJGRpdiA9ICR0aGF0LmZpbmQoJy4nICsgdmFsdWUpO1xuICAgICAgICAgICAgICAgICAgICAkZGl2LmFwcGVuZChkYXRhLmRhdGFbdmFsdWVdKTtcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfVxufSkoalF1ZXJ5KTtcbiIsIihmdW5jdGlvbiAoJCkge1xuICAgICQuZm4uX191cGRhdGVfbGVzc29uX2Zvcm0gPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCAkdGhhdCA9IHRoaXMsXG4gICAgICAgICAgICBmaWVsZEhvdXJzV3JhcCA9ICR0aGF0LmZpbmQoJyNsZXNzb25faG91cnMnKS5jbG9zZXN0KCcuZm9ybS1ncm91cCcpLFxuICAgICAgICAgICAgZmllbGRFdmFsdWF0aW9uV3JhcCA9ICR0aGF0LmZpbmQoJyNsZXNzb25fZXZhbHVhdGlvblR5cGUnKS5jbG9zZXN0KCcuZm9ybS1ncm91cCcpLFxuICAgICAgICAgICAgZmllbGRIb3VycyA9ICR0aGF0LmZpbmQoJyNsZXNzb25faG91cnMnKSxcbiAgICAgICAgICAgIGZpZWxkRXZhbHVhdGlvbiA9ICR0aGF0LmZpbmQoJyNsZXNzb25fZXZhbHVhdGlvblR5cGUnKTtcblxuICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgbWV0aG9kOiAnR0VUJyxcbiAgICAgICAgICAgIHVybDogd2luZG93LnJvX2FqYXhfbGlzdF9sZXNzb25fdHlwZSxcbiAgICAgICAgfSkuZG9uZShmdW5jdGlvbihkYXRhKSB7XG4gICAgICAgICAgICBsZXQgb2xkSWQgPSBwYXJzZUludCgkdGhhdC5maW5kKCcjbGVzc29uX3R5cGUnKS52YWwoKSk7XG4gICAgICAgICAgICBsZXQgb2xkTGVzc29uID0gbnVsbDtcblxuICAgICAgICAgICAgZGF0YS5mb3JFYWNoKGZ1bmN0aW9uKGl0ZW0pIHtcbiAgICAgICAgICAgICAgICBvbGRMZXNzb24gPSBpdGVtLmlkID09PSBvbGRJZCA/IGl0ZW0gOiBvbGRMZXNzb247XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgaWYgKG9sZExlc3Nvbikge1xuICAgICAgICAgICAgICAgIGlmIChvbGRMZXNzb24uZGVmYXVsdEhvdXJzID09PSBudWxsKSB7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnNXcmFwLnNob3coKTtcbiAgICAgICAgICAgICAgICAgICAgZmllbGRIb3Vycy5wcm9wKCdyZWFkb25seScsIGZhbHNlKTtcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICBmaWVsZEhvdXJzV3JhcC5zaG93KCk7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnMucHJvcCgncmVhZG9ubHknLCAncmVhZG9ubHknKTtcbiAgICAgICAgICAgICAgICAgICAgLy8gZmllbGRIb3Vycy52YWwob2xkTGVzc29uLmRlZmF1bHRIb3Vycyk7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgaWYgKG9sZExlc3Nvbi5pc0V2YWx1YXRlZCA9PT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgICAgICBmaWVsZEV2YWx1YXRpb25XcmFwLnNob3coKTtcbiAgICAgICAgICAgICAgICAgICAgLy8gZmllbGRFdmFsdWF0aW9uLnByb3AoJ3JlcXVpcmVkJywgdHJ1ZSk7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgZmllbGRFdmFsdWF0aW9uV3JhcC5oaWRlKCk7XG4gICAgICAgICAgICAgICAgICAgIC8vIGZpZWxkRXZhbHVhdGlvbi5wcm9wKCdyZXF1aXJlZCcsIGZhbHNlKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICR0aGF0LmZpbmQoJyNsZXNzb25fdHlwZScpLm9uKCdjaGFuZ2UnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgbGV0IGlkID0gcGFyc2VJbnQodGhpcy52YWx1ZSk7XG4gICAgICAgICAgICAgICAgbGV0IGxlc3NvbiA9IG51bGw7XG4gICAgICAgICAgICAgICAgZmllbGRIb3Vycy52YWwobnVsbCk7XG4gICAgICAgICAgICAgICAgZmllbGRFdmFsdWF0aW9uLnZhbChudWxsKTtcblxuICAgICAgICAgICAgICAgIGRhdGEuZm9yRWFjaChmdW5jdGlvbihpdGVtKSB7XG4gICAgICAgICAgICAgICAgICAgIGxlc3NvbiA9IGl0ZW0uaWQgPT09IGlkID8gaXRlbSA6IGxlc3NvbjtcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIGlmIChsZXNzb24pIHtcbiAgICAgICAgICAgICAgICAgICAgaWYgKGxlc3Nvbi5kZWZhdWx0SG91cnMgPT09IG51bGwpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnNXcmFwLnNob3coKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkSG91cnMucHJvcCgncmVhZG9ubHknLCBmYWxzZSk7XG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWVsZEhvdXJzV3JhcC5zaG93KCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWVsZEhvdXJzLnByb3AoJ3JlYWRvbmx5JywgJ3JlYWRvbmx5Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWVsZEhvdXJzLnZhbChsZXNzb24uZGVmYXVsdEhvdXJzKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgICAgIGlmIChsZXNzb24uaXNFdmFsdWF0ZWQgPT09IHRydWUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpZWxkRXZhbHVhdGlvbldyYXAuc2hvdygpO1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gZmllbGRFdmFsdWF0aW9uLnByb3AoJ3JlcXVpcmVkJywgdHJ1ZSk7XG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWVsZEV2YWx1YXRpb25XcmFwLmhpZGUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIGZpZWxkRXZhbHVhdGlvbi5wcm9wKCdyZXF1aXJlZCcsIGZhbHNlKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pXG4gICAgICAgIH0pO1xuICAgIH1cbn0pKGpRdWVyeSk7XG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9