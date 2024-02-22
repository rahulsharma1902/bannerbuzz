@extends('front_layout.master')
@section('content')
    <section class="banner-sec">
        <div class="container">
            <div class="banner-content">
                <div class="banner-head">
                    <ul class="shipping">
                        <li>
                            <div class="ship-box">
                                <img src="{{ asset('front/img/some.svg') }}" alt="" />
                                <div class="text">
                                    <p>Same Day Shipping</p>
                                    <span>on selected products</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ship-box">
                                <img src="{{ asset('front/img/priority.svg') }}" alt="" />
                                <div class="text">
                                    <p>Priority Shipping</p>
                                    <span>on all the orders</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ship-box">
                                <img src="{{ asset('front/img/free.svg') }}" alt="" />
                                <div class="text">
                                    <p>Free Shipping</p>
                                    <span>on order above $99.00</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="banner-img">
                    <img src="{{ asset('front/img/crea8bann.svg') }}" alt="" />
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
                                <img src="{{ asset('front/img/cardprdt1.png') }}" alt="" />
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
                                <img src="{{ asset('front/img/cardprdt2.png') }}" alt="" />
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
                                <img src="{{ asset('front/img/cardprdt3.png') }}" alt="" />
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
                                <img src="{{ asset('front/img/cardprdt1.png') }}" alt="" />
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
                        <select class="form-select" id="parent_category" data-slug="" name="parent_category"
                            aria-label="Default select example">
                            @if ($product_categories->isNotEmpty())
                                @foreach ($product_categories as $category)
                                    <option data-slug="{{ $category->slug }}" value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class="form-select" data-id="" id="child_category" name="child_category"
                            aria-label="Default select example">
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
                <div id="product_container" class="busines_slider busi_slider d-flex">
                    {{-- <div class="card">
                        <div class="busines_img">
                            <img src="{{ asset('front/img/busin_3.png') }}">
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
                    </div> --}}
                </div>
                <div class="busines_btn">
                    <a href="" id="view_all" class="btn cta">View All</a>
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
                            <img src="{{ asset('front/img/ways_1.svg') }}">
                            <div class="text">
                                <p>Design Template</p>
                                <span>Professionally Designed</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_2.svg') }}">
                            <div class="text">
                                <p>Upload Artwork</p>
                                <span>Perfect Print</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_3.svg') }}">
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
                    @if ($product_categories->isNotEmpty())
                        @foreach ($product_categories as $category)
                            <div class="card">
                                <div class="our_best_img">
                                    @if ($category->images)
                                        @foreach (json_decode($category->images) as $index => $image)
                                            @if ($index == 0)
                                                <img height="60px" width="100px"
                                                    src="{{ asset('category_Images') }}/{{ $image }}">
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="card-body">
                                    <p><a style="color: rgb(235, 65, 93)"
                                            href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <ul class="shop_wreap">
                    <li>
                        <a href="#">
                            <img src="{{ asset('front/img/shop_1.svg') }}">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('front/img/shop_2.svg') }}">
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
                            <img src="{{ asset('front/img/busin_1.png') }}">
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
                            <img src="{{ asset('front/img/busin_2.png') }}">
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
                            <img src="{{ asset('front/img/busin_3.png') }}">
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
                            <img src="{{ asset('front/img/busin_4.png') }}">
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
                            <img src="{{ asset('front/img/busin_2.png') }}">
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
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <div class="card">
                            <div class="busines_img">
                                @foreach (json_decode($product->images) as $index => $image)
                                    @if ($index == 0)
                                        <img src="{{ asset('product_Images') }}/{{ $image }}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-body">
                                <h5>{{ $product->name }}</h5>
                                <p><span>${{ $product->price + 15 }}</span>
                                    <strong>${{ $product->price }}</strong>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="progress arrivals_progress" role="progressbar" aria-valuemin="25" aria-valuemax="100">
                <span class="slider__label sr-only"></span>
            </div>
        </div>
    </section>

    <section class="multi_shop_wreap p_100">
        <div class="container">
            <div class="multi_shop_grid">
                @if ($product_categories->isNotEmpty())
                    <?php $count = 0; ?>
                    @foreach ($product_categories as $category)
                        <?php
                        $minPrice = PHP_INT_MAX;
                        $minPriceProduct = null;
                        if ($category->products->isNotEmpty()) {
                            foreach ($category->products as $product) {
                                if ($product->price < $minPrice) {
                                    $minPrice = $product->price;
                                    $minPriceProduct = $product;
                                }
                            }
                        }
                        if ($category->subCategories->isNotEmpty()) {
                            foreach ($category->subCategories as $subCategory) {
                                foreach ($subCategory->products as $product) {
                                    if ($product->price < $minPrice) {
                                        $minPrice = $product->price;
                                        $minPriceProduct = $product;
                                    }
                                }
                            }
                        }
                        ?>
                        @if ($count < 4)
                            <div class="multi_shop_cont"
                                style="background: linear-gradient(90deg, #FEF9DC 0.15%, #EDFBFF 99.8%)">
                                <div class="multi_shop_txt">
                                    <h5>{{ $category->name ?? '' }}</h5>
                                    <p>Starting at <strong>${{ $minPriceProduct->price ?? '0' }}</strong></p>
                                    <a href="{{ url('shop') }}/{{ $category->slug ?? '' }}"
                                        class="btn btn_dark">Explore
                                        Now</a>
                                </div>
                                <div class="multi_shop_img">
                                    @if ($category->images)
                                        @foreach (json_decode($category->images) as $index => $image)
                                            @if ($index == 0)
                                                <a href="{{ url('shop') }}/{{ $category->slug }}"><img width="250px"
                                                        height="150px"
                                                        src="{{ asset('category_Images') }}/{{ $image }}"></a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <?php $count++; ?>
                        @endif
                    @endforeach
                @endif
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
                            <img src="{{ asset('front/img/view_1.png') }}">
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
                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages”
                    </p>
                </div>
                <div class="testimonial-para">
                    <div class="test_view">
                        <div class="test_img">
                            <img src="{{ asset('front/img/view_2.png') }}">
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
                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s”
                    </p>
                </div>
                <div class="testimonial-para">
                    <div class="test_view">
                        <div class="test_img">
                            <img src="{{ asset('front/img/view_3.png') }}">
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
                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                    </p>
                </div>
                <div class="testimonial-para">
                    <div class="test_view">
                        <div class="test_img">
                            <img src="{{ asset('front/img/view_1.png') }}">
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
                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages”
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
                    Cre8ive Printer is a pioneer e-commerce platform that continuously strives to become your exclusive
                    partner for meeting customised printing signage requirements. Driven by the motivation to understand
                    customer requirements and needs, we offer exclusive banners and signs to attract your target audience
                    and establish your business. We offer these marketing tools to increase awareness in medical care
                    institutions, hospitals, automotive industries, Horeca and more. Innovation and creativity are the
                    driving force behind our products and services. We facilitate a positive change in the perception of
                    your target audience by offering unique marketing tools such as widow signage, flags, vinyl signs, and
                    custom banners. You can use a stretch table cover in exhibits to display your products using
                    personalisation for printing your logo or design.
                </p>
                <p>Buy these customised <a href="#" class="btn link-btn">Read More</a></p>
            </div>
        </div>
    </section>
    @if ($blogs->isNotEmpty())
        <section class="blgs_wrapper">
            <div class="container">
                <div class="blgs_hd">
                    <h2>Check out our Blog For Printing Tips & Suggestions</h2>
                </div>
                <div class="row">
                    @foreach ($blogs as $key => $blog)
                        @if ($key == 0)
                            <div class="col-lg-6">
                                <div class="blgs_lt">
                                    <img width="100%" src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}">
                                    <span class="d-block">{{ $blog->created_at->format('F jS, Y') ?? '' }}</span>
                                    <div class="blgs_lt_content">
                                        <h4>{{ $blog->title ?? '' }} </h4>
                                        <?php $short_des = substr($blog->short_description, 0, 250); ?>
                                        <p class=""><?php echo $short_des; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="blog_list">
                                @else
                                    <li>
                                        <div class="blog_list_img">
                                            <img width="250px" height="200px"
                                                src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}">
                                        </div>
                                        <div class="blog_list_txt">
                                            <span>{{ $blog->created_at->format('F jS, Y') }}</span>
                                            <h6>{{ $blog->title ?? '' }} </h6>
                                            <?php $short_des = substr($blog->short_description, 0, 100); ?>
                                            <p class=""><?php echo $short_des; ?>
                                            </p>
                                        </div>
                                    </li>
                        @endif
                    @endforeach


                    </ul>
                </div>
            </div>
            </div>
        </section>
    @endif
    <section class="best_price p_100 pb-0">
        <div class="container">
            <div class="ways_hd">
                <ul class="shipping">
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_4.svg') }}" alt="">
                            <div class="text">
                                <p>Best Price</p>
                                <span>Cre8ive Printer offers the industry’s best prices while using only the highest</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_5.svg') }}" alt="">
                            <div class="text">
                                <p>Free Design Proof</p>
                                <span>Our industry-leading designers provide free proofs so you can be sure</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_6.svg') }}" alt="">
                            <div class="text">
                                <p>Best Quality</p>
                                <span>If you’re not satisfied, we’re not satisfied. We’ll reprint or refund your order -
                                    guaranteed</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @if ($product_categories->isNotEmpty())
        <script>
            $(document).ready(function() {
                function updateChildCategories(parentId) {
                    $.ajax({
                        url: "{{ url('/categories/children') }}" + "/" + parentId,
                        type: 'GET',
                        success: function(data) {
                            var childSelect = $('#child_category');

                            if (data.length > 0) {
                                childSelect.show();
                                childSelect.empty();
                                var firstChildId = data[0].id;
                                var slug = data[0].slug;
                                var url = "{{ url('shop') }}/" + slug;
                                $('#view_all').attr('href', url);
                                getProductsForCategory(firstChildId);
                                $.each(data, function(index, category) {
                                    childSelect.append('<option data-slug="'+ category.slug +'" value="' + category.id + '">' +
                                        category.name + '</option>');
                                });
                            } else {
                                childSelect.hide();
                                getProductsForCategory(parentId);
                            }
                        },
                    });
                }

                function getProductsForCategory(categoryId) {
                    $.ajax({
                        url: "{{ url('/categories/products') }}" + "/" + categoryId,
                        type: 'GET',
                        success: function(products) {
                            var productList = $('#product_container');
                            productList.empty();
                            $.each(products, function(index, product) {
                                var Images = JSON.parse(product.images);
                                var cardHtml = `<div class="card col-lg-3">
                        <div class="busines_img">
                            <img width="150px" height="160px" src="{{ asset('product_Images') }}/${Images[0]}">
                            <div class="cust_btn_wreap">
                                <a href="{{ url('details') }}/${product.slug}" class="btn cust_btn" tabindex="0">Customize </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6>${product.name}</h6>
                            <div class="star_wreap">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span>9’321</span>
                            </div>
                            <p>Starts at: $<span>${product.price}</span></p>
                        </div>
                    </div>`;
                                productList.append(cardHtml);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX error:", error);
                        }
                    });
                }

                $('#child_category').on('change', function() {
                    var Id = $(this).val();
                    var selectedOption = this.options[this.selectedIndex];
                    var selectedSlug = selectedOption.getAttribute('data-slug');
                    var url = "{{ url('shop') }}/" + selectedSlug;
                    $('#view_all').attr('href', url);
                    getProductsForCategory(Id);
                });
                $('#parent_category').on('change', function() {
                    var parentId = $(this).val();
                    var selectedOption = this.options[this.selectedIndex];
                    var selectedSlug = selectedOption.getAttribute('data-slug');
                    var url = "{{ url('shop') }}/" + selectedSlug;
                    $('#view_all').attr('href', url);
                    updateChildCategories(parentId);
                });

                var defaultParentId = "{{ $product_categories->first()->id }}";
                var defaulturl = "{{ url('shop') }}/" + "{{ $product_categories->first()->slug }}";
                $('#view_all').attr('href', defaulturl);
                updateChildCategories(defaultParentId);
                $('#parent_category').val(defaultParentId);
            });
        </script>
    @endif
@endsection
