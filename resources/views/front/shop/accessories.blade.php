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
                    <img src="{{ asset('front/img/banner_shop.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>

    <section class="vinyl_wrapper">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('accessories') !!}

                </nav>
                <div class="vinyl_content">
                    <h3>Accessories</h3>
                </div>
            </div>
        </div>
    </section>
        <section class="custom-sec shop_size">
            <div class="container">
                <div class="custom-content" style="background-color: #141414;">
                    <h3>Start Your Order</h3>
                    <form id="search_product">
                        <div class="select-box">
                            <div class="select_wrap">
                                <select id="product_select" name="product_slug" class="form-select"
                                    aria-label="Default select example">
                                    @if ($product_accessories->isNotEmpty())
                                        @foreach ($product_accessories as $product)
                                            <option data-price="{{ $product->price }}" data-id="{{ $product->id }}"
                                                value="{{ $product->slug ?? '' }}">
                                                {{ $product->name ?? '' }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div @if ($product_accessories->first()->sizes->isNotEmpty()) style="display:none;" @endif id="select_size_div"
                                class="select_wrap">
                                <select id="select_size" class="form-select" name="product_size"
                                    aria-label="Default select example">
    
                                </select>
                            </div>
    
                            <div @if ($product_accessories->first()->sizes->isNotEmpty()) style="display:none;" @endif class="select_wrap"
                                id="size_unit_div">
                                <select class="form-select" id="size_unit" name="size_unit" aria-label="Default select example">
                                    <option selected value="Ft">Ft</option>
                                    <option value="In">In</option>
                                    <option value="Mm">Mm</option>
                                    <option value="Cm">Cm</option>
                                </select>
                            </div>
                            <div class="select_wrap">
                                <input type="number" min="1" max="999" id="product_qty" name="quantity"
                                    value="1" class="form-select" aria-label="Default select example">
                            </div>
                        </div>
                    </form>
                    <div class="shop_size_txt">
                        <p>Price: <span><del id="main_price">$11.75</del></span> <strong data-price=""
                                id="size_price">$11.75</strong></p>
                        <input type="hidden" id="product_price" name="product_price" value="">
                        <button type="button" id="buy_now" class="btn light_dark">Buy Now</a>
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
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @if ($category->subCategories->isNotEmpty())
                                                @foreach ($category->subCategories as $sub_category)
                                                    <li><a
                                                            href="{{ url('shop') }}/{{ $sub_category->slug }}">{{ $sub_category->name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            @if ($product_accessoriesType->isNotEmpty())
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Products Type
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                            @foreach ($product_accessoriesType as $type)
                                                <p><input value="{{ $type->slug }}" type="checkbox"
                                                    name="productType[]"
                                                    class="productType">&nbsp;{{ $type->name }}</p>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Print Type
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p><input value="yes" type="checkbox" name="print_type"
                                                id="print_type">&nbsp;Printed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop_rtl_wreap">
                        <div class="shop_rtl busines_slider">
                            @if ($product_accessories->isNotEmpty())
                                @foreach ($product_accessories as $product)
                                    <div class="product-div card" data-productType="{{ $product->type->slug ?? '' }}"
                                        data-printtype="{{ $product->is_printed }}">
                                        <div class="busines_img">
                                            @foreach (json_decode($product->images) as $index => $image)
                                                @if ($index == 0)
                                                    <img height="160px" width="200px"
                                                        src="{{ asset('accessories_Images') }}/{{ $image }}">
                                                @endif
                                            @endforeach
                                            <div class="cust_btn_wreap">
                                                <a href="{{ url('accessories') }}/{{ $product->slug ?? '' }}"
                                                    class="btn cust_btn" tabindex="0">Customize </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $product->name ?? '' }}</h5>
                                            <div class="star_wreap">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <span>4.54/5</span>
                                            </div>
                                            @if ($product->sizes->isNotEmpty())
                                                <p>{{ $product->sizes->first()->size_value ?? '' }} Starts at
                                                    <span>£{{ $product->sizes->first()->price ?? '' }}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="paginetion_wreap">
                            @if ($product_accessories->lastPage() > 1)
                                <ul class="list-unstyled m-0">
                                    @if ($product_accessories->onFirstPage())
                                        <li>
                                            <a href=""><i class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $product_accessories->lastPage(); $i++)
                                            <li class="{{ $i == $product_accessories->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $product_accessories->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="active">
                                            <a href="{{ $product_accessories->nextPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    @elseif ($product_accessories->HasmorePages())
                                        <li class="active">
                                            <a href="{{ $product_accessories->previousPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $product_accessories->lastPage(); $i++)
                                            <li class="{{ $i == $product_accessories->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $product_accessories->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="active">
                                            <a href="{{ $product_accessories->nextPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    @else
                                        <li class="active">
                                            <a href="{{ $product_accessories->previousPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $product_accessories->lastPage(); $i++)
                                            <li class="{{ $i == $product_accessories->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $product_accessories->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li>
                                            <a href=""><i class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            @endif
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
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Shop Vinyl Banners for Long-Lasting and Great Advertising Solutions
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    When it comes to advertising in the great outdoors, durability is of the utmost
                                    importance. Our Custom Vinyl Banners are made from a high-quality PVC material, which
                                    not only guarantees their durability but also provides water-resistant properties. These
                                    banners can withstand the elements, including rain and shine, and will not lose their
                                    brilliant colors or their striking appearance. When you use one of our vinyl banners to
                                    display your message or brand outside, you can do so with full assurance, knowing that
                                    the banner will continue to be resilient and captivating no matter the temperature or
                                    precipitation.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Perfectly Tailored Custom Vinyl Banners to Meet Your Requirements
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Cost-Effective, Durable & Portable Vinyl Banners for Indoor & Outdoor Purposes
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($product_accessories->isNotEmpty())
        <script>
            $(document).ready(function() {
                // default product selected
                var defaultProductId = "{{ $product_accessories->first()->id }}";
                var defaultValue = "{{ $product_accessories->first()->slug }}";
                var productprice = "{{ $product_accessories->first()->price }}";
                GetProductSizes(defaultProductId, productprice);
                $('#product_select').val(defaultValue);

                // getting size and  price of product
                function GetProductSizes(Id, productprice) {
                    $.ajax({
                        url: "{{ url('/accessories/sizes') }}" + "/" + Id,
                        type: 'GET',
                        success: function(data) {
                            var sizeSelect = $('#select_size');
                            var selectsizediv = $('#select_size_div');
                            if (data.length > 0) {
                                selectsizediv.show();
                                sizeSelect.empty();
                                var price = parseFloat(data[0].price);
                                var sizeType = data[0].size_type;
                                if (sizeType == 'Custom') {
                                    $('#size_unit_div').hide();
                                } else {
                                    $('#size_unit_div').show();
                                }
                                var qty = parseFloat($('#product_qty').val());
                                $('#product_price').val(price * qty);
                                $('#size_price').text('$' + price * qty);
                                $('#size_price').attr('data-price', price * qty);
                                $('#main_price').text('$' + (price + 10) * qty);
                                $.each(data, function(index, size) {
                                    if (size.size_type == 'wh' || size.size_type == 'DH') {
                                        size_values = size.size_value.split('X');
                                        sizeSelect.append('<option data-sizeType="' + size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            +size_values[0] + ' X ' + size_values[1] +
                                            '</option>');
                                    } else {
                                        sizeSelect.append('<option data-sizeType="' + size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            size.size_value + '</option>');
                                    }
                                });
                            } else {
                                $('#size_unit_div').hide();
                                selectsizediv.hide();
                                var qty = parseFloat($('#product_qty').val());
                                $('#product_price').val(parseFloat(productprice) * qty);
                                $('#size_price').text('$' + parseFloat(productprice) * qty);
                                $('#size_price').attr('data-price', parseFloat(productprice) * qty);
                                $('#main_price').text('$' + (parseFloat(productprice) + 10) * qty);
                            }
                        },
                    });
                }

                // on select different product 
                $('#product_select').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var productPrice = selectedOption.data('price');
                    var Id = selectedOption.data('id');
                    $("#size_unit option").prop("selected", function() {
                        return this.defaultSelected;
                    });
                    GetProductSizes(Id, productPrice);
                });

                // on change product quantity
                $('#product_qty').on('change', function() {
                    var value = $(this).val();
                    if (value < 1 || value > 999) {
                        value = 1;
                        $('#product_qty').val(1);
                    }
                    var sizeSelect = $('#select_size').value;
                    console.log(sizeSelect);
                    if (sizeSelect) {
                        console.log("ifpart");
                        var selectedOption = sizeSelect.find('option:selected');
                        var selectedprice = parseFloat(selectedOption.data('price'));
                        var newPrice = parseFloat(selectedprice) * parseFloat(value);
                        $('#product_price').val(newPrice);
                        $('#size_price').text('$' + newPrice);
                        $('#size_price').attr('data-price', newPrice);
                        $('#main_price').text('$' + (newPrice + 10));
                    } else {
                        var selectproduct = $('#product_select');
                        var selectedOption = selectproduct.find(':selected');
                        var price = selectedOption.data('price');
                        console.log(price);
                        var newPrice = parseFloat(price) * parseFloat(value);
                        $('#product_price').val(newPrice);
                        $('#size_price').text('$' + newPrice);
                        $('#size_price').attr('data-price', newPrice);
                        $('#main_price').text('$' + (newPrice + 10));
                    }
                });

                // on changing size unit 
                $('#size_unit').on('change', function() {
                    var unit_value = $(this).val();
                    var productID = $('#product_select');
                    var selectedOption = productID.find('option:selected');
                    var ID = selectedOption.data('id');
                    var selectedSize = $('#select_size').val();
                    updateSize(ID, unit_value, selectedSize);
                });

                // updating size on changing unit 
                function updateSize(id, value, selectedSize) {
                    $.ajax({
                        url: "{{ url('/accessories/sizes') }}" + "/" + id,
                        type: 'GET',
                        success: function(data) {
                            var sizeSelect = $('#select_size');
                            var selectedOption = sizeSelect.find('option:selected');
                            var selectedprice = parseFloat(selectedOption.data('price'));
                            if (data.length > 0) {
                                sizeSelect.show();
                                sizeSelect.empty();
                                var price = parseFloat(data[0].price);
                                var sizeType = data[0].size_type;
                                if (sizeType == 'Custom') {
                                    $('#size_unit_div').hide();
                                }
                                var qty = parseFloat($('#product_qty').val());
                                $('#product_price').val(selectedprice * qty);
                                $('#size_price').text('$' + selectedprice * qty);
                                $('#size_price').attr('data-price', selectedprice * qty);
                                $('#main_price').text('$' + (selectedprice * qty + 10));
                                if (value == 'In') {
                                    unit_value = 12;
                                } else if (value == 'Cm') {
                                    unit_value = 30;
                                } else if (value == 'Mm') {
                                    unit_value = 304;
                                } else if (value == 'Ft') {
                                    unit_value = 1;
                                }
                                $.each(data, function(index, size) {
                                    if (size.size_type == 'wh' || size.size_type == 'DH') {
                                        if (selectedSize == size.size_value) {
                                            size_values = size.size_value.split('X');
                                            sizeSelect.append('<option selected data-sizeType="' +
                                                size
                                                .size_type + '" data-price="' + size.price +
                                                '" value="' + size.size_value + '">' +
                                                +parseFloat(size_values[0]) * unit_value +
                                                ' X ' +
                                                parseFloat(size_values[1]) * unit_value +
                                                '</option>');
                                        } else {
                                            size_values = size.size_value.split('X');
                                            sizeSelect.append('<option data-sizeType="' + size
                                                .size_type + '" data-price="' + size.price +
                                                '" value="' + size.size_value + '">' +
                                                +parseFloat(size_values[0]) * unit_value +
                                                ' X ' +
                                                parseFloat(size_values[1]) * unit_value +
                                                '</option>');
                                        }

                                    } else {
                                        if (selectedSize == size.size_value) {
                                            sizeSelect.append('<option selected data-sizeType="' +
                                                size
                                                .size_type + '" data-price="' + size.price +
                                                '" value="' + size.size_value + '">' +
                                                parseFloat(size.size_value) * unit_value +
                                                '</option>');
                                        } else {
                                            sizeSelect.append('<option data-sizeType="' + size
                                                .size_type + '" data-price="' + size.price +
                                                '" value="' + size.size_value + '">' +
                                                parseFloat(size.size_value) * unit_value +
                                                '</option>');
                                        }
                                    }
                                });
                            } else {
                                sizeSelect.hide();
                            }
                        },
                    });
                }

                // on selecting the size 
                $('#select_size').on('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var selectedprice = selectedOption.getAttribute('data-price');
                    var qty = $('#product_qty').val();
                    var price = parseFloat(selectedprice) * parseFloat(qty);
                    $('#size_price').text('$' + price);
                    $('#main_price').text('$' + (price + 10));
                    $('#product_price').val(price);
                });

                //::::::::: Applying Filters ::::::::::::::::::::://
                $('#print_type').on('change', function() {
                    applyFilters();
                });

                $('.productType').on('change', function() {
                    applyFilters();
                });

                function applyFilters() {
                    var selectedServices = $('.productType:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var printType = $('#print_type').is(':checked');
                    var printTypevalue = $('#print_type').val();
                    console.log(printTypevalue);
                    $('.product-div').each(function() {
                        var productType = $(this).data('producttype');
                        var productprint = $(this).data('printtype');
                        if (productType || productprint) {
                            var showproduct =
                                (selectedServices.length === 0 || selectedServices.some(service =>
                                    productType.includes(service))) &&
                                (!printType || productprint.includes(printTypevalue));

                            $(this).toggle(showproduct);
                        }
                    });
                }
                //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://

                //:::::::::::: generate Url :::::::::::::://
                $('#buy_now').on('click', function() {
                    var myform = $('#search_product');
                    var formData = myform.serialize();
                    var params = new URLSearchParams(formData);
                    var productSlug = params.get('product_slug');
                    var size = params.get('product_size');
                    var sizeUnit = params.get('size_unit');
                    var quantity = params.get('quantity');
                    var url = "{{ url('/accessories') }}" + "/" + encodeURIComponent(productSlug) + "?size=" +
                        size + "&sizeUnit=" + sizeUnit + "&quantity=" + quantity;
                    window.location.href = url;
                });
            });
        </script>
    @endif
@endsection
