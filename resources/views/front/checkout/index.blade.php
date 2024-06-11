@extends('front_layout.master')
@section('content')
<section class="checkout-sec p_100">
    <div class="container">
        <div class="wrapper">
            <h3>Shopping Basket</h3>
            <ul class="steps">
                <li class="is-active completed">
                    <div class="step">
                        <span class="circle">1</span>
                        <span class="text">Customize Product</span>
                    </div>
                </li>
                <li class="is-active">
                    <div class="step">
                        <span class="circle">2</span>
                        <span class="text">Shopping Basket</span>
                    </div>
                </li>
                <li>
                    <div class="step">
                        <span class="circle">3</span>
                        <span class="text">Shipping Address</span>
                    </div>
                </li>
                <li>
                    <div class="step">
                        <span class="circle">4</span>
                        <span class="text">Payment</span>
                    </div>
                </li>
                <li>
                    <div class="step">
                        <span class="circle">5</span>
                        <span class="text">Last step to success</span>
                    </div>
                </li>
            </ul>
            <div class="cart-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-form">
                            <form>
                                <div class="tab">
                                    <div class="ship-wrap">
                                        <div class="check-ship">
                                            <h5>Account Details</h5>
                                            <div class="checkout-block">
                                                @if (!Auth::check())
                                                    <div class="guest">
                                                        <!-- <a href="javascript:void" style="color:#DC288A">Guest Checkout</a> -->
                                                        <p style="color:#DC288A">You need to login for checkout</p>
                                                        <!-- <a href="javascript:void" style="color:#7C7C7C"> -->
                                                        <p style="color:#7C7C7C">
                                                             <a href="{{ url('login') ?? ''}}" style="color:#7C7C7C">Login</a> 
                                                             /
                                                             <a href="{{ url('register') ?? ''}}" style="color:#7C7C7C">Sign Up</a>
                                                        <!-- </a> -->
                                                        </p>
                                                    </div>  
                                                @endif
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="rem">
                                                            <a href="javascript:void(0)"
                                                                class="btn light_dark">Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>We'll send the order confirmation here</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="check-ship shippingAddresWrap">
                                            <h5>Shipping Address</h5>
                                            <div class="checkout-block">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="First Name" name="first_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="first_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control phnNumberCng"
                                                            placeholder="Phone Number" data-to="phnNumberData"  name="phone" id="phone">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control"
                                                            placeholder="Email Address emailDataCng" data-to="mailAddrData" name="email" id="email">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="Company Name"  name="company_name" id="company_name">
                                                    </div>
                                                    <div class="col-md-12">
                                                   
                                                        <input type="text" class="form-control"
                                                            placeholder="Address Line" data-to="addressData" name="address_line" id="address_line">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="Street/Road" name="street">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" data-to="cityData" placeholder="City" name="city" id="city">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="state" data-to="stateData">
                                                            <option value="">State</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" data-to="zipCodeData" placeholder="Zip Code" name="zip_code" id="zip_code">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-control" data-to="countryData" name="country" id="country">
                                                            <option value="">Country</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                          <input type="radio" id="html" name="fav" value="ad">
                                                          <label for="ad">Use same address for billing</label>
                                                        <div class="tool-div" style="position: relative;">
                                                              <input type="radio" id="drop-ship" name="fav"
                                                                value="drop">
                                                              <label for="drop">Drop-ship</label>
                                                            <div class="req">
                                                                <span><i class="fa-solid fa-circle-question"></i></span>
                                                                <div class="req-info">
                                                                    <div class="tooltipBody">
                                                                        <p>After your order is placed, we’ll send you a
                                                                            link to
                                                                            the proof. Just
                                                                            review the design proof and approve it
                                                                            online to
                                                                            process the order.
                                                                            This makes sure you are delivered what you
                                                                            expect.
                                                                        </p>
                                                                        <ul class="fancyCheck">
                                                                            <li><strong>If proofing is not
                                                                                    requested</strong><br>Your
                                                                                satisfaction is the most important
                                                                                factor for
                                                                                us. Hence, every
                                                                                design is proofed, and a notification is
                                                                                sent
                                                                                out if the
                                                                                uploaded art is not optimal for
                                                                                printing.</li>
                                                                            <li><strong>If proofing is
                                                                                    requested</strong><br>We
                                                                                take a day or
                                                                                two extra, just to make sure your
                                                                                request is
                                                                                fully attended to.
                                                                                The updated delivery date will show up
                                                                                at the
                                                                                time of
                                                                                proof-approval.</li>
                                                                            <li><strong>In case of overnight
                                                                                    orders</strong><br>Now if it’s at
                                                                                such a short notice, we understand your
                                                                                urgency
                                                                                and avoid the
                                                                                proofing process entirely. Make sure you
                                                                                upload
                                                                                the right file
                                                                                though!</li>
                                                                            <li>Keep in mind that in all cases where
                                                                                proof is
                                                                                sent, the actual
                                                                                delivery date depends on the proof
                                                                                approval
                                                                                date.</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="check_btn">
                                            <button type="button" class="back_button btn light_dark">Back</button>
                                            <!-- <button type="button" disabled class="next_button btn light_dark">Continue</button> -->
                                            <button type="button" class="next_button btn light_dark ">Continue</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab d-none">
                                    <div class="ship-wrap p-0">
                                        <div class="check-ship">
                                            <h5>Shipping Method</h5>
                                            <div class="checkout-block ship">
                                                <div class="ship-info">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Express
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <span>Thu, Feb 1st</span>
                                                        <strong>$5.00</strong>
                                                    </div>
                                                </div>
                                                <div class="ship-info">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Priority
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <span>Tue, Jan 30th</span>
                                                        <strong>$8.00</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="check-ship">
                                            <h5>Payment Method</h5>
                                            <div class="checkout-block">
                                                <div class="checkout_innr">
                                                    <div class="paylatter_bg">
                                                        <div class="paylatter_wrapper active">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="exampleRadios3" id="exampleRadios1"
                                                                    value="option1" checked="">
                                                                <label class="form-check-label" for="exampleRadios3">
                                                                    Credit card
                                                                </label>
                                                            </div>
                                                            <div class="img-pay">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/cardGrp.png"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row border-0 custom-mx">
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Card Number">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/cardIMG.svg"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Name On Card">
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control" id="number"
                                                                    placeholder="Expiration Date(MM/YY)">
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Security Code">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/InfoMark.png"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="paylatter_bg">
                                                        <div class="paylatter_wrapper">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="exampleRadios3" id="exampleRadios1"
                                                                value="option1">
                                                            <label class="form-check-label" for="exampleRadios3">
                                                                Pay With Paypal
                                                            </label>
                                                        </div>
                                                            <div class="img-pay">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/cardGrp.png"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row border-0 custom-mx">
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Card Number">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/cardIMG.svg"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Name On Card">
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control" id="number"
                                                                    placeholder="Expiration Date(MM/YY)">
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Security Code">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/InfoMark.png"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="check_btn">
                                            <button type="button" class="back_button btn light_dark">Back</button>
                                            <button type="button" class=" next_button btn light_dark">Continue</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab d-none">
                                    <div class="ship-wrap p-0">
                                        <h5 class="order">Confirm Order</h5>
                                        <div class="ship_head">
                                            <h6>Shipping Address</h6>
                                        </div>
                                        <div class="checkout-block ship align-items-start address">
                                            <div class="adres">
                                                <div class="ship-add">
                                                    <p>
                                                    <h6>Address:</h6>
                                                    <span class="addressData"></span>
                                                    <span class="shippingAddressData"> 
                                                        <span class="zipCodeData"></span>
                                                        <span class="cityData"></span>
                                                        <span class="stateData"></span>
                                                        <span class="countryData"></span>
                                                        <!-- Zabiro Vasemashkovat,
                                                        2089 Rockford Road Westborough,
                                                        01581,
                                                        MA,
                                                        India -->
                                                    </span></p>
                                                </div>
                                                <div class="ship-add">
                                                    <h6>Contact information:</h6>
                                                    <span class="contactInfoData">
                                                        <span class="mailAddrData" >zabirovasemashkovat@schule-breklum.de</span>
                                                        <span class="phnNumberData" >77463 34445</span>
                                                        <!-- <a href="mailto:Zzabirovasemashkovat@schule-breklum.de">zabirovasemashkovat@schule-breklum.de</a> -->
                                                        <!-- <a href="tel:77463 34445"></a> -->
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="edit editAdressInfo">
                                                <span><i class="fa-solid fa-pen-to-square"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ship-wrap p-0">
                                        <div class="shipping_block">
                                            <div class="ship_head">
                                                <h6>Payment</h6>
                                            </div>
                                            <div class="checkout-block">
                                            </div>
                                        </div>
                                        <div class="dilv ship-add">
                                            <div class="check_btn">
                                                <button type="button" class="back_button btn light_dark">Back</button>
                                                <button type="button" class="next_button btn light_dark">Place Your
                                                    Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="basket-rgt">
                            <div class="summary_wrap">
                                <h5>Order Summary</h5>
                                <div class="summary-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Product</td>
                                                <td>Qty</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="cart-product-wrapper">
                                                        <div class="image-box">
                                                            <img class="img-fluid"
                                                                src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/polyester-fabric-banners11708952523.jpg"
                                                                alt="Card image cap">
                                                        </div>
                                                        <div class="product-text">
                                                            <p>Custom Vinyl Banners
                                                                Size (W X H): 3 x 2 (FT)
                                                                Price:$6.99</p>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="quantity">
                                                        <span class="minus">-</span>
                                                        <input type="text" value="1">
                                                        <span class="plus">+</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Subtotal</p>
                                                    <p>Shipping</p>
                                                    <p>VAT</p>
                                                </td>
                                                <td>
                                                    <p>$6.99
                                                    </p>
                                                    <p> $5.00</p> $1.40<p></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Grand Total:</td>
                                                <td>$13.39</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        var current = 1; // Start with the second tab
        var tabs = $(".tab");
        var tabs_pill = $(".tab-pills");
        var steps = $(".steps li");

        // Check if user is logged in
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};

        loadFormData(current);

        function loadFormData(n) {
            $(tabs_pill).removeClass("active"); // Remove active class from all tab pills
            $(tabs).addClass("d-none"); // Hide all tabs
            $(tabs_pill[n - 1]).addClass("active"); // Add active class to the current tab pill
            $(tabs[n - 1]).removeClass("d-none"); // Show the current tab

            $(".back_button").prop("disabled", n === 1);

            // Disable the "next" button if the user is not logged in or if it's the last tab
            if (!isLoggedIn || n === tabs.length) {
                $(".next_button").prop("disabled", true);
            } else {
                $(".next_button").prop("disabled", false);
            }

            // Update steps classes
            step();
        }

        function next() {
            if (current < tabs.length) {
                $(tabs[current - 1]).addClass("d-none");
                $(tabs_pill[current - 1]).removeClass("active");

                current++;
                loadFormData(current);
            }
        }

        function back() {
            if (current > 1) {
                $(tabs[current - 1]).addClass("d-none");
                $(tabs_pill[current - 1]).removeClass("active");

                current--;
                loadFormData(current);
            }
        }

        function goToFirstTab() {
            current = 1; // Set current to 1 to start from the second tab
            loadFormData(current); // Load the second tab
            $('html, body').animate({
                scrollTop: $(".shippingAddresWrap").offset().top
            }, 500); // Scroll to the shippingAddresWrap div
        }

        function step() {
            steps.removeClass("is-active completed"); // Remove all classes
            steps.eq(0).addClass("is-active completed"); // Mark the first step as completed

            steps.each(function (index) {
                if (index > 0 && index < current) { // Mark previous steps as completed
                    $(this).addClass("is-active completed");
                }
                if (index === current) {
                    $(this).addClass("is-active");
                }
            });
        }

        $(".back_button").on("click", back);
        $(".next_button").on("click", next);
        $(".editAdressInfo").on("click", goToFirstTab); // Attach goToFirstTab function to click event
    });
</script>



<!-- script for add address and email data In Shipping address -->
<script>
$(document).ready(function() {
    $('input[data-to]').keyup(function() {
        var targetClass = $(this).data('to');

        if (targetClass) {
            var inputValue = $(this).val();
            
            if ($('.shippingAddressData .' + targetClass).length > 0) {
                inputValue = ', ' + inputValue;
            }
            
            $('.' + targetClass).text(inputValue);
        }
    });
});


</script>



@endsection