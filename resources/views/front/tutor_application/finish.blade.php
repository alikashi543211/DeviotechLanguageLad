@extends("front.tutor_application.layout")

@section('title', 'Finish')

@section('application-content')
    <!-- Login Form -->
    <!-- Login Form -->
    <div class="col-md-12 text-center bg-white">
        <!-- Title Box -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="{{ asset('front') }}/assets/images/finish.png" width="120">       
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text"><span class="theme_color"><span>Thanks for applying!</span></span> We'll review your application and get back to you if you're accepted.</div>       
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <a href="{{ route('home') }}" class="button-sm mb-2"><span class="txt">Go To Home</span></a>
                <a href="{{ route('tutor.dashboard') }}" class="button-sm mb-2"><span class="txt">Go To Dashboard</span></a>     
            </div>
        </div>
    </div>
@endsection