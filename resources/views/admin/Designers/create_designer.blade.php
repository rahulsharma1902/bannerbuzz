@extends('admin_layout.master')
@section('content')
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">New Designer</h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="{{ route('designer.add.procc') }}" method="POST">
                        @csrf
                        <div class="col-lg-12 d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">First Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" >
                                    </div>
                                    @error('first_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Last Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" >
                                    </div>
                                    @error('last_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" >
                                    </div>
                                    @error('email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Phone Number</label>
                                    <div class="form-control-wrap">
                                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" >
                                    </div>
                                    @error('phone')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-control-wrap">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" >
                                    </div>
                                    @error('password')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>                                   
        </div>
    </div>
@endsection