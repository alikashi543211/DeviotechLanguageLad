function start_select_2_plugin()
{
	$(document).ready(function() {
	    $('.select2').select2();
	});
}

function update_website_currency(to)
{
	$("body .website_amount_html_usd").each(function(index, value){
		$amount_html = $(this).attr("amount-usd");
		if(!isNaN($amount_html))
		{
			amount_html = parseFloat($amount_html).toFixed(2);
			element = $(this);
			currency_converter_iso("USD", to, amount_html, 'html', element);
		}
	});

	$("body .website_amount_input_usd").each(function(index, value){
		$amount_html = $(this).attr("amount-usd");
		if(!isNaN($amount_html))
		{
			amount_html = parseFloat($amount_html).toFixed(2);
			element = $(this);
			currency_converter_iso("USD", to, amount_html, 'input', element);
		}
		
	});
}

function currency_converter_iso(from="USD", to="AED", amount=1, target="input", element)
{

	$(document).ready(function() {
	    $.get("https://openexchangerates.org/api/latest.json?app_id=4a3346e94fdb47c0a95ed502bfec371d", function(data) {
	    	$.each(data.rates,  function(index, value)
	    	{	
	    		if(index == to)
	    		{
	    			result = value*amount;
	    			// console.log(result);
	    			// console.log("ISO " + index);
	    			// console.log("Rate " + value);
	    			// console.log("Amount " + amount);
	    		}
	    		
	    	});
	        if(target == 'input')
    		{
    			element.val(parseFloat(result).toFixed(2));
    		}
    		if(target == 'html')
    		{
    			element.html(parseFloat(result).toFixed(2));
    		}
    		$("body .website_currency_code").html(to);
	    });
	});
}

function currency_converter(from="USD", to="AED", amount=1, target="input", element)
{
	$.ajax(
	{
     	type: "GET",

   		url: "https://free.currconv.com/api/v7/convert?q=" + from + "_"+ to +"&compact=ultra&apiKey=d22e368406f138a7b622",
    	success: function(data) {
	        var exchangeRate = JSON.stringify(data).replace(/[^0-9\.]/g,'');

    		var result = amount*exchangeRate;
    		if(target == 'input')
    		{
    			element.val(parseFloat(result).toFixed(2));
    		}
    		if(target == 'html')
    		{
    			element.html(parseFloat(result).toFixed(2));
    		}
    		$("body .website_currency_code").html(to);

        },
        error: function(error) {
	        console.log(error.error)

        }
    });
}





function on_change_submit_website_currency_form()
{
	$(document).on('select2:select', '.select2' , function (e) {
	    $(".website_currency_form").submit();
	});
}	


function on_change_class_channel_option()
{
	$(document).on('change', '.class_channel_option' , function (e) {
		class_channel = $(this).val();
		$(".channel_input_box").show();
	    if(class_channel == 'Skype')
		{
			$(".channel_input").attr("placeholder", "Enter "+class_channel+" ID");
			$(".channel_input_label").html("Enter "+class_channel+" ID*");
		}
		if(class_channel == 'Zoom')
		{
			$(".channel_input").attr("placeholder", "Enter "+class_channel+" Link");
			$(".channel_input_label").html("Enter "+class_channel+" Link*");
		}
	});
}






function validate_specific_date_modal_form()
{
	$(".specific_date_modal_form").validate({
        rules: {
            single_day: {
                required: true,
            },
        },
        messages: {
            single_day: {
                required: 'Select date',
            },
        },
        errorPlacement: function(error, element) {
         	$(element).addClass('error');
         	$(element).closest('.form-group').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
        },
        // set this class to error-labels to indicate valid fields
        success: function(label) {
            // set &nbsp; as text for IE
            label.html("&nbsp;").addClass("checked");
        },
        highlight: function(element, errorClass) {
            $(element).parent().next().find("." + errorClass).removeClass("checked");
        },
        unhighlight: function (element) {
            $(element).removeClass('error');
            $(element).closest('.form-group').find('.invalid-feedback').html('');
        }
    });
}



function adminFaqValidate()
{
	$(".faq-form").validate({
        rules: {
            question: {
                required: true,
            },
            answer: {
                required: true,
            },
        },
        messages: {
            question: {
                required: 'This field is required',
            },
            answer: {
                required: 'This field is required',
            },
        },
        errorPlacement: function(error, element) {
            $(element).addClass('error');
            console.log($(element).closest('.col-md-12'));
            $(element).closest('.col-md-12').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
            console.log($(element).closest('.col-md-12').html());
        },
        // set this class to error-labels to indicate valid fields
        success: function(label) {
            // set &nbsp; as text for IE
            label.html("&nbsp;").addClass("checked");
        },
        highlight: function(element, errorClass) {
            $(element).parent().next().find("." + errorClass).removeClass("checked");
        },
        unhighlight: function (element) {
            $(element).removeClass('error');
            $(element).closest('.col-md-12').find('.invalid-feedback').html('');
        }
    });
}



function onClickClearFilterButton()
{
    
    $(document).on("click", ".btn_clear_filter", function() {
        $(".filter-form input").val('');
        $(".filter-form").submit();
    });
}














function validateOnlyNumber()
{
    $(document).on("keyup", ".numbers", function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
}