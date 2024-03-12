@extends('front_layout.master')
@section('content')
    <section class="banner-sec">
        <div class="container-fluid">
            <div class="banner-content">
                <div class="banner-img">
                    <img src="{{ asset('front/img/cntac.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>

 
    <section class="order_track_sec p_100 pb-0">
        <div class="container">
            <div class="order_track_content">
                <div class="hd_txt text-center">
                    <h2>Login</h2>
                    <!-- <p>Just enter a few details to get your order-status.</p> -->
                </div>
                <form action="{{ url('loginProcc') }}" method="post">
                  @csrf
                    <div class="form_info">
                        <input type="email" id="email" name="email" placeholder="Your Email">
                        <input type="password" id="password" name="password" placeholder="Your Email">
                        <!-- <div class="">
                            <div class="g-recaptcha" data-sitekey="6LfWkd0mAAAAAHjVHtaMeA34uKJ-0SLcd33sUoqb"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div> 
                        </div> -->
                            <button type="submit" placeholder="Submit" class="light_dark m-0">Login</button>
                    </div>
                </form>
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
