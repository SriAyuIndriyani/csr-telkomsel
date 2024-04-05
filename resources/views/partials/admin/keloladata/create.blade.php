@include('layouts.admin.head-main')

<head>
    @include('layouts.admin.title-meta')
    @include('layouts.admin.head-css')
</head>
@include('layouts.admin.body')
<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.admin.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @include('sweetalert::alert')

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Tambah Data Laptop</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/admin/all-user">Kelola Data Laptop</a></li>
                                    <li class="breadcrumb-item active">Tambah Data Laptop</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card">
                    <div class="card-body mt-2">
                        <form class="row g-3" action="/admin/kelola-data/createData" method="POST">
                            @csrf
                            <label for="" class="form-label">Data Diri</label>
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="inputNanme4" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputNanme4" name="nama">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="lokasi">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="jabatan">
                                    </div>
                                </div>
                            </div>
                            <label for="" class="form-label">Data Laptop</label>
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="inputNanme4" class="form-label">Type</label>
                                        <input type="text" class="form-control" id="inputNanme4" name="type">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail4" class="form-label">Hostname</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="hostname">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail4" class="form-label">SSD</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="ssd">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail4" class="form-label">Winver</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="winver">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="inputNanme4" class="form-label">Processor</label>
                                        <input type="text" class="form-control" id="inputNanme4" name="processor">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Antivirus</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="antivirus">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ramSelect" class="form-label">RAM</label>
                                        <select class="form-select" id="ramSelect" name="ram">
                                            <option value="4 GB">4 GB</option>
                                            <option value="8 GB">8 GB</option>
                                            <option value="16 GB">16 GB</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                                        class="bx bx-check label-icon"></i>Tambah Data Laptop</button>
                                <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
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

<script src="/assets/js/pages/pass-addon.init.js"></script>

</body>

</html>
