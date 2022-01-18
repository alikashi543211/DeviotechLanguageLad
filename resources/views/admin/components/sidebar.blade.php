<div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('admin_theme') }}/assets/img/sidebar-3.jpg">
    <div class="logo">
        <a href="{{ route('home') }}" target="_blank" class="simple-text logo-normal text-center">{{-- <img src="{{ asset(setting('logo_light')) }}" width="100px;" alt=""> --}}
        LanguageLad</a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('default.png') }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>Admin <b class="caret"></b></span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile') }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item @routeis('admin.dashboard') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item @routeis('admin.tutors.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#services">
                    <i class="material-icons">people</i><p> Teachers<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.tutors.*') show @endrouteis" id="services">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.tutors.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.tutors.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Teachers List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.students.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#students">
                    <i class="material-icons">group</i><p> Students<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.students.*') show @endrouteis" id="students">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.students.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.students.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Student List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.bookings.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#side_bookings">
                    <i class="material-icons">shopping_cart</i><p> Bookings<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.bookings.*') show @endrouteis" id="side_bookings">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.bookings.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.bookings.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Booking List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.trials.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#side_trials">
                    <i class="material-icons">update</i><p> Trials<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.trials.*') show @endrouteis" id="side_trials">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.trials.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.trials.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Trial List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.transaction.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#earnings">
                    <i class="material-icons">price_check</i><p> Earnings<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.transaction.*') show @endrouteis" id="earnings">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.transaction.*') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.transaction.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Earning List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li class="nav-item @routeis('admin.payout.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#payouts">
                    <i class="material-icons">paid</i><p> Tutor Payouts<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.payout.*') show @endrouteis" id="payouts">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.payout.*') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.payout.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Payout List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            <li class="nav-item @routeis('admin.testimonial.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#testimonial">
                    <i class="material-icons">directions_boat_filled</i><p> Testimonial<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.testimonial.*') show @endrouteis" id="testimonial">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.testimonial.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.testimonial.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.faq.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#faqs_page">
                    <i class="material-icons">quiz</i><p> FAQs<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.faq.*') show @endrouteis" id="faqs_page">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.faq.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.faq.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.language.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#languages">
                    <i class="material-icons">language</i><p> Languages<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.language.*') show @endrouteis" id="languages">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.language.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.language.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @routeis('admin.tag.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#tages">
                    <i class="material-icons">filter_alt</i><p> Tags<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.tag.*') show @endrouteis" id="tages">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.tag.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.tag.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item @routeis('admin.cms.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#cms">
                    <i class="material-icons">directions_boat_filled</i><p> CMS<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.cms.*') show @endrouteis" id="cms">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.cms.general') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.general') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> General </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.cms.terms.page') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.terms.page') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Terms and Conditions</span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.cms.privacy.page') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.privacy.page') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Privacy Policy</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            

            <li class="nav-item">
                <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                    <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
                    <i class="material-icons">logout</i>
                    <p> Logout </p>
                </a>
            </li>
        </ul>
    </div>
</div>
