@extends("layouts.front")
@section("title", "Teachers")

@section("css")
    
    <style>
        .page-link, .page-link:hover{
            color: #2b3248;
        }
        .page-link:hover {
            z-index: 2;
            color:  #ffffff;
            text-decoration: none;
            background-color: #ff9259;
            border-color: #ff9259;
        }

        .page-item.active .page-link {
            background-color: #ff9259;
            border-color: #ff9259;
        }
        .price_range_display span{
            margin-bottom:  0px !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets') }}/css/price_range_style.css"/>
@endsection

@section('content')

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container pt-5">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12 tutors-section">
                    <div class="row">
                        <div class="col-12">
                            <div class="options-view">
                                @if(count($tutor_list) > 0)
                                    <div class="pull-right clearfix mr-2">
                                        <!-- Type Form -->
                                        <div class="type-form">
                                            <form class="sort_by_form" method="GET" action="{{ route('tutors') }}">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <select name="sort_by" class="custom-select-box sort_by_select" id="ui-id-1" style="display: none;">
                                                        <option value="newest" @if(request()->sort_by == 'newest') selected @endif>Newest</option>
                                                        <option value="old" @if(request()->sort_by == 'old') selected @endif>Old</option>
                                                        <option value="high-to-low" @if(request()->sort_by == 'high-to-low') selected @endif>High To Low Price</option>
                                                        <option value="low-to-high" @if(request()->sort_by == 'low-to-high') selected @endif>Low To High Price</option>
                                                    </select>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        
                                    </div>
                                @endif
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h3>Browse {{ count($tutor_list) }}  Profiles</h3>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="our-courses">
                        <!-- Options View -->
                        
                        @if(count($tutor_list ) > 0)
                            @foreach($tutor_list as $tutor)
                                <div class="cource-block-three">
                                    <div class="inner-box">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="image">
                                                    <a href="javascript:void(0);"><img src="{{ asset($tutor->tutor_profile->image) }}" alt="" /></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="content-box">
                                                    <div class="box-inner">
                                                        <div class="clearfix">
                                                            <div class="float-left">
                                                                <h5><a href="{{ route('detail', $tutor->username) }}">{{ $tutor->name }}</a></h5>
                                                            </div>
                                                            <div class="float-right">
                                                                <h5><span class="website_currency_code">USD</span><span class="website_amount_html_usd" amount-usd="{{ number_format($tutor->tutor_profile->hourly_rate, 2) ?? '0' }}">{{ number_format($tutor->tutor_profile->hourly_rate, 2) }}</span><small>/class</small></h5>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <span class="rating-stars">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    @if (floor(tutorReviews($tutor->id)[0]) - $i >= 1)
                                                                    {{-- Full Star --}}
                                                                    <i style="color: #FFC125;" class="fa fa-star"></i>
                                                                    @elseif (tutorReviews($tutor->id)[0] - $i > 0)
                                                                    {{-- Half Star --}}
                                                                    <i style="color: #FFC125;" class="fa fa-star-half-o"></i>
                                                                    @else
                                                                    {{-- Empty Star --}}
                                                                    <i style="color: #FFC125;" class="fa fa-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                            <strong>{{ nthDecimal(tutorReviews($tutor->id)[0], 1) }}</strong>
                                                            <small>({{ tutorReviews($tutor->id)[1] }} reviews)</small>
                                                        </p>
                                                        <div class="icon-points">
                                                            <p><span class="icon"><i class="fa fa-language"></i></span>Lessons: 
                                                                {{ $tutor->tutor_lessons->count() }} Lessons</p>
                                                            <p><span class="icon"><i class="fa fa-check-circle"></i></span>Speaks: 
                                                                <span id="tutor_languages">
                                                                    @foreach($tutor->tutor_speaks as $item)
                                                                        {{ $item->language }} @if($loop->iteration == $loop->last)  @else , @endif
                                                                    @endforeach
                                                                </span>
                                                            </p>
                                                            <p><span class="icon"><i class="fa fa-shield"></i></span>From: {{ $tutor->tutor_profile->country }}</p>
                                                            
                                                        </div>
                                                        <div>
                                                            <p class="text-justify">{{ Str::limit($tutor->tutor_profile->description, 50) }}</p>
                                                        </div>
                                                        <div class="text-center text-sm-right">
                                                            <a href="{{ route('detail', $tutor->username) }}" class="theme-btn btn-style-profiles">See Availability, Profile & Reviews</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if(request()->sort_by !=  '5' && request()->sort_by !=  '5')
                                <div class="d-flex justify-content-center">
                                    {!! $tutor_list->withQueryString()->links() !!}
                                </div>
                            @endif
                        @else
                            <div class="no-results">
                                <img src="{{ asset('front/assets/images/no-results.svg') }}" class="img-fluid" alt="">
                                <h2>No Record Found</h2>
                            </div>
                        @endif
                        <!-- Cource Block Two -->
                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <div class="sidebar-inner" style="min-height: auto;">
                        <aside class="sidebar">
                            <!-- Filter Widget -->
                            <div class="filter-widget">
                                <h5>Filter By</h5>
                                <form method="get" action="{{ route('tutors') }}">
                                    <input type="hidden" name="filter" value="set">
                                    <div class="skills-box">
                                        <!-- Skills Form -->
                                        <div class="skills-form">
                                            <span>Teacher Teaches</span>
                                            <select name="language">
                                                <option value="">Choose</option>
                                                @foreach(language_dropdown() as $item)
                                                    <option @if(request()->language == $item) selected @endif>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="skills-box">
                                        <!-- Skills Form -->
                                        <div class="skills-form">
                                            <span>Price</span>
                                            <div id="slider-range" class="price-filter-range side_checkbox" name="rangeInput">
                                                <input type="hidden" id="min_price" name="min_price" value="{{ request()->min_price ?? '0' }}">
                                                <input type="hidden" id="max_price" name="max_price" value="{{ request()->max_price ?? $max }}">
                                            </div>
                                            <div class="d-flex price_range_display">
                                                <span id="min_label" class="range_labels website_amount_html_usd" amount-usd="{{ request()->min_price ?? '0' }}">{{ request()->min_price ?? '0' }}</span>
                                                <span class="range_labels">-</span>
                                                <span class="range_labels website_amount_html_usd" amount-usd="{{ request()->max_price ?? $max }}" id="max_label">{{ request()->max_price ?? $max }}</span> 
                                                <span class="ml-2"><span class="range_labels_unit website_currency_code currency_unit">USD</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skills-box">
                                        <!-- Skills Form -->
                                        <div class="skills-form">
                                            <span>Teacher is From</span>
                                            <select name="country" class="language_input">
                                                <option value="">Choose</option>
                                                @foreach(tutorFromDropdown() as $item)
                                                    @if(!is_null($item))
                                                        <option value="{{ $item }}" @if(request()->country == $item) selected @endif>{{ $item }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="skills-box">
                                        <!-- Skills Form -->
                                        <div class="skills-form">
                                            <span>Teacher Speaks</span>
                                            <!-- Radio Box -->
                                            <select name="level" class="language_input">
                                                <option value="">Choose</option>
                                                @foreach(language_dropdown() as $item)
                                                    <option value="{{ $item }}" @if(request()->level == $item) selected @endif>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="skills-box">
                                        <!-- Skills Form -->
                                        <div class="skills-form">
                                            <span>Type of class</span>
                                            <!-- Radio Box -->
                                            <select name="class">
                                                <option value="">Choose</option>
                                                @foreach(class_dropdown() as $item)
                                                    <option @if(request()->class == $item) selected @endif>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 text-center">
                                        <button type="submit" style="cursor: pointer" class="theme-btn btn-style-three">
                                            <span class="txt">Filter</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        var max_price = '{{ $max }}';
        $(function () {
            $("#slider-range").slider({
                range: true,
                orientation: "horizontal",
                min: 0,
                max: max_price,
                values: ['{{ request()->min_price ?? 0 }}', '{{ request()->max_price ?? $max }}'],
                step: 1,

                slide: function (event, ui) {
                    if (ui.values[0] == ui.values[1]) {
                        return false;
                    }
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                    $("#min_label").html(ui.values[0]);
                    $("#max_label").html(ui.values[1]);
                    $("#min_label").attr('amount-usd', ui.values[0]);
                    $("#max_label").attr('amount-usd', ui.values[1]);
                    @if(!is_null(session('website_currency')))
                        update_website_currency("{{ session('website_currency') }}");
                    @endif
                    
                }
            });

            $("#min_price").val($("#slider-range").slider("values", 0));
            $("#max_price").val($("#slider-range").slider("values", 1));
            
        });

        on_change_sort_by_form_filter();
        function on_change_sort_by_form_filter()
        {
            $(document).on("click", ".ui-menu-item", function(e){
                e.preventDefault();
                $('.sort_by_form').submit();
            });     
        }
    </script>

@endsection