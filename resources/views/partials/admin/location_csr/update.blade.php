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
                            <h4 class="page-title mb-0 font-size-18">Ubah Pengguna</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/admin/all-user">Semua Pengguna</a></li>
                                    <li class="breadcrumb-item active">Ubah Pengguna</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card">
                    <div class="card-body mt-2">
                        <form class="row g-3" action="/admin/location-csr/updateData/{{ $location_csr->id }}"
                            method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="inputNanme4" name="lokasi"
                                    value="{{ $location_csr->lokasi }}">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Warna</label>
                                <input type="color" class="form-control" id="inputEmail4" name="warna"
                                    value="{{ $location_csr->warna }}">
                            </div>
                            <div class="text-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                                        class="bx bx-check label-icon"></i> Perbarui</button>
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
