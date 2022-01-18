<div class="row teacher-requests-section clearfix">
    <div class="col-md-12">
        @if($booking_list->count() > 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table data_table">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Date</th>
                                    <th>Slots</th>
                                    <th>Student</th>
                                    <th>Lesson</th>
                                    <th>Amount</th>
                                    <th>Channel</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking_list as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td> {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </td>
                                        <td> {{ showTeacherSlot($item->student->timezone, $item->tutor->timezone, $item->start_time, $item->end_time) }} </td>
                                        <td> {{ $item->student->name ?? '' }} </td>
                                        <td> {{ $item->student_package->tutor_lesson->title ?? '' }} </td>
                                        <td> <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount ?? '0' }}">{{ $item->amount ?? '0' }}</span> </td>
                                        <td> 
                                            @if($item->channel_type == "Zoom")
                                                Zoom : <a href="javascript:void(0);" title="Show" class="read_more_link" data-value="<b>@if($item->channel_type == 'Zoom') Zoom Link : @elseif($item->channel_type == 'Skype') Skype ID : @endif</b> {{ $item->channel ?? '' }}">Show Link</a>
                                            @endif

                                            @if($item->channel_type == "Skype")
                                                Skype : <a href="javascript:void(0);" title="Show" class="read_more_link" data-value="<b>@if($item->channel_type == 'Zoom') Zoom Link : @elseif($item->channel_type == 'Skype') Skype ID : @endif</b> {{ $item->channel ?? '' }}">Show ID</a>
                                            @endif
                                              
                                        </td>
                                        <td> 
                                            {{ Str::limit($item->note, 4) }} @if(strlen($item->note) > 4) <a href="javascript:void(0);" title="Read Note" class="read_more_link" data-value="{{ $item->note ?? '' }}">read more</a>@endif  
                                        </td>
                                        <td class="d-flex">
                                            @if($item->cancel_request == '1')
                                                <a href="javascript:void(0);" title="Student Trial Cancel Request" data-title="Are you sure want to accept trial cancellation request?" data-reason="{{ $item->cancel_reason ?? '' }}" data-href="{{ route('tutor.booking_request.cancel.request', $item->id) }}" class="btn btn-primary mr-1 cancel_booking_btn_accept text-white"><i class="fa fa-exclamation-triangle"></i></a>
                                            @elseif($item->time_request == '1')
                                                <a href="javascript:void(0);" title="Time Table Change Request" data-title="Are you sure want to accept requested time table for this booking?" data-reason="{{ $item->cancel_reason ?? '' }}" data-date="{{ \Carbon\Carbon::parse($item->req_date)->format('d-m-Y') ?? '' }}" data-slots="{{ showTeacherSlot($item->student->timezone, $item->tutor->timezone, $item->req_start_time, $item->req_end_time) }}" data-end-time="{{ $item->req_end_time ?? '' }}" class="btn btn-primary mr-1 teacher_time_change_req text-white"><i class="fa fa-exclamation-triangle"></i></a>
                                            @else
                                                {{-- @if(checkBookingUpdateTimeTable($item->id)) --}}
                                                    <a href="javascript:void(0);" data-href="{{ route('tutor.booking_request.reschedule', $item->id) }}" data-channel-type="{{ $item->channel_type ?? '' }}" data-channel="{{ $item->channel ?? '' }}" data-note="{{ $item->note ?? '' }}" title="Add Channel" data-title="Are you sure want to accept the request?" class="btn btn-primary mr-1 accept_icon_btn" data-task="2" id="asdfccept_icon_btn"><i class="fa fa-clock-o"></i></a>
                                                {{-- @endif --}}

                                                 <a href="javascript:void(0);" title="Cancel Booking" data-title="Are you sure want to cancel active booking?" data-href="{{ route('tutor.booking_request.cancel', $item->id) }}" class="btn btn-danger mr-1" id="check-in-location-view"><i class="fa fa-ban"></i></a>
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