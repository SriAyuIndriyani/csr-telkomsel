<style>
    #profile-icon2 {
        display: inherit;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 80%;
        background-color: #3498db;
        color: white;
        font-size: 20px;
        font-weight: bold;
    }
</style>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/images/logo.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo.png" alt="" height="24"> <span
                            class="logo-txt text-danger">CSR Telkomsel</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (auth()->check())
                        <span id="profile-icon2">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    @endif
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">
                        @if (auth()->check())
                            {{ auth()->user()->name }}
                        @endif
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="/admin/profile"><i
                            class="fas fa-user font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="/log-out"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1 text-danger"></i> Keluar</a>
                </div>
            </div>

        </div>
    </div>
</header>
