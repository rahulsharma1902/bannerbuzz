@extends('admin_layout.master')
@section('content')
<style>
    span.downloadIcon {
    display: none;
}
a.downloadIcon {
    display: none;
}
.imageWrapIcon:hover span.downloadIcon {
    display: block;
}
.imageWrapIcon:hover a.downloadIcon {
    display: block;
}
.imageWrapIcon {
    width: fit-content;
}

span.downloadIcon {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    margin: auto;
    text-align: center;
    transform: translateY(-50%);
}
a.downloadIcon {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    margin: auto;
    text-align: center;
    transform: translateY(-50%);
}
.imageWrapIcon {
    position: relative;
    cursor: pointer;
}
i.fas.fa-download {
    color: #2e2e2ee6;
    border: 1px solid white;
    border-radius: 10px;
    background: white;
    padding: 3px;
}
</style>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Order <strong class="text-primary small">#{{ isset($order->order_number) ? $order->order_number : '' }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>Created At: <span class="text-base">{{ isset($order->created_at) ? $order->created_at->format('d M, Y h:i A') : '' }}</span></li>
                                </ul>
                            </div>

                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ url('admin-dashboard/orders') ?? '' }}"
                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ url('admin-dashboard/orders') ?? '' }}"
                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                    class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary printBtn"
                                href="#" target="_blank"><em
                                    class="icon ni ni-printer-fill"></em></a>
                        </div><!-- .invoice-actions -->
                        <div class="invoice-wrap">
                            <!-- <div class="invoice-brand text-center">
                                <img src="{{ asset('front/img/clogo.svg') ?? '' }}" srcset="{{ asset('front/img/clogo.svg') ?? '' }} 2x" alt="">
                            </div> -->
                            <div class="invoice-head">
                                @if(isset($order->BillingAddress) && $order->BillingAddress != null)
                                    <div class="invoice-contact">
                                        <span class="overline-title">Billing Address</span>
                                        <div class="invoice-contact-info">
                                            <h4 class="title">{{ $order->BillingAddress->first_name ?? '' }} {{ $order->BillingAddress->last_name ?? '' }}</h4>
                                            <ul class="list-plain">
                                                <li><em class="icon ni ni-map-pin-fill"></em>
                                                    <span>{{ $order->BillingAddress->address ?? '' }} {{ $order->BillingAddress->additional_address ?? '' }} {{ $order->ShipingAddress->city ?? '' }}
                                                        <br>
                                                        {{ $order->BillingAddress->state ?? '' }}, {{ $order->BillingAddress->zip_code ?? '' }}
                                                        {{ countryName($order->BillingAddress->country) }}
                                                    </span>
                                                </li>
                                                <li><em class="icon ni ni-call-fill"></em><span>{{ $order->BillingAddress->phone_number ?? '' }}</span></li>
                                                <li><em class="icon ni ni-mail-fill"></em><span>{{ $order->BillingAddress->email ?? '' }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @if(isset($order->ShipingAddress) && $order->ShipingAddress != null)
                                    <div class="invoice-contact">
                                        <span class="overline-title">Shiping Address</span>
                                        <div class="invoice-contact-info">
                                            <h4 class="title">{{ $order->ShipingAddress->first_name ?? '' }} {{ $order->ShipingAddress->last_name ?? '' }}</h4>
                                            <ul class="list-plain">
                                                <li><em class="icon ni ni-map-pin-fill"></em>
                                                    <span>{{ $order->ShipingAddress->address ?? '' }} {{ $order->ShipingAddress->additional_address ?? '' }} {{ $order->ShipingAddress->city ?? '' }}
                                                        <br>
                                                        {{ $order->ShipingAddress->state ?? '' }}, {{ $order->BillingAddress->zip_code ?? '' }}
                                                        {{ countryName($order->ShipingAddress->country) }}
                                                    </span>
                                                </li>
                                                <li><em class="icon ni ni-call-fill"></em><span>{{ $order->ShipingAddress->phone_number ?? '' }}</span></li>
                                                <li><em class="icon ni ni-mail-fill"></em><span>{{ $order->ShipingAddress->email ?? '' }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="invoice-desc">
                                    <h3 class="title">Order</h3>
                                    <ul class="list-plain">
                                    <li class="invoice-id"><span>Order ID</span>:<span>{{ isset($order->order_number) ? $order->order_number : '' }}</span></li>
                                    <li class="invoice-date"><span>Date</span>:<span>{{ isset($order->created_at) ? $order->created_at->format('d M, Y h:i A') : '' }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="w-20">Item</th>
                                            <th class="w-60">Description</th>
                                            <th class="w-30">Design Method</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">Qty</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                    </thead>
                                    @if(isset($order->user_order_data))
                                    <tbody>
                                        @foreach (json_decode($order->user_order_data) as $id )
                                        @php
                                            $data = App\Models\UserOrderDesign::find($id);
                                        @endphp
                                        @if($data->product_type != 'accessories')
                                        <tr>
                                            <!-- Item Column: Display Image -->
                                            <td class="imageWrapTd">
                                                <!-- <div class="d-flex">
                                                    <div class="flex-shrink-0 avatar-md bg-light rounded p-1 image-container"> -->
                                                        @if($data->design_method == 'Artwork')
                                                                                
                                                            <?php $count = 0;
                                                                $is_image = false;
                                                            ?> 
                                                            @php 
                                                                $validExt = ['png','jpg','jpeg','svg'];
                                                                $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm'];
                                                                $audioExtensions = ['mp3', 'wav', 'ogg', 'aac'];
                                                            @endphp
                                                            
                                                            @if(!empty(json_decode($data->images,true)) && $data->images != null)
                                                            
                                                                @foreach(json_decode($data->images,true) as $index => $value)
                                                                    @php 
                                                                        $ext = pathinfo($value, PATHINFO_EXTENSION); 

                                                                        if(in_array($ext, $validExt) && !$is_image) {
                                                                            $imageName = $value;
                                                                            $is_image = true;
                                                                        }
                                                                    @endphp
                                                                @endforeach
                                                                @if(!$is_image) 
                                                                    @foreach(json_decode($data->images,true) as $index => $value)
                                                                        @php
                                                                            if($loop->iteration == 1){
                                                                                $ext = pathinfo($value, PATHINFO_EXTENSION); 
                                                                                if($ext == 'pdf') {
                                                                                    $imageName = 'pdf.jpeg';
                                                                                } elseif(in_array($ext, $videoExtensions)) {
                                                                                    $imageName = 'video.png';
                                                                                } elseif(in_array($ext, $audioExtensions)) {
                                                                                    $imageName = 'audio.png';
                                                                                } else {
                                                                                    $imageName = 'imgIN.png';
                                                                                }
                                                                            }
                                                                        @endphp
                                                                    @endforeach
                                                                @endif
                                                                
                                                                @if(isset($imageName) || $imageName != null)
                                                                <div class="imageWrapIcon">
                                                                    <img width="100px" height="100px" class="downloadImage img-fluid d-block" src="{{ asset('designImage/'.$imageName) }}">
                                                                    <!-- <span class="downloadIcon"> -->
                                                                         <a class="downloadIcon" href="{{ url('admin-dashboard/download-image') }}/{{ $data->id }}"><i class="fas fa-download"></i></a>
                                                                        <!-- </span> -->
                                                                </div>
                                                                        @endif
                                                            @else
                                                                <img width="100px" height="100px" class="downloadImage img-fluid d-block" src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                            @endif
                                                        @elseif($data->design_method == 'ArtworkLater')
                                                            <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                        @elseif($data->design_method == 'hireDesigner')
                                                        @foreach (json_decode($data->product->images) as $index => $image)
                                                            @if ($index == 0)
                                                            <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('product_Images') }}/{{ $image }}">
                                                            @endif
                                                        @endforeach
                                                        @else
                                                        <div class="imageWrapIcon">
                                                            <img width="100px" height="100px" class="downloadImage img-fluid d-block" src="{{ asset('designImage/'.$data->images) }}">
                                                            <span class="downloadIcon" download-img="{{ asset('designImage/'.$data->images) }}"><i class="fas fa-download"></i></span>
                                                        </div>
                                                        @endif
                                                    <!-- </div>
                                                </div> -->
                                            </td>

                                            <!-- Description Column: Display Product Name, Variations, and Size -->
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <p class="fs-15">{{ $data->product->name ?? '' }}</p>
                                                    @foreach($data->product->variations as $variation)  
                                                        @if ($variation->variationData->isNotEmpty())  
                                                            @foreach(json_decode($data->variations,true) as $key => $value)
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
                                                </div>
                                            </td>

                                            <td class="">{{ $data->design_method ?? '' }}</td>
                                            <td class="text-right">£{{ $data->price }}</td>
                                            <td class="text-right">{{ $data->qty ?? '' }}</td>
                                            <td class="fw-medium text-end">£{{ $data->total_price }}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <!-- Item Column: Display Image -->
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                        @if($data->accessorie)
                                                        <?php $count = 0; ?> 
                                                        @foreach(json_decode($data->accessorie->images,true) as $index => $value)
                                                            @if($count == 0)
                                                            <img width="100px" height="100px" class="img-fluid d-block" src="{{ asset('accessories_Images/'.$value) }}">
                                                            @endif
                                                            <?php $count++ ?>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Description Column: Display Accessory Name, Variations, and Size -->
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <h5 class="fs-15">{{ $data->accessorie->name ?? '' }}</h5>
                                                    @foreach($data->accessorie->variations as $variation)  
                                                        @if ($variation->variationData->isNotEmpty())  
                                                            @foreach(json_decode($data->variations,true) as $key => $value)
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
                                                </div>
                                            </td>

                                            <td class="text-right">{{ $data->design_method ?? '' }}</td>
                                            <td class="text-right">£{{ $data->price }}</td>
                                            <td class="text-right">{{ $data->qty ?? '' }}</td>
                                            <td class="fw-medium text-end">£{{ $data->total_price }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                      
                                    </tbody>
                                    @endif
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2" class="text-right">Subtotal</td>
                                            <td class="text-right">£{{ isset($order->product_price) ? $order->product_price : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2" class="text-right">Shipping Charge</td>
                                            <td class="text-right">£{{ isset($order->shipping_charges) ? $order->shipping_charges : '00' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2" class="text-right">TAX</td>
                                            <td class="text-right">£{{ isset($order->additional_charges) ? $order->additional_charges : '00' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2" class="text-right">Grand Total</td>
                                            <td class="text-right">{{ isset($order->total_price) ? $order->total_price : '00' }}</td>
                                        </tr>
                                    </tfoot>
                                </table>


                                    <div class="nk-notes ff-italic fs-12px text-soft"> Order was created on a computer
                                        and is valid without the signature and seal. </div>
                                </div>
                            </div><!-- .invoice-bills -->
                        </div><!-- .invoice-wrap -->
                    </div><!-- .invoice -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

<script>
$('.downloadIcon').on('click', function() {
        // Get the image URL from the custom attribute
        var imageUrl = $(this).attr('download-img');
        
        if (imageUrl) {
            var link = document.createElement('a');
            link.href = imageUrl;
            link.download = ''; // Optional: You can specify a default filename here if needed
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        } else {
            console.error('Download image URL is undefined');
        }
    });
</script>
<script>
    // $(document).ready(function (){
    //     $('.printBtn').on('click', function(e) {
    //         e.preventDefault(); // Corrected method name
    //         console.log('clicked');
    //         window.print();
    //     });
    // });


   
//     $(document).ready(function() {
//     $('.printBtn').on('click', function(e) {
//         e.preventDefault(); 

//         var printWindow = window.open('', '', 'height=600,width=800');

//         var printContent = $('.invoice').html();

//         printWindow.document.open();
//         printWindow.document.write('<html><head><title>Print</title>');

//         printWindow.document.write('<link rel="stylesheet" href="{{ asset("admin-theme/assets/css/dashlite.css?ver=3.1.2") }}">');
//         printWindow.document.write('<link rel="stylesheet" href="{{ asset("admin-theme/coustam.css?ver=3.1.2") }}">');
//         printWindow.document.write('<link id="skin-default" rel="stylesheet" href="{{ asset("admin-theme/assets/css/theme.css?ver=3.1.2") }}">');
//         printWindow.document.write('<style> .printBtn{ display:none; }</style>');
        
//         printWindow.document.write('</head><body><div class="nk-wrap">');
//         printWindow.document.write(printContent);
//         printWindow.document.write('</div></body></html>');

//         printWindow.document.close();
//         printWindow.focus();

//         // Trigger the print dialog
//         printWindow.print();
//     });
// });

$(document).ready(function () {
    $('.printBtn').on('click', function(e) {
        e.preventDefault(); // Prevent default action
        console.log('clicked');

        // Elements to hide before printing
        var elementsToHide = [
            '.nk-sidebar.nk-sidebar-fixed.is-dark',
            '.nk-header.nk-header-fixed.is-light',
            '.invoice-action',
            '.nk-block-head',
            '.nk-footer',
            '.downloadIcon',
        ];

        // Hide the specified elements
        $(elementsToHide.join(', ')).hide();

        // Trigger the print dialog
        window.print();

        // Show the elements again after printing
        setTimeout(function() {
            $(elementsToHide.join(', ')).show();
        }, 1000); // Adjust the timeout as needed
    });
});

</script>
@endsection