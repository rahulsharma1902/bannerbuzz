@extends('user_dashboard_layout.master')
@section('content')
    <div class="col-lg-8">
        <div class="ryt_side_contnt">
            <div class="user_main_info">
                <div class="user_info">
                    <div class="user_img">
                        <span><i class="fa-solid fa-user"></i></span>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="user_dtal">
                        <h1>Hey there, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
                        <p class="subItile"><a href="#">{{ auth()->user()->email ?? '' }}</a> | <a href="{{ route('logout') }}" class="lg_out">Log out</a></p>
                    </div>
                </div>
                <div class="edit_detail">
                    <span>Edit</span>
                    <span><i class="fa-solid fa-pencil"></i></span>
                </div>
            </div>
            <div class="profl_tabs addres_tabs">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active position-relative add_new_address address_book" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Add a New Address
                        </button>
                       
                    </li>
                </ul>
                <div class="new_address">+ Add My New Address</div>
                <div class="user_address">
                    <div class="address">
                        @if($addresses->isNotEmpty())
                            @foreach($addresses as $key => $userAddress)
                                <div class="addressTitle"><h6>{{ $userAddress->first_name }}</h6></div>
                                    <div class="addressText">
                                        <p>{{ $userAddress->last_name }}</p>
                                        <p>{{ $userAddress->last_name }}</p>
                                        <p>{{ $userAddress->email }}</p>
                                        <p>{{ $userAddress->phone_number }}</p>
                                        <p>{{ $userAddress->company_name }}</p>
                                        <p>{{ $userAddress->address }}</p>
                                        <p>{{ $userAddress->additional_address }}</p>
                                        <p>{{ $userAddress->city }}</p>
                                        <p>{{ $userAddress->state }}</p>
                                        <p>{{ $userAddress->zip_code }}</p>
                                        <p>{{ $userAddress->country }}</p>
                                        <p>{{ json_decode($userAddress->additional_info) }}</p>
                                    </div>
                                    <!-- <div class="actions"><button type="button" aria-label="editicon" class="linkButton edit"><svg viewBox="0 0 15 15" width="18px" height="18px"><path d="M13.592 1.405a3.088 3.088 0 0 0-4.369 0l-8.012 8.01a.403.403 0 0 0-.114.23l-.594 4.398a.404.404 0 0 0 .398.457c.018 0 .036 0 .054-.003l2.649-.358a.404.404 0 0 0 .347-.451v-.002a.404.404 0 0 0-.453-.346l-2.124.285.415-3.067 3.228 3.228a.396.396 0 0 0 .566 0l8.012-8.01a3.084 3.084 0 0 0-.003-4.371zM2.066 9.703l7.311-7.312 1.345 1.346-7.311 7.312-1.345-1.346zM5.3 12.934l-1.316-1.316 7.311-7.312 1.316 1.316L5.3 12.934zm7.872-7.888L9.954 1.827a2.28 2.28 0 0 1 1.456-.522c.611 0 1.184.238 1.616.668.832.826.896 2.168.146 3.073z" fill="#7C7C7C"></path></svg></button><button type="button" aria-label="removeicon" class="linkButton remove"></button>
                                    </div>
                                <span class="labelAddress">Shipping</span><span class="labelAddress">Billing</span> -->
                            @endforeach
                        @endif
                    </div>
                </div>    
                <div id="user_address_form">   
                    <form action="{{route('user.address.add')}}" method="POST">
                        @csrf
                        <div class="tab-contentp-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="profile_edit">
                                    <div class="formGroupBox frmgrp">
                                        <div class="formGroup">
                                            <label for="">First Name*</label>
                                            <input type="text" class="form-control" name="first_name" value=""  />
                                        </div>  
                                        <div class="formGroup">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="" />
                                        </div>
                                    </div>
                                    <div class="formGroupBox frmgrp">    
                                        <div class="formGroup">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" value="" />
                                        </div>
                                        <div class="formGroup">
                                        <label for="">Phone Number*</label>
                                            <input type="number" id="phone_number" class="form-control" name="phone_number" />
                                        
                                        </div>
                                    </div>
                                    <div class="formGroupBox frmgrp">
                                        <div class="formGroup">
                                            <label for="">Company</label>
                                            <input type="text" id="company_name" class="form-control" name="company_name" />
                                        </div>
                                    </div>
                                    <div class="formGroupBox">
                                        <label for="">Street Address</label>
                                        <textarea class="form-control" rows="4" id="address" name="address"></textarea>
                                        <p class="sml_text">(Note: We are unable to deliver to PO Box, APO, FPO & DPO addresses)</p>
                                    </div>
                                    <div class="formGroupBox">
                                        <label for="">Additional Address</label>
                                        <textarea class="form-control" rows="4" id="additional_address" name="additional_address"></textarea>
                                        <p class="sml_text">(Note: We are unable to deliver to PO Box, APO, FPO & DPO addresses)</p>
                                    </div>
                                    <div class="formGroupBox frmgrp">
                                        <div class="formGroup">
                                            <label for="">Zip/Postal Code</label>
                                            <input id="zip_code" type="text" class="form-control" name="zip_code" />
                                        </div>
                                        <div class="formGroup">
                                            <label for="">City*</label>
                                            <input id="city" type="text" class="form-control" name="city" />
                                        </div>
                                    </div>
                                    <div class="formGroupBox frmgrp">
                                        <div class="formGroup">
                                            <label for="">State/Province</label>
                                            <input id="state" type="text" class="form-control" name="state" />
                                        </div>
                                        <div class="formGroup">
                                            <?php 
                                            $countryArray = CountryArray();
                                            ?>
                                            <select class="form-select" name="country">
                                                @foreach($countryArray as $key=>$countryName)
                                                <option value="{{$key}}">{{$countryName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="formGroupBox">
                                        <label for="">Additional Info</label>
                                        <textarea class="form-control" rows="2" id="additional_info" name="additional_info"></textarea>
                                    </div>
                                    <div class="formGroupBox">
                                        <div class="checkbox">
                                            <input type="checkbox" value="option3" id="option3" checked />
                                            <label for="option3" class="sml_text">This is my default billing address </label>
                                        </div>
                                        <div class="checkbox"><input type="checkbox" value="option4" id="option4" /> <label for="option4" class="sml_text">This is my default shipping address</label></div>
                                    </div>
                                </div>
                                <div class="btnSet">
                                    <button type="submit" class="btn sml_text">Save Address</button>
                                        <p  class="btn sml_text btn_back"><span class="lft_icn"><i class="fa-solid fa-chevron-left"></i></span>Back</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var hasAddresses = {{ $addresses->isNotEmpty()  }};
            if (hasAddresses) {
                $('#user_address_form').hide();
            } else {
                $('#user_address_form').show();
            }
        $('.new_address').click(function() {
            $('.address_book').text('Add a New Address');
            $('.new_address').hide();
            $('#user_address_form').show();           // Show the form
            $('.user_address').hide();                // Hide the existing addresses
        });

        $('.btn_back').click(function() {
            $('.address_book').text('Address Book');
            $('.new_address').show();
            $('.user_address').show();                // Show the existing addresses
            $('#user_address_form').hide();           // Hide the form
        });
    });
</script>

@endsection