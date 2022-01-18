<!-- Image Section -->

<div class="sidebar-inner tutor-sidebar-inner">
    <aside class="sidebar">
        <div class="dashboard-widget">
            <div class="general-info text-center">
                <div class="avatar">
                    <img src="{{ asset(student()->image ?? 'default.png') }}" class="img-fluid" alt="">
                </div>
                <h5>{{ student()->user->name }}</h5>
                <!-- <div class="dd_dump"></div> -->
                <div class="other-info">
                    <a href="{{ route('student.dashboard') }}" title="Dashboard">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('student.dashboard') active @endrouteis">
                                <i class="fa fa-dashboard pencil_icon @routeis('student.dashboard') active @endrouteis"></i> Dashboard
                            </span>
                        </p>
                    </a>
                    
                    <a href="{{ route('student.profile.edit') }}" title="Edit Profile">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('student.profile*') active @endrouteis">
                                <i class="fa fa-user pencil_icon @routeis('student.profile*') active @endrouteis"></i> Profile
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('student.trial.list') }}" title="Trials">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('student.trial*') active @endrouteis @if(isset(request()->trial))   active @endif">
                                <i class="fa fa-bullhorn pencil_icon @routeis('student.trial*') active @endrouteis @if(isset(request()->trial)) active @endif"></i> Trials
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('student.booking_request.list') }}" title="Bookings">
                        <p class="clearfix">
                            <span class="pull-left side_tab @if(isset(request()->trial))  @else @routeis('student.booking_request*') active @endrouteis @endif">
                                <i class="fa fa-book pencil_icon @if(isset(request()->trial))  @else @routeis('student.booking_request*') active @endrouteis @endif"></i> Bookings
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('student.package.list') }}" title="Packages">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('student.package*') active @endrouteis @if(isset(request()->trial))   active @endif">
                                <i class="fa fa-dollar pencil_icon @routeis('student.package*') active @endrouteis @if(isset(request()->trial)) active @endif"></i> Packages
                            </span>
                        </p>
                    </a>

                    <a href="{{ route('student.transaction.list') }}" title="Transactions">
                        <p class="clearfix">
                            <span class="pull-left side_tab @routeis('student.transaction*') active @endrouteis">
                                <i class="fa fa-credit-card pencil_icon @routeis('student.transaction*') active @endrouteis"></i> Transactions
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