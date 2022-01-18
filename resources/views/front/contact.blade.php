@extends("layouts.front")
@section("title", "Contact")

@section('css')
	<style>
		.image{
			background:none !important;
		}
		.heading_two{
			position: relative;
		    color: #03382e;
		    font-weight: 700;
		    padding: 15px 7px;
		    border-bottom: 1px solid #f0f5fb;
		}
	</style>
@endsection

@section('content')

	<!-- News Section -->
	<section class="intro-section-two">
		<div class="auto-container">
			<div class="row clearfix">
				<div class="col-lg-12">
					<h2 class="heading_two">Contact Us</h2>
				</div>
			</div>
			<div class="row clearfix">
				<!-- Title Column -->
				<div class="title-column col-lg-12 col-md-12 col-sm-12 bg-white shadow">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="text"></div>
						</div>
						<div class="styled-form">
					        <form method="post" action="{{ route('contact.mail') }}" enctype="multipart/form-data" class="validate_my_form">
					            @csrf
					            <div class="row">
					            	<!-- Form Group -->
					                <div class="form-group col-lg-6 col-md-12 col-sm-12">
					                    <label>Name*</label>
					                    <input type="text" name="name" class="@error('name') error @enderror" placeholder="Name" required>
					                    <span class="invalid-feedback">
					                        @error('name')
					                            <strong>{{ $message }}</strong>
					                        @enderror
					                    </span>
					                </div>
					                
					                <!-- Form Group -->
					                <div class="form-group col-lg-6 col-md-12 col-sm-12">
					                    <label>Email*</label>
					                    <input type="email" name="email" class="@error('email') error @enderror" placeholder="Email" required >
					                    <span class="invalid-feedback">
					                        @error('email')
					                            <strong>{{ $message }}</strong>
					                        @enderror
					                    </span>
					                </div>

					                <!-- Form Group -->
					                <div class="form-group col-lg-6 col-md-12 col-sm-12">
					                    <label>Contact No*</label>
					                    <input type="text" name="contact_no" class="@error('contact_no') error @enderror numbers" placeholder="Contact No" required>
					                    <span class="invalid-feedback">
					                        @error('contact_no')
					                            <strong>{{ $message }}</strong>
					                        @enderror
					                    </span>
					                </div>

					                <!-- Form Group -->
					                <div class="form-group col-lg-6 col-md-12 col-sm-12">
					                    <label>Subject*</label>
					                    <input type="text" name="subject" class="@error('subject') error @enderror" placeholder="Subject" required>
					                    <span class="invalid-feedback">
					                        @error('subject')
					                            <strong>{{ $message }}</strong>
					                        @enderror
					                    </span>
					                </div>

					                <!-- Form Group -->
					                <div class="form-group col-lg-12 col-md-12 col-sm-12">
					                    <label>Message*</label>
					                    <textarea name="message" class="@error('message') error @enderror" placeholder="Write your message here" required></textarea>
					                    <span class="invalid-feedback">
					                        @error('message')
					                            <strong>{{ $message }}</strong>
					                        @enderror
					                    </span>
					                </div>
					                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center mt-5">
					                    <button type="submit" class="theme-btn btn-style-three save-general-btn"><span class="txt">Submit <i class="fa fa-angle-right"></i></span></button>
					                    
					                </div>
					            </div>  
			            	</form>
			            </div>
					            
					        
				    </div>
				</div>
			</div>
		</div>
	</section>
@endsection