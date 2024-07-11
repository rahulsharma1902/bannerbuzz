@extends('front_layout.master')
@section('content')
<style>
.privacy_txt h1, 
.privacy_txt h2, 
.privacy_txt h3, 
.privacy_txt h4, 
.privacy_txt h5 {
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
    text-align: start;
}

.privacy_txt h1 {
    font-size: 32px;
}

.privacy_txt h2 {
    font-size: 28px;
}

.privacy_txt h3 {
    font-size: 24px;
}

.privacy_txt h4 {
    font-size: 20px;
}

.privacy_txt h5 {
    font-size: 18px;
}


</style>
<section class="vinyl_wrapper viny_new">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
            {!! Breadcrumbs::render('terms-and-conditions') !!}
            </nav>
        </div>
    </div>
</section>

<section class="privacy_wrapper p_100 pt-0">
    <div class="container">
        <div class="">
            <div class="privacy_content">
            <h2>{{ optional($termsAndConditions)->title }}</h2>

                <div class="privacy_txt">
                    @if(optional($termsAndConditions)->content)
                        {!! optional($termsAndConditions)->content !!}
                    @endif
                <div>
            </div>
        </div>
    </div>
</section>
@endsection