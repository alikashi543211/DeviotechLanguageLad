@extends('layouts.admin')
@section('title', 'Earnings')
@section('nav-title', 'Earnings')
@section('css')
    <style>
        .card .earning
        {
            background-color: #eee;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Earning History</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats earning">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon"><i class="material-icons">price_check</i></div>
                                    <p class="card-category"><small>Total Earning</small></p>
                                    <h3 class="card-title">${{ $total_earning }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats"><i class="material-icons">price_check</i> <small>Total Earning</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats earning">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon"><i class="material-icons">price_check</i></div>
                                    <p class="card-category"><small>Admin Earning</small></p>
                                    <h3 class="card-title">${{ $admin_earning }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats"><i class="material-icons">price_check</i> <small>Admin Earning</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Booking or Trial ID</th>
                                    <th>Type</th>
                                    <th>Total Amount</th>
                                    <th>Tutor Amount</th>
                                    <th>Admin Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                	<td>{{ $item->booking_request_id ?? $item->trial_class_id ?? '' }}</td>
                                    <td>
                                        @if(!is_null($item->booking_request_id))
                                            Booking
                                        @endif
                                        @if(!is_null($item->trial_class_id))
                                            Trial
                                        @endif
                                    </td>
                                	<td>${{ $item->amount + $item->admin_amount }}</td>
                                    <td>${{ $item->amount }}</td>
                                	<td>${{ $item->admin_amount }}</td>
                                    <td>
                                        @if($item->is_captured == 1)
                                            <span class="badge badge-success">Captured</span>
                                        @elseif($item->is_captured == 0)
                                            <span class="badge badge-info">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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

    </script>
@endsection
