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
                                            <select id="inputState" class="form-select">
                                                @foreach ($product->sizes as $size)
                                                    <option value="{{ $size->size_value }}">{{ $size->size_value }}</option>
                                                @endforeach
                                            </select>
                                            <select id="inputState" class="form-select">
                                                <option selected>Ft</option>
                                                <option>inch</option>
                                            </select>
                                            <input type="number" id="inputState" name="quantity" placeholder="Qty"
                                                class="form-select">
                                        </div>
                                    </div>
                                @endif
                                @if ($product->variations->isNotEmpty())
                                    @foreach ($product->variations as $variation)
                                        <div class="shop_dt_fm">
                                            <div class="shop_dt_group">
                                                <label class="form-label">{{ $variation->name }}:</label>
                                                @if ($variation->variationData->isNotEmpty())
                                                    <select class="form-select">
                                                        @foreach ($variation->variationData as $data)
                                                            <option value="{{ $data->value }}">{{ $data->value }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- <div class="shop_dt_fm">
                                    <div class="shop_dt_size">
                                        <select id="inputState" class="form-select">
                                            <option selected>Size (W X H)</option>
                                            <option>lorem</option>
                                        </select>
                                        <select id="inputState" class="form-select">
                                            <option selected>Ft</option>
                                            <option>lorem</option>
                                        </select>
                                        <select id="inputState" class="form-select">
                                            <option selected>Qty </option>
                                            <option>lorem</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shop_dt_note">
                                    <p><strong>Note:</strong> Discount not applicable on special size 3' X 2'</p>
                                </div>
                                <div class="shop_dt_fm">
                                    <div class="shop_dt_group">
                                        <label class="form-label">Two Sided:</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Upgrade to Premium:</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Hanging Options:</label>
                                        <select class="form-select">
                                            <option selected>No Grommets</option>
                                            <option>yes Grommets</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Lamination:</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Upgrade to Premium:</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Wind Flaps:</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Pantone + Color Bridge Coated (optional)</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Add Accessories (optional)</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                    <div class="shop_dt_group">
                                        <label class="form-label">Specific Instructions (optional)</label>
                                        <select class="form-select">
                                            <option selected>No</option>
                                            <option>yes</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="shp_dt_art">
                            <p>
                                <span>£{{ $product->price + 10 }}</span>
                                <strong>£{{ $product->price }}</strong>
                                (Incl. VAT)
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
@endsection
