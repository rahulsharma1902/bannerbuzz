<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/new_style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}" />

    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <!-- end toaster -->

    {{-- jquery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- dropbox cdn -->
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="{{env('DROPBOX_CLIENT_ID')}}"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

    <title>Home page</title>

</head>

<body>
<?php $home_data = App\Models\HomeContent::first(); ?>
    <header>
        @if($home_data && $home_data->display_offer == 1)
        <div class="topbar" style="background-color: #fadc38;">
            <div class="container-fluid">
                <div class="topbar-content">
                    <span>{{$home_data->offer_text ?? ''}}</span>
                    <div class="toggl">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="free-exp-wrap">
            <div class="container-fluid">
                <div class="free-exp">
                    @if($home_data)
                    <p class="m-0">{{$home_data->top_text ?? ''}}</p>
                    @endif
                    <ul>
                        <li>
                            <a href="{{ url('order-tracking') }}">
                                <img src="{{ asset('front/img/track.svg') }}" alt="" />
                                <span>Order Tracking</span>
                            </a>
                        </li>
                        <li class="new_loginup">
                            <a href="{{ url('login') ?? '' }}">
                                <img src="{{ asset('front/img/account.svg') }}" alt="" />
                                <span>Account</span>
                            </a>
                            
                            <ul class="dropDown popupLogin">
                            @if(!Auth::check())
                                <li class="dontAccount">
                                    <a href="{{ url('login') ?? '' }}" class="btn lgin_btn" aria-label="Login">Login</a>
                                    <p>Don't Have An Account?</p>
                                    <a href="{{ url('register') ?? '' }}" class="btn rgstr_btn" aria-label="Register">Register</a>
                                </li>
                             @else   
                                <li>
                                    <a href="#">
                                        <span><i class="fa-regular fa-user"></i></span>
                                        <span>My Account</span>
                                    </a>
                                </li>
                               
                                <li class="logd_out">
                                    <a title="Logout" href="{{ url('logout') ?? '' }}" class="lg_out">
                                     <span><i class="fa-regular fa-user"></i></span>
                                     <span>Logout</span>
                                  </a>
                              </li>
                            @endif
                                <li>
                                    <a href="{{ url('my-saved-designs') ?? '' }}">
                                        <span><i class="fa-regular fa-user"></i></span>
                                        <span>My Designs</span></a>
                                </li>  
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="{{ asset('front/img/item.svg') }}" alt="" />
                                <span>Item(s) <span style="color: #dc288a;">$0.00</span></span>
                            </a>
                        </li>
                        <li>
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('front/img/country.svg') }}" alt="" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ url('/front/img/country.svg') }}" alt="" /> IND</button>
                                    </li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ url('/front/img/country.svg') }}" alt="" /> IND</button>
                                    </li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ url('/front/img/country.svg') }}" alt="" />
                                            IND</button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search-wrap">
            <div class="container-fluid">
                <div class="search_content">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bars bar1 navbar-toggler-icon"></span>
                        <span class="bars bar2 navbar-toggler-icon"></span>
                        <span class="bars bar3 navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('front/img/clogo.svg') }}"
                            alt="" /></a>
                    <div class="search_wrapper">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                All Category
                            </a>
                            <?php $categories = App\Models\ProductCategories::class::whereNull('parent_category')->get();  ?>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>

                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="search_block">
                            <form class="srch_txt" id="search-form" action="{{url('search')}}" method="get" >
       
                                <input type="search" id="search_val" name="search" class="form-control" placeholder="Search..." />
                                <!-- <i class="fa fa-search"></i> -->
                                <i id="search_btn" class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                    <div class="contc">
                        <ul class="pro_headr_destp">
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/chat.svg') }}" alt="" />
                                    </div>
                                    <span>Chat Now</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:012345678910">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/call.svg') }}" alt="" />
                                    </div>
                                    <span>
                                        Call Us <br />
                                        012345678910
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pro_headr_mb">
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/account.svg') }}" alt="">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="tel:012345678910">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/item.svg') }}" alt="">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbaar">
            <nav class="navbar navbar-expand-lg" style="background-color: #dc288a;">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    @if ($category->display_on == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                            @if ($category->subCategories->isNotEmpty())
                                                <div class="submuenu__wreap">
                                                    <ul class="submuenu_text">
                                                        @foreach ($category->subCategories as $key => $sub_category)
                                                            <li>
                                                                @if ($sub_category->subCategories->isNotEmpty() || $sub_category->products->isNotEmpty())
                                                                    <a
                                                                        href="{{ url('shop') }}/{{ $sub_category->slug }}">{{ $sub_category->name }}</a>
                                                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                                                    @if ($sub_category->subCategories->isNotEmpty())
                                                                        <div class="menuLevel3 subCategoryMenu ">
                                                                            <div class="menuLevel_txt">
                                                                                <ul>
                                                                                    @foreach ($sub_category->subCategories as $cat)
                                                                                        <li><a style="color: #dc288a;font-size:15px"
                                                                                                href="{{ url('shop') }}/{{ $cat->slug }}">{{ $cat->name }}</a>
                                                                                            <ul>
                                                                                                @foreach ($cat->products as $product)
                                                                                                    <li><a
                                                                                                            href="{{ url('details') }}/{{ $product->slug }}">{{ $product->name }}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                <div class="menuLevel_img">
                                                                                    @foreach (json_decode($category->images) as $index => $image)
                                                                                        @if ($index == 0)
                                                                                            <img width="100%"
                                                                                                height="100%"
                                                                                                src="{{ asset('category_Images') }}/{{ $image }}">
                                                                                        @break
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                @elseif ($sub_category->products->isNotEmpty())
                                                                    <div class="menuLevel3 subCategoryMenu ">
                                                                        <div class="menuLevel_txt">
                                                                            <ul>
                                                                                @foreach ($sub_category->products as $product)
                                                                                    <li><a
                                                                                        href="{{ url('details') }}/{{ $product->slug }}">{{ $product->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            @if ($category->products->isNotEmpty())
                                                <div class="submuenu__wreap">
                                                    <ul class="submuenu_text">
                                                        @foreach ($category->products as $product)
                                                            <li><a  href="{{ url('details') }}/{{ $product->slug }}">{{ $product->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about-us') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('accessories') }}">Accessories</a>
                        </li>
                    </ul>
                    <div class="navbar_nav_mb">
                        <div class="navbar_text_mb">
                            <a href="tel:012345678910">
                                <div class="con-img">
                                    <img src="{{ asset('front/img/call.svg') }}" alt="">
                                </div>
                                <span>012345678910</span>
                            </a>
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('front/img/country.svg') }}" alt="">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ asset('front/img/country.svg') }}" alt="">
                                            IND</button></li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ asset('front/img/country.svg') }}" alt="">
                                            IND</button></li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ asset('front/img/country.svg') }}" alt="">
                                            IND</button></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="toggle_sub_menu">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    @if ($category->display_on == 1)
                                        <li>
                                            <a class="toggle_sub_txt" aria-current="page"
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                            <span><i class="fa-solid fa-plus"></i></span>
                                            <div class="submuenu_mb active">
                                                <ul>
                                                    @if ($category->subCategories)
                                                        @foreach ($category->subCategories as $sub_cat)
                                                            <li><a
                                                                    href="{{ url('shop') }}/{{ $sub_cat->slug }}">{{ $sub_cat->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="toggle_hide_mb"></div>
            </div>
        </nav>
    </div>
</header>


@yield('content')


<footer>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer_top_lr">
                        <h5>Subscribe to our newsletter and get 20% OFF on Your First Order + Free Shipping.</h5>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form class="footer_top_rt">
                        <input type="search" name="" placeholder="Your email address">
                        <a href="#" class="btn light_dark">Subscribe</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_wreap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="footer_grid">
                        <div class="footer_contnt">
                            <h6>Category</h6>
                            <ul>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="footer_contnt">
                            <h6>Information</h6>
                            <ul>
                                <li><a href="{{ url('order-tracking') }}">Order Tracking</a></li>
                                <li><a href="{{ url('customer-reviews') }}">Customer Reviews</a></li>
                                <li><a href="{{ url('special-offers') }}">Special Offers</a></li>
                                <li><a href="#">Sitemap</a></li>
                                <li><a href="{{ url('/blogs') }}">Blog</a></li>
                                {{-- <li><a href="#">Safety Signs & Banners</a></li> --}}
                            </ul>
                        </div>
                        <div class="footer_contnt">
                            <h6>Customer Service</h6>
                            <ul>
                                <li><a href="{{ url('about-us') }}">About Us</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ url('privacy-policy') }}">Terms of Use</a></li>
                            </ul>
                        </div>
                        <div class="footer_contnt">
                            <h6>Follow on</h6>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_contnt footer_contact">
                        <h6>Contact Information</h6>
                        <ul>
                            <li>
                                <span>Address:</span>
                                8975 W Charleston Blvd. Suite 190
                                Las Vegas, NV 89117
                            </li>
                            <li><span>Phone:</span> <a href="tel:0 123 4567 890">0 123 4567 890</a></li>
                            <li><span>Email:</span> <a
                                    href="mailto:contact@cre8iveprinter.com">contact@cre8iveprinter.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="footer_bord"></div>
                </div>
                <div class="col-lg-3">
                    <div class="card_imgs">
                        <img src="{{ asset('front/img/card_img.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bt">
        <div class="container">
            <div class="footer_bt_lt">
                <p class="m-0">© 2024 Cre8ive Printer, All rights reserved.</p>
            </div>
            <ul class="footer_bt_rt">
                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
        window.GlobalData = {
            URL: "{{ url('') }}",
            csrfToken: "{{ csrf_token() }}",
        };
</script>
<script src="{{ asset('front/js/ajaxFunctions.js') }}"></script>
<script src="{{ asset('front/js/script.js') }}"></script>

<script>
    initializeSlick();
    //var script = document.createElement('script');
    //script.src = "{{ asset('front/js/script.js') }}";
    //document.body.appendChild(script);

   // script.onload = function() {
    //    initializeSlick();
    //};
</script>

<script>
    // counter
//     var counted = 0;
//     $(document).ready(function(){
//     $(window).scroll(function() {

//         var oTop = $('.counter').offset().top - window.innerHeight;
//         if (counted == 0 && $(window).scrollTop() > oTop) {
//             $('.count').each(function() {
//                 var $this = $(this),
//                     countTo = $this.attr('data-count');
//                 $({
//                     countNum: $this.text()
//                 }).animate({
//                     countNum: countTo
//                 }, {
//                     duration: 2000,
//                     easing: 'swing',
//                     step: function() {
//                         $this.text(Math.floor(this.countNum));
//                     },
//                     complete: function() {
//                         $this.text(this.countNum);
//                     }

//                 });
//             });
//             counted = 1;
//         }

//     });
// });
    // brand-slider
    $(document).ready(function() {
        $('.brand-slider').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            speed: 500,
            dots: false,
            autoplay: true,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
            ]
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.submuenu_text li:first-child .subCategoryMenu').css('display', 'block');
        $('.submuenu_text li').hover(
            function () {
                $(this).find('.subCategoryMenu').css('display', 'block');
            },
            function () {
                $(this).find('.subCategoryMenu').css('display', 'none');
            },
        
        );
        $('.submuenu_text li').on('mouseleave', function () {
            $('.submuenu_text li:first-child .subCategoryMenu').css('display', 'block');
        });

        $('#search_btn').on('click',function(){
            if($('#search_val').val() != null && $('#search_val').val() != ""){
                $('#search-form').submit();
            }
        });
    });
</script>
</body>

</html>
