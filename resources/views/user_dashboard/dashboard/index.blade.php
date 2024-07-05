@extends('user_dashboard_layout.master')
@section('usercontent')
    <div class="col-lg-9">
        <div class="ryt_side_contnt">
            <div class="user_main_info">
                <div class="user_info">
                    <div class="user_img">
                        <span><i class="fa-solid fa-user"></i></span>
                    </div>
                    <div class="user_dtal">
                        <h1>Hey there, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
                        <p class="subItile"><a href="#">{{ auth()->user()->email }}</a> | <a href="{{ route('logout') }}" class="lg_out">Log out</a></p>
                    </div>
                </div>
                <div class="edit_detail">
                    <span>Edit</span>
                    <span><i class="fa-solid fa-pencil"></i></span>
                </div>
            </div>
            <div class="complt_orderbox">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('user.orders') }}" class="ordr_shop">
                            <div class="lft_txt">
                                <div class="shop_img">
                                    <img src="{{asset('Site_Images/odr_cmplt.png')}}" class="img-fluid" />
                                </div>
                                <h6>{{ $order_count }} Orders Completed</h6>
                            </div>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="ordr_shop">
                            <div class="lft_txt">
                                <div class="shop_img">
                                    <img src="{{ asset('Site_Images/quot_rq.png') }}" class="img-fluid" />
                                </div>
                                <h6>0 Quotes Requested</h6>
                            </div>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div class="recent_order_box">
                <div class="your_order_choice">
                    <h6>Your Latest Choice</h6>
                </div>
                <p>No order placed</p>
            </div> -->
            <!-- <div class="recent_order_box">
                <div class="your_order_choice">
                    <h6>Addresses</h6>
                </div>
            </div> -->
        </div>
    </div>
 
@endsection