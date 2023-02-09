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
            <div class="bg-body-light no-print">
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
                                    Recording Sheet
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
                <div class="block block-rounded no-print">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Recoring sheet</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/recordingsheet" method="POST">
                            <div class="row push">
                                <div class="form-group col-2" id="">
                                    <select class="form-control" name="class_id" id="class_id">
                                        <?php foreach ($classes as $class) : ?>
                                            <option value="<?php echo $class['class_id'] ?>"><?php echo $class['class_alternative_name'] ?></option>
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
                        <div class="block-header block-header-default no-print">
                            <h3 class="block-title">Recording Sheet</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="p-0">
                                <h3 class="text-center"><?php echo setting('school_name') ?></h3>
                                <h4 class="text-center">SUBJECT RECORDING SHEET</h4>
                                <div class="d-flex flex-row justify-content-between mt-3">
                                    <p class="text-left">Class: _____________________ </p>
                                    <p class="text-left">Session: <?php echo ACTIVE_SESSION_NAME; ?> </p>
                                    <p class="text-left">Term: <?php echo ACTIVE_TERM; ?> </p>
                                    <p class="text-right">Subject:__________________</p>
                                </div>

                                <table class="">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Adm no</th>
                                            <th>Student</th>
                                            <?php foreach ($_SESSION['data']['tests_category'] as $test) : ?>
                                                <th>
                                                    <?php
                                                    echo "{$test['test_name']} ({$test['test_score']})";
                                                    ?>
                                                </th>
                                            <?php endforeach; ?>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1; ?>
                                        <?php foreach ($_SESSION['data']['students'] as $student) : ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo strtoupper($student['reg_student_id']); ?></td>
                                                <td><?php echo strtoupper($student['student_first_name'] . " " . $student['student_middle_name'] . " " . $student['student_last_name']); ?></td>
                                                <?php foreach ($_SESSION['data']['tests_category'] as $test) : ?>
                                                    <td></td>
                                                <?php endforeach; ?>
                                                <td></td>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
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
    table{
        width:100%;
        border: 2px solid black;
    }
    table tr td{
        border:2px solid black;
    }

    table tr th{
        border:2px solid black;
    }
    .heading{
        background:#333333;
        color:#ffffff;
    }

    .heading h4{
        color:white;
    }
    .resultEnd{
        page-break-after: always;
    }
    .generalComment{
        height:100px;
        vertical-align: top;
    }
    @media print{
        .no-print{
            display: none;
        }
    }
</style>
</body>

</html>