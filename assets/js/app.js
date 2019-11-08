/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
require('../scss/app.scss');

const $ = require('jquery');

import 'select2';
import 'select2/dist/css/select2.css';

import 'bootstrap-datepicker';
import 'bootstrap-datepicker/dist/locales/bootstrap-datepicker.uk.min';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.css';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css';

import './fix_bootstrap_file_loader';
import './updateLessonForm';

$(() => {
    $('.js-select2').select2();

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
});
