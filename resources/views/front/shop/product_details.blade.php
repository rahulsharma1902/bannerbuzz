@extends('front_layout.master')
@section('content')
    <section class="vinyl_wrapper">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Banners</a></li>
                        <li class="breadcrumb-item"><a href="#">Vinyl Banners</a></li>
                        <li class="breadcrumb-item"><a href="#">Business Banners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Custom Vinyl Banners</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    @if ($product)
        <section class="shop_dt_wrapper p_100 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shop_dt_img">
                            @foreach (json_decode($product->images) as $index => $image)
                                @if ($index == 0)
                                    <div class="shop_dt_img_inner">
                                        <img src="{{ asset('product_Images') }}/{{ $image }}">
                                    </div>
                                    <ul>
                                    @else
                                        <li>
                                            <img width="130px" height="60px"
                                                src="{{ asset('product_Images') }}/{{ $image }}">
                                        </li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shop_dt_cst">
                            <div class="shop_dt_view">
                                <h3>{{ $product->name }}</h3>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <p>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    9724 Reviews | Product Specifications | 1 Answered questions | SKU : BBVBCB00
                                </p>
                            </div>
                            <div class="shop_dt_list">
                                <ul>
                                    <li>
                                        High-quality PVC flex vinyl banner that lasts up to 7 years.
                                    </li>
                                    <li>
                                        High-quality PVC flex vinyl banner that lasts up to 7 years.
                                    </li>
                                    <li>
                                        High-quality PVC flex vinyl banner that lasts up to 7 years.
                                    </li>
                                    <li>
                                        High-quality PVC flex vinyl banner that lasts up to 7 years.
                                    </li>
                                </ul>
                            </div>
                            <div class="shop_dt_ship">
                                <p><strong>Want it by Friday, Jan. 26?</strong> Order Today and choose 'Urgent' shipping at
                                    checkout.</p>
                            </div>
                            <form>
                                @if ($product->sizes->isNotEmpty())
                                    <div class="shop_dt_fm">
                                        <div class="shop_dt_size">
                                            <select id="select_size" name="product_size" class="form-select">
                                                @foreach ($product->sizes as $size)
                                                    <option data-id="{{ $size->id }}" data-price="{{ $size->price }}"
                                                        value="{{ $size->size_value }}">{{ $size->size_value }}</option>
                                                @endforeach
                                            </select>
                                            @if ($product->sizes->first()->size_type != 'Custom')
                                                <select id="size_unit" name="size_unit" class="form-select">
                                                    <option value="Ft" selected>Ft</option>
                                                    <option value="In">inch</option>
                                                    <option value="Cm">Cm</option>
                                                    <option value="Mm">Mm</option>
                                                </select>
                                            @endif
                                            <input type="number" value="1" id="product_quantity" name="quantity"
                                                placeholder="Qty" class="form-select">
                                        </div>
                                    </div>
                                @endif
                                @if ($product->variations->isNotEmpty())
                                    @foreach ($product->variations as $variation)
                                        <div class="variation_div shop_dt_fm">
                                            <div class="shop_dt_group">
                                                <label class="form-label">{{ $variation->name }}:</label>
                                                @if ($variation->variationData->isNotEmpty())
                                                    <select name="{{ $variation->var_slug }}"
                                                        class="product_variation form-select">
                                                        @foreach ($variation->variationData as $data)
                                                            <option data-id="{{ $data->id }}"
                                                                data-price="{{ $data->price }}"
                                                                value="{{ $data->value }}">{{ $data->value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="shp_dt_art">
                            <p>
                                @if ($product->sizes->isNotEmpty())
                                    <span id="product_price_main">£{{ $product->sizes->first()->price + 10 }}</span>
                                    <strong id="product_price">£{{ $product->sizes->first()->price }}</strong>
                                    (Incl. VAT)
                                    <input type="hidden" id="product_price_input" name="product_price"
                                        value="{{ $product->sizes->first()->price }}">
                                @else
                                    <span id="product_price_main">£{{ $product->price + 10 }}</span>
                                    <strong id="product_price">£{{ $product->price }}</strong>
                                    (Incl. VAT)
                                    <input type="hidden" id="product_price_input" name="product_price"
                                        value="{{ $product->price }}">
                                @endif
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <strong>Upload Artwork</strong>
                                    <p>
                                        Upload your designs and get the design proofing done
                                    </p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong>Design Online</strong>
                                    <p>
                                        Use the Design Tool with Templates to create your design
                                    </p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    <strong>Hire a Designer @ £9.99</strong>
                                    <p>
                                        Let a professional Designer create your design @ £9.99
                                    </p>
                                </label>
                            </div>
                            <ul>
                                <li>
                                    <img src="{{ asset('front/img/icons_2.svg') }}"> FREE Designing for Basket Value above
                                    £500.00
                                </li>
                                <li>
                                    Upload Artwork & Checkout
                                </li>
                                <li>
                                    <img src="{{ asset('front/img/icons_1.png') }}"> Free Express shipping for orders over
                                    £99.00
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="template_wrapper p_100" style="background-color: #141414">
        <div class="container">
            <div class="view_hd text-center">
                <h2>Templates of Custom Vinyl Banners</h2>
                <p>
                    Just like these, you can make your own personalized banners. Go on, it’s an empty canvas!
                </p>
            </div>
            <div class="template_slider busines_slider m-0 d-flex">
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_1.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_2.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_3.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_4.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_5.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_1.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="descript_wrapper p_100 pb-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Product
                        Specifications</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Size</button>
                    <button class="nav-link" id="nav-FAQ-tab" data-bs-toggle="tab" data-bs-target="#nav-FAQ"
                        type="button" role="tab" aria-controls="nav-FAQ" aria-selected="false">FAQ</button>
                    <button class="nav-link" id="nav-Customer-tab" data-bs-toggle="tab" data-bs-target="#nav-Customer"
                        type="button" role="tab" aria-controls="nav-Customer" aria-selected="false">Customer
                        Reviews</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <?php echo $product->description; ?>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="descript_wreap">
                        <h5>Lorem Ipsum 1</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="descript_wreap">
                        <h5>Lorem Ipsum 2</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-FAQ" role="tabpanel" aria-labelledby="nav-FAQ-tab">
                    <div class="descript_wreap">
                        <h5>Lorem Ipsum 3</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Customer" role="tabpanel" aria-labelledby="nav-Customer-tab">
                    <div class="descript_wreap">
                        <h5>Lorem Ipsum 4</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="related_wrapper p_100">
        <div class="container">
            @if ($related_product->isNotEmpty())
                <div class="related_content">
                    <div class="related_hd text-center">
                        <h4>Related Products</h4>
                        <p>
                            We curated a few products we think might interest you based on your shopping history.
                        </p>
                    </div>
                    <div class="related_slider busines_slider d-flex">
                        @foreach ($related_product as $product)
                            <div class="card col-lg-3">
                                <div class="busines_img">
                                    @foreach (json_decode($product->images) as $key => $image)
                                        @if ($key == 0)
                                            <img src="{{ asset('product_Images') }}/{{ $image }}" />
                                        @endif
                                    @endforeach
                                    <div class="cust_btn_wreap">
                                        <a href="{{ url('details') }}/{{ $product->slug }}" class="btn cust_btn"
                                            tabindex="0">Customize </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5>{{ $product->name }}</h5>
                                    <div class="star_wreap">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <span>9’321</span>
                                    </div>
                                    <p>Starts at: <span>${{ $product->price }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <script>
        $(document).ready(function() {
            var size_prices = [];
            size_prices.push({
                value: {{ $product->sizes->first()->id }},
                price: {{ $product->sizes->first()->price }}
            });
            console.log(size_prices);
            $('#select_size').on('change', function() {

                var totalPrice = parseFloat($('#product_price_input').val());
                var size_value = $(this).val();

                var selectedOption = this.options[this.selectedIndex];
                var selectedprice = parseFloat(selectedOption.getAttribute('data-price'));
                var selectedid = parseFloat(selectedOption.getAttribute('data-id'));

                var previousPrice = size_prices.reduce(function(total, item) {
                    return total + item.price;
                }, 0);
                size_prices = [];
                totalPrice -= previousPrice;
                size_prices.push({
                    value: selectedid,
                    price: selectedprice
                });

                totalPrice += selectedprice;

                $('#product_price_main').text('$' + (parseFloat(totalPrice) + 5));
                $('#product_price').text('$' + totalPrice);
                $('#product_price_input').val(totalPrice);
            });

            $('#product_quantity').on('change', function() {
                var value = $(this).val();
                if (value < 1 || value > 999) {
                    value = 1;
                    $('#product_quantity').val(1);
                }
                var price = $('#product_price_input').val();
                $('#product_price_main').text('$' + (parseFloat(price) + 5) * value);
                $('#product_price').text('$' + value * price);
            });

            // converting size units
            $('#size_unit').on('change', function() {
                var unit_value = $(this).val();
                var productID = "{{ $product->id }}";
                var selectedSize = $('#select_size').val();
                updateSize(productID, unit_value, selectedSize);
            });

            function updateSize(id, value, selectedSize) {
                $.ajax({
                    url: '/product/' + id + '/sizes',
                    type: 'GET',
                    success: function(data) {
                        var sizeSelect = $('#select_size');
                        if (data.length > 0) {
                            sizeSelect.show();
                            sizeSelect.empty();
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

            // adding and removing variation data 
            var selectedOptions = [];
            $('.product_variation').on('change', function() {
                var totalPrice = parseFloat($('#product_price_input').val());
                var selectElement = $(this);

                // adding price
                selectElement.find('option:selected').each(function() {
                    var option = $(this).get(0);
                    var price = parseFloat(option.dataset.price);
                    selectedOptions.push({
                        value: option.dataset.id,
                        price: price
                    });
                    totalPrice += price;
                });

                // removing or changing price
                selectElement.find('option').each(function() {
                    var option = $(this).get(0);
                    if (!$(option).is(':selected')) {
                        var valueToRemove = option.dataset.id;
                        var index = selectedOptions.findIndex(item => item.value === valueToRemove);
                        while (index !== -1) {
                            totalPrice -= selectedOptions[index].price;
                            selectedOptions.splice(index, 1);
                            index = selectedOptions.findIndex(item => item.value === valueToRemove);
                        }
                    }
                });
                $('#product_price_input').val(totalPrice.toFixed(2));
                var value = $('#product_quantity').val();
                $('#product_price_main').text('$' + (totalPrice + 5) * value);
                $('#product_price').text('$' + value * totalPrice);
            });
        });
    </script>
@endsection
