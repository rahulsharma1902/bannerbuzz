@extends('admin_layout.master')

@section('content')
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="title nk-block-title">Website Setting</h4>
                        <div class="nk-block-des">
                            <p>You can update your payment and other setting here.</p>
                        </div>
                    </div>
                </div>

                <!-- Stripe Settings -->
                <div class="card card-bordered my-4">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Stripe Settings</h5>
                        </div>
                        <form action="{{ url('admin-dashboard/update-key') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($envArray))
                                @foreach ($envArray as $key => $value)
                                    @if(in_array($key, ['STRIPE_KEY', 'STRIPE_SECRET']))
                                        <div class="row g-3 my-4 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="{{ $key }}">{{ $key }}</label>
                                                    <span class="form-note">Specify the {{ $key }} of your website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea style="min-height: 65px" name="{{ $key }}" class="form-control" id="{{ $key }}" cols="30" rows="2">{{ $value }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="row g-3">
                                <div class="col-lg-7 offset-lg-5">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Stripe Settings</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- card -->

                <!-- PayPal Settings -->
                <div class="card card-bordered my-4">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">PayPal Settings</h5>
                        </div>
                        <form action="{{ url('admin-dashboard/update-key') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($envArray))
                                @foreach ($envArray as $key => $value)
                                    @if(in_array($key, ['PAYPAL_MODE', 'PAYPAL_SANDBOX_CLIENT_ID', 'PAYPAL_SANDBOX_CLIENT_SECRET']))
                                        <div class="row g-3 my-4 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="{{ $key }}">{{ $key }}</label>
                                                    <span class="form-note">Specify the {{ $key }} of your website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea style="min-height: 65px" name="{{ $key }}" class="form-control" id="{{ $key }}" cols="30" rows="2">{{ $value }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="row g-3">
                                <div class="col-lg-7 offset-lg-5">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Update PayPal Settings</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- card -->

                <!-- Google Settings -->
                <div class="card card-bordered my-4">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Google Settings</h5>
                        </div>
                        <form action="{{ url('admin-dashboard/update-key') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($envArray))
                                @foreach ($envArray as $key => $value)
                                    @if(in_array($key, ['GOOGLE_CLIENT_ID', 'GOOGLE_CLIENT_SECRET']))
                                        <div class="row g-3 my-4 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="{{ $key }}">{{ $key }}</label>
                                                    <span class="form-note">Specify the {{ $key }} of your website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea style="min-height: 65px" name="{{ $key }}" class="form-control" id="{{ $key }}" cols="30" rows="2">{{ $value }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                   
                                @endforeach
                                @if(isset($envArray) && isset($envArray['GOOGLE_REDIRECT_URI']))
                                        <div class="row g-3 my-4 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="GOOGLE_REDIRECT_URI">GOOGLE_REDIRECT_URI</label>
                                                    <span class="form-note">This is GOOGLE_REDIRECT_URI of your website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <!-- <textarea style="min-height: 65px" name="" class="form-control" id="GOOGLE_REDIRECT_URI" cols="30" rows="2">{{ $envArray['GOOGLE_REDIRECT_URI'] }}</textarea> -->
                                                        <input type="text" disabled class="form-control" id="GOOGLE_REDIRECT_URI" value="{{ $envArray['GOOGLE_REDIRECT_URI'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                            @endif
                            <div class="row g-3">
                                <div class="col-lg-7 offset-lg-5">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Google Settings</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- card -->

                 <!-- DropBox Settings -->
                 <div class="card card-bordered my-4">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">DropBox Settings</h5>
                        </div>
                        <form action="{{ url('admin-dashboard/update-key') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($envArray))
                                @foreach ($envArray as $key => $value)
                                    @if(in_array($key, ['DROPBOX_CLIENT_ID', 'DROPBOX_SECRET_ID' , 'DROPBOX_ACCESS_TOKEN']))
                                        <div class="row g-3 my-4 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="{{ $key }}">{{ $key }}</label>
                                                    <span class="form-note">Specify the {{ $key }} of your website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea style="min-height: 65px" name="{{ $key }}" class="form-control" id="{{ $key }}" cols="30" rows="2">{{ $value }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="row g-3">
                                <div class="col-lg-7 offset-lg-5">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Update DropBox Settings</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- card -->
            </div>
        </div>
    </div>
@endsection
