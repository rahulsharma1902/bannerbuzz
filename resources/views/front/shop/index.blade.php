@extends('front_layout.master')
@section('content')
    @php
        $width = null;
        $height = null;
        if ($products->isNotEmpty()) {
            foreach ($products as $product) {
                if ($product->sizes->isNotEmpty()) {
                    foreach ($product->sizes as $size) {
                        if ($size->size_type == 'wh' || $size->size_type == 'DH') {
                            $size = explode('X', $size->size_value);
                            $width[] = $size[0];
                            $height[] = $size[1];
                        }
                    }
                }
            }
        }
        if ($width && $height) {
            $width = collect($width)->unique()->values()->all();
            $height = collect($height)->unique()->values()->all();
            sort($width);
            sort($height);
        }
    @endphp
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
                    {!! Breadcrumbs::render('category', $category) !!}

                </nav>
                <div class="vinyl_content">
                    <h3>{{ $category->name ?? '' }}</h3>
                    <p>
                        <?php if ($category->description) {
                            echo $category->description;
                        } ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="custom-sec shop_size">
        <div class="container">
            <div class="custom-content" style="background-color: #141414;">
                <h3>Start Your Order</h3>
                @if ($allproducts->isNotEmpty())
                    <form id="search_product_form">
                        <div class="select-box ">
                            <div class="select_wrap">
                                <select id="product_select" name="product_slug" class="form-select"
                                    aria-label="Default select example">
                                    @foreach ($allproducts as $product)
                                        <option data-price="{{ $product->price }}" data-id="{{ $product->id }}"
                                            value="{{ $product->slug ?? '' }}">
                                            {{ $product->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div @if ($allproducts->first()->sizes->isNotEmpty()) style="display:none;" @endif id="select_size_div"
                                class="select_wrap">
                                <select id="select_size" class="form-select" name="product_size"
                                    aria-label="Default select example">

                                </select>
                            </div>

                            <div @if ($allproducts->first()->sizes->isNotEmpty()) style="display:none;" @endif class="select_wrap"
                                id="size_unit_div">
                                <select class="form-select" id="size_unit" name="size_unit"
                                    aria-label="Default select example">
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
                @endif
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
                            @if ($category->subCategories->isNotEmpty())
                                <div class="accordion-item">
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

                                                @foreach ($category->subCategories as $sub_category)
                                                    <li><a
                                                            href="{{ url('shop') }}/{{ $sub_category->slug }}">{{ $sub_category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($category->productTypes->isNotEmpty())
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Products Type
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @foreach ($category->productTypes as $type)
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
                            @if ($width)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingWidth">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseWidth"
                                            aria-expanded="false" aria-controls="collapseWidth">
                                            Width
                                        </button>
                                    </h2>
                                    <div id="collapseWidth" class="accordion-collapse collapse"
                                        aria-labelledby="headingWidth" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @foreach ($width as $width)
                                                <p><input value="{{ $width }}" type="checkbox" name="Width"
                                                        class="productWidth">&nbsp;{{ $width }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($height)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingheight">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseheight"
                                            aria-expanded="false" aria-controls="collapseheight">
                                            Height
                                        </button>
                                    </h2>
                                    <div id="collapseheight" class="accordion-collapse collapse"
                                        aria-labelledby="headingheight" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @foreach ($height as $height)
                                                <p><input value="{{ $height }}" type="checkbox"
                                                        class="productheight" name="height">&nbsp;{{ $height }}
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="shop_rtl_wreap">
                        <div class="shop_rtl busines_slider">
                            @if ($products->isNotEmpty())
                                <?php $count = 0; ?>
                                @foreach ($products as $product)
                                    @php
                                        $p_width = null;
                                        $p_height = null;
                                        if ($product->sizes->isNotEmpty()) {
                                            foreach ($product->sizes as $size) {
                                                if ($size->size_type == 'wh' || $size->size_type == 'DH') {
                                                    $size = explode('X', $size->size_value);
                                                    $p_width[] = $size[0];
                                                    $p_height[] = $size[1];
                                                }
                                            }
                                            if ($p_width && $p_height) {
                                                $p_width = collect($p_width)->unique()->values()->all();
                                                $p_height = collect($p_height)->unique()->values()->all();
                                                sort($p_width);
                                                sort($p_height);
                                                $p_width = implode(',', $p_width);
                                                $p_height = implode(',', $p_height);
                                            }
                                        }
                                    @endphp
                                    <div class="product-div card"
                                        data-productType="{{ $product->productType->slug ?? '' }}"
                                        data-printtype="{{ $product->is_printed }}"
                                        @if ($p_width && $p_height) data-width="{{ $p_width }}" data-height="{{ $p_height }}" @else data-width="" data-height="" @endif>
                                        <div class="busines_img">
                                            @foreach (json_decode($product->images) as $index => $image)
                                                @if ($index == 0)
                                                    <img height="160px" width="200px"
                                                        src="{{ asset('product_Images') }}/{{ $image }}">
                                                @endif
                                            @endforeach
                                            <div class="cust_btn_wreap">
                                                <a href="{{ url('details') }}/{{ $product->slug ?? '' }}"
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
                                            @else
                                                <p>Starts at
                                                    <span>£{{ $product->price ?? '' }}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <?php $count++; ?>
                                @endforeach
                            @endif
                        </div>
                        <div class="paginetion_wreap">
                            @if ($products->lastPage() > 1)
                                <ul class="list-unstyled m-0">
                                    @if ($products->onFirstPage())
                                        <li>
                                            <a href=""><i class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="active">
                                            <a href="{{ $products->nextPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    @elseif ($products->HasmorePages())
                                        <li class="active">
                                            <a href="{{ $products->previousPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="active">
                                            <a href="{{ $products->nextPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    @else
                                        <li class="active">
                                            <a href="{{ $products->previousPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
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
                    @if ($category->FAQs->isNotEmpty())
                        <?php $count = 0; ?>
                        @foreach ($category->FAQs as $FAQs)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button @if ($count != 0) collapsed @endif"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $count }}"
                                        aria-expanded="@if ($count == 0) show @else false @endif"
                                        aria-controls="collapse{{ $count }}">
                                        {{ $FAQs->title ?? '' }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $count }}"
                                    class="accordion-collapse collapse @if ($count == 0) show @endif"
                                    aria-labelledby="heading{{ $count }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {{ $FAQs->description ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if ($products->isNotEmpty())
        <script>
            $(document).ready(function() {
                // default product selected
                var defaultProductId = "{{ $allproducts->first()->id }}";
                var defaultValue = "{{ $allproducts->first()->slug }}";
                var productprice = "{{ $allproducts->first()->price }}";
                GetProductSizes(defaultProductId, productprice);
                $('#product_select').val(defaultValue);

                // getting size and  price of product
                function GetProductSizes(Id, productprice) {
                    $.ajax({
                        url: "{{ url('/product/sizes') }}" + "/" + Id,
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
                        url: "{{ url('/product/sizes') }}" + "/" + id,
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

                //::::::::::::: applying filters ::::::::::::::::::::::://
                $('#print_type').on('change', function() {
                    applyFilters();
                });

                $('.productType').on('change', function() {
                    applyFilters();
                });

                $('.productWidth').on('change', function() {
                    applyFilters();
                });
                $('.productheight').on('change', function() {
                    applyFilters();
                });

                function applyFilters() {
                    var selectedType = $('.productType:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var selectedWidth = $('.productWidth:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var selectedHeight = $('.productheight:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var printType = $('#print_type').is(':checked');
                    var printTypevalue = $('#print_type').val();
                    $('.product-div').each(function() {
                        var productType = $(this).data('producttype');
                        var productprint = $(this).data('printtype');
                        var productWidth = $(this).data('width').split(',');
                        var productHeight = $(this).data('height').split(',');
                        if (productType || productprint) {
                            var showproduct =
                                (selectedType.length === 0 || selectedType.some(service =>
                                    productType.includes(service))) &&
                                (!printType || productprint.includes(printTypevalue)) &&
                                (selectedWidth.length === 0 || selectedWidth.some(width =>
                                    productWidth.includes(width))) &&
                                (selectedHeight.length === 0 || selectedHeight.some(height =>
                                    productHeight.includes(height)));
                            $(this).toggle(showproduct);
                        }
                    });
                }
                //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://

                //::::::::::::::::: buy now section :::::::::::::::::::::::://
                $('#buy_now').on('click', function() {
                    var myform = $('#search_product_form');
                    var formData = myform.serialize();
                    var params = new URLSearchParams(formData);
                    console.log(formData);
                    var productSlug = params.get('product_slug');
                    var size = params.get('product_size');
                    var sizeUnit = params.get('size_unit');
                    var quantity = params.get('quantity');
                    var url = "{{ url('/details') }}" + "/" + encodeURIComponent(productSlug) + "?size=" +
                        size + "&sizeUnit=" + sizeUnit + "&quantity=" + quantity;
                    window.location.href = url;
                });
            });
        </script>
    @endif
@endsection
