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
                        <h1>Hey there, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
                        <p class="subItile"><a href="#">{{ auth()->user()->email ?? '' }}</a> | <a href="{{ route('logout') }}" class="lg_out">Log out</a></p>
                    </div>
                    <!-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif -->
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
                            Addresses
                        </button>
                    </li>
                </ul>
                <div class="parent-container d-flex" >
                    <div id="user_address_div" class="user_address" @if(!$addresses->isNotEmpty()) style="display:none;" @endif >
                        <div class="address">
                            <div id="AddNewAddress" class="address-container">
                                <div class="add-new-address">
                                    <p>
                                        <span class="add-icon" ><i class="fa-solid fa-plus"></i></span>
                                        <span>Add new address</span>
                                    </p>
                                </div>
                            </div>
                            @if($addresses->isNotEmpty())
                                @foreach($addresses as $key => $userAddress)
                                    <div class="address-container">
                                        <div class="address-head d-flex ">
                                            <h6>{{ $userAddress->first_name }} {{ $userAddress->last_name }}</h6>
                                            <p class="icon-container">
                                                <span class="edit-icon edit_btn" data-id="{{ $userAddress->id }}"  ><i class="fa-solid fa-pen"></i></span>
                                                <span class="remove-icon delete_btn" data-id="{{ $userAddress->id }}" ><i class="fa-solid fa-xmark"></i></span>
                                            </p>
                                        </div>
                                        <div class="address-data-container">
                                            <p> 
                                                <span>{{ $userAddress->email }}</span>
                                                <span>{{ $userAddress->phone_number }}</span>
                                                <span>{{ $userAddress->company_name }}</span>
                                                <span>{{ $userAddress->address }} {{ $userAddress->additional_address }} ,{{ $userAddress->city }}</span>
                                                <span>{{ $userAddress->zip_code }}-{{ $userAddress->state }}</span>
                                                <span>{{ countryName($userAddress->country) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>    
                 
                    <div id="user_address_form" @if($addresses->isNotEmpty()) style="display:none;" @endif >   
                        <form action="{{route('user.address.add')}}" method="POST">
                            @csrf
                            <div class="tab-contentp-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="profile_edit">
                                        <div class="formGroupBox frmgrp">
                                            <input type="hidden" id="id" name="id" value="">
                                            <div class="formGroup">
                                                <label for="">First Name*</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" value=""  />
                                                <span class="text-danger">
                                                    @error('first_name')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>  
                                            <div class="formGroup">
                                                <label for="">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="" />
                                                <span class="text-danger">
                                                    @error('last_name')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="formGroupBox frmgrp">    
                                            <div class="formGroup">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="" />
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="formGroup">
                                                <label for="">Phone Number*</label>
                                                <input type="number" id="phone_number" class="form-control" name="phone_number" value=""/>
                                                <span class="text-danger">
                                                    @error('phone_number')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="formGroupBox frmgrp">
                                            <div class="formGroup">
                                                <label for="">Company(optional)</label>
                                                <input type="text" id="company_name" class="form-control" name="company_name" value=""/>
                                                <span class="text-danger">
                                                    @error('company_name')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="formGroupBox">
                                            <label for="">Street Address</label>
                                            <textarea class="form-control" rows="4" id="address" name="address" >@isset($userAddress){{$userAddress->address}}@endisset</textarea>
                                            <p class="sml_text">(Note: We are unable to deliver to PO Box, APO, FPO & DPO addresses)</p>
                                            <span class="text-danger">
                                                @error('address')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="formGroupBox">
                                            <label for="">Additional Address</label>
                                            <textarea class="form-control" rows="4" id="additional_address" name="additional_address"></textarea>
                                            <p class="sml_text">(Note: We are unable to deliver to PO Box, APO, FPO & DPO addresses)</p>
                                            <span class="text-danger">
                                                @error('additional_address')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="formGroupBox frmgrp">
                                            <div class="formGroup">
                                                <label for="">Zip/Postal Code</label>
                                                <input id="zip_code" type="text" class="form-control" name="zip_code" value=""/>
                                                <span class="text-danger">
                                                    @error('zip_code')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="formGroup">
                                                <label for="">City*</label>
                                                <input id="city" type="text" class="form-control" name="city" value="" />
                                                <span class="text-danger">
                                                    @error('city')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="formGroupBox frmgrp">
                                            <div class="formGroup">
                                                <label for="">State/Province</label>
                                                <input id="state" type="text" class="form-control" name="state"  value=""/>
                                                <span class="text-danger">
                                                    @error('state')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="formGroup">
                                                <?php 
                                                    $countryArray = CountryArray();
                                                ?>
                                                <label for="">Country</label>
                                                <select class="form-select" name="country" id="country">
                                                    @foreach($countryArray as $key=>$countryName)
                                                    <option value="{{ $key }}">{{ $countryName }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('country')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
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
                                        <p id="backButton" class="btn sml_text btn_back"><span class="lft_icn"><i class="fa-solid fa-chevron-left"></i></span>Back</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#AddNewAddress').click(function() {
            
            $('#user_address_div').hide();

            $('#user_address_form input[type="text"], #user_address_form input[type="email"], #user_address_form input[type="number"], #user_address_form textarea').val('');
    
            // Reset any select elements if needed
            $('#user_address_form select').prop('selectedIndex', 0);

            $('#user_address_form').show();           // Show the form
        });

        $('#backButton').click(function() {
            $('#user_address_div').show();
            $('#user_address_form').hide();            // Hide the form
        });
        $('.edit_btn').on('click',function(){
            $('#user_address_form').show();  
            $('#user_address_div').hide();
            let userId = $(this).data('id');
            // console.log(userId);
            $.ajax({
                url: '{{route('user.view.detail')}}', 
                type: 'GET', 
                data: {
                    id: userId,
                    _token: '{{ csrf_token() }}'  
                },
                success: function(response) {
                    console.log(response);
                    var userAddress = response.userAddresses;
                    $('#id').val(userAddress.id);
                    $('#first_name').val(userAddress.first_name);
                    $('#last_name').val(userAddress.last_name);
                    $('#email').val(userAddress.email);
                    $('#company_name').val(userAddress.company_name);
                    $('#phone_number').val(userAddress.phone_number);
                    $('#address').val(userAddress.address);
                    $('#additional_address').val(userAddress.additional_address);
                    $('#zip_code').val(userAddress.zip_code);
                    $('#city').val(userAddress.city);
                    $('#state').val(userAddress.state);
                    $('#country').val(userAddress.country); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });   
        });
        $('.btn_back').on('click', function() {
            $(this).closest('#user_address_form').find('input[name="id"]').val('');
        });
       $('.delete_btn').on('click',function(){

        var userId = $(this).data('id');
        // var userId = $(this).closest('.parent-container').find('input[name="id"]').val();
        console.log(userId);
        if (confirm('Are you sure you want to delete this address?')) {

        $.ajax({
                url: '/user-dashboard/delete/address',
                type: 'POST',
                data: {
                    id: userId,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    alert('Address deleted successfully.');   
                    window.location.href = '/user-dashboard/address';
                },
                error: function(xhr, status, error) {
                    alert('Error deleting address. Please try again.');
                    console.error(xhr.responseText);
                }
            });
          };
       });
    });

    // $('#overlay').show();
</script>
    @if(Session::has('success'))
        <script>
            iziToast.success({
                message: '{{ Session::get("success") }}',
                position: 'topRight'
            });
        </script>
    @elseif(Session::has('error'))  
        <script>
            iziToast.error({
                message: '{{ Session::get("success") }}',
                position: 'topRight'
            });
        </script>  
    @endif
@endsection