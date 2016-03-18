(function (window, undefined, $) {

    // Attribution: Stackoverflow
    // http://stackoverflow.com/questions/995183/how-to-allow-only-numeric-0-9-in-html-inputbox-using-jquery
    $('#table-cart').on('keydown', 'input[type="text"]', function (evt) {
        var key = evt.charCode || evt.keyCode || 0;
        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
        // home, end, period, and numpad decimal
        return (
            key == 8 ||
            key == 9 ||
            key == 13 ||
            key == 46 ||
            key == 110 ||
            key == 190 ||
            (key >= 35 && key <= 40) ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105));
    })
    .on('click', 'a[href="#"]', function (evt) {
        evt.preventDefault();
        var obj = {
            id: parseInt($(this).prev().val(), 10),
            qty: parseInt($(this).prev().prev().val(), 10)
        };
        $.post("/webservices/add", obj)
            .done(function (data) {
                window.location.reload();
            })
            .fail(function (data) {
                alert("An error occurred. Please submit the item again.");
            });
    });

}(window, undefined, jQuery));