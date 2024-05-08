$(window).on("resize", function () {
    if ($(window).width() < 768) {
        $(".contain").addClass("main3");
        $(".contain").removeClass("main4");
        const scrollContainerse = document.querySelector(".main3");
        // console.warn(scrollContainerse);
        scrollContainerse.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainerse.scrollLeft += evt.deltaY;
        });
    } else {
          $(".contain").addClass("main4");
        $(".contain").removeClass("main3");
      
         $(".contain").addClass("main4");
        const scrollContainerse1 = document.querySelector(".main4");
        // console.warn(scrollContainerse);
        scrollContainerse1.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainerse1.scrollTop += evt.deltaY;
                  });
    }
});

$(document).ready(function () {
     if ($(window).width() < 768) {
        $(".contain").addClass("main3");
        $(".contain").removeClass("main4");
        const scrollContainerse = document.querySelector(".main3");
        // console.warn(scrollContainerse);
        scrollContainerse.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainerse.scrollLeft += evt.deltaY;
        });
    } else {
        $(".contain").removeClass("main3");
        $(".contain").addClass("main4");
        const scrollContainerse1 = document.querySelector(".main4");
        // console.warn(scrollContainerse);
        scrollContainerse1.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainerse1.scrollTop += evt.deltaY;
                  });
    } 

});


$(document).ready(function () {
    
    $(".button-group span.menu-text").on("click", function () {
        // Remove 'active-text' class from all tabs
        $("span.menu-text").removeClass("active-text"); //
        // Add 'active-text' class to the clicked tab
        $(this).addClass("active-text");
    });

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

jQuery(".nav-pills button.nav-link").on("click", function () {
    jQuery("button.nav-link").removeClass("active");
    jQuery(".tab-content").addClass("active");
    // $('.new_right_arw').hide();
    var cusCanLeft = $('#customCanvas').offset().left; 
    $('#canvasBottom').offset({ left: cusCanLeft - 20 }); 
    
    // var dis = $('#customCanvas').offset().left - $('#canvasBottom').offset().left;
    // $("#canvasBottom").css("margin-left", `${dis + 100}px`);

});

$("button.btncloseleftpanel").click(function () {
    $(".tab-content").removeClass("active");
    $('.new_right_arw').show();
    
    $('#canvasBottom').css("left", "");
    // $(".canva-img").addClass("blk_dw");
});

$(document).ready(function (){
    function adjustCanvasPosition() {
        var cusCanLeft = $('#customCanvas').offset().left;
        $('#canvasBottom').offset({ left: cusCanLeft - 20 });
    }

    adjustCanvasPosition();

    $(window).resize(adjustCanvasPosition);

    $('.btncloseleftpanel').on('click', adjustCanvasPosition);
});

$(".lyr_grp").hide();
jQuery(".toltp-arng").on("click", function () {
    jQuery(".lyr_grp").toggle();
});

const scrollContainer = document.querySelector(".main");

scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
});

jQuery("button.btnpanelbox").on("click", function () {
    jQuery(".design-ryt-vw").toggle();
});

$("button.rytb").click(function () {
    $(".new_right_arw").removeClass("top_ryt_dv");
    // $(".desgin-ryt-arw").removeClass("ryt-arow");
});

// $("button.rytb").click(function () {
//    $(".new_right_arw, .top_ryt_dv").hide();
// });

$(".btnpanelbox").click(function () {
    $("header, .design-tabs").toggleClass("mains");
});

$(".btnpanelbox").click(function () {
    $(".desgin-ryt-arw").toggleClass("ryt-arow");
    $(".new_right_arw").toggleClass("top_ryt_dv");
});

$(".btn-close").click(function () {
    $(".desgin-ryt-arw").removeClass("ryt-arow");
    $(".new_right_arw").removeClass("top_ryt_dv");
     $("header, .design-tabs").removeClass("mains");
});


$("button.nav-link").click(function () {
    $(".canva-img").addClass("blk_dw");
});

$(".btncloseleftpanel").click(function () {
    $(".canva-img").removeClass("blk_dw");
});

const scrollContainers = document.querySelector(".main2");

scrollContainers.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainers.scrollLeft += evt.deltaY;
});

$(".design-edit .design-tabs .nav.nav-pills .nav-link").click(function () {
    // Remove 'pink-text' class from all tabs
    $(".design-edit .design-tabs .nav.nav-pills .nav-link").removeClass("pink-text");

    // Add 'pink-text' class to the clicked tab
    $(this).addClass("pink-text");
});

// $(".acrylc-letter-box .text-editor ul li.custm_li").click(function () {
//     // Remove 'pink-text' class from all tabs
//     $(".acrylc-letter-box .text-editor ul li.custm_li").removeClass("pik-text");

//     // Add 'pink-text' class to the clicked tab
//     $(this).addClass("pik-text");
// });

// $("#v-pills-quick-tab").click(function () {
//     $(".main_div, .quitop").addClass("new-ovrl");
// });

// $("button.btncloseleftpanel").click(function () {
//     $(".main_div, .quitop").removeClass("new-ovrl");
//     $(".nav-link, .tempdv").removeClass("hd-toltp");
// });

// $("#v-pills-quick-tab").click(function () {
//     $(".quitop, .Sstep, .tempdv:first-child").addClass("hd-toltp");
// });

// $(".nav-link:not(.quitop)").click(function () {
//     $(".quitop, .Sstep, .tempdv:first-child").removeClass("hd-toltp");
// });
// new code here 

$(document).ready(function() {
    
    var currentStep = 1; 
    // $("#v-pills-quick-tab").click(function () {
    //     $(".main_div, .quitop").addClass("new-ovrl");
    // });

    $("button.btncloseleftpanel").click(function () {
        $('.tourStep').hide();
        $(".main_div, .quitop").removeClass("new-ovrl");
        $(".nav-link, .tempdv").removeClass("hd-toltp");
        currentStep = 1;
    });
    $('.tourStep').hide().removeClass("hd-toltp");;
    $("[data-for]").removeClass("hd-toltp");

    $("#v-pills-quick-tab").click(function() {
        $('.tourStep').hide(); 
        $('#step1').show().addClass("hd-toltp");
        $("[data-for='step1']").addClass("hd-toltp");
        $(".main_div").addClass("new-ovrl");
    });

    $('.tourPrev').on('click', function() {
        if (currentStep > 1) {
            $('#step' + currentStep).hide();
            $("[data-for='step" + currentStep + "']").removeClass("hd-toltp");
            $(".design-tabs .nav").animate({
                scrollTop: $(".design-tabs .nav").offset().top,
                scrollTop: 0,
            });
            currentStep--;

            $('#step' + currentStep).show().addClass("hd-toltp");
            $("[data-for='" + currentStep + "']").addClass("hd-toltp");
            console.log($("[data-for='step" + currentStep + "']").addClass("hd-toltp"));
        }
    });

    $('.tourNext').on('click', function() {
        if (currentStep < 7) {
            var top = 0;
            $(".design-tabs .nav").animate({
                scrollTop: $(".design-tabs .nav").offset().top,
                scrollTop: top,
            });
            $('#step' + currentStep).hide().removeClass("hd-toltp");
            $("[data-for='step" + currentStep + "']").removeClass("hd-toltp");

            currentStep++; 

            $('#step' + currentStep).show().addClass("hd-toltp");
            $("[data-for='step" + currentStep + "']").addClass("hd-toltp");
        }else if(currentStep >= 7){
           $('.btncloseleftpanel').click();
        }
    });
});


// new code end here 
$(document).ready(function () {
    // variables
    var toTop = $(".to-top");
    // logic
    toTop.on("click", function () {
        $(".design-tabs .nav").animate({
            scrollTop: $(".design-tabs .nav").offset().top,
            scrollTop: 0,
        });
    });
});

$("button.rytb").click(function () {
    $(".new_right_arw, .design-ryt-vw").addClass("rmv_bg");
    $(".new_right_arw, .design-ryt-vw").removeClass("btn-close");
});

// $(".btn-close").click(function () {
//     $(".new_right_arw, .design-ryt-vw").removeClass("rmv_bg");
// });

// $(".btnpanelbox").click(function () {
//     $(".new_right_arw, .design-ryt-vw").removeClass("rmv_bg");
// });

$(document).ready(function () {
    var attactWith = $(".attactWith ,.aligndiv");
    var attactTarget = $("." + attactWith.data("attact"));

    var centerX = attactTarget.offset().left + attactTarget.outerWidth() / 2;
    var centerY = attactTarget.offset().top + attactTarget.outerHeight() / 2;
    var bottom = attactTarget.offset().top + attactTarget.outerHeight();

    attactWith.css({
        top: bottom,
        left: centerX - attactWith.outerWidth(),
        position: "absolute",
        display: "flex",
    });

    $("body").append(attactWith);

    attactWith.show();
});
$(document).ready(function () {
    $(".attactWith, .aligndiv, .attactWith1").hide(); // Initially hide these elements

    $(".mainDiv, .main2_div, .mrcontrol").on("click", function (e) {
        e.stopPropagation(); // Prevent click from bubbling up to the document level

        var $this = $(this);
        var dataFor = $this.attr("data-for");

        // Toggle the active state of the clicked element
        if ($this.hasClass("active")) {
            $this.removeClass("active");
            $("." + dataFor).hide();
        } else {
            $(".mainDiv, .main2_div, .mrcontrol").removeClass("active");
            $(".attactWith, .aligndiv, .attactWith1").hide();

            $this.addClass("active");
            $("." + dataFor).show();
        }
    });

    // Click event on the document
    $(document).on("click", function () {
        // If click is outside, hide elements and remove 'active' class
        $(".mainDiv, .main2_div , .mrcontrol").removeClass("active");
        $(".attactWith, .aligndiv, .attactWith1").hide();
    });

    // Prevent click inside .attactWith and .aligndiv from bubbling up to document
    $(".attactWith, .aligndiv, .attactWith1").on("click", function (e) {
        e.stopPropagation();
    });
});
// $(document).ready(function () {
//     $('.attachData').hide();
//     $(".attactWith1").hide();
//     $(".mrcontrol").on("click", function () {
//         // $('.attachData').hide();
//         //   $('.attactWith').toggle();
//         $(this).toggleClass("active");
//         if ($(this).hasClass("active")) {
//             $(".attactWith1").show();
//         } else {
//             $(".attactWith1").hide();
//         }
//     });
// });



$(document).ready(function () {
    var attactWith = $(".attactWith1");
    var attactTarget = $("." + attactWith.data("attact"));

    var centerX = attactTarget.offset().left + attactTarget.outerWidth() / 2;
    var centerY = attactTarget.offset().top + attactTarget.outerHeight() / 2;
    var bottom = attactTarget.offset().top + attactTarget.outerHeight();

    attactWith.css({
        top: bottom,
        left: centerX - attactWith.outerWidth(),
        position: "absolute",
        display: "flex",
    });

    $("body").append(attactWith);

    attactWith.hide();
});
// $(document).ready(function () {
//     $('.attachData').hide();
//     $(".attactWith1").hide();
//     $(".mrcontrol").on("click", function () {
//         // $('.attachData').hide();
//         //   $('.attactWith').toggle();
//         $(this).toggleClass("active");
//         if ($(this).hasClass("active")) {
//             $(".attactWith1").show();
//         } else {
//             $(".attactWith1").hide();
//         }
//     });
// });

$(document).ready(function () {
    $(".tooltip.hd_tlp.alignsbtn button").click(function () {
        var position = $(this).offset();
        var leftp = position.left - 100;
        var topp = position.top + 40;

        $(".alignment-box.aligndiv").css("left", leftp);
        $(".alignment-box.aligndiv").css("top", topp);
    });

    $(".tooltip.hd_tlp.arngobjct button").click(function () {
        var position = $(this).offset();
        var leftp = position.left - 100;
        var topp = position.top + 40;

        $(".lyr_grp.attactWith").css("left", leftp);
        $(".lyr_grp.attactWith").css("top", topp);
    });

    $(".acrylc-letter-box .text-editor ul li button.text_param").click(function () {
        var position = $(this).offset();
        var leftp = position.left - 150;
        var topp = position.top + 40;

        $(".text-more-controls.attactWith1").css("left", leftp);
        $(".text-more-controls.attactWith1").css("top", topp);
    });
});





$(document).ready(function() {
    // const $container = $('.canvasData');
    // let scale = 1; // Default scale

    // $('.zoomIn').on('click', function() {
    //     scale = Math.max(scale - 0.2, 0.2); // Decrease scale by 20%, minimum scale 20%
    //     updateScale();
    // });

    // $('.zoomOut').on('click', function() {
    //     scale += 0.2; // Increase scale by 20%
    //     updateScale();
    // });

    // $('#zoomSelect').on('change', function() {
    //     const value = $(this).val();
    //     switch(value) {
    //         case 'fit':
    //             fitToContainer();
    //             break;
    //         case 'fill':
    //             fillContainer();
    //             break;
    //         default:
    //             scale = parseInt(value) / 100;
    //             updateScale();
    //             break;
    //     }
    // });

    // function updateScale() {
    //     $container.css({
    //         'transform': `scale(${scale})`,
    //         'transform-origin': 'center center',
    //         'overflow': 'scroll'
    //     });
    // }

    // function fitToContainer() {
    //     // Assuming the container has a fixed dimension and content needs to fit exactly within
    //     const containerHeight = $container.height();
    //     const contentHeight = $container.get(0).scrollHeight;
    //     const containerWidth = $container.width();
    //     const contentWidth = $container.get(0).scrollWidth;
    //     const scaleWidth = containerWidth / contentWidth;
    //     const scaleHeight = containerHeight / contentHeight;
    //     scale = Math.min(scaleWidth, scaleHeight);
    //     updateScale();
    //     $container.css('overflow', 'hidden'); // Disable scrollbars
    // }

    // function fillContainer() {
    //     // Assuming the intent is to always fill the container, potentially cutting off content
    //     const containerHeight = $container.height();
    //     const contentHeight = $container.get(0).scrollHeight;
    //     const containerWidth = $container.width();
    //     const contentWidth = $container.get(0).scrollWidth;
    //     const scaleWidth = containerWidth / contentWidth;
    //     const scaleHeight = containerHeight / contentHeight;
    //     scale = Math.max(scaleWidth, scaleHeight);
    //     updateScale();
    //     $container.css('overflow', 'hidden'); // Disable scrollbars
    // }
});