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
    <div id="page-container" class="sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

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
                                    <a class="link-fx" href="/result/teacher/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="javascript:void(0)">Report</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Update Entry
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
                <?php if (isset($_SESSION['data'])) : ?>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <a class="btn btn-dark" href="/result/teacher/dashboard">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <h3 class="block-title">Update Entry</h3>

                        </div>
                        <div class="block-content block-content-full p-0">
                            <table>
                                <tr>
                                    <td>Session</td>
                                    <td><?= $_SESSION['data']['session_name'] ?></td>
                                    <td>Term</td>
                                    <td><?= $_SESSION['data']['term_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td><?= $_SESSION['data']['subject_name'] ?></td>
                                    <td>Class</td>
                                    <td><?= $_SESSION['data']['class_name'] ?></td>
                                </tr>
                            </table>
                            <form action="/result/teacher/updateresult" method="POST">
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
                                        <?php foreach($_SESSION['data']['results'] as $student): ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $student['student_id'] ?></td>
                                                <input type="hidden" name="student_ids[]" value="<?php echo $student['student_id'] ?>">
                                                <input type="hidden" name="result_ids[]" value="<?php echo $student['result_id'] ?>">
                                                <td style="text-align: center"><?php echo ucwords($student['student_first_name'] . " " . $student['student_last_name']); ?></td>
                                                <?php
                                                    $student_id = $student['student_id'];
                                                    $arr =  json_decode($student['result_test'], true);
                                                    $testScores = [];
                                                    foreach($arr as $ar){
                                                        $exploded = explode(":",$ar);
                                                        $testScores[$student_id][] = [
                                                            $exploded[0] => $exploded[1]
                                                        ];
                                                    }
                                                ?>
                                                <?php foreach($_SESSION['data']['tests_category'] as $test): ?>
                                                    <?php
                                                        $score = searchTestScores($testScores[$student_id], $test['test_id']);
                                                        $tabindex = 1;
                                                    ?>
                                                <td style="text-align: center">
                                                    <input value="<?php echo $test['test_id'].":".$score ?>" type="hidden" name="<?php echo $student['student_id'] ?>[]" data-test-id="<?php echo $test['test_id'] ?>"  >
                                                    <input value="<?php echo $score; ?>" name="" data-id="<?php echo $sn; ?>" max="<?php echo $test['test_score'] ?>" class="score_input test_score" type="number" tabindex = "<?php echo $tabindex++ ?>">
                                                </td>
                                                <?php endforeach; ?>
                                                <td style="text-align: center">
                                                    <input readonly data-id="<?php echo $sn; ?>" class="score_input total_score" type="number" value="<?php echo $student['result_total_score'] ?>" name="total[<?php echo $student['student_id'] ?>]" id="" tabindex = "<?php echo $tabindex++ ?>">
                                                </td>
                                                <td style="text-align: center">
                                                    <input readonly data-id="<?php echo $sn; ?>" value="<?php echo $student['result_grade'] ?>" class="score_input grade"type="text" name="grade[<?php echo $student['student_id'] ?>]" id="">
                                                </td>
                                                <td style="text-align: center">
                                                    <input readonly data-id="<?php echo $sn; ?>" value="<?php echo $student['result_remark'] ?>" class="score_input remark"type="text" name="remark[<?php echo $student['student_id'] ?>]" id="">
                                                </td>
                                            </tr>
                                            <?php $sn++; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                    </table>
                                </div>

                                <div class="form-group my-4">
                                    <button name="submit" type="submit" class="btn btn-flat btn-primary w-100">Update Report</button>
                                </div>
                                

                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!isset($_SESSION['data'])): ?>
                    <div class="alert alert-dark text-center">
                        <a href="/result/teacher/dashboard">Return to Dashboard</a>

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