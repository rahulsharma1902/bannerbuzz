@extends('front_layout.master')
@section('content')

<section class="get_in_sec">

    <div class="container">
        <div class="get-in-content">
            <div class="get-lft-info">
                <div class="data-wrap">
                    <div class="order-received-div">
                        <div class="img-wrap">
                            <img src="{{ asset('Site_Images/Group 35177.png') }}" class="thikmark-img" alt="">
                        </div>
                        <div class="text-wrap">
                            <h3>Your order has been received</h3>
                            <h6>Thank you for your purchase!</h6>
                            <p >Your order is: {{ $order_num ?? '' }}</p>
                            <p>You will receive an order confirmation email with details of your order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thank you!</h4>
            </div>
            <div class="modal-body">
                <p>Our designer will contact you within the next 24 hours to discuss your design needs and preferences.</p>                     
            </div>    
        </div>
    </div>
</div>

<script>
    @if($isHireDesigner === true)
        $(document).ready(function(){
            swal("Thank you", "Our designer will contact you within the next 24 hours to discuss your design needs and preferences.", "success", {
                button: "Ok",
            });
        }); 
    @endif
</script>
@endsection