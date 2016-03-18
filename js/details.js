(function (window, undefined, $) {

    $('form').on('submit', function (evt) {
        evt.preventDefault();
        alert("submitted");
    });

}(window, undefined, jQuery));