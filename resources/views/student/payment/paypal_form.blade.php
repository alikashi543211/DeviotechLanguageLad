@extends("layouts.student")
@section("title", "Payment Form")

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
				<!-- Profile Form -->
				<section class="student-profile-section p-5 bg-white">
                    <div class="row payment_methods">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="text-center card_heading">Card details</h5>
                                </div>
                            </div>
                            <div class="styled-form">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3"></div>
                                    <div class="col-lg-6 col-md-6">
                                        @if ($message = Session::get('success'))
                                            <div class="w3-panel w3-green w3-display-container">
                                                <span onclick="this.parentElement.style.display='none'"
                                                        class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                                                <p>{!! $message !!}</p>
                                            </div>
                                            <?php Session::forget('success');?>
                                        @endif

                                        @if ($message = Session::get('error'))
                                            <div class="w3-panel w3-red w3-display-container">
                                                <span onclick="this.parentElement.style.display='none'"
                                                        class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                                                <p>{!! $message !!}</p>
                                            </div>
                                            <?php Session::forget('error');?>
                                        @endif
                                        <form method="GET" id="payment-form" action="{{route('student.payment.paypal.make.checkout')}}">
                                            
                                            <p class="text-dark text-center mb-0">Pay teacher fee of <span class="website_currency_code font-weight-bold">USD</span><span class="website_amount_html_usd font-weight-bold" amount-usd="{{ $t_req->amount ?? '0' }}">{{ $t_req->amount ?? '0' }}</span></span></p>
                                            <p class="text text-danger text-center">
                                              <small>Processing fee: <span class="website_currency_code font-weight-bold">USD</span><span class="website_amount_html_usd font-weight-bold extra_fee"  amount-usd="{{ $extra_fee ?? '0' }}">{{ $extra_fee ?? '0' }}</span></small>  
                                            </p>
                                            <p class="form-group mb-0">
                                                <input name="amount" type="text" placeholder="Payment Here.." value="{{ $t_req->amount ?? '' }}" readonly>
                                                <input type="hidden" name="total_amount" value="{{ $rate ?? '0' }}">
                                            </p>
                                                <p class="text-center"><button type="submit" class="btn btn-primary shadow rounded-pill mt-5">Pay with PayPal</button></p>
                                        </form>
                                    </div>
                                    <div class="col-lg-3 col-md-3"></div>
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
