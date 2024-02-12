@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Clipart</h4>
        </div>
        <div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid">
                                <label class="custom-control-label" for="uid"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Clipart Name</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Slug</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Category</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($templates as $template )


                    <tr class="nk-tb-item">
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid1">
                                <label class="custom-control-label" for="uid1"></label>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-avatar bg-dark d-none d-sm-flex">
                                    <img src="{{ asset('TemplateImage')}}/{{ $template->template_image ?? 'template.png' }}"
                                        alt="{{ $template->slug ?? '' }}">
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead">{{ $template->name ?? '' }}</span>

                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">{{ $template->slug ?? '' }}</span>
                        </td>

                        <td class="nk-tb-col tb-col-md">
                            <span class="tb-amount">{{ $template->category->name ?? '' }}</span>
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
                                                        href="{{ url('admin-dashboard/template') ?? '' }}/{{ $template->slug ?? ''}}"><em
                                                            class="icon ni ni-eye"></em><span>Edit</span></a></li>
                                                <li><a class="delete"
                                                        link="{{ url('admin-dashboard/template-remove') ?? '' }}/{{ $template->slug ?? ''}}"><em
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
<script>
$(document).ready(function() {
    $('.delete').click(function() {
        link = $(this).attr('link');
        Swal.fire({
            title: 'Do you want to delete this product?',
            showCancelButton: true,
            confirmButtonText: 'yes',
            confirmButtonColor: '#008000',
            cancelButtonText: 'no',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        });
    });
});
</script>
@endsection