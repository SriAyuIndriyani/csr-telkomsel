@include('layouts.viewer.head-main')

<head>

    <style>
        #profile-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #3498db;
            color: white;
            font-size: 36px;
            font-weight: bold;
        }
    </style>

    @include('layouts.viewer.title-meta')
    @include('layouts.viewer.head-css')

</head>

@include('layouts.viewer.body')
@include('sweetalert::alert')

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.viewer.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Profil Saya</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xxl me-3">
                                                    <div id="profile-icon" class="img-fluid rounded-circle">
                                                        {{ substr($user->name, 0, 1) }}</div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                                                    <p class="text-muted font-size-13">Viewer</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#detail"
                                            role="tab">Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#profil" role="tab">Ubah
                                            Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#password"
                                            role="tab">Ubah Password</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="detail" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Detail Profil</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <label class="form-label">Nama Lengkap:</label>
                                            <p>{{ Auth::user()->name }}</p>
                                            <label class="form-label">Username:</label>
                                            <p>{{ Auth::user()->username }}</p>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="profil" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Ubah Data Profil</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <form action="/viewer/profile/updateProfile" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" name="name" type="text"
                                                        value="{{ Auth::user()->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input class="form-control" name="username" type="text"
                                                        value="{{ Auth::user()->username }}" required>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary waves-effect btn-label waves-light"><i
                                                            class="bx bx-save label-icon"></i> Ubah Profil</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="password" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Ubah Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <form action="/viewer/profile/updatePassword" method="POST"
                                                onsubmit="return validatePassword()">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-label">Masukkan Password Baru</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" name="password"
                                                            id="new-password" placeholder="Masukkan password baru"
                                                            aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light ms-0" type="button"
                                                            onclick="togglePasswordVisibility('new-password')"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-label">Masukkan Ulang Password
                                                                Baru</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control"
                                                            id="confirm-password"
                                                            placeholder="Masukkan ulang password baru"
                                                            aria-label="Password" aria-describedby="password-addon2">
                                                        <button class="btn btn-light ms-0" type="button"
                                                            onclick="togglePasswordVisibility('confirm-password')"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary waves-effect btn-label waves-light"><i
                                                            class="bx bx-save label-icon"></i> Ubah Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

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

<script src="/assets/js/pages/pass-addon.init.js"></script>

<script src="/assets/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function togglePasswordVisibility(inputId) {
        var input = document.getElementById(inputId);
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    function validatePassword() {
        var newPassword = document.getElementById('new-password').value;
        var confirmPassword = document.getElementById('confirm-password').value;

        if (newPassword !== confirmPassword) {
            Swal.fire({
                title: 'Gagal!',
                text: 'Password Baru Dan Konformasi Password Yang Dimasukkan Tidak sama.',
                icon: 'error'
            });
            return false;
        }

        return true;
    }

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
