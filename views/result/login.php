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
                                    <h3 class="block-title">Sign In</h3>

                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                        <p class="fw-medium text-muted">
                                            Welcome, please enter your credentials to signin.
                                        </p>

                                        <!-- Sign In Form -->
                                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-signin" action="/controllers/result/login.php"
                                            method="POST">
                                            <div class="py-3">
                                                <div class="mb-4">
                                                    <select name="userType" class="form-control">
                                                        <option value="exam_officer">Exam Officer</option>
                                                        <option value="teacher">Teacher</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <input type="text"
                                                        class="form-control form-control-alt form-control-lg"
                                                        id="login-username" name="username"
                                                        placeholder="Username" value="john">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password"
                                                        class="form-control form-control-alt form-control-lg"
                                                        id="login-password" name="password"
                                                        placeholder="Password" value="12345678">
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i>
                                                        Sign In
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="alert alert-info">
                                                <p>Exam Officer</p>
                                                <p>Username: john <br/> Password: 12345678</p>

                                                <p>Teacher</p>
                                                <p>Username: 08135548934 <br/> Password: 8934</p>
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
                    <div class="fs-sm text-muted text-center">
                        <strong>v1</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <?php include "includes/scripts.php"; ?>
</body>

</html>