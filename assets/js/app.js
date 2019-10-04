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

    $('.fix-bootstrap-file')._fix_boostrap_file_loader();
});
