(function ($) {
    $.fn._init_dynamic_collection = function () {
        let $this = $(this);

        // Get the prototype
        let prototype = $this.data('prototype');

        // Set the initial index of this container
        $this.data('index', $this.find(':input').length);

        // When the delete link of any existing items is clicked, delete its prototype
        $this.find('.dynamic-collection-item-delete')._init_dynamic_collection_delete();

        $this.on('click', function (e) {
            e.preventDefault(true);
            console.log('ffff');
            // Grab the index
            let index = $this.data('index');

            // Clone the prototype
            let newForm = prototype.replace(/__name__/g, index);

            // Increment the index
            $this.data('index', index + 1);

            // Insert the prototype before the add button
            newForm = $(newForm).insertBefore($(this));

            // When the delete link is clicked, delete this prototype
            newForm.find('.dynamic-collection-item-delete')._init_dynamic_collection_delete();

            // Avoid following a link to the top of the page
            return false;
        })
    };

    $.fn._init_dynamic_collection_delete = function() {
        this.click(function(e) {
            e.preventDefault(true);
            // Remove closest prototype
            $(this).closest('.dynamic-collection-item').remove();

            // Avoid following a link to the top of the page
            return false;
        });
    };
})(jQuery);
