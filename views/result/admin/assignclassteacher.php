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
                                    <a class="link-fx" href="/result/admin/teachers">Teachers</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Assign Class Teachers
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
                        <h3 class="block-title">Class Teacher Designation</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/result/admin/showclassassignment" method="POST">
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

                                            <div class="col-md">
                                                <select class="form-control" name="session_id" required>
                                                    <option>Choose a session</option>
                                                    <?php foreach ($sessions as $session) : ?>
                                                        <option <?= $session['session_status'] === "active" ? 'selected' : '' ?> value="<?= $session['session_id']; ?>"> <?= $session['session_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>


                                            <div class="col-md justify-content-end">
                                                <button type="submit" name="type" value="show" class="btn btn-dark">Show</button>
                                                <button type="submit" name="type" value="assign" class="btn btn-dark">Assign</button>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($_SESSION['data'])) : ?>
                    <?php if ($_SESSION['data']['type'] === "assign") : ?>
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Designate Class Teachers</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <form action="/result/admin/saveclassassignments" method="POST">
                                    <input type="hidden" name="session_id" value="<?= $_SESSION['data']['session_id']; ?>">
                                    <input type="hidden" name="type" value="<?= $_SESSION['data']['type']; ?>">

                                    <table class="table table-sm">

                                        <tbody>
                                            <?php foreach ($_SESSION['data']['classes'] as $class) : ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="class_ids[]" value="<?= $class['class_id'] ?>">
                                                        <input type="text" readonly disabled value="<?= strtoupper($class['class_alternative_name']); ?>" class="form-control">
                                                    </td>
                                                    <td>
                                                        <select name="teacher_ids[]" class="form-control" required>
                                                            <option value=""></option>
                                                            <?php foreach ($_SESSION['data']['teachers'] as $teacher) : ?>
                                                                <option value="<?= $teacher['teacher_id'] ?>"><?= strtoupper($teacher['teacher_fullname']); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>


                                            <?php endforeach; ?>

                                            <tr>
                                                <td>
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>



                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['data']['type'] === "show") : ?>
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Designate Class Teachers</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <form action="/result/admin/saveclassassignments" method="POST">
                                    <input type="hidden" name="session_id" value="<?= $_SESSION['data']['session_id']; ?>">
                                    <input type="hidden" name="type" value="<?= $_SESSION['data']['type']; ?>">

                                    <table class="table table-sm">

                                        <tbody>
                                            <?php foreach ($_SESSION['data']['classTeachers'] as $classTeacher) : ?>

                                                <?php if(count($classTeacher) > 0): ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="class_ids[]" value="<?= $classTeacher['class_id'] ?>">
                                                        <input type="hidden" name="class_teacher_ids[]" value="<?= $classTeacher['id'] ?>">

                                                        <input type="text" readonly disabled value="<?= strtoupper($classTeacher['class_alternative_name']); ?>" class="form-control">
                                                    </td>
                                                    <td>
                                                        <select name="teacher_ids[]" class="form-control" required>
                                                            <option value=""></option>
                                                            <?php foreach ($_SESSION['data']['teachers'] as $teacher) : ?>
                                                                <option <?= $classTeacher['teacher_id'] === $teacher['teacher_id'] ? 'selected' : ''; ?> value="<?= $teacher['teacher_id'] . "_" . $classTeacher['id']; ?>"><?= strtoupper($teacher['teacher_fullname']); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>



                                                <?php endif; ?>


                                            <?php endforeach; ?>

                                            <tr>
                                                <td>
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>



                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php unset($_SESSION['data']); ?>
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