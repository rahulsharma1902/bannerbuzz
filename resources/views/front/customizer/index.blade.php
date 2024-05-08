@extends('front_layout/index')
@section('content')
<div class="main_div"></div>
<header class="header_wrap">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
             <span class="bar bar-1"></span>
             <span class="bar bar-2"></span>
            <span class="bar bar-3"></span>
          
        </button>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <a class="navbar-brand" href="{{ url('admin-dashboard') ?? '' }}"><img src="{{ asset('coustomizer/img/new_create_logo.png') ?? '' }}"
                    class="img-fluid" alt="" /> </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <div class="main">
                    <div class="hd_cntr custom_scrollbar">
                        <div class="button-group urdbtn">
                            <div class="tooltip hd_tlp btnundo">
                                <button data-title="Undo" data-placement="bottom" class="spride-svg " id="undo"
                                    disabled="disabled" aria-label="Undo">
                                    <span class="menu-text undoButton">
                                        <i class="fa-solid fa-rotate-left"></i>
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Undo
                                </div>
                            </div>

                            <div class="tooltip hd_tlp btnredo">
                                <button data-title="Redo" data-placement="bottom" class="spride-svg " id="redo"
                                    disabled="disabled" aria-label="Redo">
                                    <span class="menu-text redoButton">
                                        <i class="fa-solid fa-rotate-right"></i>
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Redo
                                </div>
                            </div>
                        </div>
                        <div class="button-group common_controls copyPastControls" style="">
                            <div class="tooltip hd_tlp btncopy">
                                <button data-title="Copy" data-placement="bottom" class="spride-svg" id="copy"
                                    aria-label="Copy">
                                    <span class="menu-text">
                                        <i class="fa-regular fa-copy"></i>
                                        <i class="fa-regular fa-copy"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Copy
                                </div>
                            </div>

                            <div class="tooltip hd_tlp btncut">
                                <button data-title="Cut" data-placement="bottom" class="spride-svg" id="cut"
                                    aria-label="Cut">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-scissors"></i>
                                        <i class="fa-solid fa-scissors"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Cut
                                </div>
                            </div>

                            <div class="tooltip hd_tlp btnpaste">
                                <button data-title="Paste" data-placement="bottom" class="btnpaste spride-svg"
                                    id="paste" aria-label="Paste" disabled="disabled">
                                    <span class="menu-text">
                                        <i class="fa-sharp fa-light fa-paste btnpaste"></i>
                                        <i class="fa-sharp fa-light fa-paste btnpaste"></i>
                                    </span>
                                </button>
                                <!-- <div class="tooltip-text">
                                    Paste
                                </div> -->
                            </div>

                            <div class="tooltip hd_tlp btndelete">
                                <button data-title="Delete" data-placement="bottom" class="btndelete spride-svg"
                                    id="delete" aria-label="Delete">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-xmark btndelete"></i>
                                        <i class="fa-solid fa-xmark btndelete"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Delete
                                </div>
                            </div>
                        </div>
                        <div data-for="aligndiv" class="button-group common_controls main2_div" style="">
                            <div class="tooltip hd_tlp alignsbtn">
                                <button data-title="Object Alignment" data-placement="bottom" class="spride-svg"
                                    data-align="top" aria-label="Object Alignment">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-align-justify"></i>
                                        <i class="fa-solid fa-align-justify"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Object Alignment
                                </div>
                            </div>
                        </div>
                        <div class="button-group rotate-box common_controls btnrotate" style="">
                            <div class="tooltip hd_tlp rotatebtn">
                                <button data-title="Rotate" data-placement="bottom" class="btnrotate spride-svg"
                                    aria-label="Rotate">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-arrows-rotate btnrotate"></i>
                                        <i class="fa-solid fa-arrows-rotate btnrotate"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Rotate
                                </div>
                            </div>

                            <input type="text" name="" value="" class="rotate-textbox" data-param="angle" id="rotation"
                                aria-label="Rotation" /> <sup>o</sup>
                        </div>
                        <div class="button-group common_controls" style="">
                            <div class="tooltip hd_tlp fliphr">
                                <button id="FlipX" data-title="Flip Horizontal" data-placement="bottom"
                                    class="spride-svg flipHorizontal" aria-label="Flip Horizontal">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-square-poll-horizontal"></i>
                                        <i class="fa-solid fa-square-poll-horizontal"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Flip Horizontal
                                </div>
                            </div>

                            <div class="tooltip hd_tlp flipvrt">
                                <button id="FlipY" data-title="Flip Vertical" data-placement="bottom" class="spride-svg flipVertical"
                                    aria-label="Flip Vertical">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-square-poll-vertical"></i>
                                        <i class="fa-solid fa-square-poll-vertical"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Flip Vertical
                                </div>
                            </div>

                            <!-- <div class="tooltip hd_tlp filtr">
                                <button data-title="Filter" data-placement="bottom" class="btnfilter bottom spride-svg"
                                    aria-label="Filter" disabled="disabled">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-filter"></i>
                                        <i class="fa-solid fa-filter"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    Filter
                                </div>
                            </div> -->
                        </div>

                        <div data-for="attactWith" class="button-group common_controls obj_arng mainDiv" style="">
                            <div class="tooltip hd_tlp arngobjct ">
                                <button data-title="Arrange Objects" data-placement="bottom"
                                    class="spride-svg btnarrangeobjects bottom " data-align="top"
                                    aria-label="Arrange Objects">
                                    <span class="menu-text">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                </button>
                                <!-- <div class="tooltip-text toltp-arng">
                                    Arrange Objects
                                </div> -->
                            </div>

                            <!-- <div class="lyr_grp" style="display: block;">
                                <button id="forwordBtn" data-param="up" class="changelayer">
                                    <span>Forward</span>
                                    <span class="spride-svg">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                </button>
                                <button id="backwordBtn" data-param="down" class="changelayer">
                                    <span>Backword</span>
                                    <span class="spride-svg">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                </button>
                            </div> -->
                        </div>
                        <div class="button-group opacity-box common_controls" style="">
                            <label>Opacity</label>
                            <div class="range-slider" id="range_slider">
                                <input class="range-slider__range opacity_slider" type="range" value="100" min="0"
                                    max="100" id="opacity_slider" aria-label="Opacity" />

                                <!-- <input class="range-slider__range opacity_slider" type="range" value="100" min="0"
                                    max="100" id="range_slider__range" aria-label="Opacity" /> -->
                                <span class="range-slider__value" id="range_slider__value" style="width: 50px;"></span>
                            </div>
                        </div>
                        <div class="button-group trash-box clearCanvasData">
                            <div class="tooltip hd_tlp trshbtn">
                            <button id="trash" data-title="Trash" data-placement="bottom" class="spride-svg btntrash bottom" aria-label="Trash"  data-bs-toggle="modal" data-bs-target="#trashModal">

                                <!-- <button id="trash" data-title="Trash" data-placement="bottom"
                                    class="spride-svg btntrash bottom" aria-label="Trash"> -->
                                    <span class="menu-text">
                                        <i class="fa-regular fa-trash-can"></i>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </span>
                                </button>
                                <div class="tooltip-text">
                                    trash
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hd_ryt_buttn ">
                    <a hef="#" class="btn cta btn-pnk saveTemplate" template-data="{{ json_encode($templateData->templateData) ?? '' }}" template-id="{{ $templateData->id ?? '' }}">Save</a>
                    <a hef="#" class="btn cta downloadCanvasToPng">Proceed & Checkout</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<section class="design-edit ">
    <div class="row main-rw">
        <div class="col-xl-9 col-lg-12">
            <div class="design-tabs">
                <div class="nw-rw1">
                    <div class="nav flex-column nav-pills contain" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <div class="scrl-hvr">
                        <!-- <div class="tooltip"> -->
                        <button class="nav-link tempdv" data-for="step1" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/template.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/template-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Template</p>
                        </button>
                        <!-- <div class="tooltip-text">
                                        Template
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-2"> -->

                        <button class="nav-link tempdv textList" data-for="step2"  id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/text.png') }}" class="wht-img img-fluid" alt=".." />
                                <img src="{{ asset('coustomizer/img/text-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Text</p>
                        </button>
                        <!-- <div class="tooltip-text">
                                        Text
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-3"> -->

                        <button class="nav-link tempdv" data-for="step3"  id="v-pills-messages-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/background.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/background-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Background</p>
                        </button>
                        <!--  <div class="tooltip-text">
                                        Background
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-4"> -->

                        <button class="nav-link tempdv" data-for="step4"  id="v-pills-settings-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/shapes.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/shapes-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Shapes</p>
                        </button>
                        <!--  <div class="tooltip-text">
                                        Shapes
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-5"> -->

                        <button class="nav-link tempdv" data-for="step5"  id="v-pills-clip-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-clip" type="button" role="tab" aria-controls="v-pills-clip"
                            aria-selected="true">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/clip-part.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/clippart-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Clipart</p>
                        </button>
                        <!-- <div class="tooltip-text">
                                        Clipart
                                    </div>
                                </div>
 -->
                        <!-- <div class="tooltip toltp-6"> -->

                        <button class="nav-link tempdv" data-for="step6"  id="v-pills-upld-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-upld" type="button" role="tab" aria-controls="v-pills-upld"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/upld-f.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/uploads-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Uploads</p>
                        </button>
                        <!-- <div class="tooltip-text">
                                        Uploads
                                    </div>
                                </div>
 -->
                        <!-- <div class="tooltip toltp-7"> -->

                        <!-- <button class="nav-link tempdv" data-for="step7"  id="v-pills-desgn-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-desgn" type="button" role="tab" aria-controls="v-pills-desgn"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/design.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/design-cment-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Design Comments</p>
                        </button> -->
                        <!--  <div class="tooltip-text">
                                        Design Comments
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-8"> -->

                        <button class="nav-link quitop to-top" data-for="step8"  id="v-pills-quick-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-quick" type="button" role="tab" aria-controls="v-pills-quick"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/quick-hlp.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/quick-hlp-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Quick Help</p>
                        </button>
                        <!-- <div class="tooltip-text">
                                        Quick Help
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-9"> -->

                        <button class="nav-link layersButton" data-for="step9"  id="v-pills-lyr-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-lyr" type="button" role="tab" aria-controls="v-pills-lyr"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/layers.png') }}" class="wht-img img-fluid"
                                    alt=".." />
                                <img src="{{ asset('coustomizer/img/lyr-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>Layers</p>
                        </button>
                        <!--   <div class="tooltip-text">
                                        Layers
                                    </div>
                                </div> -->

                        <!-- <div class="tooltip toltp-10"> -->

                        <!-- <button class="nav-link" data-for="step10"  id="v-pills-myd-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-myd" type="button" role="tab" aria-controls="v-pills-myd"
                            aria-selected="false">
                            <span class="spride_img">
                                <img src="{{ asset('coustomizer/img/myd.png') }}" class="wht-img img-fluid" alt=".." />
                                <img src="{{ asset('coustomizer/img/myd-p.png') }}" class="pink-img img-fluid"
                                    alt=".." />
                            </span>
                            <p>My Design</p>
                        </button> -->
                        <!-- <div class="tooltip-text">
                                        My Design
                                    </div>
                                </div> -->
                                </div>
                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tourStep intro-main-box Fstep" id="step1" >
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Template</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>Choose from our state of the art Ready-to-use relevant templates which are
                                        relevant to product you have chosen to design.</p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev"
                                        style="visibility: hidden;">Prev</button>
                                    <span class="intro-count-box">1 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tourStep intro-main-box Sstep" id="step2" >
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Text</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>Use our extensive font library and formatting options (Alignment, Colors, and
                                        Size) to use text in your design.</p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev">Prev</button>
                                    <span class="intro-count-box">2 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tourStep intro-main-box Tstep" id="step3" >
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Background</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>
                                        Choose from extensive library of meaningful background designs to create
                                        beautiful design for your product. Moreover, we’ve also provided the color chart
                                        in case you want to choose from
                                        colors.
                                    </p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev">Prev</button>
                                    <span class="intro-count-box">3 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tourStep intro-main-box Fourstep" id="step4" >
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Shapes</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>Choose from library of different shapes which are useful to create your design;
                                        Color chart is also available to change color of shape.</p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev">Prev</button>
                                    <span class="intro-count-box">4 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tourStep intro-main-box Fvstep" id="step5">
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Clip Art</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>
                                        Choose from extensive library of ready-to-use relevant vector art (ClipArt)
                                        which you can use to create meaningful banner design. You can also search the
                                        vector art you are looking for by
                                        using given search box.
                                    </p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev">Prev</button>
                                    <span class="intro-count-box">5 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tourStep intro-main-box Sixstep" id="step6" >
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Uploads</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>You can upload your photos and Artwork to be used in your design from here;
                                        please also through given instructions related to type if art file and size
                                        limitation.</p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev">Prev</button>
                                    <span class="intro-count-box">6 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="tourStep intro-main-box Svnstep" id="step7" >
                            <div class="intro-box">
                                <div class="top_alrt">
                                    <div class="arrw">
                                        <h6>Free Design Support</h6>
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                    </div>
                                    <p>
                                        If you are not able to complete the design online, please leave a comments in
                                        the comments box. Our design team will incorporate the comments and email you
                                        the new design for approval. Changes
                                        can take up to 48 hours and can delay the delivery date.
                                    </p>
                                </div>
                                <div class="intro-footer">
                                    <button title="Previous" class="introbtn pull-left tourPrev">Prev</button>
                                    <span class="intro-count-box">7 of 7</span>
                                    <button title="Next" class="introbtn pull-right tourNext">Finish</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="temp_content">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close" id="">×</button>

                                <div class="selct-rw d-flex">
                                    <div class="select_box">
                                        <select name="select" id="select-option" class="form-control templateCng temMain">
                                            <option value="" data-show="all">All</option>
                                            @foreach ($templateCategorys as $temCat)
                                                <option data-for="data-showCat" data-templateShow="templateShow{{ $temCat->id ?? '' }}" data-show="templateName{{ $temCat->id ?? '' }}" class="" value="Option_one">{{ $temCat->name ?? '' }}</option>
                                            @endforeach
                                            <!-- <option value="Option_two">Option two</option> -->
                                        </select>
                                    </div>

                                    <div class="select_box">
                                        <select name="select" id="select-option" class="form-control templateCng temOption">
                                            <option value="all" data-for="all">All</option>
                                            @foreach ($templates as $tem)
                                                <option data-for="data-showName" data-templateShow="templateShow{{ $tem->id ?? '' }}"  class="templateName{{ $tem->category->id ?? '' }} templatesName" value="Option_one">{{ $tem->name ?? '' }}</option>
                                            @endforeach
                                            <!-- <option value="Option_two">Option two</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group-box SearchBoxSec">
                                    <div class="form-group f-gr1">
                                        <input type="text" name="" value="" data-for="template" class="form-control CNGInput"
                                            placeholder="Search templates" id="template_search_box"
                                            aria-label="Search Template" />
                                        <button title="Clear" class="template-cross-icon"
                                            style="display: none;">×</button>
                                    </div>
                                </div>
                                <div class="templ_imgs">
                                    <ul class="list-unstyled m-0">
                                        @foreach ($templates as $template)       
                                            <li data-name="{{ $template->name ?? '' }}"  data-showName="templateShow{{ $template->id ?? '' }}" data-showCat="templateShow{{ $template->category->id ?? '' }}" class="loadSelectedTemplate templateSection" data-templateName="templateNametemplate{{$template->id}}" data-templateCat="templateCate{{$template->category->id}}"  data-template-data="{{ json_encode($template->templateData ?? '' ) }}">
                                            <img src="{{ asset('TemplateImage') }}/{{ $template->template_image ?? 'default.png' }}" class="img-fluid"
                                                alt="" /></li>
                                            </li>
                                        @endforeach
                                        <!-- <li><img src="{{ asset('coustomizer/img/t-img1.png') }}" class="img-fluid"
                                                alt="" /></li> -->
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="temp_content">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                <div class="text_box_field">
                                    <div class="form-group">
                                        <input type="button" class="btn-action btn-block addnewtext addnewtextBtn"
                                            name="" value="Add New Text" aria-label="Add new text"
                                            style="opacity: 1; pointer-events: inherit;" />
                                    </div>
                                    <div class="text_box-wrap">
                                        <div class="form-group">
                                            <textarea class="form-control textbox" name="" placeholder="Enter Text Here"
                                                data-objid="98322216">Valentine's Day</textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <textarea class="form-control textbox" name=""
                                                placeholder="Enter Text Here">Sale</textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control textbox" name=""
                                                placeholder="Enter Text Here">special Offer</textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control textbox" name=""
                                                placeholder="Enter Text Here">Lorem Ipsum has been the industry's standard dummy text ever since.</textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control textbox" name=""
                                                placeholder="Enter Text Here">UP TO 50% OFF</textarea>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="temp_content bg_edit">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                <div class="form-group-box SearchBoxSec">
                                    <div class="form-group f-gr1">
                                        <input type="text" name="" value="" data-for="background"
                                            class="form-control CNGInput backgroundCNGInput"
                                            placeholder="Search by Name" id="template_search_box"
                                            aria-label="Search Template" />
                                        <button title="Clear" class="template-cross-icon"
                                            style="display: none;">×</button>
                                    </div>
                                </div>
                                <div class="selct-rw d-flex">
                                    <div class="select_box new_slct">
                                        <select class="select cat_list sectionCNG" data-for="background"
                                            data-type="background" id="background_cat">
                                            <option data-name="all" data-for="background" value="all">All</option>
                                            @foreach ($backgrounds as $background)
                                            <option data-name="{{ $background->slug ?? '' }}"
                                                value="{{ $background->id ?? '' }}">{{ $background->name ?? ''}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="templ_imgs">
                                    <div class="not_txt">
                                        <p>Note: Please click on image to set as background</p>
                                    </div>
                                    <ul class="list-unstyled m-0">
                                        @foreach ($backgrounds as $background)
                                        @if($background->background && is_countable($background->background))
                                        @for ($b = 0; $b < count($background->background); $b++)
                                            <li data-name="{{ $background->background[$b]['name'] ?? '' }}"
                                                data-background="{{ asset('BannerImage') ?? ''}}/{{$background->background[$b]['image'] ?? '' }}"
                                                class="setBackground background-{{ $background->slug ?? '' }} backgroundSection">
                                                <img src="{{ asset('BannerImage') ?? ''}}/{{$background->background[$b]['image'] ?? '' }}"
                                                    class="img-fluid" alt="" /></li>
                                            @endfor
                                            @endif
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="temp_content bg_edit">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                <div class="form-group-box SearchBoxSec">
                                    <div class="form-group f-gr1">
                                        <input type="text" name="" value="" data-for="shape"
                                            class="form-control CNGInput shapeCNGInput" placeholder="Search by Name"
                                            id="template_search_box" aria-label="Search Template" />
                                        <button title="Clear" class="template-cross-icon"
                                            style="display: none;">×</button>
                                    </div>
                                </div>

                                <div class="selct-rw d-flex">
                                    <div class="select_box new_slct">
                                        <select class="select cat_list sectionCNG" data-for="shape" data-type="shape"
                                            id="background_cat">
                                            <option data-name="all" data-for="shape" value="all">All</option>
                                            @foreach ($shapes as $shape)
                                            <option data-name="{{ $shape->slug ?? '' }}" value="{{ $shape->id ?? '' }}">
                                                {{ $shape->name ?? ''}}</option>
                                            @endforeach
                                            <!-- <option value="Option_one">Option one</option>
                                            <option value="Option_two">Option two</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="templ_imgs shpes">
                                    <div class="not_txt">
                                        <p>Note: Please click on image to place shape on canvas</p>
                                    </div>

                                    <ul class="list-unstyled m-0">
                                        @foreach ($shapes as $shape)
                                        @if($shape->shape && is_countable($shape->shape))
                                        @for ($s = 0; $s < count($shape->shape); $s++)
                                            <li data-from="shapes" shapeData="{{ asset('ShapeImage') ?? ''}}/{{$shape->shape[$s]['image'] ?? '' }}" data-name="{{ $shape->shape[$s]['name'] ?? '' }}"
                                                class="selectTemp shape-{{ $shape->slug ?? '' }} shapeSection"><img
                                                    src="{{ asset('ShapeImage') ?? ''}}/{{$shape->shape[$s]['image'] ?? '' }}"
                                                    class="img-fluid" alt="" /></li>
                                            @endfor
                                            @endif
                                            @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-clip" role="tabpanel" aria-labelledby="v-pills-clip-tab">
                            <div class="temp_content bg_edit">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                <div class="form-group-box SearchBoxSec">
                                    <div class="form-group f-gr1">
                                        <input type="text" name="" data-for="clipart" value=""
                                            class="form-control CNGInput clipartCNGInput" placeholder="Search templates"
                                            id="template_search_box" aria-label="Search Template" />
                                        <button title="Clear" class="template-cross-icon"
                                            style="display: none;">×</button>
                                    </div>
                                </div>

                                <div class="selct-rw d-flex">
                                    <div class="select_box new_slct">
                                        <select class="select cat_list sectionCNG" data-for="clipart"
                                            data-type="clipart" name="clipart_cat" id="clipart_cat">
                                            <option data-name="all" data-for="clipart" value="all">All</option>
                                            @foreach ($cliparts as $clipart)
                                            <option data-name="{{ $clipart->slug ?? '' }}"
                                                value="{{ $clipart->id ?? '' }}">{{ $clipart->name ?? ''}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="templ_imgs">
                                    <div class="not_txt">
                                        <p>Note: Please click on image to set as background</p>
                                    </div>
                                    <ul class="list-unstyled m-0">
                                        @foreach ($cliparts as $clipart)
                                        @if($clipart->clipart && is_countable($clipart->clipart))
                                        @for ($c = 0; $c < count($clipart->clipart); $c++)
                                            <li data-name="{{ $clipart->clipart[$b]['name'] ?? '' }}"
                                                data-background="{{ asset('ClipArtImage') ?? ''}}/{{$clipart->clipart[$c]['image'] ?? '' }}"
                                                class="selectTemp clipart-{{ $clipart->slug ?? '' }} clipartSection" data-from="clipart" shapeData="{{ asset('ClipArtImage') ?? ''}}/{{$clipart->clipart[$c]['image'] ?? '' }}" data-name="{{ $clipart->clipart[$c]['name'] ?? '' }}"
                                                ><img
                                                    src="{{ asset('ClipArtImage') ?? ''}}/{{$clipart->clipart[$c]['image'] ?? '' }}"
                                                    class="img-fluid" alt="" /></li>
                                            @endfor
                                            @endif
                                            @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-upld" role="tabpanel" aria-labelledby="v-pills-upld-tab">
                            <div class="temp_content upld_content">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                <div class="text_box_field">
                                    <div class="form-group">
                                        <label>
                                            Upload your image
                                            <button title="" class="btnuploadimginfo" aria-label="Upload your image"><i
                                                    class="fa fa-info-circle"></i></button>
                                        </label>
                                        <input type="button" id="uploadButton" class="btn-action btn-block addnewtext" name="" value="UPLOAD YOUR OWN IMAGE" aria-label="UPLOAD YOUR OWN IMAGE" style="opacity: 1; pointer-events: inherit;" />
                                        <input style="visibility:hidden;" type="file" id="imageUpload" accept="image/*">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                    <div class="templ_imgs">
                                        <div class="not_txt">
                                            <p>Note: Please click on image to place on canvas</p>
                                        </div>
                                        <ul class="list-unstyled m-0 uploadImageSection">
                                            @if($uploadedImages)
                                                @foreach ($uploadedImages as $uploadImg)
                                                    <li data-name="" shapeData="{{ asset('UploadImages/') ?? '' }}/{{ $uploadImg->image ?? '' }}" data-background="{{ asset('UploadImages/') ?? '' }}/{{ $uploadImg->image ?? '' }}" class="uploadedImage">
                                                        <img src="{{ asset('UploadImages') ?? '' }}/{{ $uploadImg->image ?? '' }}" class="img-fluid" alt="" />
                                                    </li>
                                                @endforeach
                                            @endif
                                            <!-- <li data-name="" data-background="" class="setBackground  backgroundSection">
                                                <img src="" class="img-fluid" alt="" />
                                            </li> -->
                                        </ul>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-desgn" role="tabpanel"
                            aria-labelledby="v-pills-desgn-tab">
                            <div class="temp_content bg_edit design-cmnt">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                <div class="text_box_field">
                                    <div class="comment-box-main">
                                        <div class="form-group-box text_box-wrap">
                                            <div class="form-group">
                                                <label>Free Design Support</label>
                                                <textarea class="form-control comment" id="comment" row="7" cols="10"
                                                    placeholder="Please put any design related comments here. Our designers will incorporate the comments and will email the proof before printing"></textarea>
                                                <div class="button-group">
                                                    <button type="submit" title="Continue Design" class="btn cta"
                                                        aria-label="Continue Design">Continue Design</button>
                                                    <button type="submit" title="Finish" class="btn cta btn-pnk"
                                                        data-type="finishWithoutCheck"
                                                        aria-label="Finish">Finish</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-quick" role="tabpanel"
                            aria-labelledby="v-pills-quick-tab">

                        </div>

                        <div class="tab-pane fade" id="v-pills-lyr" role="tabpanel" aria-labelledby="v-pills-lyr-tab">
                            <div class="temp_content bg_edit design-cmnt">
                                
                                <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                <div class="mange">
                                    <ul id="sortable" class="ui-sortable layersList">
                                        <li class="layer">
                                            <button class="" title="View">
                                                <i id="icon" class="far fa-eye"></i>
                                            </button>
                                            <span class="layer-icon-box">
                                                <img src="{{ asset('coustomizer/img/design-tool.png') }}" />
                                            </span>
                                            <span class="layer-text-box">UP TO 50% OFF</span>
                                            <span class="unlock-layer"> <i
                                                    class="fa-sharp fa-solid fa-unlock"></i></span>
                                            <span class="layer-dragg-box"> </span>
                                        </li>
                                        <!-- <li class="layer">
                                            <button class="" title="View">
                                                <i id="icon" class="far fa-eye"></i>
                                            </button>
                                            <span class="layer-icon-box"> <img
                                                    src="{{ asset('coustomizer/img/design-tool.png') }}" /></span>
                                            <span class="layer-text-box">Lorem Ipsum has been the industry's standard
                                                dummy text ever since.</span>
                                            <span class="unlock-layer"> <i
                                                    class="fa-sharp fa-solid fa-unlock"></i></span>
                                            <span class="layer-dragg-box"> </span>
                                        </li>
                                        <li class="layer">
                                            <button class="" title="View">
                                                <i id="icon" class="far fa-eye"></i>
                                            </button>
                                            <span class="layer-icon-box">
                                                <img src="{{ asset('coustomizer/img/design-tool.png') }}" />
                                            </span>
                                            <span class="layer-text-box">SPECIAL OFFER</span>
                                            <span class="unlock-layer"> <i
                                                    class="fa-sharp fa-solid fa-unlock"></i></span>
                                            <span class="layer-dragg-box"> </span>
                                        </li>
                                        <li class="layer">
                                            <button class="" title="View">
                                                <i id="icon" class="far fa-eye"></i>
                                            </button>
                                            <span class="layer-icon-box"> <img
                                                    src="{{ asset('coustomizer/img/design-tool.png') }}" /></span>
                                            <span class="layer-text-box">SALE</span>
                                            <span class="unlock-layer"> <i
                                                    class="fa-sharp fa-solid fa-unlock"></i></span>
                                            <span class="layer-dragg-box"> </span>
                                        </li>
                                        <li class="layer">
                                            <button class="" title="View">
                                                <i id="icon" class="far fa-eye"></i>
                                            </button>
                                            <span class="layer-icon-box"> <img
                                                    src="{{ asset('coustomizer/img/design-tool.png') }}" /></span>
                                            <span class="layer-text-box">Valentine's Day</span>
                                            <span class="unlock-layer"> <i
                                                    class="fa-sharp fa-solid fa-unlock"></i></span>
                                            <span class="layer-dragg-box"> </span>
                                        </li>
                                        <li class="layer">
                                            <button class="" title="View">
                                                <i id="icon" class="far fa-eye"></i>
                                            </button>
                                            <span class="layer-icon-box"> <img
                                                    src="{{ asset('coustomizer/img/design-tool.png') }}" /></span>
                                            <span class="layer-text-box">Image Layer</span>
                                            <span class="unlock-layer"> <i
                                                    class="fa-sharp fa-solid fa-unlock"></i></span>
                                            <span class="layer-dragg-box"> </span>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-myd" role="tabpanel" aria-labelledby="v-pills-myd-tab">
                            <div class="loginPopupBox">
                                <button title="Close" class="btncloseleftpanel" aria-label="Close" id="">×</button>
                                <div class="loginBox d-flex">
                                    <div class="loginLeftBox">
                                        <div class="imageBox">
                                            <img src="{{ asset('coustomizer/img/my_des.svg') }}" alt="" />
                                        </div>
                                    </div>

                                    <div class="loginRightBox">
                                        <div class="blockTitle">
                                            <h3>LOGIN</h3>
                                        </div>
                                        <div class="">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" value=""
                                                    placeholder="Email Address*" />
                                                <span></span>
                                                <span class="el-icon"><i
                                                        class="fa-sharp fa-light fa-envelope"></i></span>
                                            </div>
                                            <div class="form-group">
                                                <input id="password-field" type="password" class="form-control"
                                                    name="password" value="" placeholder="Password*" />
                                                <span class="el-icon"><i class="fa-light fa-lock"></i></span>
                                                <span toggle="#password-field"
                                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            </div>
                                        </div>
                                        <div class="otpbutton">
                                            <button class="linkButton forgotLink">Forgot Password?</button>
                                            <a class="linkButton forgotLink otpLink">
                                                <span>Login With Email OTP</span>
                                            </a>
                                        </div>

                                        <div class="buttonSet"><button type="button" class="btn cta">Log In</button>
                                        </div>
                                        <div class="socialLogin">
                                            <div class="socialTitleBox">
                                                <span class="socialTitle"> <span>(OR) </span>Sign Up With Social</span>
                                            </div>
                                            <div class="socialContent">
                                                <ul class="signinLinks">
                                                    <li>
                                                        <a href="#" class="linkButton googlePlus">
                                                            <i class="fa-brands fa-google"> </i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="linkButton facebook">
                                                            <i class="fa-brands fa-facebook-f"> </i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="linkButton amazone">
                                                            <i class="fa-brands fa-amazon"> </i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="createAccountLinkBox">
                                            <span>Don't Have An Account?</span>
                                            <button class="linkButton">Create An Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="canva-img">
                        <div style="min-height: 4rem !important;">
                            <div class="main2">
                                <div class="color_pickers colr_menu">
                                    <div class="background-panel-desktop">
                                        <div class="form-group-box background_control object_control" style="">
                                            <div class="color-palette-box">
                                                <ul id="background_color_box">
                                                    <li class="colorChange color whitecolorborder" bgColor="#e7e4e4">
                                                        <span data-colorcode="ffffff"
                                                            style="background-color: rgb(255, 255, 255);"> </span>
                                                    </li>
                                                    <li class="colorChange"  bgColor="rgb(211, 211, 211)">
                                                        <span data-colorcode="d3d3d3"
                                                            style="background-color: rgb(211, 211, 211);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#cf0209">
                                                        <span data-colorcode="cf0209"
                                                            style="background-color: rgb(207, 2, 9);">
                                                        </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#efe722">
                                                        <span data-colorcode="efe722"
                                                            style="background-color: rgb(239, 231, 34);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#76ab03">
                                                        <span data-colorcode="76ab03"
                                                            style="background-color: rgb(118, 171, 3);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#1d99cf">
                                                        <span data-colorcode="1d99cf"
                                                            style="background-color: rgb(29, 153, 207);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#000000">
                                                        <span data-colorcode="000000"
                                                            style="background-color: rgb(0, 0, 0);">
                                                        </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#1dab49">
                                                        <span data-colorcode="1dab49"
                                                            style="background-color: rgb(29, 171, 73);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#6f6f6f">
                                                        <span data-colorcode="6f6f6f"
                                                            style="background-color: rgb(111, 111, 111);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#993229">
                                                        <span data-colorcode="993229"
                                                            style="background-color: rgb(153, 50, 41);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#f67e1d">
                                                        <span data-colorcode="f67e1d"
                                                            style="background-color: rgb(246, 126, 29);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#008e4b">
                                                        <span data-colorcode="008e4b"
                                                            style="background-color: rgb(0, 142, 75);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#0059b3">
                                                        <span data-colorcode="0059b3"
                                                            style="background-color: rgb(0, 89, 179);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#e6ba33">
                                                        <span data-colorcode="e6ba33"
                                                            style="background-color: rgb(230, 186, 51);"> </span>
                                                    </li>
                                                    <li class="colorChange" bgColor="#cb89bb">
                                                        <span data-colorcode="cb89bb"
                                                            style="background-color: rgb(203, 137, 187);"> </span>
                                                    </li>
                                                    <li>
                                                    <div class="asColorPicker-wrap">
                                                        <button title="Add Color" class="btnaddcolor asColorPicker_hideInput asColorPicker-input" id="background_color_picker">
                                                            <span class="adjustBtnClr count-plus"><i class="fa-sharp fa-solid fa-plus"></i></span>
                                                        </button>
                                                        <input type="color" id="hidden_color_picker" style="display: block; opacity: -0;">
                                                    </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="acrylc-letter-box">
                                    <div class="form_group_box">
                                        <div class="select_box">
                                            <select name="select" id="select-option" class="form-control font-family">
                                                <option style="font-family: 'Mona Sans';" value="Mona Sans">Mona Sans</option>
                                                <option style="font-family: 'Arial';" value="Arial">Arial</option>
                                                <option style="font-family: 'Rockwell;';" value="Rockwell">Rockwell</option>
                                                <option style="font-family: 'emoji';" value="emoji">emoji</option>
                                                <option style="font-family: 'math';" value="math">math</option> 
                                                <option style="font-family: 'monospace';" value="monospace">Monospace</option>
                                                <option style="font-family: 'system-ui';" value="system-ui">System-ui</option>
                                                <option style="font-family: 'Times New Roman';" value="Times New Roman">Times New Roman</option>
                                                <option style="font-family: 'Open Sans';" value="Open Sans">Open Sans</option>
                                                <option style="font-family: 'Roboto';" value="Roboto">Roboto</option>

                                            </select>
                                        </div>
                                        <div class="select-size">
                                            <label>Size:</label>
                                            <input type="number" name="fontSize" class="form-control font-size" min="1"
                                                max="600" placeholder="117" />
                                        </div>
                                    </div>
                                    <div class="text-editor">
                                        <ul style="width:0;">
                                            <li class="custm_li  bold-btn">
                                                <button data-title="Bold" data-placement="bottom"
                                                    class="text_param  bold-btn" id="bold">
                                                    <span class="menu-text bold-btn">
                                                        <i class="fa-solid fa-bold"></i>
                                                        <i class="fa-solid fa-bold"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <li class="custm_li italic-btn">
                                                <button data-title="Italic" class="text_param " id="italic">
                                                    <span class="menu-text">
                                                        <i class="fa-solid fa-italic"></i>
                                                        <i class="fa-solid fa-italic"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <li class="custm_li underline-btn">
                                                <button data-title="Underline" class="text_param" id="underline">
                                                    <span class="menu-text">
                                                        <i class="fa-solid fa-underline"></i>
                                                        <i class="fa-solid fa-underline"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <li class="custm_li align-left-btn">
                                                <button data-title="Left Align Text" class="text_param align"
                                                    id="text_align_left">
                                                    <span class="menu-text">
                                                        <i class="fa-solid fa-align-left"></i>
                                                        <i class="fa-solid fa-align-left"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <li class="custm_li align-center-btn">
                                                <button data-title="Center Text" class="text_param"
                                                    id="text_align_center">
                                                    <span class="menu-text">
                                                        <i class="fa-solid fa-align-center"></i>
                                                        <i class="fa-solid fa-align-center"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <li class="custm_li align-right-btn">
                                                <button data-title="Right Align Text" class="text_param"
                                                    id="text_align_right">
                                                    <span class="menu-text">
                                                        <i class="fa-solid fa-align-right"></i>
                                                        <i class="fa-solid fa-align-right"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <li>
                                                <div class="color_picker">
                                                    <!-- <input type="color" id="body" class="colorCngCoustam colorCng" name="body" value="#e7e4e4" /> -->
                                                    <input type="color" class="colorCngCoustam colorCng" id="favcolor"
                                                        name="favcolor" value="#e7e4e4" />
                                                </div>
                                            </li>
                                            <li>
                                                <!-- <div class="form-group arcBox">
                                                    <input class="styled-checkbox" id="makeArc" type="checkbox"
                                                        value="arc-text" />
                                                    <label for="makeArc" class="arcText">Arc Text</label>
                                                    <div class="mainRadiusBox">
                                                        <div class="open-arc-text">
                                                            <div class="radius-box">
                                                                <label>Radius</label>
                                                                <div class="range-slider" id="range_slider">
                                                                    
                                                                    <input class="arcRadiusSlider range-slider__range" type="range"
                                                                        value="250" min="0" max="263" id="radius" />
                                                                    <span class="range-slider__value"
                                                                        id="radius_slider_value"
                                                                        style="width: 28.8973%;"></span>
                                                                </div>
                                                            </div>
                                                            <div class="reverse-box">
                                                                <input class="styled-checkbox" id="reverse"
                                                                    type="checkbox" value="reverse" />
                                                                <label for="reverse">Reverse</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </li>
                                            <li class="btncontrols">
                                                <button class="text_param btnmoretextcontrols mrcontrol" data-for="attactWith1">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                            </li>
                                            <!-- <li>
                                            <div class="select_box slct_lng">
                                                <select name="select" id="select-option" class="form-control">
                                                    <option value="">English</option>
                                                    <option value="Option_one">English</option>
                                                </select>
                                            </div>
                                        </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- <div class="mCustomScrollbar canvas-container wrapper" style="height:465px; overflow:scroll; padding: 2rem 5rem; display: flex; justify-content: center; position: relative;">
                                    <div id="horizontalLine" style="z-index:1; position: absolute; height: 11px; background-color: white; width: 2px; top: 4%; left: 258px;"></div>
                                    <div id="verticalLine" style="z-index:1; position: absolute; width: 13px; background-color: white; height: 2px; top: 0; left: 19%;"></div>
                                <canvas id="canvasBottom" width=550 height=450 style=""></canvas>
                                <canvas id="customCanvas" width="500" height="400" style="border: 1px solid;"></canvas>
                               
                        </div>
                        <div style="position: sticky;display: flex;justify-content: center;background: #1e1c1c; margin-top:-2rem;">
                                    <span class="zoomOut" style="cursor:pointer">+</span>
                                    <select name="" id="">
                                        <option value="">100%</option>
                                        <option value="">50%</option>
                                        <option value="">fit</option>
                                    </select>
                                    <span class="zoomIn" style="cursor:pointer">-</span>
                                </div> -->
                                
                                <!-- <div class="mCustomScrollbar canvas-container wrapper" style="height:465px; overflow:scroll; padding: 2rem 5rem; display: flex; justify-content: center; position: relative;">
                                    <div class="canvasData" >
                                        <div id="horizontalLine" style="z-index:1; position: absolute; height: 11px; background-color: white; width: 2px; top: 4%; left: 258px;"></div>
                                        <div id="verticalLine" style="z-index:1; position: absolute; width: 13px; background-color: white; height: 2px; top: 0; left: 19%;"></div>
                                        <canvas id="canvasBottom" width="550" height="450" style=""></canvas>
                                        <canvas id="customCanvas" width="500" height="400" style="border: 1px solid;"></canvas>
                                    </div>
                                </div>
                                <div style="position: sticky;display: flex;justify-content: center;background: #1e1c1c; margin-top:-2rem;">
                                    <span class="zoomIn" style="cursor:pointer">-</span>
                                    <select class="textfield" data-param="zoomSelect" id="zoomSelect">
                                        <option value="25">25%</option>
                                        <option value="50">50%</option>
                                        <option value="75">75%</option>
                                        <option value="100" selected="selected">100%</option>
                                        <option value="200">200%</option>
                                        <option value="400">400%</option>
                                        <option value="600">600%</option>
                                        <option value="800">800%</option>
                                        <option value="100">Fit</option>
                                        <option value="fill">Fill</option>
                                    </select>
                                    <span class="zoomOut" style="cursor:pointer">+</span>
                                </div> -->
                                <!-- <div class="mCustomScrollbar canvas-container wrapper" style="height:465px; overflow:scroll; padding: 2rem 5rem; display: flex; justify-content: center; position: relative;"> -->
                                <div class="mCustomScrollbar canvas-container wrapper" style="height:430px; overflow:auto; padding: 1rem 5rem; justify-content: center; position: relative;">
                                    <div class="canvasData" style="">
                                        <!-- <div id="horizontalLine" style="z-index:1; position: absolute; height: 11px; background-color: white; width: 2px; top: 4%; left: 258px;"></div>
                                        <div id="verticalLine" style="z-index:1; position: absolute; width: 13px; background-color: white; height: 2px; top: 0; left: 19%;"></div> -->
                                        <div class="canvas-ruler" id="canvas-ruler">
                                            <div class="ef-ruler">
                                                <div class="corner" style="top: 0px; left: 0px;background: transparent;"></div>
                                                <div class="ruler top rulerTop" style="top: 0px;">
                                                    <div class="top-line" style="left: 51.5px;"></div>
                                                </div>
                                                <div class="ruler left rulerLeft" style="left: 0px;">
                                                    <div class="left-line" style="top: 242px;"></div>
                                                </div>
                                            </div>
                                            <div class="stage" style="">
                                                <div id="main_designtool_tool" class="dragCanvas">
                                                    <canvas id="customCanvas" width="500" height="300" style="border: 1px solid;"></canvas>
                                                </div>
                                            </div>
                                            <div class="measurement-Box" style="">
                                                <span class="measurement-top-box">
                                                    <span class="feetlabel-box">6.00 Ft</span> (w)
                                                </span> X 
                                                <span class="measurement-left-box">
                                                    <span class="feetlabel-box">8.00 Ft </span> (H)
                                                </span>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
                             
                                </div>
                                <div class="canvas-footer" style="position: absolute; bottom: 0; width: 100%;height: 2rem;box-sizing: border-box; display: flex; justify-content: center; align-items: center;">
                                        <button class="zoomBtn" id="zoomOut" data-type="down">-</button>
                                        <select id="zoomSelect" style="margin: 0 10px; background:white;">
                                            <option value="25">25%</option>
                                            <option value="50">50%</option>
                                            <option value="75">75%</option>
                                            <option value="100" selected>100%</option>
                                            <option value="200">200%</option>
                                            <option value="400">400%</option>
                                            <option value="600">600%</option>
                                            <option value="800">800%</option>
                                            <!-- <option value="fit">fit</option>
                                            <option value="fill">fill</option> -->
                                        </select>
                                        <button class="zoomBtn" id="zoomIn" data-type="up">+</button>
                                </div>

                        <!-- <div class="cnva_dummy">
                            <div class="cnva_dv">
                                <canvas id="customCanvas" width="700" height="300" style="border:1px solid red;"></canvas>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 new_right_arw">
            <div class="desgin-ryt-arw">
                <button type="button" class="btnpanelbox" aria-label="panel-box" style="display: none;">
                    <i class="fa fa-angle-left"></i>
                </button>

                <div class="design-ryt-vw">
                    <div class="ryt-logo-img">
                        <div class="cusm-lgo">
                            <!-- <img src="{{ asset('coustomizer/img/custom-vinyl.png') }}" class="img-fluid" alt=".." /> -->
                            @if($product->images)
                                @php $imageArray = json_decode($product->images, true); @endphp
                                @if(!empty($imageArray))
                                    @php $firstImage = array_shift($imageArray); @endphp
                                    <img src="{{ asset('product_Images/' . $firstImage) }}" class="img-fluid" alt=".." />
                                @endif
                            @else
                            <img src="{{ asset('TemplateImage/default.png') }}" class="img-fluid" alt=".." />
                            @endif

                        </div>
                        <h6>{{ $product->name ?? '' }}</h6>
                    </div>
                    <div class="footer-size-main">
                        <a class="standard_size">Standard Size</a>
                    </div>
                    
                    <div id="table_custom_size" class="custom-size">
                        <ul class="custom_size">
                        @if ($product->sizes->isNotEmpty())
                                
                            <li class="option sizeOptions">
                                <div class="select_box">
                                    <select id="select_size" name="select" class="form-control">
                                        @foreach ($product->sizes as $size)
                                        <option data-id="{{ $size->id }}" data-price="{{ $size->price }}" value="{{ $size->size_value }}">{{ $size->size_value }}</option>
                                            @endforeach
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                            </li>
                            @endif
                            <div style="display: {{ $product->sizes->isNotEmpty() ? 'none' : 'block' }};" class="custom_size_div" id="custom_size_div">
                            <li class="option">
                                <div class="custome-size-title">W</div>
                                <div class="customsize-wrapper sizeMeasurement">
                                    <input data-unit="Ft" class="form-select form-control" type="number" name="custom_width" value="3" id="custom_width" placeholder="width">

                                </div>
                            </li>
                            </div>
                            <div style="display: {{ $product->sizes->isNotEmpty() ? 'none' : 'block' }};" class="custom_size_div" id="custom_size_div">
                                <li class="option">
                                    <div class="custome-size-title">H</div>
                                    <div class="customsize-wrapper sizeMeasurement">
                                        <input data-unit="Ft" class="form-select" type="number" name="custom_height" value="3" id="custom_height" placeholder="height">

                                    </div>
                                </li>
                                <input type="hidden" name="product_default_price" id="product_default_price" value="{{ $product->price ?? '' }}">
                            </div>
                            <li class="option">
                                <div class="select_box">
                                <select id="size_unit" name="size_unit" class="form-select">
                                    <option value="Ft">Ft</option>
                                    <option value="In">inch</option>
                                    <option value="Cm">Cm</option>
                                    <option value="Mm">Mm</option>
                                </select>
                                </div>
                            </li>

                           
                        </ul>
                    </div>
                    <div class="ftr-size-price">
                    <div class="ftr-size-lft">
                        <p>
                            <span id="product_price">
                                @if ($product->sizes->isNotEmpty())
                                    ${{ $product->sizes->first()->price ?? '' }}
                                @else
                                    {{ $product->price ?? '' }}
                                @endif
                            </span>
                            <span>Incl. VAT</span>
                        </p>
                    </div>

                        <div class="ftr-lnks">
                            <a hef="#" style="display: {{ $product->sizes->isNotEmpty() ? 'none' : 'block' }};" class="btn cta applyBtn">Apply</a>
                        </div>
                    </div>
                    <div class="ryt-view-box">
                        <div class="editing-lnks">
                            <ul class="list-unstyled m-0">
                                <li>
                                    <button type="button" class="previewImage rytb btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <div class="tooltip tol-ryt">
                                            <span class="edt_lnk">
                                                <i class="fa-sharp fa-thin fa-image"></i>
                                                <i class="fa-sharp fa-thin fa-image"></i>
                                            </span>
                                            <div class="tooltip-text">
                                                Preview
                                            </div>
                                        </div>
                                    </button>

                                </li>
                                <li>
                                    <button type="button" class="rytb btn shareImage" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">
                                        <div class="tooltip tol-ryt">
                                            <span class="edt_lnk">
                                                <i class="fa-sharp fa-light fa-share-nodes"></i>
                                                <i class="fa-sharp fa-light fa-share-nodes"></i>
                                            </span>
                                            <div class="tooltip-text sr_tp">
                                                Share
                                            </div>
                                        </div>
                                    </button>

                                </li>

                                <li>
                                    <button type="button" class="rytb btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal3">
                                        <div class="tooltip tol-ryt">
                                            <span class="edt_lnk">
                                                <i class="fa-sharp fa-solid fa-info"></i>
                                                <i class="fa-sharp fa-solid fa-info"></i>
                                            </span>
                                            <div class="tooltip-text gd-ln">
                                                Guideline
                                            </div>
                                        </div>
                                    </button>

                                </li>
                            </ul>
                        </div>

                        <div class="togls_buttn">
                            <ul class="list-unstyled m-0">
                                <li>
                                    <span class="cht_box">
                                        <img src="{{ asset('coustomizer/img/chat.png') }}" class="wht_cht img-fluid" alt=".." />
                                        <img src="{{ asset('coustomizer/img/chat-p.png') }}" class="pnk_cht img-fluid" alt=".." />
                                    </span>
                                </li>
                                <li>
                                    <label class="switch">
                                        <input type="checkbox" />
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Preview</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="preview-main-box">
                                    <div class="preview-main-thumb-box">
                                        <ul>
                                            <li class="preview-img-front">
                                                <div class="img-thumb-box">
                                                    <img src="{{ asset('coustomizer/img/dash_s.png') }}" class="img-fluid" alt="" />
                                                </div>
                                                <span>
                                                    Front design
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="preview-main-large-box previewImageBody">
                                        <img src="{{ asset('coustomizer/img/dashd.png') }}" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn cta" data-bs-dismiss="modal">Finish</button>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Share Your Creation</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="share-form">
                                    <div class="preview-main-large-box shareImageData">
                                        <img src="{{ asset('coustomizer/img/dashd.png') }}" class="img-fluid" alt="" />
                                    </div>

                                    <div class="popup-shareform-box">
                                        <ul class="form-group-box">
                                            <li>
                                                <ul class="top_li">
                                                    <li class="inpt_boxs">
                                                        <div class="form-group">
                                                            <label class="mandate">Your Name</label>
                                                            <input type="text" name="sendername" id="sendername"
                                                                class="form-control" placeholder="Your Name" />
                                                        </div>
                                                    </li>
                                                    <li class="inpt_boxs">
                                                        <div class="form-group">
                                                            <label class="mandate">Your Email</label>
                                                            <input type="text" name="senderemail" id="senderemail"
                                                                class="form-control" placeholder="Receiver's Email" />
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-full">
                                                <div class="form-group">
                                                    <label>Email Notes</label>
                                                    <textarea class="form-control" id="sendernotes" row="4" cols="10"
                                                        placeholder="Notes"></textarea>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn cta">SEND ARTWORK</button>
                                <button type="button" class="btn cta btn-pnk" data-bs-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Guidelines</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row guide_text">
                                    <div class="col-lg-7">
                                        <div class="guideline-details">
                                            <div class="detail-box">
                                                <h4>Cut Lines: <span class="dashed-border">&nbsp;</span></h4>
                                                <p>This is where we aim to trim the product.</p>
                                            </div>
                                            <div class="detail-box">
                                                <h4>Safe Lines: <span class="dotted-border">&nbsp;</span></h4>
                                                <p>Keep text and important imagery within this line to ensure it does
                                                    not get cut off during trimming.</p>
                                            </div>
                                            <div class="guide-lines-box">
                                                <div class="solid-border">
                                                    <div class="dashed-border">
                                                        <div class="dotted-border">&nbsp;</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-box">
                                                <h4>Disclaimer:</h4>
                                                <p>
                                                    Please take a note that all .ai, .eps, .pdf file format artwork will
                                                    not have the low resolution warning. We strongly suggest to ask for
                                                    proof for the good quality print.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="short_trm">
                                            <div class="guideline-shortcut">
                                                <div class="shortcut-list-box">
                                                    <h4>Shortcuts</h4>
                                                    <ul class="shortcut-list">
                                                        <li>
                                                            <div class="short-name">Cut</div>
                                                            <div class="short-key">Ctrl + X</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Copy</div>
                                                            <div class="short-key">Ctrl + C</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Paste</div>
                                                            <div class="short-key">Ctrl + V</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Undo</div>
                                                            <div class="short-key">Ctrl + Z</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Redo</div>
                                                            <div class="short-key">Ctrl + Y</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Move object towards left</div>
                                                            <div class="short-key">Left</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Move object towards the right</div>
                                                            <div class="short-key">Right</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Move object towards up</div>
                                                            <div class="short-key">Up</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Move object towards down</div>
                                                            <div class="short-key">Down</div>
                                                        </li>
                                                        <li>
                                                            <div class="short-name">Delete</div>
                                                            <div class="short-key">Del</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="display: none;">
                                <button type="button" class="btn cta">SEND ARTWORK</button>
                                <button type="button" class="btn cta btn-pnk" data-bs-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- <div class="lyr_grp attactWith" data-attact="mainDiv" style="display: block; border:red;">
        <button id="forwordBtn" data-param="up" class="changelayer">
            <span class="spride-svg">
                <i class="fa-solid fa-layer-group"></i>
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span>Forward</span>
        </button>
        <button id="backwordBtn" data-param="down" class="changelayer">
            <span class="spride-svg">
                <i class="fa-solid fa-layer-group"></i>
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span>Backword</span>
        </button>
    </div> -->



</section>
<!-- new html -->


<div class="lyr_grp attactWith attachData" style="display: none;">
    <button id="forwordBtn" data-param="up" class="changelayer bringForward">
        <span>Forward</span>
        <span class="spride-svg">
            <i class="fa-solid fa-layer-group"></i>
            <i class="fa-solid fa-layer-group"></i>
        </span>
    </button>
    <button id="backwordBtn" data-param="down" class="changelayer sendBackward">
        <span>Backword</span>
        <span class="spride-svg">
            <i class="fa-solid fa-layer-group"></i>
            <i class="fa-solid fa-layer-group"></i>
        </span>
    </button>
</div>
<div class="alignment-box aligndiv" style="display: none;">

    <button type="button" fun-for="alignTopEdge" class=" alignment-bttn algn_Top btn-secondary" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="Align Top Edges">

        <span class="align_imgs">
            <img src="{{ asset('coustomizer/img/algn-btp.png') ?? '' }}" class="wht-img img-fluid" alt="..">
            <img src="{{ asset('coustomizer/img/algn-tp.png') ?? '' }}" class="pink-img img-fluid" alt="..">
        </span>
    </button>

    <button type="button" fun-for="alignVerticalCenter" class="alignment-bttn algn_Vcntr btn-secondary" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="Align Vertical Center">

        <span class="align_imgs">
            <img src="{{ asset('coustomizer/img/algn_bvcntr.png') ?? '' }}" class="wht-img img-fluid" alt="..">
            <img src="{{ asset('coustomizer/img/algn_vcntr.png') ?? '' }}" class="pink-img img-fluid" alt="..">
        </span>
    </button>

    <button type="button" fun-for="alignBottomEdge" class="alignment-bttn algn_Btm btn-secondary" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="Align Bottom Edges">

        <span class="align_imgs">
            <img src="{{ asset('coustomizer/img/algn_bbtm.png') ?? '' }}" class="wht-img img-fluid" alt="..">
            <img src="{{ asset('coustomizer/img/algn_btm.png') ?? '' }}" class="pink-img img-fluid" alt="..">
        </span>
    </button>

    <button type="button" fun-for="alignLeftEdge" class="alignment-bttn algn_Lft btn-secondary" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="Align Left Edges">

        <span class="align_imgs">
            <img src="{{ asset('coustomizer/img/algn_blft.png') ?? '' }}" class="wht-img img-fluid" alt="..">
            <img src="{{ asset('coustomizer/img/algn_lft.png') ?? '' }}" class="pink-img img-fluid" alt="..">
        </span>
    </button>

    <button type="button" fun-for="alignHorizontalCenter" class="alignment-bttn algn_Hcntr btn-secondary" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="Align Horizontal Center">

        <span class="align_imgs">
            <img src="{{ asset('coustomizer/img/algn_bhcntr.png') ?? '' }}" class="wht-img img-fluid" alt="..">
            <img src="{{ asset('coustomizer/img/algn_hcntr.png') ?? '' }}" class="pink-img img-fluid" alt="..">
        </span>
    </button>

    <button type="button" fun-for="alignRightEdge" class="alignment-bttn algn_Ryt btn-secondary" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="Align Right Edges">
        <span class="align_imgs">
            <img src="{{ asset('coustomizer/img/algn_bryt.png') ?? '' }}" class="wht-img img-fluid" alt="..">
            <img src="{{ asset('coustomizer/img/algn_ryt.png') ?? '' }}" class="pink-img img-fluid" alt="..">
        </span>
    </button>
</div>

<div class="text-more-controls attactWith1 attachData" data-attact="mrcontrol">
    <div class="text-option-box">
        <!-- <span class="arrow-icon"></span> -->
        <div class="form-group">
            <div class="line-height">
                <label>Line Height</label>
                <div class="range-slider">
                    <input class="range-slider__range lineHeight cngLetterHeight" type="range" value="1" min="1" max="10" step="0.1"
                        id="line_height_range_slider">
                    <span class="range-slider__value" id="line_height_slider_value"></span>
                </div>
            </div>
            <div class="letter-space">
                <label>Letter Spacing</label>
                <div class="range-slider" id="letter_space_range_slider">
                    <input class="cngLetterSpace range-slider__range charSpacing" type="range" value="50" min="-100" max="500"
                        id="charSpacing">
                    <span class="range-slider__value" id="letter_space_slider_value"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="text-stroke-box" style="">
                <label>Text Highlight</label>
                <div class="stroke-box">
                    <div class="asColorPicker-wrap">
                        <button title="Add Color" class="btnaddcolor" id="text_highlight_color_picker">
                            <div class="color_picker">
                                <input class="highlightBg" type="color" id="favcolor" name="favcolor" value="#fff">
                            </div>
                        </button>
                        <div class="asColorPicker-trigger">
                            <span style=""></span>
                        </div>
                    </div>
                    <input type="hidden" name="text_background_color_box" id="text_background_color_box" value=""
                        class="color_param_change" data-param="textBackgroundColor" data-type="text"
                        aria-label="Text Highlight">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- delete model code : -->

<div class="modal fade" id="trashModal" tabindex="-1" aria-labelledby="trashModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-body">
                                        <div class="success">
                                            <p>Do you want to delete the entire design? Once you remove, you will need to create it again!</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="clearAllCanvasData" data-bs-dismiss="modal">
                                            <span>ok</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

<!--  delete model end here -->
<div class="modal fade" id="exampleModal22" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-dark">Design Title</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="share-form">

                                    <div class="popup-shareform-box">
                                        <ul class="form-group-box">
                                            <li>
                                                <ul class="top_li">
                                                    <li class="inpt_boxs">
                                                        <div class="form-group">
                                                            <label class="mandate">Template Name</label>
                                                            <input type="text" name="templateName" id="templateName"
                                                                class="form-control" placeholder="Template Name" />
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            
                                <button type="button" class="saveASData btn-pnk cta">SAVE AS</button>
                                <button type="button" class="saveData cta">SAVE</button>
                                <!-- <button type="button" class="btn cta btn-pnk" data-bs-dismiss="modal">CANCEL</button> -->
                            </div>
                        </div>
                    </div>
                </div>
<!-- end new html  -->
<script src="{{ asset('coustomizer/js/template.js') ?? '' }}"></script>

<script>
</script>
<script>
document.getElementById('imageUpload').addEventListener('change', function(e) {
    var imageFile = e.target.files[0];
    var formData = new FormData(); 
    formData.append('image', imageFile); 
    formData.append('user_id', '{{ Auth::user()->id ?? '' }}');

    $.ajax({
        method: 'POST',
        url: '{{ url('admin-dashboard/template/uploadImage') }}',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                // console.log(response.message);
                if (response.message) {
                    var imgName = response.message;
                    var imgElement = $('<img />').addClass('img-fluid');

                    var imgSrc = "{{ asset('UploadImages/') }}/" + imgName;
                    imgElement.attr('src', imgSrc);

                    var listItem = $('<li />').addClass('uploadedImage');
                    var listItemDataBackground = "{{ asset('UploadImages/') }}/" + imgName;
                    listItem.attr('data-background', listItemDataBackground);
                    listItem.attr('shapeData', listItemDataBackground);
                    listItem.attr('data-from', 'upload');
                    listItem.append(imgElement);

                    $('.uploadImageSection').append(listItem);
                }
            } else {
                console.error('Image upload failed');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

</script>
<?php use Illuminate\Support\Facades\Session;
 ?>
<script>
$(document).ready( function(){

    
    var isAuthenticated = {!! json_encode(Auth::check()) !!};
    $('.saveTemplate').on('click', function() {
        var templateName = $('.templateName').val();
        $("#exampleModal22").modal('show');
            // saveTemplate();
    });
    $('.saveASData').on('click', function (){
        var templateName  = " {{ session::get('lastTemplate') ?? '' }}";
    });
    $('.saveData').on('click', function (){

    });

    function saveTemplate() {
        var canvasData = JSON.stringify(canvas.toJSON());
        var sizeId = $('#select_size option:selected').data('id');
        var productId = "{{ $product->id ?? '' }}";
        var title = '';
        // console.log(selectedOptionDataId);

        console.log(sizeId);
        var id = $('.saveTemplate').attr('template-id')
            $.ajax({
                type: 'POST',
                url: '{{ url("saveDesign") ?? "" }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    sizeId:sizeId,
                    productId:productId,
                    title:title,
                    templateDataFront: canvasData
                },
                success: function(response) {
                    console.log(response);
                    // alert('Template saved successfully!');
                },
                error: function(error) {
                    console.error('Error saving template:', error);
                }
            });

    }
});
</script>
<script src="{{ asset('coustomizer/js/frontScript.js') }}?{{ time() }}"></script>




<script>
    
    // $('#select_size').on('change', function() {

    //     var size_value = $(this).val();

    //     var selectedOption = this.options[this.selectedIndex];
    //     var selectedprice = parseFloat(selectedOption.getAttribute('data-price'));
    //     var selectedid = parseFloat(selectedOption.getAttribute('data-id'));
    //     var totalPrice = 0;
    //     $('.product_variation').each(function() {
    //         var selectedPrice = parseInt($(this).find('option:selected').data('price'));
    //         totalPrice += selectedPrice;
    //     });
    //     $('#product_price_input').val(selectedprice);
    //     $('#product_price_main').text('$' + (parseFloat(selectedprice) + 5 + totalPrice));
    //     $('#product_price').text('$' + (selectedprice + totalPrice ));
    // });

    // $('#size_unit').on('change', function() {
    //     var unit_value = $(this).val();
    //     var productID = "{{ $product->id }}";
    //     var selectedSize = $('#select_size').val();
    //     updateSize(productID, unit_value, selectedSize);
    // });

    // function updateSize(id, value, selectedSize) {
    //             $.ajax({
    //                 url: "{{ url('/product/sizes/') }}" + "/" + id,
    //                 type: 'GET',
    //                 success: function(data) {
    //                     var sizeSelect = $('#select_size');
    //                     if (data.length > 0) {
    //                         sizeSelect.show();
    //                         sizeSelect.empty();
    //                         if (value == 'In') {
    //                             unit_value = 12;
    //                         } else if (value == 'Cm') {
    //                             unit_value = 30;
    //                         } else if (value == 'Mm') {
    //                             unit_value = 304;
    //                         } else if (value == 'Ft') {
    //                             unit_value = 1;
    //                         }
    //                         $.each(data, function(index, size) {
    //                             if (size.size_type == 'wh' || size.size_type == 'DH') {
    //                                 if (selectedSize == size.size_value) {
    //                                     size_values = size.size_value.split('X');
    //                                     sizeSelect.append('<option selected data-sizeType="' +
    //                                         size
    //                                         .size_type + '" data-price="' + size.price +
    //                                         '" value="' + size.size_value + '">' +
    //                                         +parseFloat(size_values[0]) * unit_value +
    //                                         ' X ' +
    //                                         parseFloat(size_values[1]) * unit_value +
    //                                         '</option>');
    //                                 } else {
    //                                     size_values = size.size_value.split('X');
    //                                     sizeSelect.append('<option data-sizeType="' + size
    //                                         .size_type + '" data-price="' + size.price +
    //                                         '" value="' + size.size_value + '">' +
    //                                         +parseFloat(size_values[0]) * unit_value +
    //                                         ' X ' +
    //                                         parseFloat(size_values[1]) * unit_value +
    //                                         '</option>');
    //                                 }

    //                             } else {
    //                                 if (selectedSize == size.size_value) {
    //                                     sizeSelect.append('<option selected data-sizeType="' +
    //                                         size
    //                                         .size_type + '" data-price="' + size.price +
    //                                         '" value="' + size.size_value + '">' +
    //                                         parseFloat(size.size_value) * unit_value +
    //                                         '</option>');
    //                                 } else {
    //                                     sizeSelect.append('<option data-sizeType="' + size
    //                                         .size_type + '" data-price="' + size.price +
    //                                         '" value="' + size.size_value + '">' +
    //                                         parseFloat(size.size_value) * unit_value +
    //                                         '</option>');
    //                                 }
    //                             }
    //                         });
    //                     } else {
    //                         sizeSelect.hide();
    //                     }
    //                 },
    //             });
    //         }

</script>
<script>
    $(document).ready( function (){
        // $('.applyBtn').hide();
        $('.standard_size').on('click', function (){
            $('#select_size').prop("selectedIndex", 0);
            $('.applyBtn').hide();
            $('.sizeOptions').show();
            $('.custom_size_div').hide();
            $('#select_size').trigger('change');
        })
        async function customSize(){
                $('.custom_size_div').show();
                var pricePerUnit = await priceratio();
                
                var width =parseFloat($('#custom_width').val());
                var height = parseFloat($('#custom_height').val());
                var newprice = pricePerUnit *( width + height); 
                
                var variation_total_price = 0;
                $('.product_variation').each(function() {
                    var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    variation_total_price += selectedPrice;
                });
                var totalPrice = (newprice) ;
               
                if(formatPrice(totalPrice) !== true){
                    var totalPrice = totalPrice.toFixed(1);
                }

                $('#product_price').text('$' + totalPrice);
                // $('#product_price_input').val(selectedprice);
                $('#product_price_main').text('$' + (totalPrice + 5));
            }

            function formatPrice(price) {
                if (Number.isInteger(price)) {
                    return true; 
                } else {
                    return false; 
                }
            }

            // $('#custom_width, #custom_height').on('change', customSize);
            $('.applyBtn').on('click', customSize);

            async function priceratio() {
                var main_price = parseFloat($('#product_default_price').val());
                console.warn(main_price);
                var value =  $('#size_unit').val(); 
                var unit_value;

                if (value == 'In') {
                    unit_value = 12;
                } else if (value == 'Cm') {
                    unit_value = 30;
                } else if (value == 'Mm') {
                    unit_value = 300;
                } else if (value == 'Ft') {
                    unit_value = 1;
                }
                PriceperUnit = (main_price / parseFloat(unit_value)) / 2;
                return PriceperUnit;
            }

            function UpdateCustomSize(value) {
                var last_unit = $('#custom_width').data('unit');
                var unit_value;

                if (last_unit == 'In') {
                    unit_value = 12; 
                } else if (last_unit == 'Cm') {
                    unit_value = 30; 
                } else if (last_unit == 'Mm') {
                    unit_value = 300; 
                } else if (last_unit == 'Ft') {
                    unit_value = 1; 
                }

                var width = parseFloat($('#custom_width').val());
                var height = parseFloat($('#custom_height').val());

                var width_in_inches = width / unit_value;
                var height_in_inches = height / unit_value;

                var new_unit_value;

                if (value == 'In') {
                    new_unit_value = 12; 
                } else if (value == 'Cm') {
                    new_unit_value = 30; 
                } else if (value == 'Mm') {
                    new_unit_value = 300; 
                } else if (value == 'Ft') {
                    new_unit_value = 1; 
                }

                var new_width = width_in_inches * new_unit_value;
                var new_height = height_in_inches * new_unit_value;

                $('#custom_width').val(new_width);
                $('#custom_height').val(new_height);

                $('#custom_width').data('unit', value);
                $('#custom_height').data('unit', value);
            }

            $('#select_size').on('change', function() {

                var size_value = $(this).val();
                if(size_value == 'custom'){
                    $('.sizeOptions').hide();
                    $('.applyBtn').show();
                    $('.applyBtn').click();
                    customSize();
                } else {
                    // $('#select_size').show();
                    $('.applyBtn').hide();
                    $('.sizeOptions').show();
                    $('.custom_size_div').hide();

                    var selectedOption = this.options[this.selectedIndex];
                    var selectedprice = parseFloat(selectedOption.getAttribute('data-price'));
                    var selectedid = parseFloat(selectedOption.getAttribute('data-id'));
                    var totalPrice = 0;
                    // $('.product_variation').each(function() {
                    //     var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    //     totalPrice += selectedPrice;
                    // });
                    $('#product_price_input').val(selectedprice);
                    $('#product_price_main').text('$' + (parseFloat(selectedprice) + 5 + totalPrice));
                    $('#product_price').text('$' + (selectedprice + totalPrice ));
                }
            });

            $('#product_quantity').on('change', function() {
                var value = $(this).val();
                if (value < 1 || value > 999) {
                    value = 1;
                    $('#product_quantity').val(1);
                }
                var size_value = $('#select_size').val();
                if(size_value == 'custom'){
                   customSize();
                } else {
                    var totalPrice = 0;
                    // $('.product_variation').each(function() {
                    //     var selectedPrice = parseInt($(this).find('option:selected').data('price'));
                    //     totalPrice += selectedPrice;
                    // });
                    var price = $('#product_price_input').val();
                    $('#product_price_main').text('$' + (parseFloat(price) +totalPrice + 5) * value);
                    $('#product_price').text('$' + (parseFloat(price) + totalPrice) * value);
                }
            });

            // converting size units
            $('#size_unit').on('change', function() {
                var size_value = $('#select_size').val();
                var unit_value = $(this).val();
                if(size_value == 'custom'){
                   UpdateCustomSize(unit_value);
                } else {
                    var unit_value = $(this).val();
                    var productID = "{{ $product->id }}";
                    var selectedSize = $('#select_size').val();
                    updateSize(productID, unit_value, selectedSize);
                }
                
            
            });

            function updateSize(id, value, selectedSize) {
                $.ajax({
                    url: "{{ url('/product/sizes/') }}" + "/" + id,
                    type: 'GET',
                    success: function(data) {
                        var sizeSelect = $('#select_size');
                        if (data.length > 0) {
                            sizeSelect.show();
                            sizeSelect.empty();
                            if (value == 'In') {
                                unit_value = 12;
                            } else if (value == 'Cm') {
                                unit_value = 30;
                            } else if (value == 'Mm') {
                                unit_value = 304;
                            } else if (value == 'Ft') {
                                unit_value = 1;
                            }
                            $.each(data, function(index, size) {
                                if (size.size_type == 'wh' || size.size_type == 'DH') {
                                    if (selectedSize == size.size_value) {
                                        size_values = size.size_value.split('X');
                                        sizeSelect.append('<option selected data-sizeType="' +
                                            size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            +parseFloat(size_values[0]) * unit_value +
                                            ' X ' +
                                            parseFloat(size_values[1]) * unit_value +
                                            '</option>');
                                    } else {
                                        size_values = size.size_value.split('X');
                                        sizeSelect.append('<option data-sizeType="' + size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            +parseFloat(size_values[0]) * unit_value +
                                            ' X ' +
                                            parseFloat(size_values[1]) * unit_value +
                                            '</option>');
                                    }

                                } else {
                                    if (selectedSize == size.size_value) {
                                        sizeSelect.append('<option selected data-sizeType="' +
                                            size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            parseFloat(size.size_value) * unit_value +
                                            '</option>');
                                    } else {
                                        sizeSelect.append('<option data-sizeType="' + size
                                            .size_type + '" data-price="' + size.price +
                                            '" value="' + size.size_value + '">' +
                                            parseFloat(size.size_value) * unit_value +
                                            '</option>');
                                    }
                                }
                            });
                            sizeSelect.append('<option data-sizeType="custom" data-price="0" value="custom">Custom</option>');
                        } else {
                            sizeSelect.hide();
                        }
                        if (document.getElementById('custom_size_div').style.display == 'none') {
                            // selectedSize();
                            $('#select_size').trigger("change");
                            console.log('selected side');
                        } else {
                            // customSizeChange();
                            console.log('applyBtn side');

                            $('.applyBtn').click();
                        }
                        // $('#select_size').trigger("change");
                    },
                });
            }

        
        });
</script>

@endsection