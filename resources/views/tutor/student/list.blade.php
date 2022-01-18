@extends("layouts.tutor")
@section("title", 'Students')

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="row clearfix">
            <div class="col-md-12">
                <h5 class="mb-3">My Students</h5>
                @if($list->count() > 0)
                    <div class="card">
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table data_table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Teacher</th>
                                        <th>Lesson</th>
                                        <th>Total Lessons</th>
                                        <th>Remaining Lessons</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->student->name }}</td>
                                            <td>{{ $item->tutor_lesson->title ?? ''  }}</td>
                                            <td>{{ $item->total_classes ?? ''  }}</td>
                                            <td>{{ $item->remaining_classes ?? ''  }}</td>
                                            <td>
                                                <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->total_amount_paid ?? '0' }}">{{ $item->total_amount_paid ?? '0' }}</span>
                                            </td>
                                            <td>
                                                @if($item->remaining_classes > 0)
                                                    <span class="badge badge-success">Active</span>
                                                @elseif($item->remaining_classes == 0)
                                                    <span class="badge badge-warning">Completed</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('tutor.students.detail', $item->id) }}" title="View Detail" data-title="Are you sure want to send the refund request?" data-href="" class="btn btn-info mr-1"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('tutor.students.lessons', $item->id) }}" title="Lessons" data-title="Are you sure want to send the refund request?" data-href="" class="btn btn-success mr-1"><i class="fa fa-list"></i></a>
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
                        <h2>No Students Found</h2>
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