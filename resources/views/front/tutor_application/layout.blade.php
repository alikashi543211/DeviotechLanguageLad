@extends('layouts.front')
@section('title', 'Become a Teacher')

@section('css')
    @yield('application-css')
@endsection

@section('content')
    <!-- Dashboard Section -->
    <section class="dashboard-section teacher-registration profile-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-md-12 text-center">
                        <div class="profile-tabs">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn @routeis('tutor.application.general') active-btn @endrouteis" data-href="{{ route('tutor.application.general') }}">
                                    <a href="javascript:;">General Info</a>
                                </li>
                                @if(Auth::check())
                                    @if(tutor()->step != '0')
                                        <li class="tab-btn @routeis('tutor.application.lesson') active-btn @endrouteis" data-href="{{ route('tutor.application.lesson') }}">
                                            <a href="javascript:;">Lesson</a>
                                        </li>
                                    @else
                                        <li class="tab-btn ban-tab">
                                            <a href="javascript:;">Lesson</a>
                                        </li>
                                    @endif

                                    @if(tutor()->step == '2' || tutor()->step == '3')
                                        <li class="tab-btn @routeis('tutor.application.certificate') active-btn @endrouteis" data-href="{{ route('tutor.application.certificate') }}">
                                            <a href="javascript:;">Resume & Certificate </a>
                                        </li>
                                    @else
                                        <li class="tab-btn ban-tab">
                                            <a href="javascript:;">Resume & Certificate </a>
                                        </li>
                                    @endif

                                    @if(tutor()->step == '3')
                                        <li class="tab-btn @routeis('tutor.application.finish') active-btn @endrouteis" data-href="{{ route('tutor.application.finish') }}">
                                            <a href="javascript:;">Finish</a>
                                        </li>
                                    @else
                                        <li class="tab-btn ban-tab">
                                            <a href="javascript:;">Finish</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="tab-btn ban-tab">
                                        <a href="javascript:;">Certificate</a>
                                    </li>
                                    <li class="tab-btn ban-tab">
                                        <a href="javascript:;">Finish</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 col-sm-12 p-5 bg-white">
                        @yield('application-content')
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

    <!-- Call To Action Section Two -->
    <!-- End Call To Action Section Two -->
@endsection
@section('js')
    <script>
        $(document).on("click", ".tab-btn", function(){
            $href = $(this).attr("data-href");
            if($href)
            {
                window.location.href = $href;
            }
        });
    </script>
    @yield('application-js')
@endsection
