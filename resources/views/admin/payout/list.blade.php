@extends('layouts.admin')
@section('title', 'Tutor Payouts')
@section('nav-title', 'Tutor Payouts')
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
                    <h5 class="card-title">Tutor Payouts</h5>
                </div>

                <div class="card-body">
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Teacher Name</th>
                                    <th>Booking ID</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $item->tutor->name }}</td>
                                	<td>{{ $item->booking_request->id }}</td>
                                	<td>${{ $item->amount }}</td>
                                    <td>
                                        @if($item->is_paid == false)
                                            <span class="badge badge-info">Due</span>
                                        @elseif($item->is_ == true)
                                            <span class="badge badge-success">Cleared</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->is_paid == false)
                                            <a href="{{ route('transfer', $item->id) }}" rel="tooltip" class="btn btn-primary btn-round" data-original-title="Pay Tutor" title="Pay Tutor">
                                                Pay Tutor
                                            </a>
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
