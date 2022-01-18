@extends("layouts.front")
@section("title", "Forgot Password")
@section("content")
    
    <!-- Login Section -->
    <section class="login-section">
        <div class="auto-container">
            <div class="login-box">
                
                <!-- Title Box -->
                <div class="title-box">
                    <h2>Forgot Password</h2>
                    @if (session('status'))
                        <div class="text text-success">{{ session('status') }} If you did not recieve email then Resend email</div>
                    @else
                        <div class="text">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</div>
                    @endif
                </div>
                
                <!-- Login Form -->
                <div class="styled-form">
                    <form method="POST" action="{{ route('password.email') }}" class="validate_my_form">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="" placeholder="Email">
                            <span class="invalid-feedback" role="alert">
                                @error('email ')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="theme-btn btn-style-three">
                                <span class="txt">
                                     @if (session('status'))
                                        Re Send Email
                                    @else
                                        Submit 
                                    @endif
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </button>
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
            },
            messages: {
                email: {
                    required: 'Enter your email address',
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
    </script>
@endsection