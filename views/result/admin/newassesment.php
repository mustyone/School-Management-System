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
                                    <a class="link-fx" href="#">Setup</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="/result/admin/allassesments">Assesments</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    New Assement
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
                        <h3 class="block-title">New Assesment</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/newassesment" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">
                                                    Assesment Name
                                                </label>

                                                <input required type="text" name="test_name" placeholder="Example: First CA" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">
                                                    Section
                                                </label>

                                                <select class="form-control" name="section_id" id="section" required>
                                                    <option></option>
                                                    <?php foreach ($sections as $section) : ?>
                                                        <option value="<?= $section['section_id']; ?>"> <?= $section['section_shot_code']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <input type="hidden" class="form-control" id="sectionID" name="subject_section_id">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Session
                                                </label>
                                                <select class="form-control" name="session_id" id="section" required>
                                                    <option></option>
                                                    <?php foreach ($academicSessions as $session) : ?>
                                                        <option <?= $session['session_id'] === ACTIVE_SESSION_ID ? 'selected' : '' ?> value="<?= $session['session_id']; ?>"> <?= $session['session_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">Term</label>
                                                <select class="form-control" name="term_id" id="section" required>
                                                    <option value=""></option>
                                                    <option <?= ACTIVE_TERM_INDEX == "1" ? 'selected' : '' ?> value="1">First</option>
                                                    <option <?= ACTIVE_TERM_INDEX == "2" ? 'selected' : '' ?> value="2">Second</option>
                                                    <option <?= ACTIVE_TERM_INDEX == "3" ? 'selected' : '' ?> value="3">Third</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Max Score
                                                </label>

                                                <input required type="number" name="test_score" min="1" class="form-control">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Display order
                                                </label>

                                                <input required type="number" min="1" name="test_order" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
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