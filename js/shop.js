(function (window, undefined, $) {

    $('#section-filters div').on('change', 'select', function (evt) {
        var value = $(this).val(),
            fragment = "";
        if ($(this).attr('id') === "dd-category") {
            fragment = "categories";
        } else {
            fragment = "collections";
        }
        window.location = "/shop/" + fragment + "/" + value;
    });

}(window, undefined, jQuery));