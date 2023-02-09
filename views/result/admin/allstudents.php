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
                                    Students Record
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
                        <form action="/result/admin/filterstudents" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" name="student_id" class="form-control" placeholder="Admission Number of student">
                                            </div>
                                            <div class="col-md">
                                                <select class="form-control" name="student_class_id">
                                                    <option value="">Choose the class</option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id']; ?>"> <?= $class['class_alternative_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <select class="form-control" name="student_status">
                                                    <option value="">Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="left">Exited</option>
                                                    <option value="graduated">Graduated</option>
                                                </select>
                                            </div>
                                            <div class="col-md justify-content-end">
                                                <button type="submit" class="btn btn-dark">Filter</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if(isset($_SESSION['students'])): ?>
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Students Record</h3>

                    </div>
                    <div class="block-content">
                        <table class="table table-sm table-hover table-vcenter datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>ID</th>
                                    <th class="table-primary">Name</th>
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                <?php foreach ($_SESSION['students'] as $student) : ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= $sn++; ?></th>
                                        <td class="fw-semibold fs-sm">
                                            <?= $student['student_id'] ?>
                                        </td>
                                        <td class="fw-semibold fs-sm table-primary">
                                            <?= ucwords("{$student['student_first_name']} {$student['student_middle_name']} {$student['student_last_name']}"); ?>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <?= $student['class_alternative_name'] ?>
                                        </td>
                                        <td class="fw-semibold fs-sm">
                                            <?= $student['gender'] ?>
                                        </td>
                                        <td class="">
                                            <?= $student['date_of_birth']; ?>
                                        </td>

                                        <td class="">
                                            <?= $student['student_status']; ?>
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/result/admin/editstudent/<?= $student['student_id'] ?>" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Edit student record">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <a href="/result/admin/deletestudent/<?= $student['student_id'] ?>" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Remove record">
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

                <?php endif; ?>

                <?php unset($_SESSION['students']); ?>
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