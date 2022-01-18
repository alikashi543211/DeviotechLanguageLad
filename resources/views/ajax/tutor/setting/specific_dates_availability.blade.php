<div class="modal-content dashboard-section p-0">
    <div class="styled-form">
        <form action="{{ route('tutor.setting.timetable.save') }}" method="POST" class="custom-offer-form accept_request_modal specific_date_modal_form">
            @csrf
            <input type="hidden" class="hidden_day" name="day" value="{{ $req->day }}">
            <div class="modal-header">
                <h5 class="modal-title main_title" id="exampleModalLongTitle">Select - {{ $req->day }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="seller-location-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row mt-2">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 time_table_date_column">
                                <input type='text' class="form-control datepicker specific_date_input" placeholder="Select {{ $req->day }}" name="single_day" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary specific_date_select_btn" data-title="{{ $req->day }}" data-type="0">Select</button>
            </div>
        </form>
    </div>
</div>