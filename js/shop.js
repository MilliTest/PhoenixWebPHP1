(function (window, undefined, $) {

    $('#section-filters div').on('change', 'select', function (evt) {
        var value = $(this).val().toLowerCase(),
            fragment = "";
        if (value === "") {
            window.location = "/shop";
        } else {
            if ($(this).attr('id') === "dd-category") {
                fragment = ("categories").toLowerCase();
            } else {
                fragment = ("collections").toLowerCase();
            }
            window.location = "/shop/" + fragment + "/" + (value).replace(' ', '-');
        }
    });

}(window, undefined, jQuery));