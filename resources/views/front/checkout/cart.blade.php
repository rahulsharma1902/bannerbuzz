@extends('front_layout.master')
@section('content')
    <section class="checkout-sec p_100">
        <div class="container">
            <div class="wrapper">
                <h3>Shopping Basket</h3>
                @if(isset($allBasket) && $allbasket->isNotEmpty())
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
                                <div class="shop-basket">
                                    <div class="basket-top">
                                        <h4>Your Basket: {{ $total }} Items</h4>
                                        <span><a href="{{ url('/') }}">Continue Shopping</a></span>
                                    </div>

                                    <div class="basket-table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product Detail</th>
                                                    <th>Size</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allbasket as $basket)
                                                    <tr class="basket-items-list">
                                                        <td>
                                            
                                                            <div class="prdt">
                                                                <div class="prdt-img">
                                                                    @if($basket->design->design_method == 'Artwork')
                                                                        <?php $count = 0; ?> 
                                                                        @foreach(json_decode($basket->design->image,true) as $index => $value)
                                                                            @if($count == 0)
                                                                                <img src="{{ asset('designImage/'.$value) }}">
                                                                            @endif
                                                                            <?php  $count++ ?>
                                                                        @endforeach
                                                                    @elseif($basket->design_method == 'ArtworkLater')
                                                                        <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                    @else
                                                                        <img src="{{ asset('designImage/'.$basket->design->image) }}">
                                                                    @endif
                                                                </div>
                                                                <div class="prdt-name">
                                                                <?php $variation_price = [] ; ?>
                                                                    <h6>{{ $basket->design->product->name ?? '' }} <br>
                                                                        @foreach($basket->design->product->variations as $variation)  
                                                                            @if ($variation->variationData->isNotEmpty())  
                                                                                @foreach(json_decode($basket->design->variations) as $key => $value)
                                                                                    @if($key == $variation->var_slug)
                                                                                        @foreach ($variation->variationData as $data)
                                                                                            @if($value == $data->id)
                                                                                                {{ $key }} : {{ $data->value }}
                                                                                                <?php $variation_price [] = $data->price; ?>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @if($basket->design->size_id != null)
                                                            @foreach($basket->design->product->sizes as $size)
                                                                @if($size->id == $basket->design->size_id)
                                                                    <td>Size (W X H): {{ $size->size_value }} ({{ $basket->design->dimension }})</td>
                                                                    <?php $size_price = $size->price; ?>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <td>Size (W X H): {{ $basket->design->width }} x {{ $basket->design->height }} ({{ $basket->design->dimension }})</td>
                                                            <?php $size_price = $basket->price; ?>
                                                        @endif
                                                        <td>
                                                            <div class="quantity">
                                                                <span class="minus">-</span>
                                                                <input type="text" value="{{ $basket->qty }}">
                                                                <span class="plus">+</span>
                                                            </div>
                                                        </td>
                                                        @php
                                                            $var_price = array_sum($variation_price);
                                                            $total =( $size_price + $var_price) * $basket->qty;
                                                        @endphp
                                                        <td>£{{ $total }}</td>
                                                        <td>
                                                            <div class="edit">
                                                                <span><a href="{{ url('review/designtool') }}/{{ $basket->design_id }}"></a><i class="fa-solid fa-pencil"></i></span>
                                                                <span class="remove-design" data-id="{{ $basket->id ?? '' }}" ><i class="fa-solid fa-xmark"></i></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="basket-rgt">
                                    <div class="ylw-bar">
                                        <h6>Shop for $85.02 more and grab your free shipping now.</h6>
                                    </div>
                                    <div class="check">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Proof Request
                                            </label>
                                            <div class="req">
                                                <span><i class="fa-solid fa-circle-question"></i></span>
                                                <div class="req-info">
                                                    <div class="tooltipBody">
                                                        <p>After your order is placed, we’ll send you a link to the proof. Just
                                                            review the design proof and approve it online to process the order.
                                                            This makes sure you are delivered what you expect.</p>
                                                        <ul class="fancyCheck">
                                                            <li><strong>If proofing is not requested</strong><br>Your
                                                                satisfaction is the most important factor for us. Hence, every
                                                                design is proofed, and a notification is sent out if the
                                                                uploaded art is not optimal for printing.</li>
                                                            <li><strong>If proofing is requested</strong><br>We take a day or
                                                                two extra, just to make sure your request is fully attended to.
                                                                The updated delivery date will show up at the time of
                                                                proof-approval.</li>
                                                            <li><strong>In case of overnight orders</strong><br>Now if it’s at
                                                                such a short notice, we understand your urgency and avoid the
                                                                proofing process entirely. Make sure you upload the right file
                                                                though!</li>
                                                            <li>Keep in mind that in all cases where proof is sent, the actual
                                                                delivery date depends on the proof approval date.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coupon">
                                        <h6>Apply Discount Code</h6>
                                        <form action="">
                                            <input type="text" name="" id="" placeholder="Enter coupon code here">
                                            <a href="javascript:void(0)" class="btn light_dark">Apply</a>
                                        </form>
                                        <div class="popup">
                                            <span onclick="openNav()">Available Offers</span>
                                            <div id="mySidenav" class="sidenav">
                                                <div class="popup-top">
                                                    <h5>Available Offers</h5>
                                                    <a href="javascript:void(0)" class="closebtn"
                                                        onclick="closeNav()">&times;</a>
                                                </div>
                                                <div class="formsec">
                                                    <div class="FormPad">
                                                        <div class="form">
                                                            <div class="formGroup"><input type="Text" name="couponCode"
                                                                    aria-label="couponCode" placeholder="Enter coupon code here"
                                                                    value=""></div>
                                                        </div><button type="button" class="btn light_dark">Apply</button>
                                                    </div>
                                                    <div class="sc-c5702937-0 ikiSAq summaryBoxMain">
                                                        <div class="couponcodesection">
                                                            <div class="Couponcodename"><a class="CouponName">FATHER</a><a
                                                                    class="CouponApplyLink">Apply</a></div>
                                                            <div class="CouponcodeText">
                                                                <h5>Custom Displays</h5><span>Up to 30% Off. Max Discount £100.
                                                                    T&amp;C Apply</span>
                                                            </div>
                                                        </div>
                                                        <div class="couponcodesection">
                                                            <div class="Couponcodename"><a class="CouponName">15CART</a><a
                                                                    class="CouponApplyLink">Apply</a></div>
                                                            <div class="CouponcodeText">
                                                                <h5>Extra Save</h5><span>15% off Sitewide. Max Discount - $75.
                                                                    T&amp;C Apply
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="couponcodesection">
                                                            <div class="Couponcodename"><a class="CouponName">NEWUSER</a><a
                                                                    class="CouponApplyLink">Apply</a></div>
                                                            <div class="CouponcodeText">
                                                                <h5>Welcome Offer</h5><span>20% off on First Order. Max Cap £50.
                                                                    T&amp;C Apply.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart_shipp">
                                        <ul>
                                            <li>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected="">Estimate Shipping</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </li>
                                            <li>
                                                <div class="shipping_content">
                                                    <p>Subtotal</p>
                                                    <span>$6.99</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shipping_content">
                                                    <p>Shipping <span>(Estimated delivery Thu, Feb <br> 1st 2024 -
                                                            Express)</span></p>
                                                    <span>$5.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shipping_content">
                                                    <p>VAT</p>
                                                    <span>$1.40</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shipping_content grand">
                                                    <p>Grand Total:</p>
                                                    <span>$13.39</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-btm">
                                        <a href="javascript:void(0)" class="btn light_dark">Proceed to checkout</a>
                                        <span>or</span>
                                        <a href="javascript:void(0)" class="img-btn"><img
                                                src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/pwa.png" alt=""></a>
                                        <a href="javascript:void(0)" class="amz">Use Your Amazon Account <span><i
                                                    class="fa-solid fa-circle-question"></i></a>
                                    </div>
                                </div>
                                <div class="secure">
                                    <div class="secure-img">
                                        <img src="https://cre8iveprinter.cre8iveprinter.co.uk/front/img/vec.png" alt="">
                                    </div>
                                    <p>Secure Credit Card Payment This is a secure 128-bit SSL encrypted payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="cart-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="shop-basket">
                                    <div class="basket-top">
                                        <h4>Your Basket: {{ $total }} Items</h4>
                                        <span><a href="{{ url('/') }}">Continue Shopping</a></span>
                                    </div>
                                    <p>Your basket is empty <a href="{{ url('/') }}">Go to homepage</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('.remove-design').on('click',async function(){
                basket_id = $(this).data('id');
                if(basket_id != undefined && basket_id != null){
                    remove_basket = await removeBasketItem(basket_id);
                    if(remove_basket == true){
                        $(this).closest('tr').remove();
                    }
                } 
            });
        });
        async function removeBasketItem(basket_id){
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url('remove-item-from-basket') }}",
                    type: 'GET',
                    data: {
                        'item_id' : basket_id,
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
    </script>
    <script>
        function openNav() {
            var sidenav = document.getElementById("mySidenav");
            if (window.innerWidth <= 576) {  // Mobile screen size
                sidenav.style.width = "320px";  // Width for mobile
            } else {
                sidenav.style.width = "400px";  // Width for larger screens
            }
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        // Close the sidenav if the user clicks anywhere outside of it
        document.addEventListener('click', function (event) {
            var sidenav = document.getElementById("mySidenav");
            if (sidenav.style.width !== "0px" && !sidenav.contains(event.target) && event.target.closest('span[onclick="openNav()"]') === null) {
                closeNav();
            }
        });
    </script>
@endsection
    