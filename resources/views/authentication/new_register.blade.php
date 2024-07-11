@extends('front_layout.master') @section('content')
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
                <h2>REGISTER</h2>
                <!-- <p>Just enter a few details to get your order-status.</p> -->
            </div>
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }} </div>
            @endif
            <form action="{{ url('registerProcc') }}" method="post">
                @csrf
                <input type="hidden" name="url" value="{{ request()->get('url') ?? '' }}">
                <div class="formgroup-box">
                    <div class="formGroup halfGroup"><input type="text" name="first_name" aria-label="First Name" placeholder="First Name*" value="" />
                    @if ($errors->has('first_name'))
                     <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                    </div>
                    <div class="formGroup halfGroup"><input type="text" name="last_name" aria-label="Last Name" placeholder="Last Name*" value="" />
                        @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="formgroup-box email_fld">
                    <div class="formGroup halfGroup">
                        <input type="text" name="email" aria-label="Email" placeholder="Email Address*" value="" />
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="formGroup fieldPassword halfGroup">
                        <input type="password" name="password" id ="password" aria-label="password" placeholder="Password*" value="" />
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <!-- <span class="icon eyes"> -->
                             <span class="password-toggle-icon" onclick="togglePasswordVisibility()"><i class="fas fa-eye-slash" id="eye"></i></span>
                        <!-- </span> -->
                        <!-- <div class="passwordRequirement">
                            <span>Min 6 Characters Allowed</span>
                        </div> -->
                    </div>
                </div>

                <div class="formgroup-box">
                    <!-- <div class="formGroup halfGroup">
                        <div class="countrycode_sec">
                            <div class="select_code">
                                <select id="select_country" style="background-color: black;" >
                                    @foreach($countries as $key => $code)
                                        <option value="{{ $code }}" >{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="countryinput"><input type="text" id="code"  name="code" placeholder="+44"/></div>
                        </div>
                    </div> -->
                    <div class="formGroup halfGroup"><input type="number" min="0" aria-label="Cell Phone Number" name="phone" placeholder="Mobile Number*" inputmode="numeric" value="" />
                        @if ($errors->has('phone'))
                         <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="formgroupBox">
                    <div class="formGroup">
                        <label class="control controlCheckbox">
                            <input aria-label="sms notification" type="checkbox" name="smsnotification" checked="" />
                            <span class="controlIndicator"> </span>
                            <span class="labeltext">I accept marketing texts, including basket reminders, at this number.</span>
                        </label>
                    </div>
                </div>
                <div class="buttonSet">
                    <button type="submit" class="btn form-control my-4">Create an Account</button>
                </div>

                <div class="social_links">
                    <div class="social_title"><p>or sign up with</p></div>
                    <div class="social_content">
                        <ul>
                            <li>
                                <a href="{{ route('facebook_google') ?? '' }}">
                                    <i class="fa-brands fa-facebook-f"></i><br />
                                    <span>Facebook</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('login_google') ?? '' }}">
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
                    <p class="alreadyAccount">Already Have An Account?<a href="{{url('/login')}}" class="linkButton">Log In</button></p>
                    <div class="formGroup termsCondition">
                        <p class="readPolicy">Read Our <a class="" href="/terms-and-conditions">Terms And Conditions</a> And <a class="" href="/privacy-policy">Privacy Policy</a></p>
                    </div>
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
                        <img src="{{ asset('front/img/ways_4.svg') }}" alt="" />
                        <div class="text">
                            <p>Best Price</p>
                            <span>Cre8ive Printer offers the industry’s best prices while using only the highest</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_5.svg') }}" alt="" />
                        <div class="text">
                            <p>Free Design Proof</p>
                            <span>Our industry-leading designers provide free proofs so you can be sure</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_6.svg') }}" alt="" />
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
    $(document).ready(function(){
  
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

        $('#select_country').on('change',function(){
            var value = $(this).val();
            $('#code').val(value);
        });
    });
</script>
@endsection
