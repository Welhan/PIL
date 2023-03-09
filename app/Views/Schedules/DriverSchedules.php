<?= $this->extend("Layout/Template"); ?>

<?= $this->section("content"); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/calendar/fonts/icomoon/style.css">
    <link href="assets/calendar/fullcalendar/packages/core/main.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar/packages/daygrid/main.css" rel="stylesheet" />
</head>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Driver Schedules</h1>
        <div class="card mb-4">
            <div class="card-body mx-auto" style="width: 75%;height: 75%;">
                <div class="content">
                    <div id="calendar"></div>
                    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalBody">
                                    <!-- Detail event akan ditampilkan disini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="assets/calendar/js/jquery-3.3.1.min.js"></script>
<script src="assets/calendar/js/popper.min.js"></script>
<script src="assets/calendar/js/bootstrap.min.js"></script>

<script src="assets/calendar/fullcalendar/packages/core/main.js"></script>
<script src="assets/calendar/fullcalendar/packages/interaction/main.js"></script>
<script src="assets/calendar/fullcalendar/packages/daygrid/main.js"></script>
<script src="assets/calendar/js/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            defaultDate: '2020-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events,
            eventColor: 'transparent',
            events: [{
                    id: '1',
                    title: 'Event 1',
                    start: '2020-02-12T10:00:00',
                    end: '2020-02-12T12:00:00',
                    backgroundColor: 'grey',
                    description: 'Event 1 Details: Start: 10:00 AM, End: 12:00 PM'
                },
                {
                    id: '2',
                    title: 'Event 2',
                    start: '2020-02-13T10:00:00',
                    end: '2020-02-13T12:00:00',
                    backgroundColor: 'lightblue',
                    description: 'Event 2 Details: Start: 10:00 AM, End: 12:00 PM'
                }
            ],
            eventClick: function(info) {
                var modalTitle = document.getElementById('modalTitle');
                var modalBody = document.getElementById('modalBody');

                // Cari event dengan id yang sesuai
                var event = calendar.getEventById(info.event.id);

                // Set judul dan detail event pada modal
                modalTitle.innerHTML = event.title;
                modalBody.innerHTML = 'Start: ' + event.start + '<br>End: ' + event.end + '<br>Description: ' + event.extendedProps.description;

                // Tampilkan modal
                var eventModal = new bootstrap.Modal(document.getElementById('eventModal'), {});
                eventModal.show();
            }
        });

        calendar.render();
    });
</script>
<?= $this->endSection(); ?>