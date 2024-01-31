@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Product Accessories</h4>
        </div>
        <div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col">Sno.</th>
                        <th class="nk-tb-col"><span class="sub-text"> Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Slug</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Accessories type</span></th>
                        <th class="tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accessories_type as $type )
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $loop->iteration ?? '' }}</span>

                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $type->name ?? '' }}</span>

                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ $type->slug ?? '' }}</span>
                        </td>

                        <td class="nk-tb-col tb-col-md">
                            <span class="tb-amount">{{ $type->type->name ?? '' }}</span>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a
                                                        href="{{ url('admin-dashboard/add-accessories') ?? '' }}/{{ $type->slug ?? ''}}"><em
                                                            class="icon ni ni-eye"></em><span>Edit</span></a></li>
                                                <li><a class="delete"
                                                    href="{{ url('admin-dashboard/remove-product-accessories') ?? '' }}/{{ $type->id ?? ''}}"><em
                                                            class="icon ni ni-focus"></em><span>Remove</span></a></li>
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
@endsection