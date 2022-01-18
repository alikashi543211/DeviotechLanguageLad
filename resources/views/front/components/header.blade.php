<!-- Main Header -->
<header class="main-header header-style-one front-header">
		
    	<!-- Header Upper -->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="{{ route('home') }}"><img style="height:59px;" width="120" src="{{ asset('front/assets') }}/images/logo.png" alt="" title="LanguageLad"></a></div>
                    </div>
                   	
                   	<div class="nav-outer clearfix">
						<!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li class="@routeis('home') current @endrouteis"><a href="{{ route('home') }}">Home</a></li>
									<li class="@routeis('tutors') current @endrouteis"><a href="{{ route('tutors') }}">Teachers</a></li>
									<li class="@routeis('about') current @endrouteis"><a href="{{ route('about') }}">About</a></li>
									<li class="@routeis('contact') current @endrouteis"><a href="{{ route('contact') }}">Contact</a></li>
                                    @if(!Auth::check())
                                    	<li class="@routeis('login') current @endrouteis"><a href="{{ route('login') }}">Log In</a></li>
                                    	<li class="dropdown @routeis('register') current @endrouteis @routeis('tutor.register') current @endrouteis">
                                    		<a href="javascript:;">Sign Up</a>
		                                    <ul>
		                                        <li><a href="{{ route('register') }}">As Student</a></li>
		                                        <li><a href="{{ route('tutor.register') }}">As Teacher</a></li>
		                                    </ul>
		                                </li>
                                	@else
										<li class="dropdown @routeis('tutor.*') current @endrouteis @routeis('student.*') current @endrouteis">
											<a href="javascript:;">{{ auth_user()->name ?? 'My Account' }}</a>
											<ul>
												@if(auth()->user()->role == 'student')
													<li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
												@elseif(auth()->user()->role == 'tutor')
													<li><a href="{{ route('tutor.dashboard') }}">Dashboard</a></li>
												@elseif(auth()->user()->role == 'admin')
													<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
												@endif
												<li>
                                                    <a href="javascript:void(0);" class="logout_user">Logout</a>
                                                    <form action="{{ route('logout') }}" class="logout_form" method="POST">
                                                        @csrf
                                                    </form>
                                                </li>
											</ul>
										</li>
                                	@endif

								</ul>
							</div>
							
						</nav>
						
					</div>
                   
                </div>
            </div>
        </div>
        <!-- End Header Upper -->
        
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ route('home') }}"><img width="120" src="{{ asset('front/assets') }}/images/logo.png" alt="" title="Home"></a></div>
                <div class="menu-outer">
					<!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
				</div>
            </nav>
        </div>
		<!-- End Mobile Menu -->
		
    </header>