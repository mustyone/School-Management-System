<?php include( APP_PATH. "/config/session.php");?>
<?php include( APP_PATH. "/config/loginchecker.php");?>
<?php include( APP_PATH. "/config/rolechecker.php");?>
<?php include( APP_PATH. "/config/pageconfig.php");?>


<!doctype html>
<html lang="en">
  <head>
        <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

      <?php include "sidebar.php"; ?>

      <?php include "header.php"; ?>

      <!-- Main Container -->
      <main id="main-container">
        <!-- Hero -->
        <div class="content">
          <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
              <h1 class="h3 fw-bold mb-2">
                Dashboard
              </h1>
              <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                Welcome 
                <a class="fw-semibold" href="#">
                  <?= ucwords($_SESSION['fullname']); ?>
                </a>
              </h2>
            </div>
            <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
              
              <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary space-x-1" id="dropdown-analytics-overview" 
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>Quick Actions</span>
                  <i class="fa fa-fw fa-angle-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview">
                  <a class="dropdown-item fw-medium" href="javascript:void(0)">New Student</a>
                  <a class="dropdown-item fw-medium" href="javascript:void(0)">Register student for session</a>
                  <a class="dropdown-item fw-medium" href="javascript:void(0)"></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item fw-medium" href="javascript:void(0)">Upload report sheet</a>
                  <a class="dropdown-item fw-medium" href="javascript:void(0)">View report sheets</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
          <!-- Overview -->
          <div class="row items-push">
            <div class="col-sm-6 col-xxl-3">
              <!-- Pending Orders -->
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold"><?= number_format($activeStudents); ?></dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Active Students</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="fa fa-user fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" 
                  href="/result/admin/studentsrecord">
                    <span>View all students</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-xxl-3">
              <!-- New Customers -->
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold"><?= number_format($activeTeachers); ?></dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Active Teachers</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="fa fa-user-tie fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" 
                  href="/result/admin/teacherrecords">
                    <span>View all teachers</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
              <!-- END New Customers -->
            </div>

            <div class="col-sm-6 col-xxl-3">
              <!-- Messages -->
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold"><?= number_format($activeClasses) ?></dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Classes</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="fa fa-building fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" 
                  href="/result/admin/classes">
                    <span>View all classes</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
              <!-- END Messages -->
            </div>
            <div class="col-sm-6 col-xxl-3">
              <!-- Conversion Rate -->
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold"><?= number_format($activeSubjects); ?></dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Subjects</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="fa fa-book fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" 
                  href="result/admin/subjects">
                    <span>View all subjects</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- END Overview -->

        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <?php include "footer.php"; ?>
    </div>
    <!-- END Page Container -->

    <?php include APP_PATH . "/views/includes/scripts.php"; ?>

    <!-- Page JS Plugins -->
    <script src="<?= BASE_URL ?>/assets/js/plugins/chart.js/chart.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= BASE_URL ?>/assets/js/pages/be_pages_dashboard.min.js"></script>
  </body>
</html>

