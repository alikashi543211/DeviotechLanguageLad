@extends("layouts.front")
@section("title", "Home")

@section('css')
	<style>
		.select_language{
			width: 100% !important;
		}
		.image{
			background: none !important;
		}
		.banner-section h1{
			font-weight: bold;
		}
	</style>
@endsection

@section('content')
	<!-- Banner Section -->
    <section class="language-lad-home banner-section">
		<div class="pattern-layer pattern-position-layer">
			<img src="{{ asset('front/assets/images/banner.png') }}">
		</div>
		<div class="auto-container pb-lg-5">
			
			<!-- Search Boxed -->
			<div class="search-boxed">
				<div class="search-box">
					<form method="get" action="{{ route('tutors') }}">
						<input type="hidden" name="filter" value="set">
						<div class="form-group">
							<select name="language" class="select_language" class="services service" required style="width:100%;">
								<option>Select Language</option>
								@foreach(language_dropdown() as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
							</select>
							<button type="submit"><span class="icon fa fa-search"></span></button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</section>

	<!-- Education Section -->
	<section class="education-section">
		<div class="patern-layer-one paroller" data-paroller-factor="0.60" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-1.png)"></div>
		<div class="patern-layer-two paroller" data-paroller-factor="0.60" data-paroller-factor-lg="-0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-2.png)"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column parallax-scene-1">
						<div class="image parallax-layer" data-depth="0.30">
							<img src="{{ asset('front/assets') }}/images/home_2.png" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>Find the teacher<br> you are looking for </h2>
						<div class="text">With Languagelad, you can choose between different teachers and find the one that best suits your needs.</div>
						{{-- <a href="javascript:void(0);" class="theme-btn btn-style-three"><span class="txt">Find Teacher <i class="fa fa-angle-right"></i></span></a> --}}
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Education Section -->
	
	<!-- Courses Section -->
	<section class="courses-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Title Column -->
				<div class="title-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>Our top Teachers</h2>
							<div class="text">Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two waters own morning gathered.</div>
						</div>
						<div class="buttons-box">
							<a href="{{ route('tutors') }}" class="button-sm mb-2"><span class="txt">Browse Teachers</span></a>
							<a href="{{ route('tutor.register') }}" class="button-sm"><span class="txt">Become A Teacher</span></a>
						</div>
					</div>
				</div>
				
				<!-- Cource Block -->
				@foreach($tutor_list as $tutor)
					<div class="cource-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="javascript:void(0);"><img src="{{ asset($tutor->image) }}" alt="" /></a>
							</div>
							<div class="lower-content">
								<div class="clearfix">
									<div class="pull-left">
										<h5><a href="javascript:void(0);">{{ $tutor->user->name }}</a></h5>
									</div>
									<div class="pull-right">
										<div class="price"><span class="website_currency_code">USD</span><span class="website_amount_html_usd" amount-usd="{{ $tutor->hourly_rate ?? '0' }}">{{ $tutor->hourly_rate ?? '0' }}</span></div>
									</div>
								</div>
								<div class="text">
									@if(isset($tutor->description))
										{{ Str::limit($tutor->description, 100) }}
									@endif
								</div>
								<div class="clearfix">
									<div class="pull-left">
										<div class="students">{{ $tutor->country }}</div>
									</div>
									<div class="pull-right">
										<a href="{{ route('detail', $tutor->user->username) }}" class="enroll">View Profile</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				
			</div>
		</div>
	</section>
	<!-- End Courses Section -->

	<!-- News Section -->
	<section class="news-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Title Column -->
				<div class="title-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>Anytime, anywhere</h2>
							<div class="text">You only need an internet connection to be able to learn wherever and whenever you want.</div>
						</div>
						{{-- <a href="javascript:void(0);" class="theme-btn btn-style-three"><span class="txt">Lorem Ipsum <i class="fa fa-angle-right"></i></span></a> --}}
					</div>
				</div>
				
				<!-- News Column -->
				<div class="news-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="javascript:void(0);"><img src="{{ asset('front/assets') }}/images/home_1.png" alt="" /></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- News Section -->

	<!-- Video Section -->
	<section class="video-section" style="background-image: url(front/assets/images/2.jpg)">
		<div class="auto-container">
			
		</div>
	</section>
	<!-- End Video Section -->
	
	<!-- News Section -->
	<section class="news-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Title Column -->
				<div class="news-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="javascript:void(0);"><img src="{{ asset('front/assets') }}/images/home_3.png" alt="" /></a>
						</div>
					</div>
				</div>

				<div class="title-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>Affordable prices</h2>
							<div class="text">With Languagelad, you'll find what you are looking for at the best price.</div>
						</div>
						{{-- <a href="javascript:void(0);" class="theme-btn btn-style-three"><span class="txt">Lorem Ipsum <i class="fa fa-angle-right"></i></span></a> --}}
					</div>
				</div>
				
				
				
			</div>
		</div>
	</section>
	<!-- End News Section -->
	
	<!-- Achievement Section -->
	<section class="achievements-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Our achievements</h2>
				<div class="text">Replenish him third creature and meat blessed void a fruit gathered you’re, they’re <br> two waters own morning gathered greater shall had behold had seed.</div>
			</div>
			
			<!-- Fact Counter -->
			<div class="fact-counter">
				<div class="row clearfix">

					<!-- Column -->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon-box">
									<span class="icon flaticon-course"></span>
								</div>
								<h4 class="counter-title">Total Languages</h4>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="2000" data-stop="50">0</span>+
								</div>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon-box">
									<span class="icon flaticon-course-1"></span>
								</div>
								<h4 class="counter-title">Total Student</h4>
								<div class="count-outer count-box alternate">
									<span class="count-text" data-speed="3000" data-stop="45">0</span>K+
								</div>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon-box">
									<span class="icon flaticon-world"></span>
								</div>
								<h4 class="counter-title">Global Position</h4>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="4000" data-stop="115">0</span>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div>
		</div>
	</section>
	<!-- End Achievement Section -->
	
	<!-- Testimonial Section -->
	<section class="testimonial-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Students & Parents Opinion</h2>
			</div>
			
			<!-- Authors Box -->
			<div class="authors-box">
				@foreach($testimonial_list as $item)
					@if($loop->iteration == 1)
						<div class="author-one"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 2)
						<div class="author-two"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 3)
						<div class="author-three"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 4)
						<div class="author-four"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 5)
						<div class="author-five"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 6)
						<div class="author-six"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 7)
						<div class="author-seven"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
					
					@if($loop->iteration == 8)
						<div class="author-eight"><img src="{{ asset($item->image) }}" alt="" /></div>
					@endif
				@endforeach
			</div>
			
			<div class="single-item-carousel owl-carousel owl-theme">
				@foreach($testimonial_list as $item)
				<!-- Testimonial Block Two -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="image-box">
								<div class="quote-icon flaticon-quote-5"></div>
								<div class="image">
									<img src="{{ asset($item->image) }}" height="90" width="90" alt="" />
								</div>
							</div>
							<div class="text">{{ $item->description }}</div>
						</div>
					</div>
				@endforeach
				
			</div>
			
		</div>
	</section>
	<!-- End Testimonial Section -->
@endsection