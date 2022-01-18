@extends("layouts.tutor")
@section("title", "Dashboard")

@section('content')
		<div class="tab active-tab" id="edit-profile">
			<div class="content">
				<!-- Profile Form -->
					<!-- Profile Form -->
				<div class="row clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                        <div class="card dashboard-card">
                        	<div class="card-body">
                        		<h5>Earning</h5>
                        		<h2 class="font-weight-bold"><span class="website_currency_code">USD</span><span class="website_amount_html_usd" amount-usd="{{ $earning_count ?? '0' }}">{{ $earning_count ?? '0' }}</span></h2>
                        	</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                        <div class="card dashboard-card">
                        	<div class="card-body">
                        		<h5>Lessons</h5>
                        		<h2 class="font-weight-bold">{{ $lesson_count ?? '0' }}</h2>
                        	</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card dashboard-card">
                        	<div class="card-body">
                        		<h5>Students</h5>
                        		<h2 class="font-weight-bold">{{ $student_count ?? '0' }}</h2>
                        	</div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix mt-5">
            		<div class="col-md-12">
				        @if($booking_list->count() > 0)
				        	<h5 class="my-3">My Recent Requests</h5>
				            <div class="card">
				                <div class="card-body">
				                    <div class="table-responsive">
				                        <table class="table data_table">
				                            <thead>
				                                <tr>
				                                    <th>#</th>
				                                    <th>Date</th>
				                                    <th>Slots</th>
				                                    <th>Student</th>
				                                    <th>Lesson</th>
				                                    <th>Amount</th>
				                                    
				                                </tr>
				                            </thead>
				                            <tbody>
				                                @foreach($booking_list as $item)
				                                    <tr>
				                                        <td> {{ $loop->iteration }} </td>
				                                        <td> {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </td>
				                                        <td> {{ showTeacherSlot($item->student->timezone, $item->tutor->timezone, $item->start_time, $item->end_time) }} </td>
				                                        <td> {{ $item->student->name ?? '' }} </td>
				                                        <td> {{ $item->student_package->tutor_lesson->title ?? '' }}  </td>
                                                    	<td> <span class="website_currency_code currency_unit">USD</span><span class="website_amount_html_usd" amount-usd="{{ $item->amount ?? '0' }}">{{ $item->amount ?? '0' }}</span> </td>
				                                        
				                                    </tr>
				                                @endforeach
				                            </tbody>
				                        </table>
				                    </div>
				                    
				                </div>
				            </div>
				        @else
				            <div class="no-results">
				                <img src="{{ asset('front/assets/images') }}/no-results.svg" class="img-fluid" alt="">
				                <h2>No Recent Requests Found</h2>
				            </div>
				        @endif
				    </div>
                </div>
					
			</div>
		</div>
@endsection
