@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Fonts</h4>   
        </div>
        <div>
        </div>
    </div>
     <div class="card card-bordered">
          <div class="card-inner">
               <form action="{{ url('admin-dashboard/font-editProcc') }}" id="myform" class="form-validate" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $font->id ?? '' }}">
                    <input type="hidden" name="type" id="type" value="">
                    
                    <div class="col-md-6">
                         <div class="form-group">
                              <label class="form-label" for="name">Font Name</label>
                              <sup>@error('name')
                                   <div class="error text-danger">{{ $message }}</div>
                              @enderror</sup>
                              <div class="form-control-wrap">
                                   <input type="text" class="form-control" id="name" name="name" value="{{ $font->name ?? '' }}" required/>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                              <label class="form-label" for="file">Font File</label>
                              <sup>@error('path')
                                   <div class="error text-danger">{{ $message }}</div>
                              @enderror</sup>
                              <!-- <p>{{ asset($font->path ?? '') }}</p> -->

                              <div class="form-control-wrap ">
                                   <input type="file" class="form-control" name="file" id="file" accept=".woff, .woff2"/>
                              </div>
                         </div>
                    </div>
                    
                    @if(isset($font->font_face))
                         @php 
                              $fontface = json_decode($font->font_face); 
                              $num = 0;
                         @endphp
                         @foreach($fontface as $key=>$val)
                         <div class="row" id="fface{{ $key ?? ''}}">
                              <div class="col-lg-12">
                                   <div class="d-flex">
                                        <div class="col-lg-3 p-3">
                                             <div class="form-group">
                                                  <label class="form-label" for="fontkey">Font Face</label>
                                                  <div class="form-control-wrap">
                                                       <input type="text" class="form-control" id="fontkey" value="{{ $val->key ?? '' }}" readonly>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-3 p-3">
                                             <div class="form-group">
                                                  <div class="text-end"><span class="removeface" key="{{ $key ?? '' }}" type="remove"><i class="fa fa-times"></i></span></div>
                                                  <div class="form-control-wrap">
                                                       <input type="text" class="form-control" id="fontvalue" value="{{ $val->value ?? '' }}" readonly>
                                                  </div>
                                             </div>     
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @php $num++; @endphp
                         @endforeach
                    @endif
                    <div id="add_new_div">

                    </div>
                    <br>
                    <div class="col-md-12">
                         <div class="form-group">
                              <button type="button" id="add_new" class="btn btn-primary">Add New</button>
                         </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                         <div class="form-group">
                              <button type="submit" class="btn btn-lg btn-primary">Update</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     $(document).ready(function(e){
          $('#add_new').on('click',function(){
               var html = `<div class="row">
                              <div class="col-lg-12">
                                   <div class="d-flex">
                                        <div class="col-lg-3 p-3">
                                             <div class="form-group">
                                                  <label class="form-label" for="fontkey">Font Face</label>
                                                  <div class="form-control-wrap">
                                                       <input type="text" class="form-control" id="fontkey" name="fontkey[]">
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-3 p-3">
                                             <div class="form-group">
                                                  <div class="text-end"><span class="remove"><i class="fa fa-times"></i></span></div>
                                                  <div class="form-control-wrap">
                                                       <input type="text" class="form-control" id="fontvalue" name="fontvalue[]"/>
                                                  </div>
                                             </div>     
                                        </div>
                                   </div>
                              </div>
                         </div>`;
               $('#add_new_div').append(html);
          });
          
          $(".removeface").on("click",function(){
               key = $(this).attr('key');
               type = $(this).attr('type');
               $('#type').val(type);
               $('#myform').append('<input type="hidden" name="key[]" id="key" value="'+key+'">');
               $('#fface'+key).remove();
          });

          $('body').delegate('.remove','click',function(){
               $(this).closest('.row').remove();
          })
     })
    
</script>

@endsection