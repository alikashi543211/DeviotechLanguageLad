<section class="student-profile-section p-4 bg-white">
	<div class="styled-form">
	
		<!-- Profile Form -->
		<form method="post" action="{{ route('tutor.profile.password.update') }}" enctype="multipart/form-data" class="change_password_form">
			@csrf
			<div class="row clearfix">
				
				<div class="col-lg-6 col-md-6 col-sm-12 form-group">
					<label class="font-weight-bold">Old Password</label>
					<input type="password" name="old_password" placeholder="Old Password" value="">
					<span class="invalid-feedback">
                    	@error('old_password')
                        	<strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 form-group">
					<label class="font-weight-bold">New Password</label>
					<input type="password" name="password" placeholder="New Password" value="">
					<span class="invalid-feedback">
                    	@error('password')
                        	<strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 form-group">
					<label class="font-weight-bold">Confirm Password</label>
					<input type="password" name="password_confirmation" id="user-password" placeholder="Confirm Password" value="">
                    <span class="invalid-feedback">
                    	@error('password_confirmation')
                        	<strong>{{ $message }}</strong>
                        @enderror
                    </span>
                    
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
					<button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Save Change <i class="fa fa-angle-right"></i></span></button>
				</div>
				
			</div>
		</form>
			
	</div>
</section>