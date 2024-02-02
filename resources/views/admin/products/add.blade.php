@extends('admin_layout.master')
@section('content')
    <!-- <div class="col-lg-6"> -->
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">{{ isset($product) ? 'Edit Accessories : ' . $product->name : 'Add Accessories' }}
                </h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="{{ url('admin-dashboard/add-accessories-procc') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">Product Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" oninput="convertToSlug(this.value)"
                                            onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"
                                            class="form-control" id="name" value="{{ $product->name ?? '' }}"
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
                                            value="{{ $product->slug ?? '' }}" placeholder="slug">
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
                                    <label class="form-label" for="accessorie_type">Accessories Type</label>
                                    <div class="from-control-wrap">
                                        <select name="accessorie_type" class="form-control" id="accessorie_type">
                                            <option value="">--NONE--</option>
                                            @if (isset($accessories_type))
                                                @foreach ($accessories_type as $type)
                                                    <option value="{{ $type->id ?? '' }}"
                                                        @if ($product !== null) @if ($product->accessories_type == $type->id) Selected @endif
                                                        @endif> {{ $type->name ?? '' }}</option>
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
                                            @if (@isset($product))
                                                <option value="yes" <?php echo $product->is_printed === 'yes' ? 'selected' : ''; ?>>Yes</option>
                                                <option value="no" <?php echo $product->is_printed === 'no' ? 'selected' : ''; ?>>NO</option>
                                            @else
                                                <option value="yes">Yes</option>
                                                <option value="no">NO</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="parent-category"> Category</label>
                                    <div class="from-control-wrap">
                                        <select name="category_id" class="form-control" id="category">
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
                                <div class="form-group">
                                    <label class="form-label" for="parent-category"> Product Type</label>
                                    <div class="from-control-wrap">
                                        <select name="product_type_id" class="form-control" id="product_type">
                                            @if (isset($product_types))
                                                @foreach ($product_types as $type)
                                                    <option value="{{ $type->id ?? '' }}"
                                                        @if ($product !== null) @if ($product->product_type_id == $type->id) Selected @endif
                                                        @endif> {{ $type->name ?? '' }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
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
                        @if (isset($product->images))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap">
                                <?php $images = json_decode($product->images); ?>
                                @foreach ($images as $image)
                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                            <img src="{{ asset('accessories_Images') ?? '' }}/{{ $image ?? '' }}"
                                                alt="">
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                            <span><button onclick="removeImage(this)" class="btn btn-dark">X</button></span>
                                        </div>
                                    </div>
                                    @if ($loop->iteration % 4 == 0)
                                        <div class="w-100"></div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <br>
                        <h4>Add Size (optional)</h4>
                        <div class="col-lg-12 p-3 d-flex ">
                            <div class="form-group col-lg-4" style="margin-right: 1rem">
                                <label class="form-label" for="Qty">Size type</label>
                                <div class="form-control-wrap">
                                    <select name="size_type" class="form-control" onchange="addSize()" id="size_type">
                                        <option value="none">--none--</option>
                                        <option value="wh">Width and Height</option>
                                        <option value="length">length</option>
                                        <option value="DH">Diameter and height</option>
                                        <option value="Custom">Custom</option>
                                    </select>
                                </div>
                                @error('size_type')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                                <input type="hidden" name="size_unit" value="feet">

                                {{-- <div class="form-group" id="Size_unit" style="display:none">
                                    <br>
                                    <label class="form-label" for="size_unit">select Size unit</label>
                                    <div class="form-control-wrap">
                                        <select name="size_unit" class="form-control" id="size_unit">
                                            <option value="feet">feet</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                            <div id="default_price" class="col-lg-6" style="padding-left: 1.5rem">
                                <div class="form-group">
                                    <label class="form-label" for="default_price"> Price</label>
                                    <div class="form-control-wrap " >
                                        <input type="text" name="default_price" class="form-control" 
                                            value="{{ $product->price ?? '' }}" placeholder="Default Price">
                                    </div>
                                    @error('default_price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-lg-8 " id="sizeDiv">
                                <span id="add-button" class="text-right"
                                    style="display: none; cursor: pointer; float:right;">
                                    <a class="primary-link" onclick="addmore()">+Add more</a>
                                </span>
                            </div>
                        </div>

                        <div class="col-lg-6 p-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" class="form-control" id="description" placeholder="category description.....">{{ $product->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit"
                                class="btn btn-lg btn-primary">{{ isset($product) ? ' Update' : ' Save' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <script>

        //:::::::::: converting slug :::::::::::::::::::::::::::::::::::::::://
        function convertToSlug(str) {
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();
            str = str.replace(/^\s+|\s+$/gm, '');
            str = str.replace(/\s+/g, '-');
            $('#slug').val(str);
        }

        //:::::::::::::::: add input fields for image  :::::::::::::::::::::::://
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

        // removing image fields
        function remove(element) {
            element.parentNode.removeChild(element);
        }

        // removing image 
        function removeImage(button) {
            var parentDiv = button.parentNode.parentNode;
            parentDiv.parentNode.removeChild(parentDiv);
        }
        //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://

        //:::::::::::::::::::::: Creating input fields for size  :::::::::::::::::::::::::::::://
        var sizeDataCreated = false;

        function addSize() {
            var sizeType = document.getElementById('size_type').value;
            var sizeDiv = document.getElementById('sizeDiv');
            var btn = document.getElementById('add-button');
            var default_price = document.getElementById('default_price');

            if (!sizeDataCreated) {
                default_price.style.display = 'none';
                btn.style.display = 'block';
                createSizeData();
                sizeDataCreated = true;
            } else {
                var datadiv = document.getElementsByClassName('data-div');
                var datadivArray = Array.from(datadiv);
                datadivArray.forEach(function(element) {
                    element.remove();
                });
                var valueDiv = document.createElement('div');
                valueDiv.className = 'data-div form-group col-lg-12 d-flex align-items-center';
                valueDiv.id = 'data-div';


                var sizeinputdiv = document.createElement('div');
                sizeinputdiv.className = 'form-control-wrap col-lg-5 d-flex p-1 align-items-center';

                if (sizeType === 'wh') {
                    var width = document.createElement('input');
                    width.type = 'text';
                    width.className = 'form-control';
                    width.name = 'width[]';
                    width.placeholder = 'width(ft)';
                    width.required = true;
                    sizeinputdiv.appendChild(width);

                    var span = document.createElement('span');
                    span.textContent = 'X';
                    sizeinputdiv.appendChild(span);

                    var height = document.createElement('input');
                    height.type = 'text';
                    height.className = 'form-control ';
                    height.name = 'height[]';
                    height.placeholder = 'height(ft)';
                    height.required = true;

                    sizeinputdiv.appendChild(height);
                    valueDiv.appendChild(sizeinputdiv);
                } else if (sizeType === 'length' || sizeType === 'Custom') {
                    var sizeinput = document.createElement('input');
                    sizeinput.type = 'text';
                    sizeinput.className = 'form-control ml-3';
                    sizeinput.name = 'sizeValue[]';
                    sizeinput.placeholder = 'value (ft)';
                    sizeinput.required = true;

                    sizeinputdiv.appendChild(sizeinput);
                    valueDiv.appendChild(sizeinputdiv);
                } else if (sizeType === 'DH') {
                    var diameter = document.createElement('input');
                    diameter.type = 'text';
                    diameter.className = 'form-control';
                    diameter.name = 'width[]';
                    diameter.placeholder = 'diameter (ft)';
                    diameter.required = true;
                    sizeinputdiv.appendChild(diameter);

                    var span = document.createElement('span');
                    span.textContent = 'X';
                    sizeinputdiv.appendChild(span);

                    var height = document.createElement('input');
                    height.type = 'text';
                    height.className = 'form-control';
                    height.name = 'height[]';
                    height.placeholder = 'height (ft)';
                    height.required = true;

                    sizeinputdiv.appendChild(height);
                    valueDiv.appendChild(sizeinputdiv);
                }

                if (sizeType === 'none') {
                    sizeDiv.appendChild(valueDiv);
                    btn.style.display = 'none';
                    default_price.style.display = 'block';
                } else {
                    default_price.style.display = 'none';
                    btn.style.display = 'block';
                    var pricediv = document.createElement('div');
                    pricediv.className = 'form-control-wrap col-lg-3 p-1';

                    var priceinput = document.createElement('input');
                    priceinput.type = 'text';
                    priceinput.className = 'form-control';
                    priceinput.name = 'price[]';
                    priceinput.placeholder = 'Enter Price';
                    priceinput.required = true;
                    pricediv.appendChild(priceinput);
                    var removeLink = document.createElement('a');
                    removeLink.className = 'primary-link d-block float-right';
                    removeLink.textContent = 'Remove';
                    removeLink.style.cursor = 'pointer';
                    removeLink.onclick = function() {
                        valueDiv.remove();
                    };

                    valueDiv.appendChild(pricediv);
                    valueDiv.appendChild(removeLink);
                    sizeDiv.appendChild(valueDiv);
                }

            }
        }

        function createSizeData() {
            var sizeType = document.getElementById('size_type').value;
            var sizeDiv = document.getElementById('sizeDiv');
            var valueDiv = document.createElement('div');
            valueDiv.className = 'data-div form-group col-lg-12 d-flex align-items-center';
            valueDiv.id = 'data-div';


            var sizeinputdiv = document.createElement('div');
            sizeinputdiv.className = 'form-control-wrap col-lg-5 d-flex p-1 align-items-center';

            if (sizeType === 'wh') {
                var width = document.createElement('input');
                width.type = 'text';
                width.className = 'form-control';
                width.name = 'width[]';
                width.placeholder = 'width(ft)';
                width.required = true;
                sizeinputdiv.appendChild(width);

                var span = document.createElement('span');
                span.textContent = 'X';
                sizeinputdiv.appendChild(span);

                var height = document.createElement('input');
                height.type = 'text';
                height.className = 'form-control';
                height.name = 'height[]';
                height.placeholder = 'height(ft)';
                height.required = true;

                sizeinputdiv.appendChild(height);
                valueDiv.appendChild(sizeinputdiv);
            } else if (sizeType === 'length' || sizeType === 'Custom') {
                var sizeinput = document.createElement('input');
                sizeinput.type = 'text';
                sizeinput.className = 'form-control ml-3';
                sizeinput.name = 'sizeValue[]';
                sizeinput.placeholder = 'Enter value(ft)';
                sizeinput.required = true;

                sizeinputdiv.appendChild(sizeinput);
                valueDiv.appendChild(sizeinputdiv);
            } else if (sizeType === 'DH') {
                var diameter = document.createElement('input');
                diameter.type = 'text';
                diameter.className = 'form-control';
                diameter.name = 'width[]';
                diameter.placeholder = 'diameter(ft)';
                diameter.required = true;
                sizeinputdiv.appendChild(diameter);

                var span = document.createElement('span');
                span.textContent = 'X';
                sizeinputdiv.appendChild(span);

                var height = document.createElement('input');
                height.type = 'text';
                height.className = 'form-control';
                height.name = 'height[]';
                height.placeholder = 'height(ft)';
                height.required = true;

                sizeinputdiv.appendChild(height);
                valueDiv.appendChild(sizeinputdiv);
            }
            var pricediv = document.createElement('div');
            pricediv.className = 'form-control-wrap col-lg-3 p-1';

            var priceinput = document.createElement('input');
            priceinput.type = 'text';
            priceinput.className = 'form-control';
            priceinput.name = 'price[]';
            priceinput.placeholder = 'Enter Price';
            priceinput.required = true;
            pricediv.appendChild(priceinput);

            var removeLink = document.createElement('a');
            removeLink.className = 'primary-link d-block float-right ';
            removeLink.textContent = 'Remove';
            removeLink.style.cursor = 'pointer';
            removeLink.onclick = function() {
                valueDiv.remove();
            };

            valueDiv.appendChild(pricediv);
            valueDiv.appendChild(removeLink);
            sizeDiv.appendChild(valueDiv);

        }

        function addmore() {
            createSizeData();
        }
        //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://
    </script>
@endsection
