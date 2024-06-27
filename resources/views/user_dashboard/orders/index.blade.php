@extends('user_dashboard_layout.master')
@section('content')
    <div class="col-lg-8">
        <div class="ryt_side_contnt">
            <div class="user_main_info">
                <div class="user_info">
                    <div class="user_img">
                        <span><i class="fa-solid fa-user"></i></span>
                    </div>
                    <div class="user_dtal">
                        <h1>Hey there, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
                        <p class="subItile"><a href="#">{{ auth()->user()->email }}</a> | <a href="#" class="lg_out">Log out</a></p>
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
                            <div class="profile_edit">
                                <table class="order-container-table">
                                    <thead class="table-head">
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Price</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-table-body">
                                        @foreach($orders as $order)
                                            <tr class="table-row-container">
                                                <td>{{ $order->order_number ?? '' }}</td>
                                                <td>{{ auth()->user()->first_name ?? '' }} {{ auth()->user()->last_name ?? '' }}</td>
                                                <td>{{ $order->confirmation_email ?? '' }}</td>
                                                <td>£{{ $order->total_price }}</td>
                                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                <td><a href="{{ url('user-dashboard/order-detail/'.$order->order_number) }}">view Order</a></td>
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