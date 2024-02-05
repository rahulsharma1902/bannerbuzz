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
                                                                <input type="file" name="{{ $variation->name }}_Images[]"
                                                                    class="variation_images form-control"
                                                                    placeholder="Value">
                                                                @if ($data->image)
                                                                    <img src="{{ url('/accessories_Images/' . $data->image ?? '') }}"
                                                                        alt="">
                                                                @endif
                                                            </div>
                                                            <div class="form-control-wrap col-lg-4">
                                                                <textarea name="{{ $variation->name }}_description[]" class="variation_description form-control" placeholder="About Product.....">{{ $data->description ?? '' }}</textarea>
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
@endsection
