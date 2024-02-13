@extends('admin_layout.master')
@section('content')
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">{{ isset($blog) ? 'Edit blog: ' . $blog->title : 'Add blog' }}</h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="{{ url('admin-dashboard/add-blog-procc') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $blog->id ?? '' }}">
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="title">Blog title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="title" oninput="convertToSlug(this.value)"
                                            onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"
                                            class="form-control" id="title" value="{{ $blog->title ?? '' }}"
                                            placeholder="Title">
                                    </div>
                                    @error('title')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('slug')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="hidden" name="slug" class="form-control" id="slug"
                                            value="{{ $blog->slug ?? '' }}" placeholder="slug">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="name">Sub title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="sub_title" class="form-control" id="sub_title"
                                                value="{{ $blog->sub_title ?? '' }}" placeholder="Sub title">
                                        </div>
                                        @error('sub_title')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-3">
                            <div class="form-group">
                                <label class="form-label" for="blog-category">Category</label>
                                <div class="from-control-wrap">
                                    <select name="blog_category_id" class="form-control" id="blog-category">
                                        {{-- <option value="">--NONE--</option> --}}
                                        @if (isset($blog_categories))
                                            @foreach ($blog_categories as $cat)
                                                <option value="{{ $cat->id ?? '' }}"
                                                    @if ($blog !== null) @if ($blog->blog_category_id == $cat->id) Selected @endif
                                                    @endif> {{ $cat->name ?? '' }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 p-3">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Image</label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                                @error('image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if (isset($blog->image))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                        <img src="{{ asset('blog_Images') ?? '' }}/{{ $blog->image ?? '' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-10 p-3">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Short Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="short_description" class="description form-control" id="short_description"
                                        placeholder="short description.....">{{ $blog->short_description ?? '' }}</textarea>
                                    @error('short_description')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 p-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" class="description form-control" id="description" placeholder="description.....">{{ $blog->description ?? '' }}</textarea>
                                    @error('description')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit"
                                class="btn btn-lg btn-primary">{{ isset($category) ? ' Update' : ' Save' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <script>
        function convertToSlug(str) {
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();
            str = str.replace(/^\s+|\s+$/gm, '');
            str = str.replace(/\s+/g, '-');
            $('#slug').val(str);
        }
    </script>
@endsection
