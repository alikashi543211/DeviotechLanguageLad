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
                            <a href="javascript:void(0);" class="profile_ancor" title="Remove Education" data-title="Are you sure want to remove education?" data-href="{{ route('tutor.profile.delete.education', $item->id) }}" class="btn btn-danger mr-1" id="check-in-location-view">Remove</a>
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
                            <a href="javascript:void(0);" class="profile_ancor" title="Remove Experience" data-title="Are you sure want to remove experience?" data-href="{{ route('tutor.profile.delete.experience', $item->id) }}" class="btn btn-danger mr-1" id="check-in-location-view">Remove</a>
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
    </div>
</section>