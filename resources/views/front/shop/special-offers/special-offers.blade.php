@extends('front_layout.master')
@section('content')
    <section class="brad_inner">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('special-offers') !!}
                </nav>
            </div>
        </div>
    </section>

    <section class="banner-sec">
        <div class="container-fluid">
            <div class="banner-content p-0">
                <div class="banner-img">
                    <img src="{{ asset('front/img/spcl_off_ban.svg') }}" alt="" />
                </div>
            </div>
        </div>
    </section>

    <section class="shop_gp_list p_100">
        <div class="container">
            <div class="shopgp__content">
                <div class="hd_text">
                    <h2>Double Your Savings With Our Monthly Deals & Coupons</h2>
                    <p class="b_text">
                        ''I don’t need to save money'' said no savvy person ever! It is why we work tirelessly to craft these exclusive monthly coupons and deals for you. Start Saving.
                    </p>
                </div>
                <div class="shopgp__text shop_lyt_txt">
                    <ul>
                        <li>
                            <div class="card">
                                <div class="shopgp_img">
                                    <img src="{{ asset('front/img/shop_list_1.png') }}">
                                </div>
                                <div class="card-body">
                                    <h5>SuperBowl Prep Sale</h5>
                                    <span>Up to 30% off Sitewide</span>
                                    <p>
                                        Free express shipping for<br> all orders above £99.
                                    </p>
                                    <a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            <div class="shop_code_copn">
                                <span>Valid till 18 Jan, 2024</span>
                                <a href="#" class="btn light_dark">Show coupon code</a>
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <div class="shopgp_img">
                                    <img src="{{ asset('front/img/shop_list_2.png') }}">
                                </div>
                                <div class="card-body">
                                    <h5>SuperBowl Prep Sale</h5>
                                    <span>Up to 30% off Sitewide</span>
                                    <p>
                                        Free express shipping for<br> all orders above £99.
                                    </p>
                                    <a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            <div class="shop_code_copn">
                                <span>Valid till 18 Jan, 2024</span>
                                <a href="#" class="btn light_dark">Show coupon code</a>
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <div class="shopgp_img">
                                    <img src="{{ asset('front/img/shop_list_3.png') }}">
                                </div>
                                <div class="card-body">
                                    <h5>SuperBowl Prep Sale</h5>
                                    <span>Up to 30% off Sitewide</span>
                                    <p>
                                        Free express shipping for<br> all orders above £99.
                                    </p>
                                    <a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            <div class="shop_code_copn">
                                <span>Valid till 18 Jan, 2024</span>
                                <a href="#" class="btn light_dark">Show coupon code</a>
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <div class="shopgp_img">
                                    <img src="{{ asset('front/img/shop_list_4.png') }}">
                                </div>
                                <div class="card-body">
                                    <h5>SuperBowl Prep Sale</h5>
                                    <span>Up to 30% off Sitewide</span>
                                    <p>
                                        Free express shipping for<br> all orders above £99.
                                    </p>
                                    <a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            <div class="shop_code_copn">
                                <span>Valid till 18 Jan, 2024</span>
                                <a href="#" class="btn light_dark">Show coupon code</a>
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <div class="shopgp_img">
                                    <img src="{{ asset('front/img/shop_list_5.png') }}">
                                </div>
                                <div class="card-body">
                                    <h5>SuperBowl Prep Sale</h5>
                                    <span>Up to 30% off Sitewide</span>
                                    <p>
                                        Free express shipping for<br> all orders above £99.
                                    </p>
                                    <a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            <div class="shop_code_copn">
                                <span>Valid till 18 Jan, 2024</span>
                                <a href="#" class="btn light_dark">Show coupon code</a>
                            </div>
                        </li>
                    </ul>
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
    </section>

    <section class="accordion_wrapper nw_accord p_100 pt-0">
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
    </section>
 @endsection