@extends('front_layout.master')
@section('content')
    <section class="vinyl_wrapper viny_new pb-0">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('order-tracking') !!}
                </nav>
            </div>
        </div>
    </section>

    <section class="order_track_sec p_100 pb-0">
        <div class="container">
            <div class="order_track_content">
                <div class="hd_txt text-center">
                    <h2>Order Status, the whereabouts</h2>
                    <p>Just enter a few details to get your order-status.</p>
                </div>
                <div class="form_info">
                     <input type="email" id="email" name="email" placeholder="Your Email">
                      <input type="submit" placeholder="Submit" class="light_dark m-0">
                </div>
            </div>
        </div>
    </section>

  <section class="best_price bst_new p_100 pb-0">
        <div class="container">
            <div class="ways_hd">
                <ul class="shipping">
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_4.svg') }}" alt="">
                            <div class="text">
                                <p>Best Price</p>
                                <span>Cre8ive Printer offers the industry’s best prices while using only the highest</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_5.svg') }}" alt="">
                            <div class="text">
                                <p>Free Design Proof</p>
                                <span>Our industry-leading designers provide free proofs so you can be sure</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ship-box">
                            <img src="{{ asset('front/img/ways_6.svg') }}" alt="">
                            <div class="text">
                                <p>Best Quality</p>
                                <span>If you’re not satisfied, we’re not satisfied. We’ll reprint or refund your order - guaranteed</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
  @endsection