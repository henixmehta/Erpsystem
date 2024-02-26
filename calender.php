<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Calendar with Holidays</title>
    <style>
        /* Calendar styles */
        .calendar {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
        }

        .month {
            display: flex;
            flex-wrap: wrap;
        }

        .day {
            width: calc(100% / 7);
            border: 1px solid #ccc;
            padding: 5px;
            box-sizing: border-box;
        }

        .event {
            font-weight: bold;
            color: blue;
        }

        /* Button styles */
        .btn {
            cursor: pointer;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin: 5px;
            padding-top:10px;
        }
    </style>
</head>
<body>
    <button class="btn" id="prevBtn">Previous</button>
    <button class="btn" id="nextBtn">Next</button>
    <div class="calendar" id="calendar"></div>

    <script>
        let currentYear;
        let currentMonth;
        let holidays = []; // Array to store holidays

        // Function to generate dynamic calendar with holidays
        function generateCalendar(year, month) {
            currentYear = year;
            currentMonth = month;
            const startDate = new Date(year, month - 1, 1); // Month is 0-based
            const endDate = new Date(year, month, 0);
            const numDays = endDate.getDate();
            const startDay = startDate.getDay(); // Day of the week (0 - Sunday, 1 - Monday, ..., 6 - Saturday)

            const calendarDiv = document.getElementById('calendar');
            calendarDiv.innerHTML = ''; // Clear previous calendar

            // Create month and year header
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const header = document.createElement('h2');
            header.textContent = monthNames[month - 1] + ' ' + year;
            calendarDiv.appendChild(header);

            // Create days of the week header
            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const daysOfWeekRow = document.createElement('div');
            daysOfWeekRow.classList.add('month');
            daysOfWeek.forEach(day => {
                const dayDiv = document.createElement('div');
                dayDiv.textContent = day;
                dayDiv.classList.add('day');
                daysOfWeekRow.appendChild(dayDiv);
            });
            calendarDiv.appendChild(daysOfWeekRow);

            // Fill in calendar days
            let currentDay = 1;
            for (let i = 0; i < 6; i++) { // Maximum 6 rows for a month
                const weekRow = document.createElement('div');
                weekRow.classList.add('month');
                for (let j = 0; j < 7; j++) {
                    if ((i === 0 && j < startDay) || currentDay > numDays) {
                        const emptyDay = document.createElement('div');
                        emptyDay.classList.add('day');
                        weekRow.appendChild(emptyDay);
                    } else {
                        const dayDiv = document.createElement('div');
                        dayDiv.textContent = currentDay;
                        dayDiv.classList.add('day');
                        // Check if the current day is a holiday
                        const isHoliday = holidays.some(holiday => {
                            const holidayDate = new Date(holiday.date);
                            return holidayDate.getDate() === currentDay && holidayDate.getMonth() === month - 1 && holidayDate.getFullYear() === year;
                        });
                        if (isHoliday) {
                            dayDiv.classList.add('event'); // Apply event styling for holidays
                        }
                        // You can add event handling or styling for specific days here
                        weekRow.appendChild(dayDiv);
                        currentDay++;
                    }
                }
                calendarDiv.appendChild(weekRow);
                if (currentDay > numDays) break; // Break if all days are filled
            }
        }

        // Generate calendar for current month and year on page load
        const currentDate = new Date();
        generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);

        // Event listeners for previous and next buttons
        document.getElementById('prevBtn').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth === 0) {
                currentMonth = 12;
                currentYear--;
            }
            generateCalendar(currentYear, currentMonth);
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth === 13) {
                currentMonth = 1;
                currentYear++;
            }
            generateCalendar(currentYear, currentMonth);
        });

        // Sample holidays data (replace with your actual data)
        holidays = [
            { date: '2023-01-01', name: 'New Year' },
            { date: '2023-07-04', name: 'Independence Day' },
            { date: '2023-12-25', name: 'Christmas' }
            // Add more holidays as needed
        ];
    </script>
</body>
</html>
