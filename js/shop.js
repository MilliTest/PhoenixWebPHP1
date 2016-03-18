(function (window, undefined, $) {

    $('#section-filters div').on('change', 'select', function (evt) {
        var value = $(this).val(),
            fragment = "";
        if ($(this).attr('id') === "dd-category") {
            fragment = ("categories").toLowerCase();
        } else {
            fragment = ("collections").toLowerCase();
        }
        window.location = "/shop/" + fragment + "/" + value;
    });

}(window, undefined, jQuery));