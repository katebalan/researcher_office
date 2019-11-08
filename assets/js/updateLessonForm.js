(function ($) {        // fieldHours.prop('disabled', 'disabled');
        // fieldEvaluationWrap.hide();
    $.fn.__update_lesson_form = function () {
        let $that = this,
            fieldHoursWrap = $that.find('#lesson_hours').closest('.form-group'),
            fieldEvaluationWrap = $that.find('#lesson_evaluationType').closest('.form-group'),
            fieldHours = $that.find('#lesson_hours'),
            fieldEvaluation = $that.find('#lesson_evaluationType');

        $.ajax({
            method: 'GET',
            url: window.ro_ajax_list_lesson_type,
        }).done(function(data) {
            let oldId = parseInt($that.find('#lesson_type').val());
            let oldLesson = null;

            data.forEach(function(item) {
                oldLesson = item.id === oldId ? item : oldLesson;
            });

            if (oldLesson) {
                if (oldLesson.defaultHours === null) {
                    fieldHoursWrap.show();
                    fieldHours.prop('disabled', false);
                } else {
                    fieldHoursWrap.show();
                    fieldHours.prop('disabled', 'disabled');
                    // fieldHours.val(oldLesson.defaultHours);
                }

                if (oldLesson.isEvaluated === true) {
                    fieldEvaluationWrap.show();
                    // fieldEvaluation.prop('required', true);
                } else {
                    fieldEvaluationWrap.hide();
                    // fieldEvaluation.prop('required', false);
                }
            }

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
