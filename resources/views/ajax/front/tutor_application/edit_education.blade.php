<div class="row">
    <input type="hidden" name="id" value="{{ $req->id }}">
    <!-- Form Group -->
    <div class="col-lg-12 col-md-12 col-sm-12 time_table_block">
        <div class="row" id="">
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type='text' class="form-control certificate_datepicker text-center" name="from" autocomplete="off" required placeholder="From year" value="{{ $item->from }}">
                <span class="invalid-feedback">
                    @error('from')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 to_year @if(is_null($item->to)) d-none @endif">
                <input type='text' class="form-control certificate_datepicker text-center to_year_input" name="to" autocomplete="off" placeholder="To year" value="{{ $item->to }}">
                <span class="invalid-feedback">
                    @error('to')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form_group_margin">
                <label>Present ?</label>
                 <input type="checkbox" name="availability" data-width="100" data-on="Yes" data-off="No" data-toggle="toggle" class="availability switch_on_off" @if(is_null($item->to)) checked @endif data-onstyle="primary">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <input type='text' class="form-control" placeholder="Diploma or degree" name="degree" autocomplete="off" required value="{{ $item->degree }}">
                <span class="invalid-feedback">
                    @error('degree')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <input type='text' class="form-control" placeholder="Institution " name="institution" autocomplete="off" required value="{{ $item->institution }}">
                <span class="invalid-feedback">
                    @error('institution')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
            <div class="form-group col-lg-12 col-md-6 col-sm-12">
                <label>Attachment<span> (Color pdf of degree)*</label>
                <input type="file" name="attachment" class="pdf_dropify @error('attachment') error @enderror" data-default-file="{{ asset($item->attachment) }}" accept=".pdf">
                <span class="invalid-feedback">
                    @error('attachment')
                        <strong>{{ $message }}</strong>
                    @enderror
                </span>
            </div>
        </div>
    </div>
</div>