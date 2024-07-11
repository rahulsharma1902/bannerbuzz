@extends('admin_layout.master')
@section('content')
<style>
.ck {
    height: auto !important;
} 
</style>
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">Privacy Policy</h5>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <form action="{{url('admin-dashboard/privacy-policy')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-12">
                            <div class="form-group" id="title">
                                <label class="form-label" for="title">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="title"
                                        value="{{$privacyPolicy->title ?? ''}}" class="form-control"
                                        id="title">
                                </div>
                                @error('title')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 p-3 d-flex">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="content">Content</label>
                                <div class="form-control-wrap p-2">
                                    <textarea  name="content" class="description form-control"
                                        id="content"
                                        placeholder="Content..">{{$privacyPolicy->content ?? ''}}</textarea>
                                    @error('content')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-dark">Update Privacy policy</button>
                        </div>
                    <div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection