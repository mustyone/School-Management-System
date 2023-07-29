<?php include(APP_PATH . "/config/session.php"); ?>
<?php include(APP_PATH . "/config/studentloginchecker.php"); ?>
<?php include(APP_PATH . "/config/pageconfig.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH . "/views/includes/headtag_content.php"; ?>
</head>

<body>
    <div id="page-container">
        <main id="main-container">
            <!-- Hero -->
            <?php include APP_PATH . "/views/cbt/student/topbar.php"; ?>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
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
                            <span class="block-title">
                                <?php for($i = 1; $i <= $numbers_of_exam; $i++):?>
                                    <button class="btn btn-success">exams1</button>
                                <?php endfor;?>                                
                                </span>     
                            </div>
    
                            <div class="block-content">
                                <p>questions</p>
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