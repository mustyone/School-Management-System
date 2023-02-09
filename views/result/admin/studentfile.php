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
                                    <a class="link-fx" href="javascript:void(0)">Students</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Student File
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
                        <h3 class="block-title">Filter Record</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/showstudentfile" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" name="student_id" class="form-control" placeholder="Admission Number of student">
                                            </div>

                                            <div class="col-md justify-content-end">
                                                <button type="submit" class="btn btn-dark">Proceed</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (isset($_SESSION['studentFile'])) : ?>
                    <?php $results = $_SESSION['studentFile']['results']; ?>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Students Record</h3>

                        </div>
                        <div class="block-content">
                            <?php foreach ($results as $session => $sessionArray) : ?>
                                <?php foreach ($sessionArray as $term => $results) : ?>
                                    <?php $studentInfo = $sessionArray['studentInfo']; ?>
                                        <p><?= $session; ?> <?= $term; ?> Results</p>

                                        <?php include APP_PATH. "/views/result/admin/result.php"; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>

                <?php unset($_SESSION['studentFile']); ?>
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