<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title') | LanguageLad</title>
<!-- Stylesheets -->
<link href="{{ asset('front/assets') }}/css/bootstrap.css" rel="stylesheet">
<link href="{{ asset('front/assets') }}/css/main.css" rel="stylesheet">
<link href="{{ asset('front/assets') }}/css/responsive.css" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Titillium+Web:wght@300;400;600;700;900&display=swap" rel="stylesheet">
<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Dropify -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Time Picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" />
<!-- Datatable Css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<!-- Bootstrap Switch -->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<!-- Custom Files -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets') }}/css/custome.css">
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets') }}/css/custom.css">

@yield('css')
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{ asset('front/assets') }}/js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
   @include("front.components.header")

   <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('front/assets/images/banner_image_2.jpg')}})">
        <div class="auto-container">
            <h1>Teacher Dashboard</h1>
        </div>
    </section>
    <!--End Page Title-->
   <!-- Edit Profile Section -->
    <section class="dashboard-section sidebar-page-container edit-profile-section">
        <div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-1.png)"></div>
        <div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-2.png)"></div>
        <div class="auto-container">
            
            <div class="row clearfix">
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
	                @include('tutor.components.sidebar')
	            </div>
                
                <!-- Content Section -->
                <div class="content-column col-lg-9 col-md-12 col-sm-12">
                    @yield('content')
                </div>
                
            </div>
            
        </div>
        
    </section>
    <!-- End Profile Section -->
	<!-- Call To Action Section Two -->
	<section class="call-to-action-section-two" style="background-image: url('{{ asset('front/assets/images/background/3.png')  }}')">
		<div class="auto-container">
			<div class="content">
				<h2>Ready to get started?</h2>
				<div class="text">Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two <br> waters own morning gathered greater shall had behold had seed.</div>
				<div class="buttons-box">
					<a href="{{ route('tutors') }}" class="theme-btn btn-style-one"><span class="txt">Get Stared <i class="fa fa-angle-right"></i></span></a>
					<a href="{{ route('tutors') }}" class="theme-btn btn-style-two"><span class="txt">All Teachers <i class="fa fa-angle-right"></i></span></a>
				</div>
			</div>
		</div>
	</section>
	<!-- End Call To Action Section Two -->
	
	@include('front.components.footer')
	
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>
<div class="modal_loader_clone d-none">
    <div class="row clearfix my-3" id="lessons">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row not-valid" id="schedule-row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="dashbaord-content-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <img id="loading-image-1" width="70" src="{{ asset('front') }}/assets/images/preloader.svg">
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('front/assets') }}/js/jquery.js"></script>
<script src="{{ asset('front/assets') }}/js/popper.min.js"></script>
<script src="{{ asset('front/assets') }}/js/jquery.scrollTo.js"></script>
<script src="{{ asset('front/assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('front/assets') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('front/assets') }}/js/jquery.fancybox.js"></script>
<script src="{{ asset('front/assets') }}/js/appear.js"></script>
<script src="{{ asset('front/assets') }}/js/swiper.min.js"></script>
<script src="{{ asset('front/assets') }}/js/element-in-view.js"></script>
<script src="{{ asset('front/assets') }}/js/jquery.paroller.min.js"></script>
<script src="{{ asset('front/assets') }}/js/parallax.min.js"></script>
<script src="{{ asset('front/assets') }}/js/tilt.jquery.min.js"></script>
<!--Master Slider-->
<script src="{{ asset('front/assets') }}/js/jquery.easing.min.js"></script>
<script src="{{ asset('front/assets') }}/js/owl.js"></script>
<script src="{{ asset('front/assets') }}/js/wow.js"></script>
<script src="{{ asset('front/assets') }}/js/jquery-ui.js"></script>
<!-- Toastr and Dropify -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<!-- Select 2 css -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Moment Js and Time Picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous"></script>
<!-- Datatable -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<!-- Switch Script -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Validator Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!-- Custom Script Js -->
<script src="{{ asset('front/assets') }}/js/script.js"></script>
<script src="{{ asset('front/assets') }}/js/custom.js"></script>
<script>
	// Map Old Fields
	function mapDataToFields(data)
	{
	    $.map(data, function(value, index){
	        var input = $('[name="'+index+'"]');
	        if($(input).length && $(input).attr('type') !== 'file')
	        {
	          if(($(input).attr('type') == 'radio' || $(input).attr('type') == 'checkbox') && value == $(input).val())
	            $(input).prop('checked', true);
	          else
	              $(input).val(value).change();
	        }
	    });
	}
	var data = <?php echo json_encode(session()->getOldInput()) ?>;
	mapDataToFields(data);

	// Logout User
	$(document).on("click", ".logout_user", function(){
		$(".logout_form").submit();
	});

	// Start Dropify
	start_dropify();
	function start_dropify()
	{
		$('.dropify').dropify();
	}

	$(document).on("keyup", ".numbers", function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    
	@if(session('success'))
	    toastr.success("{{ session('success') }}");
	@elseif(session('error'))
	    toastr.error("{{ session('error') }}");
	@endif

	// Time Picker
	start_time_picker();
	function start_time_picker()
	{
		$(function(){
	        $("body").find(".timepicker").datetimepicker({
	            format: 'LT',
	            icons: {
	                time: 'fa fa-clock-o',
	                date: 'fa fa-calendar',
	                up: 'fa fa-chevron-up',
	                down: 'fa fa-chevron-down',
	                previous: 'fa fa-chevron-left',
	                next: 'fa fa-chevron-right',
	                today: 'fa fa-bullseye',
	                clear: 'fa fa-trash',
	                close: 'fa fa-times'
	            },
	        }).on("dp.change", function(e) {
	            $this = $(this);
	            $url = '{{ route("tutor.setting.check.from.to") }}'
	            validate_time_value($this, $url);
	        });
	    });
	}

	function validate_time_value($this, $url)
	{
		$specific_day_result = false;
		$from_time = $this.closest(".row").find('.from_time').val();
		$to_time = $this.closest(".row").find('.to_time').val();

		if($from_time !== '' && $to_time !== '')
		{
			$url = $url+"?from="+$from_time+"&to="+$to_time
			$.get($url, function(response){
		    	if(response)
		    	{
		    		$(".save_time_table_form").find(".save_time_table_button").attr("type", "submit");
		    		$this.closest(".row").find(".time_slot_error_col").hide();
		    	}else{
		    		$(".save_time_table_form").find(".save_time_table_button").attr("type", "button");
		    		$this.closest(".row").find(".time_slot_error_col").show();
		    	}
		  	});
		}
	}

    // Date Picker
    start_datepicker();

    function start_datepicker()
    {
    	$(function(){
	        $('body').find('.datepicker').datetimepicker({
		        useCurrent: false,
		        icons: {
		            time: 'fa fa-clock-o',
		            date: 'fa fa-calendar',
		            up: 'fa fa-angle-up',
		            down: 'fa fa-angle-down',
		            previous: 'fa fa-angle-left',
		            next: 'fa fa-angle-right',
		            today: 'fa fa-bullseye',
		            clear: 'fa fa-trash',
		            close: 'fa fa-times'
		        },
		        format: 'YYYY/MM/DD',
		    });
	    });
    }
    
    // Datatable
    start_data_table();

    function start_data_table()
    {
    	$(document).ready(function() {
		    $('.data_table').DataTable();
		});
    }

    // numbers validation
    $(document).on("keyup", ".numbers", function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    // text validation
    $(document).on("keyup", ".text_only", function () { 
        var node = $(this);
    	node.val(node.val().replace(/[0-9]*$/,'') );
    });

    // Jquery Validator
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        }
    );

    $.validator.addMethod("youtube", function(value, element) {
    	if(value !== '')
    	{
    		var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
	     	return (value.match(p)) ? RegExp.$1 : false;
    	}else{
    		return true;
    	}
	     
    }, "Enter correct youtube vidoe link");

    $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');

    $.validator.setDefaults({
        ignore: []
    });

    // Active Nav Tab When Redirect Back With Navtab
	function activeTab(tab){
		$('.tab-btn a[href="#' + tab + '"]').click();
	};
    
    function start_pdf_dropify()
    {
    	$('body .pdf_dropify').dropify({
			messages: {
	            'default': 'Click to upload pdf file',
	            'replace': 'Click to upload pdf file to replace',
	        }
		});
    }

    function start_certificate_datepicker()
    {
    	$(function(){
	        $('body').find('.certificate_datepicker').datetimepicker({
		        useCurrent: true,
		        debug:true,
		        icons: {
		            time: 'fa fa-clock-o',
		            date: 'fa fa-calendar',
		            up: 'fa fa-angle-up',
		            down: 'fa fa-angle-down',
		            previous: 'fa fa-angle-left',
		            next: 'fa fa-angle-right',
		            today: 'fa fa-bullseye',
		            clear: 'fa fa-trash',
		            close: 'fa fa-times'
		        },
		        format: 'YYYY',
		        maxDate: new Date(),
		    });
	    });
    }

    function start_switch()
    {
        $(function(){ $('.switch_on_off').bootstrapToggle() });
    }

    // Custom JS File Jquery
    start_select_2_plugin();
    on_change_submit_website_currency_form();
    @if(!is_null(session('website_currency')))
    	update_website_currency("{{ session('website_currency') }}");
	@endif
</script>
@yield('js')
</body>
</html>