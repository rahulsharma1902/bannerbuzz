@extends('admin_layout.master')
@section('content')


<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Order #{{ $order->order_number }}</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Product Details</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Design Method</th>
                                <th scope="col" class="text-end">Total Amount</th>
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
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    @if($data->design_method == 'Artwork')
                                                        <?php $count = 0; ?> 
                                                        
                                                        @foreach(json_decode($data->images,true) as $index => $value)
                                                            @if($count == 0)
                                                                <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('designImage/'.$value) }}">
                                                            @endif
                                                            <?php  $count++ ?>
                                                        @endforeach
                                                    @elseif($data->design_method == 'ArtworkLater')
                                                        <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                    @elseif($data->design_method == 'hireDesigner')
                                                        @foreach (json_decode($data->product->images) as $index => $image)
                                                            @if ($index == 0)
                                                                <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('product_Images') }}/{{ $image }}">
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('designImage/'.$data->images) }}">
                                                    @endif
                                                </div>
                                                <?php $design_var_data = json_decode($data->variations,true); ?>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15">{{ $data->product->name ?? '' }}</h5>
                                                    @foreach($data->product->variations as $variation)  
                                                        @if ($variation->variationData->isNotEmpty())  
                                                            @foreach($design_var_data as $key => $value)
                                                                @if($key == $variation->var_slug)
                                                                    @foreach ($variation->variationData as $Vardata)
                                                                        @if($value == $Vardata->id)
                                                                        <p class="text-muted mb-0">{{ $key }} :<span class="fw-medium"> {{ $Vardata->value }}</span></p>
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
                                                                <p class="text-muted mb-0">Size (W X H): <span class="fw-medium">{{ $converted_width }}X{{ $converted_height }} ({{ $data->dimension }})</span></p>
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
                                                        <p class="text-muted mb-0">Size (W X H): <span class="fw-medium">{{ $data->width }} x {{ $data->height }} ({{ $data->dimension }})</span></p>
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
                                        <td>{{ $data->design_method ?? '' }}</td>
                                        <td class="fw-medium text-end">
                                        £{{ $data->total_price }}
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    @if($data->accessorie)
                                                        <?php $count = 0; ?> 
                                                        
                                                        @foreach(json_decode($data->accessorie->images,true) as $index => $value)
                                                            @if($count == 0)
                                                                <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('accessories_Images/'.$value) }}">
                                                            @endif
                                                            <?php  $count++ ?>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <?php $design_var_data = json_decode($data->variations,true); ?>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15">{{ $data->accessorie->name ?? '' }}</h5>
                                                    @foreach($data->accessorie->variations as $variation)  
                                                        @if ($variation->variationData->isNotEmpty())  
                                                            @foreach($design_var_data as $key => $value)
                                                                @if($key == $variation->var_slug)
                                                                    @foreach ($variation->variationData as $Vardata)
                                                                        @if($value == $Vardata->id)
                                                                        <p class="text-muted mb-0">{{ $key }} :<span class="fw-medium"> {{ $Vardata->value }}</span></p>
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
                                                                <p class="text-muted mb-0">Size (W X H): <span class="fw-medium">{{ $converted_width }}X{{ $converted_height }} ({{ $data->dimension }})</span></p>
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
                                                        <p class="text-muted mb-0">Size (W X H): <span class="fw-medium">{{ $data->width }} x {{ $data->height }} ({{ $data->dimension }})</span></p>
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
                                        <td>{{ $data->design_method ?? '' }}</td>
                                        <td class="fw-medium text-end">
                                        £{{ $data->total_price }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr class="border-top border-top-dashed">
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
                                            <tr class="border-top border-top-dashed">
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
    <!--end col-->
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">{{ $order->user->first_name  ??''}} {{ $order->user->last_name ?? ''}}</h6>
                                <p class="text-muted mb-0">Customer</p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $order->user->email ?? '' }}</li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $order->user->number ?? '' }}</li>
                </ul>
            </div>
        </div>
        <!--end card-->
        @if(isset($order->BillingAddress) && $order->BillingAddress != null)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing Address</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack fs-13 mb-0">
                        <li class="fw-medium fs-14">{{ $order->BillingAddress->first_name ?? '' }} {{ $order->BillingAddress->last_name ?? '' }}</li>
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
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping Address</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14">{{ $order->ShipingAddress->first_name ?? '' }} {{ $order->ShipingAddress->last_name ?? '' }}</li>
                        <li>{{ $order->ShipingAddress->phone_number ?? '' }}</li>
                        <li>{{ $order->ShipingAddress->company_name ?? '' }}</li>
                        <li>{{ $order->ShipingAddress->address ?? '' }} {{ $order->ShipingAddress->additional_address ?? '' }} {{ $order->ShipingAddress->city ?? '' }} </li>
                        <li>{{ $order->ShipingAddress->state ?? '' }} - {{ $order->BillingAddress->zip_code ?? '' }} </li>
                        <li>{{ countryName($order->ShipingAddress->country) }}</li>
                    </ul>
                </div>
            </div>
        @endif

        <!-- <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Payment Details</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Transactions:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">#{{ $order->payment->transaction_id  ?? ''}}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Payment Method:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">{{ $order->payment->payment_method ?? '' }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Card Holder Name:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">Joseph Parker</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Card Number:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Total Amount:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">$415.96</h6>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection