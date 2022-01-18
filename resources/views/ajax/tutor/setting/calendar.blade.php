<div class="row clearfix">
	<div class="col-md-12">
		<section class="student-profile-section p-4 bg-white">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 text-center">
					@if (is_null(auth()->user()->calendar_id))
	                    <a href="{{ route('calendar.connect') }}" class="theme-btn btn-style-three text-white">
	                    	<span class="txt">Connect Google Calendar</span>
                    	</a>
	                @else
                        <p>Your Google Calendar <strong>"LanguageLadSchedule"</strong> is connected to your account</p>
	                @endif
				</div>
			</div>
		</section>
	</div>
</div>