@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Fonts</h4>   
        </div>
        <div>
        </div>
    </div>
     <div class="card card-bordered">
          <div class="card-inner">
               <form action="{{ url('admin-dashboard/font-addProcc') }}" id="font-form" class="form-validate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                         <div class="form-group">
                              <label class="form-label" for="name">Font Name</label>
                              <sup>@error('name')
                                   <div class="error text-danger">{{ $message }}</div>
                              @enderror</sup>
                              <div class="form-control-wrap">
                                   <input type="text" class="form-control" id="name" name="name"/>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                              <label class="form-label" for="file">Font File</label>
                              <sup>@error('path')
                                   <div class="error text-danger">{{ $message }}</div>
                              @enderror</sup>
                              <div class="form-control-wrap ">
                                   <input type="file" class="form-control" name="file" id="file" accept=".woff, .woff2"/>
                              </div>
                         </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                         <div class="form-group">
                              <button type="button" id="add_new" class="btn btn-primary">Add New</button>
                         </div>
                    </div>

                    <div id="add_new_div">
     
                    </div>
                    
                    <br>
                    <div class="col-md-12">
                         <div class="form-group">
                              <button type="submit" class="btn btn-lg btn-primary">Save</button>
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

          $('body').delegate('.remove','click',function(){
               $(this).closest('.row').remove();
          });

     })
    
</script>

@endsection