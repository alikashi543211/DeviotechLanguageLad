@extends("layouts.front")
@section("title", "Reset Password")
@section("content")
    
    <!-- Register Section -->
    <section class="login-section">
        <div class="auto-container">
            <div class="login-box">
                
                <!-- Title Box -->
                <div class="title-box">
                    <h2>Reset Password</h2>
                </div>
                
                <!-- Login Form -->
                <div class="styled-form">
                    <form method="post" action="{{ route('password.update') }}" enctype="multipart/form-data" class="validate_my_form">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="row clearfix">

                            <!-- Form Group -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Email*</label>
                                <input type="email" name="email" class="@error('email') error @enderror" placeholder="Email" value="{{ old('email', $request->email) }}">
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
                                <input type="password" name="password" class="@error('password') error @enderror pass_input" value="" placeholder="Password" autocomplete="new-password">
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
                                <input type="password" id="user-password" name="password_confirmation" class="@error('password_confirmation') error @enderror confirm_pass_input" value="" placeholder="Confirm Password" autocomplete="new-password">
                                <span class="invalid-feedback" role="alert">
                                    @error('password_confirmation')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="theme-btn btn-style-three sign-up-btn"><span class="txt">Reset Password <i class="fa fa-angle-right"></i></span></button>
                              
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
        
        $(".validate_my_form").validate({
            rules: {
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
            },
            messages: {
                email: {
                    required: 'Enter your email address',
                    email: 'Enter a valid email address',
                },
                password: {
                    required: 'Enter your password',
                    regex: 'Must Be 8 Characters Contains At Least One Capital Letter, One Lower Case Letter, One Digit',
                },
                password_confirmation: {
                    required: 'Re-enter your password',
                    equalTo: 'Confirm your password',
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