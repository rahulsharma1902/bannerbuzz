// $(document).ready(function(){
//   $("button.btncloseleftpanel").click(function(){
//     $(".tab-content>.active").remove();
//   });
// });

$(document).ready(function () {
    $("button.btncloseleftpanel").click(function () {
        $(".tab-content > .active").remove();
        // Align the image in the center
        $(".canva-img").css({
            display: "block",
            // "margin-left": "auto",
            "margin-right": "auto",
        });
    });
});

// $(document).ready(function(){
//  $('.new_clr').click(function () {
//     if ($('.colr_menu').is(':hidden')) {
//         $('.colr_menu').show();
//     } else {
//         $('.colr_menu').hide();
//     }
//   });

// });

$(document).ready(function () {
    $("#v-pills-messages-tab").click(function () {
        if ($(this).hasClass("nav-link active")) {
            $(".colr_menu").toggle();
        }
    });

    // Binding click events to other tabs
    $(".nav-link:not(#v-pills-messages-tab)").click(function () {
        $(".colr_menu").hide();
    });
});

$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
