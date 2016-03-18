(function (window, undefined, $) {

    $('#section-filters div').on('change', 'select', function (evt) {
        alert(this.value);
    });

}(window, undefined, jQuery));