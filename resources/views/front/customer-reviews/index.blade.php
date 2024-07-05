@extends('front_layout.master')
@section('content')

<section class="brad_inner">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                {!! Breadcrumbs::render('customer-reviews') !!}
            </nav>
        </div>
    </div>
</section>

<section class="banner-sec">
    <div class="container-fluid">
        <div class="banner-content">
            <div class="banner-img">
                <img src="{{ asset('front/img/spcl_off_ban.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="view_wrapper custmr_revw our_best_wreapper p_100">
    <div class="container">
        <div class="view_content">
            <h2>Our customers speak for us!</h2>
            <p>
                You’ve showered all your love—and how! It sure is a proud moment to know 99.4% of you are happy with the
                hard work we’re putting in. But our heart aches for the 0.6% who we couldn’t give a happy experience.
                Our only request to you is, please do get in touch whenever you’re stuck, or need assistance. Our team
                is all ears! Give us a call, email us, or post a review. We’re absolutely devoted to reach 100% customer
                satisfaction and 100% smiles.
            </p>
            <div class="view_all">
                <img src="{{ asset('front/img/clogo.svg') }}">
                <ul>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </ul>
                <span class="b_text">
                    @if($testimonials->count() > 0)
                        All {{ $testimonials->count() }} Reviews
                    @else
                        No Reviews Yet
                    @endif
                </span>

            </div>
        </div>
    </div>
</section>

<section class="review_wrapper p_100" style="background-color: #141414">
    <div class="container">
        <div class="site_rvw">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Site Reviews</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Product Reviews</button>
                </li> -->
                <div class="revw_buttn"><button type="button" class="btn light_dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Write a Review</button></div>
                <!-- model for review  -->
                <div class="modal fade tab-content" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalww">Write Review</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                    <span aria-hidden="true"> <i class="fa-solid fa-xmark"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('customer-reviews-add') }}" method="POST"
                                 enctype="multipart/form-data" id="form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="" for="name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder=" image">
                                    </div>
                                </div>
                                <style>
                                    .rate {
                                        display: flex;
                                        flex-direction: row-reverse;
                                        justify-content: left;
                                        height: 46px;
                                        padding: 0 10px;
                                    }
                                    .rate:not(:checked) > input {
                                        position: absolute;
                                        top: -9999px;
                                    }
                                    .rate:not(:checked) > label {
                                        float: right;
                                        width: 1em;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        cursor: pointer;
                                        font-size: 30px;
                                        color: #ccc;
                                    }
                                    .rate:not(:checked) > label:before {
                                        content: '★ ';
                                    }
                                    .rate > input:checked ~ label {
                                        color: #ffc700;
                                    }
                                    .rate:not(:checked) > label:hover,
                                    .rate:not(:checked) > label:hover ~ label {
                                        color: #deb217;
                                    }
                                    .rate > input:checked + label:hover,
                                    .rate > input:checked + label:hover ~ label,
                                    .rate > input:checked ~ label:hover,
                                    .rate > input:checked ~ label:hover ~ label,
                                    .rate > label:hover ~ input:checked ~ label {
                                        color: #c59b08;
                                    }
                                    .rating {
                                        font-size: 24px;
                                    }

                                    .rating .star {
                                        color: #e3f0e1;
                                    }

                                    .rating .star.full {
                                        color: #FFD700;
                                    }
                                </style>
                                <div class="form-group p-3">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="5 stars">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="4 stars">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="3 stars">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="2 stars">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="1 star">1 star</label>
                                    </div>
                                </div>

                                <div class="form-group p-2">
                                    <label class="" for="description">Statement</label>
                                    <div class="form-control-wrap">
                                        <textarea name="description" id="description"
                                            class="description from-control"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="save-review" class="btn light_dark">Post</button>
                                </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end model -->
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @if(isset($testimonials))
                    <div class="review_grid">
                        @foreach($testimonials as $data)
                        <div class="testimonial-para">
                            <div class="test_view">
                                <div class="test_img">
                                    @if($data->image)
                                        <img src="{{ asset('Site_Images/' . $data->image) }}" alt="Image">
                                    @else
                                        <span>{{ ucfirst(substr($data->name ?? '', 0, 1)) }}</span>
                                    @endif
                                </div>

                                <div class="test_hd">
                                    <h6>{{$data->name ?? ''}}</h6>
                                    <!-- <p>Rating: {{$data->stars}}</p> -->
                                    <div class="starWrap">
                                        <div class="rating">
                                        @php
                                            $rating = $data->stars;
                                            $full_stars = floor($rating);
                                            $half_star = $rating - $full_stars >= 0.5 ? true : false;
                                            $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);
                                        @endphp

                                        @for ($i = 0; $i < $full_stars; $i++)
                                            <span class="star full">&#9733;</span>
                                        @endfor

                                        @if ($half_star)
                                            <span class="star full">&#9733;&#9734;</span>
                                        @endif

                                        @for ($i = 0; $i < $empty_stars; $i++)
                                            <span class="star">&#9734;</span>
                                        @endfor
                                        </div>
                                        <div class="star_wreap">
                                            <!-- <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i> -->
                                            <span>{{$data->created_at->format('j F,Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <span>
                                    <?php echo $data->description; ?>
                                </span>
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    2
                </div>
            </div>
        </div>
        <div class="paginetion_wreap">
            @if ($testimonials->lastPage() > 1)
                <ul class="list-unstyled m-0">
                    @if ($testimonials->onFirstPage())
                        <li>
                            <a href=""><i class="fa-solid fa-chevron-left"></i></a>
                        </li>
                        @for ($i = 1; $i <= $testimonials->lastPage(); $i++)
                            <li class="{{ $i == $testimonials->currentPage() ? 'active' : '' }}">
                                <a href="{{ $testimonials->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="active">
                            <a href="{{ $testimonials->nextPageUrl() }}"><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    @elseif ($testimonials->HasmorePages())
                        <li class="active">
                            <a href="{{ $testimonials->previousPageUrl() }}"><i
                                    class="fa-solid fa-chevron-left"></i></a>
                        </li>
                        @for ($i = 1; $i <= $testimonials->lastPage(); $i++)
                            <li class="{{ $i == $testimonials->currentPage() ? 'active' : '' }}">
                                <a href="{{ $testimonials->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="active">
                            <a href="{{ $testimonials->nextPageUrl() }}"><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    @else
                        <li class="active">
                            <a href="{{ $testimonials->previousPageUrl() }}"><i
                                    class="fa-solid fa-chevron-left"></i></a>
                        </li>
                        @for ($i = 1; $i <= $testimonials->lastPage(); $i++)
                            <li class="{{ $i == $testimonials->currentPage() ? 'active' : '' }}">
                                <a href="{{ $testimonials->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li>
                            <a href=""><i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</section>
@endsection