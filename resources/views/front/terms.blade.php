@extends("layouts.front")
@section("title", "Terms and Conditions")

@section('css')
    
@endsection

@section('content')

    <!-- Privacy Section -->
    <section class="privacy-section">
        <div class="auto-container">
            <!-- Privacy Content -->
            <div class="privacy-content">
                <h2>Terms and Conditions</h2>
                {!! setting('terms') !!}
            </div>
            
        </div>
    </section>
    <!-- End Privacy Section -->

    <!-- Privacy Section -->
    <section class="privacy-section">
        <div class="auto-container">
            <!-- Privacy Content -->
            <div class="privacy-content">
                <h2>Privacy Policy</h2>
                {!! setting('privacy') !!}
            </div>
            <!-- Privacy Content -->
        </div>
    </section>
    <!-- End Privacy Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $(".faq_section").find("p").addClass("text");
        });
    </script>
@endsection