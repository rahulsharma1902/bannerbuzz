@extends('admin_layout.master')
@section('content')

<?php $orderStates = ["Order Placed" => "placed", "Packed" => "packed", "Shipping" => "shipping", "Out For Delivery" => "out", "Delivered" => "delivered", "Pending" => "pending"]; ?>

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
                        <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Order Placed From</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Mail Status</span></th>
                        <th class="tb-tnx-action"><span>Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactUs as $contact)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-info">
                                        <span class="tb-lead">#{{ $contact->orderNumber ?? '' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $contact->email ?? 'null' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $contact->phone ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ ucfirst($contact->orderplace) ?? '' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                @if ($contact->image)
                                    <img src="{{ asset('ContactReport/' . $contact->image) }}" alt="Image" class="img-thumbnail" width="100" height="100" data-bs-toggle="modal" data-bs-target="#imageModal{{ $contact->id }}">
                                @else
                                <span class="badge rounded-pill bg-danger">No Image</span>
                                @endif
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <div class="form-control-wrap">
                                    @if($contact->status == 1)
                                        <span class="badge rounded-pill bg-warning">Reply Pending</span>
                                    @else
                                        <span class="badge rounded-pill bg-success">Reply Done</span>
                                    @endif
                                </div>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="mailto:{{ $contact->email ?? 'null' }}">
                                                            <em class="icon ni ni-reply"></em><span>Reply</span>
                                                        </a>
                                                    </li>
                                                    @if($contact->status == 1)
                                                    <li>
                                                        <a href="{{ url('admin-dashboard/contact-us/markDone') }}/{{ $contact->id ?? '' }}">
                                                            <em class="icon ni ni-check-circle"></em><span>Mark as Done</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        
                        <!-- Modal for Image -->
                        <div class="modal fade" id="imageModal{{ $contact->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $contact->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel{{ $contact->id }}">Inquery Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('ContactReport/' . $contact->image) }}" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
