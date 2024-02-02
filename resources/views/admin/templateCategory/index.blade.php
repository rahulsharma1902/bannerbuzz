@extends('admin_layout/master')
@section('content')

<div class="d-flex justify-content-between">
</div>
<div class="card card-bordered card-preview d-none" id="addnewcard">
    <div class="card-inner">
        <div class="preview-block">
            <div class="d-flex justify-content-between">
                <span class="preview-title-lg overline-title">Add Template Category</span>
                <span class="close"><i class="fas fa-times"></i></span>
            </div>
            <div class="row gy-4">
                <div class="col-sm-6">
                    <form action=""  id="form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label class="form-label" for="name">Category Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Catgory name">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <label class="form-label" for="name">Parent Category</label>
                            <div class="form-control-wrap">
                                <!-- <select class="form-select js-select2" id="parent_category" name="parent_category" data-placeholder="Select a option" required>
                                    @if($parentCategory)
                                        <option value="0" selected>None</option>
                                        @foreach ($parentCategory as $cat)
                                        
                                            <option class="parent{{ $cat->id ?? '' }} " value="{{ $cat->id ?? '' }} ">{{ $cat->name ?? ''}}</option>
                                        @endforeach
                                    @endif
                                </select> -->
                                <select class="form-control" name="" id="parent_category">
                                    <option value="0">none</option>
                                    @foreach ($parentCategory as $cat)
                                        
                                        <option class="form-control parent{{ $cat->id ?? '' }} " value="{{ $cat->id ?? '' }} ">{{ $cat->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                             <!-- <label class="form-label" for="slug">Slug</label> -->
                            <div class="form-control-wrap">
                                <input type="hidden" class="form-control" name="slug" id="slug"
                                    placeholder="Category slug">
                            </div>
                        </div> 

                        <div class="form-group">
                            <button type="button" class="btn btn-primary add" id="add"><span id="button_value">Add</span></button>
                            <button type="button" class="btn btn-primary  add-new d-none" id="add_new"><span >Add New</span></button>
                            
                        
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
            <h4 class="nk-block-title">Categories</h4>
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
                            <span>Category Name</span>
                        </span>
                    </th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Category Slug</span>
                        </span>
                    </th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Parent Category</span>
                        </span>
                    </th>
                    <th class="tb-tnx-action">
                        <span>Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>     <?php $a = 1; ?>
    @foreach($category as $cat)
        <tr class="tb-tnx-item">
            <td class="tb-tnx-id">
                <a href="#"><span>{{ $a++ ?? ''}}</span></a>
            </td>
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <input type="text" data-id="{{ $cat->id ?? '' }}" class="titleName name{{ $cat->id ?? '' }}" value="{{ $cat->name ?? ''}}"  disabled style="border: none; background: transparent;" />
                </div>
            </td>
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <input type="text" data-id="{{ $cat->slug ?? '' }}" class="titleName name{{ $cat->slug ?? '' }}" value="{{ $cat->slug ?? ''}}"  disabled style="border: none; background: transparent;" />
                </div>
            </td>
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <input type="text" data-id="{{ $cat->parent_category ?? '' }}" class="ParentCategory name{{ $cat->parent_category ?? '' }}" value="{{ $cat->parent->name ?? '---'}}"  disabled style="border: none; background: transparent;" />
                </div>
            </td>
          
            <td class="tb-tnx-action">
                <div class="dropdown drop>
                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                        <ul class="link-list-plain">
                            <li><a href="#" data-parent="{{$cat->parent_category ?? ''  }}"  data-id ="{{$cat->id ?? ''  }}"data-name = "{{ $cat->name ?? '' }}" data-slug ="{{ $cat->slug ?? '' }}" class="edit-category" >Edit</a></li>
                            <li><a href="#" data-id ="{{$cat->id ?? ''  }}"  class="remove-category" >Remove</a></li>
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

$(document).ready(function(){
    $('#name').on('input', function(){
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-");
        slug = slug.replace(/\//g, "-");
        $('#slug').val(slug);
    });
    $('#slug').on('change', function(){
        this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
    });

        // $('#name').on('keyup',function(){
        //     let name = $(this).val().toLowerCase();
        //     let slug = name.replace(/ /g, "-");
        //    $('#slug').val(slug);
        // });
    });
    
    $("body").delegate(".add", "click", function(e) {
        var name = $('#name').val();
        var slug = $('#slug').val();
        var id = $('#id').val();
        var parent_category = $('#parent_category').val();
        if(parent_category == ''){
            parent_category = 0;
        }
        if(parseInt(id) == parseInt(parent_category)){
            NioApp.Toast('Invalid Parent Category', 'error', {position: 'top-right'});
            return false;
        }
        // return false;
        if (name === '' || slug === '') {
            NioApp.Toast('Fields cannot be null', 'info', {position: 'top-right'});
            return false;
        }
        $.ajax({
            method: 'POST',
            url: '{{ url('admin-dashboard/template-category/save') }}',
            dataType: 'json',
            data: {
                    name : name,
                    slug : slug,
                    id : id,
                    parent_category : parent_category,
                    _token: '{{csrf_token()}}',
                },
            success: function(response) {
                console.log(response);
                    $('#id').val('');
                    $('#name').val('');
                    $('#slug').val('');
                    $('.add-new').addClass('d-none');
                    $('#button_value').html('Add');
                NioApp.Toast(response, 'info', {position: 'top-right'});
                $("#table").load(location.href + " #table");
                $("#form-data").load(location.href + " #form-data");
                // location.reload();
                $('#parent_category').prop('disabled',false); 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var errors = jqXHR.responseJSON.errors;
                for (var fieldName in errors) {
                    if (errors.hasOwnProperty(fieldName)) {
                        var errorMessages = errors[fieldName];

                        errorMessages.forEach(function(errorMessage) {
                            // console.log(errorMessage);
                            NioApp.Toast(errorMessage, 'error', {
                                position: 'top-right'
                            });
                        });
                    }
                }
            }
        });
   
    });
$(document).ready(function() {
    $("body").delegate(".edit-category", "click", function (e) {
        $('#addnewcard').removeClass('d-none');
        $('#addnew').hide();
            id = $(this).attr('data-id');
            name = $(this).attr('data-name');
            slug = $(this).attr('data-slug');
            parent_category = $(this).attr('data-parent');
            console.log(parent_category);
            $('#id').val(id);
            $('#name').val(name);
            $('#slug').val(slug);
            // $('#parent_category').val(parent_category);
            $('#parent_category option').each(function() {
                if (parseInt($(this).val()) == parseInt(parent_category)) {
                   
                    $(this).prop('selected', true);
                    if(parseInt($(this).val()) == 0){
                        $('#parent_category').prop('disabled',false);  
                      $('.ParentCategory').each(function() {
                        if(parseInt($(this).attr('data-id')) == parseInt(id)){
                            $('#parent_category').prop('disabled',true);
                        }
                        
                      });
                    }else{
                        $('#parent_category').prop('disabled',false);  
                    }
                }
            });
          $('#button_value').html('update');
          $('#add_new').removeClass('d-none');
          window.scrollTo(0, 0);
            
    });
    $("body").delegate(".add-new", "click", function (e) {
            $('#id').val('');
            $('#name').val('');
            $('#slug').val('');
            $(this).addClass('d-none');
            $('#button_value').html('Add');
            $('#parent_category').prop('disabled',false); 
            
    });
    $("body").delegate(".remove-category", "click", function (e) {
        Swal.fire({
            title: "If you delete this category, all of its child categories will also be deleted.",
            showCancelButton: true,
            confirmButtonText: 'yes',
            confirmButtonColor: '#008000',
            cancelButtonText: 'no',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                id = $(this).attr('data-id');
            $.ajax({
                method: 'POST',
                url: '{{ url('admin-dashboard/template-category/remove') }}',
                dataType: 'json',
                data: {
                        id : id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        // console.log(response);
                        NioApp.Toast(response, 'info', {position: 'top-right'});
                        $("#table").load(location.href + " #table");
                        $("#form-data").load(location.href + " #form-data");
                    }
            });
            }
        });
           
    });
});
</script>
<script>
    $('#addnew').click(function(){
        $('#addnewcard').removeClass('d-none');
        $(this).hide();
        $('#parent_category').prop('disabled',false); 
       
    });
     $('.close').click(function(){
            $('#addnewcard').addClass('d-none');
            $('#addnew').show();
            $('#parent_category').prop('disabled',false); 
        });
</script>

@endsection