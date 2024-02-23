@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Product Category</h4>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <h4>Parent Categories</h4>
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col">Sno.</th>
                            <th class="nk-tb-col"><span class="sub-text"> Name</span></th>
                            {{-- <th class="nk-tb-col"><span class="sub-text">Slug</span></th> --}}
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Display on front</span></th>
                            <th class="tb-tnx-action">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parent_categories as $category)
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
                                            <span class="tb-lead">{{ $category->name ?? '' }}</span>

                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="nk-tb-col tb-col-mb">
                                    <span class="tb-amount">{{ $category->slug ?? '' }}</span>
                                </td> --}}

                                <td class="nk-tb-col tb-col-md p-3">
                                    @if($category->display_on === 1)
                                    <input type="checkbox" onchange="ChangeStatus({{ $category->id }})" class="display_onFront" name="display" checked>
                                    @else
                                    <input type="checkbox" onchange="ChangeStatus({{ $category->id }})" class="display_onFront" name="display"  >
                                    @endif
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
                                                                href="{{ url('admin-dashboard/product-category') ?? '' }}/{{ $category->slug ?? '' }}"><em
                                                                    class="icon ni ni-eye"></em><span>Edit</span></a></li>
                                                        <li><a class="delete"
                                                                href="{{ url('admin-dashboard/product-category-remove') ?? '' }}/{{ $category->slug ?? '' }}"><em
                                                                    class="icon ni ni-focus"></em><span>Remove</span></a>
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
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <h4>Sub Categories</h4>
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col">Sno.</th>
                            <th class="nk-tb-col"><span class="sub-text"> Name</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Slug</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Parent Category</span></th>
                            <th class="tb-tnx-action">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
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
                                            <span class="tb-lead">{{ $cat->name ?? '' }}</span>

                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-mb">
                                    <span class="tb-amount">{{ $cat->slug ?? '' }}</span>
                                </td>

                                <td class="nk-tb-col tb-col-md">
                                    <span class="tb-amount">{{ $cat->parent->name ?? '' }}</span>
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
                                                                href="{{ url('admin-dashboard/product-category') ?? '' }}/{{ $cat->slug ?? '' }}"><em
                                                                    class="icon ni ni-eye"></em><span>Edit</span></a></li>
                                                        <li><a class="delete"
                                                                href="{{ url('admin-dashboard/product-category-remove') ?? '' }}/{{ $cat->slug ?? '' }}"><em
                                                                    class="icon ni ni-focus"></em><span>Remove</span></a>
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
       function ChangeStatus(catId){
                        $.ajax({
                            type: 'POST',
                            url: '{{ url('admin-dashboard/change-status') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: catId,
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log('success');
                            },
                            error: function(xhr, status, error) {
                                console.log('Error:', xhr, status, error);
                            }
                        });
       }

    </script>
@endsection
