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
        <section class="shop_dt_wrapper p_100 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shop_dt_img">
                            @foreach (json_decode($product->images) as $index => $image)
                                @if ($index == 0)
                                    <div class="shop_dt_img_inner" >
                                        <img id="main-image" src="{{ asset('product_Images') }}/{{ $image }}">
                                    </div>
                                    <ul>
                                @endif
                                    <li class="list-image-container @if($index == 0) active @endif" >
                                        <img class="list-image" width="130px" height="60px"
                                            src="{{ asset('product_Images') }}/{{ $image }}">
                                    </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5">
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
                                                <option value="custom">Custom</option>
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
                                        <label for="product_quantity">Qty:</label>
                                        @if ($selected_qty != null)
                                            <input type="number" value="{{ $selected_qty }}" id="product_quantity"
                                                name="quantity" placeholder="Qty" class="form-select number">
                                        @else
                                            <input type="number" value="1" id="product_quantity" name="quantity"
                                                placeholder="Qty" class="form-select number">
                                        @endif
                                    </div>
                                </div>

                                <div style="display: none;" class="custom_size_div" id="custom_size_div">
                                    <div class="container d-flex">
                                        <div class="input-div p-2">
                                            <label for="custom_width">Width</label>
                                          <input data-unit="Ft" min="1" class="form-select" type="number" name="custom_width" value="1" id="custom_width" placeholder="width">
                                        </div>
                                        <div class="input-div p-2">
                                            <label for="custom_height">Height</label>
                                            <input data-unit="Ft" min="1" class="form-select" type="number" name="custom_height" value="1" id="custom_height" placeholder="height">
                                        </div>
                                    </div>
                                </div>
                                @if ($product->variations->isNotEmpty())
                                    @foreach ($product->variations as $variation)
                                        <div class="variation_div shop_dt_fm">
                                            <div class="shop_dt_group">
                                                <label class="form-label">{{ $variation->name }}:</label>
                                                @if ($variation->variationData->isNotEmpty())
                                                    <?php $variation_price[] = $variation->variationData->first()->price ?? '0'; ?>
                                                    <select data-slug ="{{ $variation->var_slug }}" name="{{ $variation->var_slug }}"
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
                    </div>
                    <div class="col-lg-3">
                        <div class="shp_dt_art">
                            <p>
                                @if ($product->sizes->isNotEmpty())
                                    <?php
                                    foreach ($product->sizes as $size) {
                                        if ($selected_size === $size->size_value) {
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
                                    <span id="product_price_main">${{ $total + 10 }}</span>
                                    <strong id="product_price">£{{ $total }}</strong>
                                    (Incl. VAT)
                                    <input type="hidden" id="product_price_input" name="product_price"
                                        value="{{ $size_price }}">
                                @else
                                    <?php
                                    if ($selected_qty != null) {
                                        $total = ($product->price + array_sum($variation_price)) * $selected_qty;
                                    } else {
                                        $total = $product->price + array_sum($variation_price);
                                    } ?>
                                    <span id="product_price_main">£{{ $total + 10 }}</span>
                                    <strong id="product_price">£{{ $total }}</strong>
                                    (Incl. VAT)
                                    <input type="hidden" id="product_price_input" name="product_price"
                                        value="{{ $product->price }}">
                                @endif
                                <input type="hidden" name="product_default_price" id="product_default_price" value="{{ $product->price ?? '' }}">
                            </p>
                            <div class="form-check one-modal" >
                                <input class="form-check-input flexRadioDefault" type="radio" data-type="uploadArtwork" value="#UploadArtworkModel" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <strong>Upload Artwork</strong>
                                    <p>
                                        Upload your designs and get the design proofing done
                                    </p>
                                </label>
                            </div>
                            <div class="form-check two-modal">
                                <input class="form-check-input flexRadioDefault" data-type="DesignOnline" value="#UploadArtworkModel" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong>Design Online</strong>
                                    <p>
                                        Use the Design Tool with Templates to create your design
                                    </p>
                                </label>
                            </div>
                            <div class="form-check three-modal" >
                                <input class="form-check-input flexRadioDefault"  type="radio" value="#HireDesignerModel" name="flexRadioDefault"
                                    id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    <strong>Hire a Designer @ £9.99</strong>
                                    <p>
                                        Let a professional Designer create your design @ £9.99
                                    </p>
                                </label>
                            </div>
                            <!-- Button trigger modal -->
                            <!-- Modal 1 -->

                            <div class="modal fade" id="UploadArtworkModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Select Preferred Design Method
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body template-modal">
                                            <div class="tab-teaser">
                                                <div class="tab-menu">
                                                    <ul>
                                                        <li>
                                                            <a href="" id="onlineDesign" class="btn  " data-rel="tab-1">
                                                                <div class="triangle-down"></div>

                                                                <div class="design-box">
                                                                    <div class="design-img">
                                                                        <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/left-tab.png" />
                                                                    </div>
                                                                    <div class="design-txt">
                                                                        <h6>Design Online</h6>
                                                                        <p>Design Tool with Templates to create your design</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
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
                                                </div>

                                                <div class="tab-main-box">
                                                    <div class="tab-box" id="tab-1" >
                                                        <h2>Choose Design Template for Your Product</h2>
                                                        @if(isset($templatecategory))
                                                            <div class="multiple-items">
                                                                <div data-category-id="0" class="tab_slider_box template-category active">
                                                                    <p>All</p>
                                                                </div>
                                                                @foreach($templatecategory as $temCat)
                                                                    @if($temCat->template->isNotEmpty())
                                                                        <div data-category-id="{{ $temCat->id ?? ''  }}" class="tab_slider_box template-category">
                                                                            <p>{{ $temCat->name ?? '' }}</p>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        <div class="add_logo_wrapper">
                                                            @isset($templates)
                                                                @foreach ($templates as $index => $template)
                                                                    <div data-template-id="{{ $template->id ?? '' }}" data-category-id="{{ $template->category_id ?? '' }}" class="logos-imgs template-images @if($index == 0) selected @endif ">
                                                                        <img src="{{ asset('TemplateImage') }}/{{ $template->template_image ?? 'default.png' }}" />
                                                                    </div>
                                                                @endforeach
                                                            @endisset
                                                        </div>

                                                        <div class="value_wrapper">
                                                            <div class="value_img">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/pngeggbg.png" />
                                                            </div>
                                                            <div class="value-content">
                                                                <h6>Need help in Designing?</h6>
                                                                <p>Hire a Designer @ just £9.99</p>
                                                                <ul>
                                                                    <li>Call with Expert</li>
                                                                    <li>Print after approval</li>
                                                                    <li>Unlimited revisions</li>
                                                                    <li>Provision to buy asset</li>
                                                                </ul>
                                                            </div>

                                                            <div class="value_free">
                                                                <h6>
                                                                    <b>FREE</b> for Basket <br />
                                                                    Value
                                                                </h6>
                                                                <span><b>above £500.00</b></span>
                                                                <a href="">Click here to Hire</a>
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
                                                                    <input class="number model-qty" type="number" name="qtyqty" min="1" value="1">
                                                                    <button class="value-button increase-button" onclick="increaseValue(this, 50)" title="Arrtır">+</button>
                                                                </div>
                                                            </div>
                                                            <div class="design_tool">
                                                                <a id="design-online-btn" type="button" data-product-id="{{ $product->id ?? '' }}">Proceed to Design Tool</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-box" id="tab-2">
                                                        <div id="upload-image-div" class="custom_radio product_select ">
                                                            <input type="radio" value="Artwork" id="featured-1" name="featured"  checked>
                                                            <label for="featured-1">
                                                                <div class="Upload_wrapper uploadArtworkMainWrap">
                                                                    <div class="vector_img">
                                                                        <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/vector.png">
                                                                    </div>
                                                                    <div class="Upload_wrapper-txt">
                                                                        <h6>Upload Artwork Now</h6>
                                                                    <input type="file" class="file" name="imageInput" id="file"  />
                                                                    <label for="file" class="btn-1">Browse File</label>
                                                                        <div class="upload_img">
                                                                            <img id="dropboxChooserButton" src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/file.png">
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
                                                            <input type="radio" value="ArtworkLater" id="featured-2" name="featured">
                                                            <label for="featured-2">
                                                        
                                                                <div class="Upload_wrapper art_box">
                                                                    <div class="Upload_wrapper-txt">
                                                                        <h6>Upload Artwork Later</h6>
                                                                        <p>You can continue by placing the order, we will send you an e-mail with link to upload your artwork file(s)</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div id="response-result" class="d-none responseResultWrap" >
                                                            <div class="custom_radio product_select ">
                                                                <!-- <div id="Upload_wrapper" class="uploadWrap">
                                                                   
                                                                </div> -->
                                                                <!-- <br> -->
                                                                <label class="label-wrap" for="featured-1">
                                                                    <div class="Upload_wrapper uploadIconWrap">
                                                                        <!-- <div class="vector_img">
                                                                            <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/vector.png">
                                                                        </div> -->
                                                                        <div class="Upload_wrapper-txt add-icon-div">
                                                                        <input  type="file" class="file" name="imageInput" id="file2"  />
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
                                                                    <input class="number model-qty" type="number" min="1" value="1">
                                                                    <button class="value-button increase-button" onclick="increaseValue(this, 50)" title="Arrtır">+</button>
                                                                </div>
                                                            </div>
                                                            <div class="design_tool">
                                                                <a id="upload-artwork-btn" class="add-to-basket" data-design-id="" type="button" data-product-id="{{ $product->id ?? '' }}">Add To Basket</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="tab-box" id="tab-2">
                                                        <h2>Tab 2</h2>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal 2 -->
                            <div class="modal fade" id="HireDesignerModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog exampledesign">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-angle-left"></i> Back</button>
                                            <h5 class="modal-title" id="exampleModalLabel">Benefits you get with <b>Hire a Designer</b> service</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="print_box_wrapp">
                                                <ul>
                                                    <li> <span><img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/print.png"></span>
                                                    <span>Print after your approval</span></li>
                                                        <li> <span><img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/print.png"></span>
                                                    <span>Print after your approval</span></li>
                                                    <li> <span><img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/print.png"></span>
                                                    <span>Print after your approval</span></li>
                                                    <li> <span><img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/print.png"></span>
                                                    <span>Print after your approval</span></li>
                                                </ul>
                                            </div>

                                            <div class="our_data">
                                                <div class="lets-hed">
                                                    <h5>Lets Our Expert Assist You</h5>
                                                    <p>Getting Professional Design with Experts are ease of mind now.</p>
                                                </div>
                                                <div class="expert_wrapper">
                                                    <div class="shipping_data">
                                                        <div class="cart-box">
                                                            <div class="cart-img">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/order.png" />
                                                            </div>
                                                            <div class="cart_num">
                                                                <span>1</span>
                                                            </div>
                                                        </div>
                                                        <div class="cart_content">
                                                            <p>Place your order</p>
                                                        </div>
                                                    </div>
                                                    <div class="shipping_data">
                                                        <div class="cart-box">
                                                            <div class="cart-img">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/connet.png">
                                                            </div>
                                                            <div class="cart_num">
                                                                <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="cart_content">
                                                            <p>Expert will Connect</p>
                                                        </div>
                                                    </div>
                                                    <div class="shipping_data">
                                                        <div class="cart-box">
                                                            <div class="cart-img">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/design.png">
                                                            </div>
                                                            <div class="cart_num">
                                                                <span>3</span>
                                                            </div>
                                                        </div>
                                                        <div class="cart_content">
                                                            <p>You approved Design</p>
                                                        </div>
                                                    </div>
                                                    <div class="shipping_data">
                                                        <div class="cart-box">
                                                            <div class="cart-img">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/shipped.png">
                                                            </div>
                                                            <div class="cart_num">
                                                                <span>4</span>
                                                            </div>
                                                        </div>
                                                        <div class="cart_content">
                                                            <p>Printed & shipped</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="textarea_box">
                                                <div class="textarea_head">
                                                    <h5>Let us know how you want your design</h5>
                                                    <p>Describe the design*</p>
                                                    
                                                </div>
                                                <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                                                
                                            </div>
                                            <div class="note-wrapper">
                                                <div class="note_data">
                                                    <h6>*Note:-</h6>
                                                    <p>
                                                        - Our designers may connect with you for any clarification <br />
                                                        - Product will be printed after your approval (if opted on cart)
                                                    </p>
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
                                                        <input class="number model-qty" type="number" min="1" value="1">
                                                        <button class="value-button increase-button" onclick="increaseValue(this, 50)" title="Arrtır">+</button>
                                                    </div>
                                                </div>
                                                <div class="design_tool">
                                                    <a  href="">Proceed to Design Tool</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> 
                                    </div>
                                </div>
                            </div> -->

                            <div class="container">
                                <ul>
                                    <li>
                                        <img src="{{ asset('front/img/icons_2.svg') }}"> FREE Designing for Basket Value above
                                        £500.00
                                    </li>
                                    <li>
                                      <a  type="button" data-type="" id="proceedButton" data-bs-toggle="modal" data-bs-target="#UploadArtworkModel" >Proceed</a>  
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
                @isset($templates)
                    @foreach ($templates as $template)
                        <div class="card">
                            <div class="busines_img">
                                <img src="{{ asset('TemplateImage') }}/{{ $template->template_image ?? 'default.png' }}" />
                                <div class="cust_btn_wreap">
                                    {{-- <a href="{{ url('designtool') ?? '' }}/{{ $product->slug ?? '' }}/{{ $template->slug ?? '' }}" class="btn cust_btn" tabindex="0">Customize </a> --}}
                                    <a type="button" data-product-id="{{ $product->id ?? '' }}" data-template-id="{{ $template->id ?? '' }}" class="btn cust_btn customize-btn" tabindex="0">Customize </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                
                <!-- <div class="card">
                    <div class="busines_img">
                        <img src="{{ asset('front/img/template_2.png') }}" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                </div> -->
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
                        <?php echo $product->addtional_info; ?>
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
                                            <img src="{{ asset('product_Images') }}/{{ $image }}" />
                                        @endif
                                    @endforeach
                                    <div class="cust_btn_wreap">
                                        <a href="{{ url('details') }}/{{ $r_product->slug ?? '' }}" class="btn cust_btn"
                                            tabindex="0">Customize </a>
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
    <script type="text/javascript">
        $(document).ready(function(){

            $('.list-image').on('click',function() {  // change product image 

                var img_scr = $(this).attr('src');
                $('#main-image').attr('src',img_scr);
                $('.list-image-container').removeClass('active');
                $(this).parent().addClass('active');

            });

            $('.add-to-basket').on('click', async function() {      // add design to basket

                design_id = $(this).data('design-id');
                Qty = $('#product_quantity').val();
                design_method =$('input[name="featured"]:checked').val();

                $('#overlay').show();

                try {

                    if(design_method == 'ArtworkLater'){
                        const formData = new FormData();

                        getFormData(formData);
                    
                        formData.append('design_method', design_method);

                        saveData = await saveDesignAjax(formData);
                        if(saveData.template.id != null){
                            addTobasket = await addTObasket(saveData.template.id,Qty);
                            if(addTobasket.id !== null && addTobasket.id !== 0){

                                console.log(addTobasket.id );
                                url = "{{ url('checkout/cart') }}";
                                window.location.href = url;
                            }
                        }

                    } else {
                        if(design_id != null && design_id != undefined){
                            addTobasket = await addTObasket(design_id,Qty);
                            console.log(addTobasket);
                            if(addTobasket.id !== null && addTobasket.id !== 0){

                                console.log(addTobasket.id );
                                url = "{{ url('checkout/cart') }}";
                                window.location.href = url;
                            }
                        }
                    }
                } catch (error){
                    console.error('An error occurred:', error);
                    $('#overlay').hide();

                } finally {
                    $('#overlay').hide();
                }
                
            });
        
            $('input[name="flexRadioDefault"]').on('change',function() {

                var newTarget = $(this).val();
                var newType = $(this).data('type');

                if(newType == 'uploadArtwork' && newType != undefined) {

                    $('#upload_art').addClass('active');
                    $('#tab-2').css('display', 'block');
                    $('#tab-1').css('display', 'none');
                    $('#onlineDesign').removeClass('active');

                } else {

                    $('#onlineDesign').addClass('active');
                    $('#upload_art').removeClass('active');
                    $('#tab-1').css('display', 'block');
                    $('#tab-2').css('display', 'none');

                }

                $('#proceedButton').attr('data-bs-target', newTarget);
                $('#proceedButton').attr('data-type', newType);
            });

            $('.flexRadioDefault').trigger('change');

            $('.template-category').on('click',function() {

                $('.template-category').removeClass('active');
                $(this).addClass('active');
                var Cat_id = $(this).data('category-id');
                if(Cat_id != 0) {

                    $('.template-images').each(function() {
                        var id = $(this).data('category-id');
                        if(Cat_id != id){
                            $(this).addClass('d-none');
                        } else {
                            $(this).removeClass('d-none');
                        }
                    });

                } else {
                    $('.template-images').removeClass('d-none');
                }
            });
            $('.template-images').on('click',function(){
                $('.template-images').removeClass('selected');
                $(this).addClass('selected');
            });

            $('#dropboxChooserButton').on('click', async function() {           // Uploading files from dropbox 
                // var design_id = $(this).data('design-id');
            
                try{
                    var formData = new FormData();

                    getFormData(formData);
                    formData.append('design_method', 'Artwork');
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
                                    console.log(data);
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

                                            // $('#Upload_wrapper').append(HTML_data);
                                            $(HTML_data).insertBefore('.label-wrap');
                                            $('#file2').attr('data-design-id', saveData.template.id);
                                            $('.add-to-basket').attr('data-design-id', saveData.template.id);
                                            $('#overlay').hide();
                                        }
                                    } 
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error);
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
                    console.error('An error occurred:', error);
                    
                } finally {
                    $('#overlay').hide();
                }
            });

            $('#file, #file2').on('change',async function() {         // Browse Files from system  

                var design_id = $(this).data('design-id');

                $('#overlay').show();
                try {
                
                    if(design_id == undefined || design_id == null || design_id == '') {
                
                        const formData = new FormData();
                        design_method = "Artwork";

                        var fileInput = $(this)[0];
                        if (fileInput.files.length === 0) {
                            alert('Please select an image to upload.');
                            return;
                        }
                        getFormData(formData);
                        formData.append('image', fileInput.files[0]);
                        formData.append('design_method', design_method);

                        saveData = await saveDesignAjax(formData);
                        if(saveData.imageName != null){
                        
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
                            $('#file2').attr('data-design-id',saveData.template.id);
                            $('.add-to-basket').attr('data-design-id',saveData.template.id);
                        }

                    } else {
                        const formData = new FormData();

                        var fileInput = $(this)[0];
                        if (fileInput.files.length === 0) {
                            alert('Please select an image to upload.');
                            return;
                        }

                        formData.append('image', fileInput.files[0]);
                        formData.append('design_id',design_id );
                        saveData = await saveDesignAjax(formData);
                        if(saveData.imageName != null){
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
                        }
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                } finally {
                    $('#overlay').hide();
                }
            });

            $('#design-online-btn').on('click',async function(){        // Redirect to designer Tools 
                
                try{
                    $('#overlay').show();
                    const formData = new FormData();

                    var templateID = $('.template-images.selected').data('template-id');
                    console.log(templateID);
                    
                    design_method = "template";
                    getFormData(formData);
                    formData.append('template_id', templateID);
                    formData.append('design_method', design_method);

                    saveData = await saveDesignAjax(formData);
                    if(saveData != null){
                        window.location.href = `{{ url('designtool/template') }}/${saveData.template.id}`;
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                } finally {
                    $('#overlay').hide();
                } 
            });
            
            $('.customize-btn').on('click',async function() {            // Redirect to designer Tools 
                
                try{
                    $('#overlay').show();
                    const formData = new FormData();
                    var templateID = $(this).data('template-id');
                    design_method = "template";

                    getFormData(formData);

                    formData.append('template_id', templateID);
                    formData.append('design_method', design_method);

                    saveData = await saveDesignAjax(formData);          

                    if(saveData != null ){
                        window.location.href = `{{ url('designtool/template') }}/${saveData.template.id}`;
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                } finally {
                    $('#overlay').hide();
                } 
            });

            $('#custom_width, #custom_height').on('input', function() {
                ensurePositiveInteger($(this));
            });
        });
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
        
        function ensurePositiveInteger(input) {
            var value = input.val();

            value = value.replace(/[^0-9]/g, '');

            var numericValue = parseInt(value, 10);
            if (isNaN(numericValue) || numericValue < 1) {
                numericValue = 1;
            }

            input.val(numericValue);
        }

        function removeImage(button) {          // Removing uploaded images 
            designID = $(button).data('design-id');
            ImageIndex = $(button).data('img-index');
            console.log(designID,ImageIndex);
            if(designID != undefined && ImageIndex != undefined){
                var formData = new FormData();

                formData.append('ImageIndex',ImageIndex);
                formData.append('design_id',designID );
                formData.append('is_saved',false );

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
        async function getFormData(formData)    // getting form data
        {

            var ProductID = "{{ $product->id ?? '' }}";
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

                formData.append('width', width);
                formData.append('height', height);

            } else {
                var width = null;
                var height = null;
                var selectedOption = $('#select_size option:selected');
                var size_id = selectedOption.data('id');
                formData.append('size_id', size_id);
            }
            // var_data =  JSON.stringify(variations);
            var_data =  variations;

            formData.append('product_id', ProductID);
            formData.append('dimension', size_unit);
            formData.append('qty', qty);
            formData.append('variations', JSON.stringify(var_data)); 
        }
    </script>
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
                    $('#product_price_main').text('£' + (parseFloat(selectedprice) + 5 + totalPrice) * Qty);
                    $('#product_price').text('£' + (selectedprice + totalPrice )* Qty);
                    $('.ModelPrice').text('£' + (selectedprice + totalPrice )* Qty);
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

                $('#product_price').text('£' + totalPrice);
                $('#product_price_input').val(newprice);
                $('#product_price_main').text('£' + (totalPrice + 5));
                $('.ModelPrice').text('£' + totalPrice);
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
                    

                var new_width = Math.round( width_in_inches * new_unit_value);
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

        $(function() {
            $('.multiple-items').slick({
                infinite: false,
                variableWidth: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                swipe: true,
                prevArrow: '<span class="slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></span>',
                nextArrow: '<span class="slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></span>',
            });
        
        // $('.multiple-items').on('afterChange', function(event, slick, currentSlide, nextSlide){
        //   console.log(currentSlide);
        // });

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
@endsection
