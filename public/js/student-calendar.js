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
            $.ajax({
                type: "GET",
                url: $slotsUrl,
                data: {
                    date: info.dateStr,
                },
                success: function (response) {
                    $(".daySlotsContainer").html(response);
                    slotsSetting();
                }
            });
        },


    });

    monthCalendar.render();

    // $(document).click(".fc-icon fc-icon-chevron-right",function(){
    //     // display_calendar_colors($month_dates, $month_check);
    // });

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
