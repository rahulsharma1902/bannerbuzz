@extends('front_layout.master')
@section('content')
    <section class="vinyl_wrapper">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('product', $product) !!}
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
                            <div class="shop_dt_img_inner">
                                @if($template->design_method == 'Artwork')
                                    @foreach(json_decode($template->image,true) as $index => $value)
                                        @if($index == 0)
                                            <img src="{{ asset('designImage/'.$value) }}">
                                        @endif
                                    @endforeach
                                @else
                                    <img src="{{ asset('designImage/'.$template->image) }}">
                                @endif
                            </div>
                        </div>
                        <div class="EditDT">
                            <a href="{{url('designtool/template')}}/{{ $template->id ?? '' }}" class="btn light_dark">Edit Design</a>
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
                                    9724 Reviews 
                                    <!-- | Product Specifications | 1 Answered questions | SKU : BBVBCB00 -->
                                </p>
                            </div>
                            <div class="shop_dt_list">
                                <ul>
                                    @if($product->key_points != null)
                                        @foreach(json_decode($product->key_points) as $point)
                                            <li>
                                                {{ $point ?? ''}}
                                            </li>
                                        @endforeach
                                    @endif 
                                </ul>
                            </div>
                            <div class="shop_dt_ship">
                                <!-- <p><strong>Want it by Friday, Jan. 26?</strong> Order Today and choose 'Urgent' shipping at
                                    checkout.</p> -->
                            </div> 
                            <form>
                                <div class="shop_dt_fm">
                                    <div class="shop_dt_size">
                                        @if ($product->sizes->isNotEmpty())
                                            <select id="select_size" name="product_size" class="form-select">
                                                @foreach ($product->sizes as $size)
                                                    <option @if ($template->size_id != null && $template->size_id == $size->id) selected @endif
                                                        data-id="{{ $size->id }}" data-price="{{ $size->price }}"
                                                        value="{{ $size->size_value }}">{{ $size->size_value }}</option>
                                                @endforeach
                                                <option @if ($template->size_id == null ) selected @endif  value="custom">Custom</option>
                                            </select>
                                            @if ($product->sizes->first()->size_type != 'Custom')
                                                <select id="size_unit" name="size_unit" class="form-select">
                                                    <option value="Ft" @if(strtolower($template->dimension) == 'ft') selected @endif>Ft</option>
                                                    <option value="In" @if(strtolower($template->dimension) == 'in') selected @endif>Inch</option>
                                                    <option value="Cm" @if(strtolower($template->dimension) == 'cm') selected @endif>Cm</option>
                                                    <option value="Mm" @if(strtolower($template->dimension) == 'mm') selected @endif>Mm</option>
                                                </select>
                                            @endif
                                        @endif
                                        <!-- <label for="product_quantity">Qty:</label>
                                        @if ($template->qty != null)
                                            <input type="number" value="{{ $template->qty }}" id="product_quantity"
                                                name="quantity" placeholder="Qty" class="form-select">
                                        @else
                                            <input type="number" value="1" id="product_quantity" name="quantity"
                                                placeholder="Qty" class="form-select">
                                        @endif -->
                                    </div>
                                </div>

                                <div @if($template->size_id != null && $template->size_id != '') style="display: none;" @endif class="custom_size_div" id="custom_size_div">
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <div class="input-div" style="width:49%;">
                                            <label for="custom_width">Width</label>
                                          <input data-unit="Ft" min="1" class="form-select" type="number" name="custom_width" value="{{ $template->width ?? '1' }}" id="custom_width" placeholder="width">
                                        </div>
                                        <div class="input-div" style="width:49%;">
                                            <label for="custom_height">Height</label>
                                            <input data-unit="Ft" min="1" class="form-select" type="number" name="custom_height" value="{{ $template->height ?? '1' }}" id="custom_height" placeholder="height">
                                        </div>
                                    </div>
                                </div>
                                @if ($product->variations->isNotEmpty())
                                    @foreach ($product->variations as $variation)
                                        <div class="variation_div shop_dt_fm">
                                            <div class="shop_dt_group">
                                                @if ($variation->variationData->isNotEmpty())
                                                    @foreach(json_decode($template->variations) as $key => $value)
                                                        @if($key == $variation->var_slug)
                                                            <label class="form-label">{{ $variation->name }}:</label>
                                                            <select data-slug ="{{ $variation->var_slug }}" name="{{ $variation->var_slug }}"
                                                                class="product_variation form-select">
                                                                @foreach ($variation->variationData as $data)
                                                                    @if($value == $data->id)
                                                                        <?php $variation_price[] = $data->price ?? '0'; ?>
                                                                        <option  selected  data-id="{{ $data->id }}"
                                                                            data-price="{{ $data->price }}"
                                                                            value="{{ $data->value }}">{{ $data->value }}
                                                                        </option>
                                                                    @else
                                                                        <option  data-id="{{ $data->id }}"
                                                                            data-price="{{ $data->price }}"
                                                                            value="{{ $data->value }}">{{ $data->value }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    @endforeach
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
                        <!-- <div class="shp_dt_art">
                             <p>
                                <strong id="product_price">£20</strong>
                                (Incl. VAT)
                                <input type="hidden" id="product_price_input" name="product_price"
                                        value="20">
                                <input type="hidden" name="product_default_price" id="product_default_price" value="20">
                            </p> 
                        </div> -->
                        @if ($product->sizes->isNotEmpty())
                            <?php
                                foreach ($product->sizes as $size) {
                                    if ($template->size_id === $size->id) {
                                        $size_price = $size->price;
                                    }
                                }
                                if (!$template->size_id) {
                                    $size_price = $product->sizes->first()->price;
                                }
                                if ( $template->qty != null) {
                                    $total = ($size_price + array_sum($variation_price)) *  $template->qty;
                                } else {
                                    $total = $size_price + array_sum($variation_price);
                                } 
                            ?>
                            <input type="hidden" id="product_price_input" name="product_price"
                                    value="{{ $size_price }}">
                        @else
                            <?php
                            if ($template->qty != null) {
                                $total = ($product->price + array_sum($variation_price)) * $template->qty;
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
                                            <p><span itemprop="priceCurrency" content="GBP">£</span><span id="product_price" itemprop="price" content="1.90">{{ $total }}</span></p>
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
                                            onclick="decreaseValue(this)" 
                                            title="Azalt">-</button>
                                            <div class="number"><input type="number" class="number" id="product_quantity" name="quantity"  min="1" maxlength="999" value="{{ $template->qty ?? '1' }}"></div>
                                          <button id="increase-button"
                                            class="value-button increase-button" 
                                            onclick="increaseValue(this)"
                                            title="Arrtır"
                                          >+
                                          </button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="buttonSet">
                                    <div class="formGroup">
                                        <button type="button" class="btn light_dark">Add To Basket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif
    
    <script>
        $(document).ready(function(){
            $('.customize-btn').on('click',function(){
                var ProductID = $(this).data('product-id');
                var templateID = $(this).data('template-id');
                var size_unit = $('#size_unit').val();
                var qty = $('#product_quantity').val();
                var variations = {};
                $('.product_variation').each(function() {
                    var var_slug = $(this).data('slug');
                    var selectedoption = parseInt($(this).find('option:selected').data('id'));
                    variations[var_slug]= selectedoption;
                });
                var size = $('#select_size').val();

                if(size == 'custom') {
                    var width = $('#custom_width').val();
                    var height = $('#custom_height').val();
                    var size_id = null;
                } else {
                    var width = null;
                    var height = null;
                    var selectedOption = $('#select_size option:selected');
                    var size_id = selectedOption.data('id');
                }

                console.log(ProductID,size_unit,qty,variations,size_id,width,height);
                var_data =  JSON.stringify(variations);
                $.ajax({
                    url: "{{ url('saveDesign') }}",
                    type: 'POST',
                    data: {
                        product_id: ProductID,
                        template_data : null,
                        template_id: templateID,
                        dimension: size_unit,
                        qty: qty,
                        variations: var_data,
                        size_id: size_id,
                        width: width,
                        height: height,
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function(data) {
                        // console.log('Data saved successfully', data);
                        window.location.href = `{{ url('designtool/template') }}/${data.template.id}`;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data', status, error);
                    }
                });
            });

            function ensurePositiveInteger(input) {
                var value = input.val();

                value = value.replace(/[^0-9]/g, '');

                var numericValue = parseInt(value, 10);
                if (isNaN(numericValue) || numericValue < 1) {
                    numericValue = 1;
                }

                input.val(numericValue);
            }

            $('#custom_width, #custom_height').on('input', function() {
                ensurePositiveInteger($(this));
            });
        });
    </script>
     <!-- @if ($template->dimension != null && strtolower($template->dimension) != 'ft')
                var size_unit = $('#size_unit').val();
                var selectedSize = $('#select_size').val();
                var productID = "{{ $product->id }}";
                updateSize(productID, size_unit, selectedSize);
            @endif -->
    <script>
        $(document).ready(function() {
            var size_unit = $('#size_unit').val();
            var selectedSize = $('#select_size').val();
            var productID = "{{ $product->id }}";
            if(selectedSize == 'custom'){
                customSize();
            } else {
                updateSize(productID, size_unit, selectedSize);
            }
            
            var size_prices = [];
            @if ($product->sizes->isNotEmpty())
                size_prices.push({
                    value: "{{ $product->sizes->first()->id }}",
                    price: "{{ $product->sizes->first()->price }}"
                });
            @endif

            $('#custom_width, #custom_height').on('change', customSize);  // on chnage Custom height and width 
            // $('#increase-button, #decrease-button').on('click',function(){
            //     $('#product_quantity').trigger();
            // });

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
                    $('#select_size').show();
                    $('#custom_size_div').hide();
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
                    $('#product_price_main').text('£' + (parseFloat(selectedprice) + 3 + totalPrice) * Qty);
                    $('#product_price').text( (selectedprice + totalPrice )* Qty);
                }
            });

            $('#product_quantity').on('change', function() {
                var value = $(this).val();
                if (value < 1 || value > 999) {
                    value = 1;
                    $('#product_quantity').val(1);
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
                    $('#product_price_main').text('£' + (parseFloat(price) +totalPrice + 3) * value);
                    $('#product_price').text((parseFloat(price) + totalPrice) * value);
                }
            });

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
                // var totalPrice = parseFloat($('#select_size option:selected').data('price'));
                var selectElement = $(this);


                $('.product_variation').each(function() {
                    var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    totalPrice += selectedPrice;
                });

                // console.log(totalPrice);
                // adding price
                // selectElement.find('option:selected').each(function() {
                //     var option = $(this).get(0);
                //     var price = parseFloat(option.dataset.price);
                //     selectedOptions.push({
                //         value: option.dataset.id,
                //         price: price
                //     });
                //     totalPrice += price;
                // });
                // removing or changing price
                // selectElement.find('option').each(function() {
                //     var option = $(this).get(0);
                //     if (!$(option).is(':selected')) {
                //         var valueToRemove = option.dataset.id;
                //         var index = selectedOptions.findIndex(item => item.value === valueToRemove);
                //         while (index !== -1) {
                //             totalPrice -= selectedOptions[index].price;
                //             selectedOptions.splice(index, 1);
                //             index = selectedOptions.findIndex(item => item.value === valueToRemove);
                //         }
                //     }
                // });

                // $('#product_price_input').val(totalPrice.toFixed(2));
                var value = $('#product_quantity').val();
                $('#product_price_main').text('£' + (totalPrice + 3) * value);
                $('#product_price').text( value * totalPrice);
            });

            //  Custom size function 
            async function customSize(){
                $('#custom_size_div').show();
                var pricePerUnit = await priceratio();

                var width =parseFloat($('#custom_width').val());
                var height = parseFloat($('#custom_height').val());
                var newprice = pricePerUnit *( width + height); 

                var Qty = parseFloat($('#product_quantity').val());
                var variation_total_price = 0;
                $('.product_variation').each(function() {
                    var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    variation_total_price += selectedPrice;
                });
                var totalPrice = (newprice + variation_total_price) * Qty;
                if(formatPrice(totalPrice) !== true){
                    var totalPrice = totalPrice.toFixed(1);
                }

                $('#product_price').text( totalPrice);
                $('#product_price_input').val(newprice.toFixed(1));
                $('#product_price_main').text('£' + (totalPrice + 3));
            }

            function formatPrice(price) {
                if (Number.isInteger(price)) {
                    return true; 
                } else {
                    return false; 
                }
            }

            // Finding price ratio 
            async function priceratio() {
                var main_price = parseFloat($('#product_default_price').val());
                var value =  $('#size_unit').val(); 
                var unit_value;

                if (value == 'In') {
                    unit_value = 12;
                } else if (value == 'Cm') {
                    unit_value = 30;
                } else if (value == 'Mm') {
                    unit_value = 300;
                } else if (value == 'Ft') {
                    unit_value = 1;
                }
                PriceperUnit = (main_price / parseFloat(unit_value)) / 2;
                return PriceperUnit;
            }

            // Update Custom size on size unit change
            async function UpdateCustomSize(value) {
                var last_unit = $('#custom_width').data('unit');
                var unit_value;

                if (last_unit == 'In') {
                    unit_value = 12; 
                } else if (last_unit == 'Cm') {
                    unit_value = 30; 
                } else if (last_unit == 'Mm') {
                    unit_value = 300; 
                } else if (last_unit == 'Ft') {
                    unit_value = 1; 
                }

                var width = parseFloat($('#custom_width').val());
                var height = parseFloat($('#custom_height').val());

                var width_in_inches = width / unit_value;
                var height_in_inches = height / unit_value;

                var new_unit_value;

                if (value == 'In') {
                    new_unit_value = 12; 
                } else if (value == 'Cm') {
                    new_unit_value = 30; 
                } else if (value == 'Mm') {
                    new_unit_value = 300; 
                } else if (value == 'Ft') {
                    new_unit_value = 1; 
                }

                var new_width = width_in_inches * new_unit_value;
                var new_height = height_in_inches * new_unit_value;

                $('#custom_width').val(new_width);
                $('#custom_height').val(new_height);

                $('#custom_width').data('unit', value);
                $('#custom_height').data('unit', value);

                return true;
            }

            function updateSize(id, value, selectedSize) {
                $.ajax({
                    url: "{{ url('/product/sizes/') }}" + "/" + id,
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
                            if(selectedSize == 'custom'){
                                sizeSelect.append('<option selected value="custom">Custom</option>');
                            } else {
                                sizeSelect.append('<option value="custom">Custom</option>');
                            }
                            // $('#custom_width').data('unit', value);
                        } else {
                            sizeSelect.hide();
                        }
                    },
                });
            }
        });

        function increaseValue(button, limit) {
            const numberInput = button.parentElement.querySelector("input.number");
            var value = parseInt(numberInput.value, 10);
            if (isNaN(value)) value = 0;
            if (limit && value >= limit) return;
            numberInput.value = value + 1;
            $(numberInput).trigger('change');
        }

        function decreaseValue(button) {
            const numberInput = button.parentElement.querySelector("input.number");
            var value = parseInt(numberInput.value, 10);
            if (isNaN(value)) value = 0;
            if (value > 1) {
                numberInput.value = value - 1;
                $(numberInput).trigger('change');
            }
        }
    </script>
@endsection
