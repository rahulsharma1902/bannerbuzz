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

<section class="shop_dt_wrapper p_100 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="shop_dt_img">
                    <div class="shop_dt_img_inner">
                        <img src="{{ asset('front/img/shop_dt_1.png') }}">
                    </div>
                    <ul>
                        <li>
                            <img src="{{ asset('front/img/shop_dt_2.png') }}">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop_dt_cst">
                    <div class="shop_dt_view">
                        <h3>Custom Vinyl Banners</h3>
                        <p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            9724 Reviews  |  Product Specifications  |  1 Answered questions  |   SKU : BBVBCB00
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
                        <p><strong>Want it by Friday, Jan. 26?</strong> Order Today and choose 'Urgent' shipping at checkout.</p>
                    </div>
                    <form>
                        <div class="shop_dt_fm">
                            <select id="inputState" class="form-select">
                                <option selected>Choose Material</option>
                                <option>lorem</option>
                            </select>
                        </div>
                        <div class="shop_dt_fm">
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
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="shp_dt_art">
                    <p>
                        <span>£11.75</span>
                        <strong>£8.39</strong>
                        (Incl. VAT)
                    </p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <strong>Upload Artwork</strong>
                            <p>
                                Upload your designs and get the design proofing done
                            </p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            <strong>Design Online</strong>
                            <p>
                                Use the Design Tool with Templates to create your design
                            </p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            <strong>Hire a Designer @ £9.99</strong>
                            <p>
                                Let a professional Designer create your design @ £9.99
                            </p>
                        </label>
                    </div>
                    <ul>
                        <li>
                            <img src="img/icons_2.svg"> FREE Designing for Basket Value above £500.00
                        </li>
                        <li>
                            Upload Artwork & Checkout
                        </li>
                        <li>
                            <img src="img/icons_1.png"> Free Express shipping for orders over £99.00
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="template_wrapper p_100" style="background-color: #141414">
    <div class="container">
        <div class="view_hd text-center">
            <h2>Templates of Custom Vinyl Banners</h2>
            <p>
                Just like these, you can make your own personalized banners. Go on, it’s an empty canvas!
            </p>
        </div>
        <div class="template_slider busines_slider m-0">
            <div class="card">
                <div class="busines_img">
                    <img src="img/template_1.png" />
                    <div class="cust_btn_wreap">
                        <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="img/template_2.png" />
                    <div class="cust_btn_wreap">
                        <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="img/template_3.png" />
                    <div class="cust_btn_wreap">
                        <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="img/template_4.png" />
                    <div class="cust_btn_wreap">
                        <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="img/template_5.png" />
                    <div class="cust_btn_wreap">
                        <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="busines_img">
                    <img src="img/template_1.png" />
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
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Product Specifications</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Size</button>
                <button class="nav-link" id="nav-FAQ-tab" data-bs-toggle="tab" data-bs-target="#nav-FAQ" type="button" role="tab" aria-controls="nav-FAQ" aria-selected="false">FAQ</button>
                <button class="nav-link" id="nav-Customer-tab" data-bs-toggle="tab" data-bs-target="#nav-Customer" type="button" role="tab" aria-controls="nav-Customer" aria-selected="false">Customer Reviews</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="descript_wreap">
                    <h5>Custom Vinyl Banners to Suit Your Advertising Needs</h5>
                    <p>
                        From grand openings to store sales, you can advertise your cause with our versatile vinyl banners. We offer a huge inventory of pre-designed vinyl banners to suit your advertising needs. You can get the most out of these banners through custom sizing and personalising. Get creative and create a persistent impression on your prospect customers now.
                    </p>
                    <p>
                        You can create your own banner design with our easy-to-use online design tool, upload an image or hire a professional designer at an additional fee of £9.99. We print your custom designs in full colour, 720 DPI using eco solvent printing technology to ensure impactful visibility. You can then choose between printing your custom design on one or two sides.
                    </p>
                    <p>
                        If you choose double sided printing, the custom graphics on either side can be identical and different. Our vinyl display also comes with finishing options, lamination, hanging options, wind flaps and many more accessories. You can get completely unique promotional banners to suit your needs.
                    </p>
                    <p>
                        We offer pre-defined sizes and custom sizes to choose from. Depending on your requirement, you can select your ideal banner size up to 10 ft width and height.
                    </p>
                </div>
                <div class="descript_wreap">
                    <h5>High-Quality Durable Business Banners to Display Anywhere</h5>
                    <p>
                        Our business banners can last for seven years, making them an excellent return on investment. They are durable enough to withstand outdoor elements over a period. We make them with high-quality PVC flex. Their graphic weight is 13 Oz and becomes 16 Oz after upgrading to a UV-resistant print.
                    </p>
                    <p>
                        You can easily clean them using a soft, damp cloth without a cleaning solution. We make them ideal for both indoor and outdoor use, so that you can display your business banner anywhere.
                    </p>
                </div>
                <div class="descript_wreap">
                    <h5>Bulk Quantity Discount on Custom Banners</h5>
                    <p>
                        We offer bulk discounts on purchase of custom banners in quantities ranging from 2 to 500. Check the eligibility and overview table to see the special discounts offered for your purchase. Place your order now!
                    </p>
                    <p>
                        Shop Custom Vinyl Banners online at Cre8ivePrinter
                    </p>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="descript_wreap">
                    <h5>Lorem Ipsum 1</h5>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="descript_wreap">
                    <h5>Lorem Ipsum 2</h5>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-FAQ" role="tabpanel" aria-labelledby="nav-FAQ-tab">
                <div class="descript_wreap">
                    <h5>Lorem Ipsum 3</h5>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-Customer" role="tabpanel" aria-labelledby="nav-Customer-tab">
                <div class="descript_wreap">
                    <h5>Lorem Ipsum 4</h5>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="related_wrapper p_100">
    <div class="container">
        <div class="related_content">
            <div class="related_hd text-center">
                <h4>Related Products</h4>
                <p>
                    We curated a few products we think might interest you based on your shopping history.
                </p>
            </div>
            <div class="related_slider busines_slider">
                <div class="card">
                    <div class="busines_img">
                        <img src="img/shop_list_5.png" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 01</h5>
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
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="img/busin_2.png" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 02</h5>
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
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="img/busin_3.png" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 03</h5>
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
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="img/busin_4.png" />
                        <div class="cust_btn_wreap">
                            <a href="#" class="btn cust_btn" tabindex="0">Customize </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Product Name 04</h5>
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
                </div>
                <div class="card">
                    <div class="busines_img">
                        <img src="img/shop_3.png" />
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
