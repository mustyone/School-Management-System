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
                                    <a class="link-fx" href="javascript:void(0)">Report</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Upload Report
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
                        <h3 class="block-title">Upload Subject Report</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/uploadreport" method="POST">
                            <div class="row push">
                                <div class="form-group col-2" id="">
                                    <select class="form-control" name="class_id" id="class_id">
                                        <?php foreach ($classes as $class) : ?>
                                            <option value="<?php echo $class['class_id'] ?>"><?php echo $class['class_alternative_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <select name="subject_id" class="form-control">
                                        <option value="">Choose a subject</option>

                                        <?php foreach ($sectionSubjects as $section_name => $subjects) : ?>
                                            <optgroup label="<?php echo $section_name; ?>">
                                                <?php foreach ($subjects as $subject) : ?>
                                                    <option value="<?php echo $subject['subject_id']; ?>"><?php echo $subject['subject_name'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>


                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control" name="session_id">
                                        <?php foreach ($sessions as $session) : ?>
                                            <option <?php if ($session['session_status'] == "active") echo "selected"  ?> value="<?php echo $session['session_id'] ?>"><?php echo $session['session_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>

                                <div class="form-group col-3">
                                    <select class="form-control" name="term_id">
                                        <option></option>
                                        <option value="1">First</option>
                                        <option value="2">Second</option>
                                        <option value="3">Third</option>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <button type="submit" class="btn btn-primary" name="proceed">Proceed</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <?php if (isset($_SESSION['data'])) : ?>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Upload Report</h3>

                        </div>
                        <div class="block-content block-content-full p-0">
                            <form action="/result/admin/saveresult" method="POST">
                                <input type="hidden" name="redirect_to"  value="admin">
                                <input type="hidden" name="session_id" value="<?php echo $_SESSION['data']['session_id'] ?>">
                                <input type="hidden" name="term_id" value="<?php echo $_SESSION['data']['term_id'] ?>">
                                <input type="hidden" name="class_id" value="<?php echo $_SESSION['data']['class_id'] ?>">
                                <input type="hidden" name="subject_id" value="<?php echo $_SESSION['data']['subject_id'] ?>">
                                <div class="table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>Adm. Number</th>
                                                <th>Student</th>
                                                <?php foreach ($_SESSION['data']['tests_category'] as $test) : ?>
                                                    <th>
                                                        <?php
                                                            echo "{$test['test_name']} <br /> ({$test['test_score']})";
                                                        ?>
                                                    </th>
                                                <?php endforeach; ?>
                                                <th>Total</th>
                                                <th>Grade</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn = 1; ?>
                                            <?php foreach ($_SESSION['data']['students'] as $student) : ?>
                                                <input type="hidden" name="student_ids[]" value="<?php echo $student['reg_student_id'] ?>">
                                                <tr>
                                                    <td><?php echo $student['reg_student_id'] ?></td>
                                                    <td><?php echo ucwords($student['student_first_name'] . " " . $student['student_last_name']); ?></td>
                                                    <?php foreach ($_SESSION['data']['tests_category'] as $test) : ?>
                                                        <?php $tabindex = 1; ?>
                                                        <td>
                                                            <input type="hidden" name="<?php echo $student['reg_student_id'] ?>[]" data-test-id="<?php echo $test['test_id'] ?>">
                                                            <input value="0" name="" data-id="<?php echo $sn; ?>" max="<?php echo $test['test_score'] ?>" class="score_input test_score" type="number" tabindex="<?php echo $tabindex++; ?>">
                                                        </td>
                                                    <?php endforeach; ?>
                                                    <td>
                                                        <input readonly  data-id="<?php echo $sn; ?>" class="score_input total_score" type="number" value="0" name="total[<?php echo $student['reg_student_id'] ?>]" id="">
                                                    </td>
                                                    <td>
                                                        <input readonly  data-id="<?php echo $sn; ?>" value="NG" class="score_input grade" type="text" name="grade[<?php echo $student['reg_student_id'] ?>]" id="">
                                                    </td>
                                                    <td>
                                                        <input readonly  data-id="<?php echo $sn; ?>" value="FAIL" class="score_input remark" type="text" name="remark[<?php echo $student['reg_student_id'] ?>]" id="">
                                                    </td>
                                                </tr>
                                                <?php $sn++; ?>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="form-group my-4">
                                    <button name="submit" type="submit" class="btn btn-flat btn-primary w-100">Submit</button>
                                </div>
                                

                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <?php include "footer.php"; ?>
    </div>
    <!-- END Page Container -->

    <?php include APP_PATH . "/views/includes/scripts.php"; ?>

    <?php unset($_SESSION['data']); ?>

    <style>
        .score_input {
            width: 60px;
            text-align: center;
        }

        .remark {
            width: 100px;
            text-align: center;
        }


        table {
            border-collapse: collapse;
            width: 100%;
        }

        table thead {
            background-color: #333333;
        }

        table thead tr th {
            color: white !important;
            text-align: center;
        }

        table tbody tr {
            border-bottom: 1px solid black;
        }

        table tbody tr td {
            width: 50px;
            padding: 10px;
        }
    </style>
</body>

</html>