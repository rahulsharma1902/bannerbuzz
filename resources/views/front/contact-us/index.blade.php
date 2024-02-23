@extends('front_layout.master')
@section('content')
<section class="brad_inner">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="banner-sec">
    <div class="container-fluid">
        <div class="banner-content">
            <div class="banner-img">
                <img src="{{ asset('front/img/cntac.png') }}" alt="" />
            </div>
           
        </div>
    </div>
</section>

<section class="inquiry_sec p_100">
    <div class="container">
        <div class="inquiry_content">
            <div class="hd-text">
                <h2>So, how would you ping us?</h2>
                <p>
                    Be it a cheerful question, or an angry one. Our happiness team is all equipped to solve your <br />
                    doubts. Just fill up the inquiry form or use the contact details to track us down.
                </p>
            </div>
            <div class="inquiry-form">
                <div class="form_rw d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            Inquiry Form <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                        </button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            Contact Address<span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                        </button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            Send Us a Message<span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                        </button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h5>Inquiry Form</h5>
                            <form action="/action_page.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg" id="fname" placeholder="First Name" name="First Name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg" placeholder="Phone Number" name="Member" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg" placeholder="Your Email" name="Email" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg" placeholder="Company Name" name="Company Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="upld-lnk"><a href="#" class="btn light_dark">Submit</a></div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="get_in_sec">
    <div class="container">
        <div class="get-in-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="get-lft-info">
                        <h1>Get in Touch!</h1>
                        <div class="get-lnks">
                            <p><span><img src="{{ asset('front/img/ml.png') }}" class="img-fluid" alt=""></span><a href ="contact@cre8iveprinter.com">contact@cre8iveprinter.com</a></p>
                              <p><span><img src="{{ asset('front/img/lct.png')}}" class="img-fluid" alt=""></span><a href ="">8975 W Charleston Blvd. Suite 190<br>
Las Vegas, NV 89117</a></p>
                                <p><span><img src="{{ asset('front/img/tel.png')}}" class="img-fluid" alt=""></span><a href="tel:0 123 4567 890"> 
0 123 4567 890
</a> </p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="get-lft-loct">
                        <div class="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.940548225713!2d-0.1075503!3d51.5143067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b2cf56409b%3A0x146a7c8119c6d3c!2sSecond%20Floor%2C%20151%20Fleet%20St%2C%20London%20EC4A%202DQ%2C%20UK!5e0!3m2!1sen!2sin!4v1680165891492!5m2!1sen!2sin&quot; width=&quot;600&quot; height=&quot;450&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; loading=&quot;lazy&quot; referrerpolicy=&quot;no-referrer-when-downgrade" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="400"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="best_price bst_pr p_100 pb-0">
    <div class="container">
        <div class="ways_hd">
            <ul class="shipping">
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_4.svg')}}" alt="" />
                        <div class="text">
                            <p>Best Price</p>
                            <span>Cre8ive Printer offers the industry’s best prices while using only the highest</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_5.svg')}}" alt="" />
                        <div class="text">
                            <p>Free Design Proof</p>
                            <span>Our industry-leading designers provide free proofs so you can be sure</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_6.svg')}}" alt="" />
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