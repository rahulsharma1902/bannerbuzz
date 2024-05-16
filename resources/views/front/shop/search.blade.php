@extends('front_layout.master')
@section('content')

    <section class="vinyl_wrapper">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    <h4 style="font-size: x-large; text-align: left;">Search Result for '{{ $_GET['search'] }}' </h3>
                </nav>
            </div>
        </div>
    </section>
    @if (isset($products))
        <section class="col-lg-12">
            <div class="shop_wrapper col-lg-12 p_100">
                <div class="container col-lg-12">
                    <div class="shop_wrapper col-lg-12">
                        <div class="shop_rtl busines_slider col-lg-12">
                            @if ($products->isNotEmpty())
                                <?php $count = 0; ?>
                                @foreach ($products as $product)
                                    <div class="product-div card" >
                                        <div class="busines_img">
                                            @foreach (json_decode($product->images) as $index => $image)
                                                @if ($index == 0)
                                                    @if(isset($product->accessories_type))
                                                        <img height="160px" width="200px"
                                                            src="{{ asset('accessories_Images') }}/{{ $image }}">
                                                    @else
                                                        <img height="160px" width="200px"
                                                            src="{{ asset('product_Images') }}/{{ $image }}">
                                                    @endif
                                                    @break
                                                @endif
                                            @endforeach
                                            <div class="cust_btn_wreap">
                                                <a href="{{ url('details') }}/{{ $product->slug ?? '' }}"
                                                    class="btn cust_btn" tabindex="0">Customize </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $product->name ?? '' }}</h5>
                                            <div class="star_wreap">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <span>4.54/5</span>
                                            </div>
                                            @if ($product->sizes->isNotEmpty())
                                                <p>{{ $product->sizes->first()->size_value ?? '' }} Starts at
                                                    <span>£{{ $product->sizes->first()->price ?? '' }}</span>
                                                </p>
                                            @else
                                                <p>Starts at
                                                    <span>£{{ $product->price ?? '' }}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <?php $count++; ?>
                                @endforeach
                            @else 
                                <div class="product-div card">
                                    No Result Found
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
