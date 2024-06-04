@extends('front_layout.master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

<section class="mySavedDesignsSection py-5">
    <div class="container">
        <div class="myDesignWrap text-center mb-4">
            <h1 class="text-center">Your Masterpieces</h1>
        </div>

        <div class="row masterpiecescard">
            @if($templates->isNotEmpty())
                @foreach($templates as $template)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img id="templateImage" src="{{ asset('designImage/' . $template->image) }}" class="card-img-top canvasImageDisplay" alt="{{ $template->name }}">
                            <div class="card-body text-dark">
                                <h5 class="card-title text-dark">{{ $template->name ?? '' }}</h5>
                                <p class="card-text">{{ \Carbon\Carbon::parse($template->created_at)->format('m-d-Y h:i A') }}</p>
                                <p class="card-text">{{ $template->width ?? '' }}{{ $template->dimension ?? 'ft' }} x {{ $template->height ?? '' }}{{ $template->dimension ?? 'ft' }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="javascript:void(0);" data-image="{{ asset('designImage/' . $template->image) }}" class="btn btn-primary previewImageOfcanvas"><i class="fas fa-eye"></i></a>
                                <a href="{{ url('designtool/template/'.$template->id ?? '' ) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('designtool/template-delete/'.$template->id ?? '' ) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">No Designs Found</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="imageModalLabel">Design Preview</h5>
                <button type="button" class="btn btn-close clsModelBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img id="modalImage" src="" class="img-fluid" alt="Design Image">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.previewImageOfcanvas').on('click', function() {
            var imageUrl = $(this).data('image');
            $('#modalImage').attr('src', imageUrl);
            $('#imageModal').modal('show');
        });
        $('.clsModelBtn').on('click', function() {
            $('#imageModal').modal('hide');
        });
    });
</script>

@endsection
