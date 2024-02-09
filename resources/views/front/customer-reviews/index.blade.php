@extends('front_layout.master')
@section('content')

    <section class="brad_inner">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customer Reviews</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="banner-sec">
        <div class="container-fluid">
            <div class="banner-content">
                <div class="banner-img">
                    <img src="img/spcl_off_ban.png" alt="" />
                </div>
            </div>
        </div>
    </section>

    <section class="view_wrapper custmr_revw our_best_wreapper p_100">
        <div class="container">
            <div class="view_content">
                <h2>Our customers speak for us!</h2>
                <p>
                    You’ve showered all your love—and how! It sure is a proud moment to know 99.4% of you are happy with the hard work we’re putting in. But our heart aches for the 0.6% who we couldn’t give a happy experience. Our only request to you is, please do get in touch whenever you’re stuck, or need assistance. Our team is all ears! Give us a call, email us, or post a review. We’re absolutely devoted to reach 100% customer satisfaction and 100% smiles.
                </p>
                <div class="view_all">
                    <img src="img/view_logo.png">
                    <ul>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </ul>
                    <span class="b_text">All 3430 Reviews</span>
                </div>
            </div>
        </div>
    </section>

    <section class="review_wrapper p_100" style="background-color: #141414">
        <div class="container">
            <div class="site_rvw">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Site Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Product Reviews</button>
                    </li>
                    <div class="revw_buttn"><a href="#" class="btn light_dark">Write a Review</a></div>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="review_grid">
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_1.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Jerry C. Prentice</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_2.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Ruth D. Grinnell</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_3.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Orlando R. Bean</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                </p>
                            </div>
                             <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_1.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Jerry C. Prentice</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_2.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Ruth D. Grinnell</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_3.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Orlando R. Bean</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                </p>
                            </div>
                             <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_1.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Jerry C. Prentice</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_2.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Ruth D. Grinnell</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_3.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Orlando R. Bean</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                </p>
                            </div>
                             <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_1.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Jerry C. Prentice</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_2.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Ruth D. Grinnell</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                </p>
                            </div>
                            <div class="testimonial-para">
                                <div class="test_view">
                                    <div class="test_img">
                                        <img src="img/view_3.png">
                                    </div>
                                    <div class="test_hd">
                                        <h6>Orlando R. Bean</h6>
                                        <div class="star_wreap">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span>18 Jan, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        2
                    </div>
                </div>
            </div>
            <div class="paginetion_wreap">
                    <ul class="list-unstyled m-0">
                        <li>
                            <a href="#"><i class="fa-solid fa-chevron-left"></i></a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="active">
                            <a href="#"><i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
        </div>
    </section>

@endsection