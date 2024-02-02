@extends('front_layout.master')
@section('content')
<section class="banner-sec">
    <div class="container">
        <div class="banner-content">
            <div class="banner-head">
                <ul class="shipping">
                    <li>
                        <div class="ship-box">
                            <img src="{{ url('/front/img/some.svg')}}" alt="" />
                            <div class="text">
                                <p>Same Day Shipping</p>
                                <span>on selected products</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ url('/front/img/priority.svg')}}" alt="" />
                            <div class="text">
                                <p>Priority Shipping</p>
                                <span>on all the orders</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ url('/front/img/free.svg')}}" alt="" />
                            <div class="text">
                                <p>Free Shipping</p>
                                <span>on order above $99.00</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="banner-img">
                <img src="{{ url('/front/img/crea8bann.png')}}" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="loved-prdct_sec p_100">
    <div class="container">
        <div class="loved-prdct_content">
            <h3>Most Loved Products</h3>
            <div class="product-slider">
                <div class="card">
                    <div class="card-wrap">
                        <div class="card-img">
                            <img src="{{ url('/front/img/cardprdt1.png')}}" alt="" />
                        </div>
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing</p>
                            <div class="rating">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span>9’321</span>
                            </div>
                            <span>Starts at: $3.99</span>
                            <div class="view">
                                <a href="javascript:void(0)">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-wrap">
                        <div class="card-img">
                            <img src="{{ url('/front/img/cardprdt2.png')}}" alt="" />
                        </div>
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing</p>
                            <div class="rating">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span>9’321</span>
                            </div>
                            <span>Starts at: $3.99</span>
                            <div class="view">
                                <a href="javascript:void(0)">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-wrap">
                        <div class="card-img">
                            <img src="{{ url('/front/img/cardprdt3.png')}}" alt="" />
                        </div>
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing</p>
                            <div class="rating">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span>9’321</span>
                            </div>
                            <span>Starts at: $3.99</span>
                            <div class="view">
                                <a href="javascript:void(0)">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-wrap">
                        <div class="card-img">
                            <img src="{{ url('/front/img/cardprdt1.png')}}" alt="" />
                        </div>
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing</p>
                            <div class="rating">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span>9’321</span>
                            </div>
                            <span>Starts at: $3.99</span>
                            <div class="view">
                                <a href="javascript:void(0)">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="custom-sec p_100" style="background-color: #141414;">
    <div class="container">
        <div class="custom-content">
            <h3>Offering Custom Banners and Signs For Business/Home Needs</h3>
            <div class="select-box">
                <h6>Select Your Product</h6>
                <div class="select_wrap">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Banner</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="select_wrap">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Board printing</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="busines_content">
                <div class="busine_select">
                    <h6>Found 69 Banners for your selection</h6>
                    <div class="progress busine_progress" role="progressbar" aria-valuemin="25" aria-valuemax="100">
                        <span class="slider__label sr-only"></span>
                    </div>
                </div>
            </div>
            <div class="busines_slider busi_slider">
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_1.png')}}">
                    </div>
                    <div class="card-body">
                        <h5>Product Name 01</h5>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>9’321</span>
                        </div>
                        <p>Starts at: <span>$187.00</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_2.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 02</h5>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>9’321</span>
                        </div>
                        <p>Starts at: <span>$187.00</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_3.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 03</h5>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>9’321</span>
                        </div>
                        <p>Starts at: <span>$187.00</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_4.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 04</h5>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>9’321</span>
                        </div>
                        <p>Starts at: <span>$187.00</span></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_3.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 05</h5>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>9’321</span>
                        </div>
                        <p>Starts at: <span>$187.00</span></p>
                    </div>
                </div>
            </div>
            <div class="busines_btn">
                <a href="#" class="btn cta">View All</a>
            </div>
        </div>
    </div>
</section>

<section class="ways_wreapper p_100">
    <div class="container">
        <div class="ways_hd">
            <h3>Ways to get the Right Print</h3>
            <ul class="shipping">
                <li>
                    <div class="ship-box">
                        <img src="{{ url('/front/img/ways_1.svg')}}">
                        <div class="text">
                            <p>Design Template</p>
                            <span>Professionally Designed</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ url('/front/img/ways_2.svg')}}">
                        <div class="text">
                            <p>Upload Artwork</p>
                            <span>Perfect Print</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ url('/front/img/ways_3.svg')}}">
                        <div class="text">
                            <p>Hire a Designer</p>
                            <span>Starts @ £9.99</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="our_best_wreapper">
    <div class="container">
        <div class="our_best_content">
            <h3>Our Best Sellers</h3>
            <p>Boost Sales with Top-Charting Categories</p>
            <div class="our_best_grid">
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_1.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Window Signs</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_2.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Flags</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_3.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Vinyl Banners</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_4.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Letters & Numbers</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_5.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Marketing Materials</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_6.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Car Signs</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_7.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Banner Stands</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_8.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Clothing</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_9.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Surface Decals</p>
                    </div>
                </div>
                <div class="card">
                    <div class="our_best_img">
                        <img src="{{ url('/front/img/our_best_10.png')}}">
                    </div>
                    <div class="card-body">
                        <p>Gazebo Tents</p>
                    </div>
                </div>
            </div>
            <ul class="shop_wreap">
                <li>
                    <a href="#">
                        <img src="{{ url('/front/img/shop_1.svg')}}">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('/front/img/shop_2.svg')}}">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="custom-sec picks_wreap p_100">
    <div class="container">
        <div class="custom-content">
            <div class="busine_select mt-0">
                <h4>Customer Picks</h4>
                <p>Explore Our Most Popular Products</p>
            </div>
            <div class="busines_slider">
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_1.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 01</h5>
                        <p><span>$187.00</span> <strong>$150.00</strong></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_2.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 02</h5>
                        <p><span>$187.00</span> <strong>$150.00</strong></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_3.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 03</h5>
                        <p><span>$187.00</span> <strong>$150.00</strong></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_4.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 04</h5>
                        <p><span>$187.00</span> <strong>$150.00</strong></p>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ url('/front/img/busin_2.png')}}">
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 03</h5>
                        <p><span>$187.00</span> <strong>$150.00</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="arrivals_wreap p_100" style="background-color: #DC288A24;">
    <div class="container"> 
        <div class="busine_select mt-0">
            <h4>New Arrivals</h4>
            <p>
                Check Out Our Latest Products
            </p>
        </div>
        <div class="arrivals_slider">
            <div class="card">
                <div class="busines_img">
                    <img src="{{ url('/front/img/arrivals_1.png') }}">
                </div>
                <div class="card-body">
                    <h5>Product Name 01</h5>
                    <p><span>$187.00</span> <strong>$150.00</strong></p>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="{{ url('/front/img/multi_4.png') }}X">
                </div>
                <div class="card-body">
                    <h5>Product Name 02</h5>
                    <p><span>$187.00</span> <strong>$150.00</strong></p>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="{{ url('/front/img/arrivals_3.png') }}">
                </div>
                <div class="card-body">
                    <h5>Product Name 03</h5>
                    <p><span>$187.00</span> <strong>$150.00</strong></p>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="{{ url('/front/img/arrivals_4.png') }}">
                </div>
                <div class="card-body">
                    <h5>Product Name 04</h5>
                    <p><span>$187.00</span> <strong>$150.00</strong></p>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="{{ url('/front/img/arrivals_3.png') }}">
                </div>
                <div class="card-body">
                    <h5>Product Name 03</h5>
                    <p><span>$187.00</span> <strong>$150.00</strong></p>
                </div>
            </div>
        </div>
        <div class="progress arrivals_progress" role="progressbar" aria-valuemin="25" aria-valuemax="100">
            <span class="slider__label sr-only"></span>
        </div>
    </div>
</section>

<section class="multi_shop_wreap p_100">
    <div class="container">
        <div class="multi_shop_grid"> 
            <div class="multi_shop_cont" style="background: linear-gradient(90deg, #FEF9DC 0.15%, #EDFBFF 99.8%)">
                <div class="multi_shop_txt">
                    <h5>Banners</h5>
                    <p>Starting at <strong>$1.90</strong></p>
                    <a href="#" class="btn btn_dark">Explore Now</a>
                </div>
                <div class="multi_shop_img">
                    <a href="#"><img src="{{ url('/front/img/multi_1.png') }}"></a>
                </div>
            </div>
            <div class="multi_shop_cont" style="background: linear-gradient(90deg, #FEF9DC 0.15%, #EDFBFF 99.8%)">
                <div class="multi_shop_txt">
                    <h5>Exhibition Backdrops</h5>
                    <p>Starting at <strong>$30.41</strong></p>
                    <a href="#" class="btn btn_dark">Explore Now</a>
                </div>
                <div class="multi_shop_img">
                    <a href="#"><img src="{{ url('/front/img/multi_2.png') }}"></a>
                </div>
            </div>
            <div class="multi_shop_cont" style="background: linear-gradient(90deg, #FEF9DC 0.15%, #EDFBFF 99.8%)">
                <div class="multi_shop_img">
                    <a href="#"><img src="{{ url('/front/img/multi_3.png') }}"></a>
                </div>
                <div class="multi_shop_txt">
                    <h5>Banners</h5>
                    <p>Starting at <strong>$1.90</strong></p>
                    <a href="#" class="btn btn_dark">Explore Now</a>
                </div>
            </div>
            <div class="multi_shop_cont" style="background: linear-gradient(90deg, #FEF9DC 0.15%, #EDFBFF 99.8%)">
                <div class="multi_shop_img">
                    <a href="#"><img src="{{ url('/front/img/multi_4.png') }}"></a>
                </div>
                <div class="multi_shop_txt">
                    <h5>Banners</h5>
                    <p>Starting at <strong>$1.90</strong></p>
                    <a href="#" class="btn btn_dark">Explore Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="view_wrapper p_100" style="background-color: #141414">
    <div class="container">
        <div class="view_hd">
            <h2>Our customers speak for us!</h2>
        </div>
        <div class="view_slider m-0">
            <div class="testimonial-para">
                <div class="test_view">
                    <div class="test_img">
                        <img src="{{ url('/front/img/view_1.png') }}">
                    </div>
                    <div class="test_hd">
                        <h6>Jerry C. Prentice</h6>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>18 Jan, 2024</span>
                        </div>
                    </div>
                </div>
                <p>
                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                </p>
            </div>
            <div class="testimonial-para">
                <div class="test_view">
                    <div class="test_img">
                        <img src="{{ url('/front/img/view_2.png') }}">
                    </div>
                    <div class="test_hd">
                        <h6>Ruth D. Grinnell</h6>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>18 Jan, 2024</span>
                        </div>
                    </div>
                </div>
                <p>
                    “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                </p>
            </div>
            <div class="testimonial-para">
                <div class="test_view">
                    <div class="test_img">
                        <img src="{{ url('/front/img/view_3.png') }}">
                    </div>
                    <div class="test_hd">
                        <h6>Orlando R. Bean</h6>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>18 Jan, 2024</span>
                        </div>
                    </div>
                </div>
                <p>
                    “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                </p>
            </div>
            <div class="testimonial-para">
                <div class="test_view">
                    <div class="test_img">
                        <img src="{{ url('/front/img/view_1.png') }}">
                    </div>
                    <div class="test_hd">
                        <h6>Jerry C. Prentice</h6>
                        <div class="star_wreap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>18 Jan, 2024</span>
                        </div>
                    </div>
                </div>
                <p>
                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                </p>
            </div>
        </div>
    </div>
</section>

<section class="quality_wrapper p_100">
    <div class="container">
        <div class="quality_content">
            <h5>Buy Top-Quality Custom Banners/Signs with Free Design Templates and 24/7 Customer Assistance</h5>
            <p>
                Cre8ive Printer is a pioneer e-commerce platform that continuously strives to become your exclusive partner for meeting customised printing signage requirements. Driven by the motivation to understand customer requirements and needs, we offer exclusive banners and signs to attract your target audience and establish your business. We offer these marketing tools to increase awareness in medical care institutions, hospitals, automotive industries, Horeca and more. Innovation and creativity are the driving force behind our products and services. We facilitate a positive change in the perception of your target audience by offering unique marketing tools such as widow signage, flags, vinyl signs, and custom banners. You can use a stretch table cover in exhibits to display your products using personalisation for printing your logo or design.
            </p>
            <p>Buy these customised <a href="#" class="btn link-btn">Read More</a></p>
        </div>
    </div>
</section>

<section class="blgs_wrapper">
    <div class="container">
        <div class="blgs_hd">
            <h2>Check out our Blog For Printing Tips & Suggestions</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="blgs_lt">
                    <img src="img/blgs_dt_1.png">
                    <span>16 DEC, 2024</span>
                    <div class="blgs_lt_content">
                        <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="blog_list">
                    <li>
                        <div class="blog_list_img">
                            <img src="img/blgs_1.png">
                        </div>
                        <div class="blog_list_txt">
                            <span>12 DEC, 2024</span>
                            <h6>Lorem Ipsum is simply dummy text of the printing </h6>
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="blog_list_img">
                            <img src="img/blgs_2.png">
                        </div>
                        <div class="blog_list_txt">
                            <span>12 DEC, 2024</span>
                            <h6>Lorem Ipsum is simply dummy text of the printing </h6>
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="blog_list_img">
                            <img src="img/blgs_3.png">
                        </div>
                        <div class="blog_list_txt">
                            <span>12 DEC, 2024</span>
                            <h6>Lorem Ipsum is simply dummy text of the printing </h6>
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="best_price p_100 pb-0">
    <div class="container">
        <div class="ways_hd">
            <ul class="shipping">
                <li>
                    <div class="ship-box">
                        <img src="img/ways_4.svg" alt="">
                        <div class="text">
                            <p>Best Price</p>
                            <span>Cre8ive Printer offers the industry’s best prices while using only the highest</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="img/ways_5.svg" alt="">
                        <div class="text">
                            <p>Free Design Proof</p>
                            <span>Our industry-leading designers provide free proofs so you can be sure</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="img/ways_6.svg" alt="">
                        <div class="text">
                            <p>Best Quality</p>
                            <span>If you’re not satisfied, we’re not satisfied. We’ll reprint or refund your order - guaranteed</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection