@extends('front_layout.master')
@section('content')
    <section class="brad_inner">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                    @if ($category ?? '')
                        {!! Breadcrumbs::render('Blog.category', $category) !!}
                    @else
                        {!! Breadcrumbs::render('Blogs') !!}
                    @endif
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="blog-sec p_100">
        <div class="container">
            <div class="blog-content">
                <div class="row">
                    <div class="col-lg-8">
                        @if ($blogs->isNotEmpty())
                            <div class="blogs">
                                <div class="row">
                                    @foreach ($blogs as $blog)
                                        <div data-month="{{ $blog->created_at->format('M') }}"
                                            class="blogs_div col-md-6 pb-5">
                                            <div style="cursor: pointer;" class="blog" data-slug="{{ $blog->slug ?? '' }}">
                                                <div class="blog-img">
                                                    <img src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}"
                                                        alt="">
                                                </div>
                                                <div class="blog-body">
                                                    <p><span>Cre8ivePrinter</span>-
                                                        {{ $blog->created_at->format('F jS,Y') }}</p>
                                                    <h4>{{ $blog->title ?? '' }}</h4>
                                                    <p>
                                                        {{ substr(strip_tags($blog->short_description), 0, 150) }}
                                                       <a href="{{ url('blog') }}/{{ $blog->slug ?? '' }}"> ...Read
                                                            More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="paginetion_wreap">
                                @if ($blogs->lastPage() > 1)
                                    <ul class="list-unstyled m-0">
                                        @if ($blogs->onFirstPage())
                                            <li>
                                                <a href=""><i class="fa-solid fa-chevron-left"></i></a>
                                            </li>
                                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                                <li class="{{ $i == $blogs->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="active">
                                                <a href="{{ $blogs->nextPageUrl() }}"><i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                            </li>
                                        @elseif ($blogs->HasmorePages())
                                            <li class="active">
                                                <a href="{{ $blogs->previousPageUrl() }}"><i
                                                        class="fa-solid fa-chevron-left"></i></a>
                                            </li>
                                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                                <li class="{{ $i == $blogs->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="active">
                                                <a href="{{ $blogs->nextPageUrl() }}"><i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                            </li>
                                        @else
                                            <li class="active">
                                                <a href="{{ $blogs->previousPageUrl() }}"><i
                                                        class="fa-solid fa-chevron-left"></i></a>
                                            </li>
                                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                                <li class="{{ $i == $blogs->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li>
                                                <a href=""><i class="fa-solid fa-chevron-right"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                            @else 
                            <div class="blogs">
                                <div class="row">
                                    <p>No Result Found</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-block">
                            <div class="blog-blocks">
                                <div class="search-input-div">
                                    <h5>Search</h5>
                                    <form class="search-form">
                                        <input type="search" name="search_bar" id="search_bar" class="form-control"
                                            placeholder="Search...">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </form>
                                </div>
                                <div class="posts" id="search_result_div" style="display:none">
                                <div id="search_div_text_div" style="display: none;" >Not Found</div>
                                    <ul >
                                        @if ($blogs->isNotEmpty())
                                            @foreach ($blogs as $blog)
                                                <li style="display:none" class="blog-list" data-name="{{ $blog->title ?? '' }}"><a href="{{ url('blog') }}/{{ $blog->slug ?? '' }}">
                                                        <img width="50px"
                                                            src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}"
                                                            alt="">
                                                        <h6>{{ $blog->title ?? '' }}</h6>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-blocks">
                                <h5>Related Posts</h5>
                                <div class="posts">
                                    <ul>
                                        @if ($blogs->isNotEmpty())
                                            @php $counter = 0; @endphp
                                            @foreach ($blogs as $blog)
                                                @if ($counter < 5)
                                                    <li><a href="{{ url('blog') }}/{{ $blog->slug ?? '' }}">
                                                            <img width="50px"
                                                                src="{{ asset('blog_Images') }}/{{ $blog->image ?? '' }}"
                                                                alt="">
                                                            <h6>{{ $blog->title ?? '' }}</h6>
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
                                    <img src="{{ asset('front/img/clogo.svg') }}" alt="">
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
                                    <select id="Month" name="Month" placeholder="Select Month">
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
    <script>
        $(document).ready(function() {
            $('#Month').on('change', function() {
                var selectedOption = $(this).val();

                $('.blogs_div').each(function() {
                    var blogMonth = $(this).data('month');

                    if (selectedOption == blogMonth) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $('.blog').on('click',function(){
                var slug = $(this).attr('data-slug');
                window.location.href = "{{ url('blog')}}"+"/"+slug;
            });
            $('#search_bar').on('input',function(){
                var value = $(this).val();
                var found = false; 
                
                $(".blog-list").each(function() {
                    var blogname = $(this).attr('data-name');
                    if(value == '' || value == null || value == undefined){
                        $('#search_result_div').hide();
                        $('#search_div_text_div').hide();
                        $(this).hide();
                    } else {
                        $('#search_result_div').show();
                        if (blogname.toLowerCase().includes(value.toLowerCase())) {
                            $(this).show();
                            $('#search_div_text_div').hide();
                            found = true; 
                        } else {
                            $(this).hide();
                        }
                    }
                }); 
                if (!found) {
                    $('#search_div_text_div').show();
                } 
            });
        });
    </script>
@endsection
