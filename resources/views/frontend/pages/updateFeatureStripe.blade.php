
@extends('frontend.layout.main')
@section('main')
    <!--Breadcrumb-->
    <div>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Checkout</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->
    <section class="sptb">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payment Info</h3>
                        </div>
                        <div class="card-body">
                            <form id="payment-form">
                                <div class="form-group">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $data['name'] }}" class="form-control" id="name" name="name" readonly required>
                                 </div>
                                <div class="form-group">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" value="{{ $data['email'] }}" class="form-control" id="email" name="email" readonly required>
                                 </div>
                                <div class="form-group">
                                    <label class="form-label">Amount <span class="text-danger">*</span></label>
                                    <input type="text" value="$ {{ $data['amount'] }}" class="form-control" id="amount" name="amount" readonly required>
                                 </div>
                                <div class="form-group">
                                    <label class="form-label">Card Info <span class="text-danger">*</span></label>
                                    <div id="card-element" class="form-control" style="padding-top: 10px;"></div>
                                 </div>
                                <div class="form-group">
                                    <button id="submit" class="btn btn-primary paynow">Pay Now</button>
                                </div>
                                <div id="card-errors" style="color: red;"></div>
                                <div id="card-thank" style="color: green;"></div>
                                <div id="card-message" style="color: green;"></div>
                                <div id="card-success" style="color: green;font-weight:bolder"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection

@push('custom-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        @php
            $stripeKey = \App\Models\StripeKey::first();
        @endphp
        $('#card-success').text('');
        $('#card-errors').text('');
        var stripe = Stripe('{{ $stripeKey->secret }}');
        var elements = stripe.elements();
        $('#submit').prop('disabled', true);
        // Set up Stripe.js and Elements to use in checkout form
        var style = {
        base: {
            color: "#32325d",
        }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");


        card.addEventListener('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
            $('#submit').prop('disabled', true);

        } else {
            displayError.textContent = '';
            $('#submit').prop('disabled', false);

        }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
        $('.loading').css('display','block');

        ev.preventDefault();
        //cardnumber,exp-date,cvc
        stripe.confirmCardPayment('{{ $data["client_secret"] }}', {
            payment_method: {
            card: card,
            billing_details: {
                name: '{{ $data["name"] }}',
                email: '{{ $data["email"] }}'
            }
            },
            setup_future_usage: 'off_session'
        }).then(function(result) {
            $('.loading').css('display','none');

            if (result.error) {

            $('#card-errors').text(result.error.message);

            } else {
            if (result.paymentIntent.status === 'succeeded') {


                $('#card-success').text("payment successfully completed.");
                setTimeout(
                        function(){ window.location.href = "{{route('checkout.updateFeature.success', $data['id'])}}";
                        $('.paynow').prop("disabled", true);
                    }, 2000);
            }
            return false;
            }
        });
        });
    </script>
@endpush



