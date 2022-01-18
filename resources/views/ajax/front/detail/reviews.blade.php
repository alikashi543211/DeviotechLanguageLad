<div class="row clearfix my-3">
    <div class="content-side col-lg-12 col-md-12 col-sm-12">
        {{-- <h5>Student Reviews <span class="student_reviews mr-1"><i class="fa fa-star" style="font-size:20px;color: #FFC125;"></i> 5.0 </span> 3 Ratings</h5> --}}
        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @if($user->tutor_reviews->count() > 0)
                    <div class="dashbaord-content-box">
                        @foreach ($user->tutor_reviews as $item)
                            <div class="row">
                                <div class="col-1">
                                    <div class="avatar review_avatar">
                                        <img src="{{ asset($item->student->student_profile->image ?? 'default.png') }}" class="img-fluid" alt="avatar">
                                    </div>
                                </div>
                                <div class="col-11">
                                    <p class="mb-0">
                                        <span class="font-weight-bold">{{ $item->student->name ?? '' }}</span> 
                                        <span class="rating-stars ml-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if (floor($item->rating) - $i >= 1)
                                                {{-- Full Star --}}
                                                <i style="color: #FFC125;" class="fa fa-star"></i>
                                                @elseif ($item->rating - $i > 0)
                                                {{-- Half Star --}}
                                                <i style="color: #FFC125;" class="fa fa-star-half-o"></i>
                                                @else
                                                {{-- Empty Star --}}
                                                <i style="color: #FFC125;" class="fa fa-star-o"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </p>
                                    <p>{{ $item->booking_request->tutor_lesson->title ?? '' }} | {{ $item->created_at->format('M d, Y') }}</p>
                                    <p>{{ $item->review ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-results">
                        <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
                        <h2>No Reviews Found</h2>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</div>