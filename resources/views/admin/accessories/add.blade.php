@extends('admin_layout.master')
@section('content')
    <!-- <div class="col-lg-6"> -->
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">{{ isset($type) ? 'Edit Accessorie : ' . $type->name : 'Add Accessorie' }}
                </h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $type->id ?? '' }}">
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">Accessorie Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" onload="convertToSlug(this.value)"
                                            onkeyup="convertToSlug(this.value)" class="form-control" id="name"
                                            value="{{ $type->name ?? '' }}" placeholder="Name">
                                    </div>
                                    @error('name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="slug">Slug</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="slug" class="form-control" id="slug"
                                            value="{{ $type->slug ?? '' }}" placeholder="slug">
                                    </div>
                                    @error('slug')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="parent-category">Accessorie Type</label>
                                    <div class="from-control-wrap">
                                        <select name="parent_category" class="form-control" id="parent-category">
                                            <option value="">--NONE--</option>
                                            @if (isset($accessories_type))
                                                @foreach ($accessories_type as $type)
                                                    <option value="{{ $type->id ?? '' }}"> {{ $type->name ?? '' }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="Printed">Printed</label>
                                    <div class="from-control-wrap">
                                        <select name="Printed" class="form-control" id="Printed">
                                            <option value="yes">Yes</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label class="form-label" for="Size">Size</label>
                                    <div class="from-control-wrap">
                                        <select name="size" class="form-control" id="Size">
                                            <option value="">--none--</option>
                                            <option value="WH">width & height</option>
                                            <option value="length">Length</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="Qty">Quantity</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="Qty" class="form-control" id="Qty"
                                            value="{{ $type->quantity ?? '' }}" placeholder="Quantity">
                                    </div>
                                    @error('Qty')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" class="form-control" id="description" placeholder="category description.....">{{ $category->description ?? '' }}</textarea>
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
                            <div class="col-lg-12 d-flex align-items-center">
                                <?php $images = json_decode($category->images); ?>
                                @foreach ($images as $image)
                                    <div class="col-lg-3 d-block">
                                        <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                            <img src="{{ asset('category_Images') ?? '' }}/{{ $image ?? '' }}"
                                                alt="">
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                            <span><button onclick="removeImage(this)"
                                                    class="btn btn-dark">X</button></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group mt-3 text-center">
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
        function convertToSlug(str) {
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();
            str = str.replace(/^\s+|\s+$/gm, '');
            str = str.replace(/\s+/g, '-');
            $('#slug').val(str);
        }

        function addFileInput() {
            var container = document.getElementById('file-input');

            var inputdiv = document.createElement('div');
            inputdiv.className = 'form-control-wrap p-2 d-flex align-items-center';
            var input = document.createElement('input');
            input.type = 'file';
            input.name = 'images[]';
            input.className = 'form-control';

            var button = document.createElement('button');
            button.className = 'btn btn-dark';
            button.textContent = 'X';
            button.type = 'button';
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
    </script>
@endsection
