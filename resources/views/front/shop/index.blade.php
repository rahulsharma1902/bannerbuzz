@extends('front_layout.master')
@section('content')
<section class="banner-sec">
    <div class="container">
        <div class="banner-content">
            <div class="banner-head">
                <ul class="shipping">
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('/front/img/some.svg')}}" alt="" />
                            <div class="text">
                                <p>Same Day Shipping</p>
                                <span>on selected products</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('/front/img/priority.svg')}}" alt="" />
                            <div class="text">
                                <p>Priority Shipping</p>
                                <span>on all the orders</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('/front/img/free.svg')}}" alt="" />
                            <div class="text">
                                <p>Free Shipping</p>
                                <span>on order above $99.00</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="banner-img">
                <img src="{{ asset('/front/img/banner_shop.png')}}" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="vinyl_wrapper">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Banners</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vinyl Banners</li>
                </ol>
            </nav>
            <div class="vinyl_content">
                <h3>Vinyl Banners</h3>
                <p>
                    Vinyl Banners, the ultimate attention-getter. Custom vinyl banners are popular with businesses, organizations, and events of all sizes due to their versatility and visual impact. These banners are made of durable
                    PVC material and can be used indoors and outdoors. Our vinyl banners are versatile and cost-effective advertising solutions for brand promotion, event announcements, and powerful messaging. Our vinyl PVC banners
                    are perfect for showcasing your innovative ideas and leaving a lasting impression on your audience.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="custom-sec shop_size">
    <div class="container">
        <div class="custom-content" style="background-color: #141414;">
            <h3>Start Your Order</h3>
            <div class="select-box">
                <div class="select_wrap">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Custom Vinyl Banners</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="select_wrap">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Size (W X H)</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="select_wrap">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Ft</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="select_wrap">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Qty</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="shop_size_txt">
                <p>Price: <span>$11.75</span> <strong>$11.75</strong></p>
                <a href="#" class="btn light_dark">Buy Now</a>
            </div>
        </div>
    </div>
</section>

<section id="accordionExample">
    <div class="shop_wrapper p_100">
        <div class="container">
            <div class="shop_top">
                <p>Found 69 Banners for your selection</p>
                <div class="shop_size_txt">
                    <span>Sort by</span>
                    <div class="select_wrap">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Bestseller</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="shop_ltr">
                <div class="filter_wreap">
                    <h5>Filters</h5>
                    <div class="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Categories
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="#">Business Banners</a></li>
                                        <li><a href="#">Event Banners</a></li>
                                        <li><a href="#">Interest Group Banners</a></li>
                                        <li><a href="#">Special Banners</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Products Type
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>lorem ipsum</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Print Type
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>lorem ipsum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop_rtl_wreap">
                    <div class="shop_rtl busines_slider">
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_3.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Custom Vinyl Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_4.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Outdoor Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_5.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>PVC Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_6.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Polyester Fabric Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_7.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Step and Repeat Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_8.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Pole Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_9.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Step and Repeat Fabric Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_10.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Canvas Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_11.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Indoor Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_12.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Fabric Mesh Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_13.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Polyester Fabric Indoor Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('/front/img/shop_14.png')}}" />
                                <div class="cust_btn_wreap">
                                    <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>Christmas Banners</h5>
                                <div class="star_wreap">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.54/5</span>
                                </div>
                                <p>3' x 2' Starts at <span>£8.39</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="paginetion_wreap">
                        <ul class="list-unstyled m-0">
                            <li>
                                <a href="#"><i class="fa-solid fa-chevron-left"></i></a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="active">
                                <a href="#"><i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion_wrapper p_100 pt-0">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            Shop Vinyl Banners for Long-Lasting and Great Advertising Solutions
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                When it comes to advertising in the great outdoors, durability is of the utmost importance. Our Custom Vinyl Banners are made from a high-quality PVC material, which not only guarantees their durability but also provides water-resistant properties. These banners can withstand the elements, including rain and shine, and will not lose their brilliant colors or their striking appearance. When you use one of our vinyl banners to display your message or brand outside, you can do so with full assurance, knowing that the banner will continue to be resilient and captivating no matter the temperature or precipitation.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Perfectly Tailored Custom Vinyl Banners to Meet Your Requirements
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Cost-Effective, Durable & Portable Vinyl Banners for Indoor & Outdoor Purposes
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection