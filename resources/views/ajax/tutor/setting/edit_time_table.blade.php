<div class="modal-content dashboard-section p-0">
    <div class="styled-form">
        <form action="{{ route('tutor.setting.timetable.save') }}" method="POST" class="custom-offer-form accept_request_modal save_time_table_form">
            @csrf
            <input type="hidden" class="hidden_day" name="day" value="{{ $req->day }}">
            <div class="modal-header">
                <h5 class="modal-title main_title" id="exampleModalLongTitle">Edit Time Table - {{ $req->day }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="seller-location-body">
                <div class="row edit_time_table_main_row">
                    <!-- Form Group -->
                    <div class="col-lg-12 col-md-12 col-sm-12 time_table_block">
                        @if($day_slots->count() > 0)
                            @foreach($day_slots as $item)
                                <div class="row justify-content-center" id="time-table-row-{{ $loop->iteration }}">
                                    <div class="form-group col-lg-5 col-md-5 col-sm-5">
                                        <input type='text' style="height: 24px !important;" class="form-control from_time timepicker text-center" name="from[]" value="{{ $item->from }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-lg-5 col-md-5 col-sm-5">
                                        <input type='text' style="height: 24px !important;" class="form-control to_time timepicker text-center" name="to[]" value="{{ $item->to }}" autocomplete="off" required>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 text-left">
                                        <a href="javascript:void(0);" title="remove" data-title="" data-href="" class="btn btn-danger btn-sm mr-1 speaking-item-del d-block del-speaking" id="accept_icon_btn_trash"><i class="fa fa-trash"></i></a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 time_slot_error_col" style="display:none;">
                                        <span class="invalid-feedback" style="display:block;">
                                            <strong>Select slots between 12:00 AM to 11:59 PM</strong>
                                        </span>
                                    </div>
                                </div>
                                
                            @endforeach
                        @endif
                        <!-- Clone here -->
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <button type="button" title="remove" class="add_new_slot_link time_table_add_more_btn" data-title="" data-href="" id="accept_icon_btn_trash"> +Add New Time Slot</button>
                            </div>
                        </div>
                        
                        @if(isset($req->specific_date))
                            <input type="hidden" name="single_day" class="specific_day_input" value="{{ $req->specific_date }}">
                            <input type="hidden" class="specific_day" name="specific_day" value="1">
                        @endif

                        @if(!isset($req->specific_date))
                            <input type="hidden" name="all_day" value="1">
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save_time_table_button">
                    @if(isset($req->specific_date))
                        Apply {{ \Carbon\Carbon::parse($req->specific_date)->format('d M') }} Only
                    @else
                        Apply To All {{ $req->day }}
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>