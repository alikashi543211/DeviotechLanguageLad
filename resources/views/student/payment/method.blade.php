@extends("layouts.student")
@section("title", "Payment Method")

@section('css')
    <style>
        .payment_methods img
        {
            width: 120px;
            min-height: 120px;
        }
        .payment_methods .card-body
        {
            min-height: 200px !important;
        }
    </style>
@endsection 

@section('content')
		<!--Tab / Active Tab-->
		<div class="tab active-tab" id="edit-profile">
			<div class="content">
				<!-- Profile Form -->
				<section class="student-profile-section p-5 bg-white payment_method_section">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h5 class="mb-3">Select Payment Method</h5>
                        </div>
                    </div>
                    <div class="row payment_methods">
                        <div class="col-lg-4 col-md-4">
                            <div class="card  mb-5">
                                <div class="card-body text-center">
                                    <img src="{{ asset('front/assets/') }}/images/paypal.svg" class="img-fluid paypal_img">
                                    <a href="{{ route('student.payment.paypal.form') }}">
                                        <button type="button" class="btn btn-primary shadow rounded-pill mt-5" id="purchase-btn">Pay With Paypal</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card  mb-5">
                                <div class="card-body text-center">
                                    <img src="{{ asset('front/assets/') }}/images/stripe.svg" class="img-fluid stripe_img">
                                    <a href="{{ route('student.payment.form') }}">
                                        <button type="button" class="btn btn-primary shadow rounded-pill mt-5" id="purchase-btn">Pay With Stripe</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card  mb-5">
                                <div class="card-body text-center">
                                    <h3 class="wallet_text">Wallet <br><span class="website_currency_code">USD</span><span class="website_amount_html_usd" amount-usd="{{ student()->wallet_amount ?? '0' }}">{{ student()->wallet_amount ?? '0' }}</span><small></small></h3>
                                    <a href="{{ route('student.payment.wallet') }}">
                                        <button type="button" class="btn btn-primary shadow rounded-pill mt-5" id="purchase-btn">Pay With Wallet</button>
                                    </a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
				</section>
			</div>
		</div>
@endsection
@section('js')

@endsection
