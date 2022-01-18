@extends("layouts.front")
@section("title", "Teacher Detail")

@section('css')
    <style>
        .fc-day-past{
            cursor: no-drop !important;
            background:  #f1f1f1;
        }
        .lesson_detail_table th,
        .lesson_detail_table td,{
            border: 0 !important;
        }
        .bg-warning
        {
            cursor: not-allowed !important;
        }
        </style>
@endsection

@section('content')
    <!-- Dashboard Section -->
    <section class="dashboard-section sidebar-page-container front-profile-section">
        <div class="auto-container">
            <form action="{{ route('book.tutor') }}" method="POST" class="front-booking-form">
                @csrf
                <div class="row clearfix">
                    <!-- Sidebar Side -->
                    <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                        <div class="sidebar-inner">
                            <aside class="sidebar">
                                <div class="dashboard-widget">
                                    <div class="general-info text-center">
                                        <div class="avatar">
                                            <img src="{{ asset($tutor->image ?? 'default.png') }}" class="img-fluid" alt="">
                                        </div>
                                        <h5>{{ $tutor->user->name }}</h5>
                                        <!-- <div class="dd_dump"></div> -->
                                        <div>
                                            <p>
                                                <span class="rating-stars">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if (floor(tutorReviews($tutor->user->id)[0]) - $i >= 1)
                                                        {{-- Full Star --}}
                                                        <i style="color: #FFC125;" class="fa fa-star"></i>
                                                        @elseif (tutorReviews($tutor->user->id)[0] - $i > 0)
                                                        {{-- Half Star --}}
                                                        <i style="color: #FFC125;" class="fa fa-star-half-o"></i>
                                                        @else
                                                        {{-- Empty Star --}}
                                                        <i style="color: #FFC125;" class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <strong>{{ nthDecimal(tutorReviews($tutor->user->id)[0], 1) }}</strong>
                                                <small><a href="javascript:void(0);" class="reviews_counting">({{ tutorReviews($tutor->user->id)[1] }} reviews)</a></small>
                                            </p>
                                        </div>
                                        <div class="other-info">
                                            {{-- <p class="clearfix">
                                                <span class="pull-left">Trial Lesson</span>
                                                <span class="pull-right">FREE</span>
                                            </p>
                                            <p class="clearfix">
                                                <span class="pull-left">30 mins, one time</span>
                                                <span class="pull-right">$30/h</span>
                                            </p> --}}
                                            <p>
                                                @if($tutor->is_free_trial == '1' && !isset(request()->sp) && !isset(request()->res_trial) && !isset(request()->res_booking))
                                                    @if(authCheck())
                                                        <a href="javascript:void(0);" data-old-href="{{ route('student.book.trial', ['tutor_id' => $tutor->user->id]) }}" class="button-sm mb-2 book_trial_btn" data-href="{{ route('load.tutor.calendar') }}"><span class="txt">Book Trial</span></a>
                                                    @else
                                                        <a href="{{ route('login', ['book' => $tutor->user->username]) }}" class="button-sm mb-2"><span class="txt">Book Trial</span></a>
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>

                    <div class="content-side col-lg-9 col-md-12 col-sm-12">
                        <div class="row mb-3 work-portfolio intro-section intro-section-two">
                            <!-- Video Column -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        
                                        <div class="tabs-box profile-tabs">
                                            <ul class="tab-btns tab-buttons clearfix">
                                                
                                                <li data-tab="#lessons" class="tab-btn active-btn">
                                                    <a data-toggle="tab" href="#lessons">Lessons</a>
                                                </li>

                                                <li data-tab="#about-me" class="tab-btn">
                                                    <a data-toggle="tab" href="#about-me">About me</a>
                                                </li>

                                                <li data-tab="#reviews" class="tab-btn reviews_tab">
                                                    <a data-toggle="tab" href="#reviews">Reviews</a>
                                                </li>

                                            </ul>
                                            <div class="tabs-content">
                                                <div class="tab" id="about-me">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                            <img id="loading-image-1" src="{{ asset('front') }}/assets/images/preloader.svg">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab active-tab" id="lessons">
                                                    @if(isset(request()->sp) || isset(request()->res_trial) || isset(request()->res_booking))
                                                        <div class="row clearfix my-3" id="calendar">
                                                            @if(!isset(request()->sp) && !isset(request()->res_trial) && !isset(request()->res_booking))
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <button type="button" class="button-sm mb-2 back_button" data-href="" data-step=""><span class="txt"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</span></button>
                                                                </div>
                                                            @endif
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="row not-valid" id="schedule-row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="dashbaord-content-box">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                                                                        <div class="row mb-3 not-valid" id="schedule-row">
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                                <div class="">
                                                                                                    <div id='calendar-monthly'></div>
                                                                                                </div>
                                                                                                {{-- <div class="row mt-3">
                                                                                                    <div class="col-md-12 col-sm-12 text-center d-flex">
                                                                                                        <button type="submit" class="btn btn-style-one mr-4"><span class="txt">Book Teacher</span></button>
                                                                                                        <button type="submit" class="btn btn-style-one"><span class="txt">Book Trial</span></button>
                                                                                                    </div>
                                                                                                </div> --}}
                                                                                                <div class="row card-box">
                                                                                                    <input type="hidden" name="date" class="date tutor_booking_date" value="">
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                                        <span class="invalid-feedback">
                                                                                                            @error('tutor_lesson_id')
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            @enderror
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(!isset(request()->sp) && !isset(request()->res_trial) && !isset(request()->res_booking))
                                                        <div class="row clearfix my-3" id="tutor_msdy_lessons">
                                                            @if($lessons->count() > 0)
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="row not-valid" id="schedule-row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="dashbaord-content-box">
                                                                                <div class="row">
                                                                                    @foreach($lessons as $item)
                                                                                        <div class="col-md-1 m-auto cursor-pointer">
                                                                                            <div class="custom-control custom-radio">
                                                                                                <input type="radio" id="customRadio{{ $item->id }}" name="tutor_lesson_package_id" class="custom-control-input tutor_lesson_package_item lesson-eye" data-id="{{ $item->id }}" value = "{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
                                                                                                <label class="custom-control-label lesson_detail_checkbox" for="customRadio{{ $item->id }}"></label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="lesson-eye col-lg-11 col-md-11 col-sm-11 justify-content-center lesson-col my-1" data-id="{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                                    <h5>{{ ucfirst($item->title) }}</h5>
                                                                                                </div>
                                                                                                {{-- <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                                                                                                    <h5>$40.0</h5> 
                                                                                                </div> --}}
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                                    <small>{{ $item->language }} - {{ $item->category }}</small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row mb-3 card-box">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <input type="hidden" name="tutor_lesson_id" class="tutor_lesson_id" value="">
                                                                            <input type="hidden" name="tutor_lesson_package_id" class="tutor_lesson_package_id" value="">
                                                                            <span class="invalid-feedback">
                                                                                @error('tutor_lesson_package_id')
                                                                                    <strong>{{ $message }}</strong>
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="no-results">
                                                                        <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
                                                                        <h2>No Lessons Found</h2>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="tab" id="reviews">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                            <img id="loading-image-1" src="{{ asset('front') }}/assets/images/preloader.svg" style="display:none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <input type="hidden" name="tutor_id" class="tutor_id" value="{{ $user->id }}">
                <input type="hidden" name="tutor_lesson_id" class="booking_tutor_lesson_id" value="">
                <input type="hidden" name="tutor_lesson_package_id" class="booking_tutor_lesson_package_id" value="">
                <input type="hidden" name="date" class="booking_date" value="">
                <input type="hidden" name="student_package_id" class="booking_student_package_id" value="{{ request()->sp ?? '' }}">
                <input type="hidden" name="res_trial_class_id" class="booking_res_trial_class_id" value="{{ request()->res_trial ?? '' }}">
                <input type="hidden" name="res_booking_request_id" class="res_booking_request_id" value="{{ request()->res_booking ?? '' }}">
                <input type="hidden" name="back_button" class="back_button_url" value="">
                <input type="hidden" name="trial_or_booking" class="trial_or_booking" value="1">
                <input type="hidden" name="booking_slot_check" class="booking_slot_check" value="">
                <input type="hidden" name="res_request_by" value="{{ request()->by ?? '' }}">
            </form>
        </div>
    </section>
    <!-- Lesson Detail -->
    <div class="modal fade" id="lessonDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
    </div>
    <!-- End Dashboard Section -->
    <div class="loader_clone d-none">
        <div class="row clearfix my-3" id="lessons" >
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row not-valid" id="schedule-row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dashbaord-content-box lessons_loader_clone">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <img id="loading-image-1" width="70" src="{{ asset('front') }}/assets/images/preloader.svg">
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="clone_all_lessons d-none">
        <div class="row clearfix my-3" id="tutor_my_lessons">
            @if($lessons->count() > 0)
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row not-valid" id="schedule-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="dashbaord-content-box">
                                <div class="row">
                                    @foreach($lessons as $item)
                                        <div class="col-md-1 m-auto cursor-pointer">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio{{ $item->id }}" name="tutor_lesson_package_id" class="custom-control-input tutor_lesson_package_item lesson-eye" data-id="{{ $item->id }}" value = "{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
                                                <label class="custom-control-label" for="customRadio{{ $item->id }}"></label>
                                            </div>
                                        </div>
                                        <div class="lesson-eye col-lg-11 col-md-11 col-sm-11 justify-content-center lesson-col my-1" data-id="{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <h5>{{ ucfirst($item->title) }}</h5>
                                                </div>
                                                {{-- <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                                                    <h5>$40.0</h5> 
                                                </div> --}}
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <small>{{ $item->category }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="row mb-3 card-box">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="hidden" name="tutor_lesson_id" class="tutor_lesson_id" value="">
                            <input type="hidden" name="tutor_lesson_package_id" class="tutor_lesson_package_id" value="">
                            <span class="invalid-feedback">
                                @error('tutor_lesson_package_id')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="no-results">
                        <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
                        <h2>No Lessons Found</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>
        
        $(".trial_or_booking").val("1")

        var load_lessons_url = "{{ route('load.tutor.lessons') }}?id={{ $user->id }}";

        @if(isset(request()->res_booking))
            var $booking_request_id = "{{ base64_decode(request()->res_booking) ?? '' }}"
        @endif
            
        @if(!isset(request()->sp) && !isset(request()->res_trial) && !isset(request()->res_booking))
            var load_calendar_url = "{{ route('load.tutor.calendar') }}";
        @endif

        @if(isset(request()->sp))
            var load_calendar_url = "{{ route('load.tutor.calendar') }}?sp={{ request()->sp }}";
        @endif

        @if(isset(request()->res_trial))
            var load_calendar_url = "{{ route('load.tutor.calendar') }}?res_trial={{ request()->res_trial }}";
        @endif

        @if(isset(request()->res_booking))
            var load_calendar_url = "{{ route('load.tutor.calendar') }}?res_booking={{ request()->res_booking }}";
        @endif

        var actual_action = $(".front-booking-form").attr("action");
        $( document ).ready(function() {
            load_about_me();
        });

        @if(!isset(request()->sp) && !isset(request()->res_trial) && !isset(request()->res_booking))
            $( document ).ready(function() {
                load_lessons();
            });
        @endif

        @if(isset(request()->sp))
            $( document ).ready(function() {
                $tutor = "{{ $tutor->user->id }}";
                $daySlotsUrl = "{{ route('day.slots') }}?username={{ $tutor->user->username }}&package_id={{ getStudentPackageId(base64_decode(request()->sp)) }}&type=1";
                start_calendar();
            });
        @endif

        @if(isset(request()->res_trial))
            $( document ).ready(function() {
                $tutor = "{{ $tutor->user->id }}";
                $daySlotsUrl = "{{ route('day.slots') }}?username={{ $tutor->user->username }}&res_trial={{ base64_decode(request()->res_trial) }}";
                start_calendar();
            });
        @endif

        @if(isset(request()->res_booking))
            $( document ).ready(function() {
                $tutor = "{{ $tutor->user->id }}";
                $daySlotsUrl = "{{ route('day.slots') }}?username={{ $tutor->user->username }}&booking_request_id={{ base64_decode(request()->res_booking) }}&type=1&res_bookinng={{ base64_decode(request()->res_booking) }}";
                start_calendar();
            });
        @endif

        $( document ).ready(function() {
            load_reviews();
        });

        validate_booking_form();

        function load_about_me($url)
        {
            $.ajax({
                type: "GET",
                url: "{{ route('load.tutor.about_me') }}?id={{ $user->id }}",
                beforeSend: function() {
                    loader = $(".loader_clone").html();
                    $('#about-me').html(loader);
                },
                success: function (response) {
                    $('#about-me').html(response);
                }
            });
        }

        
        function set_actual_form_action()
        {
            $(".front-booking-form").attr("action", actual_action);
        }


        function load_lessons()
        {
            // alert("Ok");
            // set_actual_form_action();
            // loader = $(".loader_clone").html();
            // $('#lessons').html(loader);
            // all_lessons = $(".clone_all_lessons").html();
            // alert(all_lessons);
            // $('#lessons').html(all_lessons);
            
        }

        function load_lesson_detail($url)
        {
            set_actual_form_action();
            $.ajax({
                type: "GET",
                url: $url,
                beforeSend: function() {
                    loader = $(".loader_clone").html();
                    $('#lessons').html(loader);
                },
                success: function (response) {
                    $('#lessons').html(response);
                    @if(!is_null(session('website_currency')))
                        update_website_currency("{{ session('website_currency') }}");
                    @endif
                    back_button_url_input = $(".back_button_url").val();
                    $(".back_button").attr('data-href', back_button_url_input);
                    $(".back_button").attr('data-step', "lesson_detail");
                    $(".back_button_url").val($url);

                }
            });
            
        }

        function validate_booking_form()
        {
            $(".front-booking-form").validate({
                rules: {
                    slot: {
                        required: true,
                    },
                },
                messages: {
                    slot: {
                        required: 'Select one time slot',
                        minlength: 'Please select at least one time slot',
                    },
                    booking_slot_check: {
                        required: 'Please select at least one time slot',
                    },

                },
                errorPlacement: function(error, element) {
                     $(element).addClass('error');
                     $('.slots_error').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
                },
                success: function(label) {
                    // set &nbsp; as text for IE
                    label.html("&nbsp;").addClass("checked");
                },
                highlight: function(element, errorClass) {
                    $(element).parent().next().find("." + errorClass).removeClass("checked");
                },
            });
        }

        function load_calendar($url)
        {
            $.ajax({
                type: "GET",
                url: $url,
                beforeSend: function() {
                    loader = $(".loader_clone").html();
                    $('#lessons').html(loader);
                },
                success: function (response) {
                    $type = $(".trial_or_booking").val();
                    $('#lessons').html(response);
                    start_calendar();
                    @if(isset(request()->sp))
                        package_id = '{{ $student_p->tutor_lesson_package->id }}';
                    @else
                        package_id = $(".booking_tutor_lesson_package_id").val();
                    @endif

                    @if(isset(request()->res_booking))
                        $daySlotsUrl = "{{ route('day.slots') }}?username={{ $tutor->user->username }}&booking_request_id="+$booking_request_id+"&type="+$type+"&res_bookinng={{ base64_decode(request()->res_booking) }}";
                    @elseif(isset(request()->res_trial))
                        $daySlotsUrl = "{{ route('day.slots') }}?username={{ $tutor->user->username }}&res_trial={{ base64_decode(request()->res_trial) ?? '' }}";
                    @else
                        $daySlotsUrl = "{{ route('day.slots') }}?username={{ $tutor->user->username }}&package_id="+package_id+"&type="+$type;
                    @endif
                    $checkBookingUrl = "{{ route('check.bookings') }}";
                    $tutor = "{{ $tutor->user->id }}";

                    $month_dates = <?php echo json_encode($month_dates) ?>;
                    $month_check = <?php echo json_encode($date_hours) ?>;
                    
                    back_button_url_input = $(".back_button_url").val();
                    $(".back_button").attr('data-href', back_button_url_input);
                    $(".back_button").attr('data-step', "calendar");
                    $(".back_button_url").val($url);
                    
                }
            });
            
        }

        function load_reviews($url)
        {
            $( document ).ready(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('load.tutor.reviews') }}?id={{ $user->id }}",
                    beforeSend: function() {
                        loader = $(".loader_clone").html();
                        $('#reviews').html(loader);
                    },
                    success: function (response) {
                        $('#reviews').html(response);
                    }
                });
            });
            
        }

        function selectBetween() {
            var prev = false;
            if ($(".check-between").length > 1) {
                // alert('df');
                $(".schedule-table tr").each(function (index, element) {
                    if($(this).hasClass('check-between')) {
                    console.log(index);
                        if (prev !== false) {
                            if (index-prev > 1) {
                                console.log('innerif');
                                $('.schedule-table tr input[type=checkbox]').filter(function(i) {
                                    if (i > prev && i < index) {
                                        $(this).prop("checked", true);
                                        $(this).parent().toggleClass("bg-success", this.checked);

                                    }
                                });
                            }
                        }

                        prev = index;
                    }
                });
            }
        }

        

        function validateSlot() {
            if ($(".schedule-table .bg-success").length > 0) {
                $("#schedule-row").removeClass("not-valid");
                $("#schedule-row").addClass("valid");
                $(".schedule-error strong").text("");
            } else {
                $("#schedule-row").addClass("not-valid");
                $("#schedule-row").removeClass("valid");
            }
        }

        $(document).on("click", '.lesson-eye', function(){
            $url = $(this).attr("data-href");
            $lesson_id = $(this).attr("data-id");
            $("#lessons").find(".active_lesson").removeClass("active_lesson");
            $(this).addClass("active_lesson");
            $(".booking_tutor_lesson_id").val($lesson_id);
            load_lesson_detail($url);
        });

        $(document).on("change", '.tutor_lesson_package_item', function(){
            $lesson_package_id = $(this).attr("data-id");
            $(".tutor_lesson_package_id").val($lesson_package_id);
        });

        $(document).on("click", '.package_select_btn', function(){
            $url = $(this).attr("data-href");
            $pkg_id = $(this).attr("data-id");
            $(".booking_tutor_lesson_package_id").val($pkg_id);
            load_calendar($url);
            
        });

        $(document).on("click", '.book_trial_btn', function(){
            $url = $(this).attr("data-href");
            $trial_action = $(this).attr("data-old-href");
            $(".front-booking-form").attr("action", $trial_action);
            $(".booking_tutor_lesson_package_id").val('');
            $(".trial_or_booking").val("2");
            load_calendar($url);
            
        });

        $(document).on("click", '.back_button', function(){
            window.location.href = "";
        });

        function getLessonDetail($url)
        {
            $( document ).ready(function() {
                $.ajax({
                    type: "GET",
                    url: $url,
                    success: function (response) {
                        $('#lessonDetailModal').html(response);
                        $("#lessonDetailModal").modal("show");
                    }
                });
            });  
        }

        function removeGreenLabels()
        {
            $(".time_slot_label.bg-success").each(function(){
                $(this).removeClass("bg-success");
            });
            return true;
        }

        $(document).on("change", ".slot-check", function() {
            $count = $(".time_slot_label.bg-success").length;
            $is_success = $(this).closest('.time_slot_label').hasClass("bg-success");
            $is_consective = true;
            if($count == 0)
            {
                $(".booking_slot_check").val('1');
            }
            if($count == 1)
            {

                $slot_index = $(this).closest('.time_slot_label').attr("slot-index");
                $(".time_slot_label.bg-success").each(function(index, value){
                    $slot_index_previous = $(this).attr("slot-index")
                });
                $slot_diff = $slot_index - $slot_index_previous;
                $invalid_error = "<div class='invalid-feedback'><strong>Please select at least one time slot</strong></div>";
                $diff = Math.abs(parseInt($slot_index) - parseInt($slot_index_previous));
                if( $diff == 0 )
                {
                    $(".booking_slot_check").val('1');
                    $is_consective = true;
                }else{
                    $(".booking_slot_check").val('1');
                    $is_consective = false;
                }
                $(".booking_slot_check").val('1');
            }


            
            if($count == 1 && !($is_success) && !$is_consective)
            {
                $(this).attr("checked", false);
                $(".slots_error").html($invalid_error);

            }else if($count == 2 && !($is_success))
            {
                $(this).attr("checked", false);
                $(".slots_error").html($invalid_error);
            }else
            {

                $(this).parent().toggleClass("bg-success", this.checked);

                if($(this).parent().hasClass("bg-success"))
                {
                    $booking_date = $(this).attr("data-new-date");
                    $(".booking_date").val($booking_date);
                }
                if(!$(this).parent().hasClass("bg-success"))
                {
                    $(".booking_date").val(''); 
                }

                $(this).closest('tr').toggleClass("check-between", this.checked);
                selectBetween();
                validateSlot();
                $(".slots_error").html("");
                
            }

        });

        showMessageOnSubmit();
        function showMessageOnSubmit()
        {
            $(document).on("click", ".click_book_teacher_btn", function(){
                console.log("Green Length : " + $(".time_slot_label.bg-success").length);
                if ($(".time_slot_label.bg-success").length < 1 )
                { 
                   $invalid_error = "<div class='invalid-feedback'><strong>Please select at least one time slot</strong></div>";
                   $(".slots_error").html($invalid_error);
                }else{
                    $("body .front-booking-form").submit();
                }
            })
             
        }

        function checkTwoConsectiveSlots(slot_index)
        {
            $(".time_slot_label.bg-success").each(function(){
                $s_index = $(this).attr('slot-index');
            });

            $slot_index = ParseInt($slot_index);
            $s_index = ParseInt($s_index);
            $diff = $slot_index - $s_index;
            if($diff == 0)
            {
                return true;
            }else{
                return false;
            }

        }

        $(document).on("click", ".tutor_book_teacher_btn", function() {
            toastr.error("Please login with student account");  
        });

        on_click_reviews_show_reviews_tab();
        function on_click_reviews_show_reviews_tab()
        {
            $(document).on("click", ".reviews_counting", function(){
                $(".reviews_tab").click();
            });
        }
        
        alreadyBookedAlert();
        function alreadyBookedAlert()
        {
            $(document).on("click", ".not_allowed", function(){
                toastr.error("This Slot is Already Booked");
            });
        }

    </script>
    <script src="{{ asset('js/front-calendar.js') }}"></script>
@endsection