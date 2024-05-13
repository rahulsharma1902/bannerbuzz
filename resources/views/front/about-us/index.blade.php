@extends('front_layout.master')
@section('content')
<section class="brad_inner">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                {!! Breadcrumbs::render('about-us') !!}
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="banner-sec">
    <div class="container-fluid">
        <div class="banner-content">
            <div class="banner-img">
                <img src="{{ asset('Site_Images')}}/{{$about_content->banner_image ?? ''}}" alt="" />
            </div>

        </div>
    </div>
</section>

<section class="loyal-sec p_100">
    <div class="container">
        <div class="loyal-content">
            <h2>{{$about_content->header1_title ?? ''}}</h2>
            <div class="reasons">
                @foreach(json_decode($about_content->header1_images) as $image => $text)
                    <div class="rsn">
                        <img src="{{ asset('Site_Images')}}/{{ $image ?? ''}}" alt="">
                        <p>{{$text ?? ''}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="create-sec p_100 pt-0">
    <div class="container">
        <div class="create-content">
            <h2>{{$about_content->header2_title ?? ''}}</h2>
            <p>{!! $about_content->header2_description ?? ''!!}</p> 
        </div>
    </div>
</section>

<section class="story-sec p_100 pt-0">
    <div class="container">
        <div class="story-content">
            <div class="row align-items-center">
                <div class="col-md-6 story-img">
                    <div class="img">
                        <img src="{{ asset('Site_Images')}}/{{$about_content->employee_image ?? ''}}" alt="">
                    </div>
                    <div class="overflow-text">
                        <p>{{ $about_content->employee_experience ?? '' }}</p>
                    </div>
                </div>
                <div class="col-md-6 story-txt">
                    <span>{{ $about_content->employee_name ?? ''}}</span>
                    <p>{!! $about_content->about_employee ?? ''!!}</p>
                </div>
            </div>
        </div>
        <div class="counter-wrapper">
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="10">
                            0
                        </span>
                        <span>mm</span>
                    </li>
                </ul>
                <p>Happy Customers</p>
            </div>
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="1500">
                            0
                        </span>
                        <span>+</span>
                    </li>
                </ul>
                <p>Team Members</p>
            </div>
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="10000">
                            0
                        </span>
                        <span>+</span>
                    </li>
                </ul>
                <p>Products</p>
            </div>
            <div class="counter-block">
                <ul class="counter">
                    <li>
                        <span class="count percent" data-count="6">
                            0
                        </span>
                        <span></span>
                    </li>
                </ul>
                <p>Countries</p>
            </div>
        </div>
    </div>
</section>

<section class="empowering-sec p_100" style="background-color: rgba(20, 20, 20, 1);">
    <div class="container">
        <div class="empowering-content">
            <h2>{{$about_content->bottom1_title ?? '' }}</h2>
            <p>{!! $about_content->bottom1_description ?? '' !!}</p>
            <div class="brand-slider">
                @foreach(json_decode($about_content->bottom_logos) as $logo)
                    <div class="brand">
                        <img src="{{ asset('Site_Images')}}/{{ $logo ?? ''}}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="imagine-sec p_100">
    <div class="container">
        <div class="imagine-content">
            <h2>{{ $about_content->bottom2_title ?? ''}}</h2>
            <p>{{$about_content->bottom2_subtitle ?? ''}}</p>
            <div class="imagine-card">
                @php 
                $images = json_decode($about_content->bottom2_images,true);
                $title = json_decode($about_content->bottom2_image_title,true);
                $text = json_decode($about_content->bottom2_image_text,true);
                @endphp
                @for($i = 0; $i < count($title); $i++)
                <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('Site_Images')}}/{{$images[$i] ?? ''}}" alt="">
                    </div>
                        <div class="card_body">
                            <h5>{{$title[$i] ?? ''}}</h5>
                            <p>{{$text[$i] ?? ''}}</p>
                        </div>
                </div>
                @endfor 
                <!-- <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('front/img/cr8card2.png')}}" alt="">
                    </div>
                        <div class="card_body">
                            <h5>Priority shipping</h5>
                            <p>For FasterDelivery</p>
                        </div>
                </div>
                <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('front/img/cr8card3.png')}}" alt="">
                    </div>
                        <div class="card_body">
                            <h5>24x7 Customer Support</h5>
                            <p>Quick & EfficientIssue Resolving</p>
                        </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection