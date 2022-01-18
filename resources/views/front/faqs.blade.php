@extends("layouts.front")
@section("title", "FAQs")

@section('css')
	<style type="text/css">
		@media only screen and (max-width: 768px)
		{
			   .sec-title .text {
				    font-size: 6px;
				}
				.faq_section .card-help .btn-link {
				    font-size: 6px;
				}
		}
		.heading_two{
			position: relative;
		    color: #03382e;
		    font-weight: 700;
		    padding: 15px 7px;
		    border-bottom: 1px solid #f0f5fb;
		}
	</style>
@endsection

@section('content')

    

	<section class="intro-section-two">
		<div class="auto-container">
			
			<div class="inner-container">
				<div class="row clearfix">
					
					<!-- Accordian Column -->
					<div class="accordian-column col-lg-12 col-md-12 col-sm-12">
						<h2 class="heading_two">FAQ - Teachers</h2>
						<div class="inner-column sticky-top">
							
							<!-- Accordion Box -->
							<ul class="accordion-box style-two">

								<!-- Block -->
								@foreach($teacher_faqs as $item)
									@if($loop->iteration == 1)
										<li class="accordion block">
											<div class="acc-btn active"><div class="icon-outer"><span class="icon icon-plus flaticon-angle-arrow-down"></span></div> {{ $item->question }}</div>
											<div class="acc-content current">
												<div class="content">
													<div class="clearfix">
														{!! $item->answer !!}
													</div>
												</div>
											</div>
										</li>
									@else
										<li class="accordion block">
											<div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus flaticon-angle-arrow-down"></span></div> {{ $item->question }}</div>
											<div class="acc-content">
												<div class="content">
													<div class="clearfix">
														{!! $item->answer !!}
													</div>
												</div>
											</div>
										</li>
									@endif
								@endforeach
								<!-- Block -->
								

								<!-- ********************************************** -->
							
							</ul>
							
						</div>
					</div>

					<!-- Student FAQS -->
					<div class="accordian-column col-lg-12 col-md-12 col-sm-12 mt-5">
						<h2 class="heading_two">FAQ - Students</h2>
						<div class="inner-column sticky-top">
							<!-- Accordion Box -->
							<ul class="accordion-box style-two">
								<!-- Block -->
								@foreach($student_faqs as $item)
									@if($loop->iteration == 1)
										<li class="accordion block">
											<div class="acc-btn active"><div class="icon-outer"><span class="icon icon-plus flaticon-angle-arrow-down"></span></div> {{ $item->question }}</div>
											<div class="acc-content current">
												<div class="content">
													<div class="clearfix">
														{!! $item->answer !!}
													</div>
												</div>
											</div>
										</li>
									@else
										<li class="accordion block">
											<div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus flaticon-angle-arrow-down"></span></div> {{ $item->question }}</div>
											<div class="acc-content">
												<div class="content">
													<div class="clearfix">
														{!! $item->answer !!}
													</div>
												</div>
											</div>
										</li>
									@endif
								@endforeach
								<!-- Block -->
							</ul>
							
						</div>
					</div>
					
				</div>
			</div>
		
		</div>
	</section>
@endsection
@section('js')
@endsection