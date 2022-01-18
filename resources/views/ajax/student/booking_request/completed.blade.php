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
                                    <th>Teacher</th>
                                    <th>Lesson</th>
                                    <th>Amount</th>
                                    <th>Channel</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking_list as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td> {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </td>
                                        <td> {{ showStudentSlot($item->student->timezone, $item->tutor->timezone, $item->start_time, $item->end_time) }} </td>
                                        <td> {{ $item->tutor->name ?? '' }} </td>
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