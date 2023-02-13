<?php include( APP_PATH. "/config/session.php"); ?>
<?php include( APP_PATH. "/config/studentloginchecker.php"); ?>
<?php include( APP_PATH. "/config/pageconfig.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH. "/views/includes/headtag_content.php"; ?>
</head>

<body>
<div id="page-container">
    <main id="main-container">
        <!-- Hero -->
        <?php include APP_PATH. "/views/cbt/student/topbar.php"; ?>

        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <h3><?= $sample; ?></h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                User Information
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="fa fa-user"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered">

                                <tr>
                                    <td colspan="3">
                                        <img class="img img-responsive" src="/assets/media/avatars/avatar0.jpg" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <span><?= $studentRecord['student_id'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>
                                            <?= $studentRecord['student_first_name'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span><?= $studentRecord['student_middle_name'] ?></span>
                                    </td>
                                    <td>
                                        <span><?= $studentRecord['student_last_name'] ?></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <span><?= $studentRecord['student_class_id'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <span>
                                            <a class="btn w-100 btn-danger" href="/cbt/close">
                                                <i class="fa fa-sign-out"></i>
                                                Logout
                                            </a>
                                        </span>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Available Exams
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="fa fa-list"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                       
                            <table class="table table-bordered">
                              
                               <tr>
                                <thead>
                                    <td>#</td>
                                    <td>Subject Code</td>
                                    <td>Subject</td>
                                </thead>
                               </tr>
                               <?php
                                $count = 0;
                            foreach($exams as $exam):


                        ?>
                               <tr>
                                <tbody>
                                    <tr>
                                    <td><?=$count?></td>
                                        <td><?=$exam['subject_code']?></td>
                                        <td><?=$exam['subject_name']?></td>
                                    </tr>
                                    </tbody>
                               </tr>
<?php
                     $count++;   endforeach;
                          
?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- END Page Content -->
    </main>
</div>
<!-- END Page Container -->

<?php include "/../includes/scripts.php"; ?>
</body>

</html>