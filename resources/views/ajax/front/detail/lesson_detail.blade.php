

    <div class="row clearfix my-3" id="tutor_my_lessons">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <button type="button" class="button-sm mb-2 back_button" data-href="" data-step=""><span class="txt"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</span></button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row not-valid" id="schedule-row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="dashbaord-content-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive p-3">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="border-0">Title</th>
                                                <td class="border-0">{{ $lesson->title }}</td>
                                            </tr>
                                            <tr>
                                                <th class="border-0">Level</th>
                                                <td class="border-0">{{ $lesson->level_from }} - {{ $lesson->level_to }}</td>
                                            </tr>
                                            <tr>
                                                <th class="border-0">Language</th>
                                                <td class="border-0">{{ $lesson->language }}</td>
                                            </tr>
                                            <tr>
                                                <th class="border-0">Category</th>
                                                <td class="border-0">{{ $lesson->category }}</td>
                                            </tr>
                                            <tr>
                                                <th class="border-0">Tag</th>
                                                <td class="border-0">{{ $lesson->tag }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <p class="font-weight-bold ml-2">Select Package</p>
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th class="border-0"></th>
                                                <th class="border-0">Interval</th>
                                                <th class="border-0">Amount</th>
                                                <th class="border-0">Package</th>
                                                <th class="border-0">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($packages as $item)
                                                @if($item->status == false)
                                                    @continue
                                                @endif
                                                <tr class="lesson-detail-row">
                                                    <td class="border-0">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio{{ $item->id }}" name="tutor_lesson_package_id" class="custom-control-input package_select_btn" data-id="{{ $item->id }}" data-href="{{ route('load.tutor.calendar') }}" value = "{{ $item->id }}">
                                                            <label class="custom-control-label lesson_detail_checkbox" for="customRadio{{ $item->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td class="border-0">{{ $item->interval }}</td>
                                                    <td class="border-0"><span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount_per_interval ?? '0' }}">{{ $item->amount_per_interval ?? '0' }}</span></td>
                                                    <td class="border-0">{{ $item->package }} Lessons</td>
                                                    <td class="border-0"><span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->total_amount ?? '0' }}">{{ $item->total_amount ?? '0' }}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="row mb-3 card-box">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <input type="hidden" name="tutor_lesson_id" class="tutor_lesson_id" value="">
                    <input type="hidden" name="tutor_lesson_package_id" class="tutor_lesson_package_id" value="">
                    <span class="invalid-feedback">
                        @error('tutor_lesson_package_id')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
            </div>
        </div>
    </div>