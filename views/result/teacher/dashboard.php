<?php include( APP_PATH. "/config/session.php"); ?>
<?php include( APP_PATH. "/config/loginchecker.php"); ?>
<?php include( APP_PATH. "/config/rolechecker.php"); ?>
<?php include( APP_PATH. "/config/pageconfig.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
</head>
<body>
<!-- Page Container -->

<div id="page-container" class="sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
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
                            <span>Menu</span>
                            <i class="fa fa-fw fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview">
                            <a class="dropdown-item fw-medium" href="/result/teacher/dashboard">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item fw-medium" href="/result/teacher/uploadreport">Upload Entry</a>
                            <a class="dropdown-item fw-medium" href="/result/teacher/viewreport">View Entry</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->
            <?php if(count($assignedSubjects) > 0): ?>
                <div class="row items-push">
                    <?php foreach ($assignedSubjects as $designation): ?>
                        <?php $uploadStatus = uploadedResult($designation['subject_id'], $designation['session_id'], $designation['term_id']); ?>
                        <div class="col-sm-3">
                            <!-- Pending Orders -->
                            <div class="block block-rounded d-flex flex-column h-100 mb-0">
                                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                    <dl class="mb-0">
                                        <dt class="fs-3 fw-bold"><?= $designation['subject_name']; ?></dt>
                                        <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0"><?= $designation['class_alternative_name']; ?></dd>
                                    </dl>
                                    <div class="item item-rounded-lg bg-body-dark">
                                        <?php if($uploadStatus): ?>
                                            <i class="fa fa-check fs-3 text-primary"></i>
                                        <?php else: ?>
                                            <i class="fa fa-exclamation-circle fs-3 text-warning"></i>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="bg-body-light rounded-bottom">
                                    <?php if(!$uploadStatus): ?>
                                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                           href="/result/teacher/uploadreport/<?= $designation['subject_id'] ?>/<?= $designation['class_id']; ?>">
                                            <span>Upload entry</span>
                                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if($uploadStatus): ?>
                                        <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                           href="/result/teacher/updatereport/<?= $designation['subject_id'] ?>/<?= $designation['class_id']; ?>">
                                            <span>Update entry</span>
                                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- END Overview -->
            <?php endif; ?>
            <?php if(count($assignedSubjects) === 0): ?>
                <div class="alert alert-info">
                    <h3>No subject designation for this session and term</h3>

                    <p class="text-danger">If this is a mistake, see the examination officer</p>
                </div>
            <?php endif; ?>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <?php include "footer.php"; ?>

</div>
<!-- END Page Container -->

<?php include APP_PATH . "/views/includes/scripts.php"; ?>

</body>
</html>
