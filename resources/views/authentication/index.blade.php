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
    <!-- <section class="banner-sec">
        <div class="container-fluid">
            <div class="banner-content">
                <div class="banner-img">
                    <img src="{{ asset('front/img/cntac.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section> -->

 
    <section class="order_track_sec register_form p_100 pb-0">
        <div class="container">
            <div class="order_track_content">
                <div class="hd_txt text-center">
                    <h2>LOGIN</h2>
                    <!-- <p>Just enter a few details to get your order-status.</p> -->
                </div>
                <form action="{{ url('loginProcc') }}" method="post">
                  @csrf
                    <input type="hidden" name="url" value="{{ request()->get('url') ?? '' }}">
                    <div class="form_info">
                        <input type="email" id="email" name="email" placeholder="Your Email">
                    @if ($errors->has('email'))
                     <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                        <!-- <input type="password" id="password" name="password" placeholder="Your Password"> -->
                        <div class="password-container">
                            <input type="password" id="password" name="password" placeholder="Your Password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                            <span  class="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye-slash" id="eye"></i>
                            </span>
                        </div>                     
                        <!-- <div class="">
                            <div class="g-recaptcha" data-sitekey="6LfWkd0mAAAAAHjVHtaMeA34uKJ-0SLcd33sUoqb"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div> 
                        </div> -->
                        <div class="otpbutton">
                            <a class="linkButton forgotLink otpLink">
                                <!-- <span>Get Email OTP&nbsp;</span></a> -->
                                <span></span></a>
                            <a href="forgot-password" class="linkButton forgotLink">
                                <button class="linkButton forgotLink"></button>Forgot Password?</a>
                            </div>
                            <div class="buttonSet creat_accnt">
                                   <button type="submit" class="btn">Login</button>
                            </div>
                    </div>
                     <div class="social_links">
                        <div class="social_title"><p>or sign in with</p></div>
                    <div class="social_content">
                        <ul>
                        

                            <li>
                            <a href="{{ route('facebook_google') }}" >
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
                    <p class="alreadyAccount">Don't have an account?<a href="{{ url('/register') }}" class="linkButton" >Sign Up</a></p>
                    
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

    $(function(){
  
  $('#eye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#password').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#password').attr('type','password');
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
@endif

@endsection
