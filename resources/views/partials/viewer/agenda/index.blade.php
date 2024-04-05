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
@include('sweetalert::alert')

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
                            <h5 class="card-title">Agenda Saya</span></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <a href="/user/agenda/create"
                                    class="btn btn-sm btn-primary waves-effect btn-label waves-light"><i
                                        class="bx bx-plus label-icon"></i>Agenda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap"
                        style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Nama Agenda</th>
                                <th scope="col">Partisipan</th>
                                <th scope="col">Nama Klien</th>
                                <th scope="col">Email Klien</th>
                                <th scope="col">Waktu Mulai</th>
                                <th scope="col">Waktu Selesai</th>
                                <th scope="col">Jenis</th>
                                <th style="width: 10px; min-width: 10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agenda as $item)
                                <tr>
                                    <td>{{ $item->meeting_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->name_client ?: 'Butuh Verifikasi Klien' }}</td>
                                    <td>{{ $item->email_client ?: 'Butuh Verifikasi Klien' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->times_start)->format('H.i') }} WIB</td>
                                    <td>{{ \Carbon\Carbon::parse($item->times_end)->format('H.i') }} WIB</td>
                                    <td>
                                        @if ($item->status == 'Disetujui')
                                            <p class="badge badge-soft-primary font-size-11">Diterima</p>
                                        @elseif ($item->status == 'Ditunda')
                                            <p class="badge badge-soft-warning font-size-11">Ditunda</p>
                                        @else
                                            <p class="badge badge-soft-danger font-size-11">Ditolak</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item"
                                                        href="/user/agenda/update/{{ $item->id }}"><i
                                                            class="mdi mdi-pencil-outline font-size-16 align-middle me-1"></i>
                                                        Ubah</a></li>
                                                <li><a class="dropdown-item text-danger"
                                                        href="/user/agenda/delete/{{ $item->id }}"
                                                        data-confirm-delete="true"><i
                                                            class="mdi mdi-trash-can-outline font-size-16 align-middle me-1 text-danger"></i>
                                                        Hapus</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
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

</body>

</html>
