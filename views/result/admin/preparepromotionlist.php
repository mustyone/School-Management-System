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
                                <li class="breadcrumb-item" aria-current="page">
                                    Prepare promotion list
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
                        <h3 class="block-title">Promote students</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/showpromotionlist" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row mb-4">
                                            <div class="col-md">
                                                <label>From</label>
                                                <select required class="form-control" name="from_class_id">

                                                    <option>Choose the class</option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id']; ?>"> <?= $class['class_alternative_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                <label>To</label>
                                                <select required class="form-control" name="to_class_id">
                                                    <option>Choose the class</option>
                                                    <?php foreach ($classes as $class) : ?>
                                                        <option value="<?= $class['class_id']; ?>"> <?= $class['class_alternative_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                <label>From</label>
                                                <select required class="form-control" name="from_session_id" required>
                                                    <option>Choose the academic session</option>
                                                    <?php foreach ($sessions as $session) : ?>
                                                        <option <?= ACTIVE_SESSION_ID == $session['session_id'] ? 'selected' : '' ?> value="<?= $session['session_id']; ?>"> <?= $session['session_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label>To</label>
                                                <select required class="form-control" name="to_session_id" required>
                                                    <option>Choose the academic session</option>
                                                    <?php foreach ($sessions as $session) : ?>
                                                        <option <?= ACTIVE_SESSION_ID == $session['session_id'] ? 'selected' : '' ?> value="<?= $session['session_id']; ?>"> <?= $session['session_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col">
                                                <button type="submit" class="btn btn-dark">Show</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($_SESSION['data'])) : ?>
                    <form action="/result/admin/savepromotionlist" method="POST">
                        <input type="hidden" name="from_session_id" value="<?= $_SESSION['data']['from_session_id'] ?>">
                        <input type="hidden" name="to_session_id" value="<?= $_SESSION['data']['to_session_id'] ?>">
                        <input type="hidden" name="from_class_id" value="<?= $_SESSION['data']['from_class_id'] ?>">
                        <input type="hidden" name="to_class_id" value="<?= $_SESSION['data']['to_class_id'] ?>">

                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Students Record</h3>
                                <div class="block-options">
                                    <div class="block-options-item">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <!-- If you put a checkbox in thead section, it will automatically toggle all tbody section checkboxes -->
                                <table class="js-table-checkable table table-sm table-hover table-vcenter js-table-checkable-enabled">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Session Avg. </th>
                                            <th>CutOff</th>
                                            <th>Recommendation</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1; ?>
                                        <?php foreach ($_SESSION['data']['studentsRecord'] as $student) : ?>
                                            <tr>
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
                                                    <?= $avgSession = getAverageForSession(
                                                        $student['student_id'],
                                                        $_SESSION['data']['from_session_id'],
                                                        $student['class_id']
                                                        );
                                                    ?>

                                                </td>
                                                <td><?= $student['passing_average']; ?></td>
                                                <td>
                                                    <?php if($avgSession < $student['passing_average']): ?>
                                                        <?php $recommendation = "repeat"; ?>
                                                        <span>Repeat</span>
                                                    <?php endif; ?>

                                                    <?php if($avgSession >= $student['passing_average']): ?>
                                                        <?php $recommendation = "promote"; ?>
                                                        <span>Promote</span>

                                                    <?php endif; ?>
                                                    
                                                </td>
                                                <td>
                                                    <select class="form-control" name="promotion_statuses[]">
                                                        <option></option>
                                                        <option value="promoted" <?= $recommendation === "promote" ? 'selected' : '' ?> >Promoted</option>
                                                        <option value="repeat" <?= $recommendation === "repeat" ? 'selected' : '' ?>>Repeat</option>
                                                        <option value="demoted">Demoted</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <input type="hidden" name="student_ids[]" value="<?= $student['student_id']; ?>" />
                                            <input type="hidden" name="session_averages[]" value="<?= $avgSession ?>" />
                                            <input type="hidden" name="passing_averages[]" value="<?= $student['passing_average']; ?>" />

                                        <?php endforeach; ?>

                                        <?php unset($_SESSION['data']); ?>
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