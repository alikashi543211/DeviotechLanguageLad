@extends('layouts.admin')
@section('title', 'Tutor Detail')
@section('nav-title', 'Tutor Detail')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">Profile Information</h5>
                    </div>
                    <div class="card-body">

                    	<div class="material-datatables mt-3">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th><img src="{{ asset($item->tutor_profile->image ?? 'default.png') }}" height="100" width="100"></th>
                                    </tr>
                                    <tr>
                                        <th>Tutor ID</th>
                                        <td>{{ $item->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Native Language</th>
                                        <td>{{ $item->tutor_profile->native_language ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>{{ $item->tutor_profile->country ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lives in</th>
                                        <td>{{ $item->tutor_profile->lives_in ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Timezone</th>
                                        <td>{{ $item->timezone ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Hourly Rate</th>
                                        <td>{{ '$'.$item->tutor_profile->hourly_rate ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profile Description</th>
                                        <td>
                                            @if(!is_null($item->tutor_profile->description))
                                                {{ Str::limit($item->tutor_profile->description, 10) }} <a href="javascript:void(0);" class="read_more" data-value="{{ $item->tutor_profile->description }}">read more</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Free Trial</th>
                                        <td>
                                            @if($item->tutor_profile->is_free_trial == false)
                                                <span class="badge badge-info">No</span>
                                            @endif

                                            @if($item->tutor_profile->is_free_trial == true)
                                                <span class="badge badge-success">Yes</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Video Link</th>
                                        <td>
                                            @if(!is_null($item->tutor_profile->embed_video_url))
                                                {{ Str::limit($item->tutor_profile->embed_video_url, 4) }}
                                                @if(strlen($item->tutor_profile->embed_video_url) > 5)
                                                    <a href="javascript:void(0);" class="read_more" data-value="{{ $item->tutor_profile->embed_video_url }}">read more</a>  
                                                @endif
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tutor Speaks</th>
                                        <td>
                                            @if($item->tutor_speaks->count() > 0)
                                                @foreach($item->tutor_speaks as $user_item)
                                                    {{ $user_item->language }} @if($loop->iteration == $loop->last)  @else , @endif
                                                @endforeach
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($item->tutor_profile->is_approved == '0')
                                                <span class="badge badge-info">Pending</span>
                                            @elseif($item->tutor_profile->is_approved == '1')
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($item->tutor_profile->is_approved == '2')
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">Education</h5>
                    </div>
                    <div class="card-body">
                        @if($item->tutor_education->count() > 0)
                            <div class="material-datatables mt-3">
                                <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Degree</th>
                                            <th>Institution</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($item->tutor_education as $education)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $education->from ?? '' }}</td>
                                                <td>{{ $education->to ?? '' }}</td>
                                                <td>{{ $education->degree ?? '' }}</td>
                                                <td>{{ $education->institution ?? '' }}</td>
                                                <td>
                                                    @if(isset($education->attachment))
                                                        <a class="btn btn-primary btn-sm" target="_blank" href="{{ asset($education->attachment) }}">
                                                            View attachment
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach     
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No Education Found
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">Experience</h5>
                    </div>
                    <div class="card-body">
                        @if($item->tutor_experience->count() > 0)
                            <div class="material-datatables mt-3">
                                <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Designation</th>
                                            <th>Company</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($item->tutor_experience as $exp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exp->from ?? '' }}</td>
                                                <td>{{ $exp->to ?? '' }}</td>
                                                <td>{{ $exp->designation ?? '' }}</td>
                                                <td>{{ $exp->company ?? '' }}</td>
                                            </tr>
                                        @endforeach     
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No Experience Found
                            </div>
                        @endif
                    </div>
                </div>    

                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">Lessons</h5>
                    </div>
                    <div class="card-body">
                        @if($item->tutor_lessons->count() > 0)
                            <div class="material-datatables mt-3">
                                <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Language</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($item->tutor_lessons as $lesson)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lesson->title ?? '' }}</td>
                                                <td>{{ $lesson->language ?? '' }}</td>
                                                <td>{{ $lesson->category ?? '' }}</td>
                                                <td>
                                                    @if($lesson->availability == '0')
                                                        <span class="badge badge-warning">Not Active</span>
                                                    @elseif($lesson->availability == '1')
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach     
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No Lessons Found
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal For Message Show -->
    <div class="modal fade" id="readMoreModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p id="contactMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 </div>
            </div>
        </div>
    </div>

    <!-- Seller Location Modal -->
    <div class="modal fade" id="locationMap" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="margin-top:-20px;">
                    <h3>Seller Location</h3>
                </div>
                <div id="map-body" class="modal-body" style="margin-top: -100px;">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <div id="map" style="width: 100%; height: 290px;"></div>
                        </div>
                        <style>.mapouter{position:relative;text-align:right;height: 290px;}.gmap_canvas {overflow:hidden;background:none!important; height: 290px}</style>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 </div>
            </div>
        </div>
    </div>

    <!-- Lesson Detail -->
@endsection

@section('js')
    <script>
        $(document).on("click", ".read_more", function(){
            $message = $(this).attr("data-value");
            $("#contactMessage").html($message);
            $("#readMoreModal").modal("show");
        });
    </script>
@endsection