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
                            <h4 class="page-title mb-0 font-size-18">Tambah Pengguna</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/admin/all-user">Semua Pengguna</a></li>
                                    <li class="breadcrumb-item active">Tambah Pengguna</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card">
                    <div class="card-body mt-2">
                        <form class="row g-3" action="/admin/all-user/createData" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="inputNanme4" name="name">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Username</label>
                                <input type="text" class="form-control" id="inputEmail4" name="username">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Kata Sandi</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control" id="password" name="password"
                                        aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i
                                            class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                                        class="bx bx-check label-icon"></i> Buat Pengguna</button>
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
