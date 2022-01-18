@extends('layouts.admin')
@section('title', 'Student Detail')
@section('nav-title', 'Student Detail')
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
                                    <th><img src="{{ asset($item->student_profile->image ?? 'default.png') }}" height="100" width="100"></th>
                                </tr>
                                <tr>
                                    <th>Student ID</th>
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
                                    <td>{{ $item->student_profile->native_language ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $item->student_profile->country ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Lives in</th>
                                    <td>{{ $item->student_profile->lives_in ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Timezone</th>
                                    <td>{{ $item->timezone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Student Speaks</th>
                                    <td>
                                        @if($item->student_speaks->count() > 0)
                                            @foreach($item->student_speaks as $user_item)
                                                {{ $user_item->language }} @if($loop->iteration == $loop->last)  @else , @endif
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal For Message Show -->
<!-- Modal -->
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
<div class="modal fade" id="lessonDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
</div>

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