@extends('front_layout/index')
@section('content')
<section class="design-edit">
            <div class="row">
                <div class="col-lg-9">
                    <div class="design-tabs">
                        <div class="nw-rw1 d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <img src="{{ asset('coustomizer/img/template.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Template</p>
                                </button>

                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/text.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Text</p>
                                </button>

                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/background.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Background</p>
                                </button>

                                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/shapes.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Shapes</p>
                                </button>

                                <button class="nav-link" id="v-pills-clip-tab" data-bs-toggle="pill" data-bs-target="#v-pills-clip" type="button" role="tab" aria-controls="v-pills-clip" aria-selected="true">
                                    <img src="{{ asset('coustomizer/img/clip-part.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Clipart</p>
                                </button>

                                <button class="nav-link" id="v-pills-upld-tab" data-bs-toggle="pill" data-bs-target="#v-pills-upld" type="button" role="tab" aria-controls="v-pills-upld" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/upld-f.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Uploads</p>
                                </button>

                                <button class="nav-link" id="v-pills-desgn-tab" data-bs-toggle="pill" data-bs-target="#v-pills-desgn" type="button" role="tab" aria-controls="v-pills-desgn" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/design.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Design Comments</p>
                                </button>

                                <button class="nav-link" id="v-pills-quick-tab" data-bs-toggle="pill" data-bs-target="#v-pills-quick" type="button" role="tab" aria-controls="v-pills-quick" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/quick-hlp.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Quick Help</p>
                                </button>

                                <button class="nav-link" id="v-pills-lyr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lyr" type="button" role="tab" aria-controls="v-pills-lyr" aria-selected="false">
                                    <img src="{{ asset('coustomizer/img/layers.png') ?? '' }}" class="img-fluid" alt=".." />
                                    <p>Layers</p>
                                </button>

                                <button class="nav-link" id="v-pills-myd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-myd" type="button" role="tab" aria-controls="v-pills-myd" aria-selected="false">
                                    <a class="btn" data-bs-toggle="modal" href="#modal" role="button">
                                        <img src="{{ asset('coustomizer/img/myd.png') ?? '' }}" class="img-fluid" alt=".." />
                                        <p>My Design</p>
                                    </a>
                                </button>
                            </div>

                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="temp_content">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close" id="">×</button>

                                        <div class="selct-rw d-flex">
                                            <div class="select_box">
                                                <select name="select" id="select-option" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="Option_one">Option one</option>
                                                    <option value="Option_two">Option two</option>
                                                </select>
                                            </div>

                                            <div class="select_box">
                                                <select name="select" id="select-option" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="Option_one">Option one</option>
                                                    <option value="Option_two">Option two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group-box SearchBoxSec">
                                            <div class="form-group f-gr1">
                                                <input type="text" name="" value="" class="form-control" placeholder="Search templates" id="template_search_box" aria-label="Search Template" />
                                                <button title="Clear" class="template-cross-icon" style="display: none;">×</button>
                                            </div>
                                        </div>
                                        <div class="templ_imgs">
                                            <ul class="list-unstyled m-0">
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img2.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img3.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img4.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img5.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img6.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img7.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img8.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img9.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img10.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li><img src="{{ asset('coustomizer/img/t-img11.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img12.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="temp_content">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                        <div class="text_box_field">
                                            <div class="form-group">
                                                <input type="button" class="btn-action btn-block addnewtext" name="" value="Add New Text" aria-label="Add new text" style="opacity: 1; pointer-events: inherit;" />
                                            </div>
                                            <div class="text_box-wrap">
                                                <div class="form-group">
                                                    <textarea class="form-control textbox" name="" placeholder="Enter Text Here" data-objid="98322216">Valentine's Day</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control textbox" name="" placeholder="Enter Text Here">Sale</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control textbox" name="" placeholder="Enter Text Here">special Offer</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control textbox" name="" placeholder="Enter Text Here">Lorem Ipsum has been the industry's standard dummy text ever since.</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control textbox" name="" placeholder="Enter Text Here">UP TO 50% OFF</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <div class="temp_content bg_edit">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                        <div class="form-group-box SearchBoxSec">
                                            <div class="form-group f-gr1">
                                                <input type="text" name="" value="" class="form-control" placeholder="Search by Name" id="template_search_box" aria-label="Search Template" />
                                                <button title="Clear" class="template-cross-icon" style="display: none;">×</button>
                                            </div>
                                        </div>
                                        <div class="selct-rw d-flex">
                                            <div class="select_box new_slct">
                                                <select class="select cat_list" data-type="background" id="background_cat">
                                                    <option data-name="General" value="5" class="background_cat_option">General</option>
                                                    <option data-name="Christmas" value="6" class="background_cat_option">Christmas</option>
                                                    <option data-name="Church" value="7" class="background_cat_option">Church</option>
                                                    <option data-name="Burst" value="8" class="background_cat_option">Burst</option>
                                                    <option data-name="Abstract" value="9" class="background_cat_option">Abstract</option>
                                                    <option data-name="Birthday" value="10" class="background_cat_option">Birthday</option>
                                                    <option data-name="Digital" value="11" class="background_cat_option">Digital</option>
                                                    <option data-name="Floral" value="12" class="background_cat_option">Floral</option>
                                                    <option data-name="Flowers" value="13" class="background_cat_option">Flowers</option>
                                                    <option data-name="Love &amp; Heart" value="14" class="background_cat_option">Love &amp; Heart</option>
                                                    <option data-name="Music &amp; Dance" value="15" class="background_cat_option">Music &amp; Dance</option>
                                                    <option data-name="Natural" value="16" class="background_cat_option">Natural</option>
                                                    <option data-name="Real Estate" value="17" class="background_cat_option">Real Estate</option>
                                                    <option data-name="Holidays" value="18" class="background_cat_option">Holidays</option>
                                                    <option data-name="Human" value="19" class="background_cat_option">Human</option>
                                                    <option data-name="Nature" value="20" class="background_cat_option">Nature</option>
                                                    <option data-name="Patterns" value="21" class="background_cat_option">Patterns</option>
                                                    <option data-name="Religion" value="22" class="background_cat_option">Religion</option>
                                                    <option data-name="Shopping" value="23" class="background_cat_option">Shopping</option>
                                                    <option data-name="Skulls-Bones" value="24" class="background_cat_option">Skulls-Bones</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="templ_imgs">
                                            <div class="not_txt">
                                                <p>Note: Please click on image to set as background</p>
                                            </div>
                                            <ul class="list-unstyled m-0">
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img2.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img3.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img4.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img5.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img6.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img7.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img8.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img9.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img10.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li><img src="{{ asset('coustomizer/img/t-img11.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img12.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <div class="temp_content bg_edit">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                        <div class="form-group-box SearchBoxSec">
                                            <div class="form-group f-gr1">
                                                <input type="text" name="" value="" class="form-control" placeholder="Search by Name" id="template_search_box" aria-label="Search Template" />
                                                <button title="Clear" class="template-cross-icon" style="display: none;">×</button>
                                            </div>
                                        </div>

                                        <div class="selct-rw d-flex">
                                            <div class="select_box new_slct">
                                                <select class="select cat_list" data-type="background" id="background_cat">
                                                    <option value="">All</option>
                                                    <option value="Option_one">Option one</option>
                                                    <option value="Option_two">Option two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="templ_imgs">
                                            <div class="not_txt">
                                                <p>Note: Please click on image to place shape on canvas</p>
                                            </div>

                                            <ul class="list-unstyled m-0">
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-clip" role="tabpanel" aria-labelledby="v-pills-clip-tab">
                                    <div class="temp_content bg_edit">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                        <div class="form-group-box SearchBoxSec">
                                            <div class="form-group f-gr1">
                                                <input type="text" name="" value="" class="form-control" placeholder="Search templates" id="template_search_box" aria-label="Search Template" />
                                                <button title="Clear" class="template-cross-icon" style="display: none;">×</button>
                                            </div>
                                        </div>

                                        <div class="selct-rw d-flex">
                                            <div class="select_box new_slct">
                                                <select class="select cat_list" data-type="clipart" name="clipart_cat" id="clipart_cat">
                                                    <option data-name="Education" value="27" class="clipart_cat_option">Education</option>
                                                    <option data-name="Animal" value="28" class="clipart_cat_option">Animal</option>
                                                    <option data-name="Bird" value="29" class="clipart_cat_option">Bird</option>
                                                    <option data-name="Cat" value="30" class="clipart_cat_option">Cat</option>
                                                    <option data-name="Dinosaurs" value="31" class="clipart_cat_option">Dinosaurs</option>
                                                    <option data-name="Dogs" value="32" class="clipart_cat_option">Dogs</option>
                                                    <option data-name="Fishes" value="33" class="clipart_cat_option">Fishes</option>
                                                    <option data-name="Horses" value="34" class="clipart_cat_option">Horses</option>
                                                    <option data-name="Arrow" value="35" class="clipart_cat_option">Arrow</option>
                                                    <option data-name="Business" value="36" class="clipart_cat_option">Business</option>
                                                    <option data-name="Christmas" value="37" class="clipart_cat_option">Christmas</option>
                                                    <option data-name="Drink" value="38" class="clipart_cat_option">Drink</option>
                                                    <option data-name="Electronics" value="39" class="clipart_cat_option">Electronics</option>
                                                    <option data-name="Fastfood" value="40" class="clipart_cat_option">Fastfood</option>
                                                    <option data-name="Flag" value="41" class="clipart_cat_option">Flag</option>
                                                    <option data-name="Flowers" value="42" class="clipart_cat_option">Flowers</option>
                                                    <option data-name="Fruits" value="43" class="clipart_cat_option">Fruits</option>
                                                    <option data-name="Gambling" value="44" class="clipart_cat_option">Gambling</option>
                                                    <option data-name="Houses" value="45" class="clipart_cat_option">Houses</option>
                                                    <option data-name="Independence Day" value="46" class="clipart_cat_option">Independence Day</option>
                                                    <option data-name="Kids" value="47" class="clipart_cat_option">Kids</option>
                                                    <option data-name="Map" value="48" class="clipart_cat_option">Map</option>
                                                    <option data-name="Medical" value="49" class="clipart_cat_option">Medical</option>
                                                    <option data-name="Money" value="50" class="clipart_cat_option">Money</option>
                                                    <option data-name="Music" value="51" class="clipart_cat_option">Music</option>
                                                    <option data-name="Occasion" value="52" class="clipart_cat_option">Occasion</option>
                                                    <option data-name="Wedding" value="53" class="clipart_cat_option">Wedding</option>
                                                    <option data-name="Birthday" value="54" class="clipart_cat_option">Birthday</option>
                                                    <option data-name="Anniversary" value="55" class="clipart_cat_option">Anniversary</option>
                                                    <option data-name="People" value="56" class="clipart_cat_option">People</option>
                                                    <option data-name="RealEstate" value="57" class="clipart_cat_option">RealEstate</option>
                                                    <option data-name="Sale" value="58" class="clipart_cat_option">Sale</option>
                                                    <option data-name="Signs" value="59" class="clipart_cat_option">Signs</option>
                                                    <option data-name="Sports" value="60" class="clipart_cat_option">Sports</option>
                                                    <option data-name="Springs" value="61" class="clipart_cat_option">Springs</option>
                                                    <option data-name="Symbols" value="62" class="clipart_cat_option">Symbols</option>
                                                    <option data-name="Tatoo" value="63" class="clipart_cat_option">Tatoo</option>
                                                    <option data-name="Tools" value="64" class="clipart_cat_option">Tools</option>
                                                    <option data-name="Toys" value="65" class="clipart_cat_option">Toys</option>
                                                    <option data-name="Transportation" value="66" class="clipart_cat_option">Transportation</option>
                                                    <option data-name="Trees" value="67" class="clipart_cat_option">Trees</option>
                                                    <option data-name="USA" value="68" class="clipart_cat_option">USA</option>
                                                    <option data-name="Valentine" value="69" class="clipart_cat_option">Valentine</option>
                                                    <option data-name="Vegetables" value="70" class="clipart_cat_option">Vegetables</option>
                                                    <option data-name="Wallpapers" value="71" class="clipart_cat_option">Wallpapers</option>
                                                    <option data-name="General" value="72" class="clipart_cat_option">General</option>
                                                    <option data-name="Halloween" value="73" class="clipart_cat_option">Halloween</option>
                                                    <option data-name="3D Text" value="74" class="clipart_cat_option">3D Text</option>
                                                    <option data-name="Easter" value="75" class="clipart_cat_option">Easter</option>
                                                    <option data-name="St. Patrick Day" value="78" class="clipart_cat_option">St. Patrick Day</option>
                                                    <option data-name="Mardi Gras" value="79" class="clipart_cat_option">Mardi Gras</option>
                                                    <option data-name="Hanukkah" value="80" class="clipart_cat_option">Hanukkah</option>
                                                    <option data-name="Covid-19" value="81" class="clipart_cat_option">Covid-19</option>
                                                    <option data-name="Ice Cream" value="82" class="clipart_cat_option">Ice Cream</option>
                                                    <option data-name="T-Shirt" value="83" class="clipart_cat_option">T-Shirt</option>
                                                    <option data-name="Social Media" value="84" class="clipart_cat_option">Social Media</option>
                                                    <option data-name="Sticker" value="85" class="clipart_cat_option">Sticker</option>
                                                    <option data-name="Thanks Giving" value="86" class="clipart_cat_option">Thanks Giving</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="templ_imgs">
                                            <div class="not_txt">
                                                <p>Note: Please click on image to set as background</p>
                                            </div>
                                            <ul class="list-unstyled m-0">
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li>
                                                    <img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" />
                                                </li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
                                                <li><img src="{{ asset('coustomizer/img/t-img1.png') ?? '' }}" class="img-fluid" alt="" /></li>
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
                                                    <button title="" class="btnuploadimginfo" aria-label="Upload your image"><i class="fa fa-info-circle"></i></button>
                                                </label>
                                                <input type="button" class="btn-action btn-block addnewtext" name="" value="UPLOAD YOUR OWN IMAGE" aria-label="UPLOAD YOUR OWN IMAGE" style="opacity: 1; pointer-events: inherit;" />
                                            </div>
                                        </div>
                                        <div class="templ_imgs">
                                            <div class="not_txt">
                                                <p>Note: Please click on image to place on canvas</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-desgn" role="tabpanel" aria-labelledby="v-pills-desgn-tab">
                                    <div class="temp_content bg_edit design-cmnt">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>

                                        <div class="text_box_field">
                                            <div class="comment-box-main">
                                                <div class="form-group-box text_box-wrap">
                                                    <div class="form-group">
                                                        <label>Free Design Support</label>
                                                        <textarea
                                                            class="form-control comment"
                                                            id="comment"
                                                            row="7"
                                                            cols="10"
                                                            placeholder="Please put any design related comments here. Our designers will incorporate the comments and will email the proof before printing"
                                                        ></textarea>
                                                        <div class="button-group">
                                                            <button type="submit" title="Continue Design" class="btn cta" aria-label="Continue Design">Continue Design</button>
                                                            <button type="submit" title="Finish" class="btn cta btn-pnk" data-type="finishWithoutCheck" aria-label="Finish">Finish</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-quick" role="tabpanel" aria-labelledby="v-pills-quick-tab">
                                    <div class="tourStep intro-main-box right" id="ImageHosting" style="display: none;">
                                        <div class="intro-box">
                                            <div class="arrow"></div>
                                            <button title="Close" class="tourClose introclose">×</button>
                                            <h6>Template</h6>
                                            <p>Choose from our state of the art Ready-to-use relevant templates which are relevant to product you have chosen to design.</p>
                                            <div class="intro-footer">
                                                <button title="Next" class="introbtn pull-right tourNext">Next</button>
                                                <span class="intro-count-box">1 of 7</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-lyr" role="tabpanel" aria-labelledby="v-pills-lyr-tab">
                                    <div class="temp_content bg_edit design-cmnt">
                                        <button title="Close" class="btncloseleftpanel" aria-label="Close">×</button>
                                        <div class="mange">
                                            <ul id="sortable" class="ui-sortable">
                                                <li class="layer">
                                                    <button class="" title="View">
                                                        <i id="icon" class="far fa-eye"></i>
                                                    </button>
                                                    <span class="layer-icon-box"> T</span>
                                                    <span class="layer-text-box">UP TO 50% OFF</span>
                                                    <span class="unlock-layer"> <i class="fa-sharp fa-solid fa-unlock"></i></span>
                                                    <span class="layer-dragg-box"> </span>
                                                </li>
                                                <li class="layer">
                                                    <button class="" title="View">
                                                        <i id="icon" class="far fa-eye"></i>
                                                    </button>
                                                    <span class="layer-icon-box"> T</span>
                                                    <span class="layer-text-box">Lorem Ipsum has been the industry's standard dummy text ever since.</span>
                                                    <span class="unlock-layer"> <i class="fa-sharp fa-solid fa-unlock"></i></span>
                                                    <span class="layer-dragg-box"> </span>
                                                </li>
                                                <li class="layer">
                                                    <button class="" title="View">
                                                        <i id="icon" class="far fa-eye"></i>
                                                    </button>
                                                    <span class="layer-icon-box"> T</span>
                                                    <span class="layer-text-box">SPECIAL OFFER</span>
                                                    <span class="unlock-layer"> <i class="fa-sharp fa-solid fa-unlock"></i></span>
                                                    <span class="layer-dragg-box"> </span>
                                                </li>
                                                <li class="layer">
                                                    <button class="" title="View">
                                                        <i id="icon" class="far fa-eye"></i>
                                                    </button>
                                                    <span class="layer-icon-box"> T</span>
                                                    <span class="layer-text-box">SALE</span>
                                                    <span class="unlock-layer"> <i class="fa-sharp fa-solid fa-unlock"></i></span>
                                                    <span class="layer-dragg-box"> </span>
                                                </li>
                                                <li class="layer">
                                                    <button class="" title="View">
                                                        <i id="icon" class="far fa-eye"></i>
                                                    </button>
                                                    <span class="layer-icon-box"> T</span>
                                                    <span class="layer-text-box">Valentine's Day</span>
                                                    <span class="unlock-layer"> <i class="fa-sharp fa-solid fa-unlock"></i></span>
                                                    <span class="layer-dragg-box"> </span>
                                                </li>
                                                <li class="layer">
                                                    <button class="" title="View">
                                                        <i id="icon" class="far fa-eye"></i>
                                                    </button>
                                                    <span class="layer-icon-box"> T</span>
                                                    <span class="layer-text-box">Image Layer</span>
                                                    <span class="unlock-layer"> <i class="fa-sharp fa-solid fa-unlock"></i></span>
                                                    <span class="layer-dragg-box"> </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-myd" role="tabpanel" aria-labelledby="v-pills-myd-tab">
                                    <div class="modal fade" id="modal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="loginPopupBox">
                                                    <button title="Close" class="btncloseleftpanel" aria-label="Close" id="">×</button>
                                                    <div class="loginBox d-flex">
                                                        <div class="loginLeftBox">
                                                            <div class="imageBox">
                                                                <img src="{{ asset('coustomizer/img/my_des.svg') ?? '' }}" alt="" />
                                                            </div>
                                                        </div>

                                                        <div class="loginRightBox">
                                                            <div class="blockTitle">
                                                                <h3>LOGIN</h3>
                                                            </div>
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" name="email" value="" placeholder="Email Address*" />
                                                                    <span></span>
                                                                    <span class="el-icon"><i class="fa-sharp fa-light fa-envelope"></i></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input id="password-field" type="password" class="form-control" name="password" value="secret" placeholder="Password*" />
                                                                    <span class="el-icon"><i class="fa-light fa-lock"></i></span>
                                                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                                </div>
                                                            </div>
                                                            <div class="otpbutton">
                                                                <button class="linkButton forgotLink">Forgot Password?</button>
                                                                <a class="linkButton forgotLink otpLink">
                                                                    <span>Login With Email OTP</span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <div>
                                                                    <div
                                                                        class="grecaptcha-badge"
                                                                        data-style="inline"
                                                                        style="
                                                                            width: 256px;
                                                                            height: 60px;
                                                                            position: fixed;
                                                                            visibility: hidden;
                                                                            display: block;
                                                                            transition: right 0.3s ease 0s;
                                                                            bottom: 14px;
                                                                            right: -186px;
                                                                            box-shadow: gray 0px 0px 5px;
                                                                            border-radius: 2px;
                                                                            overflow: hidden;
                                                                        "
                                                                    >
                                                                        <div class="grecaptcha-logo">
                                                                            <iframe
                                                                                title="reCAPTCHA"
                                                                                width="256"
                                                                                height="60"
                                                                                role="presentation"
                                                                                name="a-msr41ut4crl5"
                                                                                frameborder="0"
                                                                                scrolling="no"
                                                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                                                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeCuh8fAAAAAL9SfJQ-HOjf8erf-stG1zUmqkQt&amp;co=aHR0cHM6Ly93d3cuYmFubmVyYnV6ei5jby51azo0NDM.&amp;hl=en&amp;v=MHBiAvbtvk5Wb2eTZHoP1dUd&amp;size=invisible&amp;badge=inline&amp;cb=awc1j6fix3c6"
                                                                            ></iframe>
                                                                        </div>
                                                                        <div class="grecaptcha-error"></div>
                                                                        <textarea
                                                                            id="g-recaptcha-response"
                                                                            name="g-recaptcha-response"
                                                                            class="g-recaptcha-response"
                                                                            style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"
                                                                        ></textarea>
                                                                    </div>
                                                                    <iframe style="display: none;"></iframe>
                                                                </div>
                                                            </div>
                                                            <div class="buttonSet"><button type="button" class="btn cta">Log In</button></div>
                                                            <div class="socialLogin">
                                                                <div class="socialTitleBox">
                                                                    <span class="socialTitle"> <span>(OR) </span>Sign Up With Social</span>
                                                                </div>
                                                                <div class="socialContent">
                                                                    <ul class="signinLinks">
                                                                        <li>
                                                                            <button class="linkButton googlePlus"><img src="{{ asset('coustomizer/img/google.svg') ?? '' }}" /></button>
                                                                        </li>
                                                                        <li>
                                                                            <a class="linkButton facebook"><img src="{{ asset('coustomizer/img/facebook.svg') ?? '' }}" alt="Facebook" /></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="linkButton amazone"><img src="{{ asset('coustomizer/img/amazone.svg') ?? '' }}" alt="Amazon" /></a>
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
                                    </div>
                                </div>
                            </div>
                            <div class="canva-img">
                                <div class="color_pickers colr_menu">
                                    <div class="background-panel-desktop">
                                        <div class="form-group-box background_control object_control" style="">
                                            <div class="color-palette-box">
                                                <ul id="background_color_box">
                                                    <li class="whitecolorborder">
                                                        <span data-colorcode="ffffff" style="background-color: rgb(255, 255, 255);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="d3d3d3" style="background-color: rgb(211, 211, 211);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="cf0209" style="background-color: rgb(207, 2, 9);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="efe722" style="background-color: rgb(239, 231, 34);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="76ab03" style="background-color: rgb(118, 171, 3);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="1d99cf" style="background-color: rgb(29, 153, 207);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="000000" style="background-color: rgb(0, 0, 0);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="1dab49" style="background-color: rgb(29, 171, 73);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="6f6f6f" style="background-color: rgb(111, 111, 111);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="993229" style="background-color: rgb(153, 50, 41);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="f67e1d" style="background-color: rgb(246, 126, 29);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="008e4b" style="background-color: rgb(0, 142, 75);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="0059b3" style="background-color: rgb(0, 89, 179);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="e6ba33" style="background-color: rgb(230, 186, 51);"> </span>
                                                    </li>
                                                    <li>
                                                        <span data-colorcode="cb89bb" style="background-color: rgb(203, 137, 187);"> </span>
                                                    </li>
                                                    <li>
                                                        <div class="asColorPicker-wrap">
                                                            <button title="Add Color" class="btnaddcolor asColorPicker_hideInput asColorPicker-input" id="background_color_picker">
                                                                <span class="count-plus">
                                                                    <i class="fa-sharp fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ asset('coustomizer/img/canva.png') ?? '' }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="design-ryt-vw">
                        <div class="ryt-logo-img">
                            <div class="cusm-lgo">
                                <img src="{{ asset('coustomizer/img/custom-vinyl.png') ?? '' }}" class="img-fluid" alt=".." />
                            </div>
                            <h6>Custom Vinyl Banners</h6>
                        </div>
                        <div class="footer-size-main">
                            <a href="#standard-size">Standard Size</a>
                        </div>
                        <div id="table_custom_size" class="custom-size" style="overflow: inherit;">
                            <ul class="custom_size">
                                <li class="option">
                                    <div class="custome-size-title">W</div>
                                    <div class="customsize-wrapper sizeMeasurement">
                                        <input value="3" id="size_w" name="size_w" type="number" step=".01" />
                                    </div>
                                </li>
                                <li class="option">
                                    <div class="custome-size-title">H</div>
                                    <div class="customsize-wrapper sizeMeasurement">
                                        <input value="2" id="size_h" name="size_h" type="number" step=".01" />
                                    </div>
                                </li>
                                <li class="option">
                                    <div class="select_box">
                                        <select name="select" class="form-control">
                                            <option value="">FT</option>
                                            <option value="Option_one">FT</option>
                                            <option value="Option_two">MM</option>
                                            <option value="Option_three">CM</option>
                                            <option value="Option_four">MT</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ftr-size-price">
                            <div class="ftr-size-lft">
                                <p>$8.39 <span>Incl.</span> VAT</p>
                            </div>
                            <div class="ftr-lnks">
                                <a hef="#" class="btn cta">Apply</a>
                            </div>
                        </div>
                        <div class="ryt-view-box">
                            <div class="editing-lnks">
                                <ul class="list-unstyled m-0">
                                    <li>
                                        <span><img src="{{ asset('coustomizer/img/prevw.png') ?? '' }}" class="img-fluid" alt=".." /></span>
                                    </li>
                                    <li>
                                        <span><img src="{{ asset('coustomizer/img/share.png') ?? '' }}" class="img-fluid" alt=".." /></span>
                                    </li>
                                    <li>
                                        <span><img src="{{ asset('coustomizer/img/itlic.png') ?? '' }}" class="img-fluid" alt=".." /></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="togls_buttn">
                                <ul class="list-unstyled m-0">
                                    <li>
                                        <span><img src="{{ asset('coustomizer/img/chat.png') ?? '' }}" class="img-fluid" alt=".." /></span>
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
                </div>
            </div>
        </section>
@endsection