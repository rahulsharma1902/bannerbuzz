@extends('user_dashboard_layout.master')
@section('content')


    <div class="col-lg-9">
        <div class="ryt_side_contnt">
            <div class="user_main_info">
                <div class="user_info">
                    <div class="user_img">
                        <span><i class="fa-solid fa-user"></i></span>
                    </div>
                    <div class="user_dtal">
                        <h1>Hey there, {{ auth()->user()->first_name ?? '' }} {{ auth()->user()->last_name ?? '' }}</h1>
                        <p class="subItile"><a href="#">{{ auth()->user()->email ?? '' }}</a> | <a href="{{ route('logout') }}" class="lg_out">Log out</a></p>
                    </div>
                </div>
                <div class="edit_detail">
                    <span>Edit</span>
                    <span><i class="fa-solid fa-pencil"></i></span>
                </div>
            </div>
            <div class="profl_tabs addres_tabs">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active position-relative" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            My Saved Card
                        </button>
                    </li>
                </ul>
                <div class="tab-contentp-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="seved_cards">
                            <div class="row">
                                @if(isset($cards) && $cards != null  && !empty($cards))
                                    @foreach($cards as $card)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="savd_card_content">
                                                <div class="card_oner">
                                                    <div class="card_img">
                                                        <img src="{{ asset('front/img/'.$card['brand'].'.png') }}" class="img-fluid" alt="" />
                                                    </div>
                                                    <div class="card_detail">
                                                        <p>
                                                            <span class="hldr_name">Name</span>
                                                            <span class="hldr_name">{{ $card['holder_name'] }}</span>
                                                        </p>
                                                        <p>
                                                            <span>Card Number</span>
                                                            <span>**** **** **** {{ $card['last4'] }}</span>
                                                        </p>
                                                        <p>
                                                            <span>Exp. Date</span>
                                                            <span>{{ $card['exp_month'] }}/{{ $card['exp_year'] }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="apply_cards">
                                                    <!-- <div class="apply_cards_btn aply_btn">
                                                        <a href="#" class="sml_text">Apply Now</a>
                                                    </div> -->
                                                    <div class="apply_cards_btn remv_btn">
                                                        <a href="{{ route('user.remove.card',['card_id' => $card['id']]) }}" class="sml_text">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="btnSet bttn_ryt">
                            <button type="submit" class="btn sml_text" data-bs-toggle="modal" data-bs-target="#myModal">
                                Add New Card
                                <span class="lft_icn"><i class="fa-solid fa-plus"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row border-0 custom-mx checkoutFormWrap" id="payment_details">

                    <div class="col-lg-12 custom-px">
                        <input type="text" class="form-control" id ="card_holder_name"
                            placeholder="Name On Card" name="name_on_card" data-required="required">
                        <span class="text-danger validation_error" error-for="name_on_card"></span>
                    </div>

                    <div class="col-lg-12 custom-px" >
                        <div id="card-number"></div> 
                        <span class="text-danger validation_error" id="card_number_error" error-for="card_number"></span>
                    </div>
                    <div class="exp-div-wrap">
                        <div class="col-lg-6 custom-px" > 
                            <div id="card-expiry"></div> 
                            <span class="text-danger validation_error" id="expiration_date_error" error-for="expiration_date"></span>
                        </div>

                        <div class="col-lg-6 custom-px" > 
                            <div id="card-cvc"></div> 
                            <span class="text-danger validation_error" id="security_code_error" error-for="security_code"></span>
                        </div>
                    </div>
                </div>
                <span id="card-error-message" class="text-danger" ></span>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="save_card">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function () {
            // :::::::: Mount Stripe Card ::::::::: //
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();

            var cardNumber = elements.create('cardNumber',{
                showIcon: true,
            });

            cardNumber.mount('#card-number');

            var cardExpiry = elements.create('cardExpiry');
            cardExpiry.mount('#card-expiry');

            var cardCvc = elements.create('cardCvc');
            cardCvc.mount('#card-cvc');

            $('#save_card').on('click', async function(){

                $('#overlay').show();
                cardHolderName = $('#card_holder_name').val();
                secret_value = "{{ $client_secret }}";
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    secret_value, {
                        payment_method: {
                            card: cardNumber,
                            billing_details: {
                                name: cardHolderName
                            }   
                        }
                    }
                ) 
               
                if(error){
                    $('#overlay').hide();
                    if(error.message != ''){
                        $("#card-error-message").html(error.message);
                        
                    }
                    action = false;
                }else{

                    $.ajax({
                        url: "{{ route('user.add.card') }}", 
                        type: "POST",
                        data: {
                            token : setupIntent.payment_method,
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if(response == true) {
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#overlay').hide();
                            console.error(xhr.responseText); 
                            alert('Error occurred while processing data');
                        }
                    });

                }
            });
        });
    </script>
@endsection