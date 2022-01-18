<div class="row">
    <input type="hidden" name="id" value="{{ $req->id }}">
    <!-- Form Group -->
    <div class="col-lg-12 col-md-12 col-sm-12 time_table_block">
        <div class="row" id="">
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type='text' class="form-control certificate_datepicker text-center" name="from" value="{{ $item->from }}" autocomplete="off" required placeholder="From year">
                <span class="invalid-feedback">
                    @error('from')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 to_year @if(is_null($item->to)) d-none @endif">
                <input type='text' class="form-control certificate_datepicker text-center to_year_input" name="to" value="{{ $item->to }}" autocomplete="off" placeholder="To year">
                <span class="invalid-feedback">
                    @error('to')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form_group_margin">
                <label>Present ?</label>
                 <input type="checkbox" name="availability" data-width="100" data-on="Yes" data-off="No" data-toggle="toggle" class="availability switch_on_off" data-onstyle="primary" @if(is_null($item->to)) checked @endif>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <input type='text' class="form-control" placeholder="Designation" name="designation" autocomplete="off" required value="{{ $item->designation }}">
                <span class="invalid-feedback">
                    @error('designation')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <input type='text' class="form-control" placeholder="Company name " name="company" autocomplete="off" required value="{{ $item->company }}">
                <span class="invalid-feedback">
                    @error('company')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
        </div>
    </div>
</div>