

    <div class="row clearfix my-3" id="tutor_my_lessons">
        @if(!isset(request()->sp) && !isset(request()->res_trial) && !isset(request()->res_booking))
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="button" class="button-sm mb-2 back_button" data-href="" data-step=""><span class="txt"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</span></button>
            </div>
        @endif
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row not-valid" id="schedule-row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="dashbaord-content-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <div class="row mb-3 not-valid" id="schedule-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="">
                                                <div id='calendar-monthly'></div>
                                            </div>
                                            {{-- <div class="row mt-3">
                                                <div class="col-md-12 col-sm-12 text-center d-flex">
                                                    <button type="submit" class="btn btn-style-one mr-4"><span class="txt">Book Teacher</span></button>
                                                    <button type="submit" class="btn btn-style-one"><span class="txt">Book Trial</span></button>
                                                </div>
                                            </div> --}}
                                            <div class="row card-box">
                                                <input type="hidden" name="date" class="date tutor_booking_date" value="">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <span class="invalid-feedback">
                                                        @error('tutor_lesson_id')
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>