@extends("layouts.student")
@section("title", 'Profile')

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
                                    <a data-toggle="tab" href="#general_info">Profile Info</a>
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
@endsection
@section('js')
    <script>

        load_general_info("{{ route('student.profile.load.general_info') }}", '#general_info');
        load_password_tab("{{ route('student.profile.load.password') }}", '#password_tab');

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
                    var speaking_data = <?php echo json_encode(auth()->user()->student_speaks->toArray()) ?>;
                    map_speaking_data(speaking_data);
                    
                    var data = <?php echo json_encode(student()) ?>;
                    editMapGeneralInfo(data);

                    var data = <?php echo json_encode(auth()->user()) ?>;
                    editMapGeneralInfo(data);
                    
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

        

        // Jquery General Info Form Validator
        function validate_general_info_form()
        {
            $(".general_info_form").validate({
                rules: {
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
                    timezone: {
                        required: 'Select your timezone',
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

        // validation password form
        function editMapGeneralInfo(data)
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

        $(document).on("click", ".speaking_add_more_btn", function () 
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
            $('#speaking-row-'+(pump_pointer+1)).find('.speaking-item-del').removeClass("d-none");
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

        function editMapProfileInfo(data)
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

        @if($errors->has('language'))
            toastr.error("{{ $errors->first('language') }}");
        @endif
    </script>
@endsection