@extends("layouts.tutor")
@section("title", 'Student Lessons')

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="row clearfix">
            <div class="col-md-12">
                <h5 class="mb-3">Student Lessons</h5>
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
                                        <th>Lesson Title</th>
                                        <td>{{ $student_package->tutor_lesson->title ?? '' }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        
                    </div>
                </div>
                @if($list->count() > 0)
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table data_table">
                                    <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Date</th>
                                        <th>Slots</th>
                                        <th>Student</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td> {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </td>
                                            <td> {{ $item->start_time }} - {{ $item->end_time }} </td>
                                            <td> {{ $item->student->name ?? '' }} </td>
                                            <td>
                                                @if($item->status == '0')
                                                    <span class="badge badge-info">Pending</span>
                                                @elseif($item->status == '1')
                                                    <span class="badge badge-warning">Active</span>
                                                @elseif($item->status == '2')
                                                    <span class="badge badge-danger">Cancelled</span>
                                                    @elseif($item->status == '3')
                                                    <span class="badge badge-success">Success</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                @else
                    <div class="no-results">
                        <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
                        <h2>No Lessons Found</h2>
                    </div>
                @endif
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