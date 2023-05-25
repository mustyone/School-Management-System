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
                                    <a class="link-fx" href="/admission/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    New Batch
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
                        <h3 class="block-title">New Batch</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/newstudent" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Batch <span class="text-danger">*</span>
                                                </label>

                                                <input required type="text" class="form-control" name="student_admission_number">
                                            </div>
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Batch code 
                                                </label>

                                                <select name="house_id" class="form-control">
                                                    <option value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Batch Name <span class="text-danger">*</span>
                                                </label>
                                                <input required type="text" class="form-control" name="first_name" placeholder="John">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Session <span class="text-danger">*</span>
                                                </label>
                                                <select required name="class_id" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id'] ?>"><?= $class['class_alternative_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Term <span class="text-danger">*</span>
                                                </label>
                                                <select required name="class_id" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id'] ?>"><?= $class['class_alternative_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Status <span class="text-danger">*</span>
                                                </label>
                                                <select required name="class_id" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id'] ?>"><?= $class['class_alternative_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                                <input required type="date" class="form-control" name="date_of_birth">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                <input required type="date" class="form-control" name="date_of_birth">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Pin<span class="text-danger">*</span>
                                                </label>
                                                <input required type="text" class="form-control" name="first_name" placeholder="John">
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