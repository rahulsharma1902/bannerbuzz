@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Backgound</h4>   
        </div>
        <div>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/background-editProcc') ?? '' }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs">
                    <input type="hidden" name="id" value="{{ $backgrounds->id ?? '' }}" >
                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $backgrounds->slug ?? '' }}" />

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Banner Name</label>
                            <sup>@error('name')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror</sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $backgrounds->name ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="category_id">Banner Category</label>
                            <sup>@error('category_id')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror</sup>
                            <div class="form-control-wrap ">
                                <select class="form-select js-select2" id="category_id" name="category_id" data-placeholder="Select a option" value="{{ $backgrounds->category_id ?? '' }}">
                                    @foreach ($backgroundCategory as $cat)
                                        @if ($cat->id == $backgrounds->category_id)
                                        <option value="{{ $cat->id ?? '' }} " selected>{{ $cat->name ?? ''}}</option>
                                        @else
                                        <option value="{{ $cat->id ?? '' }} ">{{ $cat->name ?? ''}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <img  src="{{ asset('BannerImage') ?? ''  }}/{{ $backgrounds->image ?? '' }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Upload Banner Image</label>
                            <sup>@error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror</sup>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="image" name="image">
                                    <label class="form-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Banner</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){
    $('#name').on('keyup', function(){
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-");
        slug = slug.replace(/\//g, "-");
        $('#slug').val(slug);
    });
    $('#slug').on('change', function(){
        this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
    });
});

    
</script>
@endsection