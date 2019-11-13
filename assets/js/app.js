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

    $('.add-another-collection-widget').on('click', function (e) {
        console.log('llll');
        var list = $($(this).attr('data-list-selector'));
        // Try to find the counter of the list or use the length of the list
        var counter = list.data('widget-counter') || list.children().length;

        // grab the prototype template
        var newWidget = list.attr('data-prototype');
        // replace the "__name__" used in the id and name of the prototype
        // with a number that's unique to your emails
        // end name attribute looks like name="contact[emails][2]"
        newWidget = newWidget.replace(/__name__/g, counter);
        // Increase the counter
        counter++;
        // And store it, the length cannot be used if deleting widgets is allowed
        list.data('widget-counter', counter);

        // create a new list element and add it to the list
        var newElem = $(list.attr('data-widget-tags')).html(newWidget);
        newElem.appendTo(list);
    });
});
