@extends('admin_layout.master')
@section('content')
    <div class="d-flex justify-content-between">
    </div>
    <div class="card card-bordered card-preview d-none" id="addnewcard">
        <div class="card-inner">
            <div class="preview-block">
                <div class="d-flex justify-content-between">
                    <span class="preview-title-lg overline-title">Add Accessories Type</span>
                    <span class="close"><i class="fas fa-times"></i></span>
                </div>
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <form action="{{ url('admin-dashboard/accessories-type-addProcc') }}" method="POST" id="form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label class="form-label" for="name"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="hidden" class="form-control" name="slug" id="slug"
                                        placeholder=" slug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Description(optional*)</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" class="form-control" id="description" placeholder="description....."></textarea>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label" for="parent-category">Category</label>
                                <div class="from-control-wrap">
                                    <select name="category" class="form-control" id="parent-category">
                                        <option value="">--NONE--</option>
                                        @if (isset($categories))
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id ?? '' }}"
                                                   > {{ $cat->name ?? '' }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary add" id="add"><span
                                        id="button_value">Add</span></button>
                                <button type="button" class="btn btn-primary  add-new d-none" id="add_new"><span>Add
                                        New</span></button>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="nk-block nk-block-lg my-4">
        <div class="nk-block-head">
            <div class="nk-block-head-content d-flex justify-content-between">
                <h4 class="nk-block-title">Accessorie Types</h4>
                <button class="btn btn-primary" id="addnew">Add New</button>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <table class="table table-tranx" id="table">
                <thead>
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">#</span></th>
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                <span> Name</span>
                            </span>
                        </th>
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                <span> Slug</span>
                            </span>
                        </th>
                        <th class="tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody> <?php $a = 1; ?>
                    @if ($accessories_type)
                        @foreach ($accessories_type as $type)
                            <tr class="tb-tnx-item">
                                <td class="tb-tnx-id">
                                    <a href="#"><span>{{ $a++ ?? '' }}</span></a>
                                </td>
                                <td class="tb-tnx-info">
                                    <div class="tb-tnx-desc">
                                        <input type="text" data-id="{{ $type->id ?? '' }}"
                                            class="titleName name{{ $type->id ?? '' }}" value="{{ $type->name ?? '' }}"
                                            disabled style="border: none; background: transparent;" />
                                    </div>
                                </td>
                                <td class="tb-tnx-info">
                                    <div class="tb-tnx-desc">
                                        <input type="text" data-id="{{ $type->slug ?? '' }}"
                                            class="titleName name{{ $type->slug ?? '' }}" value="{{ $type->slug ?? '' }}"
                                            disabled style="border: none; background: transparent;" />
                                    </div>
                                </td>

                                <td class="tb-tnx-action">
                                    <div class="dropdown drop">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                {{-- <li><a href="#"
                                                    data-id ="{{ $type->id ?? '' }}"data-name="{{ $type->name ?? '' }}"
                                                    data-slug ="{{ $type->slug ?? '' }}" class="edit-category">Edit</a></li> --}}
                                                <li><a href="{{ url('admin-dashboard/remove-accessorie-type/' . $type->id) }}"
                                                        data-id ="{{ $type->id ?? '' }}" class="remove-category">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                let name = $(this).val().toLowerCase();
                let slug = name.replace(/\s+/g, "-");
                slug = slug.replace(/\//g, "-");
                $('#slug').val(slug);
            });
            $('#slug').on('change', function() {
                this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
            });
        });
    </script>
    <script>
        $('#addnew').click(function() {
            $('#addnewcard').removeClass('d-none');
            $(this).hide();

        });
        $('.close').click(function() {
            $('#addnewcard').addClass('d-none');
            $('#addnew').show();
        });
    </script>
@endsection
