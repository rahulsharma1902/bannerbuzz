@extends('user_dashboard_layout.master')
@section('content')
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
            <div class="profl_tabs addres_tabs">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active position-relative" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Orders
                        </button>
                    </li>
                </ul>
                <div class="tab-contentp-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        @if(!isset($orders) || $orders->isEmpty())
                            <div class="profile_edit">
                                <p class="sml_text">You have placed no orders.</p>
                            </div>
                        @else 
                            <div class="card-inner">
                                <table class="table">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col">Order Number</th>
                                            <th class="nk-tb-col"><span class="sub-text">Order Date</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Amount</span></th> 
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Order Status</span></th>
                                            <th class="tb-tnx-action">
                                                <span>Action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">#{{ $order->order_number ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $order->created_at->format('d-m-Y') ?? 'null' }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"> £{{ $order->total_price ?? '00' }}</span>
                                                </td>

                                                <td class="nk-tb-col tb-col-md">
                                                    @if(strtolower($order->order_status) != 'succeeded' && strtolower($order->order_status) != 'completed')
                                                        <span class="adge badge-dot bg-danger">{{ $order->order_status ?? '' }}</span>
                                                    @else
                                                        <span class="badge badge-dot bg-success">Completed</span>
                                                    @endif
                                                </td>

                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <a href="{{ route('user.order.detail',['order_num'=> $order->order_number]) }}">View Order</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection