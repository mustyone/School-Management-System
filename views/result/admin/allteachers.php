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
                                    <a class="link-fx" href="javascript:void(0)">Teachers</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Teachers Record
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <?php include APP_PATH . "/views/includes/message.php"; ?>

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Teachers Record</h3>

                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-hover table-vcenter datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="table-primary">Name</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                <?php foreach ($teachers as $teacher) : ?>
                                    <tr>
                                        <td class="fw-semibold fs-sm">
                                            <?= $teacher['teacher_username'] ?>
                                        </td>
                                        <td class="fw-semibold fs-sm table-primary">
                                            <?= ucwords("{$teacher['teacher_title']} {$teacher['teacher_fullname']}"); ?>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <?= $teacher['teacher_login_status'] ?>
                                        </td>


                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/result/admin/editteacher/<?= $teacher['teacher_id'] ?>" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Edit Teacher record">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <a href="/result/admin/deleteteacher/<?= $teacher['teacher_id'] ?>" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Remove record">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </a>

                                                <?php if($teacher['teacher_login_status'] === "active"): ?>
                                                <a href="/result/admin/blockteacher/<?= $teacher['teacher_id'] ?>" class="btn btn-sm btn-alt-warning js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Block">
                                                    <i class="fa fa-cancel"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php if($teacher['teacher_login_status'] !== "active"): ?>
                                                <a href="/result/admin/unblockteacher/<?= $teacher['teacher_id'] ?>" class="btn btn-sm btn-alt-success js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Unblock">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <?php endif; ?>
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