function start_calendar()
{
	$(document).ready(function() {
	    let monthCalendarEl = document.getElementById('calendar-monthly');

	    let monthCalendar = new FullCalendar.Calendar(monthCalendarEl, {
	        headerToolbar: {
	            left: 'prev',
	            center: 'title',
	            right: 'next',
	        },
	        views : {
	            month:{
	                eventLimit: true
	            }
	        },
	        selectable: true,
	        selectMirror: true,
	        editable: true,
	        dayMaxEvents: true,
	        dateClick: function (info) {
	            is_past = false;
	            $(".fc-day-past").each(function(){
	                data_date = $(this).attr("data-date");
	                if(data_date == info.dateStr)
	                {
	                    is_past = true;
	                    return false;
	                }
	            });
	            if(!is_past)
	            {
	            	
            		// $(".booking_date").val(info.dateStr);
	                $.ajax({
	                    type: "GET",
	                    url: $daySlotsUrl,
	                    data: {
	                        id: $tutor,
	                        date: info.dateStr,
	                    },
	                    beforeSend: function() {
		                    loader = $(".loader_clone").html();
		                    $('#lessons').html(loader);
		                    // $(".front-booking-form").submit();
		                },
	                    success: function (response) {
                    		$("#lessons").html(response.html);
	                    	if(response.error !== '')
	                    	{
	                    		toastr.error(response.error)
	                    		start_calendar();
	                    	}
	                        
	                    }
	                });
	                
	            }
	        },


	    });

	    monthCalendar.render();

	    $(document).click(".fc-icon fc-icon-chevron-right",function(){
	        // display_calendar_colors($month_dates, $month_check);
	    });

	    // display_calendar_colors($month_dates,$month_check);

	    function display_calendar_colors($month_dates,$month_check)
	    {
	       $(".fc-daygrid-day").each(function (index, element) {
	            $elm = $(element);
	            $date = $elm.attr('data-date');
	            if (!$elm.hasClass("fc-day-other")) {
	                if ($.inArray($date, $month_dates) !== -1) {
	                    if($month_check[$date] == 24) {
	                        $elm.addClass('bg-danger');
	                    } else {
	                        $elm.addClass('bg-warning');
	                    }
	                } else {
	                    $elm.addClass('bg-success');
	                }
	            }
	        });
	    }

	});
}

