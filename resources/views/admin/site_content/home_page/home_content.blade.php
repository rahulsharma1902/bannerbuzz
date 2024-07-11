@extends('admin_layout.master')
@section('content')
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">Home Content</h5>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <form action="{{url('admin-dashboard/home-content-update')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 d-flex p-2">
                        <div class="col-lg-4">
                            <div class="form-group" id="display_offer">
                                <label class="form-label" for="display_offer">Display Offer:</label>
                                <div class="btn-group p-2" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" value="1" name="display_offer" id="display_offer_active" @if(isset($home_content->display_offer )&& $home_content->display_offer == 1) checked @endif
                                            autocomplete="off"> Active
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" value="0" name="display_offer" id="display_offer_inactive" @if(isset($home_content->display_offer) && $home_content->display_offer == 0) checked @endif
                                            autocomplete="off"> Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" id="display_offer_content" @if(isset($home_content->display_offer )&& $home_content->display_offer == 0) style="display: none;" @endif>
                            <div class="form-group d-flex justify-content-center p-2" id="display_offer">
                                <label class="form-label" for="Offer_text">Offer text : </label>
                                <div class="form-control-wrap col-lg-6 ">
                                    <input type="text" name="offer_text" value="{{$home_content->offer_text ?? ''}}" class="form-control" id="Offer_text">
                                </div>
                                @error('offer_text')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" id="top_text">
                            <label class="form-label" for="top_text">Header Top Text:</label>
                            <div class="form-control-wrap p-2">
                                <input type="text" name="top_text"
                                    value="{{$home_content->top_text ?? ''}}" class="form-control"
                                    id="header_top_text">
                            </div>
                            @error('top_text')
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" id="header_image">
                                <label class="form-label" for="header_image">Header Image </label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="header_image" class="form-control" id="header_image">
                                </div>
                                @error('header_image')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (isset($home_content->header_image))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                        <img src="{{ asset('Site_Images') ?? '' }}/{{$home_content->header_image ?? '' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Url</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="header_image_url"
                                        value="{{$home_content->header_image_url ?? ''}}" class="form-control"
                                        id="header_image_url">
                                </div>
                                @error('header_image_url')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h3>Ads Section</h3>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Image 1</label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="ads_image_1" class="form-control" id="image_1">
                                </div>
                                @error('ads_image_1')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (isset($home_content->ads_image_1))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                        <img src="{{ asset('Site_Images') ?? '' }}/{{$home_content->ads_image_1 ?? '' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Url</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="ads_image_1_url"
                                        value="{{$home_content->ads_image_1_url ?? ''}}" class="form-control"
                                        id="image_1_url">
                                </div>
                                @error('ads_image_1_url')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Image 2</label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="ads_image_2" class="form-control" id="image_2">
                                </div>
                                @error('ads_image_2')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (isset($home_content->ads_image_2))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                        <img src="{{ asset('Site_Images') ?? '' }}/{{$home_content->ads_image_2 ?? '' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Url</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="ads_image_2_url"
                                        value="{{$home_content->ads_image_2_url ?? ''}}" class="form-control"
                                        id="image_2_url">
                                </div>
                                @error('ads_image_2_url')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h4>Bottom Section</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Bottom title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->bottom_title ?? ''}}" name="bottom_title"
                                        id="bottom_title">
                                    @error('bottom_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Description</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="bottom_description" class="description form-control"
                                        id="bottom_description"
                                        placeholder="short description.....">{{$home_content->bottom_description ?? ''}}</textarea>
                                    @error('bottom_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email">Contact Email</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->email ?? ''}}" name="email" placeholder="Contact Email"
                                        id="email">
                                    @error('email')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="number">Contact Number</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->phone ?? ''}}" name="number" placeholder="Contact Number"
                                        id="number">
                                    @error('number')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="address">Address</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->address ?? ''}}" name="address" placeholder="Contact Address"
                                        id="address">
                                    @error('address')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="instagram">Instagram</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->instagram ?? ''}}" name="instagram" placeholder="Instagram"
                                        id="instagram">
                                    @error('instagram')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="facebook">Facebook</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->facebook ?? ''}}" name="facebook" placeholder="Facebook"
                                        id="facebook">
                                    @error('facebook')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="twitter">Twitter</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->twitter ?? ''}}" name="twitter" placeholder="Twitter"
                                        id="twitter">
                                    @error('twitter')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="whatsapp">WhatsApp</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$home_content->whatsapp ?? ''}}" name="whatsapp" placeholder="whatsapp"
                                        id="whatsapp">
                                    @error('whatsapp')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="chatScript">Chat Script</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="chatScript" class="form-control" id="chatScript" cols="30" rows="10" value="{{$home_content->chatScript ?? ''}}" placeholder="Chat Script">{{$home_content->chatScript ?? ''}}</textarea>
                                    <!-- <input type="text" class="form-control"
                                        value="{{$home_content->chatScript ?? ''}}" 
                                        id="chatScript"> -->
                                    @error('chatScript')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('input[type=radio][name=display_offer]').change(function() {
        if (this.id === 'display_offer_active') {
            $('#display_offer_content').show();
        } else if (this.id === 'display_offer_inactive') {
            $('#display_offer_content').hide();
        }
    });
});
</script>

@endsection