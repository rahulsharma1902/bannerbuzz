@extends('front_layout.master')
@section('content')
    <section class="vinyl_wrapper">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('accessories.product', $product) !!}
                </nav>
            </div>
        </div>
    </section>
    @if (isset($product))
        <section class="shop_dt_wrapper p_100 pt-0 custom_buy_wrapper">
            <div class="container">
                <div class="row custom_buy_row">
                    <div class="col-lg-4 custom_buy_image_col">
                        <div class="shop_dt_img">
                            @foreach (json_decode($product->images) as $index => $image)
                                @if ($index == 0)
                                    <div class="shop_dt_img_inner" >
                                        <img id="main-image" src="{{ asset('accessories_Images') }}/{{ $image }}">
                                    </div>
                                    <ul>
                                @endif
                                    <li class="list-image-container @if($index == 0) active @endif" >
                                        <img class="list-image" width="130px" height="60px"
                                            src="{{ asset('accessories_Images') }}/{{ $image }}">
                                    </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 custom_buy_detail_col">
                        <div class="shop_dt_cst">
                            <div class="shop_dt_view">
                                <h3>{{ $product->name ?? '' }}</h3>
                                <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                                <p>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    9724 Reviews | Product Specifications | 1 Answered questions | SKU : BBVBCB00
                                </p>
                            </div>
                                @php
                                    $keys = $product->key_points ?? '';
                                    $productKeys = json_decode($keys);
                                @endphp
                            <div class="shop_dt_list">
                                <ul>
                                @foreach($productKeys as $keys)
                                    <li>
                                        {{ $keys }}
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="shop_dt_ship">
                                <p><strong>Want it by Friday, Jan. 26?</strong> Order Today and choose 'Urgent' shipping at
                                    checkout.</p>
                            </div>
                            <form>
                                <div class="shop_dt_fm">
                                    <div class="shop_dt_size">
                                        @if ($product->sizes->isNotEmpty())
                                            <select id="select_size" name="product_size" class="form-select">
                                                @foreach ($product->sizes as $size)
                                                    <option @if ($selected_size != null && $selected_size == $size->size_value) selected @endif
                                                        data-id="{{ $size->id }}" data-price="{{ $size->price }}"
                                                        value="{{ $size->size_value }}">{{ $size->size_value }}</option>
                                                @endforeach
                                            </select>
                                            @if ($product->sizes->first()->size_type != 'Custom')
                                                <select id="size_unit" name="size_unit" class="form-select">
                                                    <option @if ($selected_size_unit == 'Ft') selected @endif
                                                        value="Ft">Ft</option>
                                                    <option @if ($selected_size_unit == 'In') selected @endif
                                                        value="In">inch</option>
                                                    <option @if ($selected_size_unit == 'Cm') selected @endif
                                                        value="Cm">Cm</option>
                                                    <option @if ($selected_size_unit == 'Mm') selected @endif
                                                        value="Mm">Mm</option>
                                                </select>
                                            @endif
                                        @endif
                                        <!-- <label for="product_quantity">Qty:</label>
                                        @if ($selected_qty != null)
                                            <input type="number" value="{{ $selected_qty }}" id="product_quantity"
                                                name="quantity" placeholder="Qty" class="form-select">
                                        @else
                                            <input type="number" value="1" id="product_quantity" name="quantity"
                                                placeholder="Qty" class="form-select">
                                        @endif -->
                                    </div>
                                </div>
                                @if ($product->variations->isNotEmpty())
                                    @foreach ($product->variations as $variation)
                                        <div class="variation_div shop_dt_fm">
                                            <div class="shop_dt_group">
                                                <label class="form-label">{{ $variation->name }}:</label>
                                                @if ($variation->variationData->isNotEmpty())
                                                    <?php $variation_price[] = $variation->variationData->first()->price ?? '0'; ?>
                                                    <select name="{{ $variation->var_slug }}"
                                                        class="product_variation form-select">
                                                        @foreach ($variation->variationData as $data)
                                                            <option data-id="{{ $data->id }}"
                                                                data-price="{{ $data->price }}"
                                                                value="{{ $data->value }}">{{ $data->value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <?php $variation_price = []; ?>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <?php $variation_price = []; ?>
                                @endif
                            </form>
                        </div>
                        @if ($product->sizes->isNotEmpty())
                            <?php
                            foreach ($product->sizes as $size) {
                                if ($selected_size  === $size->size_value) {
                                    $size_price = $size->price;
                                }
                            }
                            if (!$selected_size) {
                                $size_price = $product->sizes->first()->price;
                            }
                            if ($selected_qty != null) {
                                $total = ($size_price + array_sum($variation_price)) * $selected_qty;
                            } else {
                                $total = $size_price + array_sum($variation_price);
                            } ?>
                            <input type="hidden" id="product_price_input" name="product_price"
                                    value="{{ $size_price }}">
                        @else
                            <?php
                            if ($selected_qty != null) {
                                $total = ($product->price + array_sum($variation_price)) * $selected_qty;
                            } else {
                                $total = $product->price + array_sum($variation_price);
                            } ?>
                            <input type="hidden" id="product_price_input" name="product_price"
                                value="{{ $product->price }}">
                        @endif
                        <input type="hidden" name="product_default_price" id="product_default_price" value="{{ $product->price ?? '' }}">
                        <div class="sc-ee3dbf1f-0 IeOYH productPriceMainBox sticky-box is-bottom is-sticky mt-5">
                            <div class=" proPriceBox newProductPriceBox PopupDesignBox  " id="proPriceBox">
                                <div class="productPriceBox hadPrice">
                                    <div class="newPrice">
                                        <div class="NewPriceBox  ">
                                            <p><span itemprop="priceCurrency" content="GBP"></span><span id="product_price" itemprop="price" content="1.90">£{{ $total }}</span></p>
                                            <div class="newExcl"><span>(Incl. VAT)</span></div>
                                        </div><span id="product_price_main" class="oldPrice">£{{ $total + 3 }}</span><span class="discountBox"> Save 40%</span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="newQuantityBox quantityBox">
                                    <div class="formGroup">
                                        <div class="quantity-field" >
                                          <button id="decrease-button"
                                            class="value-button decrease-button" 
                                            onclick="decreaseQtyValue(this)"
                                            title="Azalt">-</button>
                                            <div class="number"><input type="number" class="number" id="product_quantity" name="quantity"  min="1" maxlength="999" value="{{ $selected_qty ?? '1' }}"></div>
                                          <button id="increase-button"
                                            class="value-button increase-button" 
                                            onclick="increaseQtyValue(this)"
                                            title="Arrtır"
                                          >+
                                          </button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="buttonSet">
                                    <div class="formGroup">
                                        <button type="button" id="add-to-basket" data-design-id ="{{ $product->id }}" class="btn light_dark">Add To Basket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- <section class="template_wrapper p_100" style="background-color: #141414">
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
    </section> -->

    <section class="descript_wrapper p_100 pb-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Product
                        Specifications</button>
                    <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Size</button>
                    <button class="nav-link" id="nav-FAQ-tab" data-bs-toggle="tab" data-bs-target="#nav-FAQ"
                        type="button" role="tab" aria-controls="nav-FAQ" aria-selected="false">FAQ</button>
                    <button class="nav-link" id="nav-Customer-tab" data-bs-toggle="tab" data-bs-target="#nav-Customer"
                        type="button" role="tab" aria-controls="nav-Customer" aria-selected="false">Customer
                        Reviews</button> -->
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <?php echo $product->description; ?>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="descript_wreap">
                    <?php echo $product->additional_info; ?>
                    </div>
                </div>
                <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                </div> -->
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
                        @foreach ($related_product as $r_product)
                            <div class="card col-lg-3">
                                <div class="busines_img">
                                    @foreach (json_decode($r_product->images) as $key => $image)
                                        @if ($key == 0)
                                            <img src="{{ asset('accessories_Images') }}/{{ $image }}" />
                                        @endif
                                    @endforeach
                                    <div class="cust_btn_wreap">
                                        <a href="{{ url('accessories') }}/{{ $r_product->slug ?? '' }}"
                                            class="btn cust_btn" tabindex="0">Customize </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5>{{ $r_product->name }}</h5>
                                    <div class="star_wreap">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <span>9’321</span>
                                    </div>
                                    <p>Starts at: <span>${{ $r_product->price ?? '' }}</span></p>
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
            @if ($selected_size_unit != null && $selected_size_unit != 'Ft')
                var size_unit = "{{ $selected_size_unit }}";
                var selectedSize = "{{ $selected_size }}";
                var productID = "{{ $product->id }}";
                updateSize(productID, size_unit, selectedSize);
            @endif
            var size_prices = [];
            @if ($product->sizes->isNotEmpty())
                size_prices.push({
                    value: "{{ $product->sizes->first()->id }}",
                    price: "{{ $product->sizes->first()->price }}"
                });
            @endif

            // change product image on click
            $('.list-image').on('click',function() {  // change product image 

                var img_scr = $(this).attr('src');
                $('#main-image').attr('src',img_scr);
                $('.list-image-container').removeClass('active');
                $(this).parent().addClass('active');

            });

            // $('#custom_width, #custom_height').on('change', customSize);  // on chnage Custom height and width 

            // changing size 
            $('#select_size').on('change', async function() {

                var size_value = $(this).val();
                var size_unit = $('#size_unit').val();
                if(size_value == 'custom'){
                    // $('#select_size').hide();
                    var UpdateSize = await UpdateCustomSize(size_unit);
                    
                    if(UpdateSize == true){
                        customSize();
                    }
                   
                } else {
                    // $('#select_size').show();
                    // $('#custom_size_div').hide();
                    var Qty = parseFloat($('#product_quantity').val());

                    var selectedOption = this.options[this.selectedIndex];
                    var selectedprice = parseFloat(selectedOption.getAttribute('data-price'));
                    var selectedid = parseFloat(selectedOption.getAttribute('data-id'));
                    var totalPrice = 0;
                    $('.product_variation').each(function() {
                        var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                        totalPrice += selectedPrice;
                    });
                    $('#product_price_input').val(selectedprice);
                    $('#product_price_main').text('£' + (parseFloat(selectedprice) + 5 + totalPrice) * Qty);
                    $('#product_price').text('£' + (selectedprice + totalPrice )* Qty);
                    // $('.ModelPrice').text('£' + (selectedprice + totalPrice )* Qty);
                }
            });

            $('#product_quantity').on('change', function() {
                var value = $(this).val();
                // $('.model-qty').val(value);
                if (value < 1 || value > 999) {
                    value = 1;
                    $('#product_quantity').val(1);
                    // $('.model-qty').val(1);
                }
                var size_value = $('#select_size').val();
                if(size_value == 'custom'){
                   customSize();
                } else {
                    var totalPrice = 0;
                    $('.product_variation').each(function() {
                        var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                        totalPrice += selectedPrice;
                    });
                    var price = $('#product_price_input').val();
                    $('#product_price_main').text('£' + (parseFloat(price) +totalPrice + 5) * value);
                    $('#product_price').text('£' + (parseFloat(price) + totalPrice) * value);
                    // $('.ModelPrice').text('£' + (parseFloat(price) + totalPrice) * value);
                }
            });

            // $('.model-qty').on('change', function() {
            //     var value = $(this).val();
            //     $('#product_quantity').val(value);
            //     $('.model-qty').val(value);
            //     if (value < 1 || value > 999) {
            //         value = 1;
            //         $('#product_quantity').val(1);
            //         $('.model-qty').val(1);
            //     }
            //     var size_value = $('#select_size').val();
            //     if(size_value == 'custom'){
            //        customSize();
            //     } else {
            //         var totalPrice = 0;
            //         $('.product_variation').each(function() {
            //             var selectedPrice = parseInt($(this).find('option:selected').data('price'));
            //             totalPrice += selectedPrice;
            //         });
            //         var price = $('#product_price_input').val();
            //         $('#product_price_main').text('£' + (parseFloat(price) +totalPrice + 5) * value);
            //         $('#product_price').text('£' + (parseFloat(price) + totalPrice) * value);
            //         $('.ModelPrice').text('£' + (parseFloat(price) + totalPrice) * value);
            //     }
            // });

            // converting size units
            $('#size_unit').on('change',async function() {
                var size_value = $('#select_size').val();
                var unit_value = $(this).val();
                var productID = "{{ $product->id }}";
                if(size_value == 'custom'){
                    var UpdateSize = await  UpdateCustomSize(unit_value);
                } 
                updateSize(productID, unit_value, size_value);
            
            });

            // adding and removing variation data 
            var selectedOptions = [];
            $('.product_variation').on('change', function() {
                var totalPrice = parseFloat($('#product_price_input').val());
                var selectElement = $(this);

                $('.product_variation').each(function() {
                    var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    totalPrice += selectedPrice;
                });

                // $('#product_price_input').val(totalPrice.toFixed(2));
                
                var value = $('#product_quantity').val();
                $('#product_price_main').text('£' + (totalPrice + 5) * value);
                $('#product_price').text('£' + value * totalPrice);
                $('.ModelPrice').text('£' + value * totalPrice);
            });

            // //  Custom size function 
            // async function customSize(){
            //     $('#custom_size_div').show();
            //     var pricePerUnit = await priceratio();

            //     var width =parseFloat($('#custom_width').val());
            //     var height = parseFloat($('#custom_height').val());
            //     var newprice = Math.round(pricePerUnit *( width + height)); 

            //     var Qty = parseFloat($('#product_quantity').val());
            //     var variation_total_price = 0;
            //     $('.product_variation').each(function() {
            //         var selectedPrice = parseInt($(this).find('option:selected').data('price'));
            //         variation_total_price += selectedPrice;
            //     });
            //     var totalPrice = (newprice + variation_total_price) * Qty;
            //     if(formatPrice(totalPrice) !== true){
            //         var totalPrice = Math.round(totalPrice);
            //     }

            //     $('#product_price').text('£' + totalPrice);
            //     $('#product_price_input').val(newprice);
            //     $('#product_price_main').text('£' + (totalPrice + 5));
            //     $('.ModelPrice').text('£' + totalPrice);
            // }

            // function formatPrice(price) {
            //     if (Number.isInteger(price)) {
            //         return true; 
            //     } else {
            //         return false; 
            //     }
            // }

            // // Finding price ratio 
            // async function priceratio() {
            //     var main_price = parseFloat($('#product_default_price').val());
            //     var value =  $('#size_unit').val(); 
            //     var unit_value = await getUnitValue(value);

            //     PriceperUnit = (main_price / parseFloat(unit_value)) / 2;
            //     return PriceperUnit;
            // }

            // // Update Custom size on size unit change
            // async function UpdateCustomSize(value) {
            //     var last_unit = $('#custom_width').data('unit');
            //     var unit_value = await getUnitValue(last_unit);

            //     var width = parseFloat($('#custom_width').val());
            //     var height = parseFloat($('#custom_height').val());

            //     var width_in_inches = width / unit_value;
            //     var height_in_inches = height / unit_value;

            //     var new_unit_value = await getUnitValue(value);
                    

            //     var new_width = Math.round( width_in_inches * new_unit_value);
            //     var new_height = Math.round(height_in_inches * new_unit_value);

            //     $('#custom_width').val(new_width);
            //     $('#custom_height').val(new_height);

            //     $('#custom_width').data('unit', value);
            //     $('#custom_height').data('unit', value);

            //     return true;
            // }

            async function updateSize(id, value, selectedSize) {
                $.ajax({
                    url: "{{ url('/product/sizes/') }}" + "/" + id,
                    type: 'GET',
                    success: async function(data) {
                        var sizeSelect = $('#select_size');
                        if (data.length > 0) {
                            sizeSelect.show();
                            sizeSelect.empty();

                            var unit_value = await getUnitValue(value);

                            $.each(data, function(index, size) {
                                if (size.size_type == 'wh' || size.size_type == 'DH') {
                                    if (selectedSize == size.size_value) {
                                        size_values = size.size_value.split('X');
                                        sizeSelect.append('<option selected data-id="'+ size.id +'" data-sizeType="' +
                                            size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            +parseFloat(size_values[0]) * unit_value +
                                            ' X ' +
                                            parseFloat(size_values[1]) * unit_value +
                                            '</option>');
                                    } else {
                                        size_values = size.size_value.split('X');
                                        sizeSelect.append('<option data-id="'+ size.id +'" data-sizeType="' + size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            +parseFloat(size_values[0]) * unit_value +
                                            ' X ' +
                                            parseFloat(size_values[1]) * unit_value +
                                            '</option>');
                                    }

                                } else {
                                    if (selectedSize == size.size_value) {
                                        sizeSelect.append('<option selected data-id="'+ size.id +'" data-sizeType="' +
                                            size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            parseFloat(size.size_value) * unit_value +
                                            '</option>');
                                    } else {
                                        sizeSelect.append('<option data-id="'+ size.id +'" data-sizeType="' + size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            parseFloat(size.size_value) * unit_value +
                                            '</option>');
                                    }
                                }
                            });
                            // if(selectedSize == 'custom'){
                            //     sizeSelect.append('<option selected value="custom">Custom</option>');
                            // } else {
                            //     sizeSelect.append('<option value="custom">Custom</option>');
                            // }
                            // $('#custom_width').data('unit', value);
                        } else {
                            sizeSelect.hide();
                        }
                    },
                });
            }
        });
        async function getUnitValue(value){
            return new Promise((resolve, reject) => {
                var unit_value;
                if (value == 'In') {
                    unit_value = 12;
                } else if (value == 'Cm') {
                    unit_value = 30;
                } else if (value == 'Mm') {
                    unit_value = 304;
                } else if (value == 'Ft') {
                    unit_value = 1;
                }

                resolve(unit_value);
            });
        }
    </script>
    <script>
         function decreaseQtyValue(btn){
            var qty_value = parseInt($('#product_quantity').val());
            new_qty = qty_value -1;
            $('#product_quantity').val(new_qty);
            $('#product_quantity').trigger('change');
        }
        function increaseQtyValue(btn){
            var qty_value = parseInt($('#product_quantity').val());
            new_qty = qty_value +1;
            $('#product_quantity').val(new_qty);
            $('#product_quantity').trigger('change');
        }
    </script>
@endsection
