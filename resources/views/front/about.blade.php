@extends("layouts.front")
@section("title", "About")

@section('css')
	<style>
	.image{
		background:none !important;
	}
	</style>
@endsection

@section('content')

	<!-- News Section -->
	<section class="news-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Title Column -->
				<div class="title-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>About us</h2>
							<div class="text">Languagelad is a global online language learning platform offering one-on-one lessons. We created this platform with the goal of offering our students all the tools necessary to learn a language in the most personalized way possible.</div>
						</div>
						<a href="javascript:void(0);" class="theme-btn btn-style-three"><span class="txt">Lorem Ipsum <i class="fa fa-angle-right"></i></span></a>
					</div>
				</div>
				
				<!-- News Column -->
				<div class="news-block col-lg-6 col-md-12 col-sm-12">
					<section class="video-section" style="background-image: url(front/assets/images/2.jpg)">
						<div class="auto-container">
						</div>
					</section>
					<!-- End Video Section -->
				</div>
				
			</div>
		</div>
	</section>
	<!-- News Section -->

	<!-- Pricing Section -->
    <section class="pricing-section price-page-section about-wishes-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title style-two centered">
				<h2>Your Wishes are Our Goals</h2>
			</div>
			
			<div class="pricing-tabs tabs-box">
				
				
				<!--Tabs Container-->
				<div class="tabs-content">
					
					<!--Tab-->
					<div class="tab active-tab" id="prod-monthly">
						<div class="content">
							<div class="row clearfix">
								
								<!-- Price Block -->
								<div class="price-block style-two col-lg-4 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon"><img src="{{ asset('front/assets') }}/images/about1.png" alt="" /></span>
										</div>
										<h3>It's not just learning</h3>
										<div class="text">Being able to choose between teachers from differant cultures allows us to learn and enrich ourselves as people.</div>
									</div>
								</div>
								
								<!-- Price Block -->
								<div class="price-block style-two col-lg-4 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon"><img src="{{ asset('front/assets') }}/images/about2.png" alt="" /></span>
										</div>
										<h3>There is no wall that cannot be climbed</h3>
										<div class="text">Replenish him third creature and meat of the blessed void good a fruit</div>
									</div>
								</div>
								
								<!-- Price Block -->
								<div class="price-block style-two col-lg-4 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon"><img src="{{ asset('front/assets') }}/images/about3.png" alt="" /></span>
										</div>
										<h3>Enjoy</h3>
										<div class="text">We are convinced that it is possible to learn and have fun at the same time.</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Pricing Section -->

	<!-- News Section -->
	<section class="news-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- News Column -->
				<div class="news-block col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="javascript:void(0);"><img src="{{ asset('front/assets') }}/images/home_1.png" alt="" /></a>
						</div>
					</div>
				</div>

				<!-- Title Column -->
				<div class="title-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>Become a Teacher</h2>
							<div class="text">At Languagelad, we are always looking for professionals who want to cooperate in our project and we welcome you to join our multicultural team of language enthusiasts! </div>
						</div>
						<a href="{{ route('tutor.register') }}" class="theme-btn btn-style-three"><span class="txt">Become a Teache <i class="fa fa-angle-right"></i></span></a>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- News Section -->
@endsection