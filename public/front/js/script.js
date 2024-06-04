
$(document).ready(function () {
    $(".toggl").click(function () {
        $(".topbar-content").hide();
    });

    $(".navbar").on("shown.bs.collapse", function () {
        $("div#navbarSupportedContent").removeClass("show");
    });
    $(".navbar").on("hidden.bs.collapse", function () {
        $("div#navbarSupportedContent").removeClass("show");
    });
    $(".navbar").on("shown.bs.collapse", function () {
        $("div#navbarSupportedContent").addClass("open");
    });
    $(".toggle_hide_mb").click(function () {
        $("div#navbarSupportedContent").removeClass("open");
    });
    $("button.navbar-toggler").click(function () {
        $(".toggle_hide_mb").addClass("open_dark");
    });
    $(".toggle_hide_mb").click(function () {
        $(".toggle_hide_mb").removeClass("open_dark");
    });

    $(".toggle_sub_menu li span").click(function () {
        $(this).toggleClass("sub_txt_icon");
        $(this).parent().find(".submuenu_mb").slideDown("slow");
        $(".toggle_sub_menu li").not($(this).parent()).find(".submuenu_mb").slideUp("slow");
        $(".toggle_sub_menu li").not($(this).parent()).find("span").removeClass("sub_txt_icon");
    });


    // Counter sec start here
    // var counted = 0;
    // $(window).scroll(function () {
    //     var oTop = $(".counter").offset().top - window.innerHeight;
    //     if (counted == 0 && $(window).scrollTop() > oTop) {
    //         $(".count").each(function () {
    //             var $this = $(this),
    //             countTo = $this.attr("data-count");
    //             $({
    //                 countNum: $this.text(),
    //             }).animate(
    //             {
    //                 countNum: countTo,
    //             },
    //             {
    //                 duration: 2000,
    //                 easing: "swing",
    //                 step: function () {
    //                     $this.text(Math.floor(this.countNum));
    //                 },
    //                 complete: function () {
    //                     $this.text(this.countNum);
    //                 },
    //             }
    //             );
    //         });
    //         counted = 1;
    //     }
    // });
});
/****work on resize or reload page** */
$(window).on('load resize', function() {
    // Reinitialize Slick carousel with updated settings when the window is resized
    initializeSlick();
});
/***end*** */

function initializeSlick(){
    var width = '';
    var slidesToShow = '';
    var screenWidth = $(window).width();
        if (screenWidth > 1200) {
            width = 3000;
            slidesToShow = 3;
        } else if (screenWidth > 992) {
            width = 1200;
            slidesToShow = 2;
        } else if (screenWidth > 768) {
            width = 992;
            slidesToShow = 2;
        } else if (screenWidth < 768) {
            width = 768;
            slidesToShow = 1;
        }
    $(".product-slider").slick({
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="slide-arrow next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: false,
        autoplay: false,
        responsive: [
        {
            breakpoint:width,
            settings: {
                slidesToShow:slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        ],
    });

    $(".picks_wreap .busines_slider").slick({
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="slide-arrow next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: false,
        autoplay: false,
        responsive: [
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint:width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        ],
    });

    $(".view_slider").slick({
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        arrows: false,
        prevArrow: '<button class="slide-arrow prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="slide-arrow next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: true,
        autoplay: false,
        responsive: [
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        ],
    });

    $(".brand-slider").slick({
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        arrows: false,
        speed: 2000,
        dots: false,
        autoplay: true,
        responsive: [
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        ],
    });
    var $slider = $(".busi_slider");
    var $progressBar = $(".busine_progress");
    var $progressBarLabel = $(".busine_progress .slider__label");

    $slider.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
        var calc = (nextSlide / (slick.slideCount - 1)) * 100;

        $progressBar.css("background-size", calc + "% 100%").attr("aria-valuenow", calc);

        $progressBarLabel.text(calc + "% completed");
    });

    $slider.slick({
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: false,
        autoplay: false,
        responsive: [
        ,
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        ],
    });


    var $slider = $(".arrivals_slider");
    var $progressBar = $(".arrivals_progress");
    var $progressBarLabel = $(".arrivals_progress .slider__label");

    $slider.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
        var calc = (nextSlide / (slick.slideCount - 1)) * 100;

        $progressBar.css("background-size", calc + "% 100%").attr("aria-valuenow", calc);

        $progressBarLabel.text(calc + "% completed");
    });

    $slider.slick({
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: false,
        autoplay: false,
        responsive: [
        ,
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: width,
            settings: {
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
            },
        },
        ],
    });
}

// function increaseValue(button, limit) {
//     const numberInput = button.parentElement.querySelector(".number");
//     var value = parseInt(numberInput.innerHTML, 10);
//     if (isNaN(value)) value = 0;
//     if (limit && value >= limit) return;
//     numberInput.innerHTML = value + 1;
// }

// function decreaseValue(button) {
//     const numberInput = button.parentElement.querySelector(".number");
//     var value = parseInt(numberInput.innerHTML, 10);
//     if (isNaN(value)) value = 0;
//     if (value < 1) return;
//     numberInput.innerHTML = value - 1;
// }

function increaseValue(button, limit) {
    var numberInput = button.parentElement.querySelector(".number");
    var value = parseInt(numberInput.value, 10);
    if (isNaN(value)) value = 0;
    if (limit && value >= limit) return;
    numberInput.value = value + 1;
    $(numberInput).trigger('change');
}

function decreaseValue(button) {
    var numberInput = button.parentElement.querySelector(".number");
    var value = parseInt(numberInput.value, 10);
    if (isNaN(value)) value = 0;
    if (value < 1) return;
    numberInput.value = value - 1;
    $(numberInput).trigger('change');
}

$(".tab-menu li a").on("click", function () {
    var target = $(this).attr("data-rel");
    $(".tab-menu li a").removeClass("active");
    $(this).addClass("active");
    $("#" + target)
        .fadeIn("slow")
        .siblings(".tab-box")
        .hide();
    return false;
});

var step = 100;
var scrolling = true;

// Wire up events for the 'scrollUp' link:
$(".preSlide").bind("click", function (event) {
    event.preventDefault();
    // Animates the scrollTop property by the specified
    // step.
    $("div").animate({
        scrollLeft: "+=" + step + "px"
    });
});

$(".nextSlide").bind("click", function (event) {
    event.preventDefault();
    $("div").animate({
        scrollLeft: "-=" + step + "px"
    });
});
