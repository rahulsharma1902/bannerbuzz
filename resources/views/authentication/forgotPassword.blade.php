@extends('front_layout.master')
@section('content')
<style>
    .password-container {
        position: relative;
    }



    .toggle-password {
        position: absolute;
        top: 40%;
        right: 5px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 15px;
    }
</style>
<section class="banner-sec">
    <div class="container-fluid">
        <div class="banner-content">
            <div class="banner-img">
                <img src="{{ asset('front/img/cntac.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>


<section class="order_track_sec register_form p_100 pb-0">
    <div class="container">
        <div class="order_track_content">
            <div class="hd_txt text-center">
                <h4>Forgot Password</h4>
            </div>

            <form action="" method="post">
                @csrf
                <!-- <input type="hidden" name="url" value="{{ request()->get('url') ?? '' }}"> -->
                <div class="form_info">
                    <div class="email_forgot">
                        <input type="email" id="email" name="email" placeholder="Your Email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <span class="text-danger email_error"></span>

                    </div>
                    <div class="number_container" style="display: none;">
                        <input type="number" id="otp_create" name="otp" placeholder="Enter Your OTP">
                        <span class="text-danger otp_error"></span>
                        @if ($errors->has('number'))
                        <span class="text-danger">{{ $errors->first('number') }}</span>
                        @endif
                    </div>

                    <!-- password hidden -->
                    <div class="new_confirm_pass_div" style="display: none;">
                        <div class="password-container">
                            <input type="password" id="new_password" name="password" placeholder="Enter Your New Password">
                            <span class="text-danger new_pass_error"></span>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye-slash" id="eye"></i>
                            </span>
                        </div>
                        <div class="password-container">
                            <input type="password" id="password_confirm" name="password_confirmation" placeholder="Enter Your Confirm Password">
                            <span class="text-danger " id="confirm_pass_error"></span>
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye-slash" id="eye-confirm"></i>
                            </span>
                        </div>
                    </div>

                    <!-- end password hidden -->


                    <!-- <div class="">
                            <div class="g-recaptcha" data-sitekey="6LfWkd0mAAAAAHjVHtaMeA34uKJ-0SLcd33sUoqb"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div> 
                        </div> -->

                    <!-- <div class="otpbutton">
                            <a class="linkButton forgotLink otpLink">
                                <span>Get Email OTP</span></a>
                                <button class="linkButton forgotLink">Forgot Password?</button>
                            </div> -->
                    <div class="buttonSet creat_otp">
                        <button type="submit" class="btn send_otp form-control">Get Otp</button>
                    </div>
                    <div class="buttonSet otp_confirm" style="display: none;">
                        <button type="submit" class="btn confirm_otp form-control">Confirm OTP</button>
                    </div>
                    <div class="buttonSet new_password" style="display: none;">
                        <button type="submit" class="btn create_new_password form-control">New Password</button>
                    </div>
                </div>

                <div class="social_links">
                    <div class="social_title">
                        <p>or sign in with</p>
                    </div>
                    <div class="social_content">
                        <ul>
                            <li>
                                <a href="{{route('facebook_google')}}">
                                    <i class="fa-brands fa-facebook-f"></i><br />
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login_google') }}">
                                    <i class="fa-brands fa-google"></i><br />
                                    <span>Google</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <i class="fa-brands fa-amazon"></i><br />
                                    <span>Amazon</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <p class="alreadyAccount">Don't have an account?<a href="{{ url('/register') }}" class="linkButton">Sign Up</a></p>

                    <!--  <div class="formGroup termsCondition">
                        <p class="readPolicy">Read Our <a class="" href="/terms-and-conditions">Terms And Conditions</a> And <a class="" href="/privacy-policy">Privacy Policy</a></p>
                    </div> -->
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
<script>
    $(function() {

        $('#eye').click(function() {

            if ($(this).hasClass('fa-eye-slash')) {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#new_password').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#new_password').attr('type', 'password');
            }
        });
    });
    $(function() {

        $('#eye-confirm').click(function() {

            if ($(this).hasClass('fa-eye-slash')) {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#password_confirm').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#password_confirm').attr('type', 'password');
            }
        });
    });
    $(document).ready(function() {
        $('.send_otp').click(function(e) {
            e.preventDefault();
            var email = $('#email').val();
            console.log(email);
            if (email == null || email == undefined || email == '') {
                $('.email_error').text('Email field is required');
            } else {
                $.ajax({
                    url: "{{ route('forgot.process') }}",
                    type: 'post',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.message) {
                            $('.number_container').show();
                            $('.creat_otp').hide();
                            $('.email_forgot').hide();
                            $('.otp_confirm').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.email_error').text(JSON.parse(xhr.responseText).error);
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('.otp_confirm').click(function(e) {
            e.preventDefault();

            var otp = $('#otp_create').val();
            console.log(otp);

            if (otp == null || otp == undefined || otp == '') {
                $('.otp_error').text('OTP field is required');
            } else {
                $.ajax({
                    url: "{{ route('otp.confirm') }}",
                    type: 'post',
                    data: {
                        otp: otp,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('.number_container').hide();
                            $('.creat_otp').hide();
                            $('.email_forgot').hide();
                            $('.otp_confirm').hide();
                            $('.new_confirm_pass_div').show();
                            $('.new_password').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.otp_error').text(JSON.parse(xhr.responseText).error);
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $('.create_new_password').click(function(e) {
            e.preventDefault();
            var email = $('#email').val();
            var password = $('#new_password').val();
            var confirmPass = $('#password_confirm').val();
            $('.new_pass_error').text('');
            $('#confirm_pass_error').text('');
            if (password == null || password.trim() === '') {
                $('.new_pass_error').text('New password field is required');
                return;
            }
            if (confirmPass == null || confirmPass.trim() === '') {
                $('#confirm_pass_error').text('Confirm password field is required');
                return;
            }
            if (password !== confirmPass) {
                $('#confirm_pass_error').text('New password and Confirm password do not match');
                return;
            }
            if (password.length < 6) {
            $('.new_pass_error').text('Password must be at least 6 characters long.');
            } 
            else {
                $.ajax({
                    url: "{{ route('new.password') }}",
                    type: 'post',
                    data: {
                        email: email,
                        password: password,
                        confirmPass: confirmPass,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            iziToast.success({
                                message: response.success,
                                position: 'topRight'
                            });
                            window.location.href = response.redirect;
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.new_pass_error').text(JSON.parse(xhr.responseText).error);
                        var errorMessage = xhr.responseJSON.error;
                        iziToast.error({
                            message: errorMessage,
                            position: 'topRight'
                        });
                    }
                });
            }
        });
    });
</script>
@if(Session::has('error'))
<script>
    iziToast.error({
        message: '{{ Session::get("error") }}',
        position: 'topRight'
    });
</script>
@elseif(Session::has('success'))
<script>
    iziToast.success({
        message: '{{ Session::get("success") }}',
        position: 'topRight'
    });
</script>
@endif

@endsection