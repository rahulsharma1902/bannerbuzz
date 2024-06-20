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
    <div style="display: none;" id="overlay">
		<div class="loader">
			<div class="spinner"></div>
        </div>
    </div>
    @if (isset($product))
        <section class="shop_dt_wrapper p_100 pt-0 custom_buy_wrapper">
            <div class="container">
                <div class="row custom_buy_row">
                    <div class="col-lg-4 custom_buy_image_col">
                        <div class="shop_dt_img">
                            <div class="shop_dt_img_inner">
                                @if($template->design_method == 'Artwork')
                                    <?php $count = 0; ?>
                                    @if(!empty(json_decode($template->image,true)))
                                        @foreach(json_decode($template->image,true) as $index => $value)
                                            @if($count == 0)
                                                <img src="{{ asset('designImage/'.$value) }}">
                                            @endif
                                            <?php $count++; ?>
                                        @endforeach
                                    @else
                                        <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                    @endif
                                @elseif($template->design_method == 'ArtworkLater')
                                    <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                @elseif($template->design_method == 'hireDesigner')
                                    @foreach (json_decode($template->product->images) as $index => $image)
                                        @if ($index == 0)
                                            <img src="{{ asset('product_Images') }}/{{ $image }}">
                                        @endif
                                    @endforeach
                                @else
                                    <img src="{{ asset('designImage/'.$template->image) }}">
                                @endif
                            </div>
                        </div>
                        <div class="EditDT">
                            @if($template->design_method == 'template')
                                <a href="{{url('designtool/template')}}/{{ $template->id ?? '' }}" class="btn light_dark">Edit Design</a>
                            @elseif($template->design_method == 'ArtworkLater' || $template->design_method == 'Artwork')
                                <a class="btn light_dark" type="button" data-type="" id="proceedButton" data-bs-toggle="modal" data-bs-target="#UploadArtworkModel" >Upload Artwork</a> 
                            @endif
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
                            }
                             ?>
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
                                            <div class="number"><input type="number" class="number" id="product_quantity" name="quantity"  min="1" maxlength="999" value="{{ $template->qty ?? '1' }}"></div>
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
                                        <button type="button" id="add-to-basket" data-design-id ="{{ $template->id }}" class="btn light_dark">Add To Basket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif
    <!-- Upload ArtWork model -->
    <div class="modal fade" id="UploadArtworkModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Upload ArtWork
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body template-modal">
                    <div class="tab-teaser p-2">
                        <!-- <div class="tab-menu">
                            <ul>
                                <li>
                                     <a href="" id="upload_art" class="btn " data-rel="tab-2">
                                        <div class="triangle-down"></div>
                                        <div class="design-box">
                                            <div class="design-img">
                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/Frame.png" />
                                            </div>
                                            <div class="design-txt">
                                                <h6>Upload Artwork</h6>
                                                <p>Upload your designs and get the design proofing</p>
                                            </div>
                                        </div>
                                    </a> 
                                </li>
                            </ul>
                        </div> -->
                        <div class="tab-main-box mt-5">
                            <div class="tab-box" id="tab-2" style="display: block;" >
                                <div id="upload-image-div" class="custom_radio product_select @if($template->design_method == 'Artwork') d-none @endif">
                                    <input type="radio" value="Artwork" id="featured-1" name="featured" @if($template->design_method == 'Artwork') checked @endif >
                                    <label for="featured-1">
                                        <div class="Upload_wrapper uploadArtworkMainWrap">
                                            <div class="vector_img">
                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/vector.png">
                                            </div>
                                            <div class="Upload_wrapper-txt">
                                                <h6>Upload Artwork Now</h6>
                                            <input type="file" data-design-id="{{ $template->id ?? '' }}" class="file" name="imageInput" id="file"  />
                                            <label for="file" class="btn-1">Browse File</label>
                                                <div class="upload_img">
                                                    <img data-design-id="{{ $template->id ?? '' }}" id="dropboxChooserButton" src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/file.png">
                                                    <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/round-img.png">
                                                </div>
                                                <p>For file(s) bigger than 400MB <br> upload them right here</p>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="leter_or">
                                        <p>or</p>
                                    </div>
                                    <!-- <br> -->
                                    <input type="radio" value="ArtworkLater" id="featured-2" name="featured" @if($template->design_method == 'ArtworkLater') checked @endif>
                                    <label for="featured-2">
                                
                                        <div class="Upload_wrapper art_box">
                                            <div class="Upload_wrapper-txt">
                                                <h6>Upload Artwork Later</h6>
                                                <p>You can continue by placing the order, we will send you an e-mail with link to upload your artwork file(s)</p>
                                            </div>
                                            
                                        </div>
                                    </label>
                                </div>
                                <div id="response-result" class="@if($template->design_method != 'Artwork') d-none @endif responseResultWrap" >
                                    <div class="custom_radio product_select ">
                                        @if($template->design_method == 'Artwork')
                                            @foreach(json_decode($template->image,true) as $index => $value)
                                                <div class="Upload_wrapper image-div d-flex">
                                                    <div class="img">
                                                        <img data-design-id="{{ $template->id  }}" src="{{ asset('designImage') }}/{{ $value }}">
                                                    </div>
                                                    <span data-design-id="{{ $template->id  }}"  data-img-index="{{$index}}" onclick="removeImage(this)" class="remove-image">X</span>
                                                </div>
                                            @endforeach
                                        @endif
                                        <label class="label-wrap" for="featured-1">
                                            <div class="Upload_wrapper uploadIconWrap">
                                                <div class="Upload_wrapper-txt add-icon-div">
                                                    <input  data-design-id="{{ $template->id ?? '' }}" type="file" class="file" name="imageInput" id="file2"  />
                                                    <label for="file2" class="btn-1"><i class="fa-solid fa-plus"></i></label>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <button id="uploadButton" type="hidden" data-product-id="{{ $product->id ?? '' }}" ></button>
                                <div class="note-wrapper">
                                    <div class="note_data">
                                        <h6>*Note:-</h6>
                                        <p>- Our designers may connect with you for any clarification <br>  
                                        - Product will be printed after your approval (if opted on cart)</p>
                                    </div>
                                </div>
                                <div class="price_box">
                                    <div class="design_tool">
                                        <div class="design_tool_data">
                                            <h6 class="ModelPrice" >£{{ $total }}</h6>
                                            <span>(Incl.VAT)</span>
                                        </div>
                                        <div class="save_data">
                                            <del>£11.75</del>
                                            <a href="">Save 40% </a>
                                        </div>
                                        <div class="quantity-field">
                                            <button class="value-button decrease-button" onclick="decreaseValue(this)" title="Azalt">-</button>
                                            <input class="number model-qty" type="number" min="1" value="{{ $template->qty ?? '1' }}">
                                            <button class="value-button increase-button" onclick="increaseValue(this, 50)" title="Arrtır">+</button>
                                        </div>
                                    </div>
                                    <div class="design_tool">
                                        <button id="SaveDesign" class="btn light_dark" data-design-id="{{ $template->id ?? '' }}" type="button" >Add to basket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Model -->
    <script>
        $(document).ready(function(){
            $('input[name="featured"]').on('change',function(){
                $value = $('input[name="featured"]:checked').val();
                const images = $('#response-result img');
                if($value == 'Artwork' && images.length < 1){
                    $('#add-to-basket,#SaveDesign').prop('disabled', true);
                } else {
                    $('#add-to-basket,#SaveDesign').prop('disabled', false);
                }
            });

            $('#file, #file2').on('change',async function() {         // Browse Files from system  
                $('#overlay').show();
                try {
                    var formData = new FormData();
                    design_id = "{{ $template->id }}";
                    var fileInput = $(this)[0];
                    if (fileInput.files.length === 0) {
                        alert('Please select an image to upload.');
                        return;
                    }

                    formData.append('image', fileInput.files[0]);
                    formData.append('design_id',design_id );
                    $('#overlay').show();
                    saveData = await saveDesignAjax(formData);
                    if(saveData.imageName != null){
                        $('#overlay').hide();
                        $('#upload-image-div').addClass('d-none');
                        $('#response-result').removeClass('d-none');
                        var HTML_data = `<div class="Upload_wrapper image-div d-flex">
                                            <div class="img">
                                        <img data-design-id="${saveData.template.id}" src="{{ asset('designImage') }}/${saveData.imageName}">
                                    </div>
                                    <span data-design-id="${saveData.template.id}"  data-img-index="${saveData.imgIndex}" onclick="removeImage(this)" class="remove-image">X</span>
                                    </div>`;
                        // $('#Upload_wrapper').append(HTML_data);
                        $(HTML_data).insertBefore('.label-wrap');
                        $('input[name="featured"]').trigger('change');
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                } finally {
                    $('#overlay').hide();
                }
            });

            $('#dropboxChooserButton').on('click', async function() {           // Uploading files from dropbox 
                
                try {
                    var design_id =  "{{ $template->id }}";
                    var formData = new FormData();
                    formData.append('design_id',design_id );

                    Dropbox.choose({
                        success: async function(files) {
                            $('#overlay').show();
                            files.forEach(file => {
                                let link = file.link;
                                let directLink = link.replace("dl=0", "raw=1");
                                file.link=directLink;
                            });
                            
                            $.ajax({
                                url: '/upload-dropbox-file',
                                type: 'POST',
                                dataType: 'json',
                                contentType: 'application/json',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data: JSON.stringify({ files: files }), 
                                success: async function(data) {
                                    if (data.files != null) {

                                        formData.append('images', JSON.stringify(data.files) );
                                        saveData = await saveDesignAjax(formData);

                                        if (saveData.imageArray != null) {
                                            $('#upload-image-div').addClass('d-none');
                                            $('#response-result').removeClass('d-none');
                                            
                                            var HTML_data = '';
                                            Object.entries(JSON.parse(saveData.imageArray)).forEach(([key, image]) => {
                                            HTML_data += `<div class="Upload_wrapper image-div d-flex">
                                                            <div class="img">
                                                                <img data-design-id="${saveData.template.id}" src="{{ asset('designImage') }}/${image}">
                                                            </div>
                                                            <span data-design-id="${saveData.template.id}"  data-img-index="${key}" onclick="removeImage(this)" class="remove-image">X</span>
                                                        </div>`;
                                            });

                                            $(HTML_data).insertBefore('.label-wrap');
                                            $('#file2').attr('data-design-id', saveData.template.id);
                                            $('.add-to-basket').attr('data-design-id', saveData.template.id);
                                            $('input[name="featured"]').trigger('change');
                                            $('#overlay').hide();
                                        }
                                    } 
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
                                    $('#overlay').hide();
                                }
                            }); 
                        },
                        cancel: function() {
                            console.log('User canceled the chooser.');
                        },
                        linkType: 'preview',
                        multiselect: true, 
                        extensions: ['.jpg', '.jpeg', '.png'],
                    });
                } catch (error) {
                      console.log(error);
                } finally {
                    $('#overlay').hide();
                }
            });

            $('#add-to-basket,#SaveDesign').on('click',async function(){
                $('#overlay').show();
                try{
                    $designID = "{{ $template->id }}";
                    $qty = $('#product_quantity').val();

                    current_designMethod = "{{ $template->design_method  }}";
                    productID = "{{ $template->product_id  }}";

                    if(current_designMethod != 'template'){
                        design_method =$('input[name="featured"]:checked').val();
                        
                    } else {
                        design_method = current_designMethod;
                    }

                    var formData = new FormData();

                    var size_unit = $('#size_unit').val();
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

                        formData.append('width', width);
                        formData.append('height', height);

                    } else {
                        var width = null;
                        var height = null;
                        var selectedOption = $('#select_size option:selected');
                        var size_id = selectedOption.data('id');
                        formData.append('size_id', size_id);
                    }
                    var_data =  variations;
                    formData.append('product_id', productID);
                    formData.append('design_id', $designID);
                    formData.append('dimension', size_unit);
                    formData.append('qty',  $qty);
                    formData.append('variations', JSON.stringify(var_data)); 
                    formData.append('design_method', design_method);
                    formData.append('action', 'finalSave');

                
                    saveData = await saveDesignAjax(formData);

                    if(saveData) {
                        addTobasket = await addTObasket($designID,$qty);
                        if(addTobasket.id !== null && addTobasket.id !== 0){

                            console.log(addTobasket.id );
                            url = "{{ url('checkout/cart') }}";
                            window.location.href = url;
                        }
                    }
                } catch (error){

                } finally {
                    $('#overlay').hide();
                }
            });

            $('#custom_width, #custom_height').on('input', function() {
                ensurePositiveInteger($(this));
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

        async function addTObasket(designID,Qty) {            // Add to Basket Ajax request 
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url('add-to-basket') }}",
                    type: 'POST',
                    data: {
                        'design_id' :designID,
                        'qty' : Qty
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        resolve(data); 
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data', status, error);
                        reject(false); 
                    }
                });
            });
        }
        async function saveDesignAjax(formData) {            // save Template Ajax request 
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url('saveDesign') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        resolve(data); 
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data', status, error);
                        reject(false); 
                    }
                });
            });
        }
        function removeImage(button) {          // Removing uploaded images 
            designID = $(button).data('design-id');
            ImageIndex = $(button).data('img-index');
            console.log(designID,ImageIndex);
            if(designID != undefined && ImageIndex != undefined){
                var formData = new FormData();

                formData.append('ImageIndex',ImageIndex);
                formData.append('design_id',designID );
                formData.append('is_saved',true );

                var $parentDiv = $(button).closest('.Upload_wrapper');

                $.ajax({
                    url: "{{ url('updateDesign') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.arrayCount < 1){
                            $('#upload-image-div').removeClass('d-none');
                            $('#response-result').addClass('d-none');
                            $parentDiv.remove();
                            $('input[name="featured"]').trigger('change');
                        } else {
                            $parentDiv.remove();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data', status, error);
                    }
                });
            }
        }
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
                $('.model-qty').val(value);
                if (value < 1 || value > 999) {
                    value = 1;
                    $('#product_quantity').val(1);
                    $('.model-qty').val(1);
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
                    $('.ModelPrice').text('£' + (parseFloat(price) + totalPrice) * value);
                }
            });

            $('.model-qty').on('change', function() {
                var value = $(this).val();
                $('#product_quantity').val(value);
                $('.model-qty').val(value);
                if (value < 1 || value > 999) {
                    value = 1;
                    $('#product_quantity').val(1);
                    $('.model-qty').val(1);
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
                    $('.ModelPrice').text('£' + (parseFloat(price) + totalPrice) * value);
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
                var newprice = Math.round(pricePerUnit *( width + height)); 

                var Qty = parseFloat($('#product_quantity').val());
                var variation_total_price = 0;
                $('.product_variation').each(function() {
                    var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    variation_total_price += selectedPrice;
                });
                var totalPrice = (newprice + variation_total_price) * Qty;
                if(formatPrice(totalPrice) !== true){
                    var totalPrice = Math.round(totalPrice);
                }

                $('#product_price').text( totalPrice);
                $('#product_price_input').val(newprice);
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
                var unit_value = await getUnitValue(value);
              
                PriceperUnit = (main_price / parseFloat(unit_value)) / 2;
                return PriceperUnit;
            }

            // Update Custom size on size unit change
            async function UpdateCustomSize(value) {
                var last_unit = $('#custom_width').data('unit');
                var unit_value = await getUnitValue(last_unit);


                var width = parseFloat($('#custom_width').val());
                var height = parseFloat($('#custom_height').val());

                var width_in_inches = width / unit_value;
                var height_in_inches = height / unit_value;

                var new_unit_value = await getUnitValue(value);

                var new_width = Math.round(width_in_inches * new_unit_value);
                var new_height = Math.round(height_in_inches * new_unit_value);

                $('#custom_width').val(new_width);
                $('#custom_height').val(new_height);

                $('#custom_width').data('unit', value);
                $('#custom_height').data('unit', value);

                return true;
            }

            async function updateSize(id, value, selectedSize) {
                $.ajax({
                    url: "{{ url('/product/sizes/') }}" + "/" + id,
                    type: 'GET',
                    success: async function(data) {
                        var sizeSelect = $('#select_size');
                        if (data.length > 0) {
                            sizeSelect.show();
                            sizeSelect.empty();

                            unit_value = await getUnitValue(value);
                           
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
