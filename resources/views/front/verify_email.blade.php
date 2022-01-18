@extends("layouts.front")
@section("title", "Verify Email")

@section('css')
    <style>
    .image{
        background:none !important;
    }
    </style>
@endsection

@section('content')

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Title Column -->
                <div class="col-md-12 text-center bg-white p-5">
                    <!-- Title Box -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <img src="{{ asset('front') }}/assets/images/finish.png" width="120">       
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            @if (session('status') == 'verification-link-sent')
                                <p class="text mb-0">
                                    <span class="theme_color">
                                        <span>A new verification link has been sent to the <strong>{{ auth()->user()->email }}</strong>
                                        </span>
                                    </span>
                                </p>
                            @else
                                <p class="text mb-0">
                                    <span class="">
                                        <span>We have sent account verification link to <strong>{{ auth()->user()->email }}</strong>
                                        </span>
                                    </span>
                                </p>
                            @endif

                            @if(!is_null(student()))
                                <div class="text">Please verify your email to access student dashboard.</div>
                            @endif
                            @if(!is_null(tutor()))
                                <div class="text">Please verify your email to fill teacher application.</div>
                            @endif      
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                            <div class="mt-4 flex items-center justify-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <button class="button-sm mb-2"><span class="txt">Resend Verification Email</span></button>
                                    </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection