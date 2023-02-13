<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/loginchecker.php"); ?>
<?php include(APP_PATH . "/config/rolechecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>

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
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                        <div class="flex-grow-1">
                            <h1 class="h3 fw-bold mb-2">
                                <?= $page_title; ?>
                            </h1>
                            <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                                <?= $page_description; ?>
                            </h2>
                        </div>
                        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="/result/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="javascript:void(0)">Setup</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Academic Sessions
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <?php include APP_PATH. "/views/includes/message.php"; ?>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Academic sessions</h3>

                    </div>
                    <div class="block-content">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Title</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>

                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Start</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">End</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                <?php foreach ($academicSessions as $academicSession) : ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= $sn++; ?></th>
                                        <td class="fw-semibold fs-sm">
                                            <?= $academicSession['session_name'] ?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?php if ($academicSession['session_status'] === "active") : ?>
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Active</span>
                                            <?php else : ?>
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <?= date("M d, Y", strtotime($academicSession['start_date'])) ?>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <?= date("M d, Y", strtotime($academicSession['end_date'])) ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/result/admin/markactivesession/<?= $academicSession['session_id'] ?>" title="Mark as active session" type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit Client">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="/result/admin/editsession/<?= $academicSession['session_id'] ?>" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit session">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <a href="/result/admin/deletesession/<?= $academicSession['session_id'] ?>" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Remove session">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
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