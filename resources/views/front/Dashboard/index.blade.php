@extends('front_layout.master')
@section('content')
    <section class="banner-sec">
        <div class="container">
            <div class="banner-content p-0">
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
                                    <span>on order above £99.00</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                @if(isset($home_content))
                    <div class="banner-img">
                        <a href="{{$home_content->header_image_url ?? ''}}">
                            <img src="{{ asset('Site_Images') }}/{{$home_content->header_image ?? ''}}" alt="" />
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

@if(isset($loved_products) && !empty($loved_products) && $loved_products->isNotEmpty())
    <section class="loved-prdct_sec p_100">
        <div class="container">
            <div class="loved-prdct_content">
                <h3>Most Loved Products</h3>
                <div class="product-slider">
                    @foreach($loved_products as $product)
                        <div class="card">
                            <div class="card-wrap">
                                <div class="card-img">
                                    @foreach (json_decode($product->images) as $index => $image)
                                        @if ($index == 0)
                                            @if(isset($product->accessories_type))
                                                <img 
                                                    src="{{ asset('accessories_Images') }}/{{ $image }}">
                                            @else
                                                <img 
                                                    src="{{ asset('product_Images') }}/{{ $image }}">
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <p>{{ $product->name ?? '' }}</p>
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
                                    @if ($product->sizes->isNotEmpty())
                                        <span>Starts at: £{{ $product->sizes->first()->price ?? '' }}</span>
                                    @else
                                        <span>Starts at: £{{ $product->price ?? '' }}</span>
                                    @endif
                                    
                                    <div class="view">
                                        <a href="{{ url('details') }}/{{ $product->slug ?? '' }}">View Details <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
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
                        <h6 id="NofProducts">Found 69 Banners for your selection</h6>
                        <div class="progress busine_progress" role="progressbar" aria-valuemin="25" aria-valuemax="100">
                            <span class="slider__label sr-only"></span>
                        </div>
                    </div>
                </div>
                <div class=" busines_slider2 d-flex"  >
                
        
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
                            <div class="card" onclick="categoryUrl('{{$category->slug}}')">
                                <div class="our_best_img">
                                    <img height="60px" width="100px" src="{{ asset('category_Images') }}/{{ $category->cat_image ?? '' }}">
                                </div>
                                <div class="card-body">
                                    <p><a style="color: rgb(235, 65, 93)" href="{{ url('shop') }}/{{ $category->slug }}">{{
                                            $category->name }}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(isset($home_content))
                    <ul class="shop_wreap">
                        <li>
                            <a href="{{$home_content->ads_image_1_url ?? ''}}">
                                <img src="{{ asset('Site_Images') }}/{{$home_content->ads_image_1 ?? ''}}">
                            </a>
                        </li>
                        <li>
                            <a href="{{$home_content->ads_image_2_url ?? ''}}">
                                <img src="{{ asset('Site_Images') }}/{{$home_content->ads_image_2 ?? ''}}">
                            </a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </section>
@if(isset($loved_products) && !empty($loved_products) && $loved_products->isNotEmpty())
    <section class="custom-sec picks_wreap p_100">
        <div class="container">
            <div class="custom-content">
                <div class="busine_select mt-0">
                    <h4>Customer Picks</h4>
                    <p>Explore Our Most Popular Products</p>
                </div>
                <div class="busines_slider">
                    @foreach($loved_products as $c_product)
                        <div class="card">
                            <div class="busines_img">
                                @foreach (json_decode($c_product->images) as $index => $image)
                                    @if ($index == 0)
                                        @if(isset($c_product->accessories_type))
                                            <img 
                                                src="{{ asset('accessories_Images') }}/{{ $image }}">
                                        @else
                                            <img 
                                                src="{{ asset('product_Images') }}/{{ $image }}">
                                        @endif
                                        @break
                                    @endif
                                @endforeach
                                <div class="cust_btn_wreap">
                                    <a href="{{ url('details') }}/{{ $c_product->slug ?? '' }}" class="btn cust_btn">Customize </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>{{ $c_product->name ?? '' }}</h5>
                                @if ($c_product->sizes->isNotEmpty())
                                    <p>
                                        <span>£{{ $c_product->sizes->first()->price + 5 ?? '' }}</span>
                                        <strong>£{{ $c_product->sizes->first()->price  ?? '' }}</strong>
                                    </p>
                                @else
                                    <p><span>£{{ ($c_product->price + 5 ) ?? '' }}</span> <strong>£{{ $c_product->price ?? '' }}</strong></p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
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
                        <div class="card" onclick="productUrl('{{$product->slug}}')">
                            <div class="busines_img">
                                @foreach (json_decode($product->images) as $index => $image)
                                    @if ($index == 0)
                                        <img src="{{ asset('product_Images') }}/{{ $image }}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-body">
                                <h5>{{ $product->name }}</h5>
                                <p><span>£{{ $product->price + 15 }}</span>
                                    <strong>£{{ $product->price }}</strong>
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
                            <div class="multi_shop_cont"style="background: linear-gradient(90deg, #FEF9DC 0.15%, #EDFBFF 99.8%)">
                                <div class="multi_shop_txt">
                                    <h5>{{ $category->name ?? '' }}</h5>
                                    <p>Starting at <strong>${{ $minPriceProduct->price ?? '0' }}</strong></p>
                                    <a href="{{ url('shop') }}/{{ $category->slug ?? '' }}" class="btn btn_dark">Explore
                                        Now</a>
                                </div>
                                <div class="multi_shop_img">
                                    <a href="{{ url('shop') }}/{{ $category->slug }}"><img width="250px" height="150px"
                                            src="{{ asset('category_Images') }}/{{ $category->cat_image ?? '' }}"></a>
                                </div>
                            </div>
                            <?php $count++; ?>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @if($testimonials->isNotEmpty())
        <section class="view_wrapper p_100" style="background-color: #141414">
            <div class="container">
                <div class="view_hd">
                    <h2>Our customers speak for us!</h2>
                </div>
                <div class="view_slider m-0">
                    @foreach($testimonials as $cust)
                        <div class="testimonial-para">
                            <div class="test_view">
                                <div class="test_img">
                                    @if($cust->image )
                                        <img src="{{ asset('Site_Images') }}/{{$cust->image ?? ''}}">
                                    @else
                                        <span>{{ ucfirst(substr($cust->name ?? '', 0, 1)) }}</span>    
                                    @endif
                                       
                                </div>
                                <div class="test_hd">
                                    <h6>{{ $cust->name ?? ''}}</h6>
                                    <div class="star_wreap">
                                        @if($cust->stars)
                                            @for($i=1; $i <= $cust->stars; $i++)
                                                <i class="fa-solid fa-star"></i> 
                                            @endfor
                                        @endif
                                        <span>{{ $cust->created_at->format('j F,Y')}}</span>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <?php echo $cust->description; ?>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="quality_wrapper p_100">
        <div class="container">
            @if(isset($home_content))
                <div class="quality_content">
                    <h5>{{$home_content->bottom_title ?? ''}}</h5>
                    <p>
                        <?php echo $home_content->bottom_description; ?>
                    </p>
                    <!-- <p>Buy these customised <a href="#" class="btn link-btn">Read More</a></p> -->
                </div>
            @endif
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
                            <div class="col-lg-6" onclick="GotoBlog('{{$blog->slug}}')">
                                <div class="blgs_lt">
                                    <img width="100%" src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}">
                                    <span class="d-block">{{ $blog->created_at->format('F jS, Y') ?? '' }}</span>
                                    <div class="blgs_lt_content">
                                        <h4>{{ $blog->title ?? '' }} </h4>
                                        <?php $short_des = substr($blog->short_description, 0, 250); ?>
                                        <p class="">
                                            <?php echo $short_des; ?>..<a href="{{url('blog')}}/{{$blog->slug ?? ''}}">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="blog_list">
                            @else
                                    <li onclick="GotoBlog('{{$blog->slug}}')">
                                        <div class="blog_list_img">
                                            <img width="250px" height="200px" src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}">
                                        </div>
                                        <div class="blog_list_txt">
                                            <span>{{ $blog->created_at->format('F jS, Y') }}</span>
                                            <h6>{{ $blog->title ?? '' }} </h6>
                                            <?php $short_des = substr($blog->short_description, 0, 100); ?>
                                            <p class="">
                                                <?php echo $short_des; ?>.. <a href="{{url('blog')}}/{{$blog->slug ?? ''}}">Read
                                                    more</a>
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
            $(document).ready(function () {
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
                $('.busines_slider2').slick({
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
                
                function getProductsForCategory(categoryId) {
                    $.ajax({
                        url: "{{ url('/categories/products') }}" + "/" + categoryId,
                        type: 'GET',
                        success: function (products) {
                            var item = $('#parent_category');
                            var selectedOption = item.find('option:selected');
                            var selectedSlug = selectedOption.data('slug');
                            var NofProducts = products.length;
                            var text = "Found " + NofProducts + " " + selectedSlug + " for your selection"
                            $('#NofProducts').text(text);
                            var cardhtml = [];
                            $.each(products, function (index, product) {
                                    var Images = JSON.parse(product.images);
                                var singleCardHtml = `<div class="card col-lg-3" style="display: inline-block; margin-right: 20px;">
                                    <div class="busines_img">
                                        <img  src="{{ asset('product_Images') }}/${Images[0]}">
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
                                        <p>Starts at: £<span>${product.price}</span></p>
                                    </div>
                                </div>`;
                                cardhtml.push(singleCardHtml);
                            });
                            $('.busines_slider2').slick('unslick'); 
                            $('.busines_slider2').empty(); 
                        //    $('.busines_slider2').append(cardhtml.join(''));
                            $('.busines_slider2').slick('slickAdd', cardhtml.join(''));
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX error:", error);
                        }
                    });
                }

                function updateChildCategories(parentId) {
                    $.ajax({
                        url: "{{ url('/categories/children') }}" + "/" + parentId,
                        type: 'GET',
                        success: function (data) {
                            var childSelect = $('#child_category');
                            if (data.length > 0) {
                                childSelect.show();
                                childSelect.empty();
                                var firstChildId = data[0].id;
                                var slug = data[0].slug;
                                var url = "{{ url('shop') }}/" + slug;
                                $('#view_all').attr('href', url);
                                getProductsForCategory(firstChildId);
                                $.each(data, function (index, category) {
                                    childSelect.append('<option data-slug="' + category.slug + '" value="' + category.id + '">' +
                                        category.name + '</option>');
                                });
                            } else {
                                childSelect.hide();
                                getProductsForCategory(parentId);
                            }
                        },
                    });
                }
                $('#child_category').on('change', function () {
                    var Id = $(this).val();
                    var selectedOption = this.options[this.selectedIndex];
                    var selectedSlug = selectedOption.getAttribute('data-slug');
                    var url = "{{ url('shop') }}/" + selectedSlug;
                    $('#view_all').attr('href', url);
                    getProductsForCategory(Id);
                });
                $('#parent_category').on('change', function () {
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

            function productUrl(slug) {
                url = "{{url('details')}}/" + slug;
                window.location.href = url;
            }
            function categoryUrl(slug) {
                url = "{{url('shop')}}/" + slug;
                window.location.href = url;
            }
            function GotoBlog(slug) {
                url = "{{url('blog')}}/" + slug;
                window.location.href = url;
            }

            function removeAllSlides(sliderClass) {
                var $slider = $(sliderClass);
                 $slider.slick('slickRemove', null, null, true);
            }
        </script>
    @endif
    @if(Session::has('success'))
        <script>
            iziToast.success({
                message: '{{ Session::get("success") }}',
                position: 'topRight'
            });
        </script>
    @endif
@endsection