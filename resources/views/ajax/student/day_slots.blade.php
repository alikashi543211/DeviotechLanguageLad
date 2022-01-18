<div class="row">
    <div class="col-md-12">
        <h5 class="slots-heading text-center">{{ \Carbon\Carbon::parse($req->date)->format('d M Y') }}</h5>
    </div>
</div>
<div class="row">
    <div class="col-12 column-slots">
        <div class="table-responsive">
            <table class="schedule-table">
                <tbody>
                    @foreach (time_dropdown() as $item)
                        @php
                            list($exist, $index, $class, $id) = checkDashboardBooking($item, $bookings);
                            $indexes[] = $index;
                        @endphp
                        <tr data-time="{{ $item }}">
                            <td style="width:40%">{{ $item }}</td>
                            <td style="width:60%" rowspan="" data-index="{{ $index }}" class="check-td {{ $class }} {{ $exist ? 'exist' : '' }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="booking-instruction">
            <div class="active-bookings details-booking" style="display: none;">
                <ul>
                    <li>You have an Active Booking with: <br>
                        <strong class="user-name">"John Vision"</strong> From <strong class="from-time">1:00pm</strong> to <strong class="to-time">2:30pm</strong></li>
                </ul>
            </div>

            <div class="pending-bookings details-booking" style="display: none;">
                <ul>
                    <li>You have a Pending Booking with: <br>
                        <strong class="user-name">"John Vision"</strong> From <strong class="from-time">1:00pm</strong> to <strong class="to-time">2:30pm</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
