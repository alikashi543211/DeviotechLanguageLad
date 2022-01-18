@extends("layouts.tutor")
@section("title", 'Earnings')

@section('css')
    <style>
        .table td, .table th{
            border-top:  none;
        }
        .btn-primary {
            color: #fff;
            background-color: #5ab48b;
            border-color: #5ab48b;
        }
        .btn-primary:hover{
            color: #fff;
            background-color: #5ab48b;
            border-color: #5ab48b;
        }
        .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #5ab48b;
            border-color: #5ab48b;
        }
    </style>
@endsection

@section('content')
    <div class="inner-column">
        <!-- Edit Profile Info Tabs-->
        <div class="row clearfix">
            <div class="col-md-12">
                <h5 class="mb-3">My Earnings</h5>
                @if($list->count() > 0)
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data_table">
    	                			<thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Request ID</th>
                                        <th>Package ID</th>
                                        <th>Request Type</th>
                                        <th>Payment Source</th>
                                        <th>Total Amount</th>
                                        <th>Earned Amount</th>
                                        <th>Admin Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $item->booking_request_id ?? $item->trial_class_id ?? 'N/A'  }}</td>
                                        <td>
                                            {{ $item->booking_request->student_package->id ?? 'N/A' }}
                                        </td>
                                        <td>
                                            @if(!is_null($item->booking_request_id))
                                                Booking
                                            @elseif(!is_null($item->trial_class_id))
                                                Trial
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            {{ ucfirst($item->payment_method) }}
                                        </td>
                                        <td><span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount + $item->admin_amount ?? '0' }}">{{ $item->amount + $item->admin_amount ?? '0' }}</span></td>
                                        <td><span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount ?? '0' }}">{{ $item->amount ?? '0' }}</span></td>
                                        <td><span class="badge badge-warning"><span class="website_currency_code currency_unit">- USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->admin_amount ?? '0' }}">{{ $item->admin_amount ?? '0' }}</span></span></td>
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
                        <h2>No Record Found</h2>
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
        $(document).on("click", '#check-in-location-view', function(){
            $url = $(this).attr("data-href");
            $(".delete_btn").attr("href", $url);
            $("#sellerLocationModal").modal("show");
        });

        $(document).on("click", '#lesson-eye', function(){
            $url = $(this).attr("data-href");
            getLessonDetail($url);
        });

        function getLessonDetail($url)
        {
            $.ajax({
                type: "GET",
                url: $url,
                success: function (response) {
                    $('#lessonDetailModal').html(response);
                    $("#lessonDetailModal").modal("show");
                }
            });
        }
    </script>
@endsection