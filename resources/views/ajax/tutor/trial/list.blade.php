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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trial_list as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td> {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </td>
                                        <td> {{ showTeacherSlot($item->student->timezone, $item->tutor->timezone, $item->start_time, $item->end_time) }} </td>
                                        <td> {{ $item->tutor->name ?? '' }} </td>
                                        <td> {{ $item->student->name ?? '' }} </td>
                                        <td> <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount ?? '0' }}">{{ $item->amount ?? '0' }}</span> </td>
                                        <td class="d-flex">
                                            
                                            
                                            @if($item->cancel_request == '1')
                                                <a href="javascript:void(0);" title="Student Trial Cancel Request" data-title="Are you sure want to accept trial cancellation request?" data-reason="{{ $item->cancel_reason ?? '' }}" data-href="{{ route('tutor.trial.cancel.request', $item->id) }}" class="btn btn-primary mr-1 cancel_booking_btn_accept text-white"><i class="fa fa-exclamation-triangle"></i></a>
                                            @elseif($item->time_request == '1')
                                                <a href="javascript:void(0);" title="Teacher Time Change Request" data-title="Are you sure want to accept requested time table for this booking?" data-reason="{{ $item->cancel_reason ?? '' }}" data-date="{{ \Carbon\Carbon::parse($item->req_date)->format('d-m-Y') ?? '' }}" data-slots="{{ showTeacherSlot($item->student->timezone, $item->tutor->timezone, $item->req_start_time, $item->req_end_time) }}" data-href="{{ route('tutor.trial.time.request', $item->id) }}" data-time-request-by="{{ $item->time_request_by ?? '' }}" data-channel-type="{{ $item->channel_type ?? '' }}" data-channel="{{ $item->channel ?? '' }}" data-note="{{ $item->note ?? '' }}" title="Add Channel" class="btn btn-primary mr-1 teacher_time_change_req text-white"><i class="fa fa-exclamation-triangle"></i></a>
                                            @elseif($item->cancel_request == '3')
                                                <span class="badge badge-warning">
                                                    Cancel Pending
                                                </span>
                                            @else
                                                {{-- @if(checkTrialUpdateTimeTable($item->id)) --}}

                                                    <a href="javascript:void(0);" data-href="{{ route('tutor.trial.reschedule', $item->id) }}" data-channel-type="{{ $item->channel_type ?? '' }}" data-channel="{{ $item->channel ?? '' }}" data-note="{{ $item->note ?? '' }}" title="Add Channel" data-title="Are you sure want to accept the request?" class="btn btn-primary mr-1 accept_icon_btn_action" data-task="2" id="asdfccept_icon_btn"><i class="fa fa-clock-o"></i></a>
                                                {{-- @endif --}}

                                                <a href="javascript:void(0);" title="Accept Trial" data-title="Are you sure want to accept the trial request?" data-href="{{ route('tutor.trial.accept', $item->id) }}" data-channel-type="" data-channel="" data-note="{{ $item->note ?? '' }}" data-task="1" class="btn btn-success mr-1 accept_icon_btn_action" id="accept_icon_btn"><i class="fa fa-check"></i></a>

                                                <a href="javascript:void(0);" title="Cancel Trial" data-title="Are you sure want to cancel trial?" data-href="{{ route('tutor.trial.cancel', $item->id) }}" class="btn btn-danger mr-1 cancel_booking_btn"><i class="fa fa-ban"></i></a>
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
                <h2>No Record Found</h2>
            </div>
        @endif
    </div>
</div>