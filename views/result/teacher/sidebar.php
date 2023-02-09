<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="/result/teacher/dashboard">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">
                <?= APP_NAME; ?><sup class="fw-normal">v<?= APP_VERSION; ?></sup>
            </span>
            <span class="smini-hide fs-5 tracking-wider">
                <?= ACTIVE_SESSION_NAME ?>
                <small>
                    <?= ACTIVE_TERM; ?>
                </small>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                    data-action="dark_mode_toggle">
                <i class="far fa-moon"></i>
            </button>
            <!-- END Dark Mode -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
               href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="/result/teacher/dashboard">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="/result/teacher/uploadreport">
                        <i class="nav-main-link-icon fa fa-upload"></i>
                        <span class="nav-main-link-name">Report Entry</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="/result/teacher/updatereport">
                        <i class="nav-main-link-icon fa fa-save"></i>
                        <span class="nav-main-link-name">Update Report Entry</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->