<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/loginchecker.php"); ?>
<?php include(APP_PATH . "/config/rolechecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>


<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/js/plugins/select2/css/select2.min.css">
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
                                    <a class="link-fx" href="javascript:void(0)">Broadsheet</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Subject Broadsheet
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
                        <h3 class="block-title">Student Report</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="col-md-12">
                            <form action="/result/admin/fetchbroadsheet" method="post" class="row">
                                <div class="form-group col-3">
                                    <select class="form-control" name="class_id" id="" required>
                                        <option value="">Select a class</option>
                                        <?php foreach ($classes as $class) : ?>
                                            <option value="<?php echo $class['class_id'] ?>"><?php echo $class['class_alternative_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group col-2">
                                    <select required class="form-control" name="session_id">
                                        <option>Select a session</option>
                                        <?php foreach ($sessions as $session) : ?>
                                            <option <?php echo $session['session_status'] == "active" ? 'selected' : '';  ?> value="<?php echo $session['session_id'] ?>"><?php echo $session['session_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <select required class="form-control" name="term_id">
                                        <option value="">Pick a term</option>
                                        <option <?php echo ACTIVE_TERM_INDEX == 1 ? 'selected' : ''; ?> value="1">First</option>
                                        <option <?php echo ACTIVE_TERM_INDEX == 2 ? 'selected' : ''; ?> value="2">Second</option>
                                        <option <?php echo ACTIVE_TERM_INDEX == 3 ? 'selected' : ''; ?> value="3">Third</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <button type="sebmit" class="btn btn-primary">submit</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>

                <?php if (isset($_SESSION['broadsheet'])) : ?>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default no-print">
                            <h3 class="block-title">Subject Broadsheet</h3>
                            <button id="print" class="btn btn-default"><i class="fa fa-print"></i></button>
                        </div>
                        <div class="block-content block-content-full p-0">
                            <?php
                            include "subjectbroadsheet_term.php"
                            ?>
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
    <script src="<?= BASE_URL; ?>/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(".form-select").select2();
    </script>
    <?php unset($_SESSION['broadsheet']); ?>

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

        .diagonal-text {
            /* transform:rotate(90deg); */
            /* padding:20px; */
            /* width:10px; */

        }
    </style>
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

        table {
            width: 100%;
            border: 1px solid black;
        }

        table tr td {
            border: 1px solid black;
        }

        .heading {
            background: #333333;
            color: #ffffff;
        }

        .heading h4 {
            color: white;
        }

        .resultEnd {
            page-break-after: always;
        }

        .generalComment {
            height: 150px;
            vertical-align: top;
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