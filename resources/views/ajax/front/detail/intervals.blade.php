

    <div class="row clearfix my-3" id="tutor_my_lessons">
        <input type="hidden" name="tutor_id" class="tutor_id" value="{{ $user->id }}">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row not-valid" id="schedule-row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="dashbaord-content-box">
                        <div class="row">
                            @foreach($lessons as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center lesson-col lesson-eye my-1" data-id="{{ $item->id }}" data-href="{{ route('load.tutor.lesson.detail', ['id' => $item->id]) }}">
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
                                            <small>{{ $item->category }}</small>
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
                    <button type="button" class="button-sm mt-3 pull-right"><span class="txt">Next <i class="fa fa-arrow-right"></i></span></button>
                </div>
            </div>
        </div>
    </div>
