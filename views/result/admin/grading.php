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
                                    <a class="link-fx" href="javascript:void(0)">Setup</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Grading
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
                        <h3 class="block-title">Grading</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/showgrading" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <select class="form-control" name="section_id" required>
                                                    <option>Choose a section</option>
                                                    <?php foreach ($sections as $section) : ?>
                                                        <option value="<?= $section['section_id']; ?>"> <?= $section['section_shot_code']; ?></option>
                                                    <?php endforeach; ?>
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
                        <?php if (isset($_SESSION['sectionGrading'])) : ?>
                            <div id="template" class="d-none">
                                <table>
                                    <tr>
                                        <td>
                                            <input required min="0" type="number" name="Amin_scores[]" class="form-control col-2" value="">
                                        </td>
                                        <td>
                                            <input required min="0" type="number" name="Amax_scores[]" class="form-control col-2" value="">
                                        </td>
                                        <td>
                                            <input required type="text" name="Agrades[]" class="form-control col-2" value="">
                                        </td>
                                        <td>
                                            <input required type="text" name="Aremarks[]" class="form-control col-6" value="">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light removeRow">
                                                <i class="fa fa-minus text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>

                            </div>

                            <div class="row push">
                                <hr>

                                <div class="col text-center">
                                    <h3>Grading system for <?= $sectionRecord['section_name']; ?></h3>

                                </div>

                                <hr>
                            </div>

                            <div class="row push">

                                <div class="mb-4">
                                    <?php if (count($_SESSION['sectionGrading']) > 0) : ?>
                                        <form action="/result/admin/updategrading" method="POST" id="gradeForm">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary">
                                                            Save Grading
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <button id="addNewGradeRow" type="button" class="btn btn-outline-primary">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Min</th>
                                                        <th>Max</th>
                                                        <th>Grade</th>
                                                        <th>Remark</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    <?php foreach ($_SESSION['sectionGrading'] as $grading) : ?>
                                                        <tr>
                                                            <td class="col-2">
                                                                <input type="hidden" name="grade_ids[]" value="<?= $grading['grade_id'] ?>">
                                                                <input required min="0" type="number" name="min_scores[]" class="form-control col-2" value="<?= $grading['grade_min_score'] ?>">
                                                            </td>
                                                            <td class="col-2">
                                                                <input required min="0" type="number" name="max_scores[]" class="form-control col-2" value="<?= $grading['grade_max_score'] ?>">
                                                            </td>
                                                            <td class="col-2">
                                                                <input required type="text" name="grades[]" class="form-control col-2" value="<?= $grading['grade_char'] ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input required type="text" name="remarks[]" class="form-control col-5" value="<?= $grading['grade_remark'] ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <a href="/result/admin/deletegrade" class="btn btn-danger" data-grade-id="<?= $grading['grade_id'] ?>">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>
                                            <input type="hidden" name="section_id" value="<?= $section_id ?>">
                                        </form>
                                    <?php endif; ?>

                                    <?php if (count($_SESSION['sectionGrading']) === 0) : ?>

                                        <form action="/result/admin/savegrading" method="POST">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary">
                                                            Save Grading
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <button id="addNewGradeRow" type="button" class="btn btn-outline-primary">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="section_id" value="<?= $section_id ?>">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Min</th>
                                                        <th>Max</th>
                                                        <th>Grade</th>
                                                        <th>Remark</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    <tr>
                                                        <td>
                                                            <input required min="0" type="number" name="Amin_scores[]" class="form-control col-2" value="">
                                                        </td>
                                                        <td>
                                                            <input required min="0" type="number" name="Amax_scores[]" class="form-control col-2" value="">
                                                        </td>
                                                        <td>
                                                            <input required type="text" name="Agrades[]" class="form-control col-2" value="">
                                                        </td>
                                                        <td>
                                                            <input required type="text" name="Aremarks[]" class="form-control col-6" value="">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-light removeRow">
                                                                <i class="fa fa-minus text-danger"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    <?php endif; ?>

                                    </tbody>

                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php unset($_SESSION['sectionGrading']); ?>

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