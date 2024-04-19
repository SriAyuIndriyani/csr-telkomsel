@include('layouts.admin.head-main')

<head>
    <link href="/assets/css/main.css" rel="stylesheet" type="text/css" />
    @include('layouts.admin.title-meta')
    @include('layouts.admin.head-css')
</head>
@include('layouts.admin.body')
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.admin.menu')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                {{-- HEADER CONTENT --}}
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Dashboard</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                {{-- CONTENT --}}
                <div class="row">
                    <h1>Ini Halaman Dasboard</h1>
                </div>
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

</body>

</html>
