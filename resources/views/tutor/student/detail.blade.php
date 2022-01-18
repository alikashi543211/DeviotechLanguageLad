@extends("layouts.tutor")
@section("title", 'Student Detail')

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="row clearfix">
            <div class="col-md-12">
                <h5 class="mb-3">Student Detail</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Package ID</th>
                                        <td>{{ $student_package->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student</th>
                                        <td>{{ $student_package->student->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lesson Title</th>
                                        <td>{{ $student_package->tutor_lesson->title ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Lessons</th>
                                        <td>{{ $student_package->total_classes }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lesson Interval</th>
                                        <td>{{ $student_package->tutor_lesson_package->interval ?? ''  }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Remaining Lessons</th>
                                        <td>{{ $student_package->remaining_classes }}</td>
                                    </tr>
                                    <tr>
                                        <th>Classes Pending</th>
                                        <td>{{ $student_package->booking_requests->where('status', '0')->count() ?? '0' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Classes Active</th>
                                        <td>{{ $student_package->booking_requests->where('status', '1')->count() ?? '0' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Classes Cancelled</th>
                                        <td>{{ $student_package->booking_requests->where('status', '2')->count() ?? '0' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Classes Completed</th>
                                        <td>{{ $student_package->booking_requests->where('status', '3')->count() ?? '0' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Amount Paid</th>
                                        <td>
                                            <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $student_package->total_amount_paid }}">{{ $student_package->total_amount_paid }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Amount Refunded</th>
                                        <td>
                                            <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $student_package->total_amount_refunded }}">{{ $student_package->total_amount_refunded }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($student_package->status == '1')
                                                <span class="badge badge-success">Active</span>
                                            @elseif($student_package->status == '2')
                                                <span class="badge badge-warning">Completed</span>
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

    <!-- Delete Lesson Modal Modal -->
    <div class="modal fade" id="sellerLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content dashboard-section p-0">
                <form action="" method="POST" class="custom-offer-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Lesson</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seller-location-body">
                        Are you sure to delete ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="delete_btn"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Lesson Detail -->
    <div class="modal fade" id="lessonDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
    </div>
@endsection

@section('js')
    <script>
        start_data_table();
    </script>
@endsection