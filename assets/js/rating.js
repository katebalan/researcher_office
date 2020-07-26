(function ($) {
    let elements = [
        'mark_avg_exactingness',
        'mark_avg_knowledge_subject',
        'mark_avg_relation_to_the_student',
        'mark_avg_sense_of_humor'
    ];

    $.fn._init_rating = function () {
        let $that = this;

        if (window.ro_ajax_api_rozklad_id) {
            $.ajax({
                url: 'https://api.rozklad.org.ua/v2/teachers/' + window.ro_ajax_api_rozklad_id + '/rating',
            }).done(function (data) {
                $.each(elements, function (index, value) {
                    let $div = $that.find('.' + value);
                    $div.append(data.data[value]);
                });
            });
        }
    }
})(jQuery);
