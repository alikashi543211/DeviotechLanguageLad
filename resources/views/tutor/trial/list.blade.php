@extends("layouts.tutor")
@section("title", 'Trials')

@section('css')
    
@endsection

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="row work-portfolio intro-section intro-section-two p-0">
            <!-- Video Column -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="tabs-box profile-tabs">
                            <ul class="tab-btns tab-buttons clearfix">
                                
                                <li data-tab="#pending_trials" class="tab-btn active-btn">
                                    <a data-toggle="tab" href="#pending_trials">
                                        Requests
                                        @if($booking_list_time > 0 || $booking_list_cancel > 0)
                                            <span class="fa fa-circle" style="font-size:10px;color:red;"></span>
                                        @endif
                                    </a>
                                </li>
                                <li data-tab="#active_trials" class="tab-btn">
                                    <a data-toggle="tab" href="#active_trials">Active</a>
                                </li>
                                <li data-tab="#completed_trials" class="tab-btn">
                                    <a data-toggle="tab" href="#completed_trials">Completed</a>
                                </li>
                                <li data-tab="#cancelled_trials" class="tab-btn">
                                    <a data-toggle="tab" href="#cancelled_trials">Cancelled</a>
                                </li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab active-tab" id="pending_trials">

                                </div>

                                <div class="tab" id="active_trials">

                                </div>

                                <div class="tab" id="completed_trials">

                                </div>

                                <div class="tab" id="cancelled_trials">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="sellerLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <form action="" method="POST" class="custom-offer-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Cancel Trial Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        <span class="popup_title"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="delete_btn"><button type="button" class="btn btn-success">Yes</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sellerLocationModal_cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="" method="GET" class="custom-offer-form crm_form">
                        <div class="modal-header">
                            <h5 class="modal-title main_title" id="exampleModalLongTitle">Cancel Trial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="cancell-location-body">
                            <p>Are you sure want to cancel trial?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sellerLocationModal_cancel_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="" method="GET" class="custom-offer-form crm_form">
                        <div class="modal-header">
                            <h5 class="modal-title main_title" id="exampleModalLongTitle">Student Trial Cancel Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="cancell-location-body">
                            <div class="row">
                                <!-- Form Group -->
                                <!-- Form Group -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p>
                                        <strong>Reason:</strong>
                                        <span class="cancel_reason"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="" class="btn btn-danger cancel_request_decline_btn">Decline</a>
                            <a href="" class="btn btn-success cancel_request_accept_btn">Accept</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Read More -->
    <div class="modal fade" id="readMoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        <p class="text read_more_box">
                            
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="accept_request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="" method="GET" class="custom-offer-form accept_request_modal">
                        <div class="modal-header">
                            <h5 class="modal-title main_title" id="exampleModalLongTitle">Accept Trial Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="seller-location-body">
                            <div class="row">
                                <!-- Form Group -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label>Select Option*</label>
                                    <select name="channel_type" class="class_channel_option" required="">
                                        <option value="" selected disabled>Select Option</option>
                                        <option value="Skype">Skype</option>
                                        <option value="Zoom">Zoom</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        @error('name')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 channel_input_box" style="display:none;">
                                    <label class="channel_input_label"></label>
                                    <input type="text" class="channel_input" name="channel" required="" placeholder="">
                                    <span class="invalid-feedback" role="alert">
                                        @error('name')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label>Note ( Optional )</label>
                                    <textarea placeholder="Note here..." name="note" class="@error('note') error @enderror" id="" placeholder=""></textarea>
                                    <span class="invalid-feedback">
                                        @error('note')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success accept_button_elem">Accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="teacher_timetable_req_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="" method="GET" class="custom-offer-form crm_form">
                        <div class="modal-header">
                            <h5 class="modal-title main_title" id="exampleModalLongTitle">Booking Time Table Change Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="cancell-location-body">
                            <div class="row">
                                <!-- Form Group -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p>
                                        <span class="font-weight-bold">Date: </span> <span class="teacher_req_date"></span>
                                    </p>
                                    <p>
                                        <span class="font-weight-bold">Slots: </span> <span class="req_data_slots"></span>
                                    </p>
                                    <p class="wait_message">
                                        <small class="text-danger"><b>Please</b> wait for student confirmation</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer time_change_footer">
                            <button type="button" class="btn btn-secondary close_modal_button" data-dismiss="modal">Close</button>
                            <a href="" class="btn btn-danger cancel_request_decline_btn">Decline</a>
                            <a href="" class="btn btn-success cancel_request_accept_btn">Accept</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="teacher_timetable_req_modal_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="" method="GET" class="custom-offer-form crm_form time_change_accept_form">
                        <input type="hidden" name="result" value="1">
                        <div class="modal-header">
                            <h5 class="modal-title main_title" id="exampleModalLongTitle">Booking Time Table Change Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" id="cancell-location-body">
                            <div class="row">
                                <div class="col-12">
                                    <span>
                                        <span class="font-weight-bold">Date: </span> <span class="teacher_req_date"></span>
                                    </span>
                                    <span>
                                        <span class="font-weight-bold">Slots: </span> <span class="req_data_slots"></span>
                                    </span>
                                </div>
                                 <div class="col-12">
                                     <hr>
                                 </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label>Select Option*</label>
                                    <select name="channel_type" class="class_channel_option" required="">
                                        <option value="" selected disabled>Select Option</option>
                                        <option value="Skype">Skype</option>
                                        <option value="Zoom">Zoom</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        @error('name')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 channel_input_box" style="display:none;">
                                    <label class="channel_input_label"></label>
                                    <input type="text" class="channel_input" name="channel" required="" placeholder="">
                                    <span class="invalid-feedback" role="alert">
                                        @error('name')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label>Note ( Optional )</label>
                                    <textarea placeholder="Note here..." name="note" class="@error('note') error @enderror" id="" placeholder=""></textarea>
                                    <span class="invalid-feedback">
                                        @error('note')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer time_change_footer">
                            <button type="button" class="btn btn-secondary close_modal_button" data-dismiss="modal">Close</button>
                            <a href="" class="btn btn-danger cancel_request_decline_btn">Decline</a>
                            <button type="submit" class="btn btn-success time_change_request_accept_btn">Accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>

        load_pending_trials("{{ route('tutor.trial.load.list') }}", '#pending_trials');
        load_active_trials("{{ route('tutor.trial.load.active') }}", '#active_trials');
        load_completed_trials("{{ route('tutor.trial.load.completed') }}", '#completed_trials');
        load_cancelled_trials("{{ route('tutor.trial.load.cancelled') }}", '#cancelled_trials');


        function load_pending_trials($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    start_data_table();
                }
            });
        }

        function load_active_trials($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    start_data_table();
                }
            });
        }

        function load_completed_trials($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    start_data_table();
                }
            });
        }

        function load_cancelled_trials($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    start_data_table();
                }
            });
        }

        // active the nav tab
        $(document).ready(function(){
            activeTab('{{ request()->tab }}');
        });

        // Cancel Request
        $(document).on("click", '#check-in-location-view', function(){
            $url = $(this).attr("data-href");
            $title = $(this).attr("data-title");
            $(".popup_title").html($title);
            $main_title = $(this).attr("title");
            $(".main_title").html($main_title);
            $(".delete_btn").attr("href", $url);
            $("#sellerLocationModal").modal("show");
        });

        // Accept Request
        $(document).on("click", '.accept_icon_btn_action', function(){
            $url = $(this).attr("data-href");
            $main_title = $(this).attr("title");
            $(".accept_request_modal").attr("action", $url);
            $(".accept_request_modal").find(".main_title").html($main_title);
            $channel_type = $(this).attr("data-channel-type");
            $channel = $(this).attr("data-channel");
            $note = $(this).attr("data-note");
            if($channel_type !== '' && $channel !== '')
            {
                $('[name="channel_type"]').val($channel_type).change();
                $('[name="channel"]').val($channel).change();
                $('[name="note"]').val($note).change();

            }
            if($(this).attr("data-task") == '2')
            {
                $(".accept_button_elem").html("Go To Reschedule Trial");  
            }else
            {
                $(".accept_button_elem").html("Accept"); 
            }
            $("#accept_request_modal").modal("show");
        });



        // Accept Request
        $(document).on("click", '.read_more_link', function(){
            $des = $(this).attr("data-value");
            $(".read_more_box").html($des);
            $("#readMoreModal").modal("show");
        });

        on_change_class_channel_option();

        show_trial_cancel_model();
        show_trial_cancel_accept_model();
        show_teacher_time_change_modal();

        function show_trial_cancel_model()
        {
            $(document).on("click", '.cancel_booking_btn', function(){
                $(".crm_form").attr("action", $(this).attr('data-href'))
                $("#sellerLocationModal_cancel").modal("show");
            });
        }

        function show_trial_cancel_accept_model()
        {
            $(document).on("click", '.cancel_booking_btn_accept', function(){
                $(".cancel_request_accept_btn").attr("href", $(this).attr('data-href') + "?result=1");
                $(".cancel_request_decline_btn").attr("href", $(this).attr('data-href') + "?result=0");
                reason = $(this).attr("data-reason");
                $(".cancel_reason").html(reason);
                $("#sellerLocationModal_cancel_accept").modal("show");
            });
        }


        function show_teacher_time_change_modal()
        {
            $(document).on("click", '.teacher_time_change_req', function(){
                $req_date = $(this).attr("data-date");
                $req_data_slots = $(this).attr("data-slots");
                $(".teacher_req_date").html($req_date);
                $(".req_data_slots").html($req_data_slots);
                $req_by = $(this).attr("data-time-request-by");

                $(".cancel_request_decline_btn").attr("href", $(this).attr('data-href') + "?result=0");

                if($req_by != '')
                {
                    if($req_by == "Student")
                    {
                        $(".time_change_accept_form").attr("action", $(this).attr('data-href'));
                        $target_modal = "#teacher_timetable_req_modal_accept";
                        $(".wait_message").hide();
                        $(".close_modal_button").hide();
                        $(".time_change_request_accept_btn").show();
                        $(".cancel_request_decline_btn").show();
                    }else{
                        $target_modal = "#teacher_timetable_req_modal";
                        $(".wait_message").show();
                        $(".cancel_request_accept_btn").hide();
                        $(".cancel_request_decline_btn").hide();
                    }
                }

                $channel_type = $(this).attr("data-channel-type");
                $channel = $(this).attr("data-channel");
                $note = $(this).attr("data-note");
                if($channel_type !== '' && $channel !== '')
                {
                    $('[name="channel_type"]').val($channel_type).change();
                    $('[name="channel"]').val($channel).change();
                    $('[name="note"]').val($note).change();

                }
                
                $($target_modal).modal("show");
            });
        }
    </script>
@endsection