@extends('layouts.student')
@section('title', 'Teacher Review')
@section('css')
    <style>
        .rating-stars {
            border: none;
            float: left;
        }

        .rating-stars > input {
            display: none;
        }
        .rating-stars > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating-stars > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating-stars > label {
            color: #ddd;
            float: right;
            cursor: pointer;
        }

        .rating-stars > input:checked ~ label, /* show gold star when clicked */
        .rating-stars:not(:checked) > label:hover, /* hover current star */
        .rating-stars:not(:checked) > label:hover ~ label {
            color: #FFD700;
        } /* hover previous stars in list */

        .rating-stars > input:checked + label:hover, /* hover current star when changing rating */
        .rating-stars > input:checked ~ label:hover,
        .rating-stars > label:hover ~ input:checked ~ label, /* lighten current selection */
        .rating-stars > input:checked ~ label:hover ~ label {
            color: #FFED85;
        }
    </style>
@endsection
@section('content')
    <!-- Dashboard Section -->
    <section class="dashboard-section pb-0 sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="row mb-3">
                        <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
                            <p>Your @if(isset(request()->trial)) trial @else booking @endif has been completed, please submit a review to the person whom you booked</p>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('student.booking_request.review.save') }}">
                <div class="row clearfix">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="trial" value="{{ request()->trial }}">
                    <div class="col-md-12">
                        <div class="profile-form">
                            <div class="row clearfix text-center mb-5">
                                <div class="col-md-6 m-auto">
                                    <div class="form-group">
                                        <fieldset class="rating-stars @error('rating') is-invalid @enderror">
                                            <input type="radio" id="star5" name="rating" value="5"/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                            <input type="radio" id="star4half" name="rating" value="4.5"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                            <input type="radio" id="star4" name="rating" value="4"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                            <input type="radio" id="star3half" name="rating" value="3.5"/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                            <input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                            <input type="radio" id="star2half" name="rating" value="2.5"/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                            <input type="radio" id="star2" name="rating" value="2"/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                            <input type="radio" id="star1half" name="rating" value="1.5"/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                            <input type="radio" id="star1" name="rating" value="1"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        </fieldset>
                                        @error('rating')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="review" id="review" class="@error('review') is-invalid @enderror" placeholder="Review"></textarea>
                                        @error('review')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix text-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="theme-btn btn-style-three cursor_pointer" type="submit">
                                        <span class="txt">Send <i class="fa fa-angle-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <!-- End Dashboard Section -->

    <!-- Call To Action Sectiofn Two -->
    <!-- End Call To Action Section Two -->
@endsection
