@extends('admin_layout.master')
@section('content')
    <!-- <div class="col-lg-6"> -->
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">{{ isset($product) ? 'Edit Product : ' . $product->name : 'Add Product' }}
                </h5>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <form action="{{ url('admin-dashboard/add-product-procc') }}" method="POST" enctype="multipart/form-data">
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
                                                        @if ($product !== null) @if ($product->accessories_type_id == $type->id) Selected @endif
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
                                                        @if ($product !== null) @if ($product->category_id == $cat->id) Selected @endif
                                                        @endif> {{ $cat->name ?? '' }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 p-3">
                                <div class="form-group">
                                    <label class="form-label" for="parent-category"> Product Type</label>
                                    <div class="from-control-wrap">
                                        <select name="product_type_id" class="form-control" id="product_type">
                                        <option value="">--NONE--</option>
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
                        <div class="d-flex">
                            <div class="col-lg-6 p-3">
                                <div class="form-group" id="file-input">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap p-2">
                                        <input type="file" name="images[]" class="form-control" id="image">
                                    </div>
                                    @error('images')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('images.*')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="button" onclick="addFileInput()" class="btn btn-primary" id="add-image">Add
                                    More</button>
                            </div>
                            <div id="default_price" class="col-lg-4 p-3" style="padding-left: 1.5rem">
                                <div class="form-group">
                                    <label class="form-label" for="default_price"> Price</label>
                                    <div class="form-control-wrap ">
                                        <input type="text" name="default_price" class="form-control"
                                            value="{{ $product->price ?? '' }}" id="price"
                                            placeholder="Default Price" required>
                                    </div>
                                    @error('default_price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if (isset($product->images))
                            <div class="col-lg-12 d-flex align-items-center flex-wrap">
                                <?php $images = json_decode($product->images); ?>
                                @foreach ($images as $image)
                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group d-flex align-items-center" style="width: 10rem;">
                                            <img src="{{ asset('product_Images') ?? '' }}/{{ $image ?? '' }}"
                                                alt="">
                                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                            <span><i style="cursor: pointer" onclick="removeImage(this)"
                                                    class="fas fa-trash-alt p-3"></i></span>
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


                            </div>
                            <div class="form-group col-lg-8 " id="sizeDiv">
                                <span id="add-button" class="text-right"
                                    style="display: none; cursor: pointer; float:right;">
                                    <a class="primary-link" onclick="addmore()">+Add more</a>
                                </span>
                            </div>
                        </div>
                        @if ($product !== null)
                            @if ($product->sizes)
                                <div class="col-lg-6">
                                    <div class="Size_class form-control-wrap d-flex p-1">
                                        <div class="col-lg-2">
                                            <h6> Value</h6>
                                        </div>
                                        <div class="col-lg-2">
                                            <h6> Price</h6>
                                        </div>
                                        <div class="col-lg-2">
                                            <h6>Action</h6>
                                        </div>
                                    </div>
                                    @foreach ($product->sizes as $size)
                                        <div class="Size_class form-control-wrap d-flex p-1">
                                            <div class="col-lg-2">
                                                {{ $size->size_value . ' (' . $size->size_unit . ')' }}
                                            </div>
                                            <div class="col-lg-2">
                                                {{ $size->price }}
                                            </div>
                                            <div class="col-lg-2">
                                                <i style="cursor: pointer"
                                                    onclick="removeSize(this,{{ $size->id ?? '' }})"
                                                    class="fas fa-trash-alt p-2"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                        @if ($product === null)
                            <h5>Add Product Variation</h5>
                            <div id="parent_div" class="col-lg-12 p-1 ">
                                <div id="container_div" class="container_div form-group col-lg-12 ">
                                    <h6>Variation 1 </h6>
                                    <div class="col-lg-12 d-flex">
                                        <div class="col-lg-3 p-2">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" name="variation_name[]"
                                                        class="variation_name form-control" id="variation_name"
                                                        placeholder="Enter Name">
                                                    <div class="error-message" style="color: red; display: none;">
                                                        Duplicate
                                                        value
                                                        or invalid characters found</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="entity_id[]" class="entity_id form-control"
                                                        id="entity_id">
                                                        @if ($entities)
                                                            @foreach ($entities as $entity)
                                                                <option value="{{ $entity->id }}">{{ $entity->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="variation_value_div">
                                            <div id="input_div" class="input_div form-group col-lg-12  d-flex">
                                                <div class="form-control-wrap col-lg-2 p-2">
                                                    <input type="text" name="variation_value[]"
                                                        class="variation_value form-control" placeholder="Value">
                                                </div>
                                                <div class="form-control-wrap col-lg-2 p-2">
                                                    <input type="text" name="variation_price[]"
                                                        class="variation_price form-control" placeholder="Price">
                                                </div>
                                                <div class="form-control-wrap col-lg-3 p-2">
                                                    <input type="file" name="variation_Images[]"
                                                        class="variation_images form-control" placeholder="Value">
                                                </div>
                                                <div class="form-control-wrap col-lg-4">
                                                    <textarea name="variation_description[]" class="variation_description form-control" placeholder="About Product....."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-control-wrap " style="margin-left: 2rem; float:right">
                                            <a class="primary-link" style="cursor: pointer"
                                                onclick="cloneInput(this)">Add
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control-wrap col-lg-3">
                                <a class="btn btn-primary" style="cursor: pointer" onclick="cloneParentDiv()">Add
                                    More variation</a>
                            </div>
                        @endif
                        <div class="col-lg-10 p-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Product Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="product_description" class="description form-control" id="product_description"
                                        placeholder="About Product.....">{{ $product->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        @if ($product !== null)
                            <div class="card card-bordered card-preview d-none" id="addnewcard">
                                <div class="card-inner">
                                    <div class="preview-block">
                                        <div class="d-flex justify-content-between">
                                            <span class="preview-title-lg overline-title">Edit Product variation</span>
                                            <span class="close"><i class="fas fa-times"></i></span>
                                        </div>
                                        <div class="row gy-8">
                                            <div class="col-sm-12">
                                                <div id="parent_div" class="col-lg-12 p-1 ">
                                                    @if (isset($product->variations))
                                                        @foreach ($product->variations as $variation)
                                                            <div id="container_div"
                                                                class="container_div form-group col-lg-12 ">
                                                                <input type="hidden" name="product_variation_id"
                                                                    value="{{ $variation->id ?? '' }}">
                                                                <h6>Variation {{ $loop->iteration }} </h6>
                                                                <div class="col-lg-12 d-flex">
                                                                    <div class="col-lg-3 p-2">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrap">
                                                                                <input type="text"
                                                                                    name="variation_name[]"
                                                                                    class="variation_name form-control"
                                                                                    id="variation_name"
                                                                                    placeholder="Enter Name"
                                                                                    value="{{ $variation->name ?? '' }}">
                                                                                <div class="error-message"
                                                                                    style="color: red; display: none;">
                                                                                    Duplicate
                                                                                    value
                                                                                    or invalid characters found</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 p-2">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrap">
                                                                                <select name="entity_id[]"
                                                                                    class="entity_id form-control"
                                                                                    id="entity_id">
                                                                                    @if ($entities)
                                                                                        @foreach ($entities as $entity)
                                                                                            <option
                                                                                                value="{{ $entity->id }}" @if ($variation !== null) @if ($variation->entity_id == $entity->id) Selected @endif
                                                                                                @endif>
                                                                                                {{ $entity->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 p-2">
                                                                        <div class="form-group">
                                                                            <i style="cursor:pointer;"
                                                                                onclick="remove_variation(this,{{ $variation->id ?? '' }})"
                                                                                class="fas fa-trash-alt"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="variation_value_div">
                                                                        @if ($variation->variationData !== null)
                                                                            @foreach ($variation->variationData as $data)
                                                                                <div id="input_div"
                                                                                    class="input_div form-group col-lg-12  d-flex">
                                                                                    <div
                                                                                        class="form-control-wrap col-lg-2 p-2">
                                                                                        <input type="text"
                                                                                            name="{{ $variation->name }}_value[]"
                                                                                            class="variation_value form-control"
                                                                                            placeholder="Value"
                                                                                            value="{{ $data->value ?? '' }}"
                                                                                            required>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-control-wrap col-lg-2 p-2">
                                                                                        <input type="text"
                                                                                            name="{{ $variation->name }}_price[]"
                                                                                            class="variation_price form-control"
                                                                                            placeholder="Price"
                                                                                            value="{{ $data->price ?? '' }}"
                                                                                            required>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-control-wrap col-lg-3 p-2">
                                                                                        <input type="file"
                                                                                            name="{{ $variation->name }}_Images[]"
                                                                                            class="variation_images form-control"
                                                                                            placeholder="Value">
                                                                                        @if ($data->image)
                                                                                            <img src="{{ asset('product_Images') ?? '' }}/{{ $data->image ?? '' }}"
                                                                                                alt="">
                                                                                        @endif
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-control-wrap col-lg-4">
                                                                                        <textarea name="{{ $variation->name }}_description[]" class="variation_description form-control"
                                                                                            placeholder="About Product.....">{{ $data->description ?? '' }}</textarea>
                                                                                    </div>
                                                                                    <div class="col-lg-3 p-2">
                                                                                        <div class="form-group">
                                                                                            <i syle="cursor:pointer;"
                                                                                                onclick="remove_variation_data(this,{{ $data->id ?? '' }})"
                                                                                                class="variation_data_add fas fa-trash-alt"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-control-wrap "
                                                                        style="margin-left: 2rem; float:right">
                                                                        <a class="primary-link" data-name=''
                                                                            style="cursor: pointer"
                                                                            onclick="cloneInput(this)">Add
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <input type="hidden" id="remove_variation_id" name="remove_variation_id"
                                                    value="">
                                                <input type="hidden" id="remove_variationData_id"
                                                    name="remove_variationData_id" value="">
                                                <input type="hidden" id="remove_size_id" name="remove_size_id"
                                                    value="">
                                                <div class="form-control-wrap col-lg-3">
                                                    <a class="btn btn-primary" style="cursor: pointer"
                                                        onclick="cloneParentDiv()">Add
                                                        More variation</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block nk-block-lg my-4">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary" id="addnew">Edit
                                            Variations</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                </div>
                <div class="form-group mt-3 text-center">
                    <button type="submit"
                        class="btn btn-lg btn-primary">{{ isset($product) ? ' Update' : ' Save' }}</button>
                </div>
            </div>
            </form>
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
        //:::::::::::::: converting slug :::::::::::::::::::::::::::::::::://
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

        var icon = document.createElement('i');
        icon.className = 'fas fa-trash-alt p-2';
        icon.style.cursor = 'pointer';
        icon.onclick = function() {
            remove(inputdiv);
        };

        inputdiv.appendChild(input);
        inputdiv.appendChild(icon);
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
    var sizeDataCreated = true;

    function addSize() {
        var sizeType = document.getElementById('size_type').value;
        var sizeDiv = document.getElementById('sizeDiv');
        var btn = document.getElementById('add-button');
        var default_price = document.getElementById('default_price');

        if (!sizeDataCreated) {
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
                width.type = 'number';
                width.className = 'form-control';
                width.name = 'width[]';
                width.placeholder = 'width(ft)';
                width.required = true;
                sizeinputdiv.appendChild(width);

                var span = document.createElement('span');
                span.textContent = 'X';
                sizeinputdiv.appendChild(span);

                var height = document.createElement('input');
                height.type = 'number';
                height.className = 'form-control ';
                height.name = 'height[]';
                height.placeholder = 'height(ft)';
                height.required = true;

                sizeinputdiv.appendChild(height);
                valueDiv.appendChild(sizeinputdiv);
            } else if (sizeType === 'length' || sizeType === 'Custom') {
                var sizeinput = document.createElement('input');
                if (sizeType === 'length') {
                    sizeinput.type = 'number';
                } else {
                    sizeinput.type = 'text';
                }
                sizeinput.className = 'form-control ml-3';
                sizeinput.name = 'sizeValue[]';
                sizeinput.placeholder = 'value (ft)';
                sizeinput.required = true;

                sizeinputdiv.appendChild(sizeinput);
                valueDiv.appendChild(sizeinputdiv);
            } else if (sizeType === 'DH') {
                var diameter = document.createElement('input');
                diameter.type = 'number';
                diameter.className = 'form-control';
                diameter.name = 'width[]';
                diameter.placeholder = 'diameter (ft)';
                diameter.required = true;
                sizeinputdiv.appendChild(diameter);

                var span = document.createElement('span');
                span.textContent = 'X';
                sizeinputdiv.appendChild(span);

                var height = document.createElement('input');
                height.type = 'number';
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
            } else {
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

                valueDiv.appendChild(pricediv);
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
            width.type = 'number';
            width.className = 'form-control';
            width.name = 'width[]';
            width.placeholder = 'width(ft)';
            width.required = true;
            sizeinputdiv.appendChild(width);

            var span = document.createElement('span');
            span.textContent = 'X';
            sizeinputdiv.appendChild(span);

            var height = document.createElement('input');
            height.type = 'number';
            height.className = 'form-control';
            height.name = 'height[]';
            height.placeholder = 'height(ft)';
            height.required = true;

            sizeinputdiv.appendChild(height);
            valueDiv.appendChild(sizeinputdiv);
        } else if (sizeType === 'length' || sizeType === 'Custom') {
            var sizeinput = document.createElement('input');
            if (sizeType === 'length') {
                sizeinput.type = 'number';
            } else {
                sizeinput.type = 'text';
            }
            sizeinput.className = 'form-control ml-3';
            sizeinput.name = 'sizeValue[]';
            sizeinput.placeholder = 'Enter value(ft)';
            sizeinput.required = true;

            sizeinputdiv.appendChild(sizeinput);
            valueDiv.appendChild(sizeinputdiv);
        } else if (sizeType === 'DH') {
            var diameter = document.createElement('input');
            diameter.type = 'number';
            diameter.className = 'form-control';
            diameter.name = 'width[]';
            diameter.placeholder = 'diameter(ft)';
            diameter.required = true;
            sizeinputdiv.appendChild(diameter);

            var span = document.createElement('span');
            span.textContent = 'X';
            sizeinputdiv.appendChild(span);

            var height = document.createElement('input');
            height.type = 'number';
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

        var removeLink = document.createElement('i');
        removeLink.className = 'fas fa-trash-alt';
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

    var productSizes = [];

    function removeSize(icon, id) {
        productSizes.push(id);
        var containerDiv = icon.closest('.Size_class');
        containerDiv.remove();
        document.getElementById('remove_size_id').value = productSizes;
    }
    //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://

    //:::::::::::: Adding Variations ::::::::::::::::::::::://
    function cloneInput(link) {
        var closestDiv = link.closest('.container_div');
        var parentInput = closestDiv.querySelector('.variation_name').value.trim().replace(/\s+/g, '_');

        var InputDivcontainer = closestDiv.querySelector('.variation_value_div');

        var newInputDiv = document.createElement('div');
        newInputDiv.classList.add('input_div', 'form-group', 'col-lg-12', 'd-flex');

        var input1 = document.createElement('div');
        input1.classList.add('form-control-wrap', 'col-lg-2', 'p-2');
        input1.innerHTML = '<input type="text" name="' + parentInput +
            '_value[]" class="variation_value form-control" placeholder="Value" required>';

        var input2 = document.createElement('div');
        input2.classList.add('form-control-wrap', 'col-lg-2', 'p-2');
        input2.innerHTML = '<input type="text" name="' + parentInput +
            '_price[]" class="variation_price form-control" placeholder="Price" required>';

        var input3 = document.createElement('div');
        input3.classList.add('form-control-wrap', 'col-lg-3', 'p-2');
        input3.innerHTML = '<input type="file" name="' + parentInput +
            '_Images[]" class="variation_images form-control" placeholder="Value">';

        var input4 = document.createElement('div');
        input4.classList.add('form-control-wrap', 'col-lg-4');
        input4.innerHTML = '<textarea name="' + parentInput +
            '_description[]" class="variation_description form-control" placeholder="About Product....."></textarea>';

        var input5 = document.createElement('div');
        input5.classList.add('col-lg-3', 'p-2');
        input5.innerHTML =
            '<div class="form-group"><i style="cursor:pointer;" onclick="removeNewInput(this)" class="fas fa-trash-alt"></i></div>';

        newInputDiv.appendChild(input1);
        newInputDiv.appendChild(input2);
        newInputDiv.appendChild(input3);
        newInputDiv.appendChild(input4);
        newInputDiv.appendChild(input5);

        InputDivcontainer.appendChild(newInputDiv);
        initializeEditors(newInputDiv);
    }

    document.getElementById('parent_div').addEventListener('input', function(event) {
        var target = event.target;

        if (target.tagName === 'INPUT' && target.closest('.container_div')) {
            var parentInput = target.closest('.container_div').querySelector('.variation_name');

            updateNestedInputName(parentInput, 'variation_value', 'variation_price', 'variation_images',
                'variation_description', 'variation_data_add');
        }
    });
    var divCounter = 1;

    function cloneParentDiv() {
        divCounter++;
        var htmlTemplate = `<div id="container_div" class="container_div form-group col-lg-12 ">
                                                <h6>Variation ${divCounter} </h6>
                                                <div class="col-lg-12 d-flex">
                                                    <div class="col-lg-3 p-2">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="variation_name[]"
                                                                    class="variation_name form-control" id="variation_name"
                                                                        placeholder="Enter Name">
                                                                <div class="error-message" style="color: red; display: none;">Duplicate
                                                                        value
                                                                    or invalid characters found</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-2">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <select name="entity_id[]" class="entity_id form-control" id="entity_id">
                                                                    @if ($entities)
                                                                        @foreach ($entities as $entity)
                                                                            <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-2">
                                                        <div class="form-group">
                                                            <i style="cursor:pointer;" onclick="remove_variation(this)" class="fas fa-trash-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="variation_value_div">
                                                        <div id="input_div" class="input_div form-group col-lg-12  d-flex">
                                                            <div class="form-control-wrap col-lg-2 p-2">
                                                                <input type="text" name="variation_value[]"
                                                                    class="variation_value form-control" placeholder="Value">
                                                            </div>
                                                            <div class="form-control-wrap col-lg-2 p-2">
                                                                <input type="text" name="variation_price[]"
                                                                     class="variation_price form-control" placeholder="Price">
                                                            </div>
                                                            <div class="form-control-wrap col-lg-3 p-2">
                                                               <input type="file" name="variation_Images[]"
                                                                    class="variation_images form-control" placeholder="Value">
                                                            </div>
                                                            <div class="form-control-wrap col-lg-4">
                                                                <textarea name="variation_description[]" class="variation_description form-control" id="product_description"
                                                                    placeholder="About Product....."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-control-wrap " style="margin-left: 2rem; float:right">
                                                          <a class="primary-link" style="cursor: pointer" onclick="cloneInput(this)">Add
                                                              More</a>
                                                     </div>
                                                </div>
                                        </div>`;




            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = htmlTemplate;

            var clonedElement = tempDiv.firstElementChild;
            document.getElementById('parent_div').appendChild(clonedElement);
            initializeEditors(clonedElement);

        }
        var variationIDs = [];

        function remove_variation(icon, id) {
            variationIDs.push(id);
            console.log(variationIDs);
            var containerDiv = icon.closest('.container_div');
            containerDiv.remove();
            document.getElementById('remove_variation_id').value = variationIDs;
        }


        var variationDataIDs = [];

        function remove_variation_data(icon, id) {
            variationDataIDs.push(id);
            console.log(variationDataIDs);
            var containerDiv = icon.closest('.input_div');
            containerDiv.remove();
            document.getElementById('remove_variationData_id').value = variationDataIDs;
        }


        function updateNestedInputName(parentInput, nestedInput1Class, nestedInput2Class, nestedInput3Class,
            nestedInput4Class, addMore) {
            var parentInputValue = parentInput.value.trim().replace(/\s+/g, '_');

            var containerDiv = parentInput.closest('.container_div');

            var nestedInput1Elements = containerDiv.querySelectorAll('.' + nestedInput1Class);
            var nestedInput2Elements = containerDiv.querySelectorAll('.' + nestedInput2Class);
            var nestedInput3Elements = containerDiv.querySelectorAll('.' + nestedInput3Class);
            var nestedInput4Elements = containerDiv.querySelectorAll('.' + nestedInput4Class);
            var addMoredata = containerDiv.querySelectorAll('.' + addMore);

            nestedInput1Elements.forEach(function(nestedInput1) {
                nestedInput1.name = parentInputValue + '_value[]';
            });

            nestedInput2Elements.forEach(function(nestedInput2) {
                nestedInput2.name = parentInputValue + '_price[]';
            });

            nestedInput3Elements.forEach(function(nestedInput3) {
                nestedInput3.name = parentInputValue + '_Images[]';
            });

            nestedInput4Elements.forEach(function(nestedInput4) {
                nestedInput4.name = parentInputValue + '_description[]';
            });

            addMoredata.forEach(function(adddata) {
                adddata.setAttribute('data-name', parentInputValue)
            });
        }
        //:::::::::::::::::::::::::::::::::::::::::::::::::::::::://

        document.getElementById('parent_div').addEventListener('input', function(event) {
            var target = event.target;

            if (target.tagName === 'INPUT' && target.classList.contains('variation_name')) {
                validateInputs();
            }

        });

        function validateInputs() {
            var inputs = document.querySelectorAll('.variation_name');
            var values = new Set();
            var duplicateFound = false;

            inputs.forEach(function(input) {
                var value = input.value.trim();

                if (!value) {
                    input.setCustomValidity('');
                    input.nextElementSibling.style.display = 'none';
                    return;
                }

                if (values.has(value)) {
                    // Duplicate value found
                    duplicateFound = true;
                    input.setCustomValidity('Duplicate value found');
                    input.nextElementSibling.style.display = 'block';
                } else if (!isValidCharacters(value)) {
                    input.setCustomValidity('Invalid characters found');
                    input.nextElementSibling.style.display = 'block';
                } else {
                    values.add(value);
                    input.setCustomValidity('');
                    input.nextElementSibling.style.display = 'none';
                }
            });

            if (duplicateFound) {
                console.error('Duplicate value found');
            }

            function isValidCharacters(value) {
                return /^[a-zA-Z\s_]+$/.test(value);
            }
        }
    </script>
@endsection
