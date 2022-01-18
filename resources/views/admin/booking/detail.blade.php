@extends('layouts.admin')
@section('title', 'Booking Detail')
    
@section('css')
    
@endsection

@section('nav-title', 'Booking Detail')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Booking Detail</h5>
                </div>
                <div class="card-body">

                	<div class="material-datatables mt-3">
                        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>{{ $item->id }}</th>
                                </tr>
                                <tr>
                                    <th>Booking Date</th>
                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($item->status == "0")
                                            <span class="badge badge-info">Pending</span>
                                        @elseif($item->status == "1")
                                            <span class="badge badge-success">Accepted</span>
                                        @elseif($item->status == "2")
                                            <span class="badge badge-danger">Cancelled</span>
                                        @elseif($item->status == "3")
                                            <span class="badge badge-warning">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Refund Status</th>
                                    <td>
                                        @if($item->refund_status == "0")
                                            <span class="badge badge-danger">Not Requested</span>
                                        @elseif($item->refund_status == "1")
                                            <span class="badge badge-primary">Requested</span>
                                        @elseif($item->refund_status == "2")
                                            <span class="badge badge-success">Refunded</span>
                                        @endif
                                    </td>
                                </tr>
                                @if(!is_null($item->cancel_by) && $item->status == "2")
                                    <tr>
                                        <th>Cancelled By</th>
                                        <td>
                                           {{ ucfirst($item->cancel_by) }}
                                        </td>
                                    </tr>
                                @endif
                                @if(!is_null($item->cancel_reason) && $item->status == "2")
                                    <tr>
                                        <th>Cancellation  Reason</th>
                                        <td>
                                            {{ Str::limit($item->cancel_reason, 4) }}
                                            @if(strlen($item->cancel_reason) > 5)
                                                <a href="javascript:void(0);" class="read_more" data-value="{{ $item->cancel_reason }}">read more</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>Student</th>
                                    <td>{{ $item->student->name }}</td>
                                </tr>
                                <tr>
                                    <th>Teacher</th>
                                    <td>{{ $item->tutor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Lesson</th>
                                    <td>{{ $item->student_package->tutor_lesson->title ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>Package Interval</th>
                                    <td>{{ $item->student_package->tutor_lesson_package->interval }}</td>
                                </tr>
                                <tr>
                                    <th>Slot</th>
                                    <td>{{ $item->start_time ?? '' }} - {{ $item->end_time ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>Package</th>
                                    <td>{{ $item->student_package->total_lessons }} Lessons</td>
                                </tr>
                                
                                <tr>
                                    <th>Total Amount</th>
                                    <td>{{ $item->tutor_amount ?? '0' }}</td>
                                </tr>

                                <tr>
                                    <th>Teacher Amount</th>
                                    <td>{{ $item->tutor_amount ?? '0' }}</td>
                                </tr>

                                <tr>
                                    <th>Admin Amount</th>
                                    <td>{{ $item->amount - $item->tutor_amount ?? '0' }}</td>
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

@endsection

@section('js')
    <script>
        $(document).on("click", ".read_more", function(){
            $message = $(this).attr("data-value");
            $("#contactMessage").html($message);
            $("#readMoreModal").modal("show");
        });

        $(document).on("click", ".check_in_loc", function(){
            $("#locationMap").modal("show");
        });

        @if(!is_null($item->seller_lat) && !is_null($item->seller_long))
            var map;
            
            function initMap() {
                var latitude = {{ $item->seller_lat }}; // YOUR LATITUDE VALUE
                var longitude = {{ $item->seller_long }}; // YOUR LONGITUDE VALUE

                var myLatLng = {lat: latitude, lng: longitude};

                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 14
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: latitude + ', ' + longitude
                });
            }
        @endif
    </script>
    @if(!is_null($item->seller_lat) && !is_null($item->seller_long))
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&callback=initMap"
        async defer></script>
    @endif
@endsection