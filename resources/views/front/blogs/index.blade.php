@extends('front_layout.master')
@section('content')
    <section class="blog-sec p_100">
        <div class="container">
            <div class="blog-content">
                <div class="row">
                    @if ($blogs->isNotEmpty())
                        <div class="col-lg-8">
                            <div class="blogs">
                                <div class="row">
                                    @foreach ($blogs as $blog)
                                        <div class="col-md-6 pb-5">
                                            <div class="blog">
                                                <div class="blog-img">
                                                    <img src="{{ asset('blog_Images') }}/{{ $blog->image ?? ''}}"
                                                        alt="">
                                                </div>
                                                <div class="blog-body">
                                                    <p><span>Cre8ivePrinter</span>-
                                                        {{ $blog->created_at->format('F jS,Y') }}</p>
                                                    <h4>{{ $blog->title ?? '' }}</h4>
                                                    <p>
                                                        {{ substr(strip_tags($blog->short_description), 0, 150) }}
                                                        <a href="{{ url('blog') }}/{{ $blog->slug ?? ''}}">Read
                                                        More</a></p>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    @endforeach
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
                    @endif
                    <div class="col-lg-4">
                        <div class="blog-block">
                            <div class="blog-blocks">
                                <h5>Search</h5>
                                <form class="search-form">
                                    <input type="search" name="" id="" class="form-control"
                                        placeholder="Search...">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </form>
                            </div>
                            <div class="blog-blocks">
                                <h5>Related Posts</h5>
                                <div class="posts">
                                    <ul>
                                        @if ($blogs->isNotEmpty())
                                            @php $counter = 0; @endphp
                                            @foreach ($blogs as $blog)
                                                @if ($counter < 5)
                                                    <li><a href="javascript:void">
                                                            <img width="50px"
                                                                src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}"
                                                                alt="">
                                                            <h6>{{ $blog->title ?? ''}}</h6>
                                                        </a></li>
                                                @endif
                                                @php $counter++; @endphp
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-blocks">
                                <h5> About Cre8ive Printer</h5>
                                <div class="about">
                                    <img src="{{ asset('front/img/aboutcr8.png') }}" alt="">
                                    <h6>Design Print Banner, LLC (DBA: cre8iveprinter.co.uk) was established with a
                                        vision to capture online retail markets. With our parent company’s 20+ years of
                                        experience in the sign business and our…</h6>
                                    <a href="javascript:void(0)">Read More</a>
                                </div>
                            </div>
                            <div class="blog-blocks">
                                <h5>Categories</h5>
                                <ul class="category-link">
                                    @if ($blog_category->isNotEmpty())
                                        @foreach ($blog_category as $category)
                                            <?php $posts = count($category->blogs); ?>
                                            @if ($posts != 0)
                                                <li><a
                                                        href="{{ url('blogs/' . $category->slug ?? '') }}">{{ $category->name ?? '' }}<span>({{ $posts }})</span></a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="blog-blocks">
                                <h5>Connect & Follow</h5>

                                <div class="social-links">
                                    <ul>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('front/img/social5.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('front/img/social4.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('front/img/social3.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('front/img/social2.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ asset('front/img/social1.png') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </div>

                                <div class="news-block" style="background-color: #141414;">
                                    <div class="news-head">
                                        <h4>Newsletter</h4>
                                        <p>Get Latest News and Updates From Cre8ive Printer Enter Your Email Address</p>
                                        <div class="news-form">
                                            <form action="">
                                                <input type="email" name="" id=""
                                                    placeholder="Your email">
                                                <a href="#" class="btn light_dark">Subscribe</a>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="blog-blocks">
                                <h5>Archives</h5>
                                <div class="select-month-box">
                                    <select placeholder="Select Month">
                                        <option name="" value="" style="display:none;">Select Month</option>
                                        <option name="January" value="Jan">January</option>
                                        <option name="February" value="Feb">February</option>
                                        <option name="March" value="Mar">March</option>
                                        <option name="April" value="Apr">April</option>
                                        <option name="May" value="May">May</option>
                                        <option name="June" value="Jun">June</option>
                                        <option name="July" value="Jul">July</option>
                                        <option name="August" value="Aug">August</option>
                                        <option name="September" value="Sep">September</option>
                                        <option name="October" value="Oct">October</option>
                                        <option name="November" value="Nov">November</option>
                                        <option name="December" value="Dec">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
