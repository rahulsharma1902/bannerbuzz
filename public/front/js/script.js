$(document).ready(function () {
    $(".toggl").click(function () {
        $(".topbar-content").hide();
    });

    $(".product-slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="slide-arrow next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: false,
        autoplay: false,
        responsive: [
        ,
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        ],
    });

    $(".picks_wreap .busines_slider").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="slide-arrow next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: false,
        autoplay: false,
        responsive: [
        ,
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        ],
    });

    $(".view_slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        prevArrow: '<button class="slide-arrow prev-arrow fa-solid fa-chevron-left"></button>',
        nextArrow: '<button class="slide-arrow next-arrow fa-solid fa-chevron-right"></button>',
        speed: 800,
        dots: true,
        autoplay: false,
        responsive: [
        ,
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        ],
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
        $(this).next(".submuenu_mb").slideDown("slow");
        $(this).parent().siblings().children().next(".submuenu_mb").slideUp("slow");
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
        slidesToShow: 4,
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
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        ],
    });
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
    slidesToShow: 4,
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
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
        },
    },
    {
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
        },
    },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        },
    },
    ],
});



