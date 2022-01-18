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
<!-- Toastr and Dropify -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

<!-- Calendar CSS -->
<link rel="stylesheet" href="https://unpkg.com/fullcalendar@5.1.0/main.min.css" />
<!-- Time Picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" />
<!-- Select 2 css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Bootstrap Switch -->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<!-- custom css files -->
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

	@yield('content')

	<!-- Call To Action -->
	@include("front.components.call_to_action")
	
	<!--Main Footer-->
    @include("front.components.footer")
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

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
<!-- Select 2 Plugin -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Calendar -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js'></script>
<script src="https://unpkg.com/fullcalendar@5.1.0/main.min.js"></script>
<!-- Moment Js and Time Picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous"></script>
<!-- Switch Script -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Validator Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script src="{{ asset('front/assets') }}/js/script.js"></script>
<script src="{{ asset('front/assets') }}/js/custom.js"></script>
<script>
	
	

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
</script>
<script>
	$(document).on("click", ".logout_user", function(){
		$(".logout_form").submit();
	});

	$(document).on("keyup", ".numbers", function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    
	$('.dropify').dropify();

	$('.pdf_dropify').dropify({
		messages: {
            'default': 'Click to upload pdf file',
            'replace': 'Click to upload pdf file to replace',
        }
	});
	
	@if(session('success'))
	    toastr.success("{{ session('success') }}");
	@elseif(session('error'))
	    toastr.error("{{ session('error') }}");
	@endif

	// Time Picker
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
        });
    });

	function start_certificate_datepicker()
    {
    	$(function(){
	        $('body').find('.certificate_datepicker').datetimepicker({
		        useCurrent: true,
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

    function start_pdf_dropify()
    {
    	$('body .pdf_dropify').dropify({
			messages: {
	            'default': 'Click to upload pdf file',
	            'replace': 'Click to upload pdf file to replace',
	        }
		});
    }

	// Date Picker
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

    $(function(){
        $('body').find('.certificate_datepicker').datetimepicker({
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
	        format: 'YYYY',
	        maxDate: new Date(),
	    });
    });

	function validate() {
		var valid = true;
		$("form").find('.invalid-feedback').remove();
		$(".valid-control:visible").each(function () {
			// $(this).attr("type") == 'checkbox';
			// if()
			// console.log($('[name="'+$(this).attr("name")+'"]:checked').val());
			if ($(this).val() == "" && $(this).val() != null) {
				//$(this).closest("div").find(".invalid-feedback").remove();
				$(this)
				.closest(".form-group")
				.append('<span class="invalid-feedback"><strong>This field is required.</strong></span>');
				valid = false;
			} 
			else {
				$(this).closest("div").find(".invalid-feedback").remove();
			}
		});
		if (!valid) {
			$("html, body").animate(
				{
					scrollTop: $(".invalid-feedback:first").offset().top-80,
				},
				100
			);
		}
		return valid;
	}

	$(document).on('change', '.valid-control', function(){
        $(this).closest(".form-group").find(".invalid-feedback").remove();
    });

    $(document).on('keyup', '.valid-control', function(){
        $(this).closest(".form-group").find(".invalid-feedback").remove();
    });

    // numbers validation
    $(document).on("keyup", ".numbers", function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    // text validation
    $(document).on("keyup", ".text_only", function () { 
        var node = $(this);
    	node.val(node.val().replace(/[0-9]*$/,'') );
    });


    $(document).on('click', '.toggle-password-input', function() {
        var input = $(".pass_input");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });

    $(document).on('click', '.toggle-confirm-password-input', function() {
        // $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(".confirm_pass_input");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });

    // Jquery Validator Settings
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0}');

	$.validator.addMethod("notOnlyZero", function (value, element, param) {
	    return this.optional(element) || parseInt(value) > 0;
	});

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        }
    );

    $.validator.setDefaults({
        ignore: []
    });

    // Scroll To Particular Section
    function scrollTo(elm)
    {
	    $('html, body').animate({
	        scrollTop: $("#"+elm).offset().top
	    }, 2000);
    }

    $(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	})

    // NavTab for Tutor Detail Page Jquery
    $(".profile-tabs .tab-btns li").click(function(){
        $(this).addClass('active-btn').siblings().removeClass('active-btn');
    });

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