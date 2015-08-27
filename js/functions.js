/**
 * Functionality specific to Altadena wordpress theme
 *
 * Provides helper functions to enhance the theme experience.
 */


$(document).ready(init);
function init() {

    $(window).resize(resizeTable);
    $(document).ready(resizeTable);

    $('input[type="email"]').change(emailValidation);
}


function resizeTable() {
    var main_content_width = $("#main-content").width();
    var newWidth = main_content_width - 210;
    $("#contactForm > table").css("width", newWidth);
}


function emailValidation() {
    var x = $('input[type="email"]').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        $("#emailError").text("Invalid Email");
        $('input[type="email"]').css("background-color", "pink");
        return false;
    } else {
        $("#emailError").text("");
        $('input[type="email"]').css("background-color", "");
        return true;
    }
}