@include('layouts.admin.head-main')

<head>
    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    @include('layouts.admin.title-meta')
    @include('layouts.admin.head-css')
</head>
@include('layouts.admin.body')
@include('sweetalert::alert')
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.admin.menu')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Semua Pengguna</h4>

                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-end mb-4">
                    <a href="/admin/all-user/create "
                        class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                            class="fas fa-plus-circle label-icon"></i> Pengguna</a>
                </div>
                <!-- end page title -->
                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap"
                        style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th style="width: 80px; min-width: 80px;"><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        <div>
                                            <!-- Tombol "Ubah Data" -->
                                            <a class="btn btn-link text-warning" href="/admin/kelola-data/update/{{ $item->id }}" title="Ubah Data">
                                                <i class="mdi mdi-pencil-outline font-size-16 align-middle"></i>
                                            </a>
                                        
                                            <!-- Tombol "Hapus Data" -->
                                            <a class="btn btn-link text-danger" href="/admin/kelola-data/delete/{{ $item->id }}" data-confirm-delete="true" title="Hapus Data">
                                                <i class="mdi mdi-trash-can-outline font-size-16 align-middle text-danger"></i>
                                            </a>
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
        @include('layouts.admin.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- JAVASCRIPT -->
@include('layouts.admin.vendor-scripts')
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
    function copyLink(button) {
        var input = button.previousElementSibling;
        var link = input.value;
        var tempInput = document.createElement("input");
        tempInput.value = link;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        Swal.fire({
            title: 'Berhasil!',
            text: 'Link berhasil disalin.',
            icon: 'success'
        });
    }
</script>

</body>

</html>
