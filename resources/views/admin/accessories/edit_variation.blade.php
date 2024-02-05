@extends('admin_layout.master')
@section('content')
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Edit Accessories variation
                </h5>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                <div class="row ">
                    <div class="col-lg-12">
                        <div id="parent_div" class="col-lg-12 p-1 ">
                            @if ($product->variations !== null)
                                @foreach ($product->variations as $variation)
                                    <div id="container_div" class="container_div form-group col-lg-12 ">
                                        <input type="hidden" name="product_variation_id"
                                            value="{{ $variation->id ?? '' }}">
                                        <h6>Variation {{ $loop->iteration }} </h6>
                                        <div class="col-lg-12 d-flex">
                                            <div class="col-lg-3 p-2">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="variation_name[]"
                                                            class="variation_name form-control" id="variation_name"
                                                            placeholder="Enter Name" value="{{ $variation->name ?? '' }}">
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
                                                @if ($variation->variationData !== null)
                                                    @foreach ($variation->variationData as $data)
                                                        <div id="input_div" class="input_div form-group col-lg-12  d-flex">
                                                            <div class="form-control-wrap col-lg-2 p-2">
                                                                <input type="text" name="{{ $variation->name }}_value[]"
                                                                    class="variation_value form-control" placeholder="Value"
                                                                    value="{{ $data->value ?? '' }}">
                                                            </div>
                                                            <div class="form-control-wrap col-lg-2 p-2">
                                                                <input type="text" name="{{ $variation->name }}_price[]"
                                                                    class="variation_price form-control" placeholder="Price"
                                                                    value="{{ $data->price ?? '' }}">
                                                            </div>
                                                            <div class="form-control-wrap col-lg-3 p-2">
                                                                <input type="file"
                                                                    name="{{ $variation->name }}_Images[]"
                                                                    class="variation_images form-control"
                                                                    placeholder="Value">
                                                                @if ($data->image)
                                                                    <img src="{{ url('/accessories_Images/' . $data->image ?? '') }}"
                                                                        alt="">
                                                                @endif
                                                            </div>
                                                            <div class="form-control-wrap col-lg-4">
                                                                <textarea name="{{ $variation->name }}_description[]" class="variation_description form-control"
                                                                    placeholder="About Product.....">{{ $data->description ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="form-control-wrap " style="margin-left: 2rem; float:right">
                                                <a class="primary-link" style="cursor: pointer"
                                                    onclick="cloneInput(this)">Add
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-control-wrap col-lg-3">
                            <a class="btn btn-primary" style="cursor: pointer" onclick="cloneParentDiv()">Add
                                More variation</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        //:::::::::::: Adding Variations ::::::::::::::::::::::://
        function cloneInput(link) {
            var closestDiv = link.closest('.container_div');

            var InputDivcontainer = closestDiv.querySelector('.variation_value_div');
            var originalInputDiv = document.querySelector('#input_div');

            var clonedInputDiv = originalInputDiv.cloneNode(true);
            clearInputFields(clonedInputDiv);

            var removeInputLink = document.createElement('i');
            removeInputLink.className = 'fas fa-trash-alt float-right p-2 ';
            removeInputLink.style.cursor = 'pointer';
            removeInputLink.onclick = function() {
                clonedInputDiv.remove();
            };
            clonedInputDiv.appendChild(removeInputLink);
            InputDivcontainer.appendChild(clonedInputDiv);
        }

        function clearInputFields(container) {
            var inputFields = container.querySelectorAll('input', 'textarea');
            inputFields.forEach(function(input) {
                input.value = '';
            });
        }

        document.getElementById('parent_div').addEventListener('input', function(event) {
            var target = event.target;

            if (target.tagName === 'INPUT' && target.closest('.container_div')) {
                var parentInput = target.closest('.container_div').querySelector('.variation_name');

                updateNestedInputName(parentInput, 'variation_value', 'variation_price', 'variation_images',
                    'variation_description');
            }
        });
        var divCounter = 1;

        function cloneParentDiv() {
            divCounter++;
            var htmlTemplate = `
                                <div id="container_div" class="container_div form-group col-lg-12 ">
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
                                                                                    <option value="{{ $entity->id }}">{{ $entity->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 p-2">
                                                                <div class="form-group">
                                                                    <i onclick="remove_variation(this)" class="fas fa-trash-alt"></i>
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
                                                                            class="variation_value form-control" placeholder="Value">
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
                                                    </div>
                                                            `;

            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = htmlTemplate;

            var clonedElement = tempDiv.firstElementChild;
            document.getElementById('parent_div').appendChild(clonedElement);
            initializeEditors(clonedElement);

        }

        function remove_variation(icon) {
            var containerDiv = icon.closest('.container_div');
            containerDiv.remove();
        }

        function updateNestedInputName(parentInput, nestedInput1Class, nestedInput2Class, nestedInput3Class,
            nestedInput4Class) {
            var parentInputValue = parentInput.value;

            var containerDiv = parentInput.closest('.container_div');

            var nestedInput1Elements = containerDiv.querySelectorAll('.' + nestedInput1Class);
            var nestedInput2Elements = containerDiv.querySelectorAll('.' + nestedInput2Class);
            var nestedInput3Elements = containerDiv.querySelectorAll('.' + nestedInput3Class);
            var nestedInput4Elements = containerDiv.querySelectorAll('.' + nestedInput4Class);

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
                return /^[a-zA-Z_]+$/.test(value);
            }
        }
    </script>
@endsection
