@extends('admin_layout.master')
@section('content')
    <div class="card card-bordered card-preview d-none" id="addnewcard">
        <div class="card-inner">
            <div class="preview-block">
                <div class="d-flex justify-content-between">
                    <span class="preview-title-lg overline-title">Add Testimonials</span>
                    <span class="close"><i class="fas fa-times"></i></span>
                </div>
                <div class="row gy-4">
                    <div class="col-sm-12">
                        <form action="{{ url('admin-dashboard/add-testimonial-procc') }}" method="POST"
                            enctype="multipart/form-data" id="form-data">
                            @csrf
                            <div class="d-flex col-lg-12">
                                <div class="form-group col-lg-4 p-2">
                                    <label class="form-label" for="name"> Name</label>
                                    <div class="form-control-wrap p-2">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                                    </div>
                                    @error('name')
                                    <span class="text-danger" id="name_error" >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 p-2">
                                    <label class="form-label" for="image"> Image</label>
                                    <div class="form-control-wrap p-2">
                                        <input type="file" class="form-control" name="image" id="image" placeholder=" image">
                                    </div>
                                    @error('image')
                                    <span class="text-danger" id="image_error" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex col-lg-12"> 
                                <div class="form-group col-lg-4 p-2">
                                    <label class="form-label" for="stars"> Rating</label>
                                    <div class="form-control-wrap p-2">
                                        <input type="number" class="form-control" name="rate" value="1" id="rating" min="1" max="5">
                                    </div>
                                    <span class="text-danger" id="rating_error"></span>
                                    @error('rate')
                                    <span class="text-danger"  >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 p-2">
                                    <label class="form-label" for="description"> Statement</label>
                                    <div class="form-control-wrap p-2">
                                        <textarea name="description" id="description"
                                            class="description from-control"></textarea>
                                    </div>
                                    @error('description')
                                    <span class="text-danger" id="description_error" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary add" id="add"><span
                                        id="button_value">Add</span></button>
                                <button type="button" class="btn btn-primary  add-new d-none" id="add_new"><span>Add
                                        New</span></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="nk-block nk-block-lg my-4">
        <div class="nk-block-head">
            <div class="nk-block-head-content d-flex justify-content-between">
                <h4 class="nk-block-title">Testimonials</h4>
                <button class="btn btn-primary" id="addnew">Add New</button>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <table class="table table-tranx" id="table">
                <thead>
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">#</span></th>
                        <!-- <th class="tb-tnx-info">
                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                    <span> image</span>
                                </span>
                            </th> -->
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                <span> Name</span>
                            </span>
                        </th>
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                <span> Statement</span>
                            </span>
                        </th>
                        <th class="tb-tnx-action">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    @foreach ($testimonials as $data)
                        <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                                <a href="#"><span>{{ $a++ ?? '' }}</span></a>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    {{$data->name ?? ''}}
                                </div>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <?php echo substr($data->description, 0, 50); ?>... <a type="button" class="primary-link" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id ?? ''}}">View</a>
                                </div>
                                
                            </td>

                            <td class="tb-tnx-action">
                                <div class="dropdown drop">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                            class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="{{ url('admin-dashboard/remove-testimonial/'.$data->id) }}"
                                                    data-id="{{ $data->id ?? '' }}" class="remove-category">Remove</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{$data->id ?? ''}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $data->description; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div><!-- .card-preview -->
    </div>
    <script>
        $('#addnew').click(function () {
            $('#addnewcard').removeClass('d-none');
            $(this).hide();

        });
        $('.close').click(function () {
            $('#addnewcard').addClass('d-none');
            $('#addnew').show();
        });
        $(document).ready(function(){
            $('#rating').on('change',function(){
                var value = $(this).val();
                if(value == '' || value < 1){
                    $('#rating_error').text('Enter a valid value');
                } else if(value > 5){
                    $('#rating_error').text('value is not greater then 5');
                } else{
                    $('#rating_error').text('');
                }
            });
        });
    </script>
@endsection