@extends('admin_layout.master')
@section('content')
    <div class="d-flex justify-content-between">
    </div>
    <div class="card card-bordered card-preview d-none" id="addnewcard">
        <div class="card-inner">
            <div class="preview-block">
                <div class="d-flex justify-content-between">
                    <span class="preview-title-lg overline-title">Add Blog Category</span>
                    <span class="close"><i class="fas fa-times"></i></span>
                </div>
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <form action="{{ url('admin-dashboard/add-blog-category') }}" method="POST" id="form-data">
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
                <h4 class="nk-block-title">Blog Category</h4>
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
                    @foreach ($blog_category as $category)
                        <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                                <a href="#"><span>{{ $a++ ?? '' }}</span></a>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <input type="text" data-id="{{ $category->id ?? '' }}"
                                        class="titleName name{{ $category->id ?? '' }}" value="{{ $category->name ?? '' }}" disabled
                                        style="border: none; background: transparent;" />
                                </div>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <input type="text" data-id="{{ $category->slug ?? '' }}"
                                        class="titleName name{{ $category->slug ?? '' }}" value="{{ $category->slug ?? '' }}" disabled
                                        style="border: none; background: transparent;" />
                                </div>
                            </td>

                            <td class="tb-tnx-action">
                                <div class="dropdown drop">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            {{-- <li><a href="#"
                                                    data-id ="{{ $category->id ?? '' }}"data-name="{{ $category->name ?? '' }}"
                                                    data-slug ="{{ $category->slug ?? '' }}" class="edit-category">Edit</a></li> --}}
                                            <li><a href="{{ url('admin-dashboard/remove-blog-category/'.$category->id) }}" data-id ="{{ $category->id ?? '' }}"
                                                    class="remove-category">Remove</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div><!-- .card-preview -->
    </div>
    <script>
        $(document).ready(function() {
            $('#name').on('input', function() {
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
        $('#addnew').click(function(){
            $('#addnewcard').removeClass('d-none');
            $(this).hide();
           
        });
         $('.close').click(function(){
                $('#addnewcard').addClass('d-none');
                $('#addnew').show();
            });
    </script>
@endsection