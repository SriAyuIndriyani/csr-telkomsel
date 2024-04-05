@include('layouts.viewer.head-main')

<head>
    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    @include('layouts.viewer.title-meta')
    @include('layouts.viewer.head-css')
</head>
@include('layouts.viewer.body')
@include('sweetalert::alert')
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.viewer.menu')
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
                            <h4 class="page-title mb-0 font-size-18">Kelola Data Laptop</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Kelola Data Laptop</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap"
                        style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Type</th>
                                <th scope="col">Hostname</th>
                                <th scope="col">SSD</th>
                                <th scope="col">Windows Version</th>
                                <th scope="col">Processor</th>
                                <th scope="col">Antivirus</th>
                                <th scope="col">RAM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->hostname }}</td>
                                    <td>{{ $item->ssd }}</td>
                                    <td>{{ $item->winver }}</td>
                                    <td>{{ $item->processor }}</td>
                                    <td>{{ $item->antivirus }}</td>
                                    <td>{{ $item->ram }}</td>
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
        @include('layouts.viewer.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- JAVASCRIPT -->
@include('layouts.viewer.vendor-scripts')
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
