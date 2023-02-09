<!doctype html>
<html lang="en">

<head>
    <?php include APP_PATH. "/views/includes/headtag_content.php"; ?>
</head>

<body>
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="content">
                <div class="row justify-content-center push">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign In Block -->
                        <div class="block block-rounded mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title text-center">Computer Based Exam</h3>

                            </div>
                            <div class="block-content">
                                <div class="">

                                    <form action="/cbt/verifystudentid" method="POST">
                                        <div class="py-3">
                                            <div class="mb-4">
                                                <input type="text"
                                                       class="form-control form-control-lg"
                                                       name="student_id"
                                                       placeholder="Enter your admission number" >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-alt-success">
                                                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i>
                                                    Proceed
                                                </button>
                                            </div>
                                        </div>

                                        <?php if (isset($_SESSION['error'])): ?>

                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <div class="text-center">
                                                    <?php
                                                        echo $_SESSION['error'];
                                                        unset($_SESSION['error']);
                                                    ?>
                                                </div>
                                            </div>

                                        <?php endif; ?>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<?php include "/../includes/scripts.php"; ?>
</body>

</html>