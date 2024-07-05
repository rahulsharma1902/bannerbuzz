@extends('user_dashboard_layout.master')
@section('usercontent')

<div class="col-lg-9">
    <div class="ryt_side_contnt">
        <div class="user_main_info">
            <div class="user_info">
                <div class="user_img">
                    <span><i class="fa-solid fa-user"></i></span>
                </div>

                <div class="user_dtal">
                    <h1>Hey there , {{ auth()->user()->first_name ?? '' }} {{ auth()->user()->last_name ?? '' }}</h1>
                    <p class="subItile"><a href="#">{{ auth()->user()->email}}</a> | <a href="{{route('logout')}}" class="lg_out">Log out</a></p>
                </div>

            </div>
            <!-- <div class="edit_detail">
                    <span>Edit</span>
                    <span><i class="fa-solid fa-pencil"></i></span>
                </div> -->
        </div>
        <div class="profl_tabs">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active position-relative" id="pills-home-tab" data-name="pills-home" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        Edit Profile
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative" id="pills-profile-tab" data-name="pills-profile" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Change My Password
                    </button>
                </li>
            </ul>

            <div class="tab-contentp-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="verified_otp" value="">
                        <div class="profile_edit">
                            <div class="formGroupBox frmgrp">
                                <div class="formGroup">
                                    <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}" placeholder="First Name" />
                                    <span class="text-danger">
                                        @error('first_name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="formGroup">
                                    <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}" placeholder="Last Name" />
                                    <span class="text-danger">
                                        @error('last_name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="formGroupBox">
                                <div class="formGroup">
                                    <input type="tel" id="phone" class="form-control" value="{{ auth()->user()->number }}" name="phone" placeholder="Cell Phone Number" />
                                    <span class="text-danger">
                                        @error('phone')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="formGroupBox">
                                <!-- <div class="checkbox">
                                    <input type="checkbox" value="option1" id="option1"/>
                                    <label for="option1" class="sml_text">I’d like to be updated via SMS/TEXT</label>
                                </div> -->

                                <div class="checkbox"><input type="checkbox" name="change_email" id="change_email" value="changeEmail" /> <label for="change_email" class="sml_text">Change Email</label></div>
                            </div>
                            <div id="otp_div" style="display:none">
                                <div class="formGroupBox">
                                    <label for="otp" class="ltl_txt">Otp:</label>
                                    <input type="number" class="form-control" id="otp" value="" placeholder="Enter otp" name="otp"/>
                                </div>
                                <div class="btnSet justify-content-between" id="ver-btn" style="display:flex;">
                                    <button type="button" id="verify_btn" onclick="verifyOtp()" class="btn sml_text">Verify</button>
                                    <a id="resend_otp" style="display:none;" type="button" onclick="sendOtp()" >resend otp</a>
                                </div>
                                <div id="myTimer"></div>
                            </div>
                            <div class="formGroupBox">
                                <label for="email_input" class="ltl_txt">Email:</label>
                                <input type="email" class="form-control" id="email_input" value="{{ auth()->user()->email }}" placeholder="Enter email" name="email" disabled/>
                            </div>
                        </div>
                        <div class="btnSet">
                            <button type="submit" class="btn sml_text">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="{{ route('user.password.update') }}" method="post">
                        @csrf
                        <div class="profile_edit">
                            <div class="formGroupBox frmgrp">

                                <div class="formGroup">
                                    <input type="password" class="form-control" name="current_password"  placeholder="Current password" />
                                    <span class="text-danger">
                                        @error('current_password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="formGroup">
                                    <input type="password" class="form-control" name="new_password"  placeholder="New Password" />
                                    <span class="text-danger">
                                        @error('new_password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="btnSet">
                            <button type="submit" class="btn sml_text">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.nav-link').on('click',function(){
            // $('.nav-link').removeClass('active');
            // $(this).addClass('active');

            $target_value = $(this).data('name');
            $('.tab-pane').addClass('d-none');
            $('.tab-pane').removeClass('active');
            $('#'+$target_value).addClass('active');
            $('#'+$target_value).removeClass('d-none');

        });

        $('#change_email').on('change',function(){
            if ($(this).is(':checked')) {
                sendOtp();
            } else {
                $('#otp_div').hide();
                $('#email_input').prop('disabled', true); 
            }
        });

        

    });

     
    function sendOtp()
    {
        var data = {
            email: $('#email_input').val(),
            _token :"{{ csrf_token() }}",
        }
        $.ajax({
            url: "{{ url('user-dashboard/change/email') }}",
            type: "post",
            data: data,
            dataType: "json",
            success: function(response){
                if(response){
                    iziToast.success({
                        message: 'Please check your gmail for verification code',
                        position: 'topRight' 
                    });
                    countdown();
                    $('#otp_div').show();
                    
                }
            }
        });
    }

    timer = 60;
    function countdown(){
        timer-- ;

        if(timer > 0){
            $('#myTimer').html('');
            minutes = Math.floor(timer / 60) % 60;
            seconds = Math.floor(timer) % 60;
            var time = '<p>Time left :'+minutes+':'+seconds+'</p>';
            $('#myTimer').html(time);
            setTimeout(countdown,1000);
        }else{
            $('#resend_otp').show();
            // $('#otp_div').hide();
            // $('#change_email').prop('checked', false); 
            $('#myTimer').html('Otp vaild for only 5 minutes');
        }
    }

    function verifyOtp(){
        var otp = $('#otp').val();
        if(otp !== undefined && otp !== null && otp !== ''){
            var data = {
                otp: otp,
                user_id: $("input[name=id]").val(),
                _token: "{{ csrf_token() }}"
            }
            $.ajax({
                url: "{{ url('user-dashboard/verifyOtp') }}",
                type: "post",
                data: data,
                dataType: "json",
                success: function(response){
                    if(response.code == '200'){
                        $('#email_input').prop('disabled', false);
                        $('#otp_div').hide();
                        $('#ver-btn').hide();
                        $('#otp').prop('disabled', true);
                        $('input[name="verified_otp"]').val(otp);
                        $('#myTimer').hide();
                        iziToast.success({
                            message: response.success,
                            position: 'topRight' 
                        });
                    }else if(response.code == '500'){
                        $('#email_input').prop('disabled', true);
                        // $('#ver-btn').hide();
                        // $('#otp').prop('disabled', true);
                        // $('#myTimer').hide(); 
                        iziToast.error({
                            message: response.error,
                            position: 'topRight' 
                        });
                    }else if(response.code == '400'){
                        $('#email_input').prop('disabled', true);
                        $('#ver-btn').hide();
                        $('#otp').prop('disabled', true);
                        $('#myTimer').hide(); 
                        iziToast.error({
                            message: response.error,
                            position: 'topRight' 
                        });
                    }
                }
            })
        }
    }

</script>

<script>
    // Disable right click 
    // document.addEventListener('contextmenu', (e) => e.preventDefault());

    // function ctrlShiftKey(e, keyCode) {
    //     return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
    // }

    // document.onkeydown = (e) => {
    // // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
    //     if (
    //         event.keyCode === 123 ||
    //         ctrlShiftKey(e, 'I') ||
    //         ctrlShiftKey(e, 'J') ||
    //         ctrlShiftKey(e, 'C') ||
    //         (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
    //     )
    //     return false;
    // };
</script>

@endsection