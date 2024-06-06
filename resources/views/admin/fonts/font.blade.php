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
               <form action="{{ url('admin-dashboard/font-addProcc') }}" class="form-validate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                         <div class="form-group">
                              <label class="form-label" for="name">Font Name</label>
                              <sup>@error('name')
                                   <div class="error text-danger">{{ $message }}</div>
                              @enderror</sup>
                              <div class="form-control-wrap">
                                   <input type="text" class="form-control" id="name" name="name" required/>
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
                                   <input type="file" class="form-control" name="file" id="file" accept=".woff, .woff2" required/>
                              </div>
                         </div>
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

@endsection