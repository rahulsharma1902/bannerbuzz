@extends('front_layout.master')
@section('content')
<section class="brad_inner">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    {!! Breadcrumbs::render('about-us') !!}
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="banner-sec">
    <div class="container-fluid">
        <div class="banner-content">
            <div class="banner-img">
                <img src="{{ asset('front/img/cr8about.png')}}" alt="" />
            </div>

        </div>
    </div>
</section>

<section class="loyal-sec p_100">
    <div class="container">
        <div class="loyal-content">
            <h2>Reasons Why <br> Customers Are Loyal To Us</h2>
            <div class="reasons">
                <div class="rsn">
                    <img src="{{ asset('front/img/rsn1.png')}}" alt="">
                    <p>Countless Product Choices</p>
                </div>
                <div class="rsn">
                    <img src="{{ asset('front/img/rsn2.png')}}" alt="">
                    <p>Customized to Perfection</p>
                </div>
                <div class="rsn">
                    <img src="{{ asset('front/img/rsn3.png')}}" alt="">
                    <p>High QualityInks</p>
                </div>
                <div class="rsn">
                    <img src="{{ asset('front/img/rsn4.png')}}" alt="">
                    <p>Easy-To UseDesign Tool</p>
                </div>
                <div class="rsn">
                    <img src="{{ asset('front/img/rsn5.png')}}" alt="">
                    <p>Cutting Edge Printing Process</p>
                </div>
                <div class="rsn">
                    <img src="{{ asset('front/img/rsn6.png')}}" alt="">
                    <p>Highest QualityGuaranteed</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="create-sec p_100 pt-0">
    <div class="container">
        <div class="create-content">
            <h2>You Imagine. We Create.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non consequat massa. Suspendisse at
                lacinia arcu. Maecenas volutpat sapien sit amet justo ornare egestas. Nunc lobortis nunc at sapien
                gravida, ut scelerisque risus auctor. Vestibulum at lacus sit amet mauris volutpat fermentum a et
                sapien. Nam vel sodales risus. Vestibulum sodales in dui vitae feugiat. Duis pretium sem purus,
                consectetur maximus enim faucibus id. Quisque vulputate lacinia dolor.</p>
        </div>
    </div>
</section>

<section class="story-sec p_100 pt-0">
    <div class="container">
        <div class="story-content">
            <div class="row align-items-center">
                <div class="col-md-6 story-img">
                    <div class="img">
                        <img src="{{ asset('front/img/berlin.png')}}" alt="">
                    </div>
                    <div class="overflow-text">
                        <p>25+ Years <br> of Experience in Printing Services</p>
                    </div>
                </div>
                <div class="col-md-6 story-txt">
                    <span>John Doe</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non consequat massa.
                        Suspendisse at lacinia arcu. Maecenas volutpat sapien sit amet justo ornare egestas. Nunc
                        lobortis nunc at sapien gravida, ut scelerisque risus auctor. Vestibulum at lacus sit amet
                        mauris volutpat fermentum a et sapien. Nam vel sodales risus. Vestibulum sodales in dui
                        vitae feugiat. Duis pretium sem purus, consectetur maximus enim faucibus id. Quisque
                        vulputate lacinia dolor.</p>
                    <p>Curabitur vel sollicitudin tellus. Aenean et ex tellus. Nunc egestas vel diam ut blandit.
                        Vivamus mi ipsum, dapibus et porta at, elementum et elit. Curabitur dignissim quam nec
                        mollis auctor. Nam ut orci sed mauris venenatis tincidunt ut ac sapien. Phasellus vel lacus
                        velit. Quisque cursus hendrerit enim in interdum. Suspendisse maximus arcu vel ipsum
                        commodo, non fermentum eros convallis. Vestibulum ante ipsum primis in faucibus orci luctus
                        et ultrices posuere cubilia curae; Suspendisse potenti. Phasellus ut purus non elit
                        efficitur mollis. Vestibulum id malesuada augue. Aliquam sagittis mollis ipsum quis
                        consectetur. Phasellus laoreet elementum aliquam.</p>
                </div>
            </div>
        </div>
        <div class="counter-wrapper">
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="10">
                            0
                        </span>
                        <span>mm</span>
                    </li>
                </ul>
                <p>Happy Customers</p>
            </div>
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="1500">
                            0
                        </span>
                        <span>+</span>
                    </li>
                </ul>
                <p>Team Members</p>
            </div>
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="10000">
                            0
                        </span>
                        <span>+</span>
                    </li>
                </ul>
                <p>Products</p>
            </div>
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="6">
                            0
                        </span>
                        <span></span>
                    </li>
                </ul>
                <p>Countries</p>
            </div>
        </div>
    </div>
</section>

<section class="empowering-sec p_100" style="background-color: rgba(20, 20, 20, 1);">
    <div class="container">
        <div class="empowering-content">
            <h2>Empowering Businesses Worldwide</h2>
            <p>Group Bayport, a trailblazer in the custom products industry, is a leading conglomerate of various
                e-commerce brands specializing in different customized and personalized advertising products and
                covering solutions. Group Bayport houses various brands, namely Cre8ivePrinter <br>
                , Covers & All, Giant Media, Circle One, Neon Earth, and Vivyx Printing, under its umbrella.</p>
            <div class="brand-slider">
                <div class="brand">
                    <img src="{{ asset('front/img/cr8brand1.png')}}" alt="">
                </div>
                <div class="brand">
                    <img src="{{ asset('front/img/cr8brand2.png')}}" alt="">
                </div>
                <div class="brand">
                    <img src="{{ asset('front/img/cr8brand3.png')}}" alt="">
                </div>
                <div class="brand">
                    <img src="{{ asset('front/img/cr8brand4.png')}}" alt="">
                </div>
                <div class="brand">
                    <img src="{{ asset('front/img/cr8brand5.png')}}" alt="">
                </div>
                <div class="brand">
                    <img src="{{ asset('front/img/cr8brand1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="imagine-sec p_100">
    <div class="container">
        <div class="imagine-content">
            <h2>You Imagine. We Create.</h2>
            <p>From Order Placement to Final Delivery</p>
            <div class="imagine-card">
                <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('front/img/cr8card1.png')}}" alt="">
                    </div>
                        <div class="card_body">
                            <h5>Premium Quality</h5>
                            <p>100% QualityAdherence</p>
                        </div>
                </div>
                <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('front/img/cr8card2.png')}}" alt="">
                    </div>
                        <div class="card_body">
                            <h5>Priority shipping</h5>
                            <p>For FasterDelivery</p>
                        </div>
                </div>
                <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('front/img/cr8card3.png')}}" alt="">
                    </div>
                        <div class="card_body">
                            <h5>24x7 Customer Support</h5>
                            <p>Quick & EfficientIssue Resolving</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection