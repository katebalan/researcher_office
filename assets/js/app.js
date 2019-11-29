/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
require('../scss/app.scss');
// require('progressbar');

const $ = require('jquery');

import 'select2';
import 'select2/dist/css/select2.css';

import 'bootstrap-datepicker';
import 'bootstrap-datepicker/dist/locales/bootstrap-datepicker.uk.min';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.css';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css';

import './fix_bootstrap_file_loader';
import './updateLessonForm';
import './js-collection';
import './rating';

$(() => {
    $('.js-select2').select2();
    $('.js-api-select2').select2({
        ajax: {
            url: 'https://api.rozklad.org.ua/v2/teachers/',
            dataType: 'json',
            data: function (params) {
                return {
                    search: "{'query':'" + params.term + "'}",
                    ss: `{'query':'${params.term}'}`
                    // search: {
                    //     'query': params.term
                    // }
                };
            },
            processResults: function (data) {
                console.log(data.data);

                let result = [];

                $.each(data.data, function( index, value ) {
                    result.push({
                        'id': value.teacher_id,
                        'text': `${value.teacher_name} (${value.teacher_id})`
                    });
                });

                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: result
                };
            }
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        },
        minimumInputLength: 3,
    });

    $('.js-datepicker').datepicker({
        format: "MM yyyy",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true,
        // language: 'uk'
    });
    $('.js-datepicker-full').datepicker({
        // language: 'uk',
        format: "dd MM yyyy",
        autoclose: true
    });

    $('.js-submit-form').on('click', function (e) {
        e.preventDefault();
        let answer=confirm('Are you sure you want to delete this item?');

        if (answer)
            this.closest('form').submit();
    });

    $('.fix-bootstrap-file')._fix_boostrap_file_loader();
    $('.js-update-lesson-form').__update_lesson_form();
    $('.js-dynamic-collection')._init_dynamic_collection();
    $('.js-rating')._init_rating();
});
