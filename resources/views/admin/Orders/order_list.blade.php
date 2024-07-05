@extends('admin_layout.master')
@section('content')

<?php $order_state = array("Order Placed"=>"placed", "Packed"=>"packed", "Shipping"=>"shipping", "Out For Delivery"=>"out","Delivered"=>"delivered","Pending"=>"pending"); ?>
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Orders</h4>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col">Order Number</th>
                            <th class="nk-tb-col"><span class="sub-text">Order Date</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Amount</span></th> 
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Order Status</span></th>
                            <th class="nk-tb-col">Order State</th> 
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
                                    @if($order->order_status != 'succeeded' && $order->order_status != 'completed' && $order->order_status != 'COMPLETED')
                                        <span class="badge rounded-pill bg-danger">{{ $order->order_status }}</span>
                                  
                                    @else
                                        <span class="badge rounded-pill bg-success">completed</span>
                                    @endif
                               
                                </td>
                                <td class="nk-tb-col tb-col-mb">
                                    <!-- <label class="form-label">Change</label> -->
                                    <div class="form-control-wrap">
                                        <select class="form-select change_state" id="select_state" data-id="{{ $order->id ?? '' }}">
                                            @if(isset($order_state))
                                                @foreach($order_state as $key=>$value)
                                                    @if($order->order_state === $value)
                                                    <option value="{{ $order->order_state }}" selected>{{ $key }}</option>
                                                    @else
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="{{ url('admin-dashboard/order') ?? '' }}/{{ $order->order_number ?? '' }}">
                                                                <em class="icon ni ni-eye"></em><span>view</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $(".change_state").change(function(){
                var data={
                    order_id: $(this).attr('data-id'),
                    order_state: $(this).val(),
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    url: "{{ url('admin-dashboard/order/state') }}",
                    type: "post",
                    data: data,
                    dataType: "json",
                    success: function(response){
                        if(response.success === true){
                            NioApp.Toast('Order state is changed', 'info', { position: 'top-right'});
                        }
                    }
                });
            });
        });
    </script>

@endsection