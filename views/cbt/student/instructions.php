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
                    <div class="col-md-12">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title text-center">
                                   Exam Instructions
                                </h3>
                                <div class="block-options">

                                    <button type="button" class="btn-block-option">
                                        <i class="fa fa-list"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <P>
                                    <?= $instruction;?>
                                </P>

                            </div>
                            <div class="col-md-2">
                            <a href="/cbt/exams"><button type="submit" class="btn btn-primary" style="margin-bottom:5%;margin-left:5%;">proceed</button></a>
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