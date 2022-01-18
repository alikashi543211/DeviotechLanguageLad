@extends("front.tutor_application.layout")

@section('title', 'Certificate')

@section('css')
    
    <style>
        .btn-outline-success:hover {
            color: #28a745;
            background-color: #ffffff;
            border-color: #28a745;
        }
    </style>

@endsection

@section('application-content')
    <!-- Login Form -->
    <div class="styled-form">
        <section class="student-profile-section p-4 bg-white resume_section">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5 class="mb-0">Education</h5>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 certificate_block">
                    @foreach(auth_user()->tutor_education as $item)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div>
                                    <p class="mb-0">{{ $item->from }} {{ $item->to ? ' - '.$item->to : '' }}</p>
                                    <span class="btn btn-sm btn-outline-success">Approved</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <p class="mb-0">{{ $item->degree }}</p>
                                <p class="mb-0">{{ $item->institution }}</p>
                                <p class="mb-0 text-success">
                                    <a href="{{ asset($item->attachment) }}" class="text-success" target="_blank">Degree uploaded</a>
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                <div class="d-flex pull-right">
                                    <a href="javascript:void(0);" class="profile_ancor accept_icon_btn_education" data-id="{{ $item->id }}" data-main-title="Edit Education" data-button-title="Update">Edit</a>
                                    <span class="hyphen-orange"> - </span>
                                    <a href="javascript:void(0);" class="profile_ancor" title="Remove Education" data-title="Are you sure want to remove education?" data-href="{{ route('tutor.application.delete.education', $item->id) }}" class="btn btn-danger mr-1" id="check-in-location-view">Remove</a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a href="javascript:void(0);" id="accept_icon_btn_education" data-main-title="Add Education" data-button-title="Add" class="profile_ancor">+ Add</a>
                    <br><br><br><br>
                </div>

                <!-- Experiance -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5 class="mb-0">Work Experience</h5>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 certificate_block">
                    @foreach(auth_user()->tutor_experience as $item)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div>
                                    <p class="mb-0">{{ $item->from }} {{ $item->to ? ' - '.$item->to : '' }}</p>
                                    <span class="btn btn-sm btn-outline-success">Approved</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <p class="mb-0">{{ $item->designation }}</p>
                                <p class="mb-0">{{ $item->company }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                <div class="d-flex pull-right">
                                    <a href="javascript:void(0);" class="profile_ancor accept_icon_btn_experience" data-id="{{ $item->id }}" data-main-title="Edit Experience" data-button-title="Update">Edit</a>
                                    <span class="hyphen-orange"> - </span>
                                    <a href="javascript:void(0);" class="profile_ancor" title="Remove Experience" data-title="Are you sure want to remove experience?" data-href="{{ route('tutor.application.delete.experience', $item->id) }}" class="btn btn-danger mr-1" id="check-in-location-view">Remove</a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a href="javascript:void(0);" id="accept_icon_btn_experience" data-main-title="Add Experience" data-button-title="Add" class="profile_ancor">+ Add</a>
                </div>
                @if(auth_user()->tutor_education->count() > 0 && auth_user()->tutor_experience->count() > 0)
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-5 text-center">
                        <a href="{{ route('tutor.application.finish') }}?app=complete">
                            <button type="button" class="theme-btn btn-style-three"><span class="txt">Next <i class="fa fa-angle-right"></i></span></button>
                        </a>
                    </div>
                @else
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                        <p class="text-danger">
                            Please add at least one education and one experience to finish.
                        </p>
                    </div>
                @endif
            </div>
        </section>
    </div>


    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="add_education_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <div class="styled-form">
                    <form action="{{ route('tutor.application.education.save') }}" method="POST" class="custom-offer-form accept_request_modal education_form" enctype="multipart/form-data">
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
                    <form action="{{ route('tutor.application.experience.save') }}" method="POST" class="custom-offer-form accept_request_modal experience_form" enctype="multipart/form-data">
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
@section('application-js')
    <script>

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

        $(document).on("click", '#check-in-location-view', function(){
            $url = $(this).attr("data-href");
            $title = $(this).attr("data-title");
            $(".popup_title").html($title);
            $main_title = $(this).attr("title");
            $(".main_title").html($main_title);
            $(".delete_btn").attr("href", $url);
            $("#sellerLocationModal").modal("show");
        });

        $(document).on("click", '.accept_icon_btn_education', function(){
            var data_main_title = $(this).attr('data-main-title');
            var data_button_title = $(this).attr('data-button-title');
            $(".education_data_main_title").html(data_main_title);
            $(".education_data_button_title").html(data_button_title);
            var data_id = $(this).attr('data-id');
            $.get( "{{ route('tutor.application.load.education.edit') }}?id="+data_id, function( data ) {
                $(".education_modal_body").html(data);
                start_certificate_datepicker(); 
                start_pdf_dropify();
                start_switch();
                $("#add_education_modal").modal("show");
            });

        });

        $(document).on("click", '.accept_icon_btn_experience', function(){
            var data_id = $(this).attr('data-id');
            var data_main_title = $(this).attr('data-main-title');
            var data_button_title = $(this).attr('data-button-title');
            $(".experience_data_main_title").html(data_main_title);
            $(".experience_data_button_title").html(data_button_title);
            $.get( "{{ route('tutor.application.load.experience.edit') }}?id="+data_id, function( data ) {
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

        function start_switch()
        {
            $(function(){ $('.switch_on_off').bootstrapToggle() });
        }

    </script>
@endsection