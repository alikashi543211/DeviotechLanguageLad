@extends("layouts.front")
@section("title", "Register")
@section("content")
    
    <!-- Register Section -->
    <section class="login-section">
        <div class="auto-container">
            <div class="login-box">
                
                <!-- Title Box -->
                <div class="title-box">
                    <h2>Register As Student</h2>
                    <div class="text"><span class="theme_color">Welcome!</span> Please enter your information to register yourself.</div>
                </div>
                
                <!-- Login Form -->
                <div class="styled-form">
                    <form method="post" action="{{ route('register') }}" enctype="multipart/form-data" class="student-register-form">
                        @csrf
                        <input type="hidden" name="role" value="student">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-4 col-sm-12 mb-3 text-center">
                                        <div class="image_input_div">
                                            <label for="file_input" class="image_label">
                                                <img src="{{ asset('default.png') }}" id="flag_imgg">
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
                                    <div class="col-lg-3 col-md-3">
                                    </div>
                                </div>
                            </div>
                            <!-- Form Group -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Name and surname*</label>
                                <input type="text" name="name" class="@error('name') error @enderror text_only" placeholder="Name and surname">
                                <span class="invalid-feedback" role="alert">
                                    @error('name')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Email*</label>
                                <input type="email" name="email" class="@error('email') error @enderror" placeholder="Email">
                                <span class="invalid-feedback" role="alert">
                                    @error('email')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                            
                            <!-- Form Group -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Password</label>
                                <span class="eye-icon flaticon-eye toggle-password-input password-eye"></span>
                                <input type="password" name="password" minlength="8" class="@error('password') error @enderror pass_input" value="" placeholder="Password" autocomplete="new-password" id="user-password">
                                <span class="invalid-feedback" role="alert">
                                    @error('password')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Confirm Password</label>
                                <span class="eye-icon flaticon-eye toggle-confirm-password-input password-eye"></span>
                                <input type="password" id="user-confirm-password" name="password_confirmation" class="@error('password_confirmation') error @enderror confirm_pass_input" value="" placeholder="Confirm Password" autocomplete="new-password">
                                <span class="invalid-feedback" role="alert">
                                    @error('password_confirmation')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Timezone*</label>
                                <select class="timezone_list" name="timezone">
                                    <option value="">Choose</option>
                                    @foreach(time_zone_list() as $item)
                                        <option value="{{ $item->value }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback">
                                    @error('timezone')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="row clearfix">
                                    <div class="column col-lg-12 col-md-12 col-sm-12">
                                        <div class="check-box">
                                            <input type="checkbox" name="terms_conditions" id="type-4" > 
                                            <label for="type-4">I agree the user agreement and <a href="{{ route('terms') }}" target="_blank">Terms &amp; Conditions</a></label>
                                            <span class="invalid-feedback" role="alert">
                                                @error('terms_conditions')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="theme-btn btn-style-three sign-up-btn"><span class="txt">Sign Up <i class="fa fa-angle-right"></i></span></button>
                              
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="users">Already have an account? <a href="{{ route('login') }}">Sign In</a></div>
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Login Section -->
@endsection

@section('js')
    <script>
        
        $.validator.setDefaults({
            ignore: []
        });
        
        $(".student-register-form").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    regex: "(?=[A-Za-z0-9@#$%^&+!=]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,}).*$",
                },
                password_confirmation: {
                    required: true,
                    equalTo : "#user-password"
                },
                timezone: {
                    required: true,
                },
                terms_conditions : {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Enter your name',
                    regex: 'Name must have at least two letters',
                },
                email: {
                    required: 'Enter your email address',
                    email: 'Enter a valid email address',
                },
                password: {
                    required: 'Enter your password',
                    regex: 'At Least 8 Characters, One Capital Letter, One Lower Case Letter, One Digit',
                },
                password_confirmation: {
                    required: 'Re-enter your password',
                    equalTo: 'Confirm your password',
                },
                timezone: {
                    required: 'Select your timezone',
                },
                terms_conditions: {
                    required: 'You must agree terms and conditions.',
                },

            },
            errorPlacement: function(error, element) {
                 $(element).addClass('error');
                 $(element).closest('.form-group').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
            },
            // set this class to error-labels to indicate valid fields
            success: function(label) {
                // set &nbsp; as text for IE
                label.html("&nbsp;").addClass("checked");
            },
            highlight: function(element, errorClass) {
                $(element).parent().next().find("." + errorClass).removeClass("checked");
            },
            unhighlight: function (element) {
                $(element).removeClass('error');
                $(element).closest('.form-group').find('.invalid-feedback').html('');
            }
        });

        // Javascript Image Upload
        function readURL(input) 
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#flag_imgg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $(document).on("change", "#file_input", function() {
           
            readURL(this);
        });

    </script>
@endsection