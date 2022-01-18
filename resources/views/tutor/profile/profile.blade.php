@extends("layouts.tutor")

@section("title", 'Profile')

@section('css')
    
    <style>
        .btn-outline-success:hover {
            color: #28a745;
            background-color: #ffffff;
            border-color: #28a745;
        }
    </style>

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
                                
                                <li data-tab="#general_info" class="tab-btn active-btn">
                                    <a data-toggle="tab" href="#general_info">General Info</a>
                                </li>

                                <li data-tab="#certificate" class="tab-btn">
                                    <a data-toggle="tab" href="#certificate">Resume & Certificate</a>
                                </li>

                                <li data-tab="#password_tab" class="tab-btn">
                                    <a data-toggle="tab" href="#password_tab">Password</a>
                                </li>

                            </ul>
                            <div class="tabs-content">
                                <div class="tab active-tab" id="general_info">

                                </div>

                                <div class="tab" id="certificate">

                                </div>

                                <div class="tab" id="password_tab">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="add_education_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="{{ route('tutor.profile.education.save') }}" method="POST" class="custom-offer-form accept_request_modal education_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title main_title education_data_main_title" id="exampleModalLongTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body education_modal_body" id="seller-location-body">
                            <div class="row">
                                <!-- Form Group -->
                                <div class="col-lg-12 col-md-12 col-sm-12 time_table_block">
                                    <div class="row" id="">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <input type='text' class="form-control certificate_datepicker text-center" name="from" value="" autocomplete="off" required placeholder="From year">
                                            <span class="invalid-feedback">
                                                @error('from')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 to_year">
                                            <input type='text' class="form-control certificate_datepicker text-center to_year_input" name="to" value="" autocomplete="off" placeholder="To year">
                                            <span class="invalid-feedback">
                                                @error('to')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form_group_margin">
                                            <label>Present ?</label>
                                             <input type="checkbox" name="availability" data-width="100" data-on="Yes" data-off="No" data-toggle="toggle" class="availability" data-onstyle="primary">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <input type='text' class="form-control" placeholder="Diploma or degree" name="degree" autocomplete="off" required>
                                            <span class="invalid-feedback">
                                                @error('degree')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <input type='text' class="form-control" placeholder="Institution " name="institution" autocomplete="off" required>
                                            <span class="invalid-feedback">
                                                @error('institution')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-6 col-sm-12">
                                            <label>Attachment<span> (Pdf of degree)*</label>
                                            <input type="file" name="attachment" class="pdf_dropify @error('attachment') error @enderror" accept=".pdf" required="true" data-allowed-file-extensions='["pdf"]'>
                                            <span class="invalid-feedback">
                                                @error('attachment')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary education_data_button_title"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_experience_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="{{ route('tutor.profile.experience.save') }}" method="POST" class="custom-offer-form accept_request_modal experience_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="hidden_day" name="day" value="">
                        <div class="modal-header">
                            <h5 class="modal-title main_title experience_data_main_title" id="exampleModalLongTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body experience_modal_body" id="seller-location-body">
                            <div class="row">
                                <!-- Form Group -->
                                <div class="col-lg-12 col-md-12 col-sm-12 time_table_block">
                                    <div class="row" id="">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <input type='text' class="form-control certificate_datepicker text-center" name="from" value="" autocomplete="off" required placeholder="From year">
                                            <span class="invalid-feedback">
                                                @error('from')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 to_year">
                                            <input type='text' class="form-control certificate_datepicker text-center to_year_input" name="to" value="" autocomplete="off" placeholder="To year">
                                            <span class="invalid-feedback">
                                                @error('to')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form_group_margin">
                                            <label>Present ?</label>
                                             <input type="checkbox" name="availability" data-width="100" data-on="Yes" data-off="No" data-toggle="toggle" class="availability" data-onstyle="primary">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <input type='text' class="form-control" placeholder="Designation" name="designation" autocomplete="off" required>
                                            <span class="invalid-feedback">
                                                @error('designation')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <input type='text' class="form-control" placeholder="Company name " name="company" autocomplete="off" required>
                                            <span class="invalid-feedback">
                                                @error('company')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary experience_data_button_title"></button>
                        </div>
                    </form>
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
                        <h5 class="modal-title main_title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        <span class="popup_title"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="" class="delete_btn"><button type="button" class="btn btn-danger">Yes</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>

        load_general_info("{{ route('tutor.profile.load.general_info') }}", '#general_info');
        load_certificate("{{ route('tutor.profile.load.certificate') }}", '#certificate');
        load_password_tab("{{ route('tutor.profile.load.password') }}", '#password_tab');

        function load_general_info($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);

                    // Jquery Operations
                    validate_general_info_form();
                    // Display Saved Data
                    var speaking_data = <?php echo json_encode(auth()->user()->tutor_speaks->toArray()) ?>;
                    map_speaking_data(speaking_data);
                    
                    var data = <?php echo json_encode(tutor()) ?>;
                    editMapGeneralInfo(data);
                    @if(!is_null(session('website_currency')))
                        update_website_currency("{{ session('website_currency') }}");
                    @endif
                    
                }
            });
        }

        function load_certificate($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);

                    // Jquery operations
                    validate_certificate_form();
                    start_dropify();
                    start_datepicker();
                    start_certificate_datepicker();
                    start_pdf_dropify();
                    // var data = <?php echo json_encode(auth()->user()->tutor_certificate) ?>;
                    // editMapCertificateData(data);

                }
            });
        }

        function load_password_tab($url, $tab)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $($tab).html(response);
                    
                    // Validation
                    validate_password_form();
                }
            });
        }

        // Other Jquery Functionalities

        function editMapGeneralInfo(data)
        {
            $.map(data, function(value, index){
                if(index == 'hourly_rate')
                {
                    $('[name="'+index+'"]').attr('amount-usd', value);
                }
                var input = $('[name="'+index+'"]');
                if($(input).length && $(input).attr('type') !== 'file')
                {
                if(($(input).attr('type') == 'radio' || $(input).attr('type') == 'checkbox') && value == $(input).val())
                    $(input).prop('checked', true);
                else
                    $(input).val(value).change();
                }
            });
        }

        // Speaking Add Mores
        $(document).on("click",".speaking_add_more_btn",function () 
        {
            speakingAddMore();
        });

        $(document).on('click', '.del-speaking', function(){
            remoeveItem($(this));
        });

        function speakingAddMore()
        {
            var pump_pointer = getSpeakingBlockLength();
            var content = $('#speaking-row-1').html();
            $(".speaking_block").append('<div class="row px-4" id="speaking-row-'+(pump_pointer+1)+'">'+content+'</div>');
            $('#speaking-row-'+(pump_pointer + 1)).find('.speaking-item-del').removeClass("d-none");
            $('#speaking-row-'+(pump_pointer+1)).find('.language_input').attr("name", "language["+ pump_pointer +"]");
            $('#speaking-row-'+(pump_pointer+1)).find('.level_input').attr("name", "level["+ pump_pointer +"]");
        }

        function getSpeakingBlockLength()
        {
            return $(".speaking_block .row").length;
        }

        function remoeveItem(elm)
        {
            $(elm).closest('.row').remove();
            refreshCounter(); 
        }

        function refreshCounter()
        {
            var count = 1;
            $('.speaking_block .row').each(function()
            {
                $(this).find('.item-count').text(count);
                count++;
            });
            if(limit == 10)
                $('.btn-add').fadeIn();
            limit--;
        }

        function map_speaking_data(blind)
        {
            if(blind.length > 0)
            {
                console.log(blind.length)
                for(var i = 0; i < blind.length; i++)
                {
                    $('#speaking-row-'+(i + 1)).find('[name="language['+ i +']"]').val(blind[i]['language']).change();
                    $('#speaking-row-'+(i + 1)).find('[name="level['+ i +']"]').val(blind[i]['level']).change();

                    if(i !== blind.length - 1)
                        speakingAddMore();
                }
            }
        }

        // Tutor Video Embed Url
        function getUrlVars(url)
        {
            var vars = [], hash;
            var hashes = url.slice(url.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }

        $(document).on("keyup", "#video_url", function(e){
            e.preventDefault();
            var val = $(this).val();
            if(val !== '')
            {
                var queryStrings = getUrlVars(val);
                url = '';
                if(queryStrings.v !== 'undefined')
                {
                    var url = "https://www.youtube.com/embed/"+queryStrings.v;
                    $('#embed_video_url').val(url);
                }else{
                    $('#embed_video_url').val('');
                }
                $(".iframe-append").append('<iframe width="400px" height="250px" src="'+url+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
            }else{
                $('#embed_video_url').val('');
            }
        });

        // Display Certificate Data Function
        function editMapCertificateData(data)
        {
            $.map(data, function(value, index){
                var input = $('[name="'+index+'"]');
                if($(input).length && $(input).attr('type') !== 'file')
                {
                if(($(input).attr('type') == 'radio' || $(input).attr('type') == 'checkbox') && value == $(input).val())
                    $(input).prop('checked', true);
                else
                    $(input).val(value).change();
                }
            });
        }

        // Jquery General Info Form Validator
        function validate_general_info_form()
        {
            $(".general_info_form").validate({
                rules: {
                    @if(!isset(tutor()->image))
                        image: {
                            required: true,
                        },
                    @endif
                    name: {
                            required: true,
                            regex: "^[a-zA-Z0-9_ .+-]*(?:[a-zA-Z][a-zA-Z0-9_ .+-]*){2,}$",
                        },
                    email: {
                            required: true,
                            email: true,
                        },
                    native_language: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    lives_in: {
                        required: true,
                    },
                    timezone: {
                        required: true,
                    },
                    language : {
                        required: true,
                    },
                    level : {
                        required: true,
                    },
                    video_url : {
                        youtube: "#video_url"
                    }
                },
                messages: {
                    name: {
                            required: 'Enter your name',
                            regex: 'Name must have at least two letters',
                        },
                    email: {
                            required: 'Enter your email address',
                            email: 'Enter a valid email address',
                        },
                    image: {
                        required: 'Upload your profile image',
                    },
                    native_language: {
                        required: 'Select your native language',
                    },
                    name: {
                        required: 'Enter your name',
                        regex: 'Name must have at least two letters',
                    },
                    email: {
                        required: 'Enter your email address',
                        email: 'Enter a valid email address',
                    },
                    country: {
                        required: 'Enter your country name',
                    },
                    lives_in: {
                        required: 'Enter your city',
                    },
                    password: {
                        required: 'Enter your password',
                        regex: 'Must Be 8 Characters Contains At Least One Capital Letter, One Lower Case Letter, One Digit',
                        min: 'Should be Minimum 8 Characters',
                        max: 'Should be Maximum 8 Characters',
                    },
                    password_confirmation: {
                        required: 'Re-enter your password',
                        equalTo: 'Confirm your password',
                    },
                    timezone: {
                        required: 'Select your timezone',
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
        }

        // Jquery Certificate Form Validation
        function validate_certificate_form()
        {
            
        }

        // validation password form
        function validate_password_form()
        {
            $(".change_password_form").validate({
                rules: {
                    old_password: {
                        required: true,
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
                    old_password: {
                        required: 'Enter your password',
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
        }

        // active the nav tab
        $(document).ready(function(){
            activeTab('{{ request()->tab }}');
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

        // Jquery For Availability Tab
        $(document).on("change", "#availability", function(){
            $.get('{{ route("tutor.setting.free.trial") }}', function(response){
                toastr.success(response);
                // setTimeout(function () { location.reload(true); }, 2000);
            });
        });


        // Open Modal for education
        // Accept Request
        $(document).on("click", '#accept_icon_btn_education', function(){
            start_certificate_datepicker(); 
            start_pdf_dropify();
            $(".availability").click();
            var data_main_title = $(this).attr('data-main-title');
            var data_button_title = $(this).attr('data-button-title');
            $(".education_data_main_title").html(data_main_title);
            $(".education_data_button_title").html(data_button_title);
            $("#add_education_modal").modal("show");
        });

        $(document).on("click", '.accept_icon_btn_education', function(){
            var data_main_title = $(this).attr('data-main-title');
            var data_button_title = $(this).attr('data-button-title');
            $(".education_data_main_title").html(data_main_title);
            $(".education_data_button_title").html(data_button_title);
            var data_id = $(this).attr('data-id');
            $.get( "{{ route('tutor.profile.load.education.edit') }}?id="+data_id, function( data ) {
                $(".education_modal_body").html(data);
                start_certificate_datepicker(); 
                start_pdf_dropify();
                start_switch();
                $("#add_education_modal").modal("show");
            });

        });

        $(document).on("click", '#accept_icon_btn_experience', function(){
            start_certificate_datepicker(); 
            start_pdf_dropify();
            $(".availability").click();
            var data_main_title = $(this).attr('data-main-title');
            var data_button_title = $(this).attr('data-button-title');
            $(".experience_data_main_title").html(data_main_title);
            $(".experience_data_button_title").html(data_button_title);
            $("#add_experience_modal").modal("show");
        });

        $(document).on("click", '.accept_icon_btn_experience', function(){
            var data_id = $(this).attr('data-id');
            var data_main_title = $(this).attr('data-main-title');
            var data_button_title = $(this).attr('data-button-title');
            $(".experience_data_main_title").html(data_main_title);
            $(".experience_data_button_title").html(data_button_title);
            $.get( "{{ route('tutor.profile.load.experience.edit') }}?id="+data_id, function( data ) {
                $(".experience_modal_body").html(data);
                start_certificate_datepicker(); 
                start_pdf_dropify();
                start_switch();
                $(".availability").click();
                $("#add_experience_modal").modal("show");
            });
            
        });

        $(document).on('change', '.availability', function (e) {
            console.log("working jquyer");
            let test = e.target.checked;
            if(test)
            {
                $(".to_year").addClass('d-none');
                $(".to_year").removeClass('d-block');
            }else{
                $(".to_year").removeClass('d-none');
                $(".to_year").addClass('d-block');
            }
        });

        $(document).on("click", '#check-in-location-view', function(){
            $url = $(this).attr("data-href");
            $title = $(this).attr("data-title");
            $(".popup_title").html($title);
            $main_title = $(this).attr("title");
            $(".main_title").html($main_title);
            $(".delete_btn").attr("href", $url);
            $("#sellerLocationModal").modal("show");
        });
    </script>
@endsection