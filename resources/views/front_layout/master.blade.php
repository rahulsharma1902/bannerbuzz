
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/clogo.svg') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/new_style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('front/css/custom.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/new_style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/custom.css') }}" />

    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- end toaster -->

    {{-- jquery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- dropbox cdn -->
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="{{env('DROPBOX_CLIENT_ID')}}"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

    <title>Home page</title>

</head>

<body class="bodyMainWrap">
<div style="display: none;" id="overlay">
    <div class="loader">
        <div class="spinner"></div>
    </div>
</div>
<?php $home_data = App\Models\HomeContent::first(); ?> 
    <header>
        @if($home_data && $home_data->display_offer == 1)
            <div class="topbar" style="background-color: #fadc38;">
                <div class="container-fluid">
                    <div class="topbar-content">
                        <span>{{$home_data->offer_text ?? ''}}</span>&nbsp;<span id="countdown"></span>
                        <div class="toggl">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="free-exp-wrap">
            <div class="container-fluid">
                <div class="free-exp">
                    @if($home_data)
                    <p class="m-0">{{$home_data->top_text ?? ''}}</p>
                    @endif
                    <ul>
                        <li>
                            <a href="{{ url('order-tracking') }}">
                                <img src="{{ asset('front/img/track.svg') }}" alt="" />
                                <span>Order Tracking</span>
                            </a>
                        </li>
                        <li class="new_loginup">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('front/img/account.svg') }}" alt="" />
                                <span>Account</span>
                            </a>
                            
                            <ul class="dropDown popupLogin">
                                @if(!Auth::check())
                                    <li class="dontAccount">
                                        <a href="{{ url('login') ?? '' }}" class="btn lgin_btn" aria-label="Login">Login</a>
                                        <p>Don't Have An Account?</p>
                                        <a href="{{ url('register') ?? '' }}" class="btn rgstr_btn" aria-label="Register">Register</a>
                                    </li>
                                @else   
                                    <li>
                                        <a href="{{ route('user.dashboard') }}">
                                            <span><i class="fa-regular fa-user"></i></span>
                                            <span>My Account</span>
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ url('my-saved-designs') ?? '' }}">
                                        <span><i class="fa-regular fa-user"></i></span>
                                        <span>My Designs</span>
                                    </a>
                                </li> 
                                @if(Auth::check()) 
                                    <li class="logd_out">
                                        <a title="Logout" href="{{ url('logout') ?? '' }}" class="lg_out">
                                            <span><i class="fa-regular fa-user"></i></span>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <?php 
                            if(Auth::check()){
                                $cartdata = App\Models\Basket::where('user_id',Auth::user()->id)->where('status',false)->get();
                                
                            }else{
                                $temp_id = Session::get('temporaryUserId');
                                if($temp_id != null) {
                                    $cartdata = App\Models\Basket::where('temporary_id',$temp_id)->where('status',false)->get(); 
                                } else {
                                    $cartdata = null;
                                }
                            }
                        ?>

                        <li class="mainBasketData">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('front/img/item.svg') }}" alt="" />
                                <span>Item(s) <span id="item-price" style="color: #e4004e;">£0.00</span></span> 
                                 <!-- dc288a -->
                            </a>
                            <div id="cart-preview-dropdown" class="cart-preview-dropdown">
                                <div class="triangle-with-shadow triangle-grey"></div>
                                <?php $all_total =[]; ?>
                                @if(isset($cartdata) && $cartdata != null && $cartdata->isNotEmpty())
                                    <div class="cart-preview-inner">
                                        <div class="previewCart">
                                            <div class="modal-body">
                                                <div class="cartItemsBox">
                                                    <div class="miniCartGridBox">
                                                        <div class="dataTableMain">
                                                            <table class="table cartTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" class="tableHead">Product Detail</th>
                                                                        <th scope="col" class="tableHead">Quantity</th>
                                                                        <th scope="col" class="tableHead">Price</th>
                                                                        <th scope="col" class="tableHead"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($cartdata as $cart)
                                                                        @if($cart->product_type != 'accessories')
                                                                            @if(isset($cart->design))
                                                                            <tr>
                                                                                <td class="td">
                                                                                    <div class="proDetailsMain">
                                                                                        <div class="proImage">
                                                                                            <div class="singleSide">
                                                                                                @if($cart->design_method == 'Artwork')
                                                                                                    <?php $count = 0; ?> 
                                                                                                    @if(!empty(json_decode($cart->image,true)) && $cart->image != null)
                                                                                                        @foreach(json_decode($cart->image,true) as $index => $value)
                                                                                                            @if($count == 0)
                                                                                                                <img src="{{ asset('designImage/'.$value) }}">
                                                                                                            @endif
                                                                                                            <?php $count++; ?>
                                                                                                        @endforeach
                                                                                                    @else
                                                                                                        <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                                                    @endif
                                                                                                @elseif($cart->design_method == 'ArtworkLater')
                                                                                                    <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                                                @elseif($cart->design_method == 'hireDesigner')
                                                                                                    @foreach (json_decode($cart->product->images) as $index => $image)
                                                                                                        @if ($index == 0)
                                                                                                            <img src="{{ asset('product_Images') }}/{{ $image }}">
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @else
                                                                                                    <img src="{{ asset('designImage/'.$cart->design->image) }}">
                                                                                                @endif
                                                                                                <!-- <img src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/custom-vinyl-banners1708684606.jpg" alt="PVC Banners"> -->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="proDetails">
                                                                                            <p class="proName">{{ $cart->product->name ?? '' }} </p>
                                                                                            <?php $variation_price = [] ; ?>
                                                                                            @if($cart->size_id != null)
                                                                                                @foreach($cart->product->sizes as $size)
                                                                                                    @if($size->id == $cart->size_id)
                                                                                                        @php
                                                                                                            $value = $cart->dimension;
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
                                                                                                        <p><span>Size (W X H): {{ $converted_width }}X{{ $converted_height }} ({{ $cart->design->dimension }})</span></p>
                                                                                                        <?php $size_price = $size->price; ?>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @elseif($cart->width != null && $cart->height != null )
                                                                                                @php
                                                                                                    $value = $cart->dimension;
                                                                                                    if ($value == 'In') {
                                                                                                        $unit_value = 12;
                                                                                                    } else if ($value == 'Cm') {
                                                                                                        $unit_value = 30;
                                                                                                    } else if ($value == 'Mm') {
                                                                                                        $unit_value = 304;
                                                                                                    } else if ($value == 'Ft') {
                                                                                                        $unit_value = 1;
                                                                                                    }

                                                                                                    $product_price = $cart->product->price;
                                                                                                    $price_pre_unit = ($product_price / $unit_value) / 2;
                                                                                                    $size_price = round(($cart->width + $cart->height) * $price_pre_unit);
                                                                                                    
                                                                                                @endphp
                                                                                                <p><span>Size (W X H): {{ $cart->width }} x {{ $cart->height }} ({{ $cart->design->dimension }})</span></p>
                                                                                            @else
                                                                                                <p><span></span></p>
                                                                                                <?php $size_price = $cart->product->price; ?>
                                                                                            @endif
                                                                                            
                                                                                            @foreach($cart->product->variations as $variation)  
                                                                                                @if ($variation->variationData->isNotEmpty())  
                                                                                                    @foreach(json_decode($cart->variations) as $key => $value)
                                                                                                        @if($key == $variation->var_slug)
                                                                                                            @foreach ($variation->variationData as $data)
                                                                                                                @if($value == $data->id)
                                                                                                                    {{ $key }} : {{ $data->value }} <br/>
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
                                                                                                $total =( $size_price + $var_price) * $cart->qty;
                                                                                                if($cart->design_method == 'hireDesigner') {
                                                                                                    $total += 10;
                                                                                                }
                                                                                            @endphp
                                                                                            <!-- <p><span>Size (W X H) : 3 x 2 (FT) | £6.99</span><span>Hanging Options: No grommets</span> -->
                                                                                        
                                                                                            <!-- </p> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="td qtyTd"><span>Qty: </span>{{ $cart->qty ?? '' }}</td>
                                                                                <td class="td priceTd">£{{ $total ?? '' }}</td>
                                                                                <?php $all_total[] = $total; ?>
                                                                                <td class="td removeTd" data-id="{{ $cart->id ?? '' }}" data-price="{{ $total ?? '' }}"><i class="fa-solid fa-trash"></i></td>
                                                                            </tr>
                                                                            @endif
                                                                        @else
                                                                            <tr>
                                                                                <td class="td">
                                                                                    <div class="proDetailsMain">
                                                                                        <div class="proImage">
                                                                                            <div class="singleSide">
                                                                                                @if($cart->accessorie)
                                                                                                    <?php $count = 0; ?> 
                                                                                                    
                                                                                                    @foreach(json_decode($cart->accessorie->images,true) as $index => $value)
                                                                                                        @if($count == 0)
                                                                                                            <img src="{{ asset('accessories_Images/'.$value) }}">
                                                                                                        @endif
                                                                                                        <?php  $count++ ?>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                                <!-- <img src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/custom-vinyl-banners1708684606.jpg" alt="PVC Banners"> -->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="proDetails">
                                                                                            <p class="proName">{{ $cart->accessorie->name ?? '' }} </p>
                                                                                            <?php $variation_price = [] ; ?>
                                                                                            @if($cart->size_id != null)
                                                                                                @foreach($cart->accessorie->sizes as $size)
                                                                                                    @if($size->id == $cart->size_id)
                                                                                                        @php
                                                                                                            $value = $cart->dimension;
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
                                                                                                        <p><span>Size (W X H): {{ $converted_width }}X{{ $converted_height }} ({{ $cart->design->dimension }})</span></p>
                                                                                                        <?php $size_price = $size->price; ?>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @elseif($cart->width != null && $cart->height != null )
                                                                                                @php
                                                                                                    $value = $cart->dimension;
                                                                                                    if ($value == 'In') {
                                                                                                        $unit_value = 12;
                                                                                                    } else if ($value == 'Cm') {
                                                                                                        $unit_value = 30;
                                                                                                    } else if ($value == 'Mm') {
                                                                                                        $unit_value = 304;
                                                                                                    } else if ($value == 'Ft') {
                                                                                                        $unit_value = 1;
                                                                                                    }

                                                                                                    $product_price = $cart->accessorie->price;
                                                                                                    $price_pre_unit = ($product_price / $unit_value) / 2;
                                                                                                    $size_price = round(($cart->width + $cart->height) * $price_pre_unit);
                                                                                                    
                                                                                                @endphp
                                                                                                <p><span>Size (W X H): {{ $cart->width }} x {{ $cart->height }} ({{ $cart->design->dimension }})</span></p>
                                                                                            @else
                                                                                                <p><span></span></p>
                                                                                                <?php $size_price = $cart->accessorie->price; ?>
                                                                                            @endif

                                                                                            @foreach($cart->accessorie->variations as $variation)  
                                                                                                @if ($variation->variationData->isNotEmpty())  
                                                                                                    @foreach(json_decode($cart->variations) as $key => $value)
                                                                                                        @if($key == $variation->var_slug)
                                                                                                            @foreach ($variation->variationData as $data)
                                                                                                                @if($value == $data->id)
                                                                                                                    {{ $key }} : {{ $data->value }} <br>
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
                                                                                                $total =( $size_price + $var_price) * $cart->qty;
                                                                                            @endphp
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="td qtyTd"><span>Qty: </span>{{ $cart->qty ?? '' }}</td>
                                                                                <td class="td priceTd">£{{ $total ?? '' }}</td>
                                                                                <?php $all_total[] = $total ?>
                                                                                <td class="td removeTd" data-id="{{ $cart->id ?? '' }}" data-price="{{ $total ?? '' }}"><i class="fa-solid fa-trash"></i></td>
                                                                            </tr>
                                                                        
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="buttonSet" id="buttonSet">
                                                        <div class="cartSubTotal">Shopping Basket - Subtotal <span class="price">£{{array_sum($all_total) }}</span></div>
                                                        <input type="hidden" id="total_price" value="{{ array_sum($all_total) }}">
                                                        <button type="button" class="btn light_dark" onclick="viewCheckout()">VIEW BASKET CHECKOUT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="cart-preview-inner">
                                        <div class="previewCart">
                                            <div class="modal-body">
                                                <div class="cartItemsBox">
                                                    <div class="miniCartGridBox">
                                                        <div class="dataTableMain">
                                                            <p>Uh-oh! Looks like your Basket is empty.</p>
                                                            <span class="icon-wrap"><i class="fa-solid fa-xmark"></i></span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                         </li>
                        <!-- <li>
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('front/img/country.svg') }}" alt="" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ url('/front/img/country.svg') }}" alt="" /> IND</button>
                                    </li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ url('/front/img/country.svg') }}" alt="" /> IND</button>
                                    </li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ url('/front/img/country.svg') }}" alt="" />
                                            IND</button>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="search-wrap">
            <div class="container-fluid">
                <div class="search_content">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bars bar1 navbar-toggler-icon"></span>
                        <span class="bars bar2 navbar-toggler-icon"></span>
                        <span class="bars bar3 navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('front/img/clogo.svg') }}"
                            alt="" /></a>
                    <div class="search_wrapper">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                All Category
                            </a>
                            <?php $categories = App\Models\ProductCategories::class::whereNull('parent_category')->get();  ?>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>

                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="search_block">
                            <form class="srch_txt" id="search-form" action="{{url('search')}}" method="get" >
       
                                <input type="search" id="search_val" name="search" class="form-control" placeholder="Search..." />
                                <!-- <i class="fa fa-search"></i> -->
                                <i id="search_btn" class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                    <div class="contc">
                        <ul class="pro_headr_destp">
                            <li class="chatnow">
                                <a href="javascript:void(0)">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/chat.svg') }}" alt="" />
                                    </div>
                                    <span>Chat Now</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:{{ $home_content->phone ?? '0161 5327799' }}">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/call.svg') }}" alt="" />
                                    </div>
                                    <span>
                                        Call Us <br />
                                        {{ $home_content->phone ?? '0161 5327799' }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pro_headr_mb">
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/account.svg') }}" alt="">
                                    </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="tel:012345678910">
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/item.svg') }}" alt="">
                                    </div>
                                </a>
                            </li> -->
                            <li class="mainBasketData basket-mb">
                                <!-- <a href="javascript:void(0)">
                                    <img src="{{ asset('front/img/item.svg') }}" alt="" />
                                    <span>Item(s) <span style="color: #e4004e;">$0.00</span></span> 
                                     dc288a
                                </a> -->
                                <a >
                                    <div class="con-img">
                                        <img src="{{ asset('front/img/item.svg') }}" alt="">
                                    </div>
                                </a>
                                <?php 
                                    if(Auth::check()){
                                        $basket_data = App\Models\Basket::where('user_id',Auth::user()->id)->where('status',false)->get();
                                    }else{
                                        $temp_id = Session::get('temporaryUserId');
                                        if($temp_id != null) {
                                            $basket_data = App\Models\Basket::where('temporary_id',$temp_id)->where('status',false)->get();
                                        } else {
                                            $basket_data = null;
                                        }
                                         
                                    }
                                ?>
                                <div id="cart-preview-dropdown-mb" class="cart-preview-dropdown">
                                    <div class="triangle-with-shadow triangle-grey"></div>
                                    <?php $all_total_mb = []; ?>
                                    @if(isset($basket_data) && $basket_data != null && $basket_data->isNotEmpty())
                                    <div class="cart-preview-inner">
                                        <div class="previewCart">
                                            <div class="modal-body">
                                                <div class="cartItemsBox">
                                                    <div class="miniCartGridBox">
                                                        <div class="dataTableMain">
                                                            <table class="table cartTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" class="tableHead">Product Detail</th>
                                                                        <th scope="col" class="tableHead">Quantity</th>
                                                                        <th scope="col" class="tableHead">Price</th>
                                                                        <th scope="col" class="tableHead"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($basket_data as $basket)
                                                                    @if($basket->product_type != 'accessories')
                                                                        @if(isset($basket->design))
                                                                            <tr>
                                                                                <td class="td">
                                                                                    <div class="proDetailsMain">
                                                                                        <div class="proImage">
                                                                                            <div class="singleSide">
                                                                                            @if($basket->design_method == 'Artwork')
                                                                                                <?php $count = 0; ?> 
                                                                                                
                                                                                                @if(!empty(json_decode($basket->image,true)) && $basket->image != null)
                                                                                                        @foreach(json_decode($basket->image,true) as $index => $value)
                                                                                                            @if($count == 0)
                                                                                                                <img src="{{ asset('designImage/'.$value) }}">
                                                                                                            @endif
                                                                                                            <?php $count++; ?>
                                                                                                        @endforeach
                                                                                                    @else
                                                                                                        <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                                                    @endif
                                                                                            @elseif($basket->design_method == 'ArtworkLater')
                                                                                                <img src="{{ asset('Site_Images/sendartworklater.png') }}">
                                                                                            @else
                                                                                                <img src="{{ asset('designImage/'.$basket->design->image) }}">
                                                                                            @endif
                                                                                                <!-- <img src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/custom-vinyl-banners1708684606.jpg" alt="PVC Banners"> -->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="proDetails">
                                                                                            <p class="proName">{{ $basket->design->product->name ?? '' }}</p>
                                                                                            <?php $variation_price_mb = [] ; ?>
                                                                                            @if($basket->design->size_id != null)
                                                                                                @foreach($basket->design->product->sizes as $size)
                                                                                                    @if($size->id == $basket->design->size_id)
                                                                                                    @php
                                                                                                        $value = $basket->design->dimension;
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
                                                                                                        <p><span>Size (W X H): {{ $converted_width }}X{{ $converted_height }} ({{ $basket->design->dimension }})</span></p>
                                                                                                        <?php $size_price = $size->price; ?>
                                                                                                    @endif
                                                                                                @endforeach
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
                                                                                                <p><span>Size (W X H): {{ $basket->width }} x {{ $basket->height }} ({{ $basket->design->dimension }})</span></p>
                                                                                            @else
                                                                                                <p><span></span></p>
                                                                                                <?php $size_price = $basket->product->price; ?>
                                                                                            @endif

                                                                                            @foreach($basket->design->product->variations as $variation)  
                                                                                                @if ($variation->variationData->isNotEmpty())  
                                                                                                    @foreach(json_decode($basket->design->variations) as $key => $value)
                                                                                                        @if($key == $variation->var_slug)
                                                                                                            @foreach ($variation->variationData as $data)
                                                                                                                @if($value == $data->id)
                                                                                                                    {{ $key }} : {{ $data->value }} <br/>
                                                                                                                    <?php $variation_price_mb [] = $data->price; ?>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endforeach

                                                                                            @php
                                                                                                $var_price = array_sum($variation_price_mb);
                                                                                                $total_without_qty = $size_price + $var_price;
                                                                                                $total =( $size_price + $var_price) * $basket->qty;
                                                                                            @endphp
                                                                                            <!-- <p><span>Size (W X H) : 3 x 2 (FT) | £6.99</span><span>Hanging Options: No grommets</span></p> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="td qtyTd"><span>Qty: </span>{{ $basket->qty ?? '' }}</td>
                                                                                <td class="td priceTd">£{{ $total ?? '' }}</td>
                                                                                <?php $all_total_mb[] = $total; ?>
                                                                                <td class="td removeTd" data-id="{{ $basket->id ?? '' }}" data-price="{{ $total ?? '' }}"><i class="fa-solid fa-trash"></i></td>
                                                                            </tr>
                                                                        @endif
                                                                    @else
                                                                        <tr>
                                                                            <td class="td">
                                                                                <div class="proDetailsMain">
                                                                                    <div class="proImage">
                                                                                        <div class="singleSide">
                                                                                            @if($basket->accessorie)
                                                                                                <?php $count = 0; ?> 
                                                                                                
                                                                                                @foreach(json_decode($basket->accessorie->images,true) as $index => $value)
                                                                                                    @if($count == 0)
                                                                                                        <img src="{{ asset('accessories_Images/'.$value) }}">
                                                                                                    @endif
                                                                                                    <?php  $count++ ?>
                                                                                                @endforeach
                                                                                            @endif
                                                                                                <!-- <img src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/custom-vinyl-banners1708684606.jpg" alt="PVC Banners"> -->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="proDetails">
                                                                                        <p class="proName">{{ $basket->accessorie->name ?? '' }}</p>
                                                                                        <?php $variation_price_mb = [] ; ?>
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
                                                                                                <p><span>Size (W X H): {{ $converted_width }}X{{ $converted_height }} ({{ $basket->design->dimension }})</span></p>
                                                                                                <?php $size_price = $size->price; ?>
                                                                                            @endif
                                                                                        @endforeach
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
                                                                                            $size_price = round(($cart->width + $basket->height) * $price_pre_unit);
                                                                                            
                                                                                        @endphp
                                                                                        <p><span>Size (W X H): {{ $basket->width }} x {{ $basket->height }} ({{ $basket->design->dimension }})</span></p>
                                                                                    @else
                                                                                        <p><span></span></p>
                                                                                        <?php $size_price = $basket->accessorie->price; ?>
                                                                                    @endif

                                                                                    @foreach($basket->accessorie->variations as $variation)  
                                                                                        @if ($variation->variationData->isNotEmpty())  
                                                                                            @foreach(json_decode($basket->variations) as $key => $value)
                                                                                                @if($key == $variation->var_slug)
                                                                                                    @foreach ($variation->variationData as $data)
                                                                                                        @if($value == $data->id)
                                                                                                            {{ $key }} : {{ $data->value }} <br>
                                                                                                            <?php $variation_price_mb [] = $data->price; ?>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endforeach

                                                                                    @php
                                                                                        $var_price = array_sum($variation_price_mb);
                                                                                        $total_without_qty = $size_price + $var_price;
                                                                                        $total =( $size_price + $var_price) * $basket->qty;
                                                                                    @endphp
                                                                            </td>
                                                                            <td class="td qtyTd"><span>Qty: </span>{{ $basket->qty ?? '' }}</td>
                                                                            <td class="td priceTd">£{{ $total ?? '' }}</td>
                                                                            <?php $all_total_mb[] = $total; ?>
                                                                            <td class="td removeTd" data-id="{{ $basket->id ?? '' }}" data-price="{{ $total ?? '' }}"><i class="fa-solid fa-trash"></i></td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="buttonSet" id="buttonSet_mb">
                                                        <div class="cartSubTotal">Shopping Basket - Subtotal <span class="price">£{{array_sum($all_total_mb) }}</span></div>
                                                        <input type="hidden" id="total_price" value="{{ array_sum($all_total_mb) }}">
                                                        <button type="button" class="btn light_dark" onclick="viewCheckout()">VIEW BASKET CHECKOUT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="cart-preview-inner">
                                            <div class="previewCart">
                                                <div class="modal-body">
                                                    <div class="cartItemsBox">
                                                        <div class="miniCartGridBox">
                                                            <div class="dataTableMain">
                                                                <p>Uh-oh! Looks like your Basket is empty.</p>
                                                            </div>
                                                            <span class="icon-wrap"><i class="fa-solid fa-xmark"></i></span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbaar">
            <nav class="navbar navbar-expand-lg" style="background-color: #dc288a;">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    @if ($category->display_on == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                            @if ($category->subCategories->isNotEmpty())
                                                <div class="submuenu__wreap">
                                                    <ul class="submuenu_text">
                                                        @foreach ($category->subCategories as $key => $sub_category)
                                                            <li>
                                                                @if ($sub_category->subCategories->isNotEmpty() || $sub_category->products->isNotEmpty())
                                                                    <a
                                                                        href="{{ url('shop') }}/{{ $sub_category->slug }}">{{ $sub_category->name }}</a>
                                                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                                                    @if ($sub_category->subCategories->isNotEmpty())
                                                                        <div class="menuLevel3 subCategoryMenu ">
                                                                            <div class="menuLevel_txt">
                                                                                <ul>
                                                                                    @foreach ($sub_category->subCategories as $cat)
                                                                                        <li><a style="color: #dc288a;font-size:15px"
                                                                                                href="{{ url('shop') }}/{{ $cat->slug }}">{{ $cat->name }}</a>
                                                                                            <ul>
                                                                                                @foreach ($cat->products as $product)
                                                                                                    <li><a
                                                                                                            href="{{ url('details') }}/{{ $product->slug }}">{{ $product->name }}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                <div class="menuLevel_img">
                                                                                    @foreach (json_decode($category->images) as $index => $image)
                                                                                        @if ($index == 0)
                                                                                            <img width="100%"
                                                                                                height="100%"
                                                                                                src="{{ asset('category_Images') }}/{{ $image }}">
                                                                                        @break
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                @elseif ($sub_category->products->isNotEmpty())
                                                                    <div class="menuLevel3 subCategoryMenu ">
                                                                        <div class="menuLevel_txt">
                                                                            <ul>
                                                                                @foreach ($sub_category->products as $product)
                                                                                    <li><a
                                                                                        href="{{ url('details') }}/{{ $product->slug }}">{{ $product->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            @if ($category->products->isNotEmpty())
                                                <div class="submuenu__wreap">
                                                    <ul class="submuenu_text">
                                                        @foreach ($category->products as $product)
                                                            <li><a  href="{{ url('details') }}/{{ $product->slug }}">{{ $product->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about-us') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('accessories') }}">Accessories</a>
                        </li>
                    </ul>
                    <div class="navbar_nav_mb">
                        <div class="navbar_text_mb">
                            <a href="tel:012345678910">
                                <div class="con-img">
                                    <img src="{{ asset('front/img/call.svg') }}" alt="">
                                </div>
                                <span>012345678910</span>
                            </a>
                            <!-- <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('front/img/country.svg') }}" alt="">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ asset('front/img/country.svg') }}" alt="">
                                            IND</button></li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ asset('front/img/country.svg') }}" alt="">
                                            IND</button></li>
                                    <li><button class="dropdown-item" type="button"><img
                                                src="{{ asset('front/img/country.svg') }}" alt="">
                                            IND</button></li>
                                </ul>
                            </div> -->
                        </div>
                        <ul class="toggle_sub_menu">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    @if ($category->display_on == 1)
                                        <li>
                                            <a class="toggle_sub_txt" aria-current="page"
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                            <span><i class="fa-solid fa-plus"></i></span>
                                            <div class="submuenu_mb active">
                                                <ul>
                                                    @if ($category->subCategories)
                                                        @foreach ($category->subCategories as $sub_cat)
                                                            <li><a
                                                                    href="{{ url('shop') }}/{{ $sub_cat->slug }}">{{ $sub_cat->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="toggle_hide_mb"></div>
            </div>
        </nav>
    </div>
</header>


@yield('content')


<footer>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer_top_lr">
                        <h5>Subscribe to our newsletter and get 20% OFF on Your First Order + Free Shipping.</h5>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form class="footer_top_rt">
                        <input type="search" name="" placeholder="Your email address">
                        <a href="#" class="btn light_dark">Subscribe</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_wreap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="footer_grid">
                        <div class="footer_contnt">
                            <h6>Category</h6>
                            <ul>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ url('shop') }}/{{ $category->slug }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="footer_contnt">
                            <h6>Information</h6>
                            <ul>
                                <li><a href="{{ url('order-tracking') }}">Order Tracking</a></li>
                                <li><a href="{{ url('customer-reviews') }}">Customer Reviews</a></li>
                                <!-- <li><a href="{{ url('special-offers') }}">Special Offers</a></li> -->
                                <!-- <li><a href="#">Sitemap</a></li> -->
                                <li><a href="{{ url('/blogs') }}">Blog</a></li>
                                {{-- <li><a href="#">Safety Signs & Banners</a></li> --}}
                            </ul>
                        </div>
                        <div class="footer_contnt">
                            <h6>Customer Service</h6>
                            <ul>
                                <li><a href="{{ url('about-us') }}">About Us</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ url('privacy-policy') }}">Terms of Use</a></li>
                            </ul>
                        </div>
                        <div class="footer_contnt">
                            <h6>Follow on</h6>
                            <ul>
                                <li><a href="{{ $home_content->facebook ?? '' }}"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
                                <li><a href="{{ $home_content->instagram ?? '' }}"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                                <li><a href="{{ $home_content->twitter ?? '' }}"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_contnt footer_contact">
                        <h6>Contact Information</h6>
                        <ul>
                            <li>
                                <span>Address:</span>
                                {{ $home_content->address ?? 'Henfold Road, Astley, Manchester, M29 7FX' }}
                            </li>
                            <li><span>Phone:</span> <a href="tel:{{ $home_content->phone ?? '0161 5327799' }}">{{ $home_content->phone ?? '0161 5327799' }}</a></li>
                            <li><span>Email:</span> <a
                                    href="mailto:{{ $home_content->email ?? 'info@cre8iveprinter.co.uk' }}">{{ $home_content->email ?? 'info@cre8iveprinter.co.uk' }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="footer_bord"></div>
                </div>
                <div class="col-lg-3">
                    <div class="card_imgs">
                        <img src="{{ asset('front/img/card_img.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bt">
        <div class="container">
            <div class="footer_bt_lt">
                <p class="m-0">© 2024 Cre8ive Printer, All rights reserved.</p>
            </div>
            <ul class="footer_bt_rt">
                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- Model Section for basket -->

<!-- Modal Structure -->
<div class="modal fade miniCartModalWrap" id="miniCartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cartItemsBox">
                    <div class="miniCartGridBox">
                        <div class="dataTableMain">
                            <table class="table cartTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="tableHead">Product Detail</th>
                                        <th scope="col" class="tableHead">Quantity</th>
                                        <th scope="col" class="tableHead">Price</th>
                                        <th scope="col" class="tableHead"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="td">
                                            <div class="proDetailsMain">
                                                <div class="proImage">
                                                    <div class="singleSide">
                                                        <img src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/custom-vinyl-banners1708684606.jpg" alt="PVC Banners">
                                                    </div>
                                                </div>
                                                <div class="proDetails">
                                                    <p class="proName">PVC Banners</p>
                                                    <p><span>Size (W X H) : 3 x 2 (FT) | £6.99</span><span>Hanging Options: No grommets</span></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="td qtyTd"><span>Qty: </span> 1</td>
                                        <td class="td priceTd">£6.99</td>
                                        <td class="td removeTd"><i class="fa-solid fa-trash"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="td">
                                            <div class="proDetailsMain">
                                                <div class="proImage">
                                                    <div class="singleSide">
                                                        <img src="https://cre8iveprinter.cre8iveprinter.co.uk/product_Images/custom-vinyl-banners1708684606.jpg" alt="PVC Banners">
                                                    </div>
                                                </div>
                                                <div class="proDetails">
                                                    <p class="proName">PVC Banners</p>
                                                    <p><span>Size (W X H) : 3 x 2 (FT) | £6.99</span><span>Hanging Options: No grommets</span></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="td qtyTd"><span>Qty: </span> 1</td>
                                        <td class="td priceTd">£6.99</td>
                                        <td class="td removeTd"><i class="fa-solid fa-trash"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttonSet">
                        <div class="cartSubTotal">Shopping Basket - Subtotal <span class="price">£13.98</span></div>
                        <button type="button" class="btn btn-primary">VIEW BASKET CHECKOUT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //document.addEventListener('DOMContentLoaded', function(){
    //     document.querySelector(".mainBasketData").addEventListener("click", function(){
    //         var myModal = new bootstrap.Modal(document.getElementById('miniCartModal'));
    //         myModal.show();
    //     });
    // });

    // For View Cart Item
    $(document).ready(function(){
        // For desktop
        $('.mainBasketData').click(function(){
            $('#cart-preview-dropdown').toggle();
            disabledEventPropagation(event);
        });

        $('#cart-preview-dropdown').click(function(){
            disabledEventPropagation(event);
        });

        // For mobile
        $('.basket-mb').click(function(){
            $('#cart-preview-dropdown-mb').toggle();
            disabledEventPropagation(event);
        });

        $('#cart-preview-dropdown-mb').click(function(){
            disabledEventPropagation(event);
        });

        $(document).click(function() {
            $("#cart-preview-dropdown").hide();
            $('#cart-preview-dropdown-mb').hide();
        });

        function disabledEventPropagation(event) {
            if(event.stopPropagation){
                event.stopPropagation();
            }else if(window.event){
                window.event.cancelBubble = true;
            }
        }
    });

</script>
<script>
    @if(isset($cartdata) && $cartdata != null && $cartdata->isNotEmpty())
        $(document).ready(function(){
            total_price = $('#total_price').val();
            price = '£'+total_price+'.00';
            if(total_price !== undefined){
                $('#item-price').text(price);
            }else{
                price = '£0.00';
                $('#item-price').text(price);
            }
        });
    @endif
    function viewCheckout(){
        location.href = "{{ url('checkout/cart') }}";
    }

    $(document).ready(function(){
        $('.removeTd').on('click',async function(){
            basket_id = $(this).data('id');
            basket_price = $(this).data('price');
            total_price = $('#total_price').val();
            price_left = total_price-basket_price;
            $('#total_price').val(price_left);
            price = '£'+price_left;
            item_price = '£'+price_left+'.00';
            
            if(basket_id != undefined && basket_id != null){
                remove_basket = await removeBasketItem(basket_id);
                //  console.log(remove_basket);
                if(remove_basket.result == true){
                    if(remove_basket.total < 1) {
                        _html_ = ` <div class="cart-preview-inner">
                                    <div class="previewCart">
                                        <div class="modal-body">
                                            <div class="cartItemsBox">
                                                <div class="miniCartGridBox">
                                                    <div class="dataTableMain">
                                                        <p>Uh-oh! Looks like your Basket is empty.</p>
                                                        <span class="icon-wrap"><i class="fa-solid fa-xmark"></i></span> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        $('#cart-preview-dropdown').html(_html_);
                        $('#cart-preview-dropdown-mb').html(_html_);
                        $('#item-price').text(item_price);
                    } else {
                        $('#item-price').text(item_price);
                        $(this).closest('tr').remove();
                        $('#buttonSet').closest('div').find('span').text(price);
                        $('#buttonSet_mb').closest('div').find('span').text(price); 
                    }
                }
            } 
        });
        $('.icon-wrap').on('click',function(){
            $('#cart-preview-dropdown').hide();
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
<script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.1/echo.iife.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ asset('front/js/chatbot.js') ?? '' }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
        window.GlobalData = {
            URL: "{{ url('') }}",
            csrfToken: "{{ csrf_token() }}",
        };
</script>
<script src="{{ asset('front/js/ajaxFunctions.js') }}"></script>
<script src="{{ asset('front/js/script.js') }}"></script>
    <!-- <script>
        const countdownDate = new Date().getTime() + 5 * 24 * 60 * 60 * 1000;

        const x = setInterval(function() {
            const now = new Date().getTime();

            const distance = countdownDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = 
                days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script> -->
<script>
    initializeSlick();
    //var script = document.createElement('script');
    //script.src = "{{ asset('front/js/script.js') }}";
    //document.body.appendChild(script);

   // script.onload = function() {
    //    initializeSlick();
    //};
</script>

<script>
    // counter
    var counted = 0;
    $(document).ready(function(){
        $(window).scroll(function() {

            var oTop = $('.counter').offset().top - window.innerHeight;
            if (counted == 0 && $(window).scrollTop() > oTop) {
                $('.count').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }

                    });
                });
                counted = 1;
            }

        });
    }); 
    // brand-slider
    $(document).ready(function() {
        $('.brand-slider').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            speed: 500,
            dots: false,
            autoplay: true,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
            ]
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.submuenu_text li:first-child .subCategoryMenu').css('display', 'block');
        $('.submuenu_text li').hover(
            function () {
                $(this).find('.subCategoryMenu').css('display', 'block');
            },
            function () {
                $(this).find('.subCategoryMenu').css('display', 'none');
            },
        
        );
        $('.submuenu_text li').on('mouseleave', function () {
            $('.submuenu_text li:first-child .subCategoryMenu').css('display', 'block');
        });

        $('#search_btn').on('click',function(){
            if($('#search_val').val() != null && $('#search_val').val() != ""){
                $('#search-form').submit();
            }
        });
    });
    // function callSuccessToster(message){
    //     iziToast.success({
    //         message: message,
    //         position: 'topRight' 
    //     });
    // }
    // function callErrorToster(message){
    //     iziToast.error({
    //         message: message,
    //         position: 'topRight' 
    //     });
    // }
</script>

<script>
    $(document).ready(function() {
        $('a[href^="tel:"]').on('click', function() {
            $('#overlay').show();

            setTimeout(function() {
                $('#overlay').hide();
            }, 100);
        });
        $('a[href^="mailto:"]').on('click', function() {
            $('#overlay').show();

            setTimeout(function() {
                $('#overlay').hide();
            }, 100);
        });
        $(window).on('beforeunload', function () {
            $('#overlay').show();
        });

        $(window).on('load pageshow unload', function () {
            $('#overlay').hide();
        });
        
    });
</script>
@if(Session::get('error'))
    <script>
        iziToast.destroy();
        iziToast.error({
            message: '{{ Session::get("error") }}',
            position: 'topRight' 
        });
    </script>
    @endif
    @if(Session::get('success'))
    <script>
        iziToast.destroy();
        iziToast.success({
            message: '{{ Session::get("success") }}',
            position: 'topRight' 
        });
    </script>
    @endif
    <script>
        $(document).ready(function (){
            $('.chatnow').on('click',function(){
                $('.desktop-closed-message-avatar').click();
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        $('.edit_detail').on('click',function(){
            window.location.href = "{{ route('user.profile') }}";
        });
    });
</script>
</body>

</html>
