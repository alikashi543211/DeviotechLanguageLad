@extends("layouts.tutor")
@section("title", 'Settings')

@section('css')
    <style>
        .modal-dashboard-section{
            background:  #ffff;
        }
    </style>
@endsection

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tabs-box profile-tabs">
                        <ul class="tab-btns tab-buttons clearfix">
                            
                            <li data-tab="#my_availability_tab" class="tab-btn active-btn">
                                <a data-toggle="tab" href="#my_availability_tab">Availability</a>
                            </li>
                            <li data-tab="#calendar_tab" class="tab-btn">
                                <a data-toggle="tab" href="#calendar_tab">Calendar</a>
                            </li>
                            <li data-tab="#delete_profile_tab" class="tab-btn">
                                <a data-toggle="tab" href="#delete_profile_tab">Delete</a>
                            </li>
                        </ul>
                        <div class="tabs-content">

                            <div class="tab active-tab" id="my_availability_tab">
                                
                            </div>

                            <div class="tab" id="bank_info_tab">

                            </div>
                            <div class="tab" id="password_tab">

                            </div>

                            <div class="tab" id="delete_profile_tab">

                            </div>

                            <div class="tab" id="calendar_tab">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="accept_request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered edit_time_table_block" role="document">
            <!-- Render Html Here -->
        </div>
    </div>

    <div class="clone_time_slots_row d-none">
        <div class="row justify-content-center" id="time-table-row-1">
            <div class="form-group col-lg-5 col-md-5 col-sm-5">
                <input type='text' style="height: 24px !important;" class="form-control from_time timepicker text-center" name="from[]" value="" autocomplete="off" required>
            </div>
            <div class="form-group col-lg-5 col-md-5 col-sm-5">
                <input type='text' style="height: 24px !important;" class="form-control to_time timepicker text-center" name="to[]" value="" autocomplete="off" required>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 text-left">
                <a href="javascript:void(0);" title="remove" data-title="" data-href="" class="btn btn-danger btn-sm mr-1 speaking-item-del d-block del-speaking" id="accept_icon_btn_trash"><i class="fa fa-trash"></i></a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 time_slot_error_col" style="display:none;">
                <span class="invalid-feedback" style="display:block;">
                    <strong>Select slots between 12:00 AM to 11:59 PM</strong>
                </span>
            </div>
        </div>
    </div>

    <div class="edit_time_table_loader d-none">
        <div class="modal-content dashboard-section modal-dashboard-section p-0">
            <div class="modal-header">
                <h5 class="modal-title main_title" id="exampleModalLongTitle">Edit Time Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row edit_time_table_loader_row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <img id="loading-image-1" width="70" src="{{ asset('front') }}/assets/images/preloader.svg">
                </div>
            </div>
        </div>
    </div>

    <div class="edit_time_table_off_day d-none">
        <div class="modal-content dashboard-section p-0">
            <div class="styled-form">
                <form action="{{ route('tutor.setting.timetable.save', ['off_day' => 'active']) }}" method="POST" class="custom-offer-form accept_request_modal time_table_off_day_form">
                    @csrf
                    <input type="hidden" name="day" value="">
                    <div class="modal-header">
                        <h5 class="modal-title main_title" id="exampleModalLongTitle">I am not available - Monday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 dates_block">
                                <div class="row mt-2">
                                    @for($i=0; $i < 4; $i++)
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 time_table_date_column">
                                            <input type='text' class="form-control datepicker day_select_input" placeholder="Select Date {{ $i+1 }}" name="single_day[]" autocomplete="off">
                                        </div>
                                    @endfor
                                    <div class="col-lg-12 col-md-12 invalid-feedback">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        load_my_availability_tab("{{ route('tutor.setting.load.availability') }}", '#my_availability_tab');
        load_delete_profile_tab("{{ route('tutor.setting.load.delete_profile') }}", '#delete_profile_tab');
        load_calendar_tab("{{ route('tutor.setting.load.calendar') }}", '#calendar_tab');


        function validate_time_table_off_day_form()
        {
            
            $(".time_table_off_day_form").validate({
                ignore:":not(:visible)",
                rules: {
                    "single_day[]": {
                        required: true,
                    },
                },
                messages: {
                    "single_day[]": {
                        required: 'Set at least one date',
                    },
                },
                errorPlacement: function(error, element) {
                     $(element).addClass('error');
                     $(element).closest('.dates_block').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
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
                    $(element).closest('.dates_block').find('.invalid-feedback').html('');
                }
            });
        }


        function load_my_availability_tab($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    
                    // More jquery work
                    start_time_picker();
                    start_data_table();
                }
            });

        }

        function load_bank_info_tab($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    
                }
            });
        }

        function load_delete_profile_tab($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    
                }
            });
        }

        function load_calendar_tab($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    
                }
            });
        }

        // Accept Request
        on_click_clock_icon();
        on_click_specific_date_select_btn();

        function on_click_clock_icon()
        {
            $(document).on("click", '.accept_icon_btn', function(){
                $title = $(this).attr("data-title");
                $data_type = $(this).attr("data-type");
                $.ajax({
                    type: "GET",
                    url: "{{ route('tutor.setting.load.edit.time.table') }}?day="+$title+"&data_type="+$data_type,
                    beforeSend: function() {
                        loader = $(".edit_time_table_loader").html();
                        $('.edit_time_table_block').html(loader);

                        $("#accept_request_modal").modal('show');
                    },
                    success: function (response) {
                        $('.edit_time_table_block').html(response);
                        if($data_type == 1)
                        {
                            validate_time_table_off_day_form();
                            start_switch();
                            on_change_not_avalilable_option();
                        }
                        start_time_picker();
                        start_datepicker();
                    }
                });
                
            });
        }

        function on_click_specific_date_select_btn()
        {
            $(document).on("submit", '.specific_date_modal_form', function(){
                $title = $(".specific_date_select_btn").attr("data-title");
                $data_type = $(".specific_date_select_btn").attr("data-type");
                $specific_date = $(".specific_date_input").val();
                console.log($title)
                console.log($data_type)
                console.log($specific_date)
                $.ajax({
                    type: "GET",
                    url: "{{ route('tutor.setting.load.edit.time.table') }}?day="+$title+"&data_type="+$data_type+"&specific_date="+$specific_date,
                    beforeSend: function() {
                        loader = $(".edit_time_table_loader").html();
                        $('.edit_time_table_block').html(loader);
                    },
                    success: function (response) {
                        $('.edit_time_table_block').html(response);
                        start_time_picker();
                    }
                });
                
            });
        }

        // Speaking Add Mores
        $(document).on("click",".time_table_add_more_btn",function () 
        {
            speakingAddMore();
        });

        $(document).on('click', '.del-speaking', function(){
            remoeveItem($(this));
        });

        function speakingAddMore()
        {
            if($('.time_table_block .row').length != 0)
            {
                var pump_pointer = getSpeakingBlockLength();
                var content = $('#time-table-row-1').html();
                $(".time_table_block").append('<div class="row justify-content-center" id="time-table-row-'+(pump_pointer+1)+'">'+content+'</div>');
                $('#time-table-row-'+(pump_pointer + 1)).find('.speaking-item-del').removeClass("d-none");
                    start_time_picker();    
            }else{
                $clone_time_slots = $(".clone_time_slots_row").html();
                $(".time_table_block").html($clone_time_slots);
                start_time_picker();
            }
        }

        function getSpeakingBlockLength()
        {
            return $(".time_table_block .row").length;
        }

        function remoeveItem(elm)
        {
            $(elm).closest('.row').remove();
            refreshCounter(); 
        }

        function refreshCounter()
        {
            var count = 1;
            $('.time_table_block .row').each(function()
            {
                $(this).find('.item-count').text(count);
                count++;
            });
            if(limit == 10)
                $('.btn-add').fadeIn();
            limit--;
        }

        function map_time_table_data(blind)
        {
            if(blind.length > 0)
            {
                console.log(blind.length)
                for(var i = 0; i < blind.length; i++)
                {
                    $('#time-table-row-'+(i + 1)).find('[name="language[]"]').val(blind[i]['language']).change();
                    $('#time-table-row-'+(i + 1)).find('[name="level[]"]').val(blind[i]['level']).change();

                    if(i !== blind.length - 1)
                        speakingAddMore();
                }
            }
        }

        // change day then date
        $(document).on("change", ".option_day_select", function() {
           
            if($(this).val() == "all")
            {
                $(".time_table_date_column").addClass("d-none");
                $(".time_table_date_column").removeClass("d-block");
                $(".day_select_input").prop('required', false);
            }else if($(this).val() == "single"){
                $(".time_table_date_column").addClass("d-block");
                $(".time_table_date_column").removeClass("d-none");
                $(".day_select_input").prop('required', true);
            }
        });

        function call_edit_time_table_modal()
        {
            loader = $(".edit_time_table_loader").html();
            $('.edit_time_table_block').html(loader);
            $("#accept_request_modal").modal('show');
        }

        // call_edit_time_table_modal();

        function on_change_not_avalilable_option()
        {
            $(document).on("change", ".not_avalilable_option", function (e) {
                let test = e.target.checked;
                if(test)
                {
                    $(".closed_dates_block").hide();
                }else{
                    $(".closed_dates_block").show();
                }
            });
        }


        function on_click_save_time_table_btn()
        {
            $(document).on("change", ".not_avalilable_option", function (e) {
                let test = e.target.checked;
                if(test)
                {
                    $(".closed_dates_block").hide();
                }else{
                    $(".closed_dates_block").show();
                }
            });
        }
    </script>

@endsection