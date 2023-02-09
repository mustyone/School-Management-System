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
                                    <a class="link-fx" href="#">Setup</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="/result/admin/allsubjects">Subjects</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Subject
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
                        <h3 class="block-title">Edit Subject</h3>
                    </div>

                    <div class="block-content block-content-full">
                        <form action="/result/admin/editsubject" method="POST">
                            <input type="hidden" value="<?= $id ?>" name="subject_id" />
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label">
                                            Section
                                        </label>

                                        <select class="form-control" name="section_shot_code" id="section" required>
                                            <option></option>
                                            <?php foreach ($sections as $section) : ?>
                                                <option
                                                <?= $section['section_id'] === $subjectRecord['subject_section_id'] ? 'selected' : ''; ?>
                                                data-section-id="<?= $section['section_id']; ?>"
                                                >
                                                    <?= $section['section_shot_code']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input value="<?= $subjectRecord['subject_section_id']; ?>" type="hidden" id="sectionID" name="subject_section_id">
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Subject Name
                                                </label>
                                                <input value="<?= $subjectRecord['subject_name'] ?>" required type="text" class="form-control" name="subject_name" placeholder="English Language">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">Branch</label>
                                                <input value="<?= $subjectRecord['subject_branch'] ?>" type="text" class="form-control" name="branch" placeholder="Leave Blank if not applicable">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
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