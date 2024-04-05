@include('layouts.user.head-main')

<head>

    <link href="/assets/css/main.css" rel="stylesheet" type="text/css" />

    @include('layouts.user.title-meta')
    @include('layouts.user.head-css')

</head>

@include('layouts.user.body')
@include('sweetalert::alert')

<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.user.menu')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Dashboard</span></h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="row">

                            <div id="external-events" class="mt-2"></div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>

                        <div style='clear:both'></div>

                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('layouts.user.footer')

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('layouts.user.vendor-scripts')

<!-- Calendar init -->
<script src="/assets/js/main.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.ajax({
            url: 'http://127.0.0.1:8000/user/agenda/calendar',
            method: 'GET',
            success: function(data) {
                console.log(data);
                var calendarEl = document.getElementById('calendar');
                var events = data.map(function(event) {
                    var date = new Date(event.dates);
                    var year = date.getFullYear();
                    var month = (date.getMonth() + 1).toString().padStart(2, '0');
                    var day = date.getDate().toString().padStart(2, '0');
                    var formattedDate = `${year}-${month}-${day}`;
                    var startTime = formattedDate + 'T' + event.times_start;
                    var endTime = formattedDate + 'T' + event.times_end;
                    console.log(formattedDate);
                    return {
                        id: event.id,
                        title: event.meeting_name,
                        start: startTime,
                        end: endTime,
                        participant: event.name,
                        client: event.name_client,
                        description: event.description,
                        meeting_start: startTime,
                        meeting_end: endTime,
                        className: 'bg-primary',
                    };
                });
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    buttonText: {
                        today: 'Hari Ini',
                        month: 'Bulan',
                        week: 'Minggu',
                        day: 'Hari',
                        list: 'Daftar'
                    },
                    locale: 'id',
                    initialView: 'timeGridWeek',
                    themeSystem: 'bootstrap',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    slotMaxTime: "17:00:00",
                    slotMinTime: "09:00:00",
                    slotDuration: "00:30:00",
                    slotLabelFormat: {
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: false
                    },
                    height: 'auto',
                    navLinks: true,
                    editable: false,
                    selectable: true,
                    selectMirror: true,
                    dayMaxEvents: true,
                    allDaySlot: false,
                    timeZone: 'Asia/Jakarta',
                    hiddenDays: [0, 6],
                    events: events,
                    eventClick: function(info) {
                        $('#eventModal').modal('show');
                        $('#eventTitle').text(info.event.title);
                        $('#eventParticipant').text(info.event.extendedProps
                            .participant);
                        $('#eventClient').text(info.event.extendedProps
                            .client || 'Butuh Verifikasi Klien');
                        $('#eventStartDate').text(info.event.start
                            .toLocaleDateString(
                                'id-ID', {
                                    weekday: 'long',
                                    day: 'numeric',
                                    month: 'long',
                                    year: 'numeric',
                                    timeZone: 'Asia/Jakarta'
                                }));
                        $('#eventDescription').text(info.event.extendedProps
                            .description || '-');
                        if (info.event.extendedProps.meeting_start && info.event
                            .extendedProps.meeting_end) {
                            var meetingStartTime = new Date(info.event.extendedProps
                                .meeting_start);
                            var meetingEndTime = new Date(info.event.extendedProps
                                .meeting_end);
                            var formattedStartTime = meetingStartTime.getHours()
                                .toString().padStart(2, '0') + ':' +
                                meetingStartTime.getMinutes().toString().padStart(2,
                                    '0');
                            var formattedEndTime = meetingEndTime.getHours()
                                .toString().padStart(2, '0') + ':' + meetingEndTime
                                .getMinutes().toString().padStart(2, '0');
                            $('#eventTimes').text(formattedStartTime +
                                ' WIB s/d ' + formattedEndTime + ' WIB');
                        } else {
                            $('#eventTimes').text('-');
                        }
                    },
                    select: function(info) {
                        var meeting_start = info
                            .startStr;
                        var meeting_end = info
                            .endStr;

                        var start_date = meeting_start.split('T')[0];
                        var end_date = meeting_end.split('T')[0];
                        var start_time = meeting_start.split('T')[1];
                        var end_time = meeting_end.split('T')[1];

                        document.getElementById('start_date_input').value =
                            start_date;
                        document.getElementById('times_start_input').value =
                            start_time;
                        document.getElementById('times_end_input').value = end_time;

                        window.selectedDates = {
                            start_date: start_date,
                            start_time: start_time,
                            end_time: end_time
                        };
                    },
                });
                calendar.render();
            },
        });
    });
</script>

<!-- Modal Detail Event -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Detail Agenda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Detail's -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3" style="border:1px solid #ccc;">
                            <span class="ms-4 mt-2 mb-2 text-secondary" style="font-weight: bold">Nama Meeting</span>
                            <p class="ms-4 text-dark" style="font-weight: bold" id="eventTitle"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3" style="border:1px solid #ccc;">
                            <span class="ms-4 mt-2 mb-2 text-secondary" style="font-weight: bold">Deskripsi
                                Meeting</span>
                            <p class="ms-4 text-dark" style="font-weight: bold" id="eventDescription"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3" style="border:1px solid #ccc;">
                            <span class="ms-4 mt-2 mb-2 text-secondary" style="font-weight: bold">Partisipan</span>
                            <p class="ms-4 text-dark" style="font-weight: bold" id="eventParticipant"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3" style="border:1px solid #ccc;">
                            <span class="ms-4 mt-2 mb-2 text-secondary" style="font-weight: bold">Nama Klien</span>
                            <p class="ms-4 text-dark" style="font-weight: bold" id="eventClient"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3" style="border:1px solid #ccc;">
                            <span class="ms-4 mt-2 mb-2 text-secondary" style="font-weight: bold">Tanggal</span>
                            <p class="ms-4 text-dark" style="font-weight: bold" id="eventStartDate"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3" style="border:1px solid #ccc;">
                            <span class="ms-4 mt-2 mb-2 text-secondary" style="font-weight: bold">Waktu</span>
                            <p class="ms-4 text-dark" style="font-weight: bold" id="eventTimes"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Detail's -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail Event -->

</body>

</html>
</script>
