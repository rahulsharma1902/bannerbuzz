@extends('front_layout.master') @section('content')

<section class="order-detail-sec">
    <div class="container">
        <div class="order-detail-content">
            <div class="row">
                <div class="col-xl-9">
                    <div class="lft-content">
                        <div class="card">
                            <div class="card-header">
                                <div class="order-main-hd">
                                    <h5>Order #{{ $order->order_number }}</h5>
                                    <div class="invc-bttn">
                                        <a href="{{ url('user-dashboard/orders') }}" class="btn-ryt">
                                            <i class="fa fa-arrow-left"></i>
                                            Back
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
                                            @foreach (json_decode($order->user_order_data) as $id )
                                                @php
                                                    $data = App\Models\UserOrderDesign::find($id);
                                                @endphp
                                                @if($data->product_type != 'accessories')
                                                    <tr>
                                                        <td>
                                                            <div class="product-detl">
                                                                <div class="product-img">
                                                                    @if($data->design_method == 'Artwork')
                                                                        <?php $count = 0; ?> 
                                                                        @foreach(json_decode($data->images,true) as $index => $value)
                                                                            @if($count == 0)
                                                                                <img class="img-fluid" src="{{ asset('designImage/'.$value) }}">
                                                                            @endif
                                                                            <?php  $count++ ?>
                                                                        @endforeach
                                                                    @elseif($data->design_method == 'ArtworkLater')
                                                                        <img class="img-fluid" src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                    @elseif($data->design_method == 'hireDesigner')
                                                                        @foreach (json_decode($data->product->images) as $index => $image)
                                                                            @if ($index == 0)
                                                                                <img class="img-fluid" src="{{ asset('product_Images') }}/{{ $image }}">
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <img class="img-fluid" src="{{ asset('designImage/'.$data->images) }}">
                                                                    @endif
                                                                </div>
                                                                <div class="product-text">
                                                                    <h5>
                                                                        {{ $data->product->name ?? '' }}
                                                                    </h5>
                                                                    <?php $design_var_data = json_decode($data->variations,true); ?>
                                                                    @foreach($data->product->variations as $variation)  
                                                                        @if ($variation->variationData->isNotEmpty())  
                                                                            @foreach($design_var_data as $key => $value)
                                                                                @if($key == $variation->var_slug)
                                                                                    @foreach ($variation->variationData as $Vardata)
                                                                                        @if($value == $Vardata->id)
                                                                                        <p>{{ $key }} :<span class="fw-medium"> {{ $Vardata->value }}</span></p>
                                                                                            <?php $variation_price [] = $Vardata->price; ?>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    @if($data->size_id != null)
                                                                        @foreach($data->product->sizes as $size)
                                                                            @if($size->id == $data->size_id)
                                                                            @php
                                                                                $value = $data->dimension;
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
                                                                                <p >Size (W X H): <span class="fw-medium">{{ $converted_width }}X{{ $converted_height }} ({{ $data->dimension }})</span></p>
                                                                                <?php $size_price = $size->price; ?>
                                                                            @endif
                                                                        @endforeach
                                                                    @elseif($data->width != null && $data->height != null )
                                                                        @php
                                                                            $value = $data->dimension;
                                                                            if ($value == 'In') {
                                                                                $unit_value = 12;
                                                                            } else if ($value == 'Cm') {
                                                                                $unit_value = 30;
                                                                            } else if ($value == 'Mm') {
                                                                                $unit_value = 304;
                                                                            } else if ($value == 'Ft') {
                                                                                $unit_value = 1;
                                                                            }

                                                                            $product_price = $data->product->price;
                                                                            $price_pre_unit = ($product_price / $unit_value) / 2;
                                                                            $size_price = round(($data->width + $data->height) * $price_pre_unit);
                                                                            
                                                                        @endphp
                                                                        <p >Size (W X H): <span class="fw-medium">{{ $data->width }} x {{ $data->height }} ({{ $data->dimension }})</span></p>
                                                                    @else
                                                                        <?php $size_price = $data->product->price; ?>
                                                                    @endif
                                                                    @php
                                                                        $var_price = array_sum($variation_price);
                                                                        $total_without_qty = $size_price + $var_price;
                                                                        $total =( $size_price + $var_price) * $data->qty;
                                                                        if($data->design_method == 'hireDesigner') {
                                                                            $total += 10;
                                                                        }
                                                                    @endphp
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>£{{ $data->price }}</td>
                                                        <td>{{ $data->qty ?? '' }}</td>
                                                        <td class="fw-medium text-end">
                                                            £{{ $data->total_price }}
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>
                                                            <div class="product-detl">
                                                                <div class="product-img">
                                                                    @if($data->accessorie)
                                                                        <?php $count = 0; ?> 
                                                                        
                                                                        @foreach(json_decode($data->accessorie->images,true) as $index => $value)
                                                                            @if($count == 0)
                                                                                <img class="img-fluid" src="{{ asset('accessories_Images/'.$value) }}">
                                                                            @endif
                                                                            <?php  $count++ ?>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <?php $design_var_data = json_decode($data->variations,true); ?>
                                                                <div class="product-text">
                                                                    <h5 >{{ $data->accessorie->name ?? '' }}</h5>
                                                                    @foreach($data->accessorie->variations as $variation)  
                                                                        @if ($variation->variationData->isNotEmpty())  
                                                                            @foreach($design_var_data as $key => $value)
                                                                                @if($key == $variation->var_slug)
                                                                                    @foreach ($variation->variationData as $Vardata)
                                                                                        @if($value == $Vardata->id)
                                                                                        <p >{{ $key }} :<span class="fw-medium"> {{ $Vardata->value }}</span></p>
                                                                                            <?php $variation_price [] = $Vardata->price; ?>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    @if($data->size_id != null)
                                                                        @foreach($data->accessorie->sizes as $size)
                                                                            @if($size->id == $data->size_id)
                                                                            @php
                                                                                $value = $data->dimension;
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
                                                                                <p >Size (W X H): <span class="fw-medium">{{ $converted_width }}X{{ $converted_height }} ({{ $data->dimension }})</span></p>
                                                                                <?php $size_price = $size->price; ?>
                                                                            @endif
                                                                        @endforeach
                                                                    @elseif($data->width != null && $data->height != null )
                                                                        @php
                                                                            $value = $data->dimension;
                                                                            if ($value == 'In') {
                                                                                $unit_value = 12;
                                                                            } else if ($value == 'Cm') {
                                                                                $unit_value = 30;
                                                                            } else if ($value == 'Mm') {
                                                                                $unit_value = 304;
                                                                            } else if ($value == 'Ft') {
                                                                                $unit_value = 1;
                                                                            }

                                                                            $product_price = $data->accessorie->price;
                                                                            $price_pre_unit = ($product_price / $unit_value) / 2;
                                                                            $size_price = round(($data->width + $data->height) * $price_pre_unit);
                                                                            
                                                                        @endphp
                                                                        <p >Size (W X H): <span class="fw-medium">{{ $data->width }} x {{ $data->height }} ({{ $data->dimension }})</span></p>
                                                                    @else
                                                                        <?php $size_price = $data->accessorie->price; ?>
                                                                    @endif
                                                                    @php
                                                                        $var_price = array_sum($variation_price);
                                                                        $total_without_qty = $size_price + $var_price;
                                                                        $total =( $size_price + $var_price) * $data->qty;
                                                                        if($data->design_method == 'hireDesigner') {
                                                                            $total += 10;
                                                                        }
                                                                    @endphp
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>£{{ $data->price }}</td>
                                                        <td>{{ $data->qty ?? '' }}</td>
                                                        <td class="fw-medium text-end">
                                                        £{{ $data->total_price }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr class="totl">
                                                <td colspan="3"></td>
                                                <td colspan="2" class="fw-medium p-0">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td>Sub Total :</td>
                                                                <td class="text-end">£{{ $order->product_price }}</td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>Discount <span class="text-muted">(VELZON15)</span> : :</td>
                                                                <td class="text-end">-$53.99</td>
                                                            </tr> -->
                                                            <tr>
                                                                <td>Shipping Charge :</td>
                                                                <td class="text-end">£{{ $order->shipping_charges ?? '00' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estimated Tax :</td>
                                                                <td class="text-end">£{{ $order->additional_charges ?? '00' }}</td>
                                                            </tr>
                                                            <tr class="totl-pay">
                                                                <th scope="row">Total (GBP) :</th>
                                                                <th class="text-end">£{{ $order->total_price ?? '00' }}</th>
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
                    <div class="custmer-details">
                        <div class="custm-hd-text custm-hdnew">
                            <span><i class="fa-brands fa-paypal"></i></span>
                            <h5>Payment Details</h5>
                        </div>
                        <div class="custmer-info">
                            <div class="pymnt-detl d-flex align-items-center">
                                <p>Transactions:</p>
                                <h6>#{{ $order->payment->transaction_id ?? '' }}</h6>
                            </div>
                            <div class="pymnt-detl d-flex align-items-center">
                                <p>Payment Method:</p>
                                <h6>{{ $order->payment->payment_method ?? '' }}</h6>
                            </div>
                            <!-- <div class="pymnt-detl d-flex align-items-center">
                                <p>Card Holder Name:</p>
                                <h6>Joseph Parker</h6>
                            </div>
                            <div class="pymnt-detl d-flex align-items-center">
                                <p>Card Number:</p>
                                <h6>xxxx xxxx xxxx 2456</h6>
                            </div> -->
                            <div class="pymnt-detl d-flex align-items-center">
                                <p>Total Amount:</p>
                                <h6>£{{ $order->total_price ?? '00' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="ryt-content">
                        <div class="custmer-details">
                            <div class="custm-hd-text">
                                <h5>Customer Details</h5>
                                <!-- <div class="vw-profile">
                                    <a href="#">View Profile</a>
                                </div> -->
                            </div>
                            <div class="custmer-info">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="custm-text d-flex align-items-center">
                                            <div class="custmr-img">
                                                <img src="https://cre8iveprinter.cre8iveprinter.co.uk/Site_Images/odr_cmplt.png" class="img-fluid" />
                                            </div>
                                            <div class="custmr-name">
                                                <h6>{{ $order->user->first_name  ??''}} {{ $order->user->last_name ?? ''}}</h6>
                                                <p class="mb-0">Customer</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custm-text d-flex align-items-center">
                                            <i class="fa-solid fa-envelope"></i>
                                            <a >{{ $order->user->email ?? '' }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custm-text d-flex align-items-center">
                                            <i class="fa-solid fa-phone"></i>
                                            <a >{{ $order->user->number ?? '' }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if(isset($order->BillingAddress) && $order->BillingAddress != null)
                            <div class="custmer-details">
                                <div class="custm-hd-text custm-hdnew">
                                    <span><i class="fa-solid fa-location-dot"></i></span>
                                    <h5>Billing Address</h5>
                                </div>
                                <div class="custmer-info">
                                    <ul class="list-unstyled">
                                        <li class="drk-text">{{ $order->BillingAddress->first_name ?? '' }} {{ $order->BillingAddress->last_name ?? '' }}</li>
                                        <li>{{ $order->BillingAddress->phone_number ?? '' }}</li>
                                        <li>{{ $order->BillingAddress->company_name ?? '' }}</li>
                                        <li>{{ $order->BillingAddress->address ?? '' }} {{ $order->BillingAddress->additional_address ?? '' }} {{ $order->BillingAddress->city ?? '' }} </li>
                                        <li>{{ $order->BillingAddress->state ?? '' }} - {{ $order->BillingAddress->zip_code ?? '' }} </li>
                                        <li>{{ countryName($order->BillingAddress->country) }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if(isset($order->ShipingAddress) && $order->ShipingAddress != null)
                            <div class="custmer-details">
                                <div class="custm-hd-text custm-hdnew">
                                    <span><i class="fa-solid fa-location-dot"></i></span>
                                    <h5>Shipping Address</h5>
                                </div>
                                <div class="custmer-info">
                                    <ul class="list-unstyled">
                                        <li class="drk-text">{{ $order->ShipingAddress->first_name ?? '' }} {{ $order->ShipingAddress->last_name ?? '' }}</li>
                                        <li>{{ $order->ShipingAddress->phone_number ?? '' }}</li>
                                        <li>{{ $order->ShipingAddress->company_name ?? '' }}</li>
                                        <li>{{ $order->ShipingAddress->address ?? '' }} {{ $order->ShipingAddress->additional_address ?? '' }} {{ $order->ShipingAddress->city ?? '' }} </li>
                                        <li>{{ $order->ShipingAddress->state ?? '' }} - {{ $order->ShipingAddress->zip_code ?? '' }} </li>
                                        <li>{{ countryName($order->ShipingAddress->country) }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
