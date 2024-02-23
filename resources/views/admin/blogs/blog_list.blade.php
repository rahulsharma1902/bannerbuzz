@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Blogs</h4>
        </div>
        <div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Sno.</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Blog Name</span></th>
                        {{-- <th class="nk-tb-col"><span class="sub-text">Slug</span></th> --}}
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Category</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($blogs as $blog )
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $count ?? '' }}</span>

                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $blog->title ?? '' }}</span>

                                </div>
                            </div>
                        </td>
                        {{-- <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ $blog->slug ?? '' }}</span>
                        </td> --}}

                        <td class="nk-tb-col tb-col-md">
                            <span class="tb-amount">{{ $blog->category->name ?? '' }}</span>
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
                                                        href="{{ url('admin-dashboard/add-blog') ?? '' }}/{{ $blog->slug ?? ''}}"><em
                                                            class="icon ni ni-eye"></em><span>Edit</span></a></li>
                                                <li><a class="delete"
                                                    href="{{ url('admin-dashboard/remove-blog') ?? '' }}/{{ $blog->id ?? ''}}"><em
                                                            class="icon ni ni-focus"></em><span>Remove</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection