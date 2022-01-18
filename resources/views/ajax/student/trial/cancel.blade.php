<div class="row teacher-requests-section clearfix">
    <div class="col-md-12">
        @if($trial_list->count() > 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table data_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Slots</th>
                                    <th>Teacher</th>
                                    <th>Student</th>
                                    <th>Amount</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trial_list as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td> {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </td>
                                        <td> {{ showStudentSlot($item->student->timezone, $item->tutor->timezone, $item->start_time, $item->end_time) }} </td>
                                        <td> {{ $item->tutor->name ?? '' }} </td>
                                        <td> {{ $item->student->name ?? '' }} </td>
                                        <td> <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount ?? '0' }}">{{ $item->amount ?? '0' }}</span> </td>
                                        {{-- <td>
                                            @if($item->refund_status == '0')
                                                <a href="javascript:void(0);" title="Send Refund Request" data-title="Are you sure want to send the refund request?" data-href="{{ route('student.trial.refund.request', $item->id) }}" class="btn btn-warning mr-1" id="check-in-location-view"><i class="fa fa-paper-plane"></i></a>
                                            @endif
                                            @if($item->refund_status == '1')
                                                <span class="badge badge-info">Refund Request Sent</span>
                                            @endif
                                            @if($item->refund_status == '2')
                                                <span class="badge badge-success">Refunded</span>
                                            @endif
                                        </td> --}}
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