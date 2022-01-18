<div class="row clearfix my-3" id="tutor_my_lessons">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <button type="button" class="button-sm mb-2 back_button" data-href="" data-step=""><span class="txt"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</span></button>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashbaord-content-box daySlotsContainer">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="slots-heading text-center">{{ \Carbon\Carbon::parse($req->date)->format('d M Y') }}</h5>
                </div>
            </div>
            <div class="row my_form_group">
                <div class="col-md-12 col-sm-12">
                    <div class="booking-instruction">
                        <ul class="ml-3">
                            <li>Select at least one white time slot.</li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="package_interval" value="{{ $package->interval ?? '30 min' }}">
                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive">
                            <table class="schedule-table">
                                <tbody>
                                    <tr>
                                        @foreach ($new_slots_array as $key => $half_list)
                                            <td>
                                                <table class="schedule-table">
                                                    @foreach($half_list as $index => $item)
                                                        <tr>
                                                            <td>
                                                               {{ $item['interval_for_student'] }}
                                                            </td>
                                                            <td class="my_form_group">
                                                                <label data-toggle="tooltip" data-placement="top" title="You can select a time slot from the empty slot" for="slots-{{ $index }}" slot-index="" class="time_slot_label @if($item['is_available']) @else  bg-danger @endif @if($item['is_already_booked']) bg-warning not_allowed @endif">
                                                                    <input type="checkbox" data-new-date="{{ $item['req_date'] }}" class="slot-check slots_input" name="slot" id="slots-{{ $index }}" value="{{ $item['first_slot'] }}" @if($item["is_available"]) '' @else 'disabled' @endif @if($item["is_already_booked"]) 'disabled' @endif>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="col-md-12 col-sm-12 slots_error">
                        <span class="invalid-feedback">
                        </span>
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="row mb-3 card-box">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                @if(authCheck())
                    @if(auth_user()->role == 'student' || isset($req->booking_request_id) || isset($req->res_trial))
                        <button type="button" class="btn btn-style-one mt-4 book_teacher_btn click_book_teacher_btn"><span class="txt">Book Teacher</span></button>
                    @else
                        <button type="button" class="btn btn-style-one mt-4 tutor_book_teacher_btn"><span class="txt">Book Teacher</span></button>
                    @endif
                @else
                    <button type="submit" class="btn btn-style-one mt-4 book_teacher_btn"><span class="txt">Book Teacher</span></button>
                @endif
            </div>
        </div>
    </div>
</div>