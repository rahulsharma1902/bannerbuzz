@extends('admin_layout.master')
@section('content')
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">About Us Content</h5>
        </div>
        @if(!$about_content)
        <div class="row">
            <div class="col-lg-12">
                <form action="{{url('admin-dashboard/about-us-content-update')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 p-2">
                        <div class="col-lg-6 ">
                            <div class="form-group" id="Top_section_image">
                                <label class="form-label" for="Top_section_image">Banner Image </label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="top_section_image" class="form-control" id="Top_section_image">
                                </div>
                                @error('top_section_image')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h4>Header Section 1</h4>
                    <div class="col-lg-12 p-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="header_1_title">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="header_1_title"
                                        value="" class="form-control"
                                        id="header_1_title" placeholder="Header title">
                                </div>
                                @error('header_1_title')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="parent_div">
                            <div class="d-flex col-lg-12" id="clone_div">
                                <div class="col-lg-6 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="header_1_image">Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" name="header_1_image[]" class="form-control" id="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="header_image_text">text</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="header_image_text[]" value="" class="form-control" id="title"
                                                placeholder="Enter image text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"><a class="primary-link float-end" id="add-more-content" type="button">Add
                                More</a></div>
                    </div>
                    <h4>Header Section 2</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="header_2_title">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="header_2_title"
                                        value="" class="form-control"
                                        id="header_2_title" placeholder="Enter Header 2 title">
                                </div>
                                @error('header_2_title')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="header_2_description">Description</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="header_2_description" class="description form-control"
                                        id="header_2_description"
                                        placeholder="short description....."></textarea>
                                    @error('header_2_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Employee Section</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" >
                                <label class="form-label" for="employee_name">Name</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="employee_name" class="form-control" id="employee_name" value="" placeholder="Enter Name">
                                </div>
                                @error('employee_name')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group" >
                                <label class="form-label" for="employee_image">Image</label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="employee_image"
                                        value="" class="form-control"
                                        id="employee_image">
                                </div>
                                @error('employee_image')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" >
                                <label class="form-label" for="employee_experince">Experince</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="employee_experience" class="form-control" value="" id="employee_experince" placeholder="Enter Employee Experince">
                                </div>
                                @error('employee_experince')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label class="form-label" for="short_description">About Employee</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="about_employee" class="description form-control"
                                        id="about_employee"
                                        placeholder="short description....."></textarea>
                                    @error('about_employe')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Bottom Section 1</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Bottom title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="" name="bottom_1_title"
                                        id="bottom_title" placeholder="Enter Title">
                                    @error('bottom_1_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Description</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="bottom_1_description" class="description form-control"
                                        id="bottom_description"
                                        placeholder="short description....."></textarea>
                                    @error('bottom_1_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex">
                        <div class="form-group col-lg-10">
                            <label class="form-label" >Logos</label>
                            <div id="image-parent-div"> 
                                <div class="form-control-wrap col-lg-6 d-flex p-2">
                                    <input type="file" name="bottom_1_logos[]" class="form-control" >
                                    <a class="primary-link col-lg-2 p-1" id="add-more-logo" type="button">Add More</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-control-wrap align-items-center p-3">
                           
                        </div>
                    </div>
                    <h4>bottom Section 2</h4>
                    <div class="col-lg-12 p-3">
                        <div class="col-lg-12 d-flex">
                            <div class="form-group col-lg-6">
                                <label class="form-label" for="image">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="bottom_2_title"
                                        value="" class="form-control"
                                        id="bottom_section_2_title" placeholder="Enter Title">
                                </div>
                                @error('bottom_section_2_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label" for="image">Sub Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="bottom_2_subtitle"
                                        value="" class="form-control"
                                        id="bottom_section_2_subtitle" placeholder="Enter SubTitle">
                                </div>
                                @error('bottom_section_2_subtitle')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="bottom-images-div">
                            <div class="d-flex col-lg-12">
                                <div class="col-lg-3 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" name="bottom_2_images[]" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Image Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="bottom2_image_title[]" class="form-control" 
                                                placeholder="Enter Image Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Image text</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="bottom2_image_text[]" class="form-control" 
                                                placeholder="Enter Image text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"><a class="primary-link float-end" id="add-more-image" type="button">Add
                                More</a></div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <form action="{{url('admin-dashboard/about-us-content-update')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 p-2">
                        <div class="col-lg-6 ">
                            <div class="form-group" id="Top_section_image">
                                <label class="form-label" for="Top_section_image">Banner Image </label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="top_section_image" class="form-control" id="Top_section_image">
                                </div>
                                @error('top_section_image')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if (isset($about_content->banner_image))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                        <img src="{{ asset('Site_Images') ?? '' }}/{{$about_content->banner_image ?? '' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <h4>Header Section 1</h4>
                    <div class="col-lg-12 p-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="header_1_title">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="header_1_title"
                                        value="{{$about_content->header1_title ?? ''}}" class="form-control"
                                        id="header_1_title" placeholder="Header title">
                                </div>
                                @error('header_1_title')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="parent_div">
                            @if($about_content->header1_images)
                                @foreach(json_decode($about_content->header1_images) as $key => $value)
                                    <div class="d-flex col-lg-12" id="clone_div">
                                        <div class="col-lg-6 p-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header_1_image">Image</label>
                                                <div class="form-control-wrap">
                                                    <input type="file" name="header1_images[{{$key}}][images]" class="form-control" id="title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                                <div class="col-lg-3 mb-3">
                                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                                        <img src="{{ asset('Site_Images') ?? '' }}/{{$key ?? '' }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header_image_text">text</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="header1_images[{{$key}}][text]" value="{{$value ?? ''}}" class="form-control" id="title"
                                                        placeholder="Enter image text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <h4>Header Section 2</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="header_2_title">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="header_2_title"
                                        value="{{$about_content->header2_title ?? ''}}" class="form-control"
                                        id="header_2_title" placeholder="Enter Header 2 title">
                                </div>
                                @error('header_2_title')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="header_2_description">Description</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="header_2_description" class="description form-control"
                                        id="header_2_description"
                                        placeholder="short description.....">{{$about_content->header2_description ?? ''}}</textarea>
                                    @error('header_2_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Employee Section</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" >
                                <label class="form-label" for="employee_name">Name</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="employee_name" class="form-control" id="employee_name" value="{{$about_content->employee_name ?? ''}}" placeholder="Enter Name">
                                </div>
                                @error('employee_name')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group" >
                                <label class="form-label" for="employee_image">Image</label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="employee_image"
                                        value="" class="form-control"
                                        id="employee_image">
                                </div>
                                @error('employee_image')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (isset($about_content->employee_image))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                <div class="col-lg-3 mb-3">
                                    <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                        <img src="{{ asset('Site_Images') ?? '' }}/{{$about_content->employee_image ?? '' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6 ">
                            <div class="form-group" >
                                <label class="form-label" for="employee_experince">Experince</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="employee_experience" class="form-control" value="{{$about_content->employee_experience ?? ''}}" id="employee_experince" placeholder="Enter Employee Experince">
                                </div>
                                @error('employee_experince')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label class="form-label" for="short_description">About Employee</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="about_employee" class="description form-control"
                                        id="about_employee"
                                        placeholder="short description.....">{{$about_content->about_employee ?? ''}}</textarea>
                                    @error('about_employe')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Bottom Section 1</h4>
                    <div class="col-lg-12 p-3 d-flex">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Bottom title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" class="form-control"
                                        value="{{$about_content->bottom1_title ?? ''}}" name="bottom_1_title"
                                        id="bottom_title" placeholder="Enter Title">
                                    @error('bottom_1_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="short_description">Description</label>
                                <div class="form-control-wrap p-2">
                                    <textarea name="bottom_1_description" class="description form-control"
                                        id="bottom_description"
                                        placeholder="short description.....">{{$about_content->bottom1_description ?? ''}}</textarea>
                                    @error('bottom_1_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex">
                        <div class="form-group col-lg-10">
                            <label class="form-label" >Logos</label>
                            @if (isset($about_content->bottom_logos))
                                <div id="image-parent-div"> 
                                    @foreach(json_decode($about_content->bottom_logos) as $k => $logo)
                                    <div class="form-control-wrap col-lg-6 d-flex p-2">
                                        <input type="file" name="bottom_logos[{{$k}}]" class="form-control" >
                                    </div>
                                    <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                        <div class="col-lg-3 mb-3" style="background-color: black;">
                                            <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                                <img  src="{{ asset('Site_Images') ?? '' }}/{{$logo ?? '' }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <h4>bottom Section 2</h4>
                    <div class="col-lg-12 p-3">
                        <div class="col-lg-12 d-flex">
                            <div class="form-group col-lg-6">
                                <label class="form-label" for="image">Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="bottom_2_title"
                                        value="{{$about_content->bottom2_title ?? ''}}" class="form-control"
                                        id="bottom_section_2_title" placeholder="Enter Title">
                                </div>
                                @error('bottom_section_2_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label" for="image">Sub Title</label>
                                <div class="form-control-wrap p-2">
                                    <input type="text" name="bottom_2_subtitle"
                                        value="{{$about_content->bottom2_subtitle ?? ''}}" class="form-control"
                                        id="bottom_section_2_subtitle" placeholder="Enter SubTitle">
                                </div>
                                @error('bottom_section_2_subtitle')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="bottom-images-div">
                            @if($about_content->bottom2_images)
                              @php 
                                $images = json_decode($about_content->bottom2_images);
                                $title = json_decode($about_content->bottom2_image_title);
                                $text = json_decode($about_content->bottom2_image_text);
                                $i = 0;
                              @endphp
                                @for($i = 0; $i < count($text); $i++)
                                    <div class="d-flex col-lg-12">
                                        <div class="col-lg-3 p-3">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Image</label>
                                                <div class="form-control-wrap">
                                                    <input type="file" name="bottom2_images[{{$i}}]" class="form-control" >
                                                </div>
                                            </div>
                                            @if (isset($images[$i]))
                                                <div class="col-lg-12 d-flex align-items-center flex-wrap p-2">
                                                    <div class="col-lg-3 mb-3">
                                                        <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                                            <img src="{{ asset('Site_Images') ?? '' }}/{{$images[$i] ?? '' }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 p-3">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Image Title</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="bottom2_image_title[{{ $i }}]" class="form-control"  value="{{ is_string($title[$i] ?? '') ? $title[$i] : '' }}"
                                                        placeholder="Enter Image Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 p-3">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Image text</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="bottom2_image_text[{{ $i }}]" class="form-control" value="{{ is_string($text[$i] ?? '') ? $text[$i] : '' }}"
                                                        placeholder="Enter Image text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div> 
</div>
<script>
    $(document).ready(function() {
        $('#add-more-content').click(function() {
            var newFaqHtml = `
                        <div class="clone-div d-flex" >
                            <div class="col-lg-6 p-3">
                                <div class="form-group ">
                                    <label class="form-label" for="name">Image</label>
                                    <div class="form-control-wrap">
                                        <input type="file" name="header_1_image[]" class="form-control" id="title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">Text</label>
                                    <div class="form-control-wrap d-flex">
                                        <input type="text" name="header_image_text[]" class="form-control" id="title"
                                            placeholder="Enter text">
                                        <i type="button" class="data_remove fas fa-trash-alt float-right p-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                $('#parent_div').append(newFaqHtml);
            });

        $('#parent_div').on('click', '.data_remove', function() {
            $(this).closest('.clone-div').remove();
        });

        $('#add-more-logo').click(function(){
            var LogoHtml = `<div class="Image_div form-control-wrap col-lg-6 p-2 d-flex">
                                <input type="file" name="bottom_1_logos[]" class="form-control">
                                <i type="button" class="remove_image_input fas fa-trash-alt float-right p-2"></i>
                            </div>`;
            $('#image-parent-div').append(LogoHtml);
        });
        $('#image-parent-div').on('click', '.remove_image_input', function() {
            $(this).closest('.Image_div').remove();
        });

        $('#add-more-image').click(function(){
            var ImageHtml = ` <div class="bottom_clone_div d-flex col-lg-12" i>
                                <div class="col-lg-3 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" name="bottom_2_image[]" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Image Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="bottom2_image_title[]" class="form-control" 
                                                placeholder="Enter title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Image text</label>
                                        <div class="form-control-wrap d-flex">
                                            <input type="text" name="bottom2_image_text[]" class="form-control" 
                                                placeholder="Enter text">
                                            <i type="button" class="bottom_image_remove fas fa-trash-alt float-right p-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            $('#bottom-images-div').append(ImageHtml); 
        });
        $('#bottom-images-div').on('click','.bottom_image_remove',function(){
            $(this).closest('.bottom_clone_div').remove();
        });
    });
</script>

@endsection