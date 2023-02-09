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
                                   Classes
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
                        <h3 class="block-title">Classes</h3>

                    </div>
                    <div class="block-content">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Section</th>
                                    <th>Name</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                <?php foreach ($classes as $class) : ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= $sn++; ?></th>
                                        <td class="fw-semibold fs-sm">
                                            <?= $class['section_name'] ?>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <?= $class['class_alternative_name'] ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/result/admin/editclass/<?= $class['class_id'] ?>" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Edit class record">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <a href="/result/admin/deleteclass/<?= $class['class_id'] ?>" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Remove record">
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
