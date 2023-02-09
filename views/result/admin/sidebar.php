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
                    <a class="nav-main-link" href="/result/admin/dashboard">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link  active nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">Setup</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="/result/admin/schoolinfo">
                                <i class="nav-main-link-icon fa fa-building"></i>
                                <span class="nav-main-link-name">School Information</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" 
                            data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-calendar"></i>
                                <span class="nav-main-link-name">Academic Sessions</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/newsession">
                                        <span class="nav-main-link-name">New Session</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/academicsessions">
                                        <span class="nav-main-link-name">View Sessions</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-code-branch"></i>
                                <span class="nav-main-link-name">School Sections</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/newsection">
                                        <span class="nav-main-link-name">New Section</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/allsections">
                                        <span class="nav-main-link-name">All sections</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-building"></i>
                                <span class="nav-main-link-name">Classes</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/newclass">
                                        <span class="nav-main-link-name">New Class</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/allclasses">
                                        <span class="nav-main-link-name">All Classes</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-book-open "></i>
                                <span class="nav-main-link-name">Subjects</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/newsubject">
                                        <span class="nav-main-link-name">New Subject</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/allsubjects">
                                        <span class="nav-main-link-name">All Subjects</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                       
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-badge"></i>
                                <span class="nav-main-link-name">Continous Assesments</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/newassesment">
                                        <span class="nav-main-link-name">New Assesment</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/result/admin/allassesments">
                                        <span class="nav-main-link-name">Assesment Record</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/grading">
                                <i class="nav-main-link-icon fa fa-percent"></i>
                                <span class="nav-main-link-name">Grading System</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/comments">
                                <i class="nav-main-link-icon fa fa-comment"></i>
                                <span class="nav-main-link-name">Comments</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-heading">Users</li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-graduate"></i>
                        <span class="nav-main-link-name">Students</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newstudent">
                                <span class="nav-main-link-name">New Student</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newbulkstudent">
                                <span class="nav-main-link-name">Add Bulk Student</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/registerstudent">
                                <span class="nav-main-link-name">Register student for session</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/students">
                                <span class="nav-main-link-name">Students Record</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li></li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-tie"></i>
                        <span class="nav-main-link-name">Teachers</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/newteacher">
                                <span class="nav-main-link-name">Add new teacher</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/teachers">
                                <span class="nav-main-link-name">All Teachers</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/assignsubjects">
                                <span class="nav-main-link-name">Subject Designation</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/assignclassteacher">
                                <span class="nav-main-link-name">Class Designation</span>
                            </a>
                        </li>
                       

                    </ul>
                </li>



                <li class="nav-main-heading">Reports</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-rectangle-list"></i>
                        <span class="nav-main-link-name">Student Report Sheet</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/uploadreport">
                                <span class="nav-main-link-name">Upload report</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/updatereport">
                                <span class="nav-main-link-name">Update report</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/recordingsheet">
                                <span class="nav-main-link-name">Print Recording Sheet</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/studentreport">
                                <span class="nav-main-link-name">Student Report</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-table-list"></i>
                        <span class="nav-main-link-name">Broadsheets</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/subjectbroadsheet">
                                <span class="nav-main-link-name">Subject broadsheet</span>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-diagram-next"></i>
                        <span class="nav-main-link-name">Promotion</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/preparepromotionlist">
                                <span class="nav-main-link-name">Prepare list</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/result/admin/promotionlist">
                                <span class="nav-main-link-name">View promotion list</span>
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