(function ($) {
    $.fn._fix_boostrap_file_loader = function () {
        let $that = this;

        this.on('change', function () {
            let $filename = $that.val().split('\\').pop();
            $that.parent().find('.custom-file-label').text($filename);
            $that.parent().parent().parent().find('input[name*="realFilename"]').val($filename);
        })
    }
})(jQuery);
