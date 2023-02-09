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
                                <li class="breadcrumb-item" aria-current="page">
                                    Promotion list
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
                        <h3 class="block-title">Promotion List</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/showpromotionlists" method="POST">
                            <input type="hidden" name="redirect_to" value="promotionlist">
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
                    <form action="#" method="POST">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default no-print">
                                <h3 class="block-title">Promotion Lists</h3>
                                <div class="block-options">
                                    <div class="block-options-item">
                                        <button id="print" type="button" class="btn btn-primary">
                                            <i class="fa fa-print"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="block-content p-0">
                                <!-- If you put a checkbox in thead section, it will automatically toggle all tbody section checkboxes -->
                                <table>
                                    <tr>
                                        <td style="text-align: center" colspan="6"><?= setting('school_name'); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center" colspan="6">Promotion Lists</td>
                                    </tr>
                                </table>
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Name</th>
                                            <th style="text-align: center;">Gender</th>
                                            <th style="text-align: center;">Session Avg. </th>
                                            <th style="text-align: center;">CutOff</th>
                                            <th style="text-align: center;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1; ?>
                                        <?php foreach ($_SESSION['data']['promotionLists'] as $promotionLists) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $promotionLists['student_id']; ?>
                                                </td>
                                                <td class="fs-sm">
                                                    <p class="fw-semibold mb-1">
                                                        <a href="/result/admin/student/<?= $promotionLists['student_id'] ?>">
                                                            <?= ucwords("{$promotionLists['student_first_name']} 
                                                            {$promotionLists['student_middle_name']} 
                                                            {$promotionLists['student_last_name']}"); ?>
                                                        </a>
                                                    </p>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?= ucfirst($promotionLists['gender'] ?? "-"); ?>
                                                </td>
                                                <td style="text-align: center;" class="d-none d-sm-table-cell"><?= $promotionLists['session_average']; ?></td>
                                                <td style="text-align: center;"><?= $promotionLists['passing_average']; ?></td>
                                                <td style="text-align: center;">
                                                    <?= ucwords($promotionLists['promotion_status']); ?>
                                                </td>
                                            </tr>


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

    <style>
        table {
            width: 100%;
            border: 2px solid black;
        }

        table tr td {
            border: 1px solid black;
        }

        table tr th {
            border: 1px solid black;
        }

        .heading {
            background: #333333;
            color: #ffffff;
        }

        .heading h4 {
            color: white;
        }

        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

        @media print {
            .no-print {
                display: none;
            }

            body{
                background-color: white;

            }
        }
    </style>
</body>

</html>