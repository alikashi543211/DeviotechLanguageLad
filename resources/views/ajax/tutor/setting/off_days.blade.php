<div class="modal-content dashboard-section p-0">
    <div class="styled-form">
        <form action="{{ route('tutor.setting.timetable.save', ['off_day' => 'active']) }}" method="POST" class="custom-offer-form accept_request_modal time_table_off_day_form">
            @csrf
            <input type="hidden" name="day" value="{{ $req->day }}">
            <div class="modal-header">
                <h5 class="modal-title main_title" id="exampleModalLongTitle">I am not available - {{ $req->day }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="seller-location-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 dates_block">
                        <div class="row mt-2">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 teacher-availability-section">
                                <p class="clearfix mb-2 font-weight-bold mb-0">
                                    Are you want to permanently close on {{ $req->day }} ?
                                </p>
                                <p class="clearfix mb-2 font-weight-bold">
                                    
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="is_closed" class="not_avalilable_option" id="availability" @if(!is_null($time_table) && $time_table->is_closed == true) checked @endif>
                                        <span class="slider round"></span> 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2 closed_dates_block" @if(!is_null($time_table) && $time_table->is_closed == true) style="display:none;"  @endif>
                            @if($day_slots->count() > 0)
                                @foreach($day_slots as $item)
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 time_table_date_column">
                                        <input type='text' class="form-control datepicker day_select_input" placeholder="Select Date {{ $loop->iteration }}" name="single_day[]" autocomplete="off" value="{{ Carbon\Carbon::parse($item->single_day)->format('Y/m/d') }}">
                                    </div>
                                @endforeach
                            @endif
                            @for($i=$day_slots->count(); $i < 4; $i++)
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 time_table_date_column">
                                    <input type='text' class="form-control datepicker day_select_input" placeholder="Select Date {{ $i+1 }}" name="single_day[]" autocomplete="off">
                                </div>
                            @endfor
                            <div class="col-lg-12 col-md-12 invalid-feedback">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
</div>