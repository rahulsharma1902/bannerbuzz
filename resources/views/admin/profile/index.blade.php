@extends('admin_layout.master')
@section('content')
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Admin profile
                </h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="{{ url('admin-dashboard/update-profile-procc') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="user_name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="user_name" class="form-control" id="user_name" value="{{ Auth::user()->user_name}}" >
                                    </div>
                                    @error('user_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name"> Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email}}" >
                                    </div>
                                    @error('email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name"> Number</label>
                                    <div class="form-control-wrap">
                                        <input type="number" name="number" class="form-control" id="number" value="{{ Auth::user()->number ?? '' }}" >
                                    </div>
                                    @error('number')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group mt-3">
                            <button type="submit"
                                class="btn btn-lg btn-primary">Update </button>
                        </div>
                    </form>
                </div>
                <div class="card card-bordered card-preview d-none p-3 my-5" id="changepasswordCard">
                    <div class="card-inner">
                        <div class="preview-block">
                            <div class="d-flex justify-content-between">
                                <span class="preview-title-lg overline-title">Change Password</span>
                                <span class="close"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <form action="{{ url('admin-dashboard/change-password-procc') }}" method="POST" >
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="name"> Old Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" name="old_password" id="old_password"
                                                    placeholder="Old Password">
                                                    @error('old_password')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="name"> New Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" name="new_password" id="new_password"
                                                    placeholder="New Password">
                                                    @error('new_password')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="name"> Confirm Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation"
                                                    placeholder="Confirm Password">
                                                    @error('new_password_confirmation')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary add" id="add"><span
                                                    id="button_value">Update</span></button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-12 mt-3 text-right">
                <div class="d-flex justify-content-end">
                   <button type="button" class="btn btn-primary add-new" id="changepass">
                      <span>Change Password</span>
                  </button>
               </div>
            </div>                                    
        </div>
    </div>
    <script>
        $('#changepass').click(function(){
            $('#changepasswordCard').removeClass('d-none');
            $(this).hide();
           
        });
         $('.close').click(function(){
                $('#changepasswordCard').addClass('d-none');
                $('#changepass').show();
            });
    </script>
@endsection
