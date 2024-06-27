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
                                <th scope="col">Rating</th>
                                <th scope="col" class="text-end">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($order->user_order_data) as $id )
                            @php
                               $data = App\Models\UserOrderDesign::find($id);
                            @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                @if($data->design_method == 'Artwork')
                                                    <?php $count = 0; ?> 
                                                    
                                                    @foreach(json_decode($data->image,true) as $index => $value)
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
                                                    <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('designImage/'.$data->image) }}">
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="fs-15">{{ $data->product->name ?? '' }}</h5>
                                                @foreach($data->product->variations as $variation)  
                                                    @if ($variation->variationData->isNotEmpty())  
                                                    <?php $design_var_data = json_decode($data->variations,true); ?>
                                                        @foreach($design_var_data as $key => $value)
                                                            @if($key == $variation->var_slug)
                                                                @foreach ($variation->variationData as $data)
                                                                    @if($value == $data->id)
                                                                    <p class="text-muted mb-0">{{ $key }} :<span class="fw-medium"> {{ $data->value }}</span></p>
                                                                        <?php $variation_price [] = $data->price; ?>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <p class="text-muted mb-0">Size: <span class="fw-medium">M</span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$119.99</td>
                                    <td>02</td>
                                    <td>
                                        <div class="text-warning fs-15">
                                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i>
                                        </div>
                                    </td>
                                    <td class="fw-medium text-end">
                                        $239.98
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-top border-top-dashed">
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
                                            <tr class="border-top border-top-dashed">
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
    <!--end col-->
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 vstack gap-3">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Joseph Parkers</h6>
                                <p class="text-muted mb-0">Customer</p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>josephparker@gmail.com</li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>+(256) 245451 441</li>
                </ul>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing Address</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14">Joseph Parker</li>
                    <li>+(256) 245451 451</li>
                    <li>2186 Joyce Street Rocky Mount</li>
                    <li>New York - 25645</li>
                    <li>United States</li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping Address</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14">Joseph Parker</li>
                    <li>+(256) 245451 451</li>
                    <li>2186 Joyce Street Rocky Mount</li>
                    <li>California - 24567</li>
                    <li>United States</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Payment Details</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Transactions:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">#VLZ124561278124</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Payment Method:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">Debit Card</h6>
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
        </div>
    </div>
</div>
@endsection