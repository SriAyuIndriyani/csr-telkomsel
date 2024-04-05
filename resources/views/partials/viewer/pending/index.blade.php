@include('layouts.user.head-main')

<head>

    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    @include('layouts.user.title-meta')
    @include('layouts.user.head-css')

</head>

@include('layouts.user.body')
@include("sweetalert::alert")

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.user.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Data Agenda Ditunda</span></h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Nama Agenda</th>
                                <th scope="col">Nama Klien</th>
                                <th scope="col">Tanggal</th>
                                <th style="width: 10px; min-width: 10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($encryptedPending as $item)
                            <tr>
                                <td>{{ $item->meeting_name }}</td>
                                <td>{{ $item->name_client ?: 'Butuh Verifikasi Klien' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->dates)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#verticalycentered{{ $item->id }}"><i class="mdi mdi-content-copy"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detail{{ $item->id }}"><i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="modal fade" id="verticalycentered{{ $item->id }}"
                                    tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Silahkan salin link dibawah ini:</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form untuk copy link -->
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" value="http://127.0.0.1:8000/verified-schedule-client/{{ $item->encrypted_id }}"
                                                    id="link-input-{{ $item->encrypted_id }}">
                                                    <button class="btn btn-primary" onclick="copyLink('link-input-{{ $item->encrypted_id }}')">
                                                    <i class="ri-file-copy-fill"></i> Salin</button>
                                                </div>
                                                <!-- End Form untuk copy link -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertically centered Modal-->
                            </td>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-size-16" id="composemodalTitle">Detail Agenda</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Agenda</label>
                                                    <input type="text" class="form-control" value="{{ $item->meeting_name }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Partisipan</label>
                                                    <input type="text" class="form-control" value="{{ $item->name_client ?: 'Butuh Verifikasi Klien' }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Klien</label>
                                                    <input type="text" class="form-control" value="{{ $item->email_client ?: 'Butuh Verifikasi Klien' }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal/Jam</label>
                                                    <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($item->dates)->translatedFormat('l, d F Y') }} || {{ \Carbon\Carbon::parse($item->times_start)->format('H.i') }} WIB s/d {{ \Carbon\Carbon::parse($item->times_end)->format('H.i') }} WIB" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi Agenda</label>
                                                    <textarea class="form-control" cols="30" rows="5" readonly>{{ $item->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
                <!-- end table responsive -->

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

<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- init js -->
<script src="/assets/js/pages/datatable-pages.init.js"></script>

<script src="/assets/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
<script>
    var detailButtons = document.querySelectorAll('.detail-btn');

    detailButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var modal = document.querySelector('#detail');
            var meetingNameInput = modal.querySelector('[name="meeting_name"]');
            var nameClientInput = modal.querySelector('[name="name_client"]');
            var emailClientInput = modal.querySelector('[name="email_client"]');
            var datesInput = modal.querySelector('[name="dates"]');
            var timesStartInput = modal.querySelector('[name="times_start"]');
            var timesEndInput = modal.querySelector('[name="times_end"]');
            var descriptionTextarea = modal.querySelector('[name="description"]');

            meetingNameInput.value = button.getAttribute('data-meeting-name');
            nameClientInput.value = button.getAttribute('data-name-client');
            emailClientInput.value = button.getAttribute('data-email-client');
            datesInput.value = button.getAttribute('data-dates');
            timesStartInput.value = button.getAttribute('data-times-start');
            timesEndInput.value = button.getAttribute('data-times-end');
            descriptionTextarea.value = button.getAttribute('data-description');
        });
    });

    function copyLink(inputId) {
        var input = document.getElementById(inputId);
        input.select();
        document.execCommand('copy');
        Swal.fire({
            title: 'Disalin!',
            text: 'Link berhasil di salin!.',
            icon: 'success'
        });
    }
</script>

</body>

</html>