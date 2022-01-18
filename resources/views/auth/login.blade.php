@extends("layouts.front")
@section("title", "Login")
@section("content")
    
    <!-- Login Section -->
    <section class="login-section">
        <div class="auto-container">
            <div class="login-box">
                
                <!-- Title Box -->
                <div class="title-box">
                    <h2>Login</h2>
                    <div class="text"><span class="theme_color">Welcome!</span> Please confirm that you are visiting</div>
                </div>
                
                <!-- Login Form -->
                <div class="styled-form">
                    <form method="POST" action="{{ route('front.login') }}" class="login-form">
                        @csrf
                        <input type="hidden" name="b" value="{{ request()->b }}">
                        <input type="hidden" name="book" value="{{ request()->book }}">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                            <span class="invalid-feedback" role="alert">
                                @error('email')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <span class="eye-icon flaticon-eye toggle-password-input password-eye"></span>
                            <input type="password" name="password" value="" class="pass_input" placeholder="Password">
                            <span class="invalid-feedback" role="alert">
                                @error('password')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="check-box">
                                        <input type="checkbox" name="remember-password" id="type-1"> 
                                        <label for="type-1">Remember Password</label>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('password.request') }}" class="forgot">Forget Password?</a> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="theme-btn btn-style-three"><span class="txt">Login <i class="fa fa-angle-right"></i></span></button>
                        </div>
                        <div class="form-group">
                            <div class="users">New User? <a href="{{ route('register') }}">Sign Up</a></div>
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
        $(".login-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: 'Enter your email address',
                },
                password: {
                    required: 'Enter your password',
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

        on_submit_language_lad_login_form();
    </script>
@endsection
