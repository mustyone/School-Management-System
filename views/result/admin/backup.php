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
                                    <a class="link-fx" href="#">Database</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Backup database
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
                        <h3 class="block-title">Backup database</h3>
                    </div>
                    
                    <div class="block-content block-content-full">
                        <form action="/result/admin/backupdatabase" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="alert alert-info text-center">
                                        <h4>
                                            Backup the current database
                                        </h4>
                                        <p class="">This process might take a while depending on the database size, wait for the process to finish. </p>
                                        <span class="text-danger">Do not refresh the page or press the back button</span>
                                    </div>

                                    <div class="mb-4">
                                        <input type="text" required name="tag" class="form-control" placeholder="Backup Tag. Example: Database 2022/2023 First Term">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-warning">Start Backup</button>
                                    </div>

                                </div>
                        </form>
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