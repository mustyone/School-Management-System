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
                                    <a class="link-fx" href="/admission/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Update Exams
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
                        <h3 class="block-title">Update Exams</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="/cbt/updateexams" method="POST">
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="hidden" value="<?= $update['id'];?>" name="id">
                                                <label class="form-label">
                                                    Exam Name <span class="text-danger">*</span>
                                                </label>
                                                <input required type="text" class="form-control" name="exam_name" value="<?= $update['exam_name'];?>">
                                            </div>
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Class<span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="class_id" id="">
                                                    <option>class Name</option>
                                                    <?php foreach($records as $record):?>
                                                        <option <?php if($update['class_id'] == $record['class_id']){ echo "selected";}?> value="<?= $update['class_id'];?>"><?= $record['class_alternative_name']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Time (in minut)<span class="text-danger">*</span>
                                                </label>
                                                <input required type="number" class="form-control" name="time_alloted_min" value="<?= $update['time_alloted_min'];?>">
                                            </div>
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Allow Calculator <span class="text-danger">*</span>
                                                </label>
                                                <select required name="allow_calculator" class="form-control">
                                                    <option <?php if($update['allow_calculator'] == "yes"){ echo 'selected';}?> value="yes">Yes</option>
                                                    <option  <?php if($update['allow_calculator'] == "no"){echo 'selected';}?> value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Status<span class="text-danger">*</span>
                                                </label>
                                                <select required name="status" class="form-control">
                                                    <option <?php if($update['status'] == "active"){echo "selected";}?> value="active">Active</option>
                                                    <option <?php if($update['status'] == "inactive"){echo "selected";}?> value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Instruction<span class="text-danger">*</span>
                                                </label>
                                                <textarea required class="form-control" name="instruction" id="instruction" cols="10" rows="2"><?= htmlspecialchars_decode($update['instruction']);?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">

                                            <div class="col-md">
                                                <label class="form-label">Over-all score<span class="text-danger">*</span></label>
                                                <input required type="number" class="form-control" name="overallscore" value="<?= $update['overallscore'];?>">
                                            </div>

                                            <div class="col-md">
                                                <label class="form-label">
                                                    Requre Admission-Number <span class="text-danger"></span>
                                                </label>
                                                <select required name="requre_id" class="form-control">
                                                    <option <?php if($update['requre_id'] == "yes"){echo "selected";}?> value="yes">Yes</option>
                                                    <option <?php if($update['requre_id'] == "no"){echo "selected";}?>value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Show Result Per Question<span class="text-danger"></span>
                                                </label>
                                                <select required name="show_result_per_question" class="form-control">
                                                    <option <?php if($update['show_result_per_question'] == "yes"){echo "selected";}?> value="yes">Yes</option>
                                                    <option <?php if($update['show_result_per_question'] == "no"){echo "selected";}?> value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                <label class="form-label">
                                                    Show Result After Submit<span class="text-danger"></span>
                                                </label>
                                                <select required name="show_result_after_submit" class="form-control">
                                                    <option <?php if($update['show_result_after_submit'] == "yes"){echo "selected";}?> value="yes">Yes</option>
                                                    <option <?php if($update['show_result_after_submit'] == "no"){echo "selected";}?>value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <table class="table table-sm table-bordered">

                                            <tbody>
                                                <?php
                                                    $subject_ids = json_decode($update['exam_subject_id'], true);
                                                    $marks_per_question = json_decode($update['mark_per_question'], true); 
                                                    $question_per_subject = json_decode($update['number_of_question_subject'], true); 
                                                ?>
                                                
                                                <?php foreach ($sectionSubjects as $sectionName => $sectionSubject) : ?>
                                                    <tr class="bg-dark text-white text-center text-uppercase">
                                                        <td colspan="4"><?= $sectionName ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-end">Subject</th>
                                                        <th>Questions</th>
                                                        <th>Mark</th>
                                                    </tr>

                                                    <?php foreach ($sectionSubject as $subject) : ?>
                                                        <?php
                                                            $index = array_search($subject['subject_id'],$subject_ids);
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input <?= $index !== false ? 'checked' : '' ?> value="<?= $subject['subject_id'] ?>" type="checkbox" name="subject_ids[]" id="<?= $subject['subject_id'] ?>">
                                                            </td>
                                                            <td>
                                                                <label for="<?= $subject['subject_id'] ?>">
                                                                    <?= $subject['subject_name'] ?>
                                                                </label>

                                                            </td>
                                                            <td>
                                                                <input value="<?= $index !== false ? $question_per_subject[$index] : '' ?>" class="form-control" type="number" name="number_of_questions[]" id="">
                                                            </td>
                                                            <td>
                                                                <input value="<?= $index !== false ? $marks_per_question[$index] : '' ?>" class="form-control" type="number" name="mark_per_questions[]" id="">
                                                            </td>
                                                        </tr>

                                                    <?php endforeach; ?>


                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    

    <!-- include summernote css/js -->
    <link href="<?= BASE_URL ?>/assets/summernote/summernote-lite.min.css" rel="stylesheet">
    <script src="<?= BASE_URL ?>/assets/summernote/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#instruction').summernote();
        });
    </script>

</body>

</html>