
<footer class="main-footer">
    <!-- Pattern Layer -->
    <div class="auto-container">

        <!-- Widgets Section -->
        <div class="widgets-section">
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-12 col-md-12 col-sm-12">

                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-3 col-md-3 col-sm-12 text-md-left text-center mb-md-0 mb-4">
                            <div class="footer-widget logo-widget m-0">
                                <div class="logo m-0">
                                    <a href="{{ route('home') }}"><img style="width:75px;" src="{{ asset('front/assets') }}/images/logo.png" alt="" /></a>
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column footer-menu col-lg-9 col-md-9 col-sm-12 text-md-right m-auto text-center">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('tutors') }}">Teachers</a></li>
                                <li><a href="{{ route('tutor.register') }}">Become A Teacher</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>

                            </ul>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-8 col-sm-8"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="styled-form">
                                <form action="{{ route('change_currency') }}" class="website_currency_form">
                                    <div class="form-group mb-0">
                                        <select name="website_currency" class="website_currency select2">
                                            <option value="USD" selected>USD</option>
                                            @foreach(currency_dropdown() as $item)
                                                @if($item == 'USD')
                                                    @continue
                                                @endif
                                                <option value="{{ $item }}" @if(!is_null(session('website_currency')) && $item == session('website_currency')) selected @endif>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="big-column col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                    <div class="copyright">Copyright © {{ date('Y') }} LanguageLad</div>
                </div>
            </div>
        </div>

    </div>
</footer>


 {{-- <footer class="main-footer">
        <!-- Pattern Layer -->
        <div class="pattern-layer paroller" data-paroller-factor="0.60" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image:url(images/icons/icon-1.png)"></div>
        <div class="pattern-layer-two data-paroller-factor="0.60" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image:url(images/icons/icon-3.png)"></div>
        <div class="auto-container">
        
            <!-- Widgets Section -->
            <div class="widgets-section">
                <div class="row clearfix">
                    
                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            
                            <!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="{{ route('home') }}"><img width="120" src="{{ asset('front/assets') }}/images/logo.png" alt="" title="Bootcamp"></a>
                                    </div>
                                    <div class="text">Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two waters own morning gathered greater.</div>
                                    <div class="social-box">
                                        <a href="#" class="fa fa-facebook"></a>
                                        <a href="#" class="fa fa-instagram"></a>
                                        <a href="#" class="fa fa-twitter"></a>
                                        <a href="#" class="fa fa-google"></a>
                                        <a href="#" class="fa fa-pinterest-p"></a>
                                    </div>
                                    <div class="copyright">Copyright &copy; {{ date('Y') }} LanguageLad</div>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>About Us</h4>
                                    <ul class="links-widget">
                                        <li><a href="#">Afficiates</a></li>
                                        <li><a href="#">Partners</a></li>
                                        <li><a href="#">Reviews</a></li>
                                        <li><a href="#">Blogs</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            
                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Resource</h4>
                                    <ul class="links-widget">
                                        <li><a href="{{ route('terms') }}">Privacy Policy</a></li>
                                        <li><a href="{{ route('tutor.register') }}">Become a Teacher</a></li>
                                        <li><a href="#">Documentations</a></li>
                                        <li><a href="#">How it works</a></li>
                                        <li><a href="{{ route('terms') }}">Terms of Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Quick Links</h4>
                                    <ul class="links-widget">
                                        <li><a href="#">home</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Features</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </footer>

    --}}