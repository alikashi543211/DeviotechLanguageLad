

    <div class="row clearfix my-3" id="tutor_my_lessons">
        @if($lessons->count() > 0)
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row not-valid" id="schedule-row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dashbaord-content-box">
                            <div class="row">
                                @foreach($lessons as $item)
                                    <div class="col-md-1 m-auto cursor-pointer">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio{{ $item->id }}" name="tutor_lesson_package_id" class="custom-control-input tutor_lesson_package_item lesson-eye" data-id="{{ $item->id }}" value = "{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
                                            <label class="custom-control-label" for="customRadio{{ $item->id }}"></label>
                                        </div>
                                    </div>
                                    <div class="lesson-eye col-lg-11 col-md-11 col-sm-11 justify-content-center lesson-col my-1" data-id="{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <h5>{{ ucfirst($item->title) }}</h5>
                                            </div>
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                                                <h5>$40.0</h5> 
                                            </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <small>{{ $item->language }} - {{ $item->category }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
        @else
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="no-results">
                    <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
                    <h2>No Lessons Found</h2>
                </div>
            </div>
        @endif
    </div>
