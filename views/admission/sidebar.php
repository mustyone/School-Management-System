<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="/result/admin/dashboard">
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
                    <a class="nav-main-link" href="/modules">
                        <i class="nav-main-link-icon si si-arrow-left"></i>
                        <span class="nav-main-link-name">Modules</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="/admission/dashboard">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>

                <li class="nav-main-heading">Admission</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-graduate"></i>
                        <span class="nav-main-link-name">Batches</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/resul/admi/newstuden">
                                <span class="nav-main-link-name">New Batch</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/resul/admi/newbulkstuden">
                                <span class="nav-main-link-name">View Batches</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li></li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-tie"></i>
                        <span class="nav-main-link-name">Applications</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newteacher">
                                <span class="nav-main-link-name">View Application</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/teachers">
                                <span class="nav-main-link-name">New Application</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-tie"></i>
                        <span class="nav-main-link-name">Admissions</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newteacher">
                                <span class="nav-main-link-name">Single</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/teachers">
                                <span class="nav-main-link-name">Bulk</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-tie"></i>
                        <span class="nav-main-link-name">Pin Management</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newteacher">
                                <span class="nav-main-link-name">Generate PINs</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/teachers">
                                <span class="nav-main-link-name">PIN Logs</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading">Settings</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-database"></i>
                        <span class="nav-main-link-name">Database</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newbackup">
                                <span class="nav-main-link-name">New backup</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/backuprecords">
                                <span class="nav-main-link-name">Backup records</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/restorebackup">
                                <span class="nav-main-link-name">Restore Backup</span>
                            </a>
                        </li>


                    </ul>
                </li>
            
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-desktop"></i>
                        <span class="nav-main-link-name">App Settings</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/upgradeapp">
                                <span class="nav-main-link-name">Upgrade App</span>
                            </a>
                        </li>
                    </ul>
                </li>
            
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->