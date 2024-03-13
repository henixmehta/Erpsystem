$(document).ready(function () {
    if (document.querySelectorAll('#calendar1').length) {
        // Fetch holiday data from your database
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            success: function (response) {
                // Format holiday data into FullCalendar event objects
                let holidayEvents = response.map(function (holiday) {
                    return {
                        title: holiday.name, // Assuming holiday object has 'name' property
                        start: holiday.date, // Assuming holiday object has 'date' property in ISO format (e.g., '2024-01-01')
                        backgroundColor: 'red', // Customize background color for holidays
                        textColor: 'white', // Customize text color for holidays
                        borderColor: 'red' // Customize border color for holidays
                    };
                });

                // Initialize FullCalendar with holiday events
                let calendarEl = document.getElementById('calendar1');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    plugins: ["timeGrid", "dayGrid", "list", "interaction"],
                    timeZone: "UTC",
                    defaultView: "dayGridMonth",
                    contentHeight: "auto",
                    eventLimit: true,
                    dayMaxEvents: 4,
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                    },
                    dateClick: function (info) {
                        $('#schedule-start-date').val(info.dateStr)
                        $('#schedule-end-date').val(info.dateStr)
                        $('#date-event').modal('show')
                    },
                    events: holidayEvents // Pass holiday events array here
                });

                // Render the calendar
                calendar.render();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching holiday data:', error);
            }
        });
    }
});
