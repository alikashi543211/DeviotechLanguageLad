@extends("front.tutor_application.layout")

@section('title', 'General Info')

@section('application-content')
    <div class="col-md-12 text-center">
        <h5>General Information</h5>
    </div>
    <!-- Login Form -->
    <div class="styled-form">
        <form method="post" action="{{ route('tutor.application.general.save') }}" enctype="multipart/form-data" class="validate_my_form">
            @csrf
            <input type="hidden" name="id" value="">
            <input type="hidden" name="role" value="tutor" />
            <div class="row clearfix">
                <!-- Form Group -->
                <!-- <div class="col-lg-4 col-md-4 col-sm-12"></div> -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12 mb-3 text-center">
                            <div class="image_input_div">
                                <label for="file_input" class="image_label">
                                    <img src="{{ asset(tutor()->image ?? 'default.png') }}" id="flag_imgg">
                                    <div class="upload-icon">
                                       <img src="{{ asset('camera.png') }}" class="camera_layer">
                                    </div>
                                </label>
                                <input style="display:none;" type="file" name="image" class="@error('image') error @enderror" accept="image/*" id="file_input">
                            </div>
                                <label>Upload Your Profile Image*</label>
                                <span class="invalid-feedback">
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                            
                        </div>
                        <div class="col-lg-4 col-md-4">
                        </div>
                    </div>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label>Native language*</label>
                    <select name="native_language">
                        <option value="">Choose</option>
                        @foreach(language_dropdown() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">
                        @error('native_language')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label>Country*</label>
                    <select name="country">
                        <option value="">Choose</option>
                        @foreach(countries() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">
                        @error('country')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                
                <!-- Form Group -->
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label>Lives in*</label>
                    <input type="text" name="lives_in" class="@error('lives_in') error @enderror" placeholder="City, Country" >
                    <span class="invalid-feedback">
                        @error('lives_in')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 mt-2 teacher-availability-section">
                    <p class="clearfix mb-2 font-weight-bold">
                        Do you want to offer trial lesson ?
                        <label class="switch pull-right">
                            <input type="checkbox" value="1" name="availability" id="availability" @if(auth_user()->tutor_profile->is_free_trial == 1) checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </p>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label>Trial Rate* (<span class="website_currency_code">USD</span>)</label>
                    <input type="text" name="hourly_rate" class="numbers website_amount_input_usd @error('hourly_rate') error @enderror" placeholder="i.e 100" >
                    <span class="invalid-feedback">
                        @error('hourly_rate')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>

                <!-- Form Group -->
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label>Description*</label>
                    <textarea name="description" class="@error('description') error @enderror" placeholder=""></textarea>
                    <span class="invalid-feedback">
                        @error('training')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>

                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-12 speaking_block bg_theme p-4">
                    <div class="row px-4" id="speaking-row-1">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="text text-danger pull-right speaking-item-del d-none del-speaking">
                                <i class="fa fa-times"></i>
                            </h4>
                        </div> 
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Languages I speak*</label>
                            <select name="language[0]" class="language_input" required="true">
                                <option value="">Choose</option>
                                @foreach(language_dropdown() as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback">
                                @error('language')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Level*</label>
                            <select name="level[0]" class="level_input" required="true">
                                <option value="">Choose</option>
                                <option>A1: Begineer</option>
                                <option>A2: Elementry</option>
                                <option>B1: Intermediate</option>
                                <option>B2: Upper Intermediate</option>
                                <option>C1: Advanced</option>
                                <option>C2: Proficient</option>
                                <option>Native</option>
                            </select>
                            <span class="invalid-feedback">
                                @error('level')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-12 bg_theme p-4 pt-0">
                    <div class="clearfix">
                        <a class="pull-right speaking_add_more_btn">Add more +</a>
                    </div>
                    <span class="invalid-feedback">
                        @error('language')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="row">
                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        
                    </div>
                    <div class="col-lg-1 col-md-1"></div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                    <button type="submit" class="theme-btn btn-style-three save-general-btn"><span class="txt">Next <i class="fa fa-angle-right"></i></span></button>
                    
                </div>
                
            </div>
            
        </form>
    </div>
@endsection

@section('application-js')
    <script>
        
        // Jquery Validator
        $(".validate_my_form").validate({
            rules: {
                @if(!isset(tutor()->image))
                image: {
                    required: true,
                },
                @endif
                native_language: {
                    required: true,
                },
                description: {
                    required: true,
                    minlength: 100,
                },
                hourly_rate: {
                    required: true,
                    notOnlyZero: '0',
                },
                country: {
                    required: true,
                },
                lives_in: {
                    required: true,
                },
            },
            messages: {
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
                description: {
                    required: 'Enter your profile description',
                    minlength: 'Description must be at least 100 characters'
                },
                hourly_rate: {
                    required: 'Enter your hourly rate',
                    notOnlyZero: 'Enter your hourly rate'
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

        @if(Auth::check())
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
            var data = <?php echo json_encode(tutor()) ?>;
            editMapGeneralInfo(data);

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

            var speaking_data = <?php echo json_encode(auth()->user()->tutor_speaks->toArray()) ?>;
            map_speaking_data(speaking_data);
        @endif

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


    </script>
@endsection