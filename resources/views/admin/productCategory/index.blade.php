@extends('admin_layout.master')
@section('content')
    <!-- <div class="col-lg-6"> -->
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">{{ isset($category) ? 'Edit Category: ' . $category->name : 'Add Category' }}</h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="{{ url('admin-dashboard/product-category-addProcc') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id ?? '' }}">
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">Category Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" oninput="convertToSlug(this.value)"
                                            onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"
                                            class="form-control" id="name" value="{{ $category->name ?? '' }}"
                                            placeholder="Name">
                                    </div>
                                    @error('name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="hidden" name="slug" class="form-control" id="slug"
                                            value="{{ $category->slug ?? '' }}" placeholder="slug">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-3">
                            <div class="form-group">
                                <label class="form-label" for="parent-category">Parent Category</label>
                                <div class="from-control-wrap">
                                    <select name="parent_category" class="form-control" id="parent-category">
                                        <option value="">--NONE--</option>
                                        @if (isset($categories))
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id ?? '' }}"
                                                    @if ($category !== null) @if ($category->parent_category == $cat->id) Selected @endif
                                                    @endif> {{ $cat->name ?? '' }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 p-3">
                            <div class="form-group" id="file-input">
                                <label class="form-label" for="image">Image</label>
                                <div class="form-control-wrap p-2">
                                    <input type="file" name="images[]" class="form-control" id="image">
                                </div>
                                @error('image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="button" onclick="addFileInput()" class="btn btn-primary" id="add-image">Add
                                More</button>
                        </div>
                        @if (isset($category->images))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap">
                                <?php $images = json_decode($category->images); ?>
                                @foreach ($images as $image)
                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                            <img src="{{ asset('category_Images') ?? '' }}/{{ $image ?? '' }}"
                                                alt="">
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                            <span><i onclick="removeImage(this)" style="cursor: pointer"
                                                    class="fas fa-trash-alt p-2"></i></span>
                                        </div>
                                    </div>
                                    @if ($loop->iteration % 4 == 0)
                                        <div class="w-100"></div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        @if (!isset($category))
                            <div id="parent_div">
                                <div class="d-flex" id="clone_div">
                                    <div class="col-lg-6 p-3">
                                        <div class="form-group">
                                            <label class="form-label" for="name">FAQs :</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="new_title[]" class="form-control" id="title"
                                                    placeholder="Enter title">
                                            </div>
                                            @error('title')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-3">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Details :</label>
                                            <div class="form-control-wrap">
                                                <textarea name="new_description[]" class="form-control" placeholder="description....."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12"><a class="primary-link float-end" id="add-FAQs" type="button">Add
                                    More</a></div>
                        @endif
                        <div class="col-lg-10 p-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" class="description form-control" id="description"
                                        placeholder="category description.....">{{ $category->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- edit FAQs --}}
                        @if (isset($category))
                            <div class="card card-bordered card-preview d-none" id="addnewcard">
                                <div class="card-inner">
                                    <div class="preview-block">
                                        <div class="d-flex justify-content-between">
                                            <span class="preview-title-lg overline-title">Edit FAQs </span>
                                            <span class="close"><i class="fas fa-times"></i></span>
                                        </div>
                                        <div class="col-sm-12">
                                            <div id="parent_div">
                                                <input type="hidden" name="remove_FAQ_id" id="remove_FAQ_id">
                                                @if ($category->FAQs->isNotEmpty())
                                                <?php $count=0; ?>
                                                    @foreach ($category->FAQs as $FAQs)
                                                        <div class="cloned-div d-flex" id="clone_div" >
                                                            <div class="col-lg-5 p-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">FAQs
                                                                        :</label>
                                                                    <input type="hidden" name="faqs[{{ $count}}][id]"
                                                                        value="{{ $FAQs->id ?? '' }}">
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="faqs[{{ $count }}][title]"
                                                                            class="form-control" id="title"
                                                                            placeholder="Enter title"
                                                                            value="{{ $FAQs->title ?? '' }}">
                                                                    </div>
                                                                    @error('title')
                                                                        <span
                                                                            class="text text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 p-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Details
                                                                        :</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="faqs[{{ $count }}][description]" class="form-control" placeholder="description.....">{{ $FAQs->description ?? '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"
                                                                style="margin-top: 15px;padding-top:5px">
                                                                <div class="form-control-wrap">
                                                                    <i syle="cursor:pointer;"
                                                                        onclick="remove_FAQ_data(this,{{ $FAQs->id ?? '' }})"
                                                                        class="variation_data_add fas fa-trash-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $count++ ?>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-lg-12"><a class="primary-link float-end" type="button"
                                                    id="add-FAQs">Add New</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block nk-block-lg my-4">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content d-flex justify-content-between">
                                        <h4 class="nk-block-title">Edit FAQs</h4>
                                        <button type="button" class="btn btn-primary" id="addnew">Edit</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="form-group mt-3">
                            <button type="submit"
                                class="btn btn-lg btn-primary">{{ isset($category) ? ' Update' : ' Save' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

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
    <script>
        function convertToSlug(str) {
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
            .toLowerCase();
        str = str.replace(/^\s+|\s+$/gm, '');
        str = str.replace(/\s+/g, '-');
        $('#slug').val(str);
    }
    var variationDataIDs = [];
    function remove_FAQ_data(icon, id) {
            variationDataIDs.push(id);
            console.log(variationDataIDs);
            var containerDiv = icon.closest('.cloned-div');
            containerDiv.remove();
            document.getElementById('remove_FAQ_id').value = variationDataIDs;
        }

    function addFileInput() {
        var container = document.getElementById('file-input');

        var inputdiv = document.createElement('div');
        inputdiv.className = 'form-control-wrap p-2 d-flex align-items-center';
        var input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.className = 'form-control';

        var button = document.createElement('i');
        button.className = 'fas fa-trash-alt p-2';
        button.style.cursor = 'pointer';
        button.onclick = function() {
            remove(inputdiv);
        };



        inputdiv.appendChild(input);
        inputdiv.appendChild(button);
        container.appendChild(inputdiv);
    }

    function remove(element) {
        element.parentNode.removeChild(element);
    }

    function removeImage(button) {
        var parentDiv = button.parentNode.parentNode;
        parentDiv.parentNode.removeChild(parentDiv);
    }

    $(document).ready(function() {
        $('#add-FAQs').click(function() {
            var newFaqHtml = `
                        <div class="clone-div d-flex" >
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">FAQs :</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="new_title[]" class="form-control" placeholder="Enter title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">Details :</label>
                                    <div class="form-control-wrap">
                                        <textarea name="new_description[]" class="form-control" placeholder="description....."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div><i type="button" class="data_remove fas fa-trash-alt"></i></div>
                        </div>`;
                $('#parent_div').append(newFaqHtml);
            });

            $('#parent_div').on('click', '.data_remove', function() {
                $(this).closest('.clone-div').remove();
            });
        });
    </script>
@endsection
