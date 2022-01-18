@extends("layouts.student")
@section("title", "Payment Form")

@section('css')
    <style>
        .extra_fee
        {
            font-size: 16px;
        }
    </style>
@endsection 

@section('content')
		<!--Tab / Active Tab-->
		<div class="tab active-tab" id="edit-profile">
			<div class="content">
				<!-- Title Box -->
				<!-- Profile Form -->
				<section class="student-profile-section p-4 bg-white">
					<div class="styled-form">
						<form action="{{route('student.payment.save')}}" method="POST" id="payment-form" class=" text-center">
                            @csrf
							<div class="row">
								<div class="col-lg-3 col-md-3"></div>
								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<h5 class="text-center card_heading">Card details</h5>
									<p class="text-dark text-center mb-0">Pay teacher fee of <span class="website_currency_code font-weight-bold">USD</span><span class="website_amount_html_usd font-weight-bold" amount-usd="{{ $t_req->amount ?? '0' }}">{{ $t_req->amount ?? '0' }}</span></p>
		                            <p class="text text-danger text-center">
                                      <small>Processing fee: <span class="website_currency_code font-weight-bold">USD</span><span class="website_amount_html_usd font-weight-bold extra_fee"  amount-usd="{{ $extra_fee ?? '0' }}">{{ $extra_fee ?? '0' }}</span></small>  
                                    </p>
                                        <input id="card-holder-name" type="text" name="name" placeholder="Card Holder Name" autocomplete="off">
			                            <div id="card-element" class="mt-3"></div>
			                            <div id="card-errors" role="alert"></div>

			                            <button type="submit" class="btn btn-primary mt-5" id="purchase-btn">Payment</button>
			                        
								</div>
								<div class="col-lg-3 col-md-3"></div>
							</div>
						</form>
					</div>
				</section>
					
			</div>
		</div>
@endsection
@section('js')
	<script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function () {
            // Create a Stripe client.
            var stripe = Stripe("{{ env('STRIPE_KEY') }}");

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                iconColor: '#666EE8',
                color: '#31325F',
                lineHeight: '40px',
                fontWeight: 300,
                fontFamily: 'Helvetica Neue',
                fontSize: '15px',

                '::placeholder': {
                  color: '#CFD7E0',
                },
              },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style, hidePostCode:true});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable The submit button on click
                document.getElementById('purchase-btn').disabled = true;

                var options = {
                    name: document.getElementById('card-holder-name').value,
                }
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Enable The submit button
                        document.getElementById('purchase-btn').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    </script>
@endsection
