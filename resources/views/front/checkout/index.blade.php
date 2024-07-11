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
                        <span class="text">Shopping Basket</span>
                    </div>
                </li>
                <li class="is-active">
                    <div class="step">
                        <span class="circle">2</span>
                        <span class="text">Shipping Address</span>
                    </div>
                </li>
                <li>
                    <div class="step">
                        <span class="circle">3</span>
                        <span class="text">Payment Details</span>
                    </div>
                </li>
                <li>
                    <div class="step">
                        <span class="circle">4</span>
                        <span class="text">Confirm Order</span>
                    </div>
                </li>
                <li>
                    <div class="step">
                        <span class="circle">5</span>
                        <span class="text">Last step to success</span>
                    </div>
                </li>
            </ul>
            <div class="cart-content" id="user_address_checkout" >
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-form">
                            <form id="checkout_form" action="{{ url('/checkout-process') }}" method="POST" >
                                @csrf
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
                                                             <a onclick="login()" style="color:#7C7C7C">Login</a> 
                                                             /
                                                             <a onclick="register()" style="color:#7C7C7C">Sign Up</a>
                                                        <!-- </a> -->
                                                        </p>
                                                    </div>  
                                                @endif
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" id="confirmation_email" name="confirmation_email" placeholder="Email" value="{{ auth()->user()->email ?? '' }}" >
                                                        <span id="confirmation_email_error" class="text-danger"></span>
                                                       
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="rem">
                                                            <!-- <a href="javascript:void(0)"
                                                                class="btn light_dark">Continue</a> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>We'll send the order confirmation here</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="check-ship shippingAddresWrap" @if(isset($addresses) && $addresses->isNotEmpty()) style="display:none;" @endif>
                                            <h5>Shipping Address</h5>
                                            <div class="checkout-block">
                                                <div class="row checkoutFormWrap">
                                                    <div class="row checkoutFormWrap" id="shipping_details">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control first_name"
                                                                placeholder="First Name" name="address[first_name]" value="" id="first_name" data-required="required">
                                                                <span class="text-danger validation_error" error-for="first_name"></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control last_name" placeholder="Last Name" name="address[last_name]" id="last_name" value="" data-required="required">
                                                            <span class="text-danger validation_error" error-for="last_name"></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" class="form-control phnNumberCng phone_number"
                                                                placeholder="Phone Number" data-to="phnNumberData"  name="address[phone]" id="phone"  value="" data-required="required">
                                                            <span class="text-danger validation_error" error-for="phone"></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="email" class="form-control email"
                                                                placeholder="Email Address" data-to="mailAddrData" name="address[email]" id="email" value=""  data-required="required">
                                                            <span class="text-danger validation_error" error-for="email"></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control company_name"
                                                                placeholder="Company Name"  name="address[company_name]" id="company_name" value="" data-required="required">
                                                            <span class="text-danger validation_error" error-for="company_name"></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                    
                                                            <input type="text" class="form-control address"
                                                                placeholder="Address Line" data-to="addressData" value="" name="address[address_line]" id="address_line" data-required="required"> 
                                                            <span class="text-danger validation_error" error-for="address_line"></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control additional_address" id="street_addr"
                                                                placeholder="Street/Road" name="address[street]" value="" data-required="required">
                                                            <span class="text-danger validation_error" error-for="street"></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control city" data-to="cityData" placeholder="City" value="" name="address[city]" id="city" data-required="required">
                                                            <span class="text-danger validation_error" error-for="city"></span>
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <select class="form-control" name="state" data-to="stateData">
                                                                <option value="">State</option>
                                                                <option value="">2</option>
                                                                <option value="">3</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control state" data-to="stateData" value="" placeholder="State" name="address[state]" id="state" data-required="required">
                                                            <span class="text-danger validation_error" error-for="state"></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control zip_code" data-to="zipCodeData" value="" placeholder="Zip Code" name="address[zip_code]" id="zip_code" data-required="required">
                                                            <span class="text-danger validation_error" error-for="zip_code"></span>
                                                        </div>
                                                        <?php  $countries = CountryArray(); ?>
                                                        <div class="col-md-12">
                                                            <select class="form-control country" data-to="countryData" name="address[country]" id="country">
                                                                @foreach($countries as $c_code => $c_name)
                                                                    @if(isset(auth()->user()->userMeta->country))
                                                                    <?php $userCountry = auth()->user()->userMeta->country; 
                                                                        // print_r($userCountry);
                                                                    ?>
                                                                        @if($userCountry == $c_code)
                                                                            <option data-value ="{{ $c_name ?? '' }}" value="{{ $c_code ?? '' }}" selected>{{ $c_name ?? '' }}</option>
                                                                        @else
                                                                            <option data-value ="{{ $c_name ?? '' }}" value="{{ $c_code ?? '' }}">{{ $c_name ?? '' }}</option>
                                                                        @endif
                                                                    @else
                                                                        <option data-value ="{{ $c_name ?? '' }}" value="{{ $c_code ?? '' }}">{{ $c_name ?? '' }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="radio" id="html" name="additional_billing" value="same" checked>
                                                        <label for="ad">Use same address for billing</label>
                                                        <div class="tool-div" style="position: relative;">
                                                            <input type="radio" id="drop-ship2" name="additional_billing" 
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
                                                                                though!
                                                                            </li>
                                                                            <li>Keep in mind that in all cases where
                                                                                proof is
                                                                                sent, the actual
                                                                                delivery date depends on the proof
                                                                                approval
                                                                                date.
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="additional_billing_address" class="additional_billing_address row checkoutFormWrap" style="display:none;" >
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="ship_addr[id]" value="" class="id" >
                                                                <input type="text" class="form-control first_name"
                                                                    placeholder="First Name" name="ship_addr[first_name]" value="" id="billing_first_name" data-required="required">
                                                                    <span class="text-danger validation_error" error-for="first_name"></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control last_name" placeholder="Last Name" name="ship_addr[last_name]" id="billing_last_name" value="" data-required="required">
                                                                <span class="text-danger validation_error" error-for="last_name"></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" class="form-control phnNumberCng phone_number"
                                                                    placeholder="Phone Number" data-to="phnNumberData"  name="ship_addr[phone]" id="billing_phone"  value="" data-required="required">
                                                                <span class="text-danger validation_error" error-for="phone"></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="email" class="form-control email"
                                                                    placeholder="Email Address" data-to="mailAddrData" name="ship_addr[email]" id="billing_email" value=""  data-required="required">
                                                                <span class="text-danger validation_error" error-for="email"></span>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control company_name"
                                                                    placeholder="Company Name"  name="ship_addr[company_name]" id="billing_company_name" value="" data-required="required">
                                                                <span class="text-danger validation_error" error-for="company_name"></span>
                                                            </div>
                                                            <div class="col-md-12">
                                                        
                                                                <input type="text" class="form-control address"
                                                                    placeholder="Address Line" data-to="addressData" value="" name="ship_addr[address_line]" id="billing_address_line" data-required="required"> 
                                                                <span class="text-danger validation_error" error-for="address_line"></span>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control additional_address" id="billing_street_addr"
                                                                    placeholder="Street/Road" name="ship_addr[street]" value="" data-required="required">
                                                                <span class="text-danger validation_error" error-for="street"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control city" data-to="cityData" placeholder="City" value="" name="ship_addr[city]" id="billing_city" data-required="required">
                                                                <span class="text-danger validation_error" error-for="city"></span>
                                                            </div>
                                                            <!-- <div class="col-md-4">
                                                                <select class="form-control" name="state" data-to="stateData">
                                                                    <option value="">State</option>
                                                                    <option value="">2</option>
                                                                    <option value="">3</option>
                                                                </select>
                                                            </div> -->
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control state" data-to="stateData" value="" placeholder="State" name="ship_addr[state]" id="billing_state" data-required="required">
                                                                <span class="text-danger validation_error" error-for="state"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control zip_code" data-to="zipCodeData" value="" placeholder="Zip Code" name="ship_addr[zip_code]" id="billing_zip_code" data-required="required">
                                                                <span class="text-danger validation_error" error-for="zip_code"></span>
                                                            </div>
                                                            <?php  $countries = CountryArray(); ?>
                                                            <div class="col-md-12">
                                                                <select class="form-control country" data-to="countryData" name="ship_addr[country]" id="billing_country">
                                                                    @foreach($countries as $c_code => $c_name)
                                                                        @if(isset(auth()->user()->billingAddr->country))
                                                                            <?php $user_billing_Country = auth()->user()->billingAddr->country; 
                                                                                // print_r($userCountry);
                                                                            ?>
                                                                            @if($user_billing_Country == $c_code)
                                                                                <option data-value ="{{ $c_name ?? '' }}" value="{{ $c_code ?? '' }}" selected>{{ $c_name ?? '' }}</option>
                                                                            @else
                                                                                <option data-value ="{{ $c_name ?? '' }}" value="{{ $c_code ?? '' }}">{{ $c_name ?? '' }}</option>
                                                                            @endif
                                                                        @else
                                                                            <option data-value ="{{ $c_name ?? '' }}" value="{{ $c_code ?? '' }}">{{ $c_name ?? '' }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <button id="submitFormBtn" class="btn btn-primary">Submit</button> -->
                                            <p class="cancel_btn">cancel</p>
                                        </div>
                                        @if(isset($addresses) && $addresses->isNotEmpty()) 
                                            <input type="hidden" id="address_type" name="address_type" value="old">
                                        @else
                                            <input type="hidden" id="address_type" name="address_type" value="new">
                                        @endif
                                       
                                        <div id="user_address_div" class="user_address" @if(isset($addresses) && !$addresses->isNotEmpty()) style="display:none;" @endif >
                                            <div class="address">
                                                @if(isset($addresses) && $addresses->isNotEmpty())
                                                    @foreach($addresses as $key => $userAddress)
                                                        <div class="address-container">
                                                            <!-- <input type="radio" name="shipping_id" class="shipping_id" value="{{ $userAddress->id }}" @if($key === 0) checked="checked" @endif /> -->
                                                            <div class="address-data-container">    
                                                                <div class="address-head d-flex ">
                                                                <div class="mainUserAdress">
                                                                            <input type="radio" name="shipping_id" class="billing_address" value="{{ $userAddress->id }}" @if($key === 0) checked="checked" @endif />

                                                                            <h6>{{ $userAddress->first_name }} {{ $userAddress->last_name }}</h6>
                                                                        </div>
                                                                    <p class="icon-container">
                                                                        <span style="display:none;" class="edit-icon edit_btn" data-id="{{ $userAddress->id }}" ><i class="fa-solid fa-pen"></i>Edit</span>
                                                                    </p>
                                                                </div>
                                                                <p> 
                                                                    <span class="emailAddress">{{ $userAddress->email }}</span>
                                                                    <span class="numberAddress">{{ $userAddress->phone_number }}</span>
                                                                    <div class="addressDetails">
                                                                        <span>{{ $userAddress->company_name }}</span>
                                                                        <span>{{ $userAddress->address }} {{ $userAddress->additional_address }} ,{{ $userAddress->city }}</span>
                                                                        <span>{{ $userAddress->zip_code }}-{{ $userAddress->state }}</span>
                                                                        <span>{{ countryName($userAddress->country) }}</span>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="check_user_ship_addre"  @if(isset($addresses) && !$addresses->isNotEmpty()) style="display:none;" @endif>
                                            <input type="checkbox" id="check_box" name="same" value="same" checked  >
                                            <label for="ad">Use same address for billing</label>
                                            <div id="user_address" class="user_addre"  style="display:none;"  >
                                                <div class="address">
                                                    @if(isset($addresses) && $addresses->isNotEmpty())
                                                        @foreach($addresses as $key => $userAddress)
                                                            <div class="address-container">
                                                                <!-- <input type="radio" name="billing_id" class="billing_address" value="{{ $userAddress->id }}" @if($key === 0) checked="checked" @endif /> -->
                                                                <div class="address-data-container">
                                                                    <div class="address-head d-flex ">
                                                                        <div class="mainUserAdress">
                                                                            <input type="radio" name="billing_id" class="billing_address" value="{{ $userAddress->id }}" @if($key === 0) checked="checked" @endif />

                                                                            <h6>{{ $userAddress->first_name }} {{ $userAddress->last_name }}</h6>
                                                                        </div>
                                                                        <p class="icon-container">
                                                                            <span style="display:none;" class="edit-icon edit_btn_billing_address" data-id="{{ $userAddress->id }}" ><i class="fa-solid fa-pen"></i>Edit</span>
                                                                        </p>
                                                                    </div>
                                                                    <p> 
                                                                    <span class="emailAddress">{{ $userAddress->email }}</span>
                                                                    <span class="numberAddress">{{ $userAddress->phone_number }}</span>
                                                                    <div class="addressDetails">
                                                                        <span>{{ $userAddress->company_name }}</span>
                                                                        <span>{{ $userAddress->address }} {{ $userAddress->additional_address }} ,{{ $userAddress->city }}</span>
                                                                        <span>{{ $userAddress->zip_code }}-{{ $userAddress->state }}</span>
                                                                        <span>{{ countryName($userAddress->country) }}</span>
                                                                    </div>
                                                                </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="check_btn">
                                            
                                            <a href="{{ url('/checkout/cart') }}" class="back_button btn light_dark">Back</a>
                                            <!-- <button type="button" disabled class="next_button btn light_dark">Continue</button> -->
                                            <button type="button" class="next_button btn light_dark first_next_btn">Continue</button>
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
                                                            name="delivery_type" value="express" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Express
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <span>Thu, Feb 1st</span>
                                                        <strong>£5.00</strong>
                                                    </div>
                                                </div>
                                                <div class="ship-info">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="delivery_type" value="priority" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Priority
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <span>Tue, Jan 30th</span>
                                                        <strong>£8.00</strong>
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
                                                                    name="payment_method" id="stripe"
                                                                    value="stripe"  checked>
                                                                <label class="form-check-label" for="exampleRadios3">
                                                                    Credit card
                                                                </label>
                                                            </div>
                                                            <div class="img-pay">
                                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/cardGrp.png"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row border-0 custom-mx checkoutFormWrap" id="payment_details">

                                                            <div class="col-lg-12 custom-px">
                                                                <input type="text" class="form-control" id ="card_holder_name"
                                                                    placeholder="Name On Card" name="name_on_card" data-required="required">
                                                                <span class="text-danger validation_error" error-for="name_on_card"></span>
                                                            </div>

                                                            <div class="col-lg-12 custom-px" >
                                                                <div id="card-number"></div> 
                                                                <span class="text-danger validation_error" id="card_number_error" error-for="card_number"></span>
                                                            </div>
                                                            <div class="exp-div-wrap">
                                                                <div class="col-lg-6 custom-px" > 
                                                                    <div id="card-expiry"></div> 
                                                                    <span class="text-danger validation_error" id="expiration_date_error" error-for="expiration_date"></span>
                                                                </div>

                                                                <div class="col-lg-6 custom-px" > 
                                                                    <div id="card-cvc"></div> 
                                                                    <span class="text-danger validation_error" id="security_code_error" error-for="security_code"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="paylatter_bg">
                                                            <div class="paylatter_wrapper">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment_method" id="paypal"
                                                                        value="paypal">
                                                                    <label class="form-check-label" for="exampleRadios3">
                                                                        Pay With Paypal
                                                                    </label>
                                                                </div>
                                                                <div class="img-pay paypal-image">
                                                                    <img src="{{ asset("front/img/paypal.png") }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <!-- <div class="row border-0 custom-mx checkoutFormWrap" id="paypal_details">
                                                                <div class="col-lg-12 custom-px">
                                                                    <input type="number" class="form-control"
                                                                        placeholder="Card Number" name="card_number" data-required="required">
                                                                    <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/cardIMG.svg"
                                                                        alt="">
                                                                    <span class="text-danger validation_error" error-for="card_number"></span>
                                                                </div>
                                                                <div class="col-lg-12 custom-px">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Name On Card" name="name_on_card" data-required="required">
                                                                    <span class="text-danger validation_error" error-for="name_on_card"></span>
                                                                </div>
                                                                <div class="col-lg-6 custom-px">
                                                                    <input type="number" class="form-control" id="number"
                                                                        placeholder="Expiration Date(MM/YY)" name="expiration_date" data-required="required">
                                                                    <span class="text-danger validation_error" error-for="expiration_date"></span>
                                                                </div>
                                                                <div class="col-lg-6 custom-px">
                                                                    <input type="number" class="form-control"
                                                                        placeholder="Security Code" name="security_code"  data-required="required">
                                                                    <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/InfoMark.png"
                                                                        alt="">
                                                                    <span class="text-danger validation_error" error-for="security_code"></span>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="check_btn">
                                            <button type="button" class="back_button btn light_dark">Back</button>
                                            @if(Auth::check())
                                                <button type="button" data-secret="{{ $client_secret ?? '' }}" class=" next_button btn light_dark second_next_btn">Continue</button>
                                            @else
                                                <button type="button" id="second_next_btn"  class=" next_button btn light_dark second_next_btn" disabled>Continue</button>
                                            @endif
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
                                                    <div class="ship-add" id="ship-add">
                                                        <!-- <h6>Contact information:</h6>
                                                        <span class="contactInfoData">
                                                            <span class="mailAddrData" >zabirovasemashkovat@schule-breklum.de</span>
                                                            <span class="phnNumberData" >77463 34445</span>
                                                                <a href="mailto:Zzabirovasemashkovat@schule-breklum.de">zabirovasemashkovat@schule-breklum.de</a>
                                                                <a href="tel:77463 34445"></a>
                                                            
                                                        </span> -->
                                                    </div>
                                                    <p id="billing_address_div">
                                                        <!-- <h6>Address:</h6>
                                                        <span class="addressData"></span>
                                                        <span class="shippingAddressData"> 
                                                            <span class="zipCodeData"></span>
                                                            <span class="cityData"></span>
                                                            <span class="stateData"></span>
                                                            <span class="countryData"></span>
                                                        </span> -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="edit editAdressInfo">
                                                <span class="edit-icon-span" ><i class="fa-solid fa-pen"></i></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="ship_head" id="addres_detail_head" style="display:none;">
                                            <h6>Billing Address</h6>
                                        </div>
                                        <div class="checkout-block ship align-items-start address" id="addres_detail" style="display:none;">
                                            <div class="billingadres">
                                                <div class="billing_ship-add">
                                                    <p id="b_address_div">
                                                       
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="edit editAdressInfo">
                                                <span class="edit-icon-span"><i class="fa-solid fa-pen"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ship-wrap p-0">
                                        <div class="shipping_block">
                                            <div class="ship_head">
                                                <h6>Payment</h6>
                                            </div>
                                            <div class="checkout-block">
                                                <div id="payment-info">
                                                    <div class="img-text-wrap">
                                                        <img class="logo stripe-logo" src="" alt="Stripe Logo" id="card-image">
                                                        <p id="payment-text">Pay with visa</p>
                                                    </div>
                                                    <span class="edit-icon-span"><i class="fa-solid fa-pen"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dilv ship-add">
                                            <div class="check_btn">
                                                <button type="button" class="back_button btn light_dark">Back</button>
                                                <button type="button" id="final-btn" class="next_button btn light_dark ">Place Your Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="AddNewAddress" class="address-container " @if(isset($addresses) && !$addresses->isNotEmpty()) style="display:none;" @endif>
                                <div class="add-new-address">
                                    <p>
                                        <span class="add-icon" ><i class="fa-solid fa-plus"></i></span>
                                        <span>Add new address</span>
                                    </p>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="basket-rgt">
                            <div class="summary_wrap">
                                <h5>Order Summary</h5>
                                <div class="summary-table">
                                    <div class="summary-table">
                                        <div class="table-wrap">
                                            <div class="panel ">
                                                <div id="" class="panel-title">
                                                    <h6 class="toggle-collapse">Price <span>({{ count($allbasket) ?? '' }} Items)</span></h6><a
                                                        class="linkButton editLinks" href="{{ url('checkout/cart') ?? '' }}">View
                                                        Basket</a>
                                                </div>
                                                <div class="panel-collapse">
                                                    <div class="panel-content">
                                                    <?php $all_total = []; ?>
                                                    @foreach($allbasket as $basket)
                                                        @if($basket->product_type != 'accessories')
                                                            @if(isset($basket->design))
                                                                <div class="productDetails">
                                                                    <div class="product-dtl">
                                                                        <div class="cart-product-wrapper">
                                                                            <div class="image-box">
                                                                                @if($basket->design_method == 'Artwork')
                                                                                    <?php $count = 0; ?> 
                                                                                    
                                                                                    @foreach(json_decode($basket->design->image,true) as $index => $value)
                                                                                        @if($count == 0)
                                                                                            <img class="img-fluid" src="{{ asset('designImage/'.$value) }}">
                                                                                        @endif
                                                                                        <?php  $count++ ?>
                                                                                    @endforeach
                                                                                @elseif($basket->design_method == 'ArtworkLater')
                                                                                    <img class="img-fluid" src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                                @elseif($basket->design_method == 'hireDesigner')
                                                                                    @foreach (json_decode($basket->product->images) as $index => $image)
                                                                                        @if ($index == 0)
                                                                                            <img src="{{ asset('product_Images') }}/{{ $image }}">
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    <img class="img-fluid" src="{{ asset('designImage/'.$basket->design->image) }}">
                                                                                @endif
                                                                            </div>
                                                                            <div class="product-text">
                                                                                <p>{{ $basket->product->name }} <br />
                                                                                @if($basket->size_id != null)
                                                                                    @foreach($basket->product->sizes as $size)
                                                                                        @if($size->id == $basket->size_id)
                                                                                            @php
                                                                                                $value = $basket->dimension;
                                                                                                if ($value == 'In') {
                                                                                                    $unit_value = 12;
                                                                                                } else if ($value == 'Cm') {
                                                                                                    $unit_value = 30;
                                                                                                } else if ($value == 'Mm') {
                                                                                                    $unit_value = 304;
                                                                                                } else if ($value == 'Ft') {
                                                                                                    $unit_value = 1;
                                                                                                }

                                                                                                $size_value = explode('X' ,$size->size_value);
                                                                                                $width = $size_value[0];
                                                                                                $heigth = $size_value[1];

                                                                                                $converted_width = $width * $unit_value; 
                                                                                                $converted_height = $heigth * $unit_value; 
                                                                                            @endphp
                                                                                            <?php $size_price = $size->price; ?>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <!-- Size (W X H): {{ $converted_width }} x {{ $converted_height }} ({{ $basket->dimension }}) -->
                                                                                @elseif($basket->width != null && $basket->height != null )
                                                                                    @php
                                                                                        $value = $basket->dimension;
                                                                                        if ($value == 'In') {
                                                                                            $unit_value = 12;
                                                                                        } else if ($value == 'Cm') {
                                                                                            $unit_value = 30;
                                                                                        } else if ($value == 'Mm') {
                                                                                            $unit_value = 304;
                                                                                        } else if ($value == 'Ft') {
                                                                                            $unit_value = 1;
                                                                                        }

                                                                                        $product_price = $basket->product->price;
                                                                                        $price_pre_unit = ($product_price / $unit_value) / 2;
                                                                                        $size_price = round(($basket->width + $basket->height) * $price_pre_unit);
                                                                                        
                                                                                    @endphp
                                                                                @else 
                                                                                    <?php $size_price = $basket->product->price; ?>
                                                                                @endif
                                                                                <?php $variation_price = []; ?>
                                                                                @foreach($basket->product->variations as $variation)  
                                                                                    @if ($variation->variationData->isNotEmpty())  
                                                                                        @foreach(json_decode($basket->variations) as $key => $value)
                                                                                            @if($key == $variation->var_slug)
                                                                                                @foreach ($variation->variationData as $data)
                                                                                                    @if($value == $data->id)
                                                                                                        <?php $variation_price [] = $data->price; ?>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                                @php
                                                                                    $var_price = array_sum($variation_price);
                                                                                    $total_without_qty = $size_price + $var_price;
                                                                                    $total =( $size_price + $var_price) * $basket->qty;
                                                                                    if($basket->design_method == 'hireDesigner') {
                                                                                        $total += 10;
                                                                                    }
                                                                                @endphp
                                                                                Qty: <span class="product-amount">{{ $basket->qty ?? '1' }}</span>
                                                                                <!-- Price: <span id="product_total{{ $basket->id }}" >${{ $total }}</span></p> -->
                                                                                <?php $all_total[] = $total ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="quantity">
                                                                            <span id="product_total{{ $basket->id ?? ''}}" >£{{ $total ?? ''}}</span>
                                                                            <!-- <span class="product-amount">{{ $basket->qty ?? '1' }}</span> -->
                                                                            <!-- <span class="minus">-</span>
                                                                            <input type="text" data-product-id="15"
                                                                                data-withoutqtyprice="14" data-withqtyprice="14"
                                                                                class="qtyInput" value="1">
                                                                            <span class="plus">+</span> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif    
                                                        @else
                                                            <div class="productDetails">
                                                                <div class="product-dtl">
                                                                    <div class="cart-product-wrapper">
                                                                        <div class="image-box">
                                                                            @if($basket->accessorie)
                                                                                <?php $count = 0; ?> 
                                                                                
                                                                                @foreach(json_decode($basket->accessorie->images,true) as $index => $value)
                                                                                    @if($count == 0)
                                                                                        <img class="img-fluid" src="{{ asset('accessories_Images/'.$value) }}">
                                                                                    @endif
                                                                                    <?php  $count++ ?>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                        <div class="product-text">
                                                                            <p>{{ $basket->accessorie->name }} <br />
                                                                                @if($basket->size_id != null)
                                                                                    @foreach($basket->accessorie->sizes as $size)
                                                                                        @if($size->id == $basket->size_id)
                                                                                            @php
                                                                                                $value = $basket->dimension;
                                                                                                if ($value == 'In') {
                                                                                                    $unit_value = 12;
                                                                                                } else if ($value == 'Cm') {
                                                                                                    $unit_value = 30;
                                                                                                } else if ($value == 'Mm') {
                                                                                                    $unit_value = 304;
                                                                                                } else if ($value == 'Ft') {
                                                                                                    $unit_value = 1;
                                                                                                }

                                                                                                $size_value = explode('X' ,$size->size_value);
                                                                                                $width = $size_value[0];
                                                                                                $heigth = $size_value[1];

                                                                                                $converted_width = $width * $unit_value; 
                                                                                                $converted_height = $heigth * $unit_value; 
                                                                                            @endphp
                                                                                            <?php $size_price = $size->price; ?>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <!-- Size (W X H): {{ $converted_width }} x {{ $converted_height }} ({{ $basket->dimension }}) -->
                                                                                @elseif($basket->width != null && $basket->height != null )
                                                                                    @php
                                                                                        $value = $basket->dimension;
                                                                                        if ($value == 'In') {
                                                                                            $unit_value = 12;
                                                                                        } else if ($value == 'Cm') {
                                                                                            $unit_value = 30;
                                                                                        } else if ($value == 'Mm') {
                                                                                            $unit_value = 304;
                                                                                        } else if ($value == 'Ft') {
                                                                                            $unit_value = 1;
                                                                                        }

                                                                                        $product_price = $basket->accessorie->price;
                                                                                        $price_pre_unit = ($product_price / $unit_value) / 2;
                                                                                        $size_price = round(($basket->width + $basket->height) * $price_pre_unit);
                                                                                        
                                                                                    @endphp
                                                                                @else 
                                                                                    <?php $size_price = $basket->accessorie->price; ?>
                                                                                @endif
                                                                                <?php $variation_price = []; ?>
                                                                                @foreach($basket->accessorie->variations as $variation)  
                                                                                    @if ($variation->variationData->isNotEmpty())  
                                                                                        @foreach(json_decode($basket->variations) as $key => $value)
                                                                                            @if($key == $variation->var_slug)
                                                                                                @foreach ($variation->variationData as $data)
                                                                                                    @if($value == $data->id)
                                                                                                        <?php $variation_price [] = $data->price; ?>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                                @php
                                                                                    $var_price = array_sum($variation_price);
                                                                                    $total_without_qty = $size_price + $var_price;
                                                                                    $total =( $size_price + $var_price) * $basket->qty;
                                                                                @endphp
                                                                                Qty :<span>{{ $basket->qty ?? '1' }}</span>
                                                                                <!-- Price: <span id="product_total{{ $basket->id }}" >${{ $total }}</span></p>
                                                                                <?php $all_total[] = $total ?> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <!-- <td> -->
                                                            <div class="quantity">
                                                                <span> <span id="product_total{{ $basket->id ?? '' }}" >£{{ $total ?? ''}}</span></span>
                                                                <!-- <span class="minus">-</span>
                                                                <input type="text" data-product-id="{{ $basket->id }}" data-withoutqtyprice="{{ $total_without_qty }}" data-withqtyprice="{{ $total }}" class="qtyInput" value="{{ $basket->qty ?? '1' }}">
                                                                <span class="plus">+</span> -->
                                                            </div>
                                                        <!-- </td> -->
                                                        </div>
                                                    </div>
                                                @endif
                                                    @endforeach
                                                                
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <table>
                                        <!-- <thead>
                                            <tr>
                                                <td>Product</td>
                                                <td>Qty</td>
                                            </tr>
                                        </thead> -->
                                        <tbody>
                                          <!-- old code here -->
                                            <tr>
                                                <td>
                                                    <p>Subtotal</p>
                                                    <p>Shipping</p>
                                                    <p>VAT</p>
                                                </td>
                                                <td>
                                                    <p class="subtotal"  >£{{array_sum($all_total) }}</p>
                                                    <p id="shipping_price"> £5.00</p> £0.00<p></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Grand Total:</td>
                                                <td class="totalprice" id="totalprice" data-price = "{{array_sum($all_total) }}" >£{{(array_sum($all_total) +5)}}</td>
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
<!-- script for stripe card payment  -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function () {
        $('.cancel_btn').hide();
        // :::::::: Mount Stripe Card ::::::::: //
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        const elements = stripe.elements();

        var cardNumber = elements.create('cardNumber',{
            showIcon: true,
        });

        cardNumber.mount('#card-number');

        var cardExpiry = elements.create('cardExpiry');
        cardExpiry.mount('#card-expiry');

        var cardCvc = elements.create('cardCvc');
        cardCvc.mount('#card-cvc');

        cardNumber.on('change', function (event) {
            const card = event.brand === 'Unknown' ? (event.complete ? event : null) : event;
            if (card) {
                let brand = card.brand;
                if(brand === 'amex'){
                    var cardimg = "{{ asset('front/img/amex.png') }}";
                    $('#payment-text').text('Pay with'+brand);
                    $('#card-image').attr('src',cardimg); 
                }else if(brand === 'discover'){
                    $('#payment-text').text('Pay with'+brand);
                    var cardimg = "{{ asset('front/img/discover.png') }}";
                    $('#card-image').attr('src',cardimg); 
                }else if(brand === 'mastercard'){
                    $('#payment-text').text('Pay with'+brand);
                    var cardimg = "{{ asset('front/img/mastercard.png') }}";
                    $('#card-image').attr('src',cardimg); 
                }else if(brand === 'visa'){
                    $('#payment-text').text('Pay with'+brand);
                    var cardimg = "{{ asset('front/img/visa.png') }}";
                    $('#card-image').attr('src',cardimg); 
                }
            }
        });
        // :::::::::: End ::::::::::::: //

        var current = 1; // Start with the second tab
        var tabs = $(".tab");
        var tabs_pill = $(".tab-pills");
        var steps = $(".steps li");

        // Check if user is logged in
        var isLoggedIn = "{{ Auth::check() ? 'true' : 'false' }}";

        loadFormData(current);

        // validate payment details 
        var isCardNumberValid = false;
        var isCardExpiryValid = false;
        var isCardCvcValid = false;
        var isCardHolderName = false;
        
        $('#card_holder_name').on('change',function (){
            if($(this).val() == undefined || $(this).val() == null  || $(this).val() == '' ) {
                isCardHolderName = false;
                $('#card_holder_name').next('.validation_error').html('Card holder name&nbsp;is required');
            } else {
                isCardHolderName = true;
                $('#card_holder_name').next('.validation_error').html('');
            }
            updateAction();
        });

        cardNumber.on('change', function(event) {
            isCardNumberValid = event.complete && event.error === undefined;
            
            if(!isCardNumberValid) {
                $('#card_number_error').text('please enter a valid Card Number');
            } else {
                $('#card_number_error').text('');
            }
            updateAction();
        });

        cardExpiry.on('change', function(event) {
            isCardExpiryValid = event.complete && event.error === undefined;
            
            if(!isCardExpiryValid) {
                $('#expiration_date_error').text('Card Expire');
            } else {
                $('#expiration_date_error').text('');
            }
            updateAction();
        });

        cardCvc.on('change', function(event) {
            isCardCvcValid = event.complete && event.error === undefined;
            
            if(!isCardCvcValid) {
                $('#security_code_error').text('please enter a valid CVC');
            } else {
                $('#security_code_error').text('');
            }
            updateAction();
        });

        function updateAction() {
            if (isCardNumberValid && isCardExpiryValid && isCardCvcValid && isCardHolderName) {
                action = true;
            } else {
                action = false;
            }
        }

        function validPaymentFields(){
            action == true;

            payment_method = $('input[name=payment_method]:checked').val();
            cardHolderName = $('#card_holder_name').val();

            if(payment_method == 'paypal') {
                action == true;
                next();
                
            } else if(payment_method == 'stripe') {
                if(cardHolderName == undefined || cardHolderName == null  || cardHolderName == '' ) {
                    isCardHolderName = false;
                    $('#card_holder_name').next('.validation_error').html('Card holder name&nbsp;is required');
                    updateAction();
                } else {
                    isCardHolderName = true;
                    updateAction();
                }

                if (isCardNumberValid && isCardExpiryValid && isCardCvcValid && isCardHolderName) {
                    action = true;
                } else {
                    action = false;
                    if(!isCardCvcValid) {
                        $('#security_code_error').text('CVC is required');
                    }

                    if(!isCardExpiryValid) {
                        $('#expiration_date_error').text('Expiry Date is required');
                    }

                    if(!isCardNumberValid) {
                        $('#card_number_error').text('Card Number is required');
                    }
                }
            }
            if(action == false){
               return false;
            }
            next();
        }

        function loadFormData(n) {
            $(tabs_pill).removeClass("active");  // Remove active class from all tab pills
            $(tabs).addClass("d-none");          // Hide all tabs
            $(tabs_pill[n - 1]).addClass("active"); // Add active class to the current tab pill
            $(tabs[n - 1]).removeClass("d-none"); // Show the current tab

            $(".back_button").prop("disabled", n === 1);
            

            // Disable the "next" button if the user is not logged in or if it's the last tab
            // console.warn(isLoggedIn);
            // console.warn(n);

            // if (isLoggedIn === 'false'|| n === tabs.length) 
            if (isLoggedIn === 'false'){
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
                $('#AddNewAddress').hide();
                
            }
                
        }

        function back() {
            if (current > 1) {
                $(tabs[current - 1]).addClass("d-none");
                $(tabs_pill[current - 1]).removeClass("active");
                current--;
                loadFormData(current);
                if (current === 2) {
                    $('#AddNewAddress').hide();
                }
                else {
                    $('#AddNewAddress').show();
                }
                 
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

        function validFields(){
            action = true;
            var addressTYPE = $('#address_type').val();
            if(addressTYPE == 'new') {
                $('#shipping_details input[type=text]').each(function(){
                    var field_name = $(this).attr('id');
                    field_name = field_name.split('_');
                    for(i=0;i<field_name.length;i++){
                        field_name[i] = field_name[i].charAt(0).toUpperCase() + field_name[i].slice(1);
                    }
                    name = field_name.join(' ');
                    if($(this).attr('data-required') === "required"){
                        if($(this).val() === undefined || $(this).val() === null || $(this).val() === ''){
                            $(this).next('.validation_error').html(name+'&nbsp;is required');
                            action = false;
                        }else{
                            $(this).next('.validation_error').html('');
                        }
                    }
                });

                $('#shipping_details input[type=number]').each(function(){
                    var phone = $(this).attr('name');
                    if($(this).attr('data-required') === "required"){
                        if($(this).val() === undefined || $(this).val() === null || $(this).val() === ''){
                            $(this).next('.validation_error').html('Phone Number is required');
                            action = false;
                        }else{
                            $(this).next('.validation_error').html('');
                        }
                    }
                });

                $('#shipping_details input[type=email]').each(function(){
                    email = $(this).attr('name');
                    if($(this).attr('data-required') === "required"){
                        if($(this).val() === undefined || $(this).val() === null || $(this).val() === ''){
                            $(this).next('.validation_error').html('Email Address is required');
                            action = false;
                        }else{
                            $(this).next('.validation_error').html('');
                        }
                    }
                });

                confirmation_email_validate = $('#confirmation_email').val();

                if(confirmation_email_validate == undefined || confirmation_email_validate == null || confirmation_email_validate == "") {
                    $('#confirmation_email_error').text('confirmation email is required');
                    action = false;
                }

                var input_value_billing = $('input[name=additional_billing]:checked').val();
                if(input_value_billing === 'drop'){
                    $('#additional_billing_address input[type=text]').each(function(){
                        var field_name = $(this).attr('id');
                        field_name = field_name.split('_');
                        for(i=0;i<field_name.length;i++){
                            field_name[i] = field_name[i].charAt(0).toUpperCase() + field_name[i].slice(1);
                        }
                        name = field_name.join(' ');
                        if($(this).attr('data-required') === "required"){
                            if($(this).val() === undefined || $(this).val() === null || $(this).val() === ''){
                                $(this).next('.validation_error').html(name+'&nbsp;is required');
                                action = false;
                            }else{
                                $(this).next('.validation_error').html('');
                            }
                        }
                    });

                    $('#additional_billing_address input[type=number]').each(function(){
                        var phone = $(this).attr('name');
                        if($(this).attr('data-required') === "required"){
                            if($(this).val() === undefined || $(this).val() === null || $(this).val() === ''){
                                $(this).next('.validation_error').html('Phone Number is required');
                                action = false;
                            }else{
                                $(this).next('.validation_error').html('');
                            }
                        }
                    });

                    $('#additional_billing_address input[type=email]').each(function(){
                        email = $(this).attr('name');
                        if($(this).attr('data-required') === "required"){
                            if($(this).val() === undefined || $(this).val() === null || $(this).val() === ''){
                                $(this).next('.validation_error').html('Email Address is required');
                                action = false;
                            }else{
                                $(this).next('.validation_error').html('');
                            }
                        }
                    }); 
                    billing_company_name = $('#billing_company_name').val();
                    billing_address_line = $('#billing_address_line').val();
                    billing_additional_address = $('#billing_street_addr').val();
                    billing_zip_code = $('#billing_zip_code').val();
                    billing_state = $('#billing_state').val();
                    billing_city = $('#billing_city').val();
                    billing_country = $('#billing_country').val();
                    billing_email = $('#billing_email').val();
                    billing_phone = $('#billing_phone').val();
                    billing_name = $('#billing_first_name').val();
                    billing_lname = $('#billing_last_name').val();
                    var country_tag = $('#billing_country').find(':selected');
                    var country = country_tag.data('value');
                    
                    $('#addres_detail').show();
                    $('#addres_detail_head').show();
                    Billing_html = `
                                    <span class="shippingAddressData"> 
                                        <p><strong>Address: </strong><span class="ship_AddrData">${billing_address_line},${billing_additional_address}</span></p>
                                        <p><strong>Name: </strong><span class="ship_nameAddrData">${billing_name} ${billing_lname}</span></p>
                                        <p><strong>Email: </strong><span class="ship_mailAddrData">${billing_email}</span></p>
                                        <p><strong>Phone Number: </strong><span class="ship_phnNumberData">${billing_phone}</span></p>
                                        <p><strong>Company Name: </strong><span class="billing_company">${billing_company_name}</span></p>
                                        <p><strong>Zip Code: </strong><span class="zip_billing">${billing_zip_code}</span></p>
                                        <p><strong>City: </strong><span class="city_billing">${billing_city}</span></p>
                                        <p><strong>State: </strong><span class="state_billing">${billing_state}</span></p>
                                        <p><strong>Country: </strong><span class="country_billing">${country}</span></p>
                                    </span>`
                    $('#b_address_div').html(Billing_html);
                    
                }
                if(action == false){
                    return false;
                }

                Company_name = $('#company_name').val();
                console.log(Company_name);
                address_line = $('#address_line').val();
                additional_address = $('#street_addr').val();
                zip_code = $('#zip_code').val();
                state = $('#state').val();
                city = $('#city').val();
                country = $('#country').val();
                email = $('#email').val();
                phone_number = $('#phone').val();
                var country_tag = $('#country').find(':selected');
                var country = country_tag.data('value');
                Html_data =`
                            <span class="shippingAddressData"> 
                                <p><strong>Address:</strong><span class="ship_addressData"> ${address_line},${additional_address}</span></p>
                                <p><strong>Company Name: </strong><span class="ship_addresscompanyData">${Company_name}</span></p>
                                <p><strong>Zip Code: </strong><span class="ship_zipCodeData">${zip_code}</span></p>
                                <p><strong>City: </strong><span class="ship_cityData">${city}</span></p>
                                <p><strong>State: </strong><span class="ship_stateData">${state}</span></p>
                                <p><strong>Country: </strong><span class="ship_countryData">${country}</span></p>
                            </span>`
                contact_html = `<h6>Contact information:</h6>
                                    <span class="contactInfoData">
                                        <p><strong>Email: </strong><span class="ship_mailAddrData">${email}</span></p>
                                        <p><strong>Phone Number: </strong><span class="ship_phnNumberData">${phone_number}</span></p>
                                    </span>`

                $('#billing_address_div').html(Html_data);
                $('#ship-add').html(contact_html);
            }
            else {
                // next();
                var shipping_id = $('input[name="shipping_id"]:checked').val();
                var billing_id = $('input[name="billing_id"]:checked').val();

                if(!Number.isNaN(shipping_id)) {
                    $.ajax({
                        url:"{{ route('address.checkout.page') }}",
                        type:'GET',
                        data:{id:shipping_id, _token: '{{ csrf_token() }}'},
                        success:function(response){
                            var userAddress = response.userAddress;
                            Html_data =`
                                        <span class="shippingAddressData"> 
                                            <p><strong>Address:</strong><span class="ship_addressData"> ${userAddress.address},${userAddress.additional_address}</span></p>
                                            <p><strong>Company Name: </strong><span class="ship_addresscompanyData">${userAddress.company_name}</span></p>
                                            <p><strong>Zip Code: </strong><span class="ship_zipCodeData">${userAddress.zip_code}</span></p>
                                            <p><strong>City: </strong><span class="ship_cityData">${userAddress.city}</span></p>
                                            <p><strong>State: </strong><span class="ship_stateData">${userAddress.state}</span></p>
                                            <p><strong>Country: </strong><span class="ship_countryData">${userAddress.country}</span></p>
                                        </span>`
                            contact_html = `<h6>Contact information:</h6>
                                                <span class="contactInfoData">
                                                    <p><strong>Email: </strong><span class="ship_mailAddrData">${userAddress.email}</span></p>
                                                    <p><strong>Phone Number: </strong><span class="ship_phnNumberData">${userAddress.phone_number}</span></p>
                                                </span>`

                            $('#billing_address_div').html(Html_data);
                            $('#ship-add').html(contact_html);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });   
                    
                }

                if(!Number.isNaN(billing_id)) {
                    $.ajax({
                        url:"{{ route('address.checkout.page') }}",
                        type:'GET',
                        data:{id:billing_id, _token: '{{ csrf_token() }}'},
                        success:function(response){
                            $('#addres_detail').show();
                            $('#addres_detail_head').show();
                            var billingAddress = response.userAddress;
                            Billing_html = `
                                            <span class="shippingAddressData"> 
                                               <p><strong>Address:</strong><span class="ship_addressData"> ${billingAddress.address},${billingAddress.additional_address}</span></p>
                                                <p><strong>Name: </strong><span class="ship_nameAddrData">${billingAddress.first_name} ${billingAddress.last_name}</span></p>
                                                <p><strong>Email: </strong><span class="ship_mailAddrData">${billingAddress.email}</span></p>
                                                <p><strong>Phone Number: </strong><span class="ship_phnNumberData">${billingAddress.phone_number}</span></p>
                                                <p><strong>Company Name: </strong><span class="ship_addresscompanyData">${billingAddress.company_name}</span></p>
                                                <p><strong>Zip Code: </strong><span class="ship_zipCodeData">${billingAddress.zip_code}</span></p>
                                                <p><strong>City: </strong><span class="ship_cityData">${billingAddress.city}</span></p>
                                                <p><strong>State: </strong><span class="ship_stateData">${billingAddress.state}</span></p>
                                                <p><strong>Country: </strong><span class="ship_countryData">${billingAddress.country}</span></p>
                                            </span>`
                            $('#b_address_div').html(Billing_html);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });   
                }
            }
            
            next();
        }

        $('#final-btn').on('click',async function(){

            $('#overlay').show();
            payment_method = $('input[name=payment_method]:checked').val();
            var form = $('#checkout_form');
            cardHolderName = $('#card_holder_name').val();
            // secret_value = $(cardBtn).data('secret');
            secret_value = "{{ $client_secret }}";
            console.log(secret_value);

            if(payment_method == 'stripe'){
                
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    secret_value, {
                        payment_method: {
                            card: cardNumber,
                            billing_details: {
                                name: cardHolderName
                            }   
                        }
                    }
                ) 
                if(error){
 
                    if(error.message != ''){
                        $("#card-error-message").html(error.message);
                    }
                    action = false;
                    $('#overlay').hide();
                }else{
                    let token = document.createElement('input')
                    token.setAttribute('type', 'hidden')
                    token.setAttribute('name', 'token')
                    token.setAttribute('value', setupIntent.payment_method)

                    
                    let payment_gateway = document.createElement('input')
                    payment_gateway.setAttribute('type','hidden')
                    payment_gateway.setAttribute('name', 'payment_gateway')
                    payment_gateway.setAttribute('value', 'stripe')

                    form.append(token)
                    form.append(payment_gateway)
                    form.submit();
                }
            } else {
                // console.log("paypal");
                let payment_gateway = document.createElement('input')
                payment_gateway.setAttribute('type','hidden')
                payment_gateway.setAttribute('name', 'payment_gateway')
                payment_gateway.setAttribute('value', 'paypal')

                form.append(payment_gateway)
                form.submit();
            }
        });

        $(".back_button").on("click", back);
        $(".first_next_btn").on("click",validFields);
        $(".second_next_btn").on("click",validPaymentFields);
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
       $('input[name=additional_billing]').on('change',function(){
            input_value_billing = $('input[name=additional_billing]:checked').val();
            if(input_value_billing == 'drop'){
                $('#additional_billing_address').show();
                $('#addres_detail').show();
                $('#addres_detail_head').show();
            } else {
                $('#additional_billing_address').hide();
                $('#addres_detail').hide();
                $('#addres_detail_head').hide();
            }
       });
       $('input[name=payment_method]').on('change',function(){
            input_value_payment = $('input[name=payment_method]:checked').val();
            $('.paylatter_wrapper').removeClass('active');
            main_div = $(this).closest('.paylatter_wrapper');
            main_div.addClass('active');
            if(input_value_payment == 'paypal'){
                $('#payment_details').hide();
            } else {
                $('#payment_details').show();
            }
            updatePaymentInfo(input_value_payment);
       });
       $('input[name=delivery_type]').on('change',function(){
            input_value_shipping = $('input[name=delivery_type]:checked').val();
            grand_total = $('#totalprice').data('price');
            if(input_value_shipping == 'express'){
                $('#shipping_price').text('£5');
                $('#totalprice').text('£'+(5+parseInt(grand_total)));
            } else {
                $('#shipping_price').text('£8');
                $('#totalprice').text('£'+(8+parseInt(grand_total)));
            }
       });
    });
    function updatePaymentInfo(method) {
        var info = $('#payment-info');
        info.empty(); 

        if (method === 'paypal') {
            html_payment_data = `<div class="img-text-wrap">
                                    <img id="card-image" class="logo paypal-logo" src="{{ asset("front/img/paypal.png") }}" alt="PayPal Logo">
                                    <p id="payment-text" >Pay with PayPal</p>
                                </div>
                                <span class="edit-icon-span"><i class="fa-solid fa-pen"></i></span>`;

            info.append(html_payment_data);
        } else if (method === 'stripe') { 
            html_payment_data = `<div class="img-text-wrap">
                                    <img class="logo stripe-logo" src="" alt="Stripe Logo" id="card-image">
                                    <p id="payment-text">Pay with visa</p>
                                </div>
                                <span class="edit-icon-span"><i class="fa-solid fa-pen"></i></span>`;

            info.append(html_payment_data);
        }
    }
</script>
<script>
    document.querySelector('.toggle-collapse').addEventListener('click', function () {
        var panel = document.querySelector('.panel-collapse');
        panel.classList.toggle('open');
    });
</script>

<script>
    function login(){
        url = "{{ url('checkout') }}";
        location.href = `{{ url('login') }}?url=${url}`;
    }

    function register(){
        url = "{{ url('checkout') }}";
        location.href = `{{ url('register') }}?url=${url}`;
    }
 

</script>
<script>
    $(document).ready(function(){
        // $('.shippingAddresWrap').show();
        $('.edit_btn').on('click',function(){
            $('.shippingAddresWrap').show();
            $('#user_address_div').hide();
            $('.cancel_btn').show();
            $('#AddNewAddress').hide();
            let userId = $(this).data('id');

            $.ajax({
                url:'{{route('address.checkout.page')}}',
                type:'GET',
                data:{id:userId, _token: '{{ csrf_token() }}'},
                success:function(response){
                    var userAddress = response.userAddress;
                    $('.id').val(userAddress.id);
                    $('.first_name').val(userAddress.first_name);
                    $('.last_name').val(userAddress.last_name);
                    $('.email').val(userAddress.email);
                    $('.company_name').val(userAddress.company_name);
                    $('.phone_number').val(userAddress.phone_number);
                    $('.address').val(userAddress.address);
                    $('.additional_address').val(userAddress.additional_address);
                    $('.zip_code').val(userAddress.zip_code);
                    $('.city').val(userAddress.city);
                    $('.state').val(userAddress.state);
                    $('.country').val(userAddress.country);  
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });    
           
        });
    });
    $('#AddNewAddress').on('click',function(){
        $('#address_type').val('new');
        $('.shippingAddresWrap').show();
        $('#user_address_div').hide();
        $('.check_user_ship_addre').hide();
        $('.cancel_btn').show();
        $('#user_address_checkout input[type="text"], #user_address_checkout input[type="email"],#user_address_checkout input[type="number"],#user_address_checkout input[type="textarea"]').val('');
        $('#user_address_checkout select').prop('selectedIndex', 0);
    });
    $(document).ready(function() {
        $('#check_box').change(function() {
            if(!this.checked) {
                $('#user_address').show();
            }else{
                $('#user_address').hide();
            }    
        });
        $('.cancel_btn').on('click',function(){
            $('#address_type').val('old');
            $(this).closest('.ship-wrap').find('.user_id').val('');
            $('.shippingAddresWrap').hide();
            $('#user_address_div').show();
            $('.check_user_ship_addre').show();
            $('.cancel_btn').hide();
            $('#AddNewAddress').show();   
        });
        $('.edit_btn_billing_address').on('click',function(){
            $('#user_billing_address_change').show();
            // $('#additional_billing_user').show();
            $('.cancel_btn').show();
        });
        $('#cancel_btn_billing').on('click',function(){
            $('#user_billing_address_change').hide();
            // $('#additional_billing_user').hide();
            // $(this).closest('#user_billing_address_change').find('.user_id').val('');
        });
    });
    // $(document).ready(function(){
    //     $('#submitFormBtn').on('click', function(e) {
    //         e.preventDefault(); 
    //         var formData = {
    //             id:          $('.id').val(),
    //             first_name: $('#first_name').val(),
    //             last_name: $('#last_name').val(),
    //             phone: $('#phone').val(),
    //             email: $('#email').val(),
    //             company_name: $('#company_name').val(),
    //             address_line: $('#address_line').val(),
    //             street: $('#street_addr').val(),
    //             city: $('#city').val(),
    //             state: $('#state').val(),
    //             zip_code: $('#zip_code').val(),
    //             country: $('#country').val()
                
    //         };

    //         $.ajax({
    //             url: 'checkout/billing/address',
    //             type: 'POST',
    //             dataType: 'json',
    //             data: { address: formData ,_token: '{{ csrf_token() }}'},
    //             success: function(response) {
    //                 window.location.href = 'checkout';
    //                 // Handle success response here
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error(xhr.responseText);
    //                 // Handle error response here
    //             }
    //         });
    //     });
    // });

</script>

@endsection