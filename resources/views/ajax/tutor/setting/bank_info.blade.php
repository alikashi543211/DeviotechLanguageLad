<section class="student-profile-section p-4 bg-white">
	<div class="styled-form">
	
		<!-- Profile Form -->
		<form method="post" action="{{ route('tutor.profile.update') }}" enctype="multipart/form-data">
			@csrf
			<div class="row clearfix">
				<div class="col-lg-6 col-md-6 col-sm-12 form-group">
					<label class="font-weight-bold">Account Name</label>
					<input type="text" name="name" placeholder="Name" value="{{ auth()->user()->name }}" required="">
					@error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 form-group">
					<label class="font-weight-bold">Bank Name</label>
					<input type="text" name="email" placeholder="Bank Name" value="{{ auth()->user()->email }}" required="">
					@error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 form-group">
					<label class="font-weight-bold">Account Number</label>
					<input type="text" name="country" placeholder="Country" required="" value="{{ tutor()->country }}">
					@error('country')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
					<button class="theme-btn btn-style-three" type="button" name="submit-form"><span class="txt">Save Change <i class="fa fa-angle-right"></i></span></button>
				</div>
				
			</div>
		</form>
			
	</div>
</section>	