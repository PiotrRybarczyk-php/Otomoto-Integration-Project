$(window).on('load', function () {
    $("#preloader").fadeOut()
});

$(window).on('load', function () {
    setTimeout(function () { 
        $("#alert-box").fadeOut("slow", function () {
            // Animation complete.
        });
    }, 2000);
});