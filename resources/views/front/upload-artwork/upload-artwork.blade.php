@extends('front_layout.master')
@section('content')
    <section class="vinyl_wrapper viny_new pb-0">
        <div class="container">
            <div class="">
                <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('upload-artwork') !!}
                </nav>
            </div>
        </div>
    </section>

    <section class="up_artwrk_sec p_100 pb-0">
        <div class="container">
            <div class="up-artwrk-content">
                <div class="upwrk_data">
                    <div class="upwrk_files">
                        <h4>I have an Artwork</h4>
                        <div class="upld-lnk"><a href="#" class="btn light_dark">Upload Print-ready Files</a></div>
                        <p>For file(s) bigger than 400MB <br>upload them right here</p>
                    </div>
                    <div class="mid_txt">
                        <p>Or</p>
                    </div>
                    <div class="upwrk_files up_nt">
                        <h4>I don't have an Artwork</h4>
                        <div class="upld-lnk"><a href="#" class="btn light_dark">Add to Basket <br>
                                <span>Upload artwork after order</span></a></div>
                        <p>For file(s) bigger than 400MB <br>upload them right here</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="accordion_wrapper nw_accord p_100">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            For artwork that requires PRINTING only, use any of these formats
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Depending on the resolution and pixel base, images in formats such as PDF, PSD, JPG, TIFF
                                may become blurry when enlarged and are therefore not ideal for large prints. If your
                                artwork is in one of these formats, please make sure that the file(s) you upload meet these
                                requirements: (Logo design not included)
                            </p>
                            <p class="up_doc">
                                <img src="{{ asset('front/img/fil_img.svg') }}" class="img-fluid" alt="..">
                                <span>AI, PS, PDF, CDR, EPS, JPG, TIF</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            For artwork that requires CUTTING, a vector file is required
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Depending on the resolution and pixel base, images in formats such as PDF, PSD, JPG, TIFF
                                may become blurry when enlarged and are therefore not ideal for large prints. If your
                                artwork is in one of these formats, please make sure that the file(s) you upload meet these
                                requirements: (Logo design not included)
                            </p>
                            <p class="up_doc">
                                <img src="{{ asset('front/img/fil_img.svg') }}" class="img-fluid" alt="..">
                                <span>AI, PS, PDF, CDR, EPS, JPG, TIF</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">

                            More file tips
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Depending on the resolution and pixel base, images in formats such as PDF, PSD, JPG, TIFF
                                may become blurry when enlarged and are therefore not ideal for large prints. If your
                                artwork is in one of these formats, please make sure that the file(s) you upload meet these
                                requirements: (Logo design not included)
                            </p>
                            <p class="up_doc">
                                <img src="{{ asset('front/img/fil_img.svg') }}" class="img-fluid" alt="..">
                                <span>AI, PS, PDF, CDR, EPS, JPG, TIF</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
