(function ($) {
    $.fn.__update_lesson_form = function () {
        let $that = this,
            fieldHoursWrap = $that.find('#lesson_hours').closest('.form-group'),
            fieldEvaluationWrap = $that.find('#lesson_evaluationType').closest('.form-group'),
            fieldHours = $that.find('#lesson_hours'),
            fieldEvaluation = $that.find('#lesson_evaluationType');
        fieldHours.prop('disabled', 'disabled');
        fieldEvaluationWrap.hide();

        $.ajax({
            method: 'GET',
            url: window.ro_ajax_list_lesson_type,
        }).done(function(data) {
            $that.find('#lesson_type').on('change', function () {
                let id = parseInt(this.value);
                let lesson = null;
                fieldHours.val(null);
                fieldEvaluation.val(null);

                data.forEach(function(item) {
                    lesson = item.id === id ? item : lesson;
                });

                if (lesson) {
                    if (lesson.defaultHours === null) {
                        fieldHoursWrap.show();
                        fieldHours.prop('disabled', false);
                    } else {
                        fieldHoursWrap.show();
                        fieldHours.prop('disabled', 'disabled');
                        fieldHours.val(lesson.defaultHours);
                    }

                    if (lesson.isEvaluated === true) {
                        fieldEvaluationWrap.show();
                        // fieldEvaluation.prop('required', true);
                    } else {
                        fieldEvaluationWrap.hide();
                        // fieldEvaluation.prop('required', false);
                    }
                }
            })
        });
    }
})(jQuery);
