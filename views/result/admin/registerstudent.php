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
                                    Register
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
                        <h3 class="block-title">Students Termly Registration</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/showstudents" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <select required class="form-control" name="class_id">
                                                    <option>Choose the class</option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id']; ?>"> <?= $class['class_alternative_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                <select required class="form-control" name="session_id" required>
                                                    <option>Choose the academic session</option>
                                                    <?php foreach ($academicSessions as $session) : ?>
                                                        <option <?= ACTIVE_SESSION_ID == $session['session_id'] ? 'selected' : '' ?> value="<?= $session['session_id']; ?>"> <?= $session['session_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                <select required class="form-control" name="term_id" required>
                                                    <option>Choose the term</option>
                                                    <option <?= ACTIVE_TERM_INDEX == "1" ? 'selected' : '' ?> value="1">First</option>
                                                    <option <?= ACTIVE_TERM_INDEX == "2" ? 'selected' : '' ?> value="2">Second</option>
                                                    <option <?= ACTIVE_TERM_INDEX == "3" ? 'selected' : '' ?> value="3">Third</option>
                                                </select>
                                            </div>
                                            <div class="col-md justify-content-end">
                                                <button type="submit" class="btn btn-dark">Show</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($_SESSION['studentsRecord'])) : ?>
                    <form action="/result/admin/registerstudent" method="POST">
                        <input type="hidden" name="session_id" value="<?= $_SESSION['session_id'] ?>">
                        <input type="hidden" name="class_id" value="<?= $_SESSION['class_id'] ?>">
                        <input type="hidden" name="term_id" value="<?= $_SESSION['term_id'] ?>">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Students Record</h3>
                                <div class="block-options">
                                    <div class="block-options-item">
                                        <button type="submit" class="btn btn-primary">Register Selected Students</button>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <!-- If you put a checkbox in thead section, it will automatically toggle all tbody section checkboxes -->
                                <table class="js-table-checkable table table-sm table-hover table-vcenter js-table-checkable-enabled">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 70px;">
                                                <div class="form-check d-inline-block">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkAll" name="check-all">
                                                    <label class="form-check-label" for="check-all"></label>
                                                </div>
                                            </th>
                                            <th class="text-center">Admission Number</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th class="d-none d-sm-table-cell" style="width: 15%;"> Reg. Status</th>
                                            <th class="d-none d-sm-table-cell" style="width: 15%;"> Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1; ?>
                                        <?php foreach ($_SESSION['studentsRecord'] as $student) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php if (!$student['registered']) : ?>
                                                        <div class="form-check d-inline-block">
                                                            <input class="form-check-input" type="checkbox" value="<?= $student['student_id'] ?>" id="row_<?= $sn; ?>" name="student_ids[]">
                                                            <label class="form-check-label" for="row_<?= $id; ?>"></label>
                                                        </div>
                                                    <?php else : ?>
                                                        <a href="/result/admin/deleteregistration/<?= $student['reg_id'] ?>">
                                                            <i class="fa fa-times text-danger"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $student['student_id']; ?>
                                                </td>
                                                <td class="fs-sm">
                                                    <p class="fw-semibold mb-1">
                                                        <a href="/result/admin/student/<?= $student['student_id'] ?>">
                                                            <?= ucwords("{$student['student_first_name']} {$student['student_middle_name']} {$student['student_last_name']}"); ?>
                                                        </a>
                                                    </p>

                                                </td>
                                                <td>
                                                    <?= ucfirst($student['gender'] ?? "-"); ?>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <?php if ($student['registered']) : ?>
                                                        Registered
                                                    <?php endif; ?>

                                                    <?php if (!$student['registered']) : ?>
                                                        Not Registered
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $student['student_status']; ?>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>

                                        <?php unset($_SESSION['studentsRecord'], $_SESSION['session_id'], $_SESSION['class_id'], $_SESSION['term_id']); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <?php include "footer.php"; ?>
    </div>
    <!-- END Page Container -->

    <?php include APP_PATH . "/views/includes/scripts.php"; ?>
    <script>
        One.helpersOnLoad(['one-table-tools-checkable', 'one-table-tools-sections']);
    </script>

</body>

</html>