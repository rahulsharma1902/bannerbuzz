@extends('front_layout.master') @section('content')

<section class="order-detail-sec">
    <div class="container">
        <div class="order-detail-content">
            <div class="row">
                <div class="col-lg-9">
                    <div class="lft-content">
                        <div class="card">
                            <div class="card-header">
                                <div class="order-main-hd">
                                    <h5>Order #VL2667</h5>
                                    <div class="invc-bttn">
                                        <a href="#" class="btn-ryt">
                                            <i class="fa-solid fa-download"></i>
                                            Invoice
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="order-products">
                                    <table class="all-products">
                                        <thead>
                                            <tr>
                                                <th>Product Details</th>
                                                <th>Item Price</th>
                                                <th>Quantity</th>
                                                <th class="text-end">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="product-detl">
                                                        <div class="product-img">
                                                            <img src="https://cre8iveprinter.cre8iveprinter.co.uk/Site_Images/odr_cmplt.png" class="img-fluid" />
                                                        </div>
                                                        <div class="product-text">
                                                            <h5>
                                                                <a href="#" class="product_link">Sweatshirt for Men (Pink)</a>
                                                            </h5>
                                                            <p>Color: <span class="fw-medium">Pink</span></p>
                                                            <p>Size: <span class="fw-medium">M</span></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$119.99</td>
                                                <td>02</td>

                                                <td class="fw-medium text-end">
                                                    $239.98
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-detl">
                                                        <div class="product-img">
                                                            <img src="https://cre8iveprinter.cre8iveprinter.co.uk/Site_Images/odr_cmplt.png" class="img-fluid" />
                                                        </div>
                                                        <div class="product-text">
                                                            <h5>
                                                                <a href="#" class="product_link">Sweatshirt for Men (Pink)</a>
                                                            </h5>
                                                            <p>Color: <span class="fw-medium">Black</span></p>
                                                            <p>Size: <span class="fw-medium">32.5mm</span></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$94.99</td>
                                                <td>02</td>

                                                <td class="fw-medium text-end">
                                                    $94.99
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-detl">
                                                        <div class="product-img">
                                                            <img src="https://cre8iveprinter.cre8iveprinter.co.uk/Site_Images/odr_cmplt.png" class="img-fluid" />
                                                        </div>
                                                        <div class="product-text">
                                                            <h5>
                                                                <a href="#" class="product_link">
                                                                    Noise NoiseFit Endure Smart Watch
                                                                </a>
                                                            </h5>
                                                            <p>Color: <span class="fw-medium">White</span></p>
                                                            <p>Size: <span class="fw-medium">350 ml</span></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$24.99</td>
                                                <td>02</td>

                                                <td class="fw-medium text-end">
                                                    $24.99
                                                </td>
                                            </tr>
                                            <tr class="totl">
                                                <td colspan="3"></td>
                                                <td colspan="2" class="fw-medium p-0">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td>Sub Total :</td>
                                                                <td class="text-end">$359.96</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Discount <span class="text-muted">(VELZON15)</span> : :</td>
                                                                <td class="text-end">-$53.99</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shipping Charge :</td>
                                                                <td class="text-end">$65.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estimated Tax :</td>
                                                                <td class="text-end">$44.99</td>
                                                            </tr>
                                                            <tr class="totl-pay">
                                                                <th scope="row">Total (USD) :</th>
                                                                <th class="text-end">$415.96</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ryt-content">
                        <div class="custmer-details">
                            <div class="custm-hd-text">
                                <h5>Customer Details</h5>
                                <div class="vw-profile">
                                    <a href="#">View Profile</a>
                                </div>
                            </div>
                            <div class="custmer-info">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="custm-text d-flex align-items-center">
                                            <div class="custmr-img">
                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/Site_Images/odr_cmplt.png" class="img-fluid" />
                                            </div>
                                            <div class="custmr-name">
                                                <h6>Joseph Parkers</h6>
                                                <p class="mb-0">Customer</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custm-text d-flex align-items-center">
                                            <i class="fa-solid fa-envelope"></i>
                                            <a href="mailto:josephparker@gmail.com">josephparker@gmail.com</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custm-text d-flex align-items-center">
                                            <i class="fa-solid fa-phone"></i>
                                            <a href="callto: +(256) 245451 441">+(256) 245451 441</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="custmer-details">
                            <div class="custm-hd-text custm-hdnew">
                                <span><i class="fa-solid fa-location-dot"></i></span>
                                <h5>Billing Address</h5>
                            </div>
                            <div class="custmer-info">
                                <ul class="list-unstyled">
                                    <li>Joseph Parker</li>
                                    <li>+(256) 245451 451</li>
                                    <li>2186 Joyce Street Rocky Mount</li>
                                    <li>New York - 25645</li>
                                    <li>United States</li>
                                </ul>
                            </div>
                        </div>

                         <div class="custmer-details">
                            <div class="custm-hd-text custm-hdnew">
                                <span><i class="fa-solid fa-location-dot"></i></span>
                                <h5>Shipping Address</h5>
                            </div>
                            <div class="custmer-info">
                                <ul class="list-unstyled">
                                        <li>Joseph Parker</li>
                                        <li>+(256) 245451 451</li>
                                        <li>2186 Joyce Street Rocky Mount</li>
                                        <li>California - 24567</li>
                                        <li>United States</li>
                                    </ul>
                            </div>
                        </div>

                         <div class="custmer-details">
                            <div class="custm-hd-text custm-hdnew">
                                <span><i class="fa-brands fa-paypal"></i></i></span>
                                <h5>Payment Details</h5>
                            </div>
                            <div class="custmer-info">
                               <div class="pymnt-detl d-flex align-items-center">
                                   <p>Transactions:</p>
                                   <h6>#VLZ124561278124</h6>
                               </div>
                               <div class="pymnt-detl d-flex align-items-center">
                                   <p>Payment Method:</p>
                                   <h6>Debit Card</h6>
                               </div>
                               <div class="pymnt-detl d-flex align-items-center">
                                   <p>Card Holder Name:</p>
                                   <h6>Joseph Parker</h6>
                               </div>
                               <div class="pymnt-detl d-flex align-items-center">
                                   <p>Card Number:</p>
                                   <h6>xxxx xxxx xxxx 2456</h6>
                               </div>
                               <div class="pymnt-detl d-flex align-items-center">
                                   <p>Total Amount:</p>
                                   <h6>$415.96</h6>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
