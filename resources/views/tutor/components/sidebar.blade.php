<!-- Image Section -->

<div class="sidebar-inner tutor-sidebar-inner">
    <aside class="sidebar">
        <div class="dashboard-widget">
            <div class="general-info text-center">
                <div class="avatar">
                    <img src="{{ asset(tutor()->image ?? 'default.png') }}" class="img-fluid" alt="">
                </div>
                <h5>{{ tutor()->user->name }}</h5>
                <!-- <div class="dd_dump"></div> -->
                <div>
                    <p>
                        <span class="rating-stars">
                            @for ($i = 0; $i < 5; $i++)
                                @if (floor(tutorReviews(auth_user()->id)[0]) - $i >= 1)
                                {{-- Full Star --}}
                                <i style="color: #FFC125;" class="fa fa-star"></i>
                                @elseif (tutorReviews(auth_user()->id)[0] - $i > 0)
                                {{-- Half Star --}}
                                <i style="color: #FFC125;" class="fa fa-star-half-o"></i>
                                @else
                                {{-- Empty Star --}}
                                <i style="color: #FFC125;" class="fa fa-star-o"></i>
                                @endif
                            @endfor
                        </span>
                        <strong>{{ nthDecimal(tutorReviews(auth_user()->id)[0], 1) }}</strong>
                        <a href="{{ route('tutor.reviews.list') }}"><small>({{ tutorReviews(auth_user()->id)[1] }} reviews)</small></a>
                    </p>
                    <p>
                        @if (is_null(auth()->user()->tutor_profile->stripe_account))
                            <a href="{{ route('connect', auth()->user()->id) }}" class="button-sm"><span class="txt">Connect Stripe</span></a>
                        @else
                            <a href="{{ route('stripe.account') }}" target="_blank" class="button-sm"><span class="txt">Go To Stripe</span></a>
                        @endif
                    </p>
                </div>
                <div class="other-info">
                    <a href="{{ route('tutor.dashboard') }}" title="Dashboard">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.dashboard') active @endrouteis">
                                <i class="fa fa-dashboard pencil_icon @routeis('tutor.dashboard') active @endrouteis"></i> Dashboard
                            </span>
                        </p>
                    </a>
                    
                    <a href="{{ route('tutor.profile.profile') }}" title="Edit Profile">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.profile*') active @endrouteis">
                                <i class="fa fa-user pencil_icon @routeis('tutor.profile*') active @endrouteis"></i> Profile
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('tutor.lesson.list') }}" title="Lessons">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.lesson*') active @endrouteis">
                                <i class="fa fa-shopping-cart pencil_icon @routeis('tutor.lesson*') active @endrouteis"></i> Lessons
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('tutor.trial.list') }}" title="Trials">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.trial*') active @endrouteis">
                                <i class="fa fa-bullhorn pencil_icon @routeis('tutor.trial*') active @endrouteis"></i> Trials
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('tutor.booking_request.list') }}" title="Bookings">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.booking_request*') active @endrouteis">
                                <i class="fa fa-book pencil_icon @routeis('tutor.booking_request*') active @endrouteis"></i> Bookings
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('tutor.students.list') }}" title="Students">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.students*') active @endrouteis">
                                <i class="fa fa-users pencil_icon @routeis('tutor.students*') active @endrouteis"></i> Students
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('tutor.transaction.list') }}" title="Earnings">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.transaction*') active @endrouteis">
                                <i class="fa fa-credit-card pencil_icon @routeis('tutor.transaction*') active @endrouteis"></i> Earnings
                            </span>
                        </p>
                    </a>
                    
                    <a href="{{ route('tutor.setting.index') }}" title="Settings">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('tutor.setting*') active @endrouteis">
                                <i class="fa fa-gear pencil_icon @routeis('tutor.setting*') active @endrouteis"></i> Settings
                            </span>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="logout_user" title="Logout">
                        <p class="clearfix">
                            <span class="pull-left side_tab">
                                <i class="fa fa-sign-out pencil_icon"></i> Logout
                            </span>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </aside>
</div>