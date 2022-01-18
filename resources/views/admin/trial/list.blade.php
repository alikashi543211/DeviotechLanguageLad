@extends('layouts.admin')
@section('title', 'Trials')
@section('nav-title', 'Trials')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Trials List</h5>
                </div>
                <div class="card-body">
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Trial Date</th>
                                    <th>Trial ID</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Refund Request</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>${{ $item->amount }}</td>
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
                                    <td>
                                        @if($item->refund_status == "0")
                                            <span class="badge badge-danger">Not Requested</span>
                                        @elseif($item->refund_status == "1")
                                            <span class="badge badge-primary">Requested</span>
                                        @elseif($item->refund_status == "2")
                                            <span class="badge badge-success">Refunded</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->refund_status == '1')
                                            <a href="javascript:void(0);" onclick="alertMessage('{{ route('admin.trials.refund.payment', $item->id) }}', 'Cancel And Refund Payment', 'Are you sure want to cancel and refund payment ${{ $item->amount }}?', 'Yes! Cancel And Refund', '#4CAF50')" rel="tooltip" class="btn btn-primary btn-round" data-original-title="View Detail" title="Cancel And Refund Payment">
                                                <i class="material-icons">request_quote</i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.trials.detail', $item->id) }}" rel="tooltip" class="btn btn-info btn-round" data-original-title="View Detail" title="View Detail">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.trials.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">close</i>
                                        </button>
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
    </script>
@endsection