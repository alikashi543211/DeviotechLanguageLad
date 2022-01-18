<section class="student-profile-section p-4 bg-white">
	<div class="styled-form">
		<form method="post" action="{{ route('student.profile.save') }}" enctype="multipart/form-data" class="general_info_form">
			@csrf
			<input type="hidden" name="id" value="auth()->user()->id">
			<div class="row clearfix">
				<!-- <div class="col-lg-4 col-md-4 col-sm-12"></div> -->
				<div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12 mb-3 text-center">
                            <div class="image_input_div">
                                <label for="file_input" class="image_label">
                                    <img src="{{ asset(student()->image ?? 'default.png') }}" id="flag_imgg">
                                    <div class="upload-icon">
                                       <img src="{{ asset('camera.png') }}" class="camera_layer">
                                    </div>
                                </label>
                                <input style="display:none;" type="file" name="image" class="@error('image') error @enderror" accept="image/*" id="file_input">
                            </div>
                                <label>Upload Your Profile Image*</label>
                                <span class="invalid-feedback">
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            
                        </div>
                        <div class="col-lg-4 col-md-4">
                        </div>
                    </div>
                </div>

				<!-- Form Group -->
				<div class="form-group col-lg-12 col-md-12 col-sm-12">
					<label>Native language</label>
					<select class="valid-control" name="native_language">
						<option value="">Choose</option>
						@foreach(language_dropdown() as $item)
	                        <option value="{{ $item }}">{{ $item }}</option>
	                    @endforeach
					</select>
					<span class="invalid-feedback">
                        @error('native_language')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>

				<!-- Form Group -->
				<div class="form-group col-lg-6 col-md-12 col-sm-12">
					<label>Name and surname</label>
					<input type="text" name="name" class="@error('name') is-invalid @enderror text_only" placeholder="Name and surname">
					<span class="invalid-feedback">
                        @error('native_language')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>

				<!-- Form Group -->
				<div class="form-group col-lg-6 col-md-12 col-sm-12">
					<label>Email</label>
					<input type="email" name="email" readonly class="@error('email') is-invalid @enderror valid-control" placeholder="Email">
					<span class="invalid-feedback">
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>

				<!-- Form Group -->
				<div class="form-group col-lg-6 col-md-12 col-sm-12">
					<label>Country</label>
					<select name="country">
                        <option value="">Choose</option>
                        @foreach(countries() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">
                        @error('country')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>

				<!-- Form Group -->
				<div class="form-group col-lg-6 col-md-12 col-sm-12">
					<label>Lives in</label>
					<input type="text" name="lives_in" class="@error('lives_in') is-invalid @enderror valid-control" placeholder="City, Country" value="">
					<span class="invalid-feedback">
                        @error('lives_in')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
				</div>

				<!-- Form Group -->
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label>Timezone*</label>
                    <select class="timezone_list" name="timezone">
                        <option value="">Choose</option>
                        @foreach(time_zone_list() as $item)
                            <option value="{{ $item->value }}" @if($item->value == auth_user()->timezone) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">
                        @error('timezone')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>

				<div class="col-lg-1 col-md-1"></div>
				<div class="col-lg-10 col-md-10 col-sm-12 speaking_block bg_theme p-4">
					<div class="row px-4" id="speaking-row-1">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h4 class="text text-danger pull-right speaking-item-del d-none del-speaking">
								<i class="fa fa-times"></i>
							</h4>
						</div> 
						<div class="form-group col-lg-6 col-md-12 col-sm-12">
							<label>Languages I speak</label>
							<select name="language[0]" class="valid-control language_input" required="true">
								<option value="">Choose</option>
								@foreach(language_dropdown() as $item)
		                            <option value="{{ $item }}">{{ $item }}</option>
		                        @endforeach
							</select>
							<span class="invalid-feedback">
		                        @error('language')
		                            <strong>{{ $message }}</strong>
		                        @enderror
                			</span>
						</div>
						<div class="form-group col-lg-6 col-md-12 col-sm-12">
							<label>Level</label>
							<select name="level[0]" class="valid-control level_input" required="true">
								<option value="">Choose</option>
								<option>A1: Begineer</option>
								<option>A2: Elementry</option>
								<option>B1: Intermediate</option>
								<option>B2: Upper Intermediate</option>
								<option>C1: Advanced</option>
								<option>C2: Proficient</option>
								<option>Native</option>
							</select>
							<span class="invalid-feedback">
		                        @error('level')
		                            <strong>{{ $message }}</strong>
		                        @enderror
                			</span>
						</div>

					</div>
				</div>
				<div class="col-lg-1 col-md-1"></div>
				<div class="col-lg-1 col-md-1"></div>
				<div class="col-lg-10 col-md-10 col-sm-12 bg_theme p-4 pt-0">
					<a class="pull-right speaking_add_more_btn">Add more +</a>
				</div>
				<div class="col-lg-1 col-md-1"></div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 text-right mt-5">
					<button type="submit" class="theme-btn btn-style-three"><span class="txt">Save Change<i class="fa fa-angle-right"></i></span></button>
				</div>
				
			</div>
			
		</form>
    </div>
</section>